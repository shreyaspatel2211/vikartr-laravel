<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMessageTemplateInMessageLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('message_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('message_template_id');
            $table->foreign('message_template_id')->references('id')->on('message_templates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('message_logs', function (Blueprint $table) {
            $table->dropForeign(['message_template_id']);
            $table->dropColumn('message_template_id');
        });
    }
}
