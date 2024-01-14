<?php

/**
 * The Theme enqueue functionality.
 *
 * @package QaAssignment\Enqueue
 */

declare(strict_types=1);

namespace QaAssignment\Enqueue;

/**
 * Class EnqueueTheme.
 */
class EnqueueTheme
{
	/**
	 * Theme style handle.
	 *
	 * @var string
	 */
	private const THEME_STYLE_HANDLE = 'qa-assignment-theme-style';

	/**
	 * Register the hooks.
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		\add_action('wp_enqueue_scripts', [$this, 'enqueueThemeStyle']);
	}

	/**
	 * Enqueue CSS for the frontend of the theme.
	 *
	 * @return void
	 */
	public function enqueueThemeStyle(): void
	{
		\wp_register_style(
			self::THEME_STYLE_HANDLE,
			\get_template_directory_uri() . '/assets/css/style.css',
			[],
			'1.0.0',
			'all'
		);

		\wp_enqueue_style(self::THEME_STYLE_HANDLE);
	}
}
