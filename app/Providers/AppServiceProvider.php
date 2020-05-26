<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        VerifyEmail::toMailUsing(function ($notifiablr, $url) {
            return (new MailMessage)
                ->subject('ایمل تایید حساب کاربری')
                ->view('front.mails.verification', compact('url'));
        });
    }
}
