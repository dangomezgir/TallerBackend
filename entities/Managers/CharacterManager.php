<?php

namespace entities\Managers;
/* Aquí se crea el personaje y se devuelve el nombre de la clase jugable */
class CharacterManager{

    public static function create($name, $sex, $bodyType,$race, $playableClass){
        

        [$maxHealtPoints, $str,$intl,$agi,$pDef,$mDef] = $race::getStats();
        
        $xp = 0;
        // Al ser creado el personaje tiene tantos puntos de vida actuales
        // como el máximo que puede tener
        $healtPoints = $maxHealtPoints;
        $level = 1;
        $isAlive = true;
        $skills="skill";
        $weapon = "weapon";
        $isRightHanded = true;
        $character = new \entities\Character($name, $sex, $bodyType, $race, $playableClass, $str, $intl ,$agi ,$pDef ,
                $mDef ,$xp, $healtPoints,$maxHealtPoints, $level,$isAlive,$isRightHanded,$skills,$weapon);
        
        \entities\GameAnnouncer::presentCharacter($character);
        return  $character;
    }

    public static function getClassName($character)
    {
        switch($character->getPlayableClass()){
            case 1:
                return "Mago";
            break;

            case 2:
                return "Guerrero";
            break;
            
            case 3:
                return "Pícaro";
            break;
        }
    }
}
