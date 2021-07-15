import domReady from '@wordpress/dom-ready';

import initHello from './blocks/hello/frontend';

/**
 * Kick off all components.
 */
domReady( () => {
	initHello();
} );
