<?php

/*
        Plugin Name: Q2A Image Zoom
        Plugin URI: https://github.com/pjkui/q2a-image-zoom
        Plugin Update Check URI: https://raw.github.com/pjkui/q2a-image-zoom/master/qa-plugin.php
        Plugin Description: A Image Zoom Tools for  q2a , powered by Quinn Pan
        Plugin Version: 1.0
        Plugin Date: 2016-03-17
        Plugin Author: Quinn Pan
        Plugin Author URI: http://pjkui.com
        Plugin License: GPLv2
        Plugin Minimum Question2Answer Version: 1.6
*/


        if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
        	header('Location: ../../');
        	exit;
        }

        if (!defined('AMI_IMAGE_ZOOM_DIR')) {
                define('AMI_IMAGE_ZOOM_DIR', dirname(__FILE__));
        }

        if (!defined('AMI_IMAGE_ZOOM_DIR_NAME')) {
                define('AMI_IMAGE_ZOOM_DIR_NAME', basename(dirname(__FILE__)));
        }

        if (!defined('AMI_IMAGE_ZOOM_ASSETS')) {
                define('AMI_IMAGE_ZOOM_ASSETS', (dirname(__FILE__)).'/assets');
        }

        require_once AMI_IMAGE_ZOOM_DIR.'/qa-image-zoom-utils.php';
        require_once AMI_IMAGE_ZOOM_DIR.'/qa-image-zoom-admin.php';

        qa_register_plugin_module('module', 'qa-image-zoom-admin.php', 'qa_image_zoom_admin', 'Image Zoom Admin');
        qa_register_plugin_layer('qa-image-zoom-layer.php', 'Image Zoom Layer');
        qa_register_plugin_phrases('qa-image-zoom-lang-*.php', 'ami_image_zoom');

/*
	Omit PHP closing tag to help avoid accidental output
*/
