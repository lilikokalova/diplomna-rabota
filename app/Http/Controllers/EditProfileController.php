<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\User;
use Auth;

class EditProfileController extends Controller
{
    public function index()
    {
        $entries = User::where('id', '=', Auth::id())->get();
        return view('editprofile', compact('entries'));
    }

    public function update() {
        $entry = User::find(Auth::id());
        $entry->name = Input::get('name');
        $entry->lastname = Input::get('lastname');
        $entry->email = Input::get('email');
        $entry->save();

        return redirect('editprofile');
    }


}
