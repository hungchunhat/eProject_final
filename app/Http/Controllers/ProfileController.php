<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }
    public function index1(){
        $products = Auth::user()
            ->product()
            ->wherePivot('action_type', 'buy')
            ->get();
        $favs = Auth::user()
            ->product()
            ->wherePivot('action_type', 'fav')
            ->get();
        $owns = Auth::user()
            ->product()
            ->wherePivot('action_type', 'own')
            ->get();
        return view('profile.watch-list',[
            'products' => $products,
            'favs' => $favs,
            'owns' => $owns,
        ]);
    }
    public function index2(){
        return view('profile.manage',[
            'products' => Product::all(),
            'users' => User::where('id','!=',Auth::id())->get(),
            'auctions' => Auction::all(),
            'feedbacks' => Product::all(),
        ]);
    }
    public function update(User $user){
        $validate = request()->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'address' => 'nullable'
        ]);
        $user->update($validate);
        return redirect()->back()->with('success1', 'Profile updated successfully.');
    }
    public function updatePassword(User $user)
    {
        $validator = Validator::make(request()->all(), [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'passwordForm');
        }
        if (!Hash::check(request()->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.','passwordForm']);
        }
        $user->password = Hash::make(request()->password);
        $user->save();
        return redirect()->back()->with('success2', 'Password updated successfully.');
    }
    public function destroy(User $user){
        $user->delete();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
