<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignReportedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_reported_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_info_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reported_by_id');
            $table->string('date_of_blocked')->nullable();
            $table->string('date_of_unblocked')->nullable();
            $table->foreign('report_info_id')->references('id')->on('report_infos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reported_by_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->default('log');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_reported_users');
    }
}
