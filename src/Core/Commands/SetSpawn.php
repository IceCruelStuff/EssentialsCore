<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\level\Level;

use pocketmine\utils\TextFormat as C;

use Core\Main;

class SetSpawn extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Change Server Spawn.");
        $this->setAliases(["SetSpawn"]);
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
                    if($sender instanceof Player){
                        $sender->getLevel()->setSpawnLocation($sender);
                        $sender->getServer()->setDefaultLevel($sender->getLevel());
                        $sender->sendMessage(C::GREEN . "Server Spawn has been Changed.");
        }else{
          $sender->sendMessage(C::RED . "You are not In-Game.");
        }
            return true;
    }
}
