<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Input;
use Validator;
use Redirect;
use Session;

/**
 * Class VideoController.
 *
 * @author  The scaffold-interface created at 2016-10-15 07:22:54am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('video.create');
    }

    /**
     * Show the form for uploading a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function upload()
    {
        
        return view('video.upload');
    }

    public function uploadVideo(Request $request) {
        // getting all of the post data
        $file = array('video' => $request->file('video'));
        // setting up rules
        $rules = array('video' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('video/upload')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if ( $request->file('video')->isValid()) {
            $destinationPath = 'uploads'; // upload path
            $extension = $request->file('video')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $request->file('video')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            Session::flash('success', 'Upload successfully'); 
            return Redirect::to('video');
            }
            else {
            // sending back with error message.
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('video/upload');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();

        
        $video->video_id = $request->video_id;

        
        $video->video_title = $request->video_title;

        
        $video->video_description = $request->video_description;

        
        $video->video_category = $request->video_category;

        
        $video->video_type = $request->video_type;

        
        $video->video_upload_date = $request->video_upload_date;

        
        $video->video_total_views = $request->video_total_views;

        
        $video->video_upload_user_id = $request->video_upload_user_id;

        
        $video->video_delete_date = $request->video_delete_date;

        
        
        $video->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new video has been created !!']);

        return redirect('video');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('video/'.$id);
        }

        $video = Video::findOrfail($id);
        return view('video.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('video/'. $id . '/edit');
        }

        
        $video = Video::findOrfail($id);
        return view('video.edit',compact('video'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $video = Video::findOrfail($id);
    	
        $video->video_id = $request->video_id;
        
        $video->video_title = $request->video_title;
        
        $video->video_description = $request->video_description;
        
        $video->video_category = $request->video_category;
        
        $video->video_type = $request->video_type;
        
        $video->video_upload_date = $request->video_upload_date;
        
        $video->video_total_views = $request->video_total_views;
        
        $video->video_upload_user_id = $request->video_upload_user_id;
        
        $video->video_delete_date = $request->video_delete_date;
        
        
        $video->save();

        return redirect('video');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/video/'. $id . '/delete/');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$video = Video::findOrfail($id);
     	$video->delete();
        return URL::to('video');
    }
}
