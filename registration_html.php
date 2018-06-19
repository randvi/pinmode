<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="3; url=http://pinmode.by/challenge.html#form-registarion">
</head>

<body>

<?php

$method = $_SERVER['REQUEST_METHOD'];

$recepientAlex = "6131070@gmail.com"; 
$recepientIgor = "6535761@gmail.com";
$recepientPinMode = "info@pinmode.by";


$project_name = "pinmode.by";
//$admin_email  = trim($_POST["admin_email"]);
$form_subject = "Регистрация в pinMode CHALLENGE 2018";
 
$client_message = "
<html>
    <head>
    <title>Регистрация в pinMode CHALLENGE 2018</title>
</head>
<body>
  <p>Спасибо Вам за регистрацию в соревнованиях <strong>pinMode CHALLENGE 2018</strong></p>
  <p>Подтверждение о регистрации Вам будет выслано в течение суток</p>
</body>
</html>
";




//Script Foreach
$c = true;
if ( $method === 'POST' ) {
    foreach ( $_POST as $key => $value ) {
        if ( $value != "" && $key != "form-type" ) {
            $message .= "
            " . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
                <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
                <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
            </tr>
            ";
        }
    }
} 

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
    return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$form_info = trim($_POST["form-type"]);

$f = fopen("registration.txt", "a+"); 
fwrite($f,"\n$message");
fwrite($f,"\n$form_info");
fwrite($f,"\n----------------------"); 
fclose($f);

$email = trim($_POST["E-mail"]);


if ($form_info == "registation") {
    $headers = "MIME-Version: 1.0" . PHP_EOL .
    "Content-Type: text/html; charset=utf-8" . PHP_EOL .
    'From: '.adopt($project_name).' <'.$recepientPinMode.'>' . PHP_EOL .
    'Reply-To: '.$recepientPinMode.'' . PHP_EOL;

    mail($recepientPinMode , adopt($form_subject), $message, $headers );
    //mail($recepientIgor , adopt($form_subject), $message, $headers );
    //mail($recepientAlex , adopt($form_subject), $message, $headers );
    echo "<center><h2>Ваше сообщение отправлено!</h2></center>";
    echo "<center><h2>Подтверждение о регистрации будет выслано вам на e-mail</h2></center>";
    mail($email, adopt($form_subject), $client_message, $headers );
}

?>

</body>

</html>
