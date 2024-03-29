<?php

declare(strict_types=1);

namespace HakanBabus\BadWord;

use pocketmine\plugin\PluginBase;
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
        foreach($this->cfg->get("Badwords") as $v){
            if(!isset($v["Space"])){
                $this->getLogger()->error('Config error. Please add "Space" key in "$k" badword.');
            }
        }
    }

    public function getBadWords(): array{
        return $this->cfg->get("Badwords");
    }

    public function createString(int $length): string
    {
        $str = "";
        for($i = 1; $i <= $length; $i++){
            $str = $str."*";
        }
        return $str;
    }
}
