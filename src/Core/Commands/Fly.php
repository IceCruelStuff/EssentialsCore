<?php

namespace Core\Commands;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\PluginCommand;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerMoveEvent;

use Core\Main;

class Fly extends PluginCommand{

    public function __construct($name, Main $plugin){
        parent::__construct($name, $plugin);
        $this->setDescription("Let you fly");
        $this->setPermission("core.fly");
    }
     
    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
        if($sender instanceof Player){
        if (count($args) < 1) {
            $sender->sendMessage("Usage: /fly <on|off>");
            return false;
        }
        switch ($args[0]){
            case "on":
                    if (!$sender->hasPermission("core.fly")) {
                        $sender->sendMessage("§cYou are not allow to do that.");
                        return false;
                    }
                        $sender->setAllowFlight(true);
                        $sender->sendMessage("§eFly Mode : §aEnabled.");
            break;
            case "off":
                    if (!$sender->hasPermission("core.fly")) {
                        $sender->sendMessage("§cYou are not allow to do that.");
                        return false;
                    }
                        $sender->setAllowFlight(false);
                        $sender->sendMessage("§eFly Mode : §cDisabled.");
            break;
            default:
            $sender->sendMessage("Usage: /fly <on|off>");
            break;
            }
        }else{
          $sender->sendMessage("§cYou are not In-Game.");
        }
            return true;
    }
}
