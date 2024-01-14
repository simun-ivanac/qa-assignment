<?php
/**
 * Template for the Favorite movie quote view.
 *
 * @package movies
 */

$favoriteMovieQuoteContent = $attributes['favoriteMovieQuoteContent'] ?? '';
$favoriteMovieQuoteAuthor = $attributes['favoriteMovieQuoteAuthor'] ?? '';
$favoriteMovieQuoteTextAlign = $attributes['favoriteMovieQuoteTextAlign'] ?? 'center';

// No content, no fun.
if (empty($favoriteMovieQuoteContent)) {
	return;
}

$blockWrapperAttr = get_block_wrapper_attributes([
	'class' => trim(implode(' ', ([
		'favorite-movie-quote',
		$favoriteMovieQuoteTextAlign !== 'none' ? "has-text-align-{$favoriteMovieQuoteTextAlign}" : '',
	])))
]);
?>

<figure <?php echo $blockWrapperAttr; // @phpstan-ignore-line ?>>
	<blockquote class="favorite-movie-quote__content">
		<?php echo $favoriteMovieQuoteContent; // @phpstan-ignore-line ?>
	</blockquote>

	<?php if (!empty($favoriteMovieQuoteAuthor)) { ?>
		<figcaption class="favorite-movie-quote__author">
			<?php echo esc_html($favoriteMovieQuoteAuthor); ?>
		</figcaption>
	<?php } ?>
</figure>

<?php
