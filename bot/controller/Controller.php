<?php

use \TelegramPhp\Buttons;
use \TelegramPhp\Methods;

class Controller {

    public function start ($bot, $data){

        Methods::sendMessage ([
            'chat_id' => $bot->getChatId (),
            'text' => $this->lang ($bot, __FUNCTION__),
            'reply_markup' => Buttons::replyKeyBoardMarkup ([
                [Buttons::keyBoardButtonRequestLocation ('My location')]
            ], false, true, true)
        ]);

    }
    
    public function help ($bot, $data){

        Methods::sendMessage ([
            'chat_id' => $bot->getChatId (),
            'text' => $this->lang ($bot, __FUNCTION__)
        ]);

    }
    
    public function weather ($bot, $data){

        $location = $bot->getLocation ();
        $latitude = $location ['latitude'] ?? $data ['latitude'];
        $longitude = $location ['longitude'] ?? $data ['longitude'];

        $weather = OpenMeteo::getWeather ($latitude, $longitude); //json_decode (file_get_contents (__DIR__ . '/../../weather.json'), true);

        // erro
        if (!isset ($weather ['current'])){

            Methods::sendMessage([
                'chat_id' => $bot->getChatId(),
                'text' => $this->lang ($bot, 'error_weather'),
                'parse_mode' => 'html',
            ]);

            return;

        }

        $clima = OpenMeteo::getWMOCode ($weather ['current']['weather_code'], $weather ['current']['is_day']);

        // % de chuva
        $probabilidade_chuva = "{$weather ['hourly']['precipitation_probability'][0]}%";
        
        // temperatura
        $temperatura_atual = "{$weather ['current']['temperature_2m']}°C";
        $temperatura_max = "{$weather ['daily']['apparent_temperature_max'][0]}°C";
        $temperatura_min = "{$weather ['daily']['apparent_temperature_min'][0]}°C";

        // humidade
        $humidade = "{$weather ['current']['relative_humidity_2m']}%";

        // nuvens
        $nuvens = "{$weather ['current']['cloud_cover']}%";

        // fases do dia
        $amanhecer = date ('H:i', strtotime ($weather ['daily']['sunrise'][0]));
        $anoitecer = date ('H:i', strtotime ($weather ['daily']['sunset'][0]));

        $texto = sprintf (
            $this->lang ($bot, __FUNCTION__),
            $latitude,
            $longitude,
            $temperatura_atual,
            $clima ['description'],
            $probabilidade_chuva,
            $temperatura_max,
            $temperatura_min,
            $nuvens,
            $humidade,
            $amanhecer,
            $anoitecer
        );

        if ($bot->getCallbackQueryId () != null){

            // stop loading
            Methods::answerCallbackQuery ([
                'callback_query_id' => $bot->getCallbackQueryId ()
            ]);
            
            // response
            Methods::editMessageText ([
                'chat_id' => $bot->getChatId (),
                'message_id' => $bot->getMessageId (),
                'text' => $texto,
                'parse_mode' => 'html',
                'reply_markup' => Buttons::inlineKeyBoard ([
                    [Buttons::inlineKeyBoardCallbackData ('🔄️', "/weather {$latitude} {$longitude}")]
                ])
            ]);

        }else {
            
            Methods::sendMessage ([
                'chat_id' => $bot->getChatId (),
                'text' => $texto,
                'parse_mode' => 'html',
                'reply_markup' => Buttons::inlineKeyBoard ([
                    [Buttons::inlineKeyBoardCallbackData ('🔄️', "/weather {$latitude} {$longitude}")]
                ])
            ]);

        }

    }
    
    public function defaultResponse ($bot, $data){

        Methods::sendMessage ([
            'chat_id' => $bot->getChatId (),
            'text' => $this->lang ($bot, __FUNCTION__)
        ]);

    }

    public function lang ($bot, $key){

        return (LANG [$bot->getLanguageCode ()] ?? LANG ['en'])[$key];

    }

}