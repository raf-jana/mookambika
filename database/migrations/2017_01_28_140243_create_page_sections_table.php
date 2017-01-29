<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSectionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('page_section', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id');
            $table->unsignedInteger('section_id');
            $table->string('section_title');
            $table->text('content');
            $table->unsignedMediumInteger('sequence')->default(1);
            $table->boolean('status')->default(true);
            $table->boolean('mobile_enabled')->default(true)->comment('Show in mobile or not');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::dropIfExists('page_section');
    }

}
