<?php

namespace entities\Managers;
/* Aquí se hacen todos los métodos relacionados con las skills, como usar (que define si es ataque o buff), 
aprender (si puede) u olvidar */
class SkillManager implements \interfaces\UseSkill_I{

    public static function useSkill($user,$skill,$target){
        if($user->getIsAlive()){
            if($user->getSkills()==$skill){
                $skillType = (int)($skill->getType().$skill->getSubType());
                if($user == $target)self::useBuff($user,$skill,$skillType);
                else self::useAttack($user,$skill,$target,$skillType);
            }
        }
        else \entities\GameAnnouncer::isDead($character);
    }

    public static function useBuff($user,$skill,$skillType)
    {
        switch($skillType){
            case 21:
                $user->setIntl($user->getIntl()*1.05);
            break;

            case 12:
                $user->setStr($user->getStr()*1.05);
            break;
        }
        $user->setAgi($user->getAgi()*1.05);
        \entities\GameAnnouncer::buffUsed($user,$skill);
    }

    public static function useAttack($user,$skill,$target,$skillType)
    {
        switch($skillType){
            case 11:
                if($user->getIsRightHanded() || $user->getWeapon()->getTwoHanded()){
                    \entities\Managers\DamageManager::attack($user,$target,1,$user->getWeapon()->getDmg());
                }
                else{

                    \entities\Managers\DamageManager::attack($user,$target,1,$user->getWeapon()->getDmg()*0.7);
                }
            break;

            case 15:
                \entities\Managers\DamageManager::attack($user,$target,1,$user->getWeapon()->getDmg()*3);
            break;

            case 14:
                \entities\Managers\DamageManager::attack($user,$target,1,$user->getWeapon()->getDmg()*2);
            break;

            case 23:
                \entities\Managers\DamageManager::attack($user,$target,2,$user->getIntl()*0.4);
            break;
        }
    }

    public static function canLearnSkill($character,$skill)
    {
        switch($character->getPlayableClass())
        {
            case 1://Mago
                switch($skill->getType()){
                    case 1://Físico
                        if($skill->getSubType() == 1){
                            return true;
                        }
                        else return false; 
                    break;

                    case 2://Mágico
                        return true;
                    break;
                }
            break;

            case 2://Guerrero
                if($skill->getType() == 1 && $skill->getSubType() != 5){//Si es físico, pero no de pícaro
                   return true;
                }
                else return false; 
            break;

            case 3://Pícaro
                if($skill->getSubType() == 1 || $skill->getSubType() == 5 ){
                    return true;
                }
                else return false;
            break;
        }
    }
    public static function learnSkill ($character,$skill) {
        if($character->getIsAlive()){
            if(self::canLearnSkill($character,$skill)){
                $character->setSkills($skill);
                
                \entities\GameAnnouncer::skillLearnt($character);
            }
            else 
            \entities\GameAnnouncer::cannotLearnSkill($character,$skill);
        }
        else \entities\GameAnnouncer::isDead($character);
    }
    public static function forgetSkill ($character, $skill) {
        if($character->getIsAlive()){
            if($character->getSkills()==$skill){
                $character->setSkills(null);
                \entities\GameAnnouncer::forgotSkill($character,$skill);
            }
        }
        else \entities\GameAnnouncer::isDead($character);
    }
}
