<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactUsFormSubmit;
use App\Post;
use App\School;
use App\Subscribe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * @var Post
     */
    protected $post;

    /**
     * @var School
     */
    protected $school;

    /**
     * BlogController constructor.
     * @param Post $post
     */
    public function __construct(Post $post, School $school)
    {
        $this->post = $post;
        $this->school = $school;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $publishedPosts = $this->post->published()->orderBy('created_at', 'DESC')->paginate(3);
        $schools = $this->school->orderBy('created_at', 'DESC')->paginate(4);
        return view('pages.home', compact('publishedPosts', 'schools'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactUs()
    {
        return view('pages.contact');
    }

    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendContactUs(ContactRequest $request)
    {
        $formData = $request->all();
        Mail::to(config('dic.contact_form_email_recipient'))->queue(new ContactUsFormSubmit($formData));
        return redirect()->back()->with('alert-success', 'Your message has been sent successfully.');
    }

    /**
     * @param ContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendContactUsFooter(ContactRequest $request)
    {
        $formData = $request->all();
        Mail::to(config('dic.contact_form_email_recipient'))->queue(new ContactUsFormSubmit($formData));
        return redirect('contact-us')->with('alert-success', 'Your message has been sent successfully.');
    }

    public function subscribe(Request $request, Subscribe $subscribe)
    {
        $this->validate($request, [
            'signup_email' => 'required|email',
        ]);
        $subscribe = $subscribe->create([
            'email' => $request->get('signup_email')
        ]);

        if ($subscribe) {
            return redirect('about-us')->with('alert-success', 'You have successfully subscribe for DIC update.');
        }
        return redirect('about-us')->with('alert-success', 'Something wrong happened, please try again later.');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutUs()
    {
        return view('pages.about');
    }

    public function privacyPolicy()
    {
        return view('pages.privacy');
    }

}