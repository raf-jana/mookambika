<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('generic_id')->unique()->comment('Its like order id');
            $table->unsignedInteger('user_id')->index()->comment('Booked by admin guys');
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile_number')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('status', 50)->default('Pending')->comment('Pending, Invoiced,Paid, Booked, Cancelled');
            $table->timestamp('last_replied_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('requests');
    }

}
