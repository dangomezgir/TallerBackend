<?php

namespace entities\Managers;
/*Aquí se crean, equipan y quitan las armas a un personaje */
class WeaponManager {
    public static function getWeaponType($weapon)
    {
        switch($weapon->getType()){
            case 1:
                return 'Daga';
            break;

            case 2:
                return 'Espada';
            break;

            case 3:
                return 'Varita';
            break;

            case 4:
                return 'Hacha pequeña';
            break;

            case 5:
                return 'Hacha grande';
            break;

            case 6:
                return 'Bastón';
            break;
        }
    }

    public static function create($name,$type)
    {
        switch($type){
            case 1:
                $twoHanded = false;
                $dmg = DAGGER;
            break;

            case 2:
                $twoHanded = false;
                $dmg = SWORD;
            break;

            case 3:
                $twoHanded = false;
                $dmg = WAND;
            break;

            case 4:
                $twoHanded = false;
                $dmg = SMALL_AXE;
            break;

            case 5:
                $twoHanded = true;
                $dmg = BIG_AXE;
            break;

            case 6:
                $twoHanded = true;
                $dmg = STAFF;
            break;
        }

        $weapon = new \entities\Weapon($name,$type,$dmg,$twoHanded);
        return $weapon;
        
    }
    public static function canEquipWeapon($character, $weapon)
    {
        switch($character->getPlayableClass()){
            case 1://Mago
                if($weapon->getType() != 4 || $weapon->getType() != 5) return true;//Si es de cualquier tipo menos hacha (grande o pequeña)
                else return false;
            break;

            case 2://Guerrero
                if($weapon->getType() != 3) return true;//Si no es una varita
                else return false;
            break;

            case 3://Pícaro
                switch($weapon->getType()){
                    case 1: case 2: case 3: //Si es daga, espada o  
                        return true;
                    break;
                    
                    default: return false;
                }
            break;
        }
    }

    public static function equipWeapon ($character, $weapon) {
        if($character->getIsAlive()){
            if(self::canEquipWeapon($character,$weapon)){
                
                $character->setWeapon($weapon);
                \entities\GameAnnouncer::weaponEquipped($character);
            }
        }
        else \entities\GameAnnouncer::isDead($character);
    }

    public static function unequipWeapon($character)
    {
        if($character->getIsAlive()){
            $character->setWeapon(null);
        }
        else \entities\GameAnnouncer::isDead($character);
    }
}