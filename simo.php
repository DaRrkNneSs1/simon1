<?php
$Tok = '6261287566:AAGp0NpLD83eASGU6-YNC0NzK1-b4z3Tb3I'; 

define('API_KEY',$Tok);
function bot($method,$datas=[]){
$function = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$function";
$function1 = file_get_contents($url);
return json_decode($function1);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$message_id =  $message->message_id;
$name = $message->from->first_name;
$user = $message->from->username;
$id = $message->from->id;
$admin =  830359032;

if($text == "/start" and $id != $admin){
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"اهلا بك عزيزي المستخدم 🐣",
  'disable_web_page_preview'=>'true',
  'parse_mode'=>"MarkDown"
]);
bot('sendMessage',[
    'chat_id'=>$admin,
    'text'=>"هناك شخص دخل بوتك 🤖.",
  'disable_web_page_preview'=>'true',
  'parse_mode'=>"MarkDown"
]);
}

if($text == "تيست" and $id = $admin){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"شغال ☑️",
'reply_to_message_id'=>$message->message_id, 
]);
}