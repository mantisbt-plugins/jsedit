<?php
/**
 * Created on 08.02.2010
 *
 * Copyright (C) 2010	Kirill Krasnov
 * ICQ					82427351
 * JID					krak@jabber.ru
 * Skype				kirillkr
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

/**
 *  requires MantisPlugin.class.php
 */

require_once( config_get( 'class_path' ) . 'MantisPlugin.class.php' );

class jseditPlugin extends MantisPlugin {
	
	function register( ) {
		$this->name 		= 'JSEdit';
		$this->description	= 'Add jsQuery Wysiwyg for Mantis';
		$this->version		= '0.1.0 early public';
		$this->requires		= array(
			'MantisCore' => '1.2.0',
			'jQuery' => '1.3',
		);
		$this->author		= 'Krasnov Kirill';
		$this->contact		= 'krasnovforum@gmail.com';
		$this->url			= 'http://www.kraeg.ru';
	}
	
	function install( ) {
		return true;
	}

	function hooks( ) {
		$t_hooks = array(
			'EVENT_LAYOUT_RESOURCES'  => 'print_head_js',
		);
		return array_merge( parent::hooks(), $t_hooks );
	}

	function print_head_js( ) {
		$t_st = '';
		if ( is_page_name('bug_report_page.php')||is_page_name('bug_update_page.php') ) {
			$t_st .= "\t<script type=\"text/javascript\" src=\"" . plugin_file( 'jquery_wysiwyg.js' ) . "\"></script>\n";
			$t_st .= "\t<link rel=\"stylesheet\" href=\"" . plugin_file( 'jquery_wysiwyg.css' ) . "\" />\n";
			$t_st .= "\t<script type=\"text/javascript\">\n";
			$t_st .= "\t\t$(function()\n";
			$t_st .= "\t\t{\n";
			$t_st .= "\t\t$('textarea').wysiwyg();\n";
			$t_st .= "\t\t});\n";
			$t_st .= "\t</script>\n";
		}
		return $t_st;
	}
}
?>