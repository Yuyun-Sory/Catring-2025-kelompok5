<?php

namespace App\Services;

class ChatState
{
    public static function get()
    {
        if (!session()->has('chat_state')) {
            session()->put('chat_state', [
                'step' => 'start',
                'data' => []
            ]);
        }

        return session('chat_state');
    }

       public static function set(array $data): void
    {
        $state = self::get();

        foreach ($data as $key => $value) {
            $state[$key] = $value;
        }

        self::save($state);
    }

    public static function save($state)
    {
        session()->put('chat_state', $state);
    }

    public static function reset()
    {
        session()->forget('chat_state');
    }
}