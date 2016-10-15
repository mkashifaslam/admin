<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Videos.
 *
 * @author  The scaffold-interface created at 2016-10-15 07:22:54am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Videos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('videos',function (Blueprint $table){

        $table->increments('id');
        
        $table->biginteger('video_id');
        
        $table->String('video_title');
        
        $table->longText('video_description');

        $table->longText('video_storage_path');
        
        $table->integer('video_category_id');
        
        $table->integer('video_type_id');
        
        $table->biginteger('video_total_views');

        $table->biginteger('video_total_comments');

        $table->biginteger('video_total_likes');

        $table->biginteger('video_total_share_facebook');
        
        $table->biginteger('video_upload_user_id');
        
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
        Schema::drop('videos');
    }
}
