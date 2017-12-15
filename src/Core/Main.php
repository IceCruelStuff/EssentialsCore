<?php

namespace Core;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\plugin\PluginBase;

#Commands
use Core\Commands\Fly;
use Core\Commands\Feed;
use Core\Commands\Heal;
use Core\Commands\Spawn;
use Core\Commands\SetSpawn;
use Core\Commands\Ping;

class Main extends PluginBase{

	private static $instance;

	public static function getInstance(): Main{
		return self::$instance;
	}

	public function onEnable(){
		self::$instance = $this;

		$this->registerCommands();

		$this->getLogger()->info("§aEnabled.");
	}

    private function registerCommands(){
                    /////////////////////////////// COMMANDS ///////////////////////////////
		$this->getServer()->getCommandMap()->register("fly", new fly("fly", $this));
		$this->getServer()->getCommandMap()->register("feed", new feed("feed", $this));
		$this->getServer()->getCommandMap()->register("heal", new heal("heal", $this));
	        $this->getServer()->getCommandMap()->register("spawn", new spawn("spawn", $this));
	        $this->getServer()->getCommandMap()->register("setspawn", new setspawn("setspawn", $this));
	        $this->getServer()->getCommandMap()->register("ping", new ping("ping", $this));
    }

	public function onDisable(){
	    $this->getLogger()->info("§cDisabled.");
	}
}
