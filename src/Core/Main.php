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
use Core\Commands\KickAll;
use Core\Commands\Ops;

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
		$this->getServer()->getCommandMap()->register("fly", new Fly("fly", $this));
		$this->getServer()->getCommandMap()->register("feed", new Feed("feed", $this));
		$this->getServer()->getCommandMap()->register("heal", new Heal("heal", $this));
	        $this->getServer()->getCommandMap()->register("spawn", new Spawn("spawn", $this));
	        $this->getServer()->getCommandMap()->register("setspawn", new SetSpawn("setspawn", $this));
	        $this->getServer()->getCommandMap()->register("ping", new Ping("ping", $this));
	        $this->getServer()->getCommandMap()->register("kickall", new KickAll("kickall", $this));
	        $this->getServer()->getCommandMap()->register("ops", new Ops("ops", $this));
    }

	public function onDisable(){
	    $this->getLogger()->info("§cDisabled.");
	}
}

