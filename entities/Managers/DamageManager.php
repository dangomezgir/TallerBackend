<?php

namespace entities\Managers;
/*Aquí se hacen todos los cálculos del daño que se hace o recibe, incluido si un personaje muere o revive */
class DamageManager{
        public static function die($character) {
                if($character->getIsAlive()){
                        $character->setIsAlive(false);
                        \entities\GameAnnouncer::announceDeath($character);
                }
        }
        
        public static function revive($character) {
                if(!$character->getIsAlive()){
                        $character->setIsAlive(true);
                        $character->setHealtPoints( $character->getMaxHealtPoints() * 0.1);
                        \entities\GameAnnouncer::announceRevive($character);
                }
        }

        public static function isCrit($character)
        {
                if(BASE_CRIT + ($character->getAgi()/10) >= rand(1,100)){
                        \entities\GameAnnouncer::criticalHit($character);
                        return 1.5;
                }
                else return 1;
        }

        public static function attack($attacker,$receiver,$type,$dmg) {
                \entities\GameAnnouncer::attack($attacker,$receiver);
                switch($type){
                        case 1:
                                $dmgDone = $dmg * (1 + ($attacker->getStr()/500)) * self::isCrit($attacker);
                                self::takeDamage($receiver,$dmgDone);
                        break;
                        case 2:
                                $dmgDone = $dmg * (1 + ($attacker->getIntl()/500)) * self::isCrit($attacker);
                                self::takeDamage($receiver,$dmgDone);
                        break;

                }
        }
        
        public static function takeDamage($receiver,$dmg) {
                $dmgDone = $dmg - $dmg * ($receiver->getPDef()/1000);
                $receiver->setHealtPoints($receiver->getHealtPoints() - $dmgDone);
                \entities\GameAnnouncer::healtpointsLoss($receiver,$dmgDone);
                if($receiver->getHealtPoints() <= 0){
                        self::die($receiver);
                }
        }
        
}
