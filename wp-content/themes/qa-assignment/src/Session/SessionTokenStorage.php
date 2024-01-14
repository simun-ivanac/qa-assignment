<?php

/**
 * Handle token and session.
 *
 * @package QaAssignment\Session
 */

declare(strict_types=1);

namespace QaAssignment\Session;

use DateTime;
use DateTimeZone;

/**
 * Class SessionTokenStorage.
 */
class SessionTokenStorage
{
	/**
	 * Token expiration duration in minutes.
	 *
	 * @var int
	 */
	private const TOKEN_EXPIRATION_DURATION = 10;

	/**
	 * Token timezone when generating and comparing expiration.
	 *
	 * @var string
	 */
	private const TOKEN_TIMEZONE = 'UTC';

	/**
	 * Set token to session.
	 *
	 * @return void
	 */
	public function setToken(string $tokenKey): void
	{
		// 10 minutes.
		$duration = self::TOKEN_EXPIRATION_DURATION;
		$expirationDateTime = new DateTime("+{$duration} minutes", new DateTimeZone(self::TOKEN_TIMEZONE));

		$_SESSION['qss-token'] = [
			'key' => $tokenKey,
			'expiration' => [
				'timezone' => self::TOKEN_TIMEZONE,
				'datetime' => $expirationDateTime->format('Y-m-d H:i:s'),
			],
		];

		\wp_redirect('/');
		exit;
	}
}
