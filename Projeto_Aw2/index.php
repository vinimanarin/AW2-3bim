<?php
require_once "usuarios.php";
$u = new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sign in</title>
    </head>

    <body>
        <div id="corpo-form">
        <h1>Sign in</h1>
        <form method="POST" >
            <input type="email" placeholder="Usuário" name="email">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Não possui Login?<strong>Cadastre-se agora/Sign Up!</strong></a>
        </form>
        </div>
        <?php
        if(isset($_POST['email'])){
            $email  = addslashes($_POST['email']);
            $senha  = addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha)){
                $u->conectar("bdprojetoaw2","localhost","root","");
                if($u->msg == ""){
                    if($u->logar($email, $senha)){
                        header("location: areaprivada.php");
                    }else{
                        echo "Ops! O e-mail e/ou senha estão incorretos. Revise-os.";
                    }
                }else{
                    echo "Ops! Parece que deu algo errado :/ ".$u->msgErro;
                }
            }else{
                echo "Preencha todos os campos corretamente para realizar o login";
            }
        }
        ?>
    </body>
</html>
