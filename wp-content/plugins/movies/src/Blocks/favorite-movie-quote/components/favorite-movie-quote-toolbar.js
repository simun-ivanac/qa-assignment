import { AlignmentToolbar } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export const FavoriteMovieQuoteToolbar = ({ attributes, setAttributes }) => {
	const { favoriteMovieQuoteTextAlign } = attributes;

	return (
		<AlignmentToolbar
			value={favoriteMovieQuoteTextAlign}
			onChange={(value) => setAttributes({
				favoriteMovieQuoteTextAlign: value === undefined ? 'none' : value
			})}
		/>
	);
};
