@extends("layouts.app")

@section("content")
    <h1>Bikin Artikel Baru</h1>

    <form action="/blog" method="post" enctype="multipart/form-data">
    @csrf
    <x-input field="title" label="Judul" type="text" />
    <x-textarea field="subject" label="Subject" />

    <x-input field="tag" label="Tag" type="text" />
    

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    <script>
        const inputTag=document.querySelector("#tag");
        async function tags(){
            const res=await fetch("http://laravel-relational.test/tags",{
                method:"GET"
            })
            if(!res.ok) return console.log("Gagal mengambil data");
            const result=await res.json();

            const data=[];
            result.forEach(tag => data.push(tag.title));
            new Tagify(inputTag,{
                whitelist:data
            });
        }
        tags()
    </script>
@endsection