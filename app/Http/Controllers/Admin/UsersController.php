<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Crypt;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function edit(User $user)
    {
        if(Gate::denies('manage-users')){
            return redirect()->route('admin.users.index');
        }
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function search(Request $request)
    {
        $user = User::where('name', '=', $request->get('name'))->first();
        if ($user !== null) {
            return view('admin.users.search')->with('user', $user);
        } else{
            $request->session()->flash('error',"Cannot find this user '".$request->get('name')."'");
            return redirect()->back();
        }
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()){
            $request->session()->flash('success',"'".$user->name."' has been updated");
        }else{
            $request->session()->flash('error',"There was an error updating this user '".$user->name."'");
        }

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        if(Gate::denies('delete-users')){
            return redirect()->route('admin.users.index');
        }

        $user = User::find($id);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
