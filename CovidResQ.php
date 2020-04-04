<?php
/**
* @package CovidResQ
*/

/*
Plugin Name: Covid ResQ
Plugin URI: https://github.com/Arthidm/COVID-rescue-team
Description: A Plugin that will allow your users to find or provide help for those in need during the Lockdown.
Version: 1.0.0
Author: Istvan Lazar
Author URI: https://github.com/Istvanlaz
License: GPL v2 or later
Text Domain: CovidResQ
*/

/*
CovidResQ is a WordPress Plugin targeted at putting in contact those in need of help with those looking for help during the covid crisis.
Copyright (C) 2020  Istvan Lazar

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined( 'ABSPATH' ) or die( 'Hey! What are you trying to do here? You silly human!' );


class CovidResQ
{
  function __construct() {
    add_action( 'init', array( $this, 'custom_post_type' ) );
  }

  function register() {
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
  }

  // function activate() {
  //   // generated a CPT
  //   $this->custom_post_type();
  //   // flush rewrite rules
  //   flush_rewrite_rules();
  // }

  // function deactivate() {
  //   // flush rewrite rules
  //   flush_rewrite_rules();
  // }

  // function uninstall() {
  //   // delete CPT
  //   // delete all the plugin data from the DB
  // }

  function custom_post_type() {
    register_post_type( 'redirection', ['public' => true, 'label' => 'Redirections'] );
  }

  function enqueue() {
    // enqueue all our scripts
    wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
    wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
  }

  function activate() {
    require_once plugin_dir_path( __FILE__) . 'inc/CovidResQ-activate.php';
    CovidResQActivate::activate();
  }

  function deactivate() {
    require_once plugin_dir_path( __FILE__) . 'inc/CovidResQ-deactivate.php';
    CovidResQDeactivate::deactivate();
  }
}

if ( class_exists( 'CovidResQ' ) ) {
  $covidResQ = new CovidResQ();
  $covidResQ->register();
}


// activation
register_activation_hook( __FILE__, array( $covidResQ, 'activate' ) );

// deactivation
register_deactivation_hook( __FILE__, array( $covidResQ, 'deactivate' ) );

// uninstall
// register_uninstall_hook( __FILE__, array( $covidResQ, 'uninstall' ) );




