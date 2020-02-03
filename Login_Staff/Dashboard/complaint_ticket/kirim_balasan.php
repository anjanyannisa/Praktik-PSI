<?php

    require "../../../database/config.php";
    include "../../../database/conn.php";

    $id = $_GET["id_ticket"];
    // echo $id;
    $subject = addslashes($_POST["subject"]);
    $message = addslashes($_POST["message"]);
    mysqli_query($koneksi, "INSERT INTO complaint_reply VALUES(NULL, '$subject', $id, '$message', CURRENT_DATE())");

    $query_sendEmailCustomer = "SELECT * from customer c
    INNER JOIN complaint d
    ON c.id_customer = d.id_cust
    WHERE id_ticket = '$id'";
    $getEmail_customer = mysqli_query($koneksi,$query_sendEmailCustomer);
    $dataEmail_customer = mysqli_fetch_array($getEmail_customer);

    $hasilEmail_customer = $dataEmail_customer['email'];
    $hasilNama_customer = $dataEmail_customer['nama'];


    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    // $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'customerservicehijacksandals@gmail.com';                 // SMTP username
    $mail->Password = 'HijackSandals123';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('customerservicehijacksandals@gmail.com', 'Hijack Sandals Customer Service');
    $mail->addAddress($hasilEmail_customer, $hasilNama_customer);     // Add a recipient               // Name is optional
    $mail->addReplyTo('customerservicehijacksandals@gmail.com', 'Hijack Sandals Customer Service');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

    // header("Location: ticket_detail.php?id_ticket=$id");
?>