<?php
/**
 * pukoconsole.
 * Advanced console util that make pukoframework get things done on the fly.
 * Copyright (c) 2018, Didit Velliz
 *
 * @author Didit Velliz
 * @link https://github.com/velliz/pukoconsole
 * @since Version 0.1.1
 */

namespace pukoconsole;

use pukoconsole\util\Echos;

class Tests
{
    use Echos;

    /**
     * Serve constructor.
     * @param $directive
     */
    public function __construct($directive)
    {
        Echos::Prints("Preparing test using " . $directive, true);
        echo exec("vendor\bin\phpunit");
        return true;
    }

    public function __toString()
    {
        return Echos::Prints("Testing completed.");
    }
}