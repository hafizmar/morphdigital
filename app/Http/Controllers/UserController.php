<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::orderBy('created_at', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];
        $user->password = $request->user['password'];
        $user->save();

        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        
        if($user) {
            $user->name = $request->user["name"];
            $user->email = $request->user["email"];
            $user->save();

            return $user;
        }

        return "Item not found.";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if($user) {
            $user->delete();

            return "User successfully deleted.";
        }

        return "Item not found.";
    }

    public function checkEmail(Request $request)
    {
        $checkEmail = User::where('email', 'LIKE', $request->user['email'])->exists();
        return $checkEmail;
    }
}
