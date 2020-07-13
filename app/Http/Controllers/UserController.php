<?php

namespace App\Http\Controllers;

use App\Custom\Posts;
use App\Http\Requests\EditPost;
use App\Http\Requests\PasswordEdit;
use App\Http\Requests\PersonalDataEdit;
use App\Http\Requests\Post;
use Illuminate\Http\Request;
use App\Custom\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
  public function index(){
    return view('users.index');
  }

  public function add_post(){
    return view('users.add_post');
  }
  
  public function upload_image(Request $request)
  {
    if ($request->hasFile('file')){
      $file = $request->file('file');
      $hashedName = hash_file('md5', $file->path());
      $newFilename = "images/".$hashedName . rand(1, 500) . '.' . $file->getClientOriginalExtension();
      Storage::disk('public')->put($newFilename, file_get_contents($file));
      return ["location" => "http://freepostblog.loc:8888".Storage::url($newFilename)];
    }
    return ["location" => ""];
  }
  
  public function insert_post(Post $request){
    $result = $request->validated();

    $user_email = explode('|', session('remember'))[0];
    $user_data = User::where('email', '=', $user_email)->first();

    if ($user_data->id < 1)
      return redirect('/');
  
    $post = new Posts();
    $post->user_id = $user_data->id;
    $post->title = $result['title'];
    $post->img_1 = "";
    $post->description = $request['description'];
    $post->save();

    return redirect('/user');
  }

  public function remove_post($id){
    $user_email = explode('|', session('remember'))[0];
    $user_data = User::where('email', '=', $user_email)->first();

    if ($user_data->id < 1)
      return redirect('/');

    $data = Posts::where([
      ['user_id', '=', $user_data->id],
      ['id', '=', $id]
    ])->first();

    if (!$data) return redirect('/');
    
    DB::table('posts')->delete($data->id);

    return redirect('/user/');

  }
  
  public function edit_post($id){
    return view('users.edit_post', ['post_id' => $id]);
  }
  
  public function edit_post_handler(EditPost $request){
    $result = $request->validated();
  
    $user_email = explode('|', session('remember'))[0];
    $user_data = User::where('email', '=', $user_email)->first();
  
    if ($user_data->id < 1)
      return redirect('/');
    
    $post = Posts::where([['user_id', $user_data->id], ['id', $result['post_id']] ])->first();
    if ($post == null) return redirect('/user');
    
    $post->title = $result['title'];
    $post->description = $request['description'];
    $post->save();
  
    return redirect('/user/');
  }
  
  public function personal_data(){
    return view('users.personal_data');
  }
  
  public function personal_data_edit(PersonalDataEdit $request)
  {
    try{
      $user_data = $request->validated();
  
      $data = explode('|', session('remember'));
      $result_db = User::where('remember_token', $data[1])->first();
  
      if ($result_db){
        $result_db->name = $user_data['name'];
        $result_db->email = $user_data['email'];
    
        $result_db->save();
    
        session(['remember' => $result_db->email."|".$result_db->remember_token."|".$result_db->name]);
    
        return back();
    
      } else
        return redirect('/');
    }catch (\Exception $e){ return redirect('/'); }
  }
  
  public function personal_data_password(PasswordEdit $request)
  {
    try{
      $user_data = $request->validated();
    
      $data = explode('|', session('remember'));
      $result_db = User::where('remember_token', $data[1])->first();
    
      if ($result_db){
        $result_db->password = Hash::make($user_data['password']);
        $result_db->save();
        
        return back();
      
      } else
        return redirect('/');
    }catch (\Exception $e){ return redirect('/'); }
  }
}
