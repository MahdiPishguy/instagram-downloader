<?php

/**
 * CLASS: Downloader
 *
 * @author @akshitsethi
 * -------------------------------------
 */

class Downloader {

	private $url;
	private $html;

	public $response = array(
		'type' 		=> 'error',
		'message' 	=> 'There was a problem processing your request.',
		'data' 		=> ''
	);

	public function __construct( $url ) {

		$this->url = $url;

	}

	public function process() {

		try {
			if ( ! empty( $this->url ) ) {
				// Checks
				$this->do_checks();

				// Grab HTML
				$this->get_html();

				// Process
				$this->clean();

				// Return
				return $this->response;
			} else {
				throw new Exception( 'URL to the Instagram photo has not been provided. Please provide one to continue further.' );
			}
		} catch ( Exception $e ) {
			// Add to Response
			$this->response['message'] = $e->getMessage();

			// Return
			return $this->response;
		}

	}

	private function do_checks() {

		// Valid URL
		if ( filter_var( $this->url, FILTER_VALIDATE_URL ) === FALSE ) {
			throw new Exception( 'The link provided does not seem to be a valid one. Kindly check the link and try again.' );
		}

		// Contains HTTP
		if ( strpos( $this->url, 'http' ) === FALSE ) {
			throw new Exception( 'Please provide complete URL to the photo page including http.' );
		}

		// Contains Instagram
		if ( strpos( $this->url, 'instagram' ) === FALSE ) {
			throw new Exception( 'You sure you entering a valid Instagram URL?' );
		}

	}

	private function get_html() {

		$this->html = file_get_contents( $this->url );

		// Not Empty
		if ( empty( $this->html ) ) {
			throw new Exception( 'Unable to grab data from Instagram. Please try again later.' );
		}

	}

	private function clean() {

		// Search Begins
		$regex 	= preg_match( "/display_url\": \"(.*)\", \"display_resources/", $this->html, $data );

		// Checks
		if ( empty( $data ) ) {
			throw new Exception( 'Inital step failure. Cannot proceed further as no match could be found for the download link.' );
		}

		if ( ! isset( $data[1] ) ) {
			throw new Exception( 'No download link returned. We need to verify if the algorithm has been changed or what.' );
		}

		// Valid URL?
		if ( filter_var( $data[1], FILTER_VALIDATE_URL ) ) {
			// Success - Change Values
			$this->response = array(
				'type' 		=> 'success',
				'message' 	=> 'Perfect! We have grabbed the photo link from the page. Download using the button below.',
				'data' 		=> $data[1]
			);
		} else {
			throw new Exception( 'Stuck at the last step. Unable to validate the URL returned from the page.' );
		}

	}

	public function __destruct() {

		// Do we need this one?

	}

}