<?php 
require_once(__DIR__ . '/../model/Loja.php');
require_once(__DIR__ . '/../db/Db.php');

class DaoLoja {
    
    private $connection;
  
    public function __construct(Db $connection) {
        $this->connection = $connection;
    }

    public function porId(int $id): ?Loja {
        $sql = "SELECT nome,cnpj,endereco,cidade,estado,cep,telefone, FROM lojas where loja_id = ?";
        $stmt = $this->connection->prepare($sql);
        $loj = null;
        if ($stmt) {
          $stmt->bind_param('i',$id);
          if ($stmt->execute()) {
            $stmt->bind_result($nome,$cnpj,$endereco,$cidade,$estado,$cep,$telefone);
            $stmt->store_result();
            if ($stmt->num_rows == 1 && $stmt->fetch()) {
              $loj = new Loja($nome,$cnpj,$endereco,$cidade,$estado,$cep,$telefone,$id);
            }
          }
          $stmt->close();
        }
        return $loj;
      }

      public function inserir(Loja $loja): bool {
        $sql = "INSERT INTO lojas (nome,cnpj,endereco,cidade,estado,cep,telefone) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $res = false;
        if ($stmt) {
        $nome =     $loja->getNome();
        $cnpj =     $loja->getCnpj();
        $endereco = $loja->getEndereco();
        $cidade =   $loja->getCidade();
        $estado =   $loja->getEstado();
        $cep =      $loja->getCep();
        $telefone = $loja->getTelefone();
        $stmt->bind_param('sssssss', $nome,$cnpj,$endereco,$cidade,$estado,$cep,$telefone);
          if ($stmt->execute()) {
              $id = $this->connection->getLastID();
              $loja->setId($id);
              $res = true;
          }
          $stmt->close();
        }
        return $res;
      }     

      public function remover(Loja $loja): bool {
        $sql = "DELETE FROM lojas where loja_id=?";
        $id = $loja->getId(); 
        $stmt = $this->connection->prepare($sql);
        $ret = false;
        if ($stmt) {
          $stmt->bind_param('i',$id);
          $ret = $stmt->execute();
          $stmt->close();
        }
        return $ret;
      }

      public function atualizar(Loja $loja): bool {
        $sql = "UPDATE lojas SET nome = ?,cnpj = ? ,endereco = ? ,cidade = ?,estado = ?,cep = ?,telefone = ? WHERE loja_id = ?";
        $stmt = $this->connection->prepare($sql);
        $ret = false;      
        if ($stmt) {
          $id   = $loja->getId();
          $nome = $loja->getNome();
          $cnpj = $loja->getCnpj();
          $endereco = $loja->getEndereco();
          $cidade = $loja->getCidade();
          $cep = $loja->getCep();
          $estado = $loja->getEstado();
          $telefone = $loja->getTelefone();
          $stmt->bind_param('sssssssi', $nome,$cnpj,$endereco,$cidade,$estado,$cep,$telefone,$id);
          $ret = $stmt->execute();
          $stmt->close();
        }
        return $ret;
      }

      public function todos(): array {
        $sql = "SELECT loja_id,nome,cnpj,endereco,cidade,estado,cep,telefone from lojas";
        $stmt = $this->connection->prepare($sql);
        $lojas = [];
        if ($stmt) {
          if ($stmt->execute()) {
            $id = 0;
            $stmt->bind_result($id, $nome,$cnpj,$endereco,$cidade,$estado,$cep,$telefone);
            $stmt->store_result();
            while($stmt->fetch()) {
              $lojas[] = new Loja($nome,$cnpj,$endereco,$cidade,$estado,$cep,$telefone,$id);
            }
          }
          $stmt->close();
        }
        return $lojas;
      }
    
    };