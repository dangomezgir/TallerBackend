<?php

namespace entities\Managers;
/*Aquí se maneja los niveles que sube o baja un personaje */
class LevelManager {
    private static $maxLevel = 100;
    private static $minLevel = 1;

    public static function levelUp($character) {
        if($character->getIsAlive()){//Esta línea se repite bastante, y es para verificar que el pj esté vivo, porque si no lo está, pues no puede hacer nada
            if($character->getLevel() < 100){
    
                $character->setLevel($character->getLevel()+1);
                \entities\GameAnnouncer::levelUp($character);
    
            }
        }
        else \entities\GameAnnouncer::isDead($character);
    }
    public static function levelDown($character,$levels) {
        if($character->getIsAlive()){
            if($character->getLevel() > 1 && $character->getLevel()-$levels >= 1){
    
                $character->setlevel($character->getLevel()-$levels);
                \entities\GameAnnouncer::levelDown($character);
                
            }
        }
        else \entities\GameAnnouncer::isDead($character);
    }
    
}
