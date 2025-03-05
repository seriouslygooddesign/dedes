<?php
if (!defined('FOOTER_SIDEBAR_QUANTITY')) {
    define('FOOTER_SIDEBAR_QUANTITY', 4);
}

if (!defined('CONTENT_BLOCK_CLASS')) {
    define('CONTENT_BLOCK_CLASS', 'content-block');
}

if (!defined('CONTENT_BLOCK_CONTENT')) {
    define('CONTENT_BLOCK_CONTENT', CONTENT_BLOCK_CLASS . '__content');
}

if (!defined('CONTENT_BLOCK_MODIFIER')) {
    define('CONTENT_BLOCK_MODIFIER', CONTENT_BLOCK_CLASS . '--');
}

if (!defined('WHATS_ON_POST_TYPE_NAME')) {
    define('WHATS_ON_POST_TYPE_NAME', 'whats_on');
}

if (!defined('WHATS_ON_URL_PREFIX')) {
    define('WHATS_ON_URL_PREFIX', 'whats-on');
}

if (!defined('WHATS_ON_TEMPLATE_NAME')) {
    define('WHATS_ON_TEMPLATE_NAME', 'single-' . WHATS_ON_POST_TYPE_NAME . '.php');
}

if (!defined('WHATS_ON_QUERY_VAR')) {
    define('WHATS_ON_QUERY_VAR', 'whats_on_title');
}
