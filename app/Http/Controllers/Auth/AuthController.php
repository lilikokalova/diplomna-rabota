<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;

class AuthController extends Controller
{

   public function facebook_redirectToProvider()
    {
        return Socialite::with('facebook')->redirect();

    }

    public function facebook_handleProviderCallback()
    {
        $user = \Laravel\Socialite\Facades\Socialite::with('facebook')->stateless()->user();

        echo $user->getName();
        return view('facebook');
    }




    public function twitter_redirectToProvider()
    {
        return Socialite::with('twitter')->redirect();

    }

    public function twitter_handleProviderCallback()
    {
        $user = Socialite::with('twitter')->stateless()->user();

        // $user->token;
        echo $user->getName();
    }
   

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'lastname' => 'required|max:255',

        ]);
    }

   
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'lastname'=>$data['lastname'],
        ]);
    }
}
