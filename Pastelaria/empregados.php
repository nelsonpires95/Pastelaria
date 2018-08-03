<?php

  $connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");


  $query_empregado = pg_query("SELECT * FROM t_empregado JOIN t_utilizador ON t_utilizador.id_utilizador = t_empregado.id_empregado") or die("erro ao selecionar");


        if (pg_num_rows($query_empregado)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Não existem empregados registados'); window.close();</script>";
          die();
        }else{
          echo "<h2>Empregados</h2>";
          echo "<table border='1' style='width:95%; margin-top: 1em; class='table table-bordered'>";
          echo "<tr>";
          echo "<th>#</th>";
          echo "<th>NIF</th>";
          echo "<th>Nome</th>";
          echo "<th>Salário</th>";
          echo "<th>Rua</th>";
          echo "<th>Localidade</th>";
          echo "<th>Código Postal</th>";
          echo "<th>Contacto</th>";
          echo "<th>Username</th>";
          echo "<th>Password</th>";
          echo "</tr>";
            while($aux = pg_fetch_array($query_empregado)){
              echo "<tr><td>".$aux['id_empregado']."</td>
                        <td>".$aux['nif']."</td>
                        <td>".$aux['nome']."</td>
                        <td>".$aux['salario']."</td>
                        <td>".$aux['rua']."</td>
                        <td>".$aux['localidade']."</td>
                        <td>".$aux['cod_postal']."</td>
                        <td>".$aux['telefone']."</td>
                        <td>".$aux['username']."</td>
                        <td>".$aux['password']."</td>
                    </tr>";
            }

          echo "</table>";
          echo "<br>";
          echo "<form action='empregados.php' method='POST'> ";
          echo "<input type='submit' name='addempregados' value='Adicionar Empregado'>";
          echo " <input type='submit' name='remempregados' value='Remover Empregado'>";
          echo "</form> ";


            if (isset($_POST['addempregados'])) {
              echo "<br>";
              echo "<form action='addempregado.php' method='POST'>
      		      <div style=text-align:center>
      		        <label>NIF:</label><input type='text' name='nif'>
      		        <label>Nome:</label><input type='text' name='nome'>
                  <label>Salario:</label><input type='text' name='salario'>
                  <label>Rua:</label><input type='text' name='rua'>
                  <label>Localidade:</label><input type='text' name='localidade'>
                  <label>Código Postal:</label><input type='text' name='cod_postal'>
                  <label>Contacto:</label><input type='text' name='contacto'>
                  <label>ID Utilizador:</label><input type='text' name='id_utilizador'>
                  <label>ID Perfil:</label><input type='text' name='id_perfil'>
                  <label>Username:</label><input type='text' name='username'>
                  <label>Password:</label><input type='text' name='password'>
      		        <br>
      		        <br>
      		        <input type='submit' value='Submit'  name='submit'>
      		      </div>
                </form>";
           }

           if (isset($_POST['remempregados'])) {
             echo "<br>";
             echo "<form action='remempregado.php' method='POST'>
               <div style=text-align:center>
                 <label>Qual o ID do empregado que pretende remover?</label><input type='text' name='emp'>
                 <br>
                 <br>
                 <input type='submit' value='Remover'  name='remover'>
               </div>
               </form>";
           }
        }



?>
