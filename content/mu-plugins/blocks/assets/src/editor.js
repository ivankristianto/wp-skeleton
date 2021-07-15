import { registerBlockType, registerBlockCollection } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

import hello from './blocks/hello/editor';

// CSS styles for custom blocks.
import './editor.scss';

const blocks = [
	hello,
];

// Register block collection.
registerBlockCollection( 'skeleton', {
	title: __( 'Skeleton', 'skeleton' ),
} );

// Register all blocks.
blocks.forEach( ( { name, settings } ) => registerBlockType( name, settings ) );
