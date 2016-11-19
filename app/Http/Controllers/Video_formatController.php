<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Video_format;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Video_formatController.
 *
 * @author  The scaffold-interface created at 2016-10-29 05:03:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Video_formatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = env('VIDEO_LIST_PAGE_SIZE');
        
        $video_formats = Video_format::paginate($pageSize);

        return view('video_format.index',compact('video_formats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $video_format = Video_format::select("video_format_id")->orderBy("id","desc")->take(1)->get();

        $video_format_id = 0;
        
        if(!empty($video_format)) {
            $video_format_id = $video_format[0]['video_format_id'] + 1;
        }
        
        return view('video_format.create', compact('video_format_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video_format = new Video_format();

        
        $video_format->video_format_id = $request->video_format_id;

        
        $video_format->video_format_name = $request->video_format_name;

        
        $video_format->video_format_decscription = $request->video_format_decscription;

        
        $video_format->video_format_coding = $request->video_format_coding;

        
        $video_format->video_format_extension = $request->video_format_extension;

        
        
        $video_format->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new video_format has been created !!']);

        return redirect('video_format');
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
            return URL::to('video_format/'.$id);
        }

        $video_format = Video_format::findOrfail($id);
        return view('video_format.show',compact('video_format'));
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
            return URL::to('video_format/'. $id . '/edit');
        }

        
        $video_format = Video_format::findOrfail($id);
        return view('video_format.edit',compact('video_format'  ));
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
        $video_format = Video_format::findOrfail($id);
    	
        $video_format->video_format_id = $request->video_format_id;
        
        $video_format->video_format_name = $request->video_format_name;
        
        $video_format->video_format_decscription = $request->video_format_decscription;
        
        $video_format->video_format_coding = $request->video_format_coding;
        
        $video_format->video_format_extension = $request->video_format_extension;
        
        
        $video_format->save();

        return redirect('video_format');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/video_format/'. $id . '/delete/');

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
     	$video_format = Video_format::findOrfail($id);
     	$video_format->delete();
        return redirect('video_format');
    }
}
