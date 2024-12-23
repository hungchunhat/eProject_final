<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(){
        request()->validate([
            'user_id' => 'required|integer|exists:users,id'
        ]);
        $user = User::find(request('user_id'));

        if ($user) {
            $user->tokens()->delete();
            $user->delete();
        }
        return 'done';
    }
    public function update(){
        request()->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);
        $user = User::find(request('user_id'));
        if($user->role === 'buyer'){
            $user->role = 'collector';
        }else{
            $user->role = 'buyer';
        }
        $user->save();
        return 'done';
    }
}
