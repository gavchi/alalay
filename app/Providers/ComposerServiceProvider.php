<?php
namespace App\Providers;
use App\Seo;
use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request as Request;

class ComposerServiceProvider extends ServiceProvider
{
        public function boot(Request $request)
    {
        // Using Closure based composers...
        View::composer('layout.main', function($view) use ($request)
        {
            $url = str_replace(config('app.url'), '', $request->url());
            $Seo = Seo::where('url', $url)->first();
            //Добавляем переменные в шаблон
            $view
                //Авторизованный юзер
                ->with('Seo', $Seo);
        });
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }
}