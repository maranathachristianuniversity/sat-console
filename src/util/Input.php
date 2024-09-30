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
 * Trait Input
 * @package satconsole\util
 */
trait Input
{

    /**
     * @param $variable
     * @param bool $trim
     * @return null|string|string[]
     */
    public function Read($variable, $trim = true)
    {
        echo sprintf('%s :', $variable);

        if (!$trim) {
            return str_replace("\r\n", '', fgets(STDIN));
        }
        return preg_replace('/\s+/', '', fgets(STDIN));
    }

}
