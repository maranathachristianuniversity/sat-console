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

namespace satconsole\util;

/**
 * Trait Echos
 * @package satconsole\util
 */
trait Echos
{

    /**
     * @param $var
     * @param bool $break
     * @return string
     */
    public static function Prints($var, $break = true)
    {
        if ($break) {
            return sprintf("\n%s\n", $var);
        }
        return sprintf("%s\n", $var);
    }

}