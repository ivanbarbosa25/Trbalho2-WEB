<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Loja.php');
require_once(__DIR__ . '/../../dao/DaoLoja.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoLoja = new DaoLoja($conn);
$loja = $daoLoja->porId( $_POST['id'] );
    
if ( $loja )
{  
  $loja->setNome( $_POST['nome'] );
  $loja->setCnpj( $_POST['cnpj'] );
  $loja->setEndereco( $_POST['endereco'] );
  $loja->setCidade( $_POST['cidade'] );
  $loja->setEstado( $_POST['estado'] );
  $loja->setCep( $_POST['Cep'] );
  $loja->setTelefone( $_POST['telefone'] );
  $daoLoja->atualizar( $loja );
}

header('Location: ./index.php');