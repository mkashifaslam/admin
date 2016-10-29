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

	
}
