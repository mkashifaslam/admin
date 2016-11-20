<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideoFormatMimeTypeInVideoFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_formats', function (Blueprint $table) {
            $table->string('video_format_mime_type')->after('video_format_extension');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_formats', function (Blueprint $table) {
            $table->dropColumn('video_format_mime_type');
        });
    }
}
