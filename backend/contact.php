<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '.\..\vendor\autoload.php';
    if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['message'])){
        echo json_encode(['message' => 'Todos los campos son necesarios', 'success' => FALSE]);        
    }
    else {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'raspberrypi667@gmail.com';                     // SMTP username
            $mail->Password   = 'gmendez2018';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($_POST['email'], $_POST['name']);
            $mail->addAddress('gilberto.mendez.santiz@gmail.com', 'BinCode');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $_POST['subject'];
            $mail->Body    = '<b> '.$_POST['message'].' </b>';
            

            $mail->send();
            echo json_encode(['message' => 'Correo enviado de manera correcta, pronto nuestro equipo se pondrá en equipo contigo.', 'success' => TRUE]);
        } catch (Exception $e) {
            echo json_encode(['message' => 'Correo enviado de manera correcta, pronto nuestro equipo se pondrá en equipo contigo.', 'success' => TRUE]);
        }
    }
    

?>
