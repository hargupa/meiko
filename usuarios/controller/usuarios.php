<?php

class Usuario
{
	  protected $codigo;		
	  protected $nombres;
  	  protected $apellidos;
  	  protected $email;
  	  protected $perfil;

  	  public function  __construct()
  	  {

  	  }


	public function getNombres()
	  {
	    return $this->nombres;
	  }	

	public function setNombres($nombres)
	  {
	    $this->nombres=$nombres;
	  }

	public function getApellidos()
	  {
	    return $this->apellidos;
	  }	

	public function setApellidos($apellidos)
	  {
	    $this->apellidos=$apellidos;
	  }

	public function getEmail()
	  {
	    return $this->Email;
	  }	

	public function setEmail($Email)
	  {
	    $this->Email=$apellidos;
	  }

	public function getPerfil()
	  {
	    return $this->perfil;
	  }	

	public function setperfil($perfil)
	  {
	    $this->perfil=$perfil;
	  }



}




?>