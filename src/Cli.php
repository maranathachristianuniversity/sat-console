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

use satconsole\util\Commons;
use satconsole\util\Echos;

/**
 * Class Cli
 * @package satconsole
 */
class Cli
{
    use Commons, Echos;

    /**
     * Cli constructor.
     * @param null $command
     */
    public function __construct($command = null)
    {
        if ($command === null) {
            die(Echos::Prints("Cli parameter required!"));
        }

        echo Echos::Prints("SAT project initialized at cli");
        echo Echos::Prints("Press (Ctrl + C) to stop.");
        echo exec("php cli {$command}");

        return true;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return Echos::Prints("Console is finished running!");
    }

}