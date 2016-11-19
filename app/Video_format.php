<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Video_format.
 *
 * @author  The scaffold-interface created at 2016-10-29 05:03:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Video_format extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'video_formats';

    public function getAllExt()
    {
    	$video_formats = Video_format::all()->toArray();

        $all_video_formates = collect(array_pluck($video_formats,'video_format_extension'));

        $all_video_formates_ext = $all_video_formates->map(function ($item, $key) {
		    return ".".$item;
		});

		$all_video_formates_ext_arr = $all_video_formates_ext->toArray();

        $video_format_ext_list = implode(",",$all_video_formates_ext_arr);

        return $video_format_ext_list;
    }
	
}
