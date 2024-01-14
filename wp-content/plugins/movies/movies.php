<?php

/**
 * Plugin Name: Movies
 * Description: Movies plugin.
 * Plugin URI: https://github.com/simun-ivanac/
 * Author: Šimun Ivanac
 * Author URI: https://github.com/simun-ivanac/
 * Version: 1.0.0
 * Text Domain: movies
 * Requires at least: 6.4.2
 * Tested up to: 6.4.2
 * Requires PHP: 8.0
 *
 * @package movies
 */

declare(strict_types=1);

namespace Movies;

use Movies\Activate;
use Movies\Deactivate;
use Movies\Main\Main;

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

// Include the autoloader, so that we can dynamically include the rest of the classes.
$loader = require __DIR__ . '/vendor/autoload.php';

// Activation function.
register_activation_hook(
	__FILE__,
	function () {
		(new Activate())->activate();
	}
);

// Deactivation function.
register_deactivation_hook(
	__FILE__,
	function () {
		(new Deactivate())->deactivate();
	}
);

// Begin execution of the plugin.
if (class_exists(Main::class)) {
	(new Main())->loadPlugin();
}
