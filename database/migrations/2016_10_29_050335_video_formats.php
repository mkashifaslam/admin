<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Video_formats.
 *
 * @author  The scaffold-interface created at 2016-10-29 05:03:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class VideoFormats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('video_formats',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('video_format_id');
        
        $table->String('video_format_name');
        
        $table->String('video_format_decscription');
        
        $table->String('video_format_coding');
        
        $table->String('video_format_extension');
        
        /**
         * Foreignkeys section
         */
        
        
        $table->timestamps();
        
        
        $table->softDeletes();
        
        // type your addition here

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('video_formats');
    }
}
