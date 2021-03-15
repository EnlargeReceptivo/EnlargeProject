<?php 

    require_once 'Conexao.php';
    require_once './Usuario.php';
    $u = new Usuario();

    if(isset($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $cpf = addslashes($_POST['cpf']);
        $telefone = addslashes($_POST['telefone']);
        $login = addslashes($_POST['login']);
        $senha = addslashes($_POST['senha']);
        
        if(!empty($nome) && !empty($cpf) && !empty($telefone) && !empty($login) && !empty($senha)){
            if($u->cadastrar($nome,$cpf,$telefone,$login,$senha)){
              $_COOKIE['login']= $_POST['login'];
              echo "variavel global: ".$_COOKIE['login'];
              header("location: index.html");
            }else{
                echo "<script language='javascript' type='text/javascript'>alert('Não foi possivel cadastrar o usuario no sistema!')</script>";
                echo "<script language='javascript' type='text/javascript'>window.location.href='login.html';</script>";
            }
            
        }else {
            echo "<script language='javascript' type='text/javascript'>alert('Preenha todos os campos!')</script>";
            echo "<script language='javascript' type='text/javascript'>window.location.href='cadastro.html';</script>";
        }
    }

?>

