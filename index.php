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
</head>
<body>
    <h2>Login de usuario</h2>

    <?php  
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <form action="valida.php" method="POST" name="formLogin">
        <div class="form-content">
            <label for="usuario">Usu&aacute;rio</label>
            <input type="text" name="usuario" placeholder="Digite seu usuario" value="<?php if(isset($uausrio)){ echo $uausrio;}  ?>" >
        </div>

        <div class="form-content">
            <label for="usuario">Password</label>
            <input type="password" name="password" placeholder="******">
        </div>
        <input type="submit" name="btnSubmit" class="btn-submit" value="Acessar">
    </form>
</body>
</html>