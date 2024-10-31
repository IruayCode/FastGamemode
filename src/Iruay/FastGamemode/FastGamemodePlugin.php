<?php

namespace Iruay\FastGamemode;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\player\GameMode;
use pocketmine\Server;

class FastGamemodePlugin extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info("§aFastGamemode On!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!$sender instanceof Player) {
            $sender->sendMessage("§cThis command can only be used by an operator!");
            return true;
        }

        if (!$sender->hasPermission("fastgamemode.use")) {
            $sender->sendMessage("§cYou do not have permission to use this command!");
            return true;
        }

        switch ($command->getName()) {
            case "gmc":
                $sender->setGamemode(GameMode::CREATIVE());
                $sender->sendMessage("§6You are now in Creative mode!");
                break;

            case "gms":
                $sender->setGamemode(GameMode::SURVIVAL());
                $sender->sendMessage("§6You are now in Survival mode!");
                break;

            case "gmsp":
                $sender->setGamemode(GameMode::SPECTATOR());
                $sender->sendMessage("§6You are now in Spectator mode!");
                break;
        }

        return true;
    }
}
