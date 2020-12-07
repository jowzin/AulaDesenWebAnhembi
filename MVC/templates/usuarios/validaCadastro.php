<?php

echo "<br><br><br><br> VALIDA CADASTRO<br>";
    session_start();

    // echo "<br>ALOU FUNCIONA VALIDA CADASTRO.PHP";
    // if(!isset($_SESSION['usuarios'])) {
    //     $_SESSION['usuarios'] = array(); 
    // }
    //  array_push($_SESSION['usuarios'], array('email' => $_POST['email'], 'senha' => $_POST['senha'], 'dataNasc' => $_POST['dataNasc'], 'tel' => $_POST['tel']
    //                                 ,'telRes' => $_POST['telRes'], 'sexo' => $_POST['sexo'], 'estadoCivil' => $_POST['estadoCivil'], 'endereco' => $_POST['endereco'], 
    //                                  'nome' => $_POST['nome']));
    
    // echo " <br><br><br><br><br><br> var AdminUser ".$_SESSION['AdminUser'];
    // echo " <br> var AtualizaUser ".$_SESSION['AtualizaUser'];

    

    if($_SESSION['AtualizaUser'] == 'SIM' && isset($_SESSION['AtualizaUser']) ){
        // $_SESSION['AdminUser'] = 'NAO';
        // echo "<br>atualiza AtualizaUser<br>";
        // unset($_SESSION['usuarios'][ $_SESSION['ContUser'] ]);
        // sort( $_SESSION['usuarios'] );        
           $con = mysqli_connect("localhost", "root", "");
           $banco = mysqli_select_db($con, "dsw");
        //    $sql = "DELETE FROM usuarios WHERE id='".$_SESSION['ContUser']."';";
            $sql = "UPDATE usuarios 
            SET nome='".$_POST["nome"]."', email='".$_POST['email']."', senha='".$_POST['senha']."',
            dataNasc='".$_POST['dataNasc']."', tel='".$_POST['tel']."', telRes='".$_POST['telRes']."', 
            sexo='".$_POST['sexo']."', estadoCivil= '".$_POST['estadoCivil']."', 
            endereco='".$_POST['endereco']."'
            WHERE id='".$_SESSION['ContUser']."';";

           $res = mysqli_query($con, $sql);
           if($res){
                $numreg= mysqli_affected_rows($con);
                // echo "<br>COMANDO EXECUTADO COM SUCESSO";
                // echo "<br> FORAM AFETADOS $numreg";
                // echo "<br>ID =>".$_SESSION['ContUser'];
                // if($numreg > 0){   
                //     $_SESSION['AtualizaUser'] = 'NAO';
                //     echo "<br>MANDA PRO";
                // }
           }
           mysqli_close($con);
    }else{    
    // if($_SESSION['AdminUser'] == 'SIM'){    
        // echo "<br>atualiza outro<br>";
        $con = mysqli_connect("localhost", "root", "");
        $banco = mysqli_select_db($con, "dsw");

        $sql = "INSERT INTO usuarios (nome, email, senha, dataNasc, tel, telRes, sexo, estadoCivil, endereco) 
            VALUES ('".$_POST['nome']."', '".$_POST['email']."', '".$_POST['senha']."', '".$_POST['dataNasc']."', 
            '".$_POST['tel']."', '".$_POST['telRes']."', '".$_POST['sexo']."', '".$_POST['estadoCivil']."', '".$_POST['endereco']."');";

        $res=mysqli_query($con,$sql);
        echo $res;
        if($res){
            while($reg = mysqli_fetch_array($res)){
            //  echo "<br> Codigo do aluno: ".$reg["cod"];
            //  echo "<br> Nome do aluno: ".$reg["nome"]."<br><br>";
        }
        }else{
	        // echo " <br><br> NAO TA INDO O ".$res;
        }

        mysqli_close($con);
    }

                                     

    if($_SESSION['AdminUser'] == 'SIM'){
        $_SESSION['AdminUser'] = 'NAO';
        // echo " <br><br> NAO TA INDO O ";
        // unset($_SESSION['autenticado']);
          header('Location: ../admin.php');
    }
    else if ($_SESSION['AtualizaUser'] == 'SIM'){
        $_SESSION['AtualizaUser'] = 'NAO';
          header('Location: ../home.php');
    }else{
          header('Location: ../login.php');
    }
    
?>