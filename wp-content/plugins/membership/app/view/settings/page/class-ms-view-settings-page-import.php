<?php

class MS_View_Settings_Page_Import extends MS_View_Settings_Edit {

	public function to_html() {
		$export_action = MS_Controller_Import::ACTION_EXPORT;
		$import_action = MS_Controller_Import::ACTION_PREVIEW;
		$messages = $this->data['message'];

		$preview = false;
		if ( isset( $messages['preview'] ) ) {
			$preview = $messages['preview'];
		}

		$export_fields = array(
			'export' => array(
				'id' => 'btn_export',
				'type' => MS_Helper_Html::INPUT_TYPE_SUBMIT,
				'value' => __( 'Generate Export', MS_TEXT_DOMAIN ),
				'desc' => __(
					'Generate an export file with the current membership settings. ' .
					'<em>Note that this is not a full backup of the plugin settings.</em>',
					MS_TEXT_DOMAIN
				),
			),
			'action' => array(
				'id' => 'action',
				'type' => MS_Helper_Html::INPUT_TYPE_HIDDEN,
				'value' => $export_action,
			),
			'nonce' => array(
				'id' => '_wpnonce',
				'type' => MS_Helper_Html::INPUT_TYPE_HIDDEN,
				'value' => wp_create_nonce( $export_action ),
			),
		);

		$file_field = array(
			'id' => 'upload',
			'type' => MS_Helper_Html::INPUT_TYPE_FILE,
			'title' => __( 'From export file', MS_TEXT_DOMAIN ),
		);
		$import_options = array(
			'file' => array(
				'text' => MS_Helper_Html::html_element( $file_field, true ),
				'disabled' => ! MS_Model_Import_File::present(),
			),
			'membership' => array(
				'text' => __( 'Membership (WPMU DEV)', MS_TEXT_DOMAIN ),
				'disabled' => ! MS_Model_Import_Membership::present(),
			),
		);

		$sel_source = 'file';
		if ( isset( $_POST['import_source'] )
			&& isset( $import_options[ $_POST['import_source'] ] )
		) {
			$sel_source = $_POST['import_source'];
		}

		$import_fields = array(
			'source' => array(
				'id' => 'import_source',
				'type' => MS_Helper_Html::INPUT_TYPE_RADIO,
				'title' => __( 'Choose an import source', MS_TEXT_DOMAIN ),
				'field_options' => $import_options,
				'value' => $sel_source,
			),
			'import' => array(
				'id' => 'btn_import',
				'type' => MS_Helper_Html::INPUT_TYPE_SUBMIT,
				'value' => __( 'Preview Import', MS_TEXT_DOMAIN ),
				'desc' => __(
					'Import data into this installation.',
					MS_TEXT_DOMAIN
				),
			),
			'action' => array(
				'id' => 'action',
				'type' => MS_Helper_Html::INPUT_TYPE_HIDDEN,
				'value' => $import_action,
			),
			'nonce' => array(
				'id' => '_wpnonce',
				'type' => MS_Helper_Html::INPUT_TYPE_HIDDEN,
				'value' => wp_create_nonce( $import_action ),
			),
		);

		ob_start();

		MS_Helper_Html::settings_tab_header(
			array( 'title' => __( 'Import Tool', MS_TEXT_DOMAIN ) )
		);
		?>

		<div>
			<?php if ( $preview ) : ?>
				<form action="" method="post">
					<?php echo '' . $preview; ?>
				</form>
			<?php else : ?>
				<form action="" method="post" enctype="multipart/form-data">
					<?php MS_Helper_Html::settings_box(
						$import_fields,
						__( 'Import data', MS_TEXT_DOMAIN )
					); ?>
				</form>
				<form action="" method="post">
					<?php MS_Helper_Html::settings_box(
						$export_fields,
						__( 'Export data', MS_TEXT_DOMAIN )
					); ?>
				</form>
			<?php endif; ?>
		</div>
		<?php
		return ob_get_clean();
	}

}