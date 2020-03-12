<?php

namespace entities;
/* Se definen los atributos del arma, los métodos están en WeaponManager */
class Weapon {
    private $name;
	private $type;
	//1: Daga (una mano). 2: Espada (una mano). 3: Varita (una mano). 4: Hacha pequeña (una mano).
	//5: Hacha grande (dos manos). 6: Bastón (dos manos). 
	private $dmg;
	private $twoHanded = false;//Si es de una o dos manos.

    public function __construct($name, $type, $dmg, $twoHanded){
        $this->name = $name;
        $this->type = $type;
		$this->dmg = $dmg;
		$this->twoHanded = $twoHanded;
	}

	public function getTwoHanded(){
		return $this->twoHanded;
	}

	public function setTwoHanded($twoHanded){
		$this->twoHanded = $twoHanded;
		return $this;
	}

    public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
		return $this;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
		return $this;
	}

	public function getDmg(){
		return $this->dmg;
	}

	public function setDmg($dmg){
		$this->dmg = $dmg;
		return $this;
	}
}
