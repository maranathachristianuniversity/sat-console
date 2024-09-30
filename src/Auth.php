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

/**
 * Class Auth
 * @package satconsole
 */
class Auth
{

    use Echos;

    var $value = '';

    /**
     * Auth constructor.
     * @param $root
     * @param $value
     */
    public function __construct($root, $value)
    {
        if ($value === null) {
            die($this->Prints("class_name not specified. " .
                "example: php sat setup auth UserAuth"
            ));
        }

        $this->value = $value;

        $template = file_get_contents(__DIR__ . "/template/plugins/auth");

        $template = str_replace('{{class}}', $value, $template);
        if (!is_dir($root . '/plugins/auth')) {
            mkdir($root . '/plugins/auth', 0777, true);
        }

        file_put_contents($root . "/plugins/auth/{$value}.php", $template);
    }

    public function __toString()
    {
        return $this->Prints("Auth template with name {$this->value} created!");
    }
}
