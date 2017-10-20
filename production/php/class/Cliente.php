<?php
	
	class Cliente{
		private $nome;
		private $id;

		function __construct($nome) {
			$this->nome = $nome;
		}

		public function getNome() {
			return $this->nome;
		}
		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
	}
?>