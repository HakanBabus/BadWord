<?php

declare(strict_types=1);

namespace HakanBabus\BadWord;

use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;

class EventListener implements Listener{
    
    public BadWord $main;

    public function __construct(BadWord $main) {
        $this->main = $main;
    }

    public function onChat(PlayerChatEvent $e){
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
                    if(str_contains($word, $badword)){
                        $words[$i] = $this->main->createString(strlen($word));
                    }
                }
            }
            $i++;
        }
        $e->setMessage(implode(" ", $words));
    }
/*
    public function onC(CommandEvent $e)
    {
        $msg = $e->getCommand();
        $words = explode(" ", $msg);
        $i = 0;
        foreach($words as $word){
            foreach($this->main->getBadWords() as $badword => $badwordarray){
                if($badwordarray["Space"] === true){
                    if(is_int(array_search($word, array_keys($this->main->getBadWords())))){
                        $words[$i] = $this->main->createString(strlen($badword));
                    }
                }else{
                    if(str_contains($word, $badword)){
                        $words[$i] = $this->main->createString(strlen($word));
                    }
                }
            }
            $i++;
        }
        $e->setCommand(implode(" ", $words));
    }*/

}
