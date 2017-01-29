<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailLogTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('email_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable()->index();
            $table->string('type')->nullable();
            $table->text('data')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->comment('Delivered status');
            $table->timestamp('delivered_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('email_log');
    }

}
