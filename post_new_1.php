<?php

$method = $_SERVER['REQUEST_METHOD'];

$project_name = "pinmode.by";
$admin_email  = "info@pinmode.by";
$form_subject = "Сообщение с сайта www.pinmode.by";
$recepientAlex = "6131070@gmail.com"; 
$recepientIgor = "6535761@gmail.com";
$recepientPinMode = "info@pinmode.by";


$f = fopen("message_new.txt", "a+"); 
fwrite($f,"\npost_new.php---------------"); 
fclose($f);

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

    foreach ( $_POST as $key => $value ) {
            if($value != "" ) {
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
/*
$f = fopen("message_new.txt", "a+"); 
fwrite($f,"\n$message");
fwrite($f,"\n---------------"); 
fclose($f);
*/

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$admin_email.'>' . PHP_EOL .

mail($recepientPinMode, adopt($form_subject), $message, $headers);
mail($recepientIgor, adopt($form_subject), $message, $headers);
//mail($recepientAlex, adopt($form_subject), $message, $headers);
