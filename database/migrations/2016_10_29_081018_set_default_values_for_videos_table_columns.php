<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetDefaultValuesForVideosTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->biginteger('video_total_views')->default(0)->change();
            $table->biginteger('video_total_comments')->default(0)->change();
            $table->biginteger('video_total_likes')->default(0)->change();
            $table->biginteger('video_total_share_facebook')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->biginteger('video_total_views')->change();
            $table->biginteger('video_total_comments')->change();
            $table->biginteger('video_total_likes')->change();
            $table->biginteger('video_total_share_facebook')->change();
        });
    }
}
