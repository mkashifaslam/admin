<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Video.
 *
 * @author  The scaffold-interface created at 2016-10-15 07:22:54am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Video extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'videos';

	public function category()
    {
        return $this->hasOne('App\Video_category', 'category_id', 'video_category_id');
    }

	public function format()
    {
        return $this->hasOne('App\Video_format', 'video_format_id', 'video_type_id');
    }

    public function getLastVideoId()
    {
        $video_id = 1;

        $total_videos = $this::all()->count();

        if($total_videos > 0) {

            $video = $this::select("video_id")->orderBy("id","desc")->take(1)->get();

            if(!empty($video)) {
                $video_id += $video[0]['video_id'];
            }
        }

        return $video_id;
    }

	
}
