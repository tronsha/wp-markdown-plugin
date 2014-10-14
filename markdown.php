<?php
/**
 * @link              https://github.com/tronsha/wp-markdown-plugin
 * @since             1.0.0
 * @package           wp-markdown-plugin
 *
 * @wordpress-plugin
 * Plugin Name:       MPCX Markdown
 * Plugin URI:        https://github.com/tronsha/wp-markdown-plugin
 * Description:       Markdown Plugin
 * Version:           1.0.0
 * Author:            Stefan Hüsges
 * Author URI:        http://www.mpcx.net/
 * Copyright:         Stefan Hüsges
 * License:           MIT
 * License URI:       https://raw.githubusercontent.com/tronsha/wp-markdown-plugin/master/LICENSE
 */

defined('ABSPATH') or (@include_once explode('wp-content', __DIR__)[0] . '/wp-hide.php') or die;

require_once(realpath(dirname(__FILE__) . '/library/Michelf/Markdown.inc.php'));

use \Michelf\Markdown;

add_shortcode(
    'markdown',
    function ($att = array(), $content = null) {
        if (empty($att['url']) === false) {
            $content = file_get_contents($att['url']);
        } elseif (empty($content) === true) {
            return '';
        }
        return Markdown::defaultTransform($content);
    }
);
