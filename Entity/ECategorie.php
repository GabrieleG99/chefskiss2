<?php


class ECategorie{
    private $categoria;
    private $id;

    /**
     * @param $categoria
     */
    public function __construct($categoria, $id){
        $this->categoria = $categoria;
        $this->id = $id;
    }

    public function parseparam(){
        return[
            'categoria' => $this->getCategoria(),
        ];
    }


    /**
     * @return mixed
     */
    public function getCategoria(){
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria): void{
        $this->categoria = $categoria;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}