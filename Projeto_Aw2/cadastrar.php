<?php
require_once "usuarios.php";
$u = new Usuario;
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>

    <body>
        <div id="corpo-form">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="32">
            <input type="password" name="csenha" placeholder="Confirmar Senha" maxlength="32">
            <input type="submit" value="CADASTRAR">
        </form>
        </div>

        <?php
        if(isset($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email  = addslashes($_POST['email']);
            $senha  = addslashes($_POST['senha']);
            $cSenha  = addslashes($_POST['csenha']);

            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($cSenha)){
                $u->conectar("bdprojetoaw2","localhost","root","");
                if($u->msgErro == ""){
                    if($senha == $cSenha){
                        if($u->cadastrar($nome, $email, $senha)){
                            ?>
                            <a href="index.php">Aí sim! Tudo certo, seu cadastro está confirmado! Para entrar, faça o login.</a>
                            <?php
                        }else{
                            echo "Ops! O e-mail utilizado já é cadastrado.";
                        }
                    }else{
                        echo "As senhas diferem. Revise sua senha!";
                    }

                }else{
                    echo "Ops! Parece que deu algo errado :/ ".$u->msgErro;
                }
            }else{
                echo "Preencha todos os campos para realizar o login";
            }
        }
        ?>
    </body>
</html>
