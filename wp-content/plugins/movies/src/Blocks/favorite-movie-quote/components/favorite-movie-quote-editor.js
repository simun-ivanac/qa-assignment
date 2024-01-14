import { RichText, useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export const FavoriteMovieQuoteEditor = ({ attributes, setAttributes }) => {
	const {
		favoriteMovieQuoteContent,
		favoriteMovieQuoteAuthor,
		favoriteMovieQuoteTextAlign
	} = attributes;

	const blockProps = useBlockProps({
		className: [
			'favorite-movie-quote',
			favoriteMovieQuoteTextAlign !== 'none' ? `has-text-align-${favoriteMovieQuoteTextAlign}` : ''
		].join(' ').trim()
	});

	return (
		<figure {...blockProps}>
			<blockquote className='favorite-movie-quote__content'>
				<RichText
					placeholder={__('Add quote', 'movies')}
					onChange={(value) => setAttributes({ favoriteMovieQuoteContent: value })}
					value={favoriteMovieQuoteContent}
					allowedFormats={['core/bold', 'core/italic', 'core/superscript', 'core/text-color', 'core/link']}
					tagName='p'
					identifier='favoriteMovieQuoteContent'
				/>
			</blockquote>
			<figcaption className='favorite-movie-quote__author'>
				{favoriteMovieQuoteAuthor}
			</figcaption>
		</figure>
	);
};
