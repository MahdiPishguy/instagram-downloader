<?php

/**
 * Download File
 * Force download of the link after proper
 * checks.
 *
 * @author @akshitsethi
 * -------------------------------------
 */

require_once '../init.php';

// Process
if ( isset( $_GET['l'] ) ) {
	$l = strip_tags( $_GET['l'] );

	// Not Empty
	if ( ! empty( $l ) ) {
		// Checks
		if ( filter_var( $l, FILTER_VALIDATE_URL ) ) {
			if ( strpos( $l, 'http' ) !== FALSE ) {
				if ( strpos( $l, 'instagram' ) !== FALSE ) {
					header( 'Content-Type: application/octet-stream' );
					header( 'Content-Transfer-Encoding: Binary' );
					header( 'Content-Disposition: attachment; filename=\'' . basename( $l ) . '\'' );
					readfile( $l );
				}
			}
		}
	}
}