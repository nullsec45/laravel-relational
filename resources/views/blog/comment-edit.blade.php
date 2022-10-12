@extends("layouts.app")

@section("content")
    <h1>Edit Komentar</h1>
    <form action="/comments/{{$comment->id}}" method="post">
    @csrf
    @method("PUT")

    <x-textarea field="subject" label="Subject"  value="{{$comment->subject}}"/>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection