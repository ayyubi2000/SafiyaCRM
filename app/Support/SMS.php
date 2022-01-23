<?php


namespace App\Support;

use Http;


class SMS
{
    public static function amount($text)
    {
        $pattern = '/[а-яА-Я]+/';
        preg_match($pattern, $text, $matches);

        $len = mb_strlen($text);

        //константы длины
        $rusLimits = array(70, 67);
        $engLimits = array(160, 153);

        //кириллица
        if ( sizeof($matches) > 0 ) {
            if ($len <= $rusLimits[0]) {
                $smsCount = 1;
            } else {
                $smsCount = ceil($len / $rusLimits[1]);
            }
        } else {
            if ($len<=$engLimits[0]) {
                $smsCount = 1;
            } else {
                $smsCount = ceil($len/$engLimits[1]);
            }
        }
        return $smsCount;
    }

    public static function send($message, $number)
    {
        $id = (int) file_get_contents(storage_path('app/play-mobile-id.txt'));
        file_put_contents(storage_path('app/play-mobile-id.txt'), ++$id);

        $messages = [
            "recipient" => $number,
            "message-id" => "epates$id",

            'sms' => [
                "originator" => "3700",
                "content" => [
                    "text" => $message,
                ],
            ],
        ];

        return Http::withBody(
            '{"messages":[' . json_encode($messages) . ']}', 'application/json'
        )->withBasicAuth('a_http', 'at#GWWRqO1')
            ->post('http://91.204.239.44/broker-api/send')->body();


    }
    public static function sendAll($datas)
    {
        foreach ($datas as $data){
            $id = (int) file_get_contents(storage_path('app/play-mobile-id.txt'));
            file_put_contents(storage_path('app/play-mobile-id.txt'), ++$id);

            $messages = [
                "recipient" => $data->number,
                "message-id" => "epates$id",

                'sms' => [
                    "originator" => "3700",
                    "content" => [
                        "text" => $data->message,
                    ],
                ],
            ];

            return Http::withBody(
                '{"messages":[' . json_encode($messages) . ']}', 'application/json'
            )->withBasicAuth('a_http', 'at#GWWRqO1')
                ->post('http://91.204.239.44/broker-api/send')->body();
        }
    }

}
