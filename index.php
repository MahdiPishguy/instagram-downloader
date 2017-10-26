<?php

/**
 * Instagram Downloader
 * -------------------------------------
 *
 * NOTE: Since this is a small project, it will be having
 * everything mixed up. HTML and PHP code. Only CSS and JS
 * files will be stored seperately.
 *
 * @author @akshitsethi
 * @link http://www.akshitsethi.com/instagram-downloader
 *
 * -------------------------------------
 */

// Set Errors
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

// Set Timezone
date_default_timezone_set( 'Asia/Calcutta' );

// Initialization File
require_once 'init.php';

// JS Data
$as_config = json_encode( array( 
	'app' 	=> $config['app'],
	'url' 	=> $config['url']
) );

?><!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="x-ua-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title><?php echo $config['app']; ?></title>
	<meta name="description" content="<?php echo $config['description']; ?>">
	<meta name="keywords" content="<?php echo $config['keywords']; ?>">
	<!-- png format favicon - 32px x 32px format -->
	<link rel="icon" type="image/png" href="<?php echo $config['url']; ?>/app/img/favicon.png">
	<!-- apple touch icon - 200px x 200px format -->
	<link rel="apple-touch-icon" href="<?php echo $config['url']; ?>/app/img/apple-favicon.png">
	<!-- canonical tag for the search engines to -->
	<link rel="canonical" href="<?php echo $config['url']; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo $config['url']; ?>/app/css/public.css">
</head>
<body>
	<div class="container">
		<div class="container-wrapper">
			<header class="header">
				<h1><?php echo $config['app']; ?></h1>
			</header><!-- .header -->

			<div class="section">
				<p>Enter the link url for the Instagram photo and your photo will be served to you instantly.</p>

				<div id="ajax-response"></div><!-- #ajax-response -->

				<form method="post" class="download-form">
					<input type="text" name="link" class="link" placeholder="Paste your Instagram url over here.." />
					<input type="submit" name="process" class="button" value="Process" />

					<div id="ajax-download"></div><!-- #ajax-downlaod -->
				</form><!-- .download-form -->
			</div><!-- .section -->
		</div><!-- .container-wrapper -->
	</div><!-- .container -->

	<script type="text/javascript">
		/* <! [CDATA[ */
		var config = <?php echo $as_config; ?>;
		/* ]]> */
	</script>
	<script type="text/javascript" src="<?php echo $config['url']; ?>/app/js/public.js"></script>
</body>
</html>