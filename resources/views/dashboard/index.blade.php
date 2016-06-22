@extends('layouts.master')
@section('title','Dashboard')
@section('content')
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
    <div class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Chat en vivo</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptatum, asperiores illum officia qui a suscipit voluptates quis officiis, est aspernatur adipisci recusandae ipsa sit. Quis incidunt possimus vel, nemo!</p>
                <div class="info">
                    Enviado por: Francisco a las 21.00hs
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edite</a>
                    <a href="#">Delete</a>
                    <a href="#"></a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptatum, asperiores illum officia qui a suscipit voluptates quis officiis, est aspernatur adipisci recusandae ipsa sit. Quis incidunt possimus vel, nemo!</p>
                <div class="info">
                    Enviado por: Francisco a las 21.00hs
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edite</a>
                    <a href="#">Delete</a>
                    <a href="#"></a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptatum, asperiores illum officia qui a suscipit voluptates quis officiis, est aspernatur adipisci recusandae ipsa sit. Quis incidunt possimus vel, nemo!</p>
                <div class="info">
                    Enviado por: Francisco a las 21.00hs
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edite</a>
                    <a href="#">Delete</a>
                    <a href="#"></a>
                </div>
            </article>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit voluptatum, asperiores illum officia qui a suscipit voluptates quis officiis, est aspernatur adipisci recusandae ipsa sit. Quis incidunt possimus vel, nemo!</p>
                <div class="info">
                    Enviado por: Francisco a las 21.00hs
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edite</a>
                    <a href="#">Delete</a>
                    <a href="#"></a>
                </div>
            </article>
        </div>
    </div>
@endsection
