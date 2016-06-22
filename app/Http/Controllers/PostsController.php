<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Like;
use Laracasts\Flash\Flash;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->content = $request['content'];
        if($request->user()->posts()->save($post)){
          Flash::success("Post was created.");

        }else{
          Flash::error("Post has a error.");

        }
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postLike(Request $request)
    {
        $post_id = $request['postId'];
        $isLike = $request['isLike'] === 'true';
        $update = false; //to know if i have to create a new like o edit one.
        $post = Post::find($post_id);

        if(!$post){
            return response()->json(['message' => 'Not post found']);
        }
        $user = Auth::user();

        $like = $user->likes()->where('post_id', $post_id)->first();
        

        if($like){
            $already_like = $like->like;
            $update = true; // if already like.
            if($already_like == $isLike){
                $like->delete();
                return response()->json(['message' => 'Post Deleted']);

            }
        }else{
            $like = new Like();
        }

        $like->like = $isLike;
        $like->user_id = $user->id;
        $like->post_id = $post->id;

        if($update){
            $like->update();
             return response()->json(['message' => 'Post Update']);
        }else{
            $like->save();
            return response()->json(['message' => 'Like Save']);
        }

        return null;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
      $post = Post::find($request['postId']);
      
      $post->content = $request['content'];
      $post->update();
      return response()->json(['new_content' => $post->content,200]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
            $post = Post::find($id);
            if($post->user() != Auth::user()){
                return redirect()->back();
            }
            $post->delete();
            Flash::success("Post <strong>".$post->name."</strong> was deleted.");
            return redirect()->route('welcome');            
        }else{
            Flash::error("Error deleting.");
            return redirect()->route('welcome');
        }
    }
}
