<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $guarded=["id"],
              $with=["user"];
              
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
