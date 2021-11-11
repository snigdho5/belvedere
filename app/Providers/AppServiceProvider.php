<?php



namespace App\Providers;



use App\layouts;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

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

    public function boot(UrlGenerator $url)
    {
        
        // if(env('REDIRECT_HTTPS'))
        // {
          $url->forceScheme('https');
        // }

        //if (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        //}
        $layoutData = layouts::first()->toArray();
        defined('layoutDataData') or define('layoutDataData', $layoutData);
    }
}
