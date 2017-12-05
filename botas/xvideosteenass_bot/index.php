<?php
/**
 * Telegram Bot example.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 * 
 * ////////////////    XVIDEOS TEENS BOT      //////////////////////////
 */

require_once("Telegram.php");
require_once("videos.php");


// Set the bot TOKEN

// antigo token
//$bot_id = "301192259:AAHt-N8x35EGTqiHHNrVoZNwe6jrPwx7ivM";
$bot_id = "320918042:AAE5IgeCOuzEoRzAeQEZXkWkQ6sTEZ9Ft_Q";

// Instances the class

$telegram = new Telegram($bot_id);
/* If you need to manually take some parameters
*  $result = $telegram->getData();
*  $text = $result["message"] ["text"];
*  $chat_id = $result["message"] ["chat"]["id"];
*/

// Take text and chat_id from the message

$text = $telegram->Text();
$chat_id = $telegram->ChatID();
$result = $telegram->getData();

$name = $result['message']['from']['first_name'];

//$inline_keyboard = array('inline_keyboard' => array(array(array(text' => 'oi', 'url' => 'http://www.xvideos.com'))));
$keyboard_one = array(
		array($videos[0]['title'], $videos[1]['title']), 
		array($videos[2]['title'], $videos[3]['title']), 
		array($videos[4]['title'], $videos[5]['title']), 
		array($videos[6]['title'], "\xE2\x96\xB6 MORE")
		);
$keyboard_two = array(
		array($videos[7]['title'], $videos[8]['title']),
		array($videos[9]['title'], $videos[10]['title']),
		array($videos[11]['title'], $videos[12]['title']),
		array($videos[13]['title'], "\xE2\x97\x80 BACK")
		);

switch($text) {
    case "/start":
        $reply = "Hi, $name!\nWelcome to *XVIDEOS TEEN ANAL BOT*.\n\nI am a bot that shows the best XVideos Teens Anal Videos from Internet.";
        $keyb = $telegram->buildKeyBoard($keyboard_one, $one_time = false, $resizable = true);
        $content = array( 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $keyb, 'parse_mode' => 'Markdown' );
        $telegram->sendMessage($content);
        $reply = "What do you want to do?\n\nUse /pictures to get access to hundreds of teens images.\n\nUse /chat to chat with naked girls right now for free.";
        $content = array( 'chat_id' => $chat_id, 'text' => $reply);        
        $telegram->sendMessage($content);
    break;
    case $videos[0]['title']:
    	$photo = $videos[0]['img'];
    	$caption = $videos[0]['title'];
    	$link = $videos[0]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[1]['title']:
    	$photo = $videos[1]['img'];
    	$caption = $videos[1]['title'];
    	$link = $videos[1]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[2]['title']:
    	$photo = $videos[2]['img'];
    	$caption = $videos[2]['title'];
    	$link = $videos[2]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[3]['title']:
    	$photo = $videos[3]['img'];
    	$caption = $videos[3]['title'];
    	$link = $videos[3]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[4]['title']:
    	$photo = $videos[4]['img'];
    	$caption = $videos[4]['title'];
    	$link = $videos[4]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[5]['title']:
    	$photo = $videos[5]['img'];
    	$caption = $videos[5]['title'];
    	$link = $videos[5]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[6]['title']:
    	$photo = $videos[6]['img'];
    	$caption = $videos[6]['title'];
    	$link = $videos[6]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    // More
    case "\xE2\x96\xB6 MORE":
        $keyb = $telegram->buildKeyBoard($keyboard_two, $onetime = false, $resizable = true);
        $reply = "\xF0\x9F\x91\x8D Enjoy more Teens in this page.";
        $content = array( 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $keyb );
        $telegram->sendMessage($content);
    break;
    case $videos[7]['title']:
    	$photo = $videos[7]['img'];
    	$caption = $videos[7]['title'];
    	$link = $videos[7]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[8]['title']:
    	$photo = $videos[8]['img'];
    	$caption = $videos[8]['title'];
    	$link = $videos[8]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[9]['title']:
    	$photo = $videos[9]['img'];
    	$caption = $videos[9]['title'];
    	$link = $videos[9]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[10]['title']:
    	$photo = $videos[10]['img'];
    	$caption = $videos[10]['title'];
    	$link = $videos[10]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[11]['title']:
    	$photo = $videos[11]['img'];
    	$caption = $videos[11]['title'];
    	$link = $videos[11]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[12]['title']:
    	$photo = $videos[12]['img'];
    	$caption = $videos[12]['title'];
    	$link = $videos[12]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    case $videos[13]['title']:
    	$photo = $videos[13]['img'];
    	$caption = $videos[13]['title'];
    	$link = $videos[13]['url'];
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Watch", $link, "", ""));
	$keyb = $telegram->buildInlineKeyBoard($option);
        $telegram->sendPhoto(array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'photo' => $photo, 'caption' => $caption."\nWatch:".$link));
    break;
    // Back
    case "\xE2\x97\x80 BACK":
        $keyb = $telegram->buildKeyBoard($keyboard_one, $onetime = false, $resizable = true);
        $reply = "\xF0\x9F\x8F\xA0 Welcome back to Home Page.";
        $content = array( 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $keyb );
        $telegram->sendMessage($content);
    break;
    // /pictures
    case "/pictures":
    	$link = "http://viid.me/qw91yS";
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to View", $link, "", ""));
        $keyb = $telegram->buildInlineKeyBoard($option);
        $reply = "Enjoy these Teens images right now. <a href='".$link."'>Click to proceed.</a>";
        $content = array( 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $keyb, 'parse_mode' => 'HTML' );
        $telegram->sendMessage($content);
    break;
    // /chat
    case "/chat":
        $link = "http://viid.me/qw91Z1";
    	$option = array( $telegram->buildInlineKeyboardButton($text = "Click to Chat", $link, "", ""));
        $keyb = $telegram->buildInlineKeyBoard($option);
        $reply = "Chat with naked girls right now for free.. <a href='".$link."'>Click to proceed.</a>";
        $content = array( 'chat_id' => $chat_id, 'text' => $reply, 'reply_markup' => $keyb, 'parse_mode' => 'HTML' );
        $telegram->sendMessage($content);
    break;
    default:
        $reply = "I don't understand!\nTry again, please!";
        $content = array( 'chat_id' => $chat_id, 'text' => $reply );
        $telegram->sendMessage($content);
}
?>
