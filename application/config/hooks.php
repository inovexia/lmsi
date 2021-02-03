<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

/* Load Default Settings */
$hook['pre_controller'][] = array(
        'class'    => 'Vitals',
        'filename' => 'Vitals.php',
        'function' => 'load_theme',
        'filepath' => 'hooks',
        'params'   => ''
);

$hook['pre_controller'][] = array(
        'class'    => 'Vitals',
        'filename' => 'Vitals.php',
        'function' => 'is_student',
        'filepath' => 'hooks',
        'params'   => ''
);

$hook['pre_controller'][] = array(
        'class'    => 'Vitals',
        'filename' => 'Vitals.php',
        'function' => 'validate_session',
        'filepath' => 'hooks',
        'params'   => ''
);

/*
$hook['pre_controller'][] = array(
        'class'    => 'Vitals',
        'filename' => 'Vitals.php',
        'function' => 'setup_login',
        'filepath' => 'hooks',
        'params'   => ''
);

/* Load ACL Menu  * /
$hook['pre_controller'][] = array(
        'class'    => 'Vitals',
        'function' => 'load_acl_menu',
        'filename' => 'Vitals.php',
        'filepath' => 'hooks',
        'params'   => ''
);

$hook['display_override'][] = array(
  'class' => '',
  'function' => 'compress',
  'filename' => 'compress.php',
  'filepath' => 'hooks'
  );*/