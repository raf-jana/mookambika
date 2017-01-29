<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('mobile_number', 25)->nullable();
            $table->string('email');
            $table->string('password');
            $table->unsignedMediumInteger('role_id')->index();
            $table->string('role_title', 50)->nullable();
            $table->boolean('status')->default(false);
            $table->string('activation_code')->nullable();
            $table->dateTime('activated_at')->nullable();
            $table->boolean('news_letter_subscribed')->default(false);
            $table->unsignedBigInteger('sign_up_ip')->nullable();
            $table->unsignedBigInteger('sign_in_ip')->nullable();
            $table->boolean('logged_in')->default(false);
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->text('avatar')->nullable();
            $table->string('organization')->nullable();
            $table->string('designation')->nullable();
            $table->rememberToken();

            // Timestamps
            $table->timestamp('last_activity_at')->default(\Carbon\Carbon::now());
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();

            // Soft delete
            $table->unsignedTinyInteger('deleted')->default(0)->index()->comment('Deleted status');
            $table->softDeletes()->index();

            // indices
            $table->unique([
                'email',
                'deleted_at'
            ]);
            $table->unique([
                'mobile_number',
                'deleted_at'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
