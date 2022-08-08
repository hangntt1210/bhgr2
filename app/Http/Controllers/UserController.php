<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\AddUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', '<>', 0)->orderBy('id', 'desc');
        $all = $user->get();
        $list = $user->paginate(10);
        
        return view('admin.user_list', compact('list', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $req)
    {
        $user = new User();
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->route('list_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailUser = User::where('id', $id)->firstOrFail();

        return view('admin.user_read', compact('detailUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userEdit = User::where('id', $id)->firstOrFail();

        return view('admin.user_edit', compact('userEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $user = User::findOrFail($id);
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->route('list_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$del = User::find($id);
        $del = User::where('id', $id)->firstOrFail();
        $del->delete();

        return redirect()->route('list_user');
    }
}
