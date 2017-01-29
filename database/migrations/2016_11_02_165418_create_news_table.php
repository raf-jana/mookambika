<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('last_user_id');
            $table->string('title');
            $table->text('summary');
            $table->text('content');
            $table->string('meta_description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->string('slug')->unique();

            // Timestamps
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
        Schema::dropIfExists('news');
    }

}
