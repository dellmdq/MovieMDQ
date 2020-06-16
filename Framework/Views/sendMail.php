<?php 




use Models\User as User;
use Models\Ticket as Ticket;
use DAO\TicketDAODB as TicketDAODB;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



// Instantiation and passing `true` enables exceptions
$user = new User();
$user = $_SESSION["usuarioLogueado"];
$email = $user->getMail();


$mail = new PHPMailer(true);

/* ticket */

try {
    $msg = "";
    //Server settings
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                 // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'tp.moviepass.utn@gmail.com';                     // SMTP username
    $mail->Password   = 'Fedeflorerik';                               // SMTP password
    $mail->SMTPSecure =  'tls'; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tp.moviepass.utn@gmail.com', 'Movie Pass Ticket System');      // Mail del que envia el msj

    $user = $_SESSION["usuarioLogueado"];

    $mail->addAddress($user->getMail());     // Mail del que recibe el msj

    //cuerpo mail
    $ticketDAODB = new TicketDAODB();
    $msg.="<h5><div>Ticket ID :  </div></h5>".$ticketDAODB->GetLastId().
            "<h5><div>Usuario : </div></h5>".$user->getName()."  ".$user->getLastName().
            "<h5><div>Gracias por su compra!!</div> </h5>";
    ;



    // Attachments
    // Add attachments


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Gracias por realizar su compra en MoviePass';
    $mail->Body    = 'Datos de su compra: <br><br><br>'.$msg;


    $mail->send();
    // echo 'Message has been sent';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>