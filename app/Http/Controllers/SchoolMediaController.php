<?php

namespace App\Http\Controllers;

use App\Helpers\MediaHelper;
use App\School;
use App\SchoolMedias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolMediaController extends Controller
{
    protected $mediaHelper;
    protected $schoolMedia;

    public function __construct(MediaHelper $mediaHelper, SchoolMedias $schoolMedia)
    {
        $this->mediaHelper = $mediaHelper;
        $this->schoolMedia = $schoolMedia;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolMedias = School::find(Auth::user()->school_id)->medias;
        return view('school.medias.index', compact('schoolMedias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|max:5000',
        ]);
        if ($request->file('photo')->isValid()) {
            $path = $this->mediaHelper->savePhoto(str_random(20), config('dic.school_media_path').'/'.Auth::user()->school_id);
            $schoolMedia = $this->schoolMedia->create([
                'school_id' => Auth::user()->school_id,
                'media_type' => 'image',
                'url' => $path
            ]);
            if($schoolMedia){
                return redirect('school/medias')->with('alert-success', 'You have successfully added an image.');
            }
        }
        return redirect('school/medias')->with('alert-danger', 'Something wrong happened, please try again later.');
    }

    /**
     * delete a media
     *
     * @param $mediaId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($mediaId)
    {
        $schoolMedia = $this->schoolMedia->find(intval($mediaId));
        if($schoolMedia->school_id !== Auth::user()->school_id){
            return redirect()->back();
        }
        $path = $schoolMedia->url;
        if($schoolMedia->delete()){
            Storage::delete($path);
            return redirect('/school/medias')->with('alert-success', 'You have successfully deleted the image.');
        }
        return redirect('/school/medias')->with('alert-warning', 'Something wrong happened, please try again later.');
    }

}
