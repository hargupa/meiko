<?php

class Usuario
{
	  protected $Codigo;		
	  protected $Nombres;
  	  protected $Apellidos;
  	  protected $Email;
  	  protected $Password;
  	  protected $Pais;
  	  protected $Perfil;


	public function getCodigo()
	  {
	    return $this->Codigo;
	  }	

	public function setCodigo($Codigo)
	  {
	    $this->Codigo=$Codigo;
	  }




	public function getNombres()
	  {
	    return $this->Nombres;
	  }	

	public function setNombres($Nombres)
	  {
	    $this->Nombres=$Nombres;
	  }

	public function getApellidos()
	  {
	    return $this->Apellidos;
	  }	

	public function setApellidos($Apellidos)
	  {
	    $this->Apellidos=$Apellidos;
	  }

	public function getEmail()
	  {
	    return $this->Email;
	  }	

	public function setEmail($Email)
	  {
	    $this->Email=$Email;
	  }

	public function getPassword()
	  {
	    return $this->Password;
	  }	

	public function setPassword($Password)
	  {
	    $this->Password=$Password;
	  }


	public function getPais()
	  {
	    return $this->Pais;
	  }	

	public function setPais($Pais)
	  {
	    $this->Pais=$Pais;
	  }


	public function getPerfil()
	  {
	    return $this->Perfil;
	  }	

	public function setPerfil($Perfil)
	  {
	    $this->Perfil=$Perfil;
	  }



}

/*$user = new Usuario();
$user->setNombres('Sumadre');
$user->setNombres('Supadre');

echo $user->getNombres[0];
*/



?>