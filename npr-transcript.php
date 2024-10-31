<?php

/*
  Plugin Name: NPR Transcript
  Plugin URI: http://nductiv.com
  Description: Insert Transcript of NPR Show into page/post
  Version: 1.01
  Author: Tony Asch
  Author URI: http://nductiv.com
 */

/*
  NPR Transcript (Wordpress Plugin)
  Copyright (C) 2012 Tony Asch
  Contact me at http://nductiv.com

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

//tell wordpress to register the demolistposts shortcode
add_shortcode("npr-transcript", "nprtranscript_handler");

function nprtranscript_handler($incoming) {
    $incoming = shortcode_atts(array(
        "story" => "",
        "class" => "npr_para",
        "lp_class" => "npr_lp",
        "l_class" => "npr_l",
        "link_phrase" => "Listen on NPR.ORG"
            ), $incoming);
    //run function that actually does the work of the plugin
    if (get_option('npr_api_key') == "")  {
        return("NPR API Key not set");
    }
    $xml_uri = 'http://api.npr.org/transcript?id=' . $incoming["story"] . '&apiKey=' . get_option('npr_api_key');
    if (!$xml = simplexml_load_file($xml_uri)) {
        echo "Transcript not available";
    }
    $npr = "";
    $the_class = $incoming["class"];
    $the_lp_class = $incoming["lp_class"];
    $the_l_class = $incoming["l_class"];
    
    foreach ($xml->paragraph as $para) {
        $npr = $npr . '<p class="' . $the_class . '">' . $para . '</p>';
    }
    $npr = $npr . '<p class="' . $the_lp_class . '"><a class="' . $the_l_class . '" target="_blank" href="' . $xml->story->link . '">' . $incoming["link_phrase"] . '</a></p>';
    return $npr;
}

function npr_admin_actions() {
    add_options_page("NPR Transcript", "NPR Transcript", 9, basename(__FILE__), "npr_admin");
}

function npr_admin() {
    include('npr-transcript_admin.php');
}

	function npr_install(){
		add_option('npr_api_key','');
	}
	function npr_uninstall(){
		delete_option('npr_api_key');
	}

	register_activation_hook(__FILE__,'npr_install');
	register_deactivation_hook(__FILE__,'npr_uninstall');

add_action('admin_menu', 'npr_admin_actions');
?>
