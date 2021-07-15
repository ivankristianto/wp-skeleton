import { __ } from '@wordpress/i18n';

import metadata from './block.json';

const { name } = metadata;

export {
	metadata,
	name,
};

export const settings = {
	title: __( 'Hello World', 'skeleton' ),
};
