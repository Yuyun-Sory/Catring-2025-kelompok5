<?php

namespace App\Services;

class ChatState
{
    public static function get()
    {
        return session('chat_state', [
            'step' => 'start',
            'data' => []
        ]);
    }

    public static function save($state)
    {
        session(['chat_state' => $state]);
    }

    public static function reset()
    {
        session()->forget('chat_state');
    }
}