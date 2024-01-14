<?php

/**
 * Load theme.
 *
 * @package QaAssignment\Main
 */

declare(strict_types=1);

namespace QaAssignment\Main;

use QaAssignment\Enqueue\EnqueueTheme;
use QaAssignment\SymfonySkeleton\SymfonySkeletonFormSubmit;
use QaAssignment\Session\SessionEventHandler;

/**
 * Class Main.
 */
class Main
{
	/**
	 * Load theme functionalities. Classes are instantiated manually (to keep things simple).
	 *
	 * @return void
	 */
	public function loadTheme(): void
	{
		(new EnqueueTheme())->registerHooks();
		(new SessionEventHandler())->registerHooks();
		(new SymfonySkeletonFormSubmit())->registerHooks();
	}
}
