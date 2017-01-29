<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('last_user_id');
            $table->string('layout', 100)->default('default');
            $table->string('type')->nullable()->comment('landing, home');
            $table->string('title')->comment('Page title');
            $table->unsignedInteger('footer_id');
            $table->string('footer_title');
            $table->string('color')->default('Pink, gradient');
            $table->string('seo_title')->comment('Page title - SEO');
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('slug')->unique();
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('internal_link_count')->default(0);
            $table->unsignedInteger('external_link_count')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamp('published_at')->nullable();
            // Timestamps
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();

            // Soft delete
            $table->unsignedTinyInteger('deleted')->default(0)->index()->comment('Deleted status');
            $table->softDeletes()->index();
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->foreign('footer_id')->references('id')->on('footers')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign('pages_footer_id_foreign');
        });
        Schema::dropIfExists('pages');
    }

}
