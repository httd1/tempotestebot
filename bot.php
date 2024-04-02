<?php

include __DIR__ . '/vendor/autoload.php';

use \TelegramPhp\TelegramPhp;
use \TelegramPhp\Config\Token;

// vamos registrar o token do nosso bot
Token::setToken ('6438698345:AAFXL4rrwem5SwfWTcp4V5Huh7yAvv1fo-Y');

// pega logs
\TelegramPhp\Config\Logs::catchLogs (Logs::class);

$tlg = new TelegramPhp ();

// localização
if (!empty ($tlg->getLocation ())){
    $tlg->runAction ('Controller@weather');
}

// comando /start e /help
$tlg->command ('/start', 'Controller@start');
$tlg->command ('/help', 'Controller@help');

// atualiza previsão
$tlg->command ('/weather {{latitude}} {{longitude}}', 'Controller@weather');

// mensagem padrão, sempre no final!
$tlg->commandDefault ('Controller@defaultResponse');