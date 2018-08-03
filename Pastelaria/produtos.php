<?php
  $connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");


    $query_produtos = pg_query("SELECT * FROM t_produto") or die("erro ao selecionar");
      if (pg_num_rows($query_produtos)<=0){
        echo"<script language='javascript' type='text/javascript'>alert('Não existem produtos registados'); window.close();</script>";
        die();
      }else{
        echo "<h2>Produtos</h2>";
        echo "<table border='1' style='width:95%; margin-top: 1em;'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Nome</th>";
        echo "<th>Preço</th>";
        echo "<th>Descrição</th>";
        echo "<th>Id Fornecedor</th>";
        echo "<th>Id Categoria</th>";
        echo "</tr>";
          while($aux = pg_fetch_array($query_produtos)){
            echo "<tr><td>".$aux['id_produto']."</td>
                      <td>".$aux['nome']."</td>
                      <td>".$aux['preco_venda']."</td>
                      <td>".$aux['descricao']."</td>
                      <td>".$aux['id_fornecedor']."</td>
                      <td>".$aux['id_categoria']."</td>
                  </tr>";
          }
        echo "</table>";
        echo "<br>";
        echo "<form action='produtos.php' method='POST'> ";
        echo "<input type='submit' name='addprodutos' value='Adicionar Produtos'>";
        echo " <input type='submit' name='remprodutos' value='Remover produtos'>";
        echo "</form> ";

      }

      if (isset($_POST['addprodutos'])) {
        echo "<br>";
        echo "<form action='addprodutos.php' method='POST'>
          <div style=text-align:center>
            <label>Id Produto:</label><input type='text' name='id_produto'>
            <label>Nome:</label><input type='text' name='nome'>
            <label>Preço Venda:</label><input type='text' name='preco_venda'>
            <label>Descrição:</label><input type='text' name='descricao'>
            <label>Id Fornecedor:</label><input type='text' name='id_fornecedor'>
            <label> Id Categoria:</label><input type='text' name='id_categoria'>
            <br>
            <br>
            <input type='submit' value='Submit'  name='submit'>
          </div>

          </form>";
     }

     if (isset($_POST['remprodutos'])) {
       echo "<br>";
       echo "<form action='remprodutos.php' method='POST'>
         <div style=text-align:center>
           <label>Qual o ID do empregado que pretende remover?</label><input type='text' name='produtos'>
           <br>
           <br>
           <input type='submit' value='Remover'  name='remover'>
         </div>
         </form>";
    }




 ?>
