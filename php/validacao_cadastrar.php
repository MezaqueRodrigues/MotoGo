<?php
    $erros = "";

    if(!isset($_POST["nome"]) || !isset($_POST["email"]) || !isset($_POST["senha"]))
    {
        $erros .= "Todos os campos devem ser preenchidos <br>";
    }

    if(strlen($_POST["nome"]) < 5)
    {
        $erros .= "O campo 'Nome' deve ter no mínimo 5 caracteres! <br>";
    }

    if(strlen($_POST["senha"]) < 6 || strlen($_POST["senha"]) > 8)
    {
        $erros .= "O campo 'Senha' deve ter entre 6 e 8 caracteres! <br>";
    }

    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        $erros .= "O formato de preenchimento do campo 'Email' é inválido! <br>";
    }

    if(strlen($erros) == 0)
    {
        echo "Login efetuado com sucesso! <br>";
        echo "Você será redirecionado para a página de relatórios. <br>";
        header("refresh: 7; url = ../relatorios.html");
    }
    else
    {
        echo $erros . "<br>";
        echo "Você será redirecionado para a página de login. <br>";
        header("refresh: 7; url = ../login.html");
    }
?>