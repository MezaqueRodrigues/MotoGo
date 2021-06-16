<?php
    $erros = "";

    if(!isset($_POST["nome_empresa"]))
    {
        $erros .= "O campo deve ser preenchido. <br>";
    }

    if(strlen($erros) == 0)
    {
        echo "O usuário foi removido com sucesso! <br>";
        echo $_POST["nome_empresa"];
        header("refresh: 5; url = ../../index.html");
    }
    else
    {
        echo $erros . "<br>";
        echo "Você será redirecionado para a página de remoção. <br>";
        header("refresh: 5; url = ../../remover_empresa.html");
    }
?>