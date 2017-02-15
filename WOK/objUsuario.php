<?php
	class Login{
		private $nick;
		private $pass;
		private $nombre;
		private $avatar;
		private $email;
		private $firma;
		private $karma;
		private $fecha;
		public function setNick($nick)
		{
			$this->nick=$nick;
		}
		public function getNick(){
			return $this->nick;
		}
		public function setPasswd($password)
		{
			$this->password=$password;
		}
		public function getPasswd(){
			return $this->password;
		}
		public function setNombre($nombre)
		{
			$this->nombre=$nombre;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setAvatar($avatar)
		{
			$this->avatar=$avatar;
		}
		public function getAvatar(){
			return $this->avatar;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setFirma($firma){
			$this->firma=$firma;
		}
		public function getFirma(){
			return $this->firma;
		}
		public function setKarma($karma){
			$this->karma=$karma;
		}
		public function getKarma(){
			return $this->karma;
		}
		public function setFecha($fecha){
			$this->fecha=$fecha;
		}
		public function getFecha(){
			return $this->fecha;
		}
	}

	class Bases{
		private $id;
		private $descripcion;
		private $precio;
		public function setId($id){
			$this->id=$id;
		}
		public function getId(){
			return $this->id;
		}
		public function setDescripcion($descripcion){
			$this->descripcion=$descripcion;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setPrecio($precio){
			$this->precio=$precio;
		}
		public function getPrecio(){
			return $this->precio;
		}
	}

?>

