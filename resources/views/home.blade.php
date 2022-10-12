@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(Auth::user()->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Daftar Tulisan:</p>
                    @foreach($user->blogs as $blog)
                        <li><a href="/blog/{{$blog->slug}}">{{$blog->title}}</a></p>
                    @endforeach

                    <p>Daftar Sosial:</p>
                    @foreach($user->socials as $social)
                        <li>{{$social->provider.":".$social->username}}</p>
                    @endforeach

                    <p>Daftar Course:</p>
                    @if(count($user->courses) == 0)
                        <a href="/course" class="btn btn-primary">Join Course</a>
                    @endif

                    @foreach($user->courses as $course)
                        <li><a href="/course/{{$course->slug}}">{{$course->title}}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
