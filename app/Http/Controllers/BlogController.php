<?php

namespace App\Http\Controllers;


use App\Category;
use App\Post;

class BlogController extends Controller
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * @var Category
     */
    protected $category;

    /**
     * BlogController constructor.
     * @param Post $post
     * @param Category $category
     */
    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPublishedPosts()
    {
        $publishedPosts = $this->post->published()->orderBy('created_at', 'DESC')->paginate(5);
        return view('blog.blog_list', compact('publishedPosts'));
    }

    /**
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSinglePost(string $slug)
    {
        $publishedPost = $this->post->findBySlug($slug);
        if ($publishedPost->published == 'No') {
            abort(404);
        }
        return view('blog.single', compact('publishedPost'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategories()
    {
        return view('blog.categories');
    }

    /**
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategoryPost(string $category)
    {
        $category = $this->category->findByName(ucwords(str_replace('-', ' ', $category)));
        $publishedPosts = $category->posts()->published()->orderBy('created_at', 'DESC')->paginate(5);
        return view('blog.blog_list_category', compact('publishedPosts'));
    }

}
