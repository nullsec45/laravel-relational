@extends("layouts.app")

@section("content")
<h1>{{$blog->title}}</h1>
<div>Dibuat oleh {{$blog->user->name}}</div>

<p>{{$blog->subject}}</p>


@if(Auth::check())
    @if(Auth::user()->id == $blog->user_id)
        <a href="/blog/{{$blog->slug}}/edit" class="btn btn-info btn-small">Edit</a>
    @endif
@endif

<hr>

<h3>Komentar</h3>
<form action="/blog/{{$blog->id}}/comments" method="post" enctype="multipart/form-data">
    @csrf
    <x-textarea field="subject" label="Subject" />

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

<h3>Daftar Komentar</h3>
@foreach($blog->comments as $comment)
    <p>{{$comment->subject}} - komentar by <span>{{$comment->user->name}}</span></p> 
    @if(Auth::check())
        @if(Auth::user()->id === $comment->user_id)
            <a href="/comments/{{$blog->id}}/edit" class="btn btn-info">Edit</a>
        @endif
    @endif
@endforeach

@endsection

