<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            "subject" => "required"
        ]);

        $blog=Blog::find($id)->comments()->create([
           "subject" => $request->subject,
           "user_id" => Auth::user()->id
        ]);

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comment=BlogComment::find($id);
        return view("blog.comment-edit", compact("comment"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "subject" => "required"
        ]);

        $comment=BlogComment::find($id);

        $comment->update([
            "subject" => $request->subject
        ]);

        if($comment->user_id != Auth::user()->id)
            abort(403);
            
        return redirect("blog/".$comment->blog->slug);
    }

    public function destroy($id)
    {
        //
    }
}
