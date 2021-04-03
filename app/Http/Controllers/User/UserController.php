<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\User\AddUserRequest;
use App\Http\Requests\User\EditUserRequest;
use Illuminate\Support\Facades\Session;


class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
    }

    public function getUsers()
    {
        $users = DB::table('users')->get();
        return view('admin.users.userList', ['users' => $users]);
    }

    public function addUser()
    {
        return view('admin/users/userAdd');
    }

    public function postaddUser(AddUserRequest $request)
    {
        $user = new User;
        $user->fill($request->input());
        $user->name = str_replace(' ', '', strtolower($request->input('name')));
        $user->password = bcrypt($request->input('password'));
        $user->email_verified_at = date("Y-m-d h:m:s");
        $user->save();
        Session::flash('success', 'Admin Successfully Added');
        return redirect('users');
    }

    public function editUser($userid)
    {

        $userData = User::find($userid);
        return view('admin/users/userEdit', ['user' => $userData]);
    }

    public function posteditUser(EditUserRequest $request)
    {
        $admin = User::find($request->userid);
        $admin->name = str_replace(' ', '', strtolower($request->input('name')));
        $admin->fill($request->input());
        $admin->email_verified_at = date("Y-m-d h:m:s");
        if (!empty($request->input('newpassword'))) {
            $admin->password = bcrypt($request->input('newpassword'));
        }
        $admin->save();
        Session::flash('success', 'User Successfully Edited');
        return view('admin/users/userEdit', ['user' => $admin]);
        // return redirect('admin/admin-user');
    }

    public function destroy($userid)
    {
        DB::table("users")->delete($userid);
        Session::flash('success', 'User Deleted Successfully');
        return redirect('users');
    }
}
