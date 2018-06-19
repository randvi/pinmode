<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="3; url=http://pinmode.by/challenge.html#form-registarion">
</head>

<body>

    <?php

        $recepientAlex = "6131070@gmail.com"; 
        $recepientIgor = "6535761@gmail.com";
        $recepientPinMode = "info@pinmode.by"; //"info@pinmode.by";
        $sitename = "www.pinmode.by";
        $type_robot = trim($_POST["typeRobot"]);
        $nameCommand = trim($_POST["nameCommand"]);
        $platform = trim($_POST["platform"]);
        $organization = trim($_POST["organization"]);
        $participant = trim($_POST["participant"]);
        $year = trim($_POST["year"]);
        $phone = trim($_POST["phone"]);
        $email = trim($_POST["email"]);
        $participant2 = trim($_POST["participant2"]);
        $year2 = trim($_POST["year2"]);
        $info = trim($_POST["info"]);
        $form_info = trim($_POST["form-type"]);

        $message = "Категория соревнований:\t$type_robot\nНазвание команды:\t$nameCommand\nПлатформа:\t$platform\nОрганизация: $organization\nУчастник:\t$participant\nГод рождения участника:\t$year\nТелефон:\t$phone\nE-mail:\t$email\nУчастник 2:\t$participant2\nГод рождения второго участника:\t$year2\nДополнительная информация:\t$info\n";

        $f = fopen("registration.txt", "a+"); 
        fwrite($f,"\n$message");
        fwrite($f,"\n$form_info");
        fwrite($f,"\n---------------"); 
        fclose($f);
        


        $pagetitle = "Регистрация в pinMode CHALLENGE 2018 на сайте \"$sitename\"";   
        $subject = "Регистрация в pinMode CHALLENGE 2018";  
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
    
        $headers = "Content-type: text/html; charset=windows-1251rn";
        $headers .= "From: pinMode <info@pinmode.by>rn";

        if ($form_info == "registation") {
            // отправка сообщения
            if (@mail($recepientPinMode, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepientPinMode")) {
               // @mail($recepientAlex, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepientPinMode");
               // @mail($recepientIgor, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepientPinMode");
                echo "<center><h2>Ваше сообщение отправлено!</h2></center>";
                echo "<center><h2>Подтверждение о регистрации будет выслано вам на e-mail</h2></center>";
                @mail($email, $subject, $client_message, $headers);
            } else {
                echo "<center><h2>Ошибка отправки!</h2></center>";
            }
        } else {
            echo "<center><h2>СПАМ! СПАМ ! СПАМ !</h2></center>";
        }
        

    ?>

</body>

</html>
