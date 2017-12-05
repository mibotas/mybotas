<?php

/**
 * Telegram Bot Class.
 * @author Gabriele Grillo <gabry.grillo@alice.it>
 */
class Telegram {

    private $bot_id = "";
    private $data = array();
    private $updates = array();

    public function __construct($bot_id) {
        $this->bot_id = $bot_id;
        $this->data = $this->getData();
    }

    /// Get the data of the current message
    /** Get the POST request of a user in a Webhook.
     * \return the JSON users's message
     */
    public function getData() {
        if (empty($this->data)) {
            $rawData = file_get_contents("php://input");
            return json_decode($rawData, true);
        } else {
            return $this->data;
        }
    }

    /// Do requests to Telegram Bot API
    /**
     * Contacts the various API's endpoints */
    public function endpoint($api, array $content, $post = true) {
        $url = 'https://api.telegram.org/bot' . $this->bot_id . '/' . $api;
        if ($post)
            $reply = $this->sendAPIRequest($url, $content);
        else
            $reply = $this->sendAPIRequest($url, array(), false);
        return json_decode($reply, true);
    }
    private function sendAPIRequest($url, array $content, $post = true) {
        if (isset($content['chat_id'])) {
            $url = $url . "?chat_id=" . $content['chat_id'];
            unset($content['chat_id']);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
    ///////   COMANDOS  /////////////////

    /// SEND MESSAGE =================================================================================
    public function sendMessage(array $content) {
        return $this->endpoint("sendMessage", $content);
    }
    
    public function sendPhoto(array $content) {
        return $this->endpoint("sendPhoto", $content);
    }

    /// Set a custom keyboard
    public function buildKeyBoard(array $options, $onetime = false, $resize = true, $selective = false) {
        $replyMarkup = array(
            'keyboard' => $options,
            'one_time_keyboard' => $onetime,
            'resize_keyboard' => $resize,
            'selective' => $selective
        );
        $encodedMarkup = json_encode($replyMarkup);
        return $encodedMarkup;
    }
    
    /// Set an InlineKeyBoard
    public function buildInlineKeyBoard(array $options) {
        $replyMarkup = array(
            'inline_keyboard' => array( $options ),
        );
        $encodedMarkup = json_encode($replyMarkup);
        return $encodedMarkup;
    }

    /// Create an InlineKeyboardButton
    public function buildInlineKeyboardButton($text, $url = "", $callback_data = "", $switch_inline_query = "") {
        $replyMarkup = array(
            'text' => $text
        );
        if ($url != "") {
            $replyMarkup['url'] = $url;
        } else if ($callback_data != "") {
            $replyMarkup['callback_data'] = $callback_data;
        } else if ($switch_inline_query != "") {
            $replyMarkup['switch_inline_query'] = $switch_inline_query;
        }
        return $replyMarkup;
    }

/// Hide a custom keyboard
    /** Upon receiving a message with this object, Telegram clients will hide the current custom keyboard and display the default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is made for one-time keyboards that are hidden immediately after the user presses a button. 
*/
    public function buildKeyBoardHide($selective = true) {
        $replyMarkup = array(
            'hide_keyboard' => true,
            'selective' => $selective
        );
        $encodedMarkup = json_encode($replyMarkup);
        return $encodedMarkup;
    }
    
    /// Get the text of the current message
    public function Text() {
        return $this->data["message"]["text"];
    }

    /// Get the chat_id of the current message
    public function ChatID() {
        return $this->data["message"]["chat"]["id"];
    }
    
    /** getChatMember	*/ 
    public function getChatMember(array $content) {
        return $this->endpoint("getChatMember", $content);
    }

    /// Get the first name of the user
    public function FirstName() {
        return $this->data["message"]["from"]["first_name"];
    }

/// Get the last name of the user
    public function LastName() {
        return $this->data["message"]["from"]["last_name"];
    }

/// Get the username of the user
    public function Username() {
        return $this->data["message"]["from"]["username"];
    }

}
?>
