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
        	if(is_int(array_search($word, $this->main->getBadWords()))){
        		$words[$i] = $this->main->createString(strlen($word));
        	}
        	$i++;
        }
        $e->setMessage(implode(" ", $words));
    }

}
