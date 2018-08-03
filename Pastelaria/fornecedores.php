<?php
  $connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");


    $query_fornecedor = pg_query("SELECT * FROM t_fornecedor") or die("erro ao selecionar");
      if (pg_num_rows($query_fornecedor)<=0){
        echo"<script language='javascript' type='text/javascript'>alert('Não existem fornecedores registados'); window.close();</script>";
        die();
      }else{
        echo "<h2>Fornecedores</h2>";
        echo "<table border='1' style='width:95%; margin-top: 1em;'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Nome</th>";
        echo "<th>Telefone</th>";
        echo "<th>Rua</th>";
        echo "<th>Localidade</th>";
        echo "<th>Código Postal</th>";
        echo "</tr>";
          while($aux = pg_fetch_array($query_fornecedor)){
            echo "<tr><td>".$aux['id_fornecedor']."</td>
                      <td>".$aux['nome']."</td>
                      <td>".$aux['telefone']."</td>
                      <td>".$aux['rua']."</td>
                      <td>".$aux['localidade']."</td>
                      <td>".$aux['cod_postal']."</td>
                  </tr>";
          }
        echo "</table>";
        echo "<br>";
        echo "<form action='fornecedores.php' method='POST'> ";
        echo "<input type='submit' name='addfornecedores' value='Adicionar Fornecedor'>";
        echo " <input type='submit' name='remfornecedores' value='Remover Fornecedor'>";
        echo "</form> ";

        if (isset($_POST['addfornecedores'])) {
          echo "<br>";
          echo "<form action='addfornecedores.php' method='POST'>
            <div style=text-align:center>
              <label>Id Fornecedor:</label><input type='text' name='id_fornecedor'>
              <label>Nome:</label><input type='text' name='nome'>
              <label>telefone:</label><input type='text' name='telefone'>
              <label>Rua:</label><input type='text' name='rua'>
              <label>Localidade:</label><input type='text' name='localidade'>
              <label>Código Postal:</label><input type='text' name='cod_postal'>
              <br>
              <br>
              <input type='submit' value='Submit'  name='submit'>
            </div>
            </form>";
       }

       if (isset($_POST['remfornecedores'])) {
         echo "<br>";
         echo "<form action='remfornecedores.php' method='POST'>
           <div style=text-align:center>
             <label>Qual o ID do fornecedor que pretende remover?</label><input type='text' name='fornecedor'>
             <br>
             <br>
             <input type='submit' value='Remover'  name='remover'>
           </div>
           </form>";
       }

      }



 ?>
