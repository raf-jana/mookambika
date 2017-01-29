<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('last_user_id');
            $table->string('title');
            $table->text('content');
            $table->string('meta_description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Soft delete
            $table->unsignedTinyInteger('deleted')->default(0)->index()->comment('Deleted status');
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('faqs');
    }

}
