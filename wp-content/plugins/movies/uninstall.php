<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @package movies
 */

declare(strict_types=1);

// Check user permission.
if (!current_user_can('activate_plugins')) {
	return;
}

// If uninstall is not called from WordPress, exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}
