<html>
<head>
<title>Listagem de Motoboys</title>
</head>

<body>
<h1>Listagem de Motoboys</h1>
                                        
    <form method="post" action="<?php echo base_url() . "/index.php/motoboy/salvar" ?>">
       <label for="nome">Nome</label>
       <input type="text" name="nome" id="nome" />
        <br>
       <label for="placa">Placa</label>
       <input type="text" name="placa" id="placa" />
        <br>
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>