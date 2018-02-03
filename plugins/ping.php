<?php
$plugin_info = [
  "name"=>"Ping",
  "description"=>"this is very simple plugin for ping,pong game",
  "developer"=>"@OneProgrammer"
];
if ($textmessage == "/ping") {
  SendMessage($chat_id,"pong 😌");
}
 ?>
