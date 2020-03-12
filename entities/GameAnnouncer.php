<?php


namespace entities;
/* Esta clase hace todos los echos, aquí todo lo que pasa y es relevante para que se muestre, aquí se hace.
 */

class GameAnnouncer {
    
    public static function presentCharacter(\entities\Character $character){ 
        echo $character->getName()." se ha unido al mundo</br>";
        echo $character->getName()." es un ".$character->getRace()::getRaceName()." de clase ".\entities\Managers\CharacterManager::getClassName($character)."</br>";
        echo "Las estadísticas de ".$character->getName()." son:</br>";
        echo "HP Max: ".$character->getMaxHealtPoints()."</br>";
        echo "XP:".$character->getXp()."</br>";
        echo "Level: ".$character->getLevel()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
        echo "PDef: ".$character->getPDef()."</br>";
        echo "MDef: ".$character->getMDef()."</br></br>";
    }

    public static function buffUsed($character,$skill)
    {
        echo $character->getName()." ha usado la skill ".$skill->getName()."</br>";
        echo "Str: ".$character->getStr()."</br>";
        echo "Intl: ".$character->getIntl()."</br>";
        echo "Agi: ".$character->getAgi()."</br>";
    }

    public static function weaponEquipped($character)
    {
        echo $character->getName()." se ha equipado el arma ".$character->getWeapon()->getName()."</br>";
        echo "Tipo de arma: ".\entities\Managers\WeaponManager::getWeaponType($character->getWeapon())."</br>";
        echo "Daño del arma: ".$character->getWeapon()->getDmg()."</br>";
    }

    public static function announceDeath($character){
        echo $character->getName()." ha muerto</br></br>";
    }

    public static function isDead($character)
    {
        echo $character->getName()." está muerto, no puede realizar ninguna acción</br></br>";
    }

    public static function announceRevive($character){
        echo $character->getName()." ha sido revivido y ahora tiene ".$character->getHealtPoints()." puntos de vida</br></br>";
    }

    public static function xpObtained($character,$xp)
    {
        echo "¡".$character->getName()." ha obtenido ".$xp." puntos de experiencia!</br></br>";
    }

    public static function levelUp($character){
        echo $character->getName()." ha subido a nivel ".$character->getLevel()."</br></br>";
    }

    public static function levelDown($character){
        echo $character->getName()." ha bajado a nivel ".$character->getLevel()."</br></br>";
    }

    public static function attack($attacker,$receiver){
        echo $attacker->getName()." ha atacado a ".$receiver->getName()."</br></br>";
    }

    public static function healtpointsLoss($character, $dmg)
    {
        echo $character->getName()." ha perdido ".$dmg." HP tras el ataque.</br>Ahora tiene ".$character->getHealtPoints()." HP</br></br>";
    }

    public static function cannotLearnSkill($character,$skill)
    {
        echo $character->getName()." no puede aprender la habilidad ".$skill->getName()."</br></br>";
    }

    public static function skillLearnt($character)
    {
        echo $character->getName()." aprendió la habiliad ".$character->getSkills()->getName()."</br></br>";
    }
    public static function forgotSkill($character,$skill)
    {
        echo $character->getName()." olvidó la habiliad ".$skill->getName()."</br></br>";
    }
    public static function criticalHit($character)
    {
        echo "¡".$character->getName()." ha asestado un golpe crítico!</br></br>";
    }
    public static function xpForLevel($character){
        echo $character->getName()." necesita ".\entities\Managers\XPManager::getExpForLevel($character)." puntos de experiencia para subir al siguiente nivel</br></br>";
    }
}
