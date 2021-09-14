<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Estilo Customizado -->
    <link rel="stylesheet" href="<?= base_url("css/estilo_login.css")?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.png">

</head>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem Vindo de Volta!</h2>
                <p class="description description-primary">Faça login com seus dados</p>
                <p class="description description-primary">para se conectar ao nosso servidor</p>
                <button id="signin" class="btn btn-primary">Entrar</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Crie Sua Conta</h2>
                <!-- Google e Facebook -->
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                           <!-- <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>        
                            </li>-->
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <!-- Cadastrar -->
                <p class="description description-second">ou utilize seu email para o cadastro</p>
                <form class="form" method="POST" action="<?= site_url("usuario/cadastrar") ?>">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Nome" id="nome" name="nome">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" id="email" name="email">
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" id="senha" name="senha">
                    </label>
                    
                    
                    <button type="submit" class="btn btn-second">Cadastrar</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <!-- Entrar -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Olá, amigo!</h2>
                <p class="description description-primary">Para se manter conectado ao servidor</p>
                <p class="description description-primary">informe seus dados</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Faça login na sua conta</h2>
                <!-- Google e Facebook -->
                <div class="social-media">
                    <ul class="list-social-media">
                        <a class="link-social-media" href="#">
                          <!--  <li class="item-social-media">
                                <i class="fab fa-facebook-f"></i>
                            </li>-->
                        </a>
                        <a class="link-social-media" href="#">
                            <li class="item-social-media">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                    </ul>
                </div><!-- social media -->
                <p class="description description-second">ou utilize seu email para o login</p>
                <form class="form" method="POST" action="<?=site_url("usuario/entrar")?>">

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="Email" id="email" name="email">
                    </label>
                
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" id="senha" name="senha">

                    </label>
                
                    <a class="password" href="#">Esqueceu sua senha?</a>
                    <button type="submit" class="btn btn-second">Entrar</button>

                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="<?= base_url() ?>/js/login.js"></script>
    <script>
        <?php if(!session("form_login")){ ?>
            btnSignin.click();
        <?php } ?>
    </script>
</body>
</html>