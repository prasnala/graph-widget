import App from "./App";
import { render } from '@wordpress/element';

/**
 * Import the stylesheet for the plugin.
 */
import './style/main.scss';

// Render the App component into the DOM
let root= document.getElementById('gw');
if (root != null) {
    render(<App />, document.getElementById('gw'));
}
