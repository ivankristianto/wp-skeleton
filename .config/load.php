<?php
/**
 * Configuration Load file.
 */


// Load constants file, if it exists.
if ( file_exists( __DIR__ . '/.config/constants.php' ) ) {
	require_once __DIR__ . '/.config/constants.php';
}

require __DIR__ . '/paths.php';
