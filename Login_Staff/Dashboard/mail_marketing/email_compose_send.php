<?php

require "../../../database/config.php";
include "../../../database/conn.php";
require '../complaint_ticket/PHPMailer/PHPMailerAutoload.php';

if (!isset($_SESSION['pegawai'])) {
    header('Location: ../../login.html');
    exit;
}

$sql_last_id = 'SELECT id_campaign FROM campaign ORDER BY id_campaign DESC';
$last_id_query = mysqli_query($koneksi, $sql_last_id);
$last_id_object = mysqli_fetch_assoc($last_id_query); 
$last_id = $last_id_object['id_campaign'] + 1;


$idPegawai = $_SESSION['id_pegawai'];
$pesan = addslashes($_POST["editordata"]);
$subject = $_POST["subject"];
$tgl_start = date('Y-m-d', strtotime($_POST['tanggal_start']));
$tanggal_start = $tgl_start;
$tgl_end = date('Y-m-d', strtotime($_POST['tanggal_end']));
$tanggal_end = $tgl_end;

$sql = "INSERT into campaign values($last_id,'$subject', $idPegawai, '$pesan','$tanggal_start','$tanggal_end');";

// if (mysqli_query($koneksi, $sql)) {
//     foreach($_POST['grouplist'] as $id_group){
//         mysqli_query($koneksi, "INSERT INTO det_campaign VALUES( $id_group, $last_id)");
//     }
//     header ('Location: email-compose.php');
//     } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
//     }



$id_group = $_POST['grouplist'];
// for($i = 0; $i<count($id_group);$i++){
//     $idGroup = $id_group[$i];
// }

    $condition = "" ;
    foreach($id_group as $group){
        if($condition == ""){
            $condition = "id_group = $group";
        }else{
            $condition = $condition . " OR " . "id_group = $group";
        }
    }

    $query_customerGroup = "SELECT DISTINCT c.email, c.nama FROM customer c
	INNER JOIN det_group d 
    ON d.id_cust = c.id_customer
    WHERE $condition";


    echo "<p> $query_customerGroup </p>";

    $get_customerGroup = mysqli_query($koneksi, $query_customerGroup);
    // $ambil_customerGroup = mysqli_fetch_array($get_customerGroup);
    $nums_customerGroup = mysqli_num_rows($get_customerGroup);


    
        // echo "<p>$ambil_customerGroup[email] $ambil_customerGroup[nama]</p>";
    
        

        $mail = new PHPMailer;

        // $mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->Subject = $subject;
        $mail->Body    = $pesan;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        while($ambil_customerGroup = mysqli_fetch_assoc($get_customerGroup)){

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'customerservicehijacksandals@gmail.com';                 // SMTP username
        $mail->Password = 'HijackSandals123';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('customerservicehijacksandals@gmail.com', 'Hijack Sandals Customer Service');
        $mail->addAddress("$ambil_customerGroup[email]", "$ambil_customerGroup[nama]");     // Add a recipient               // Name is optional
        $mail->addReplyTo('customerservicehijacksandals@gmail.com', 'Hijack Sandals Customer Service');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML


        if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                    echo 'Message has been sent';
                }
            }
    
            // header("Location: ticket_detail.php?id_ticket=$id");


?>

