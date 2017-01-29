<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHttpRequestLogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('http_request_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 100)->default('web')->index();
            $table->unsignedBigInteger('ip')->nullable();
            $table->string('url')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->text('request_body')->nullble();
            $table->string('request_method')->nullable();
            $table->string('responded_with')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('success', 10)->nullabe();

            // Timestamps
            $table->timestamp('requested_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('http_request_logs');
    }

}
