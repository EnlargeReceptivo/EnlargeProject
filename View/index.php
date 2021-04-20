<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

spl_autoload_register(function($class) {
    if (file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <header>
        <meta charset="utf-8">
        <title>Area Administrativa Enlarge</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="css/homeStyle.css">
         <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto|Varela+Round">
            <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.6.1/css/all.css">
            <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
            <link rel="stylesheet" type="text/css" href="css/cadastroProdutoServico.css">
    </header>
   
    <body class="teste">
	<div class="menu">
            <div class="menuInterior">
                <div class="logo">
                    <a href="index.php">
                    <div class="brand_logo_container">
                        <img src ="images/logo-radio.png" class="brand_logo">
                    </div>
                    </a>
                </div>
			
                <div class="busca">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar..." aria-label="O que você está procurando?" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <a href="request.php" class="btn btn-primary">Busca</a>
                            </div>
                    </div>
                </div>
			
                <div class="btnLogin">
                    <a href="login.html">	
                        <img src="images/user_icon.png">
                    </a>
                </div>

                <div class="menuprodutos">
                    <ul>
                        <li><a href="index.php">Início</a></li>	
                        <li><a href="?controller=ServicoController&method=listar">Serviços</a></li>
                        <li><a href="telaGenerica.php">Reservas</a></li>
                        <li><a href="?controller=UsuariosController&method=listar">Usuarios</a></li>
                        <li><a href="telaGenerica.php">Relatórios</a></li>
                    </ul>
                </div>
            </div>
	</div>
	<div class="container">
		
	</div>
        <?php
        if ($_GET) {
            $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
            $method     = isset($_GET['method']) ? $_GET['method'] : null;
            if ($controller && $method) {
                if (method_exists($controller, $method)) {
                    $parameters = $_GET;
                    unset($parameters['controller']);
                    unset($parameters['method']);
                    call_user_func(array($controller, $method), $parameters);
                } else {
                    echo "Método não encontrado!";
                }
            } else {
                echo "Controller não encontrado!";
            }
        } else {
            echo '<div class="container">';
            echo '<h1>Bem-vindo a pagina Administrativa Enlarge!</h1> <br /><br />';
            //echo '<a href="?controller=UsuariosController&method=listar" class="btn btn-success">Vamos Começar!</a></div>';
            echo '</div>';
        }
        ?>
    </body>
</html>