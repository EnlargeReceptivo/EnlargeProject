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
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB' crossorigin='anonymous' />
        <link href='https://use.fontawesome.com/releases/v5.1.0/css/all.css' rel='stylesheet' integrity='sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt' crossorigin='anonymous' />
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js' integrity='sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T' crossorigin='anonymous'></script>
        <link rel="stylesheet" type="text/css" href="css/homeStyle.css">
    </header>
    <body>
    <div class="menu">
            <div class="menuInterior" style="margin-top: -10px;">
                <div class="logo">
                    <a href="index.php">
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
			<li><a href="?controller=UsuariosController&method=listar">Usuarios</a></li>
			<li><a href="telaGenerica.php">Relatórios</a></li>
                    </ul>
		</div>
            </div>
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
            echo '</div>';
        }
        ?>


    </body>
</html>