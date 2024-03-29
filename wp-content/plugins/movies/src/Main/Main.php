<?php

/**
 * Load plugin.
 *
 * @package Movies\Main
 */

declare(strict_types=1);

namespace Movies\Main;

use Movies\Blocks\Blocks;
use Movies\CustomPostType\MoviesPostType;
use Movies\CustomMeta\MoviesMeta;

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
		(new MoviesMeta())->registerHooks();
		(new MoviesPostType())->registerHooks();
		(new Blocks())->registerHooks();
	}
}
