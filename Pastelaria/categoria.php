<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/estilos1.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <style media="screen">
      li:hover { background: yellow; }
    </style>

    <script>
      $(document).ready(function(){
          $("li").click(function(){
              $(this).clone().appendTo("#downbar");
          });

      });

    </script>

  </head>
  <body>


    <div id="conteudo_principal">

      <div class="dropdown">
        <button class="dropbtn">Categorias</button>
        <div class="dropdown-content">
          <form method="post" action="categoria.php">
            <input class="categoria" type="submit" value=" Bebidas " name="bebidas">
            <input class="categoria" type="submit" value="Salgados " name="salgados">
            <input class="categoria" type="submit" value=" Bolos " name="bolos">
            <input class="categoria" type="submit" value=" Snacks " name="snacks">
          </form>
        </div>        
      </div>



      <div class="xpto">
        <div id="sidebar" >
          <ul>

          <?php
          $conn = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");

          if (!$conn) {
            echo "An error occurred.\n";
            exit;
          }

          $query_bebidas = pg_query($conn, "SELECT * FROM t_produto
                            JOIN t_categoria ON t_categoria.id_categoria = t_produto.id_categoria
                            WHERE t_produto.id_categoria =1");
          $query_salgados = pg_query($conn, "SELECT * FROM t_produto
                            JOIN t_categoria ON t_categoria.id_categoria = t_produto.id_categoria
                            WHERE t_produto.id_categoria =2");
          $query_bolos = pg_query($conn, "SELECT * FROM t_produto
                            JOIN t_categoria ON t_categoria.id_categoria = t_produto.id_categoria
                            WHERE t_produto.id_categoria =3");
          $query_snacks = pg_query($conn, "SELECT * FROM t_produto
                            JOIN t_categoria ON t_categoria.id_categoria = t_produto.id_categoria
                            WHERE t_produto.id_categoria =4");


          if(isset($_POST['bebidas'])){
            while ($row = pg_fetch_assoc($query_bebidas)) {
              echo "<li>".$row['nome']." <span style='float:right; margin-right:20px;'>".$row['preco_venda']." €</span></li>";

            }
          }
          else if(isset($_POST['salgados'])){
            while ($row = pg_fetch_assoc($query_salgados)) {
              echo "<li>".$row['nome']." <span style='float:right; margin-right:20px;'>".$row['preco_venda']." €</span></li>";


            }

          }
          else if(isset($_POST['bolos'])){
            while ($row = pg_fetch_assoc($query_bolos)) {
              echo "<li>".$row['nome']." <span style='float:right; margin-right:20px;'>".$row['preco_venda']." €</span></li>";


            }

          }
          else if(isset($_POST['snacks'])){
            while ($row = pg_fetch_assoc($query_snacks)) {
              echo "<li>".$row['nome']." <span style='float:right; margin-right:20px;'>".$row['preco_venda']." €</span></li>";


            }
          }

          ?>

        </ul>
        </div>
        <div id="downbar">
          Pedido:
          <br>

        </div>
      </div>
  </div>




  </body>
</html>
