<?php
/**
 * Plugin Name:       WP Instagram Feed Gallery
 * Plugin URI:        https://quadlayers.com/portfolio/instagram-gallery/
 * Description:       Display beautifull and responsive galleries on your website from your Instagram feed account.
 * Version:           2.4.3
 * Author:            WP Instagram Feed
 * Author URI:        https://quadlayers.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       insta-gallery
 * Domain Path:       /languages
 */
if (!defined('ABSPATH'))
  exit;

if (!defined('QLIGG_PLUGIN_NAME')) {
  define('QLIGG_PLUGIN_NAME', 'Instagram Gallery');
}
if (!defined('QLIGG_PLUGIN_VERSION')) {
  define('QLIGG_PLUGIN_VERSION', '2.4.3');
}
if (!defined('QLIGG_PLUGIN_FILE')) {
  define('QLIGG_PLUGIN_FILE', __FILE__);
}
if (!defined('QLIGG_PLUGIN_DIR')) {
  define('QLIGG_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR);
}
if (!defined('QLIGG_DOMAIN')) {
  define('QLIGG_DOMAIN', 'qligg');
}
if (!defined('QLIGG_WORDPRESS_URL')) {
  define('QLIGG_WORDPRESS_URL', 'https://wordpress.org/plugins/insta-gallery/');
}
if (!defined('QLIGG_REVIEW_URL')) {
  define('QLIGG_REVIEW_URL', 'https://wordpress.org/support/plugin/insta-gallery/reviews/?filter=5#new-post');
}
if (!defined('QLIGG_DEMO_URL')) {
  define('QLIGG_DEMO_URL', 'https://quadlayers.com/portfolio/wordpress-instagram-feed/?utm_source=qligg_admin');
}
if (!defined('QLIGG_PURCHASE_URL')) {
  define('QLIGG_PURCHASE_URL', QLIGG_DEMO_URL);
}
if (!defined('QLIGG_SUPPORT_URL')) {
  define('QLIGG_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=qligg_admin');
}
if (!defined('QLIGG_GROUP_URL')) {
  define('QLIGG_GROUP_URL', 'https://www.facebook.com/groups/quadlayers');
}
if (!defined('QLIGG_DEVELOPER')) {
  define('QLIGG_DEVELOPER', false);
}

if (!class_exists('QLIGG')) {

  class QLIGG {

    protected static $instance;

    function register_widget() {
      register_widget('QLIGG_Widget');
    }

    function api() {

      global $qligg_api;

      if (!class_exists('QLIGG_API')) {

        include_once ('includes/api.php');
        include_once ('includes/ajax.php');

        $qligg_api = new QLIGG_API();
      }
    }

    function includes() {
      include_once ('includes/utis.php');
      include_once ('includes/widget.php');
      include_once ('includes/defaults.php');
      include_once ('includes/settings.php');
      include_once ('includes/frontend.php');
    }

    function i18n() {
      load_plugin_textdomain('insta-gallery', false, QLIGG_PLUGIN_DIR . '/languages/');
    }

    function init() {
      add_action('widgets_init', array($this, 'register_widget'));
      add_action('plugins_loaded', array($this, 'i18n'));
    }

    public static function instance() {
      if (!isset(self::$instance)) {
        self::$instance = new self();
        self::$instance->api();
        self::$instance->includes();
        self::$instance->init();
      }
      return self::$instance;
    }

    public static function do_activation() {
      set_transient('qligg-first-rating', true, MONTH_IN_SECONDS);
    }

  }

  QLIGG::instance();

  register_activation_hook(QLIGG_PLUGIN_FILE, array('QLIGG', 'do_activation'));
}