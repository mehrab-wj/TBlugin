<?php
$plugin_info = [
  "name"=>"Plugins info",
  "description"=>"this plugin can send plugin list and plugins information",
  "developer"=>"@OneProgrammer"
];
if ($textmessage == "/plugins") {
  $str_plugins = "";
  $n = 0;
  $plugins_count = count($plugins) - 1;
  while ($n <= $plugins_count) {
    $str_plugins = $str_plugins." \n`".($n + 1).'- '.$plugins[$n].'`';
    $n++;
  }
  SendMessage($chat_id,"*Actived plugins :*".$str_plugins."\n\nSend `/more [plugin name]` for more info.");
}
if (strpos($textmessage,"/more") !== false) {
  $plugin_name = str_replace("/more","",$textmessage);
  $plugin_name = str_replace("[","",$plugin_name);
  $plugin_name = str_replace("]","",$plugin_name);
  $plugin_name = str_replace(" ","",$plugin_name);

  if ($plugin_name == "") {
    SendMessage($chat_id,"You not entered plugin name ⚠️\nSend `/more [plugin name]` for more info.");
  }
  else {
    $plugin_path = "plugins/$plugin_name.php";
    if (file_exists($plugin_path)) {
    include($plugin_path);
    SendMessage($chat_id,"*$plugin_name* :
    `Name` : *{$plugin_info['name']}*
    `Description` : *{$plugin_info['description']}*
    `Plugin Developer` : *{$plugin_info['developer']}*
");
}
else {
  SendMessage($chat_id,"plugin not exist!\n");
}
  }
}
 ?>
