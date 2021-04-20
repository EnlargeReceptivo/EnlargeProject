<?php
function verificar(){
    $email	=	$_GET["email"];
    $con	= new mysqli('mysql:host=localhost;port=3306;dbname=enlargebd', 'root', '130418');
    $sql	= "select * from usuarios where email='$email'";
    $resultado = mysqli_query($con, $sql);
    
    if($reg = mysqli_fetch_array($resultado)){
        header("location: lista.php");
    } else {
        echo "<b>Usuário não encontrado</b>";
    }
    mysqli_close($con);
}
?>