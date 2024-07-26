<?php  
    
    session_start();
    ob_start();

    require_once('./conexao.php');

     $login = $_POST['btnSubmit'];

     if($login){
        $uausrio = $_POST['usuario'];
        $password = $_POST['password'];

        if((!empty($uausrio)) and (!empty($password))){

            $req = "SELECT u.id, u.usuario,u.email, u.senha,pl.perfil_id,p.nome
                    FROM usuarios AS u
                    INNER JOIN login_perfil AS pl ON u.id = pl.usuario_id
                    INNER JOIN perfil AS p ON p.id = pl.perfil_id
                    WHERE u.usuario =:usuario
                    LIMIT 1";

            $res = $conn->prepare($req);
            $res->bindParam(':usuario', $uausrio);
            $res->execute();
            
            if(($res) and ($res->rowCount() != 0)){
               $row = $res->fetch(PDO::FETCH_ASSOC);
               
               if(password_verify($password , $row['senha'])){
                    $_SESSION['auth'] = $row['nome'];
                    $_SESSION['email'] = $row['email'];

                   // echo $row['nome'];

                   switch($row['perfil_id']){
                        case 1:
                            header('Location: admin.php');
                            break;
                        case 2:
                            header('Location: home.php');
                            break;
                        default:
                        header('Location: site.php');
                   }

               }else{
                    $_SESSION['msg'] = "A senha informada n&atilde;o est&aacute; correta!";
                    header('Location: index.php'); 
               }
            }else{
                $_SESSION['msg'] = "Usu&aacute;rio n&atilde;o encontrado!";
                header('Location: index.php');
            }
            

        }else{
            $_SESSION['msg'] = "Todos os campos s&atilde;o obligat&oacute;tios!";
            header('Location: index.php');
        }
     }else{
        $_SESSION['msg'] = "P&aacute;gina n&atilde;o encontrada";
        header('Location: index.php');
     }