<?php

namespace entities\Managers;
/*Aquí se maneja la XP que recibe el personaje, que si es igual a la que necesita el pj para subir de nivel,
 llama al levelUp dentro de la clase LevelManager. */
class XPManager{
    private static $baseExp = 100;

    public static function xpObtain($xpToAdd,$character){
        $character->setXp($character->getXp()+$xpToAdd);
        \entities\GameAnnouncer::xpObtained($character,$xpToAdd);
        self::xpCompare($character);
    }

    public static function xpCompare($character){
        //La experiencia se resetea a 0 después de cada levelUp
        while($character->getXp()>= self::getExpForLevel($character)){
            $character->setXp($character->getXp()-self::getExpForLevel($character));
            \entities\Managers\LevelManager::levelUp($character);
        }
    }

    public static function getExpForLevel($character) {
        return ($character->getLevel() * self::$baseExp);
    }
}