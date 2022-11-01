<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;

class PictureController extends Controller
{
    /**
     * Display a listing of all submitted dogs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = Picture::all();

        return view('index', ['pictures' => $pictures]);
    }

    /**
     * Show the form for uploading a new dog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Handle the form submission and save the uploaded dog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the file locally
        $request->file->store('public');

        // Store the record
        $picture = new Picture([
            "name" => $request->get('name'),
            "file_path" => $request->file->hashName()
        ]);
        $picture->save(); // Save the record.

        return $this->index();
    }

    /**
     * Upvote a dog by ID
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upvote(Request $request, Picture $picture)
    {
        $picture->votes = $picture->votes + 1;
        $picture->save();

        return $this->index();
    }

    // public function delete($id)
    // {
    //     $picture = Picture::find($id);
    //     $picture->delete();

    //     return $this->index();
    // }
}
