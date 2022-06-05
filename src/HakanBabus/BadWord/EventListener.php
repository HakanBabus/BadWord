<?php

declare(strict_types=1);

namespace HakanBabus\BadWord;

use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\Listener;

class EventListener implements Listener{
    
    public BadWord $main;

    public function __construct(BadWord $main) {
        $this->main = $main;
    }

    public function onChat(PlayerChatEvent $e){
        $g = $e->getPlayer();
        $msg = $e->getMessage();
        $words = explode(" ", $msg);
        $i = 0;
        foreach($words as $word){
            foreach($this->main->getBadWords() as $badword => $badwordarray){
                if($badwordarray["Space"] === true){
                    if(is_int(array_search($word, array_keys($this->main->getBadWords())))){
                        $words[$i] = $this->main->createString(strlen($badword));
                    }
                }else{
                    if(strstr($word, $badword) !== false){
                        $words[$i] = $this->main->createString(strlen($word));
                    }
                }
            }
            $i++;
        }
        $e->setMessage(implode(" ", $words));
    }
   
}
