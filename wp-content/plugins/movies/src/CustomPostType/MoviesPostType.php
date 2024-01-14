<?php

/**
 * Register Movies custom post type.
 *
 * @package Movies\CustomPostType
 */

declare(strict_types=1);

namespace Movies\CustomPostType;

/**
 * Class MoviesPostType.
 */
class MoviesPostType
{
	/**
	 * Post type slug.
	 *
	 * @var string
	 */
	private const POST_TYPE_SLUG = 'movies';

	/**
	 * Post type URL slug.
	 *
	 * @var string
	 */
	private const POST_TYPE_URL_SLUG = 'movies';

	/**
	 * Rest API Endpoint slug.
	 *
	 * @var string
	 */
	private const REST_API_ENDPOINT_SLUG = 'movies';

	/**
	 * Capability type for post type.
	 *
	 * @var string
	 */
	private const POST_CAPABILITY = 'post';

	/**
	 * Location in admin sidebar menu.
	 *
	 * @var int
	 */
	private const MENU_POSITION = 26;

	/**
	 * Menu icon.
	 *
	 * @var string
	 */
	private const MENU_ICON = 'dashicons-admin-settings';

	/**
	 * Register the hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		\add_action('init', [$this, 'registerPostType']);
	}

	/**
	 * Register custom post type.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function registerPostType(): void
	{
		\register_post_type(
			self::POST_TYPE_SLUG,
			$this->getPostTypeArguments()
		);
	}

	/**
	 * Get the arguments for the custom post type.
	 *
	 * @since 1.0.0
	 *
	 * @return array<mixed> Array of arguments.
	 */
	private function getPostTypeArguments(): array
	{
		return [
			'labels' => [
				'name' => __('Movies', 'movies'),
				'singular_name' => __('Movie', 'movies'),
				'menu_name' => __('Movies', 'movies'),
				'name_admin_bar' => __('Movies', 'movies'),
			],
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'has_archive' => true,
			'rewrite' => [
				'slug' => self::POST_TYPE_URL_SLUG,
				'with_front' => false
			],
			'hierarchical' => false,
			'menu_icon' => self::MENU_ICON,
			'menu_position' => self::MENU_POSITION,
			'supports' => [
				'title',
				'editor',
				'author',
				'thumbnail',
				'excerpt',
				'revisions'
			],
			'show_in_rest' => true,
			'rest_base' => self::REST_API_ENDPOINT_SLUG,
			'capability_type' => self::POST_CAPABILITY,
		];
	}

	/**
	 * Get custom post type slug.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function getPostTypeSlug(): string
	{
		return self::POST_TYPE_SLUG;
	}
}
