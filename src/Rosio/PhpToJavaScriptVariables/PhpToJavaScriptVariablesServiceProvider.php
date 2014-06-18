<?php

namespace Rosio\PhpToJavaScriptVariables;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class PhpToJavaScriptVariablesServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('JSLocalize', function ($app) {
			return new JavaScriptVariableManager();
		});

		$this->app->singleton('JSLocalizeDumper', function ($app) {
			return new JavaScriptDumper($app->make('JSLocalize'));
		});
	}

    public function boot()
    {
        $this->package('rosio/phpToJavaScriptVariables');

        AliasLoader::getInstance()->alias(
            'JSLocalize',
            'Rosio\PhpToJavaScriptVariables\Facades\JSLocalize'
        );
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('JSLocalize', 'JSLocalizeDumper');
	}

}
