<?php  
    session_start();
    if(isset($_SESSION['auth']) and $_SESSION['nome'] = 'guest'){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <?php 
        echo "<h1>".$_SESSION['nome']."</h1>";

    ?>
</body>
</html>

<?php   
    }else{
        $_SESSION['msg'] = "Acesso negado para seu tipo de usu&aacute;rio";
    }
?>