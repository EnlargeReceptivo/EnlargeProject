<!DOCTYPE html>
<html>
    <head>
	<title>Enlarge - Home</title>
	<meta charset="UTF-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="homeStyle.css">
    </head>
    <body class="teste">
	<div class="menu">
            <div class="menuInterior" style="margin-top: -10px;">
                <div class="logo">
                    <a href="telaGenerica.php">
		<div class="brand_logo_container">	
                    <img src ="logo-radio.png" class="brand_logo">
		</div>
                    </a>
		</div>
			
		<div class="busca">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="O que você está procurando?" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <a href="request.php" class="btn btn-danger">Busca</a>
			</div>
                    </div>
		</div>
			
		<div class="btnLogin">
                    <a href="login.html" class='btn btn-warning'>	
                       Sair
                    </a>
		</div>

		<div class="menuprodutos">
                    <ul>
                        <li><a href="telaGenerica.php">Começar</a></li>	
			<li><a href="telaGenerica.php">Serviços</a></li>
			<li><a href="telaGenerica.php">Reservas</a></li>
			<li><a href="gerenciarUsuario.html">Gerenciar Usuarios</a></li>
			<li><a href="telaGenerica.php">Relatórios</a></li>
                    </ul>
		</div>
            </div>
	</div>
	<div class="container">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">email</th>
                    <th scope="col">senha</th>

                  </tr>
                </thead>
              <tbody>
              <?php 
              while($dados = mysqli_fetch_array($resultado)){
                $email = $dados['email'];
                $senha = $dados['senha']; ?>
               <tr>
                    <th scope="row"></th>
                    <td><?php $email ?></td>
                    <td><?php $senha ?></td>

                  </tr> 
               <?php } ?>
               </tbody>
              </table>
               
	</div>
    </body>
</html>