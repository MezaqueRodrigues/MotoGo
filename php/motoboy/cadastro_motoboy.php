<?php
        $erros= "";

        if (!isset($_POST["nome"]) || !isset($_POST["endereco"]) || !isset($_POST["telefone"]) || !isset($_POST["cpf"]) || !isset($_POST["email"]) || !isset($_POST["cnh"]) || !isset($_POST["placa"]) || !isset($_POST["cor"]))
        {
                $erros .="Todos os campos devem ser preenchidos! <br>";
        }

        if(strlen($_POST["nome"]) < 10)
        {
                $erros .= "Coloque seu nome completo! <br>";
        }

        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
        $erros .= "O formato de preenchimento do  campo 'Email' é inválido! <br>";
        }

        if(strlen($_POST["endereco"]) < 10)
        {
                $erros .= "Coloque seu endereço completo! <br>";
        }

        if (!is_numeric($_POST["telefone"]))
        {
                $erros .= "O campo 'Telefone' deve conter apenas números! <br>";
        }

        if (!is_numeric($_POST["cpf"]))
        {
                $erros .= "O campo 'CPF' deve conter apenas números! <br>";
        }

        if (!is_numeric($_POST["cnh"]))
        {
        $erros .= "O campo 'CNH' deve conter apenas números! <br>";
        }

        //redirecionamento
        if (strlen($erros) == 0)
        {
                echo "Cadastro feito com sucesso! <br>";
                header("refresh: 5; url = ../../index.html");
        }
        else
        {
                echo $erros . "<br>";
                echo "Você será redirecionado para a página de atualização <br>";
                header("refresh: 10; url = ../../cadastro_motoboy.html");
        }
?>