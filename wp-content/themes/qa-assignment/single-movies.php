<?php

/**
 * Single movie layout.
 *
 * @package qaassignment
 */

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		?>
		<section class="wrapper post-item">
			<h1 class="post-item__title"><?php the_title(); ?></h1>
			<div class="post-item__content"><?php the_content();?></div>
		</section>

		<section class="wrapper movie-title">
			<?php
			$movieTitle = get_post_meta(get_the_ID(), 'movie_title', true);

			if ($movieTitle && !empty($movieTitle)) {
				?>
				<h2 class="movie-title__label">
					<?php echo esc_html__('Movie title:', 'qaasignment'); ?>
				</h2>
				<div class="movie-title__value">
					<?php echo esc_html($movieTitle); ?>
				</div>
				<?php
			}
			?>
		</section>
		<?php
	}
}

get_footer();
