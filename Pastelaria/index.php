<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title></title>

  </head>
  <body>

    <?php   session_start();
    $connect = pg_connect("host=localhost port=5432 dbname=pastelaria user=postgres password=bd2016");


      ?>

      <script>
        function openwin() {
         window.open('categoria.php', 'newwindow', 'width=1000, height=450, left=500 top=250'); return false;
        }
      </script>

    <div id="exterior">
      <div id="cabecalho">
        <h1>Pastelaria</h1>
      </div>
      <div id="navegacao">
        <a href="logout.php">Log Out</a>
      </div>
      <div id="menu">
        <div id="favoritos">
          <h3>Log In As <?php  echo "<span style='text-decoration: underline; color:#db905c;'>".$_SESSION['username']."</span>"; ?></h3>
          <p><?php echo "".date("Y / m / d").""; ?></p>
          <p><?php date_default_timezone_set("Europe/London"); echo "".date("h:i:s a").""; ?></p>
        </div>

        <div id="grupos">
          <h3>Informações</h3>
          <form action="informacoes.php" method="POST">
            <p><i class="fa fa-user"></i> <input type="button" name="empregados" value="Empregados" onclick="window.open('empregados.php', 'windowE', 'width=1000, height=450, left=500 top=250'); return false;"></p>
            <p><i class="fa fa-user"></i> <input type="button" name="clientes" value="Clientes" onclick="window.open('clientes.php', 'windowC', 'width=1000, height=450, left=500 top=250'); return false;"></p>
            <p><i class="fa fa-bars"></i> <input type="button" name="produtos" value="Produtos" onclick="window.open('produtos.php', 'windowF', 'width=1000, height=450, left=500 top=250'); return false;"></p>
            <p><i class="fa fa-truck"></i> <input type="button" name="fornecedores" value="Fornecedores" onclick="window.open('fornecedores.php', 'windowF', 'width=1000, height=450, left=500 top=250'); return false;"></p>
          </form>
        </div>
      </div>

      <div id="conteudo">
        <div id="principal">
          <div class="artigo1">
            <img src="images/pastelaria.png" id="pastelaria" style="width:100%">
          </div>
        </div>

        <div id="secundario">
          <h2>Pedidos</h2>
          <div id="pedidos">
            <form class="" action="" method="post">

            <?php
            $mesa = pg_query("SELECT * FROM t_mesa");
            while($aux = pg_fetch_array($mesa)){
              echo "<input style='margin:0 2px 20px 2px ;' type='submit' name='mesa' value='".$aux['descricao']."'>";
            }


            $data = date("Y-m-d");

            if (isset($_POST['mesa'])) {
              $nome_mesa =  $_POST['mesa'];

              $query = pg_query("SELECT num_mesa FROM t_mesa WHERE descricao = '$nome_mesa'");
              $num_mesa = pg_fetch_array($query);
              $n = $num_mesa['num_mesa'];
              $add = pg_query("INSERT INTO t_pedido VALUES (DEFAULT, '$data','', $n)");

              if ($add) {
                echo "<script>javascript:openwin();</script>";
              }else {
                die();
              }

            }


             ?>



        </form>
        </div>
        </div>
      </div>

      <div id="rodape">
        <p>Gestão de uma pastelaria</p>
      </div>

  </body>
</html>
