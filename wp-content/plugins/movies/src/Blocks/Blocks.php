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
		// Create new block category.
		\add_filter('block_categories_all', [$this, 'createCustomCategory']);
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
