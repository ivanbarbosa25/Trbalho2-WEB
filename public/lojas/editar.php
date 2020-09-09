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
$loja = $daoLoja->porId( $_GET['id'] );
    
if (! $loja )
    header('Location: ./index.php');

else {  
    ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro das Lojas</h2>
        </div>
        <div class="row">
          <div class="col-md-12" >
           
            <form action="atualizar.php"  method="POST">

                <div class="form-group">
                
                <input type="hidden" name="id" 
                          value="<?php echo $loja->getId(); ?>">      
                
				  <label for="nome">Nome da Loja</label>
                      <input type="text" placeholder="Nome da Loja" 
                      value="<?php echo $loja->getNome(); ?>"
                      class="form-control" name="nome" required>
                         
				  <label for="nome">CNPJ</label>
					  <input type="text" placeholder="CNPJ" 
                      value="<?php echo $loja->getCnpj(); ?>"
                      class="form-control" name="cnpj" required>
                         
				<label for="nome">Endereço</label>
					  <input type="text" placeholder="Endereço" 
                      value="<?php echo $loja->getEndereco(); ?>"
                      class="form-control" name="endereco" required>
                          
				<label for="nome">Cidade</label>
					  <input type="text" placeholder="Cidade" 
                      value="<?php echo $loja->getCidade(); ?>"
                      class="form-control" name="cidade" required>	
                         
                <label for="nome">Estado</label>
					  <input type="text" placeholder="Estado" 
                      value="<?php echo $loja->getEstado(); ?>"
                      class="form-control" name="estado" required> 
                         		
                <label for="nome">Cep</label>
					  <input type="text" placeholder="Cep" 
                      value="<?php echo $loja->getCep(); ?>"
                      class="form-control" name="Cep" required>	
                          	
                <label for="nome">Telefone</label>
					  <input type="text" placeholder="Telefone" 
                      value="<?php echo $loja->getTelefone(); ?>"
                      class="form-control" name="telefone" >
                         
                </div>
			  <button type="submit" class="btn btn-primary">Salvar</button>
              <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
              </form>  
        </div>
    </div>
<?php

    $content = ob_get_clean();
    echo html( $content );
} 

?>