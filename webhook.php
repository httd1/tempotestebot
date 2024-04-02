<?php

include __DIR__ . '/vendor/autoload.php';

use \TelegramPhp\Methods;
use \TelegramPhp\Config\Token;

// vamos registrar o token do nosso bot
Token::setToken('6438698345:AAFXL4rrwem5SwfWTcp4V5Huh7yAvv1fo-Y');

$set_webhook = Methods::setWebhook([
    'url' => 'https://baff8080dc85c3.lhr.life/bot.php'
]);

echo json_encode ($set_webhook);