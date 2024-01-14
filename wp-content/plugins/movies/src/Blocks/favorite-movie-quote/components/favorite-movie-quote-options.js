import { __ } from '@wordpress/i18n';
import { PanelBody, TextControl } from '@wordpress/components';

export const FavoriteMovieQuoteOptions = ({ attributes, setAttributes }) => {
	return (
		<PanelBody title={__('Favorite movie quote', 'movies')}>
			<TextControl
				label={__('Character that said it (optional)', 'movies')}
				value={attributes.favoriteMovieQuoteAuthor ?? ''}
				onChange={(value) => setAttributes({ favoriteMovieQuoteAuthor: value })}
				type='text'
			/>
		</PanelBody>
	);
};
