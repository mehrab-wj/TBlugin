<?php
global $admins;
$admins  = [66443035,0];
$plugins = [
  "ping"
];

function load_plugins($plugins_array) {
  include_once("bot.php");
  $n = 0;
  $plugins_count = count($plugins_array) - 1;
  while ($n <= $plugins_count) {
    $plugin_path = "plugins/".$plugins_array[$n].".php";
    include_once($plugin_path);
    //echo $plugin_name;
    $n++;
  }
}
load_plugins($plugins);
 ?>
