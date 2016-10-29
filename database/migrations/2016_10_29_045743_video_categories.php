<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Video_categories.
 *
 * @author  The scaffold-interface created at 2016-10-29 04:57:44am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class VideoCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('video_categories',function (Blueprint $table){

        $table->increments('id');
        
        $table->integer('category_id');
        
        $table->String('category_name');
        
        $table->String('category_description');
        
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
        Schema::drop('video_categories');
    }
}
