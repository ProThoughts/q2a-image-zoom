<?php
	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	require_once QA_INCLUDE_DIR.'qa-theme-base.php';
	require_once QA_INCLUDE_DIR.'qa-app-blobs.php';
	require_once QA_INCLUDE_DIR.'qa-app-users.php';

	class qa_html_theme_layer extends qa_html_theme_base {
		
		function head_css() {
			qa_html_theme_base::head_css();
			if ($this->template == 'question' && qa_opt(qa_image_zoom_admin::PLUGIN_ENABLED)) {

		    	$css_url = qa_opt('site_url').'qa-plugin/'.AMI_IMAGE_ZOOM_DIR_NAME.'/assets/css/image_zoom.css' ;
				$this->output('<link rel="stylesheet" href="'.$css_url.'">');

			}
		}

		function head_script()
		{
			if ($this->template == 'question' && qa_opt(qa_image_zoom_admin::PLUGIN_ENABLED)) {
			    $js_url = qa_opt('site_url').'qa-plugin/'.AMI_IMAGE_ZOOM_DIR_NAME.'/assets/js/image_zoom.js' ;
				if (!isset($this->content['script']['image_zoom_script'])) {
					$this->content['script']['image_zoom_script'] = '<script src="'.$js_url.'" type="text/javascript"></script>' ;
				}
				//if your website doesn't have jQuery, you should uncomment this 3 line in below.
//				$this->content['script']['jquery_script'] = '<script src="'.qa_opt('site_url').'qa-plugin/'.AMI_IMAGE_ZOOM_DIR_NAME.'/assets/js/jquery-1.2.6.pack.js" type="text/javascript"></script>' ;
			}
			qa_html_theme_base::head_script();
		}
		function body_script()
		{
			qa_html_theme_base::body_script();
			if ($this->template == 'question' && qa_opt(qa_image_zoom_admin::PLUGIN_ENABLED)) {
				$this->output(
					'<script type="text/javascript">',
					'$(document).ready(function() {
							$(".qa-main img").fancyZoom({scaleImg: true, closeOnClick: true});
										});' ,
					'</script>'
				);
			}
		}
	}
	/*
		Omit PHP closing tag to help avoid accidental output
	*/