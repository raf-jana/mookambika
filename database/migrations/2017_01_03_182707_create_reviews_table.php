<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('last_user_id');
            $table->string('reviewer_name');
            $table->string('reviewer_picture_uri')->nullable();
            $table->string('reviewer_designation')->nullable();
            $table->string('reviewer_organization')->nullable();
            $table->string('reviewer_location')->nullable();
            $table->text('content');
            $table->float('rating', 2, 1);
            $table->timestamp('published_at')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('reviews');
    }

}
