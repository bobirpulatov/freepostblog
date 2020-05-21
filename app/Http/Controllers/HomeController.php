<?php

namespace App\Http\Controllers;

use App\Custom\User;
use App\Http\Requests\Signin;
use App\Http\Requests\Signup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function post($page){
      return view('post');
    }

    public function gallery($page){
      if ($page > 20 || $page < 1) $page = 1;
      return view('gallery', ["page" => $page]);
    }

    public function news($page){
      if ($page > 20 || $page < 1) $page = 1;
      return view('news', ['page' => $page]);
    }

    public function view_news(Request $request){
      $url = $request->input('url');
      if (empty($url))
        return redirect('/');
      else
        return view('view_news', ['url' => $url]);
    }

    public function signout(){
      session(['remember' => '']);
      return redirect('/');
    }

    public function signup(){
      return view('signup');
    }

    public function signup_post(Signup $request){

      $result = $request->validated();

      $count = User::where('email', '=', $result['email'])->count();

      if ($count > 0)
        return redirect('/signup')->withErrors(['email' => 'Email already exists in the system'])->withInput();


      $user = new User();

      $user->name = $result['name'];
      $user->email = $result['email'];
      $user->password = Hash::make($result['password']);
      $user->created_at = date("Y-m-d H:i:s");
      $user->updated_at = date("Y-m-d H:i:s");
      $user->remember_token = Hash::make(time() . " 11 ". rand(0, 500));

      session(['remember' => $user->email."|".$user->remember_token."|".$user->name]);

      $user->save();

      return redirect('/user/');
    }

    public function signin(){
      return view('signin');
    }

    public function signin_post(Signin $request){

      $result = $request->validated();

      $user_data = User::where('email', $result['email'])->first();

      if ($user_data && Hash::check($result['password'], $user_data->password)){
        $user_data->remember_token = Hash::make(time() . " 11 ". rand(0, 500));
        $user_data->save();

        session(['remember' => $user_data->email."|".$user_data->remember_token."|".$user_data->name]);
        return redirect('/user/');

      }else
        return redirect('/signin')->withErrors(['email' => 'Email or password is incorrect'])->withInput();
    }

    public function show_post($id){
      return view('view_post', ['id' => $id]);
    }

}
