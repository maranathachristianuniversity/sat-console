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
 * Class Controller
 * @package satconsole
 */
class Controller
{

    /**
     * @var string
     */
    var $action;

    /**
     * @var string
     */
    var $value;

    use Echos;

    /**
     * Controller constructor.
     * @param $root
     * @param $action
     * @param $value
     */
    public function __construct($root, $action, $value)
    {
        $template = null;

        if ($value === null) {
            die(Echos::Prints("name not specified. " .
                "example: php sat setup auth UserController"
            ));
        }

        $this->action = $action;
        $this->value = $value;

        if ($action === 'view') {
            $template = file_get_contents(__DIR__ . "/template/controller/view");
        }
        if ($action === 'service') {
            $template = file_get_contents(__DIR__ . "/template/controller/service");
        }

        $template = str_replace('{{namespace}}', 'plugins\controller', $template);
        $template = str_replace('{{class}}', $value, $template);
        if (!is_dir("{$root}/plugins/controller")) {
            mkdir("{$root}/plugins/controller", 0777, true);
        }
        file_put_contents("{$root}/plugins/controller/{$value}.php", $template);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return Echos::Prints("{$this->action} controller {$this->value} created!");
    }

}