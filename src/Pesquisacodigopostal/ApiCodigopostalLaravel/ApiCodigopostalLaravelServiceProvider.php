<?php namespace Pesquisacodigopostal\ApiCodigopostalLaravel;

use Illuminate\Support\ServiceProvider;
use lib\PesquisaCodigoPostalAPI;

class ApiCodigopostalLaravelServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('pesquisacodigopostal/api-codigopostal-laravel');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['pesquisacodigopostal'] = $this->app->share(function()
		{
			return new PesquisaCodigoPostalAPI();
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
