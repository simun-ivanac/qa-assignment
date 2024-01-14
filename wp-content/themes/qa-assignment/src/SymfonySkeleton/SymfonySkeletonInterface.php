<?php

/**
 * Used to define how API call is executed.
 *
 * @package QaAssignment\SymfonySkeleton
 */

declare(strict_types=1);

namespace QaAssignment\SymfonySkeleton;

/**
 * Interface SymfonySkeletonInterface.
 */
interface SymfonySkeletonInterface
{
	/**
	 * Perform API request.
	 *
	 * @return void
	 */
	public function sendApiRequest(): void;
}
