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

	/**
	 * Check whether token is active or expired. Remove from session if expired.
	 *
	 * @return bool
	 */
	public static function isTokenActive(): bool
	{
		if (
			!isset($_SESSION['qss-token']['key']) ||
			!isset($_SESSION['qss-token']['expiration'])
		) {
			return false;
		}

		$sessionDateTime = $_SESSION['qss-token']['expiration']['datetime'] ?? '';
		$sessionTimezone = $_SESSION['qss-token']['expiration']['timezone'] ?? self::TOKEN_TIMEZONE;

		$currentDateTime = new DateTime('now', new DateTimeZone($sessionTimezone));
		$currentDateTime->format('Y-m-d H:i:s');

		$expirationDateTime = new DateTime($sessionDateTime, new DateTimeZone($sessionTimezone));
		$expirationDateTime->format('Y-m-d H:i:s');

		// Still active.
		if ($expirationDateTime > $currentDateTime) {
			return true;
		}

		// If expired, remove token from session (just to be sure...).
		unset($_SESSION['qss-token']);

		return false;
	}

	/**
	 * Format token expiration time to be in human readable mode.
	 *
	 * @return string
	 */
	public static function getTokenDuration(): string
	{
		$sessionDateTime = $_SESSION['qss-token']['expiration']['datetime'] ?? '';
		$sessionTimezone = $_SESSION['qss-token']['expiration']['timezone'] ?? self::TOKEN_TIMEZONE;

		if ($sessionDateTime === '') {
			return '0min 0sec';
		}

		$currentDateTime = new DateTime('now', new DateTimeZone($sessionTimezone));
		$currentDateTime->format('Y-m-d H:i:s');

		$expirationDateTime = new DateTime($sessionDateTime, new DateTimeZone($sessionTimezone));
		$expirationDateTime->format('Y-m-d H:i:s');

		$interval = $currentDateTime->diff($expirationDateTime);

		return $interval->format('%imin %ssec');
	}
}
