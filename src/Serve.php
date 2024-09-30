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
 * Class Serve
 * @package satconsole
 */
class Serve
{

    use Echos;

    var $port = 4000;

    /**
     * Serve constructor.
     * @param null $port
     */
    public function __construct($port = null)
    {
        if ($port === null) {
            $port = 4000;
        }
        $this->port = $port;
        echo $this->Prints("SAT project initialized at localhost:{$port}");
        echo $this->Prints("Press (Ctrl + C) to stop.");
        echo exec("php -S localhost:{$port} routes.php");

        return true;
    }

    public function __toString()
    {
        return $this->Prints("PHP server starred on port {$this->port}.");
    }

}
