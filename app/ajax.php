<?php

/**
 * Ajax File
 * Finds the direct link to the photo
 * and serves the photo for download.
 *
 * @author @akshitsethi
 * -------------------------------------
 */

require_once '../init.php';

// Defaults
$response 	= array(
	'type' 		=> 'error',
	'message' 	=> 'There was a problem processing your request. Please try again later.',
	'data' 		=> ''
);

if ( isset( $_GET['r'] ) && ! empty( $_GET['r'] ) ) {
	$r = strip_tags( $_GET['r'] );

	// Download
	if ( 'download' == $r ) {
		if ( isset( $_POST['url'] ) ) {
			$url 		= strip_tags( $_POST['url'] );

			// Initialize
			$tmp 		= new Downloader( $url );
			$response 	= $tmp->process();
		} else {
			$response['message'] = 'No URL has been provided. Please provide one to continue further.';
		}
	}
} else {
	$response['message'] = 'No request type has been selected. Seems more like an error. Please try again later.';
}

// Response
echo json_encode( $response );