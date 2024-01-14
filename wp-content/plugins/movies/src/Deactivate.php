<?php

/**
 * Define actions for plugin deactivation.
 *
 * @package Movies
 */

declare(strict_types=1);

namespace Movies;

/**
 * Class Deactivate.
 */
class Deactivate
{
	/**
	 * Deactivate the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function deactivate(): void
	{
		\flush_rewrite_rules();
	}
}
