<?php

namespace effects;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class main extends PluginBase{
    public function onEnable(){
        $this->getLogger()->info("Plugin Enabled");
    }
    public function onLoad(){
        $this->getLogger()->info("Plugin Loading");
    }
    public function onDisable(){
        $this->getLogger()->info("Plugin Disabled");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        if(!$sender instanceof Player) return false;
        switch ($cmd->getName()){
            case "RE":
                if(!$sender->isOp()){
                    $sender->sendMessage(TextFormat::RED . "NO PERMISSION!");
                }

$this->RandomEffect($sender, 5, 1);
        }
        return false;
    }
public function RandomEffect(Player $player, int $seconds, int $amp): void{
        $effectId = mt_rand(1, 26);
        $player->addEffect(new EffectInstance(Effect::getEffect($effectId), 20 * $seconds, $amp, true));
    }
}