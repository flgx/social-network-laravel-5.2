@extends('layouts.master')
@section('title','Dashboard')
@section('content')
@include('partials.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>Antares</h3>
            </header>

            <form action="{{route('post.store')}}" method="post">
                <div class="form-group">
                    <textarea name="content" class="form-control" id="new-post" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Chat en vivo</h3></header>
            @foreach($posts as $post)
                <article class="post" data-postid={{$post->id}}>
                    <p class="post-content">{{$post->content}}</p>
                    <div class="info">
                     Enviado por: {{$post->user->name}} a las {{$post->created_at}}
                    </div>
                    <div class="interaction">
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like' }}</a> |
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike' }}</a> |
                        @if($post->user == Auth::user())                        
                            <a href="#" class="edit">Edit</a> |
                            <a href="{{route('post.destroy',$post->id)}}">Delete</a> 
                        @endif                        
                        <a href="#"></a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <div id="edit-modal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Post</h4>
          </div>
          <div class="modal-body">
                <div class="form-group">
                    <textarea name="content" class="form-control" id="edit-post-content" cols="30" rows="5"></textarea>
                </div>
                <button type="button" id="modal-save" class="btn btn-primary">Edit Post</button>
          </div>
          <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <script>
        var token = '{{Session::token()}}';
        var urlEdit = '{{route('post.edit')}}';
        var urlLike = '{{route('post.like')}}';
    </script>
@endsection
