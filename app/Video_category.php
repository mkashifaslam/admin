<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Video_category.
 *
 * @author  The scaffold-interface created at 2016-10-29 04:57:44am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Video_category extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'video_categories';

	
}
