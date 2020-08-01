<?php
/**
 * satconsole.
 * MVC PHP Framework for quick and fast PHP Application Development.
 * Copyright (c) 2020, IT Maranatha
 *
 * @author Didit Velliz
 * @link https://github.com/maranathachristianuniversity/sat-console
 * @since Version 0.2.0
 */

namespace satconsole;

use satconsole\util\Echos;
use satconsole\util\Input;

/**
 * Class Secure
 * @package satconsole
 */
class Secure
{

    use Echos, Input;

    public function __construct($root)
    {
        echo Echos::Prints("AES-256 secure initialization ...");

        $identifier = Input::Read("Identifier");
        $key = Input::Read("Secure key");
        $cookies = Input::Read("Cookies name");
        $session = Input::Read("Session name");
        $expired = Input::Read("Session expired number (in days) or blank for infinity");
        $expiredText = Input::Read("Session expired display text", false);
        $error = Input::Read("Error display text", false);

        $configuration = file_get_contents(__DIR__ . "/template/config/encryption");

        $configuration = str_replace('{{key}}', $identifier, $configuration);
        $configuration = str_replace('{{identifier}}', $key, $configuration);
        $configuration = str_replace('{{cookies}}', $cookies, $configuration);
        $configuration = str_replace('{{session}}', $session, $configuration);
        $configuration = str_replace('{{expired}}', $expired, $configuration);
        $configuration = str_replace('{{expiredText}}', $expiredText, $configuration);
        $configuration = str_replace('{{errorText}}', $error, $configuration);

        file_put_contents("{$root}/config/encryption.php", $configuration);
    }

    public function __toString()
    {
        return Echos::Prints("secure config created!");
    }

}