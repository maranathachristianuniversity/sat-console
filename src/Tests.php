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

class Tests
{
    use Echos;

    /**
     * Serve constructor.
     * @param $directive
     */
    public function __construct($directive)
    {
        $this->Prints("Preparing test using " . $directive, true);
        echo exec("vendor\bin\phpunit");
        return true;
    }

    public function __toString()
    {
        return $this->Prints("Testing completed.");
    }
}
