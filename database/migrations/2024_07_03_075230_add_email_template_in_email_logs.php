<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailTemplateInEmailLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('email_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('email_template_id');
            $table->foreign('email_template_id')->references('id')->on('email_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('email_logs', function (Blueprint $table) {
            $table->dropForeign(['email_template_id']);
            $table->dropColumn('email_template_id');
        });
    }
}
