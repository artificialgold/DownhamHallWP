<?php

class Way2enjoydirectory {
	
	
//       public function __construct($key = '', $secret = '') {
		         public function __construct() {
 
		   	//		add_action( 'wp_ajax_smush_get_directory_list', array( $this, 'directoryselection' ) );
//			add_action( 'wp_ajax_image_list', array( $this, 'image_list' ) );

       		add_action( 'wp_ajax_smush_get_directory_list', 'directoryselection' );

	//	   	add_action( 'wp_ajax_smush_get_directory_list', array( &$this, 'directoryselection' ) );

			add_action( 'wp_ajax_image_list', 'image_list' );
			
			
				add_action( 'wp_smush_before_advanced_settings', 'ui' );

			//Hook UI at the end of Settings UI
			add_action( 'smush_settings_ui_bottom', 'ui' );
    }
//if( !array_key_exists('HTTP_REFERER', $_SERVER) ) exit('No direct script access allowed');

/**
 * jQuery File Tree PHP Connector
 *
 * Version 1.1.0
 *
 * @author - Cory S.N. LaViska A Beautiful Site (http://abeautifulsite.net/)
 * @author - Dave Rogers - https://github.com/daverogers/jQueryFileTree
 *
 * History:
 *
 * 1.1.1 - SECURITY: forcing root to prevent users from determining system's file structure (per DaveBrad)
 * 1.1.0 - adding multiSelect (checkbox) support (08/22/2014)
 * 1.0.2 - fixes undefined 'dir' error - by itsyash (06/09/2014)
 * 1.0.1 - updated to work with foreign characters in directory/file names (12 April 2008)
 * 1.0.0 - released (24 March 2008)
 *
 * Output a list of files for jQuery File Tree
 */

/**
 * filesystem root - USER needs to set this!
 * -> prevents debug users from exploring system's directory structure
 * ex: $root = $_SERVER['DOCUMENT_ROOT'];
 */
//$root = null;

function directoryselection()
{
$root = $_SERVER['DOCUMENT_ROOT'];
//if( !$root ) exit("ERROR: Root filesystem directory not set in jqueryFileTree.php");

$postDir = rawurldecode($root.(isset($_POST['dir']) ? $_POST['dir'] : null ));

// set checkbox if multiSelect set to true
$checkbox = ( isset($_POST['multiSelect']) && $_POST['multiSelect'] == 'true' ) ? "<input type='checkbox' />" : null;
$onlyFolders = ( isset($_POST['onlyFolders']) && $_POST['onlyFolders'] == 'true' ) ? true : false;
$onlyFiles = ( isset($_POST['onlyFiles']) && $_POST['onlyFiles'] == 'true' ) ? true : false;

$supported_image = array(
				'gif',
				'jpg',
				'jpeg',
				'png'
			);

			$list = '';


if( file_exists($postDir) ) {

	$files		= scandir($postDir);
	$returnDir	= substr($postDir, strlen($root));

	natcasesort($files);

	if( count($files) > 2 ) { // The 2 accounts for . and ..

		echo "<ul class='jqueryFileTree'>";

		foreach( $files as $file ) {
			$htmlRel	= htmlentities($returnDir . $file,ENT_QUOTES);
			$htmlName	= htmlentities($file);
			$ext		= preg_replace('/^.*\./', '', $file);
$filenamwithpath=$postDir . $file;
			if( file_exists($postDir . $file) && $file != '.' && $file != '..' ) {
				if( is_dir($postDir . $file) && (!$onlyFiles || $onlyFolders) )
					echo "<li class='directory collapsed'>{$checkbox}<a rel='" .$htmlRel. "/'>" . $htmlName . "</a></li>";
			//	else if (!$onlyFolders || $onlyFiles)
		//    else if ( in_array( $ext, $supported_image ) && ! $this->is_media_library_file( $file_path ) ) 
       //       else if ( in_array( $ext, $supported_image ) && ! is_media_library_file( $filenamwithpath ) ) 

		   else if ( in_array( $ext, $supported_image )) 

					echo "<li class='file ext_{$ext}'>{$checkbox}<a rel='" . $htmlRel . "'>" . $htmlName . "</a></li>";
			}
		}

		echo "</ul>";
	}
}}


function is_media_library_file( $filenamwithpath ) {
			$upload_dir  = wp_upload_dir();
			$upload_path = $upload_dir["path"];

			//Get the base path of file
			$base_dir = dirname( $file_path );
			if ( $base_dir == $upload_path ) {
				return true;
			}

			return false;
		}






	function image_list() {

			
			////Verify nonce
//			check_ajax_referer( 'smush_get_image_list', 'image_list_nonce' );
//
//			//Check if directory path is set or not
//			if ( empty( $_GET['smush_path'] ) ) {
//				wp_send_json_error( "Empth Directory Path" );
//			}
//
//			//Get the File list
//			$files = $this->get_image_list( $_GET['smush_path'] );
//
//			//If files array is empty, send a message
//			if ( empty( $files['files_arr'] ) ) {
//				$this->send_error();
//			}
//
//			//Get the markup from the list
//			$markup = $this->generate_markup( $files );
$markup = 'hello-its-working.jpg';
			//Send response
			wp_send_json_success( $markup );

		}









	function ui() {
			global $WpSmush, $wpsmushit_admin, $wpsmush_bulkui;

			//Print Directory Smush UI, if not a network site
			if ( is_network_admin() ) {
				return;
			}

			//Remove the early hook
			if ( $WpSmush->validate_install() ) {
				remove_action( 'wp_smush_before_advanced_settings', array( $this, 'ui' ) );
			} else {
				remove_action( 'smush_settings_ui_bottom', array( $this, 'ui' ) );
			}

			//Reset the bulk limit
			if ( ! $WpSmush->validate_install() ) {
				//Reset Transient
				$wpsmushit_admin->check_bulk_limit( true, 'dir_sent_count' );
			}

			wp_nonce_field( 'smush_get_dir_list', 'list_nonce' );
			wp_nonce_field( 'smush_get_image_list', 'image_list_nonce' );

			/** Directory Browser and Image List **/
			$wpsmush_bulkui->container_header( 'wp-smush-dir-browser', 'wp-smush-dir-browser', esc_html__( "DIRECTORY SMUSH", "wp-smushit" ) ); ?>
            <div class="box-content">
            <div class="row">
                <div class="wp-smush-dir-desc roboto-regular">
                    <!-- Description -->
					<?php esc_html_e( "In addition to smushing your media uploads, you may want to also smush images living outside your uploads directory. Simply add any directories you wish to smush and bulk smush away!", "wp-smushit" ); ?>
                </div>
                <!-- Directory Path -->
                <input type="hidden" class="wp-smush-dir-path" value=""/>
                <div class="wp-smush-scan-result hidden">
                    <hr class="primary-separator"/>
                    <div class="content">
                        <!-- Show a list of images, inside a fixed height div, with a scroll. As soon as the image is
						optimised show a tick mark, with savings below the image. Scroll the li each time for the
						current optimised image -->
                    </div>
                    <!-- Notices -->
                    <div class="wp-smush-notice wp-smush-dir-all-done hidden" tabindex="0">
                        <i class="dev-icon dev-icon-tick"></i><?php esc_html_e( "All images for the selected directory are smushed and up to date. Awesome!", "wp-smushit" ); ?>
                    </div>
                    <div class="wp-smush-notice wp-smush-dir-remaining hidden" tabindex="0">
                        <i class="dev-icon wdv-icon wdv-icon-fw wdv-icon-exclamation-sign"></i><?php printf( esc_html__( "%s/%s image(s) were successfully smushed, however %s image(s) could not be smushed due to an error.", "wp-smushit" ), '<span class="wp-smush-dir-smushed"></span>', '<span class="wp-smush-dir-total"></span>', '<span class="wp-smush-dir-remaining"></span>' ); ?>
                    </div>
                    <div class="wp-smush-notice wp-smush-dir-limit hidden" tabindex="0">
                        <i class="dev-icon wdv-icon wdv-icon-fw wdv-icon-info-sign"></i><?php printf( esc_html__( " %sUpgrade to pro%s to bulk smush all your directory images with one click. Free users can smush 50 images with each click.", "wp-smushit" ), '<a href="' . esc_url( $wpsmushit_admin->upgrade_url ) . '" target="_blank" title="' . esc_html__( "WP Smush Pro", "wp-smushit" ) . '">', '</a>' ); ?>
                    </div>
                    <div class="wp-smush-all-button-wrap bottom">
                        <!-- @todo: Check status of the images in last scan and do not show smush now button, if already finished -->
                        <button class="wp-smush-start"><?php esc_html_e( "BULK SMUSH", "wp-smushit" ); ?></button>
                        <button type="button"
                                title="<?php esc_html_e( "Click to stop the directory smushing process.", "wp-smushit" ); ?>"
                                class="button button-grey wp-smush-pause disabled"><?php esc_html_e( "CANCEL", "wp-smushit" ); ?></button>
                        <span class="spinner"></span>
                    </div><?php
					//Nonce Field
					wp_nonce_field( 'wp_smush_all', 'wp-smush-all' ); ?>
                    <input type="hidden" name="wp-smush-continue-ajax" value=1>
                </div>
                <div class="dir-smush-button-wrap">
                    <button class="wp-smush-browse wp-smush-button button"><?php esc_html_e( "CHOOSE DIRECTORY", "wp-smushit" ); ?></button><?php
					//Optionally show a resume button, if there were images left from last scan
					$this->show_resume_button(); ?>
                    <span class="spinner"></span>
                </div>
                <div class="dev-overlay wp-smush-list-dialog roboto-regular">
                    <div class="back"></div>
                    <div class="box-scroll">
                        <div class="box">
                            <div class="title"><h3><?php esc_html_e( "Directory list", "wp-smushit" ); ?></h3>
                                <div class="close" aria-label="Close">×</div>
                            </div>
                            <div class="wp-smush-instruct"><?php esc_html_e( "Choose the folder you wish to smush.", "wp-smushit" ); ?></div>
                            <div class="content">
                            </div>
                            <div class="wp-smush-select-button-wrap">
                                <div class="wp-smush-section-desc"><?php esc_html_e( "Smush will also include any images in sub folders of your selected folder.", "wp-smushit" ); ?></div>
                                <div class="wp-smush-select-button-wrap-child">
                                    <span class="spinner"></span>
                                    <button class="wp-smush-select-dir"><?php esc_html_e( "ADD DIRECTORY", "wp-smushit" ); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="wp-smush-base-path" value="<?php echo $this->get_root_path(); ?>">
            </div>
            </div><?php
			echo "</section>";

		}













}
?>
