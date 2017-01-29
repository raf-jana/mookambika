<?php

namespace App\Providers;

use Validator;
use App\Models\Faq;
use App\Models\News;
use App\Models\Review;
use App\Services\CustomValidation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new CustomValidation($translator, $data, $rules, $messages);
        });
        // Mask too long key error
        Schema::defaultStringLength(191);

        Relation::morphMap([
            'news' => News::class,
            'faqs' => Faq::class,
            'reviews' => Review::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
