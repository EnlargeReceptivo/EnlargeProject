<?php 

    require_once 'Conexao.php';
    require_once './Usuario.php';
    $u = new Usuario();

    if(isset($_POST['login'])){
        $login = addslashes($_POST['login']);
        $senha = addslashes($_POST['senha']);
        if(!empty($login) && !empty($senha)){
            if($u->login($login,$senha)){
              $_COOKIE['login']= $_POST['login'];
              echo "variavel global: ".$_COOKIE['login'];
              header("location: index.php");
            }else{
                echo "<script language='javascript' type='text/javascript'>alert('Não foi possivel logar no sistema!')</script>";
                echo "<script language='javascript' type='text/javascript'>window.location.href='login.html';</script>";
            }
            
        }else {
            echo "<script language='javascript' type='text/javascript'>alert('Preenha todos os campos!')</script>";
            echo "<script language='javascript' type='text/javascript'>window.location.href='login.html';</script>";
        }
    }

?>

