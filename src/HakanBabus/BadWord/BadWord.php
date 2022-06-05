<?php

declare(strict_types=1);

namespace HakanBabus\BadWord;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\world\World;
use pocketmine\world\WorldManager;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use HakanBabus\CommandRegisterer\RegisterKomut;
use pocketmine\utils\Config;

use pocketmine\event\Listener;
use pocketmine\math\Vector3;

class BadWord extends PluginBase implements Listener{

    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getLogger()->info("BadWord - HakanBabus \nBu Plugini İzinsiz Paylaşmak Kesinlikle Yasaktır.");
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
