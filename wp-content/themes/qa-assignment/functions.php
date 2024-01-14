<?php

/**
 * Theme Name: QA Assignment
 * Description: QA Assignment 2024
 * Author: Šimun Ivanac
 * Author URI: https://github.com/simun-ivanac/
 * Version: 1.0.0
 * Text Domain: qaassignment
 *
 * @package qaassignment
 */

declare(strict_types=1);

use QaAssignment\Main\Main;

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

// Include the autoloader, so that we can dynamically include the rest of the classes.
$loader = require __DIR__ . '/vendor/autoload.php';

// Begin execution of the theme.
if (class_exists(Main::class)) {
	(new Main())->loadTheme();
}
