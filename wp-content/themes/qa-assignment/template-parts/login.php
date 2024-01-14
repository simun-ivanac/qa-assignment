<?php

/**
 * Login layout.
 *
 * @package qaassignment
 */

use QaAssignment\Session\SessionTokenStorage;

$isTokenActive = SessionTokenStorage::isTokenActive();
$hasSessionError = isset($_SESSION['error']) && !empty($_SESSION['error']);
$messageClass = '';
$messageContent = '';

// Display message depending on session errors and token state.
if ($hasSessionError && !$isTokenActive) {
	$messageClass = 'show error';
	$messageContent = esc_html($_SESSION['error']);
} else if (!$hasSessionError && $isTokenActive) {
	$messageClass = 'show success';
	$messageContent = sprintf('%1s<br>%2s <b>%3s</b>.',
		esc_html__('Token is generated.', 'qaasignment'),
		esc_html__('Expires in:', 'qaasignment'),
		SessionTokenStorage::getTokenDuration()
	);
} else if ($hasSessionError && $isTokenActive) {
	$messageClass = 'show warning';
	$messageContent = sprintf('%1s<br><br>%2s<br>%3s <b>%4s</b>.',
		esc_html($_SESSION['error']),
		esc_html__('Still, previously generated token remains active.', 'qaasignment'),
		esc_html__('Expires in:', 'qaasignment'),
		SessionTokenStorage::getTokenDuration()
	);
}
?>

<form name="requestform" id="requestform" class="requestform" action="" method="post">
	<p class="requestform__message <?php echo esc_attr($messageClass); ?>">
		<?php echo $messageContent; // @phpstan-ignore-line ?>
	</p>
	<p class="requestform__wrapper">
		<label class="requestform__label" for="email"><?php echo esc_html__('Email Address:', 'qaasignment'); ?></label>
		<input type="email" name="email" id="email" class="requestform__input" autocapitalize="off" required="required">
	</p>
	<p class="requestform__wrapper">
		<label class="requestform__label" for="password"><?php echo esc_html__('Password:', 'qaasignment'); ?></label>
		<input type="password" name="password" id="password" class="requestform__input" spellcheck="false" required="required">
	</p>
	<p class="requestform__submit-wrapper">
		<input type="submit" name="submit" id="submit" class="requestform__submit-btn" value="<?php echo $isTokenActive ? __('Regenerate', 'qaasignment') : __('Get token', 'qaasignment'); ?>">
	</p>
	<?php wp_nonce_field('request_form', '_request_form'); ?>
</form>

<?php
