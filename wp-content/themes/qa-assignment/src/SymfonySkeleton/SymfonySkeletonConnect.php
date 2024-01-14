<?php

/**
 * Connect to API and pass data to session.
 *
 * @package QaAssignment\SymfonySkeleton
 */

declare(strict_types=1);

namespace QaAssignment\SymfonySkeleton;

use QaAssignment\Session\SessionTokenStorage;
use QaAssignment\SymfonySkeleton\SymfonySkeletonInterface;

/**
 * Class SymfonySkeletonConnect.
 */
class SymfonySkeletonConnect implements SymfonySkeletonInterface
{
	/**
	 * User email.
	 *
	 * @var string
	 */
	private $email;

	/**
	 * User password.
	 *
	 * @var string
	 */
	private $password;

	/**
	 * Base URL for retrieving access token.
	 *
	 * @var string
	 */
	private const ACCESS_TOKEN_URL = 'https://symfony-skeleton.q-tests.com/api/v2/token';

	/**
	 * Store submitted values in properties.
	 *
	 * @param string $email Email.
	 * @param string $password Password.
	 */
	public function __construct(string $email, string $password)
	{
		$this->email = $email;
		$this->password = $password;
	}

	/**
	 * Send API request.
	 *
	 * @return void
	 */
	public function sendApiRequest(): void
	{
		$apiResponse = \wp_remote_request(self::ACCESS_TOKEN_URL, [
			'headers' => [
				'Content-Type' => 'application/json',
			],
			'body' => \wp_json_encode([
				'email' => $this->email,
				'password' => $this->password,
			]),
			'method' => 'POST',
			'timeout' => 45,
		]);

		// Check for WP error.
		if (\is_wp_error($apiResponse)) {
			$this->handleErrors($apiResponse->get_error_message());
			return;
		}

		$apiData = json_decode(\wp_remote_retrieve_body($apiResponse), true);

		// Check for status in API response.
		if (isset($apiData['status']) && !((int) $apiData['status'] >= 200 && (int) $apiData['status'] < 300)) {
			$errorMessage = $apiData['title'] ?? __('Authorization failed. Please try again.', 'qaasignment');
			$this->handleErrors($errorMessage);
			return;
		}

		// Check for token key in API response.
		if (!isset($apiData['token_key'])) {
			$errorMessage = __('Authorization failed. Please try again.', 'qaasignment');
			$this->handleErrors($errorMessage);
			return;
		}

		(new SessionTokenStorage())->setToken($apiData['token_key']);
	}

	/**
	 * Validation errors.
	 *
	 * @param string $errorMessage Error message.
	 *
	 * @return void
	 */
	private function handleErrors(string $errorMessage): void
	{
		$_SESSION['error'] = $errorMessage;
	}
}
