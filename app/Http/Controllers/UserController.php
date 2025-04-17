<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index ()
    {
        $users= User::all();
        return view("admin.users.index",["users"=>$users]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',["user"=>$user]);
    }
    
    public function update($userId)
    {
        //1- get the user data
        $validated = request()->validate([
            'name'=> 'required|string|max:255',
            'email'=>'required|string|max:255|unique:users,email,'.$userId,
            // unique:users,email: This checks the email column in the users table for uniqueness,
            // ensuring that no other user has the same email.(do not forget comma after the column)
            //ensure the email is unique except for the current user being updated .$userid only when update when you want to create dont add it
            'password'=> 'nullable|string|min:8|confirmed',// <--- this checks password_confirmation automatically
            'role'=> 'required|in:admin,user',
        ]);
        
        // Only update password if it's provided
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']); // Remove password from update data
        }
        //2- update the submitted data in database
            //find the user
            //update the user data
        $user = User::findOrFail($userId);
        // dd($user);
        $user->update($validated);
        //3- redirection to users.show
        return to_route('users.show', ['user' => $user->id])->with('success', 'User updated successfully.');
    }
    public function show(User $user)
    {
        return view("admin.users.show",["user"=>$user]);
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return to_route("users.index")->with('success', 'User deleted successfully.');
    }

    public function create()
    {
        //select * from users
        $users = User::all();
        return view('admin.users.create',["users" => $users]);
    }
    
    public function store()
    {
        request()->validate([
            "name" => "required|string|min:3|max:255",
            "email" => "required|string|email:rfc,dns|max:255|unique:users,email,",
            "password" => "required|min:8|confirmed ",
            "role" => "required|in:admin,user",
        ]);

        $hashedPassword = bcrypt(request()->password);
        //it was User::create
        User::firstOrCreate(['email' =>request()->email],
        [
            'name' => request()->name,
            'email' => request()->email,
            'password' => $hashedPassword,
            'role' => request()->role,
        ]);

        return to_route("users.index")->with("success", "User created successfully");
    }
}
