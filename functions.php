<?php

/**
 * ENQUEUE SCRIPT W/ TIMESTAMP VERSIONING
**/

function enqueue_script_timestamped($handle, $src = '', $deps = array(), $in_footer = false) {
	if ($src && $handle) {
		$template_path = get_template_directory_uri() . $src;
		$update_time = getAssetUpdateTime($src);
		wp_enqueue_script($handle, $template_path, $deps, $update_time, $in_footer);
	}

	return false;
}

/**
 * ENQUEUE STYLESHEET W/ TIMESTAMP VERSIONING
**/

function enqueue_style_timestamped($handle, $src = '', $deps = array(), $media = 'all') {
	if ($src && $handle) {
		$template_path = get_template_directory_uri() . $src;
		$update_time = getAssetUpdateTime($src);
		wp_enqueue_style($handle, $template_path, $deps, $update_time, $media);
	}

	return false;
}

/**
 * GET UNIX TIMESTAMP FOR ASSET
**/

function getAssetUpdateTime($package_path = '') {
	$update_time = null;
	$time_format = 'YmdHis';

	if ($package_path) {
		$update_time = date($time_format, filemtime( get_stylesheet_directory() . $package_path ));
	}

	return $update_time;
}