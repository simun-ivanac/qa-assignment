<?php

/**
 * Login layout.
 *
 * @package qaassignment
 */
?>

<form name="requestform" id="requestform" class="requestform" action="" method="post">
	<p class="requestform__wrapper">
		<label class="requestform__label" for="email"><?php echo esc_html__('Email Address:', 'qaasignment'); ?></label>
		<input type="email" name="email" id="email" class="requestform__input" autocapitalize="off" required="required">
	</p>
	<p class="requestform__wrapper">
		<label class="requestform__label" for="password"><?php echo esc_html__('Password:', 'qaasignment'); ?></label>
		<input type="password" name="password" id="password" class="requestform__input" spellcheck="false" required="required">
	</p>
	<p class="requestform__submit-wrapper">
		<input type="submit" name="submit" id="submit" class="requestform__submit-btn" value="<?php echo esc_html__('Submit', 'qaasignment'); ?>">
	</p>
	<?php wp_nonce_field('request_form', '_request_form'); ?>
</form>

<?php
