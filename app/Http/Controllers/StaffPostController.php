<?php

namespace App\Http\Controllers;

use App\Category;
use App\Helpers\MediaHelper;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StaffPostController extends Controller
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * @var MediaHelper
     */
    protected $mediaHelper;

    /**
     * StaffPostController constructor.
     * @param Post $post
     */
    public function __construct(Post $post, MediaHelper $mediaHelper)
    {
        $this->post = $post;
        $this->mediaHelper = $mediaHelper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('staff.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategoryId = 0;
        $published = '';
        $categories = Category::all();
        return view('staff.posts.create', compact('categories', 'postCategoryId', 'published'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = $this->post->create([
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'published' => $request->published,
        ]);

        if ($post) {
            $photo = $this->mediaHelper->savePhoto('image' . $post->id, config('dic.post_feature_image_path'));
            $thumbnail = '';
            if ($photo != '') {
                $image = $request->file('photo');
                $thumbnail = config('dic.post_feature_image_path') . '/thumbnail' . $post->id . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $img->resize(500, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($thumbnail);
            }
            $post->feature_image = $photo;
            $post->feature_image_thumbnail = $thumbnail;
            if ($post->save()) {
                return redirect('/staff/posts')->with('alert-success', 'You have successfully added a post.');
            }
        }
        return redirect()->back()->with('alert-warning', 'Something wrong happened, please try again later.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->findOrFail(intval($id));
        if ($post) {
            return view('staff.posts.single', compact('post'));
        }
        return redirect('/staff/posts')->with('alert-warning', 'Data you are looking for is not available.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->findOrFail(intval($id));
        $postCategoryId = $post->category_id;
        $published = $post->published;
        $categories = Category::all();
        return view('staff.posts.update', compact('post', 'categories', 'postCategoryId', 'published'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = $this->post->findOrFail(intval($id));
        $post->category_id = $request->category;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->published = $request->published;

        $photo = $this->mediaHelper->savePhoto('image' . $post->id, config('dic.post_feature_image_path'));
        if ($photo != '') {
            $image = $request->file('photo');
            $thumbnail = config('dic.post_feature_image_path') . '/thumbnail' . $post->id . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(500, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnail);
            $post->feature_image = $photo;
            $post->feature_image_thumbnail = $thumbnail;
        }

        if ($post->save()) {
            return redirect('/staff/posts')->with('alert-success', 'You have successfully updated the post.');
        }
        return redirect('/staff/posts')->with('alert-warning', 'Something wrong happened, please try again later.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post->findOrFail(intval($id));
        $image = $post->feature_image;
        $thumbnail = $post->feature_image_thumbnail;
        if ($post->delete()) {
            Storage::delete($image);
            Storage::delete($thumbnail);
            return redirect('/staff/posts')->with('alert-success', 'You have successfully deleted the post.');
        }
        return redirect('/staff/posts')->with('alert-warning', 'Something wrong happened, please try again later.');

    }
}
