<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;


class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        return view('photos.create')->with('album_id', $album_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'photo' => 'image|max:1999 ',
      ]);

      // get file name
      $filenameWithExt = $request->file('photo')->getClientOriginalName();
      $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

      // get file extension
      $extension = $request->file('photo')->getClientOriginalExtension();

      // create new filename
      $filenameToStore = $filename . '_' . time() . '.' . $extension;

      // upload image
      $path = $request->file('photo')->storeAs('public/photos/' . $request->input('album_id'), $filenameToStore);

      // create album
      $photo = new Photo;
      $photo->album_id = $request->input('album_id');
      $photo->title = $request->input('title');
      $photo->description = $request->input('description');
      $photo->size = $request->file('photo')->getClientSize();
      $photo->photo = $filenameToStore;

      $photo->save();

      return redirect('/albums/' . $request->input('album_id'))->with('success', 'Photo Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);

        if (Storage::delete('public/photos/' . $photo->album_id . '/' . $photo->photo)) {
          $photo->delete();
          return redirect('/')->with('success', 'Photo Deleted');
        }
    }

}
