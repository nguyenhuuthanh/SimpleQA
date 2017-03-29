<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('topic_id')->references('id')->on('topics');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('answer_id')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('answers_user_id_foreign');
        $table->dropForeign('questions_user_id_foreign');
        $table->dropForeign('rates_user_id_foreign');
        $table->dropForeign('questions_topic_id_foreign');
        $table->dropForeign('answers_question_id_foreign');
        $table->dropForeign('rates_answer_id_foreign');
    }
}
