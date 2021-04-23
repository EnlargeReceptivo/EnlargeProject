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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/indexStyle.css">
    </header>

    <body class="teste">

        <div class="container">

        </div>
        <?php
        if ($_GET) {
            $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL ) : null;
            $method = isset($_GET['method']) ? $_GET['method'] : null;
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
            echo '<div class="menu">';
            echo '<div class="menuInterior">';
            echo '<div class="logo">';
            echo '<a href="index.php">';
            echo '<div class="brand_logo_container">';
            echo '<img src ="css/images/logo-radio.png" class="brand_logo">';
            echo '</div>';
            echo '</a>';
            echo '</div>';

            echo '<div class="busca">';
            echo '<div class="input-group">';
            echo '<input type="text" class="form-control" placeholder="Pesquisar..." aria-label="O que você está procurando?" aria-describedby="button-addon2">';
            echo '<div class="input-group-append">';
            echo '<a href="request.php" class="btn btn-primary">Busca</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="btnLogin">';
            echo '<a href="login.html">';
            echo '<img src="css/images/user_icon.png">';
            echo '</a>';
            echo '</div>';

            echo '<div class="menuprodutos">';
            echo '<ul>';
            echo '<div class="menupicked">';
            echo '<li><a href="index.php">Início</a></li>';
            echo '</div>';
            echo '<li><a href="?controller=ServicoController&method=listar">Serviços</a></li>';
            echo '<li><a href="?controller=ReservaController&method=listar">Reservas</a></li>';
            echo '<li><a href="?controller=TarifarioController&method=listar">Tarifários</a></li>';
            echo '<li><a href="?controller=UsuariosController&method=listar">Usuarios</a></li>';
            echo '<li><a href="index.php">Relatórios</a></li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="container">';
            echo '<div class = "table-responsive">';
            echo '<div class = "table-wrapper">';
            echo '<div class = "table-title">';
            echo '<div class="row">';
            echo '<div class="col-md-6">';			
            echo '<h1 class="table-subtitle"><b>Bem-vindo a pagina Administrativa Enlarge!<b></h1>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            //echo '<a href="?controller=UsuariosController&method=listar" class="btn btn-success">Vamos Começar!</a></div>';
            echo '</div>';
        }
        ?>
    </body>
</html>