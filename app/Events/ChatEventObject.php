<?php

namespace App\Events;

class ChatEventObject
{
    /**
     * @var string
     */
    public $sender;

    /**
     * @var string
     */
    public $message;

    public function __construct($sender, $message)
    {
        $this->message = $message;
        $this->sender = $sender;
    }
}
