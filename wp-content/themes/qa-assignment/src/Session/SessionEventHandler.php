<?php

/**
 * Handle session events.
 *
 * @package QaAssignment\Session
 */

declare(strict_types=1);

namespace QaAssignment\Session;

/**
 * Class SessionEventHandler.
 */
class SessionEventHandler
{
	/**
	 * Register the hooks.
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		\add_action('init', [$this, 'registerSession']);
	}

	/**
	 * Register session.
	 *
	 * @return void
	 */
	public function registerSession(): void
	{
		// Set the cache limiter to private.
		session_cache_limiter('private');

		// Set the cache expire to 10 minutes.
		session_cache_expire(10);

		// Start session.
		if (!session_id()) {
			session_start();
		}
	}
}
