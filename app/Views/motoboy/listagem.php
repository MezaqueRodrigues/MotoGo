<html>
<head>
<title>Listagem de Motoboys</title>
</head>

<body>
<h1>Listagem de Motoboys</h1>
<table border="1" style="width: 100%;">
<tr>
   <th>Nome</th>
   <th>Placa Moto</th>
</tr>

<a href="<?=base_url("index.php/motoboy/cadastrar")?>">Inserir</a>
<?php foreach($motoboys as $m):?>
<tr>
   <th><?= $m["nome"] ?></th>
   <th><?= $m["placa"] ?></th>
</tr>
<?php endforeach ?>

</table>
</body>
</html>