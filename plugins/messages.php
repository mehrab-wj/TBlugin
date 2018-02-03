<?php
$plugin_info = [
  "name"=>"Message list",
  "description"=>"simple plugin for set static messages",
  "developer"=>"@OneProgrammer"
];
$message_list = [
"/start"=>"Hi dear $name
Welcome to TBlugin Example Bot !
TBlugin is a Telegram Bot Plugin library can help you to develop your bots with writing plugins 😄
You can use /help tp see bot commands",

"/help"=>"
/start : *start the bot*
/help : *get the bot commands*
/plugins : *get the actived plugins name*
/developer : *get the TBlugin developer information*
/feedback [message] : *send your feedback to us*
",

"command"=>"answer ;)",

"/developer"=>"
TBlugin - Telegram Bot Plugin library
🌟[Repository on github](https://github.com/mehrab-wj/TBlugin)
👤[Developer website](https://mehrab.xyz)
🖥[Developers and Programmer Market](https://marketeman.in)

"
];
SendMessage($chat_id,@$message_list[$textmessage]);
?>
