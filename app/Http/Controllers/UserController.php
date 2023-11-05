<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('users.index');
      return view('admin.users.index');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('users.create');
        return view('admin.users.create');
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
         $this->authorize('users.show');
         return view('admin.users.profile', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('users.edit');
        return view('admin.users.profile', compact('user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assignPermission(Request $request){
         $user = User::find($request->user_id);
         $user->givePermissionTo($request->permission);
         toast('Permission asseigned successfully','success');
         return redirect()->route('users.index');

    }

    public function unsignPermission(User $user,Permission $permission){
         $user->revokePermissionTo($permission);
         toast('Permission revoked successfully','success');
         return redirect()->route('users.index');

    }

    public function suspend(Request $request){
         $user = User::find($request->user_id);
         $user->suspend();
         $user->suspended == false ? toast('user account activated successfully','success') : toast('user account suspend successfully','success');
         return redirect()->route('users.index');

    }


}
