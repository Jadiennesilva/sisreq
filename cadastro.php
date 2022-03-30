

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/intro.css">
    <title>Sisreq</title>
</head>
<body style="background-color:#FFFFFF;">
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

           <br>
        <br>

        <label style="width: 100%; color: #000(75, 75, 75);  font-size: 18px;font-weight: bold;">Você é:</label>
        <select style= "display:block; background-color: #FFFFFF; width: 50%; border-radius: 15px; padding: 10px;  font-weight: bold; font-size: 12pt;form= form-cadastro name=tipo required;">
            <option value="0" selected>Administrador</option>
            <option value="1">Estudante</option>
        </select>

        <br>
        <br>

        <input style= "display:block; background-color: #36B059; width: 60%; border-radius: 15px; padding: 10px;  font-weight: bold; font-size: 12pt;form= form-cadastro name=tipo required;" type="submit" value="Cadastrar">

        
    </form>
</body>
</html>