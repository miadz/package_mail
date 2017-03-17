<?php

namespace Foostart\Mail;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class MailServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/mail_admin.php' => config_path('mail_admin.php'),
        ],'config');

        $this->loadViewsFrom(__DIR__ . '/views', 'mail');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'mail');


        /**
         * Load view composer
         */
        $this->mailViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\Mail\Controllers\Admin\MailAdminController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'mail');
    }

    /**
     *
     */
    public function mailViewComposer(Request $request) {

        view()->composer('mail::mail*', function ($view) {
            global $request;
            $mail_id = $request->get('id');
            $is_action = empty($mail_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * mails
                 */
                //Compose
                trans('mail::mail_admin.compose') => [
                    'url' => URL::route('admin_mail.compose'),
                    "icon" => '<i class="fa fa-paper-plane"></i>'
                ],
                //mail contact
                trans('mail::mail_admin.inbox') => [
                    'url' => URL::route('admin_mail.mail_contact'),
                    "icon" => '<i class="fa fa-inbox"></i>'
                ],
                //mail history
                trans('mail::mail_admin.mail_sent') => [
                    'url' => URL::route('admin_mail.mail_sent'),
                    "icon" => '<i class="fa fa-inbox"></i>'
                ],
                //list
                trans('mail::mail_admin.contact') => [
                    'url' => URL::route('admin_mail'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],                                
            ]);
            //
        });
    }

}
