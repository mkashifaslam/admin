<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video_category;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Video_categoryController.
 *
 * @author  The scaffold-interface created at 2016-10-29 04:57:44am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Video_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $video_categories = Video_category::all();
        return view('video_category.index',compact('video_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('video_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video_category = new Video_category();

        
        $video_category->category_id = $request->category_id;

        
        $video_category->category_name = $request->category_name;

        
        $video_category->category_description = $request->category_description;

        
        
        $video_category->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new video_category has been created !!']);

        return redirect('video_category');
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
            return URL::to('video_category/'.$id);
        }

        $video_category = Video_category::findOrfail($id);
        return view('video_category.show',compact('video_category'));
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
            return URL::to('video_category/'. $id . '/edit');
        }

        
        $video_category = Video_category::findOrfail($id);
        return view('video_category.edit',compact('video_category'  ));
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
        $video_category = Video_category::findOrfail($id);
    	
        $video_category->category_id = $request->category_id;
        
        $video_category->category_name = $request->category_name;
        
        $video_category->category_description = $request->category_description;
        
        
        $video_category->save();

        return redirect('video_category');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/video_category/'. $id . '/delete/');

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
     	$video_category = Video_category::findOrfail($id);
     	$video_category->delete();
        return redirect('video_category');
    }
}
