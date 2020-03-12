<?php

namespace entities\Skills;
/*Se definen los atributos de las habilidades */
class Skill{
    protected $name;
    protected $type;//1: Físico. 2: Mágico.
    protected $subtype;//1: Básico. 2: Avanzado. 3: Exclusivo Mago. 4: Exclusivo Guerrero. 5: Exclusivo Pícaro.

    public function __construct($name, $type, $subtype)
    {
        $this->name = $name;
        $this->type = $type;
        $this->subtype = $subtype;
    }
    
    public function getSubtype(){
		return $this->subtype;
	}

	public function setSubtype($subtype){
        $this->subtype = $subtype;
        return $this;
	}

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
