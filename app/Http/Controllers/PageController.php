<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactUsFormSubmit;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    /**
     * /* function to display home page
     * /*
     * /* @return pages.home views
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * /* function to display contact us page
     * /*
     * /* @return pages.home views
     */
    public function contactUs()
    {
        return view('pages.contact');
    }

    public function sendContactUs(ContactRequest $request)
    {
        $formData = $request->all();
        Mail::to(config('dic.contact_form_email_recipient'))->queue(new ContactUsFormSubmit($formData));
        return redirect()->back()->with('alert-success', 'Your message has been sent successfully.');
    }

    public function sendContactUsFooter(ContactRequest $request)
    {
        $formData = $request->all();
        Mail::to(config('dic.contact_form_email_recipient'))->queue(new ContactUsFormSubmit($formData));
        return redirect()->back()->with('alert-success', 'Your message has been sent successfully.');
    }

}