<?php 
    if(isset($_POST['reenvio_Pass'])){
        $correDestino=$_POST['reenvio_Pass'];
        require_once("../modelo/administrativo.php");
        $administrativo = new Administrativo();
        $password=$administrativo-> obtenerPasswordAdministrativo($correDestino);
        echo $password."<br>";
        $administrativo->cerrarConexion();
        if(sizeof($password)>0){
            require_once('../vendor/autoload.php'); 
            $from = new SendGrid\Email(null,"ConvocatoriaUMSS@email.com");
            $subject = "Recuperacion de password ";
            $to = new SendGrid\Email(null,$correDestino);
            $content = new SendGrid\Content("text/html", "<p>Hemos visto que ha tenido problemas para recordar su password <h3>$password</h3></p>");
            $mail = new SendGrid\Mail($from, $subject, $to, $content);

            $apiKey = getenv('SENDGRID_API_KEY');
            $sg = new \SendGrid($apiKey);

            $response = $sg->client->mail()->send()->post($mail);
            echo $response->statusCode();
            echo $response->headers();
            echo $response->body();
            echo "Aqui!!";
            header("Location:../paginas/login.php?dato=x");
        }else{
            header("Location:../paginas/login.php?dato=y ");
        }
    }else{
        header("Location:../paginas/login.php?dato=z");
    }
?>
