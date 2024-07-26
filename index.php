<?php 
    session_start();
    require_once('./conexao.php');

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container pt-5 " style="width: 35%;">
    <h2>Login de usuario</h2>

    <?php  
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <form action="valida.php" method="POST" name="formLogin">
        <div class="form-group" >
            <label for="usuario" class="form-label">Usu&aacute;rio</label>
            <input type="text" name="usuario" class="form-control" placeholder="Digite seu usuario" value="<?php if(isset($uausrio)){ echo $uausrio;}  ?>" >
        </div>

        <div class="form-group mt-7">
            <label for="usuario">Password</label>
            <input type="password" name="password" class="form-control" placeholder="******">
        </div>
        <input type="submit" name="btnSubmit" class="mt-4 btn btn-primary" value="Acessar">
    </form>
    </div>
</body>
</html>