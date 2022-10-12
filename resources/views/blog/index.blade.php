@extends('layouts.app')

@section("content")
    <h1>Halaman Blog</h1>
    @foreach ($blogs as $blog)
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title"><a href="/blog/{{$blog->slug}}">{{$blog->title}}</a></h2>
                <h6 class="card-subtitle mb-3 text-muted">Dibuat oleh {{$blog->user->name}}</h6>
                <p>Tag :   
                    @foreach($blog->tag as $tag)
                        {{$tag->title}}
                    @endforeach
                </p>
               
                <p>{{$blog->subject}}</p>
            </div>
        </div>
    @endforeach
@endsection