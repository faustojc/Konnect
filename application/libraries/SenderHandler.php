<?php

class SenderHandler
{
    public function sendNotification($title, $message, $other = array())
    {
        $notification = array(
            'event' => 'notification',
            'data' => array(
                'title' => $title,
                'message' => $message
            )
        );

        if ($other != null) {
            $notification['data'] = array_merge($notification['data'], $other);
        }

        echo json_encode($notification) . "\n\n";

        ob_flush();
        flush();
    }

    public function updatePage()
    {
        echo "event: update\n";
        echo "data: update\n\n";

        ob_flush();
        flush();
    }
}
