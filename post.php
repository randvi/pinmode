<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="3; url=http://pinmode.by#formpost">
</head>

<body>

    <?php

        $recepientAlex = "6131070@gmail.com"; 
        $recepientIgor = "6535761@gmail.com";
        $recepientPinMode = "info@pinmode.by"; //"info@pinmode.by";
        $sitename = "www.pinmode.by";
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $text = trim($_POST["text"]);
        $form_info = trim($_POST["form-type"]);
        $message = "Имя: $name \nE-mail: $email \nТекст: $text";

        $f = fopen("message.txt", "a+"); 
        fwrite($f,"\n$message");
        fwrite($f,"\n$form_info");
        fwrite($f,"\n---------------"); 
        fclose($f);

        $pagetitle = "Новое сообщение с сайта \"$sitename\"";   
        if ($form_info == "computer") {
            // отправка сообщения
            if (@mail($recepientPinMode, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepientPinMode")) {
                //@mail($recepientAlex, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepientPinMode");
                //@mail($recepientIgor, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepientPinMode");
                echo "<center><h2>Ваше сообщение отправлено!</h2></center>";
            } else {
                echo "<center><h2>Ошибка отправки!</h2></center>";
            }
        } else {
            echo "<center><h2>СПАМ! СПАМ ! СПАМ !</h2></center>";
        }

    ?>

</body>

</html>
