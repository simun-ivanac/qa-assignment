<?php

/**
 * Add custom meta fields to Movies CPT.
 *
 * @package Movies\CustomMeta
 */

declare(strict_types=1);

namespace Movies\CustomMeta;

use Movies\CustomPostType\MoviesPostType;

/**
 * Class MoviesMeta.
 */
class MoviesMeta
{
	/**
	 * Custom field key.
	 *
	 * @var string
	 */
	private const METABOX_FIELD_KEY = 'movie_title';

	/**
	 * Custom field title.
	 *
	 * @var string
	 */
	private const METABOX_TITLE = 'Movies';

	/**
	 * Custom field position.
	 *
	 * @var string
	 */
	private const METABOX_POSITION = 'side';

	/**
	 * Custom field priority.
	 *
	 * @var string
	 */
	private const METABOX_PRIORITY = 'default';

	/**
	 * Register the hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		\add_action('add_meta_boxes_movies', [$this, 'addMetaBox']);
		\add_action('save_post_movies', [$this, 'saveMetaBox']);
	}

	/**
	 * Add the metabox.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function addMetaBox(): void
	{
		\add_meta_box(
			self::METABOX_FIELD_KEY,
			self::METABOX_TITLE,
			[$this, 'renderMetaBox'],
			MoviesPostType::getPostTypeSlug(),
			self::METABOX_POSITION,
			self::METABOX_PRIORITY,
		);
	}

	/**
	 * Render metabox.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function renderMetaBox($post): void
	{
		\wp_nonce_field('movies_nonce', '_movies_nonce');
		$movieTitle = \get_post_meta($post->ID, 'movie_title', true);
		?>

		<div class="movies-title-inside">
			<label class="movies-title__label" for="movie_title">
				<?php echo \esc_html__('Title:', 'movies'); ?>
			</label>
			<input
				type="text"
				class="movies-title__input components-text-control__input"
				style="margin-top: 5px;"
				name="movie_title"
				id="movie_title"
				value="<?php echo $movieTitle ? \esc_html($movieTitle) : ''; ?>">
		</div>

		<?php
	}

	/**
	 * Save submitted metabox value.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function saveMetaBox($postId): void
	{
		if (
			!isset($_POST['_movies_nonce']) ||
			!\wp_verify_nonce($_POST['_movies_nonce'], 'movies_nonce')
		) {
			return;
		}

		\update_post_meta($postId, 'movie_title', \sanitize_text_field($_POST['movie_title']));
	}
}
