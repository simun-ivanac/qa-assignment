<?php

/**
 * Define actions for plugin activation.
 *
 * @package Movies
 */

declare(strict_types=1);

namespace Movies;

/**
 * Class Activate.
 */
class Activate
{
	/**
	 * Activate the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function activate(): void
	{
		\flush_rewrite_rules();
	}
}
