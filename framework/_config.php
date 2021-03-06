<?php

/**
 * Framework configuration file
 *
 * Here you can make different settings for the Framework module (the core
 * module).
 *
 * For example you can register the authentication methods you wish to use
 * on your site, e.g. to register the OpenID authentication method type
 *
 * <code>
 * Authenticator::register_authenticator('OpenIDAuthenticator');
 * </code>
 *
 * @package framework
 * @subpackage core
 */

/**
 * PHP 5.2 introduced a conflict with the Datetime field type, which was renamed to SSDatetime. This was later renamed
 * to SS_Datetime to be consistent with other namespaced classes.
 *
 * Overload both of these to support legacy code.
 */
Object::useCustomClass('SSDatetime', 'SS_Datetime', true);
Object::useCustomClass('Datetime',   'SS_Datetime', true);

/**
 * The root directory of TinyMCE
 */
define('MCE_ROOT', FRAMEWORK_DIR . '/thirdparty/tinymce/');

ShortcodeParser::get('default')->register('file_link', array('File', 'link_shortcode_handler'));
ShortcodeParser::get('default')->register('embed', array('Oembed', 'handle_shortcode'));

/**
 * The secret key that needs to be sent along with pings to /Email_BounceHandler
 *
 * Change this to something different for increase security (you can
 * override it in mysite/_config.php to ease upgrades).
 * For more information see:
 * {@link http://doc.silverstripe.org/doku.php?id=email_bouncehandler}
 */
if(!defined('EMAIL_BOUNCEHANDLER_KEY')) {
	define('EMAIL_BOUNCEHANDLER_KEY', '1aaaf8fb60ea253dbf6efa71baaacbb3');
}

// Zend_Cache temp directory setting
$_ENV['TMPDIR'] = TEMP_FOLDER; // for *nix
$_ENV['TMP'] = TEMP_FOLDER; // for Windows

$aggregatecachedir = TEMP_FOLDER . DIRECTORY_SEPARATOR . 'aggregate_cache';
if (!is_dir($aggregatecachedir)) mkdir($aggregatecachedir);

SS_Cache::add_backend('aggregatestore', 'File', array('cache_dir' => $aggregatecachedir));
SS_Cache::pick_backend('aggregatestore', 'aggregate', 1000);

// If you don't want to see deprecation errors for the new APIs, change this to 3.0.0-dev.
Deprecation::notification_version('3.0.0');

// TODO Remove once new ManifestBuilder with submodule support is in place
require_once('admin/_config.php');

