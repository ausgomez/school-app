<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourseIdToAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Add course id to announcements */
        Schema::table('announcements', function (Blueprint $table) {
            $table->integer('course_id');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Remove course id to announcements */
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn('course_id');
        });
    }
}
