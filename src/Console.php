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

use Exception;
use satconsole\util\Echos;

/**
 * Class Console
 * @package satconsole
 */
class Console
{

    use Echos;

    /**
     * @var array
     */
    var $config = array();

    /**
     * @var array
     */
    var $args = array();

    /**
     * @var string
     */
    var $root = __DIR__;

    const COMMAND = 1;
    const DIRECTIVE = 2;
    const ACTION = 3;
    const ATTRIBUTE = 4;
    const EPHEMERAL = 5;

    /**
     * Console constructor.
     * @param $root
     * @param $args
     */
    public function __construct($root, $args)
    {
        $this->root = $root;
        $this->args = $args;
        if (!file_exists(__DIR__ . "/config/init.php")) {
            die($this->Prints('Console init file not found'));
        }
        $this->config = (include __DIR__ . "/config/init.php");
    }

    /**
     * @throws Exception
     */
    public function Execute()
    {
        switch ($this->GetCommand(Console::COMMAND)) {
            case 'setup':
                return $this->Setup($this->GetCommand(Console::DIRECTIVE));
            case 'routes':
                return new Routes($this->root,
                    $this->GetCommand(Console::DIRECTIVE),
                    $this->GetCommand(Console::ACTION),
                    $this->GetCommand(Console::ATTRIBUTE)
                );
            case 'element':
                return new Elements(
                    $this->root,
                    $this->config,
                    $this->GetCommand(Console::DIRECTIVE),
                    $this->GetCommand(Console::ACTION)
                );
            case 'docs':
                return new Docs(
                    $this->root,
                    $this->GetCommand(Console::DIRECTIVE),
                    $this->GetCommand(Console::ACTION)
                );
            case 'serve':
                return new Serve($this->GetCommand(Console::DIRECTIVE));
            case 'tests':
                return new Tests($this->GetCommand(Console::DIRECTIVE));
            case 'help':
                return $this->Help();
            case 'cli':
                return new Cli($this->GetCommand(Console::DIRECTIVE));
            case 'generate':
                return $this->Generate($this->GetCommand(Console::DIRECTIVE));
            case 'language':
                return $this->Language($this->GetCommand(Console::DIRECTIVE));
            case 'refresh':
                return $this->Refresh($this->GetCommand(Console::DIRECTIVE));
            case 'version':
                return $this;
            default:
                return $this->NotFound();
        }
    }

    /**
     * @param $kind
     * @return string
     * @throws Exception
     */
    public function Generate($kind)
    {
        switch ($kind) {
            case 'db':
                return new Database($this->root, 'generate');
            default:
                return $this->Prints("Generate exited with no process executed!");
        }
    }

    /**
     * @param $kind
     * @return Language|string
     */
    public function Language($kind)
    {
        return new Language($this->root, $kind);
    }

    /**
     * @param $kind
     * @return string
     * @throws Exception
     */
    public function Refresh($kind)
    {
        switch ($kind) {
            case 'db':
                return new Database($this->root, 'refresh');
            default:
                return $this->Prints("Refresh exited with no process executed!");
        }
    }

    /**
     * @param $kind
     * @return Database|string
     * @throws Exception
     */
    public function Setup($kind)
    {
        switch ($kind) {
            case 'db':
                return new Database($this->root, 'setup');
            case 'secure':
                return new Secure($this->root);
            case 'auth':
                return new Auth(
                    $this->root,
                    $this->GetCommand(Console::ACTION)
                );
            case 'controller':
                return new Controller(
                    $this->root,
                    $this->GetCommand(Console::ACTION),
                    $this->GetCommand(Console::ATTRIBUTE)
                );
            case 'model':
                return new Models(
                    $this->root,
                    $this->GetCommand(Console::ACTION),
                    $this->GetCommand(Console::ATTRIBUTE),
                    $this->GetCommand(Console::EPHEMERAL)
                );
            default:
                return $this->Prints("Setup exited with no process executed!");
        }
    }

    /**
     * @return false|string
     */
    public function Help()
    {
        return file_get_contents(__DIR__ . "/config/help.md");
    }

    /**
     * @return string
     */
    public function NotFound()
    {
        return $this->Prints("Command not found!");
    }

    /**
     * @param int $type
     * @return mixed|null
     */
    public function GetCommand($type = Console::COMMAND)
    {
        return isset($this->args[$type]) ? $this->args[$type] : null;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->Prints("SAT Console {$this->config['version']}");
    }

}
