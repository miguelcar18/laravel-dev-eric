<?php

namespace Packages\Admin\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeDirectivesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('jwt_field', function ($expression) {
            // return Form::hidden('token', jwtokenString(), []);
            return '<?php echo "<input name=\"token\" type=\"hidden\" value=\"" . jwtokenString() . "\">"; ?>';
        });
    }

    public function register()
    {
        //
    }
}
