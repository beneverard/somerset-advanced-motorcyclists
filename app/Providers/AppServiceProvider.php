<?php

namespace App\Providers;

use App\Assets;
use Rareloop\Lumberjack\Providers\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any app specific items into the container
     */
    public function register()
    {
    }

    /**
     * Perform any additional boot required for this application
     */
    public function boot()
    {
		$this->setTimezone();
		$this->setThemeSupports();
		$this->queueAssets();
    }

	protected function setTimezone()
	{
		date_default_timezone_set('Europe/London');
	}

	protected function setThemeSupports()
	{
		add_theme_support('post-thumbnails');
		add_theme_support('menus');
	}

	protected function queueAssets()
	{
		add_action('wp_enqueue_scripts', function() {
		   // EXTRACTED
		   Assets::registerScript('manifest', '/dist/js/manifest.js', [], true);
		   Assets::registerScript('vendor', '/dist/js/vendor.js', [], true);

		   // BASE
		   Assets::registerStyle('main', '/dist/styles/styles.css');
		   Assets::registerScript('main', '/dist/js/scripts.js', [], true);

		   // QUEUE ASSETS
		   wp_enqueue_style('main');
		   wp_enqueue_script('main');
	   });
	}
}
