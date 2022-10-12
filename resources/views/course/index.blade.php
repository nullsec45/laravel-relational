@extends('layouts.app')

@section("content")
    <h1>Halaman Course</h1>
    @foreach ($courses as $course)
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title"><a href="/course/{{$course->slug}}">{{$course->title}}</a></h2>
                <p>Tag : {{$course->tag->title}}</p>
                <p>{{$course->subject}}</p>
                @if(Auth::check())
                    @if(Auth::user()->courses->contains($course->id))
                        <a class="btn btn-danger" href="/course/join/{{$course->id}}">Left Course</a>
                    @else
                        <a class="btn btn-primary" href="/course/join/{{$course->id}}">Join</a>
                    @endif
                @endif
            </div>
        </div>
    @endforeach
@endsection