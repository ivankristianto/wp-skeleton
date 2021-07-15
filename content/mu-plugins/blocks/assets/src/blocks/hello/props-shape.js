import PropTypes from 'prop-types';

export const propsShape = {
	clientId: PropTypes.string.isRequired,
};

export const editPropsShape = {
	...propsShape,
	getBlock: PropTypes.func.isRequired,
	setAttributes: PropTypes.func.isRequired,
};
