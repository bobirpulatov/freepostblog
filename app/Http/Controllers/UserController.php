<?php

namespace App\Http\Controllers;

use App\Custom\Posts;
use App\Http\Requests\Post;
use Illuminate\Http\Request;
use App\Custom\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
  public function index(){
    return view('users.index');
  }

  public function add_post(){
    return view('users.add_post');
  }

  public function insert_post(Post $request){
    $result = $request->validated();

    $user_email = explode('|', session('remember'))[0];
    $user_data = User::where('email', '=', $user_email)->first();

    if ($user_data->id < 1)
      return redirect('/');

    $file = $request->file('image');

    // Filename is hashed filename + part of timestamp
    $hashedName = hash_file('md5', $file->path());

    $newFilename = "images/".$hashedName . rand(1, 500) . '.' . $file->getClientOriginalExtension();

    Storage::disk('public')->put($newFilename, file_get_contents($file));

    $post = new Posts();

    $post->user_id = $user_data->id;
    $post->title = $result['title'];
    $post->img = $newFilename;
    $post->description = $request['description'];
    $post->created_at = date("Y-m-d H:i:s");
    $post->updated_at = date("Y-m-d H:i:s");

    $post->save();

    return redirect('/user/');
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

    Storage::disk('public')->delete($data->img);

    DB::table('posts')->delete($data->id);

    return redirect('/user/');

  }
}
