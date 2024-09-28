<?php

/****************************** Required Files */
require_once( __DIR__ . '/inc/classes/cyn-customize.php' );
require_once( __DIR__ . '/inc/classes/cyn-acf.php' );
require_once( __DIR__ . '/inc/classes/cyn-register.php' );
require_once( __DIR__ . '/inc/classes/cyn-admin.php' );
require_once( __DIR__ . '/inc/classes/cyn-hook.php' );
require_once( __DIR__ . '/inc/classes/cyn-options.php' );
require_once( __DIR__ . '/inc/classes/cyn-theme-init.php' );
require_once( __DIR__ . '/inc/classes/cyn-form.php' );

require_once( __DIR__ . '/inc/functions/cyn-update-checker.php' );

/***************************** Instance Classes */
$cyn_theme_init = new cyn_theme_init( true, '2.2.5' );
$cyn_customize = new cyn_customize;
$cyn_register = new cyn_register;
$cyn_admin = new cyn_admin;
$cyn_hook = new cyn_hook;
$cyn_form = new cyn_form;
$cyn_acf = new cyn_acf;
