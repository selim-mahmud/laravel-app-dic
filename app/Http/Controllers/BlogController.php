<?php

namespace App\Http\Controllers;


use App\Post;

class BlogController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getPublishedPosts()
    {
        $publishedPosts = $this->post->published()->orderBy('created_at', 'DESC')->paginate(5);
        return view('blog.blog_list', compact('publishedPosts'));
    }

}
