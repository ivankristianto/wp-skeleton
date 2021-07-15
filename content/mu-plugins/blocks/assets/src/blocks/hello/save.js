import { InnerBlocks } from '@wordpress/block-editor';
import React from '@wordpress/element';

/**
 * Save Component To Editor.
 *
 * @returns {Element}
 *
 * @class
 */
export default function HelloSave() {
	return (
		<div>
			<InnerBlocks.Content />
		</div>
	);
}
