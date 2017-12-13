<?php

namespace Core;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\plugin\PluginBase;

#Commands
use Core\Commands\Fly;

class Main extends PluginBase{

	private static $instance;

	public static function getInstance(): Main{
		return self::$instance;
	}

	public function onEnable(){
		self::$instance = $this;
		$this->getServer()->getCommandMap()->register("fly", new fly("fly", $this));
		$this->getLogger()->info("§aEnabled.");
	}

	public function onDisable(){
	    $this->getLogger()->info("§cDisabled.");
	}
}
