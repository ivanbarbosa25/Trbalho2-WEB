<?php 

class Loja {

  private $id;
  private $nome;
  private $cnpj;
  private $endereco;
  private $cidade;
  private $estado;
  private $cep;
  private $telefone;

  public function __construct(string $nome='', string $cnpj='',string $endereco='',string $cidade='',string $estado='',string $cep='',string $telefone='',int $id=-1) {
  $this->id = $id;
  $this->nome = $nome;
	$this->cnpj = $cnpj;
  $this->endereco = $endereco;
	$this->cidade = $cidade;
  $this->estado = $estado;
  $this->cep = $cep;
	$this->telefone = $telefone; 
  }

  public function setId(int $id) {
      $this->id = $id;
  }

  public function getId() {
      return $this->id;
  }

  public function setNome(string $nome) {
      $this->nome = $nome;
  }
  
   public function setCnpj(string $cnpj) {
       $this->cnpj = $cnpj;
  }
  
    public function setEndereco(string $endereco) {
       $this->endereco = $endereco;
  }
  
    public function setCidade(string $cidade) {
       $this->cidade = $cidade;
  }

  public function setCep(string $cep) {
    $this->cep = $cep;
}

  
    public function setEstado(string $estado) {
       $this->estado = $estado;
  }
  
    public function setTelefone(string $telefone) {
       $this->telefone = $telefone;
  }
  

  public function getNome() {
      return $this->nome;
  }
  
   public function getCnpj() {
      return $this->cnpj;
  }
  
    public function getEndereco() {
      return $this->endereco;
  }
  
    public function getCidade() {
      return $this->cidade;
  }
  
    public function getEstado() {
      return $this->estado;
  }

   public function getCep() {
     return $this->cep;
 }

  
    public function getTelefone() {
      return $this->telefone;
  }
  
  
};