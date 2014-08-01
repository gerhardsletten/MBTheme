<?php 

define('GOOGLE_ANALYTICS_ID', '');

$roots_includes = array(
  'lib/init.php',
  'lib/sidebar.php',
  'lib/title.php',
  'lib/content.php',
  'lib/gallery.php',
  'lib/comments.php',
  'lib/scripts.php',
  'lib/ajax.php',
  'lib/customize.php',
  'lib/mail.php',
  'lib/post_types.php',
  'lib/shortcodes.php',
  'lib/extras.php',
);

if (WP_ENV !== 'development') {
  $roots_includes[] = 'lib/custom_fields.php';
}

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'mb_theme'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
