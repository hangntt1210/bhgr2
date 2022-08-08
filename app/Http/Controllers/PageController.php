<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Session;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Type;
use App\Models\Material;
use App\Models\Orders;
use App\Models\OrderItem;
use App\Models\Combo;
use App\Models\Compro;

use App\Http\Requests\SearchSizeRequest;


class PageController extends Controller
{
    //
    public function getIndex(){
        $tatcasp_count = Product::where('price','<>',0)->get();//lay tat ca sp
        $tatcasp = Product::where('price','<>',0)->paginate(6);
        //dd($tatcasp);
        $tatca_donhang = Orders::where('id_user', Auth::id())->count();
    	return view('page.trangchu',compact('tatcasp', 'tatca_donhang', 'tatcasp_count'));
    }

    public function getLoai($type){
        $sp_theoloai = Product::where('id_type',$type)->get();//lay sp theo loai: id_type=bien truyen vao $type
        return view('page.loai_sanpham',compact('sp_theoloai'));
    }
    public function getChatlieu($type){
        $sp_theochatlieu = Product::where('id_material',$type)->get();//lay sp theo loai: id_material=bien truyen vao $type
        return view('page.loaichatlieu',compact('sp_theochatlieu'));
    }

    public function getChitiet(Request $req){//cach2 cua getLoai
        $sanpham = Product::where('id',$req->id)->first();
        //$sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $sp_tuongtu = Product::with('type', 'material')
                                ->where('id_type',$sanpham->id_type)
                                //->where('id', '<>', $sanpham->id)
                                ->paginate(3);
        //de lay cmt:
        $item = OrderItem::with('orders')->where('id_product', $req->id)->whereNotNull('cmt')->get();
        return view('page.chitiet',compact('sanpham','sp_tuongtu', 'item'));
    }

    public function getSearch(Request $req){//name=key trong header.blade.php
        $product = Product::where('name','like','%'.$req->key.'%')->get();
        return view('page.search',compact('product'));
    }

    public function getAllOrder(){
        //$tatca_don = Orders::where('id_user', Auth::id())->get();
        $tatca_don = Orders::where('id_user', Auth::id())->orderBy('id', 'desc')->get();
        $dem_don = Orders::where('id_user', Auth::id())->count();
        return view('page.ordered',compact('tatca_don', 'dem_don'));
    }
    //
    public function getCompare(){
        $tatcasp = Product::where('price','<>',0)->get();
        return view('page.sosanh', compact('tatcasp'));
    }
    public function getCompareTable(){
        if (empty($_POST['product1'])  || empty($_POST['product1'])) {
            $error['product1'] = "Bạn cần chọn sản phẩm so sánh";
            $error['product2'] = "Bạn cần chọn sản phẩm so sánh";
        } else {
            $product1 = $_POST['product1'];
            $product2 = $_POST['product2'];
        }
        // $product1 = $_POST['product1'];
        // $product2 = $_POST['product2'];
        $pr1 = Product::with('type', 'material')->where('id', $product1)->first();
        $pr2 = Product::with('type', 'material')->where('id', $product2)->first();
        $luot_mua1 = OrderItem::where('id_product', $product1)->get();
        $luot_mua2 = OrderItem::where('id_product', $product2)->get();
        
        return view('page.sosanh_table', compact('product1', 'product2', 'pr1', 'pr2', 'luot_mua1', 'luot_mua2'));
    }
    //
    public function getSearchSize(){
        
        return view('page.tim_kichthuoc');
    }
    public function getSearchSizeResult(SearchSizeRequest $req){
        $product = Product::where('id_type', $req->id_type)
                            ->whereBetween('length', [$req->length_min, $req->length_max])
                            ->whereBetween('width', [$req->width_min, $req->width_max])
                            ->whereBetween('height', [$req->height_min, $req->height_max]);
        $product_kq = $product->get();
        $product_kq_pagi = $product->paginate(3);//ko dung den, vi post ko paginate duoc
        return view('page.tim_kichthuoc_kq', compact('product_kq', 'product_kq_pagi'));
    }

    public function getDetailOrder($id){
        $detailOrder = Orders::with('user')->where('id', $id)->firstOrFail();
        $listProduct = OrderItem::with('product')->where('id_order', $id)->get();
        return view('page.detail_ordered', compact('detailOrder', 'listProduct'));
    }

    public function getCommentOrder($id){
        $detailOrder = Orders::where('id', $id)->firstOrFail();
        $listProduct = OrderItem::where('id_order', $id)->get();
        return view('page.comment', compact('detailOrder', 'listProduct'));
    }
    public function storeComment(Request $req, $id)
    {
        $item = OrderItem::findOrFail($id);
        $item->cmt = $req->cmt;
        $item->save();

        return redirect()->route('chitietsanpham', $item->id_product);
    }


    public function getLogin(){
        return view('page.dangnhap');
    }

    public function getSignup(){
        return view('page.dangki');
    }

    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:user,email',//required bat buoc phai nhap, unique co trung email cua tai khoan khac ko
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'vui long nhap email',
                'email.email'=>'email khong dung dinh dang',
                'email.unique'=>'email da co nguoi su dung',
                'password.required'=>'vui long nhap password',
                're_password.same'=>'password khong giong nhau',
                'password.min'=>'password phai co it nhat 6 ki tu',
                'fullname.required'=>'vui long nhap fullname'
            ]
        );
        $user = new User();
        $user->email = $req->email;
        $user->fullname = $req->fullname;
        $user->password = Hash::make($req->password);//sd hash de ma hoa password
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->back()->with('thanhcong','đã tạo tài khoản thành công');
        //return redirect()->back()->with(['flag'=>'success','message'=>'đã tạo tài khoản thành công']);
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',//required bat buoc phai nhap
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'vui long nhap email',
                'email.email'=>'email khong dung dinh dang',
                'password.required'=>'vui long nhap password',
                'password.min'=>'password phai co it nhat 6 ki tu',
                'password.max'=>'password khong qua 20 ki tu'
            ]
        );
        //bien chung thuc nguoi dung la 1 mang
        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'đăng nhập thất bại']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getProfile(){
    
        return view('page.profile');
    }

    //combo
    public function getCombo(){
        $combo = Product::where('price','<>',0)->get();//lay tat ca sp
        $combo_pagi = Product::where('price','<>',0)->paginate(3);
        //dd($tatcasp);
        $tatca_donhang = Orders::where('id_user', Auth::id())->count();
        return view('page.combo',compact('tatcasp', 'tatca_donhang', 'tatcasp_count'));
    }

}