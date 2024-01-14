<?php

/**
 * Load plugin.
 *
 * @package Movies\Main
 */

declare(strict_types=1);

namespace Movies\Main;

use Movies\CustomPostType\MoviesPostType;

/**
 * Class Main.
 */
class Main
{
	/**
	 * Load plugin functionalities. Classes are instantiated manually (to keep things simple).
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function loadPlugin(): void
	{
		(new MoviesPostType())->registerHooks();
	}
}
