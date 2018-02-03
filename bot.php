<?php
/*
 Telegram.me/OneProgrammer
 Telegram.me/SpyGuard
                   ----[ Lotfan Copy Right Ro Rayat Konid <3 ]----
############################################################################################
# if you need Help for develop this source , You Can Send Message To Me With @SpyGuard_BOT #
############################################################################################
*/
define('API_KEY','BOT TOKEN');
//----######------
function makereq($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//---------
$update = json_decode(file_get_contents('php://input'));
//=========
$chat_id = @$update->message->chat->id;
$message_id = @$update->message->message_id;
$from_id = @$update->message->from->id;
$name = @$update->message->from->first_name;
$username = @$update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$reply = isset($update->message->reply_to_message->forward_from->id)?$update->message->reply_to_message->forward_from->id:'';
$admins  = [66443035,0];
$plugins = [
  "ping",
  "messages",
  'feedback',
  'plugins_info'
];
$n = 0;
//--------

function SendMessage($ChatId, $TextMsg)
{
 makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
//===========

$plugins_count = count($plugins) - 1;
while ($n <= $plugins_count) {
  $plugin_path = "plugins/".$plugins[$n].".php";
  include($plugin_path);
  $n++;
}
?>
