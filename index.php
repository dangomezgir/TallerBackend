<?php

require './config.php';
// usamos namespaces para estructurar con más orden nuestras clases
// el \ inicial nos ayuda a que la rita sea desde la raíz en lugar de tomar
// la ruta dinámica desde el punto en donde estamos importando una clase

//Se crean los personajes
$human = \entities\Managers\CharacterManager::create("Gerald",1,1,\entities\Races\Human::class,3);
$orc = \entities\Managers\CharacterManager::create("Garrosh",1,1,\entities\Races\Orc::class,2);
$elf = \entities\Managers\CharacterManager::create("Legolas",1,1,\entities\Races\Elf::class,1);
$dwarf = \entities\Managers\CharacterManager::create("Tontín",1,1,\entities\Races\Dwarf::class,1);

//Se crea un arma de prueba
$dagger = \entities\Managers\WeaponManager::create("Daga",1);

//Las skills
$calcinar = new \entities\Skills\Skill("Calcinar",2,3);
$golpeArma = new \entities\Skills\Skill("Golpe Con Arma",1,1);
$golpeTrampa = new \entities\Skills\Skill("Golpe Trampero",1,5);
$tajo = new \entities\Skills\Skill("Tajo mortal",1,4);
$tactics = new \entities\Skills\Skill("Tácticas de combate",1,2);
$meditate = new \entities\Skills\Skill("Meditación",2,1);
\entities\Managers\WeaponManager::equipWeapon($human,$dagger);

\entities\GameAnnouncer::xpForLevel($dwarf);
\entities\Managers\XPManager::xpObtain(1000,$dwarf);
\entities\GameAnnouncer::xpForLevel($dwarf);
\entities\Managers\LevelManager::levelDown($dwarf,1);


\entities\GameAnnouncer::xpForLevel($elf);
\entities\Managers\XPManager::xpObtain(600,$elf);

\entities\Managers\SkillManager::learnSkill($elf,$calcinar);

\entities\Managers\SkillManager::useSkill($elf,$calcinar,$human);

\entities\Managers\SkillManager::learnSkill($human,$golpeArma);

\entities\Managers\SkillManager::useSkill($human,$golpeArma,$dwarf);

\entities\Managers\SkillManager::learnSkill($dwarf,$calcinar);
\entities\Managers\SkillManager::learnSkill($dwarf,$meditate);
\entities\Managers\SkillManager::useSkill($dwarf,$meditate,$dwarf);


entities\Managers\SkillManager::forgetSkill($elf,$calcinar);