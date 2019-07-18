<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema

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
        Schema::defaultStringLength(191); //NEW: Increase StringLength

        Blade::directive('datetime', function ($expression) {
            if(!empty($expression)){

                return "<?php echo ($expression)->format('d/m/Y'); ?>";

            } else {

                return 'Not provided';
            }
        });

        Blade::directive('presence', function($alias) {
            return "<?php if (in_array(\Request::route()->getName(), config('presence.'.$alias))): ?>";
        });


        Blade::directive('endpresence', function() {
            return '<?php endif; ?>';
        });
    }
}
