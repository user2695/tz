    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/SMTP.php';
    
    $mail = new PHPMailer(true);    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        $phone = $_POST["phone"];
    
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bookings@travelzeetourandtravels.in';
            $mail->Password = 'Bookings@123';
            $mail->SMTPSecure = 'ssl'; // Change to 'ssl' if using port 465
            $mail->Port = 465; // Change to 465 if using 'ssl'
    
            $mail->setFrom('bookings@travelzeetourandtravels.in', 'Travelzee');
            $mail->addReplyTo($email, $name);
            $mail->addAddress('qnssrinagar@gmail.com', 'QNS');
            $mail->Subject = "New Travelzee Lead";
            $mail->Body = 'Name: ' . $name . "\n";
            $mail->Body .= 'Email: ' . $email . "\n";
            $mail->Body .= 'Phone number: ' . $phone . "\n";
            $mail->Body .= 'Message: ' . $message;

    
            $mail->send();
    
            // Redirect to a thank-you page
            header("Location: index.html");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    ?>
