<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs=Blog::with("tag")->orderBy("id","desc")->paginate(10);
        return view("blog.index", compact("blogs"));
    }

    public function create()
    {
        return view("blog.create");
    }

    public function store(Request $request)
    {
        // @dd($request);
        $request->validate([
            "title" => "required|max:255|min:3",
            "subject" => "required|min:10"
        ]);

        $blog=Auth::user()->blogs()->create([
            "title" => $request->title,
            "slug" => Str::slug($request->title,"-"),
            "subject" => $request->subject
        ]);

        
        $blog->tag()->sync($this->getTags($request->tag));
        return redirect("/blog");
    }

    private function getTags($tags){
        // tag
        $tagJson=json_decode($tags);
        $tagTitles=array_column($tagJson,"value");
        $tag_id=[];
        foreach ($tagTitles as $tagTitle){
            $tag=Tag::where("title", $tagTitle)->first();
            array_push($tag_id, $tag->id);
        }
        return $tag_id;
    }
    public function show($slug)
    {
        $blog=Blog::where("slug", $slug)->first();

        if($blog == null)
            abort(404);

        return view("blog.single", compact("blog"));
    }

    public function edit($slug)
    {
        $blog=Blog::where("slug", $slug)->first();
        if($blog->user_id != Auth::user()->id)
            abort(403);
        return view("blog.edit", compact("blog"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:255|min:3",
            "subject" => "required|min:10"
        ]);
        
        $blog=Blog::find($id);
        
        if($blog->user_id != Auth::user()->id)
            abort(403);

        $blog->update([
            "title" => $request->title,
            "slug" => Str::slug($request->title,"-"),
            "subject" => $request->subject
        ]);
        $blog->tag()->sync($this->getTags($request->tag));

        return redirect("/blog");
    }

    public function destroy($id)
    {
        //
    }
}
