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
    
    public Config $cfg;

    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->cfg = new Config($this->getDataFolder() . "/data.yml", Config::YAML, [
            "Badwords" => [
                "shit" => [
                    "Space" => false
                ],
                "fuck" => [
                    "Space" => false
                ]
            ]
        ]);
        foreach($this->cfg->get("Badwords") as $k => $v){
            if(!isset($v["Space"])){
                $this->getLogger()->error('Config error. Please add "Space" key in "$k" badword.');
            }
        }
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
