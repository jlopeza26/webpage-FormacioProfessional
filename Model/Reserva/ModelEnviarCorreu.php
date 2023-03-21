<?php

include ("../../Model/Conexion/connexio_bd.php");

class MostrarEnviarCorreu {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function enviarCorreu($email, $msg, $asunto){
        $header = "From noreply@example.com";
        $header .= "Reply-To: noreply@example.com";
        $header .= "X-Mailer: PHP/". phpversion();
        $mail = mail($email, $header, $msg, $asunto);
        if($mail) {
            echo "<h4>Mail enviat correctament!";
        }
    }
}