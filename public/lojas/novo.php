<?php

require_once(__DIR__ . '/../../templates/template-html.php');
ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro das Lojas</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

               <form action="salvar.php"  method="POST">
                  <div class="form-group">
				  <label for="nome">Nome da Loja</label>
                      <input type="text" placeholder="Nome da Loja" 
                          class="form-control" name="nome" required>
				  <label for="nome">CNPJ</label>
					  <input type="text" placeholder="CNPJ" 
                          class="form-control" name="cnpj" required>
				<label for="nome">Endereço</label>
					  <input type="text" placeholder="Endereço" 
                          class="form-control" name="endereco" required>	  
				<label for="nome">Cidade</label>
					  <input type="text" placeholder="Cidade" 
                          class="form-control" name="cidade" required>	
                <label for="nome">Estado</label>
					  <input type="text" placeholder="Estado" 
                          class="form-control" name="estado" required>		
                <label for="nome">Cep</label>
					  <input type="text" placeholder="Cep" 
                          class="form-control" name="Cep" required>		
                <label for="nome">Telefone</label>
					  <input type="text" placeholder="Telefone" 
                          class="form-control" name="telefone" >		
                </div>
			  <button type="submit" class="btn btn-primary">Salvar</button>
              <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
              </form>
			 


            </div>
        </div>
    </div>
<?php

$content = ob_get_clean();
echo html( $content );
    
?>