<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Video;
use App\Video_category;
use App\Video_format;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Auth;
use File;
use Input;
use Validator;
use Redirect;
use Session;
use Response;
use Debugbar;
use Thumbnail;

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
        $pageSize = env('VIDEO_LIST_PAGE_SIZE');
        
        $videos = Video::paginate($pageSize);

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
        $video_formats = new Video_format;

        $video_format_list = $video_formats->getAllExt();

        Debugbar::info('video formates : ', $video_format_list);

        return view('video.upload', compact('video_format_list'));
    }

    public function uploadVideo(Request $request) {
        // getting all of the post data
        $file = $request->file;
        // setting up rules
         if (empty($file)) {
            Response::json('error', 400);
        }
        else {
            // checking file is valid.
            if ( !empty($file)) {
                $destinationPath = config('app.video_storage');
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension(); // getting video extension
                $fileOriginalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $strRandom = Str::quickRandom();
                $uploadedFileName = $strRandom.'.'.$extension; // renameing video
                $upload_status    = $file->move($destinationPath, $uploadedFileName); // uploading file to given path
                
                if($upload_status)
                {
                    $thumbnail_path   = config('app.video_thumbnail_storage');
                    $video_path       = $destinationPath.'/'.$uploadedFileName;
                    $thumbnail_image  = $strRandom.".jpg";
                    // set the thumbnail image "palyback" video button
                    //$water_mark           = config('app.video_thumbnail_storage').'/p.png';
                    $water_mark           = '';
                    $thumbnail_img_width  = env('THUMBNAIL_IMAGE_WIDTH');
                    $thumbnail_img_heigth = env('THUMBNAIL_IMAGE_HEIGHT');
                    // get video length and process it
                    // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
                    $time_to_image    = 15;

                    $thumbnail_status = Thumbnail::getThumbnail($video_path,$thumbnail_path,$thumbnail_image,160,128,$time_to_image,$water_mark,false,$thumbnail_img_width,$thumbnail_img_heigth);
                          
                    if($thumbnail_status)
                    {
                        $video_format = Video_format::where('video_format_extension' , $extension)->select('video_format_id')->get();

                        $video_format_id = 0; 
                        $video_category_id = 0;
                        
                        if(!empty($video_format)) {
                            $video_format_id = $video_format[0]["video_format_id"]; 
                        }

                        $video = new Video;
                        $video->video_id = $video->getLastVideoId();
                        $video->video_title = $fileOriginalName;
                        $video->video_description = $fileName;
                        $video->video_storage_path = $uploadedFileName;
                        $video->video_thumbnail_path = $thumbnail_image;
                        $video->video_category_id = $video_category_id;
                        $video->video_type_id = $video_format_id;
                        $video->video_upload_user_id = Auth::user()->id;
                        $video->save();

                        // sending back with message
                        Session::flash('success', 'Upload successfully'); 
                        
                        Response::json('success', 200);
                    }
                    else
                    {
                        Response::json('error', 400);
                    }
                }
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                Response::json('error', 400);
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
        $categories = Video_category::all();
        $formates = Video_format::all();
        return view('video.edit',compact('video', 'categories', 'formates'));
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
        
        $video->video_category_id = $request->video_category_id;
        
        $video->video_type_id = $request->video_type_id;
        
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
        $this->removeVideo($id);
        return redirect('video');
    }

    private function removeVideo($id) 
    {
        $video = Video::findOrfail($id);
        $file_path = config('app.video_storage').'/'.$video->video_storage_path;
        File::delete($file_path);
        $thumbnail_file_path = config('app.video_thumbnail_storage').'/'.$video->video_thumbnail_path;
        File::delete($thumbnail_file_path);
     	$video->delete();
    }
}
