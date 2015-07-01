<?php namespace cashback\Providers;

use cashback\Constants;
use cashback\Offer;
use cashback\Store;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//

        view()->composer('app',function($view){
            $view->with('all_stores',Store::ordered())->with('all_categories',Constants::availableCategories());
        });
        view()->composer('general.featured_offers',function($view){
            $view->with('featured_offers',Offer::featuredOffers());
        });
        view()->composer('general.featured_stores',function($view){
            $view->with('featured_stores',Store::featured());
        });
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'cashback\Services\Registrar'
		);
	}

}
