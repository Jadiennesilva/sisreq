<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/intro.css">
    <title>Sisreq</title>
</head>
<body>
    <header>
        <div class="nav">
            <nav>
                <p>Sistema de requerimento</p>
           </nav>  
        </div>
    </header>
    <form class="form" method="post" action="index.php">
        <div class="card">
            <div class="card-top"></div>

            <div class="logo">
                <img class="imagem" src="img/SisReq.png" alt="logo css5"> 
            </div>

            <div class="card-group">
                 <label>Login</label>
                 <input type="text" name="login">
            </div>

            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha">
           </div>

        <div class="card-group">
            <button type="submit">Entrar</button>
        </div>

        <div style="margin-top: 10px;">
            <a href=""> Esqueceu a Senha?</a>
        </div>
        <div style="margin-top: 10px;">
            <a href=""> Cadastrar Usuário</a>
        </div>
        </div>
    </form>
</body>
</html>



