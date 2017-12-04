<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_domain', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain');
        });
        Schema::create('dc_domain_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id');
            $table->string('name');
            $table->text('comment');
            $table->tinyInteger('status');
            $table->tinyInteger('type');
            $table->string('e_mail');
            $table->tinyInteger('rate');
            $table->timestamp('date');
        });
        Schema::create('dc_domain_text', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id');
            $table->integer('text_id');
        });
        Schema::create('dc_parse_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id');
            $table->json('alexa_rank')->nullable()->default(NULL);
            $table->json('whois')->nullable()->default(NULL);
            $table->json('geo')->nullable()->default(NULL);
            $table->json('reverse_ip')->nullable()->default(NULL);
            $table->json('alexa_map')->nullable()->default(NULL);
            $table->json('traffic')->nullable()->default(NULL);
            $table->unique('domain_id')->nullable()->default(NULL);
        });
        Schema::create('dc_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id');
            $table->unsignedInteger('ip');
            $table->tinyInteger('rate');
        });
        Schema::create('dc_text', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->tinyInteger('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dc_domain');
        Schema::dropIfExists('dc_domain_comment');
        Schema::dropIfExists('dc_domain_text');
        Schema::dropIfExists('dc_parse_data');
        Schema::dropIfExists('dc_rates');
        Schema::dropIfExists('dc_text');
    }
}
