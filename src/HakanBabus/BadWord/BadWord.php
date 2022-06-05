<?php

declare(strict_types=1);

namespace HakanBabus\BadWord;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

use pocketmine\event\Listener;

class BadWord extends PluginBase implements Listener{

    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        @mkdir($this->getDataFolder());
        $this->cfg = new Config($this->getDataFolder() . "data.yml", Config::YAML);
        $this->saveResource("data.yml");    
    }

    public function getBadWords(): Array{
        return $this->cfg->get("Badwords");
    }

    public function createString(Int $length){
        $str = "";
        for($i = 1; $i <= $length; $i++){
            $str = $str."*";
        }
        return $str;
    }
}
