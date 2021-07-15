/**
 * Prepare block.
 *
 * @param {HTMLElement} block - Hello block element.
 * @param {number} index - Array index of the element.
 */
function prepareBlock( block, index ) {
	let id = block.getAttribute( 'id' );

	if ( ! id ) {
		id = `wp-block-hello-${ index }`;

		block.setAttribute( 'id', id );
	}
}

/**
 * Initialize all Hello Components.
 */
export default function initHello() {
	document.querySelectorAll( '.wp-block-hello' ).forEach( prepareBlock );
}
