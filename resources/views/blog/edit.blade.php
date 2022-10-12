@extends("layouts.app")

@section("content")
    <h1>Edit Blog</h1>
    <form action="/blog/{{$blog->id}}" method="post">
    @csrf
    @method("PUT")

    <x-input field="title" label="Judul" type="text" value="{{$blog->title}}" />
    
    <x-textarea field="subject" label="Subject"  value="{{$blog->subject}}"/>
    
    <x-input field="tag" label="Tag" type="text" />
    
    <script>
        const inputTag=document.querySelector("#tag");
        let tagify=new Tagify(inputTag,{
            whitelist:["HTML","CSS","JAVASCRIPT"]
        })
        let tags=[];

        @foreach($blog->tag as $tag)
            tags.push("{{$tag->title}}")
        @endforeach

        tagify.addTags(tags);
    </script>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection