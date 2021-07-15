import { TextControl } from '@wordpress/block-editor';
import React from '@wordpress/element';

import { editPropsShape } from './props-shape';

/**
 * Hello Edit Component.
 *
 * @param {object} props - Props passed.
 *
 * @returns {JSX.Element} - React Element to pass to Editor.
 */
function HelloEdit( props ) {
	const { attributes, className, setAttributes } = props;
	const { title } = attributes;

	return (
		<>
			<div className={ className }>
				<TextControl
					label="Hello"
					value={ title }
					onChange={ value => setAttributes( { title: value } ) }
				/>
			</div>
		</>
	);
}

HelloEdit.propTypes = {
	...editPropsShape,
};

export default HelloEdit;
