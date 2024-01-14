import { InspectorControls, BlockControls } from '@wordpress/block-editor';
import { FavoriteMovieQuoteEditor } from './components/favorite-movie-quote-editor';
import { FavoriteMovieQuoteOptions } from './components/favorite-movie-quote-options';
import { FavoriteMovieQuoteToolbar } from './components/favorite-movie-quote-toolbar';
import { registerBlockType } from '@wordpress/blocks';
import metadata from './block.json';
import './editor.scss';
import './style.scss';

registerBlockType(metadata.name, {
	edit: (props) => {
		return (
			<>
				<InspectorControls>
					<FavoriteMovieQuoteOptions {...props} />
				</InspectorControls>
				<BlockControls>
					<FavoriteMovieQuoteToolbar {...props} />
				</BlockControls>
				<FavoriteMovieQuoteEditor {...props} />
			</>
		);
	},
	save: () => {
		return null;
	}
});
