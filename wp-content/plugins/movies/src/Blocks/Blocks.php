<?php

/**
 * Base class for Gutenberg blocks registration.
 *
 * @package Movies\Blocks
 */

declare(strict_types=1);

namespace Movies\Blocks;

/**
 * Class Blocks.
 */
class Blocks
{
	/**
	 * Register the hooks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		// Register new block.
		\add_action('init', [$this, 'registerBlock'], 11);

		// Create new block category.
		\add_filter('block_categories_all', [$this, 'createCustomCategory']);
	}

	/**
	 * Method used to register Gutenberg blocks.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function registerBlock(): void
	{
		\register_block_type(dirname(__DIR__, 2). '/build');
	}

	/**
	 * Create new custom block category.
	 *
	 * @since 1.0.0
	 *
	 * @param array<int, array<string, string|null>> $categories Array of categories for block types.
	 *
	 * @return array<int, array<string, string|null>> Array of categories for block types.
	 */
	public function createCustomCategory(array $categories): array
	{
		return array_merge(
			[
				[
					'slug' => 'movies',
					'title' => \esc_html__('Movies', 'movies'),
				],
			],
			$categories
		);
	}
}
