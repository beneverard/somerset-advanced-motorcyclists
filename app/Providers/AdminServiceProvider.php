<?php

namespace App\Providers;

use Rareloop\Lumberjack\Providers\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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
		$this->addCustomFooterText();
		$this->disableEmojies();
		$this->enableOptions();
	}

	protected function addCustomFooterText()
	{
		add_filter('admin_footer_text', function() {
			echo "Designed and Built by <a href='http://theideabureau.co' target='_blank'>The Idea Bureau</a>";
		});
	}

	protected function disableEmojies()
	{
		add_action('init', function() {
			remove_action('admin_print_styles', 'print_emoji_styles');
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('admin_print_scripts', 'print_emoji_detection_script');
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
			remove_filter('the_content_feed', 'wp_staticize_emoji');
			remove_filter('comment_text_rss', 'wp_staticize_emoji');
		});
	}

	protected function enableOptions()
	{
		if (true && function_exists('acf_add_options_page')) {
			acf_add_options_page();
		}
	}
}
