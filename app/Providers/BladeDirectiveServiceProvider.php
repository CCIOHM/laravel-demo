<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeDirectiveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Illuminate\Support\Facades\Blade
        // View Blade @route('welcome', ['name' => 'Taylor'])
        // $expression = "'welcome', ['name' => 'Taylor']"

        Blade::directive('route', function ($expression) {
            return "<?php echo route(".$expression."); ?>";
        });

        Blade::directive('debug', function ($expression) {
            return "<?php echo dd($expression); ?>";
        });

        Blade::directive('mix', function ($expression) {
            return "<?php echo e(mix($expression)); ?>";
        });

        // View Blade : @displayUrls(['home', 'about', 'contact'])
        Blade::directive('displayUrls', function ($expression) {
            return <<<EOF
<?php 
    foreach ($expression as \$url) {
        echo "<a href='\$url'>\$url</a><br>"; 
    }
?>
EOF;
        });
    }
}
