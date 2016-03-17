<?php
	class qa_image_zoom_admin {

		const SAVE_BTN          = 'ami_code_prettify_save_button' ;
		const PLUGIN_ENABLED    = 'ami_code_prettify_enabled' ;

		const ADVANCED_SELECTOR = 'ami_code_prettify_adv_selector' ;

		function option_default($option) {
			switch ($option) {
				case self::PLUGIN_ENABLED:
					return 1 ;
						break;
				case self::ADVANCED_SELECTOR:
					return '' ; /*an empty sting initially*/
					break;
				default:
					return null ;
					break;
			}
		}

		function admin_form(&$qa_content)
		{

		//	Process form input

			$ok = null;
			if (qa_clicked(self::SAVE_BTN)) {
				qa_opt(self::PLUGIN_ENABLED ,    (bool)qa_post_text(self::PLUGIN_ENABLED));

				qa_opt(self::ADVANCED_SELECTOR , qa_post_text(self::ADVANCED_SELECTOR));
				$ok = qa_lang('admin/options_saved');
			}
		
			//	Create the form for display_header_text();


			$fields = array();

			$fields[self::PLUGIN_ENABLED] = array(
				'label' => qa_lang('ami_image_zoom/enable'),
				'tags' => 'NAME="'.self::PLUGIN_ENABLED.'" id="'.self::PLUGIN_ENABLED.'"',
				'value' => qa_opt(self::PLUGIN_ENABLED),
				'type' => 'checkbox',
			);


			
			return array(
				'ok' => ($ok) ? $ok : null,
				
				'fields' => $fields,
				
				'buttons' => array(
					array(
					'label' => qa_lang_html('main/save_button'),
					'tags' => 'NAME="'.self::SAVE_BTN.'"',
					),
				),
			);
		}
	}

