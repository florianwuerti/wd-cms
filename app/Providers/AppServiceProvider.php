<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {

		/*	view()->composer( '*', function ( $view ) {

				$viewData = $view->getData()['pages_templates']->getPath();

				$viewExpl = explode( '/', $viewData );

				$view_name = explode( '.', $viewExpl[10], 2 );

				view()->share( 'view_name', $view_name );
			} );
	*/
	}
}
