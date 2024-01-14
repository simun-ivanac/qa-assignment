<?php

/**
 * Validate form submit.
 *
 * @package QaAssignment\SymfonySkeleton
 */

declare(strict_types=1);

namespace QaAssignment\SymfonySkeleton;

/**
 * Class SymfonySkeletonFormSubmit.
 */
class SymfonySkeletonFormSubmit
{
	/**
	 * Register the hooks.
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		\add_action('init', [$this, 'validateSubmission'], 15);
	}

	/**
	 * Check submitted values.
	 *
	 * @return void
	 */
	public function validateSubmission(): void
	{
		// Remove old errors from session.
		if (isset($_SESSION['error'])) {
			unset($_SESSION['error']);
		}

		// If nonce doesn't exist, it's just regular page visit (not form submission).
		if (!isset($_POST['_request_form'])) {
			return;
		}

		$email = isset($_POST['email']) && \is_email($_POST['email']) ? trim($_POST['email']) : '';
		$password = isset($_POST['password']) && !empty($_POST['password']) ? trim($_POST['password']) : '';

		// If required field is empty, or nonce doesn't match, stop here.
		if (
			empty($email) ||
			empty($password) ||
			!\wp_verify_nonce($_POST['_request_form'], 'request_form')
		) {
			$_SESSION['error'] = __('Authorization failed. Please try again.', 'qaasignment');
			return;
		}

		(new SymfonySkeletonConnect($email, $password))->sendApiRequest();
	}
}
