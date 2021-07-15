/**
 * Polyfills for behavior not injected through the Babel transpiler.
 */

// Support .forEach() on DOM NodeList collections
// https://developer.mozilla.org/en-US/docs/Web/API/NodeList/forEach#Polyfill
if ( window.NodeList && ! NodeList.prototype.forEach ) {
	NodeList.prototype.forEach = Array.prototype.forEach;
}
