<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteConfigurationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('site_configurations', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('label');
            $table->string('key');
            $table->text('value');
            $table->unsignedTinyInteger('sequence');
            $table->string('field_type')->default('text')->comment('input,text');
            $table->boolean('editable')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('site_configurations');
    }

}
