<?php

  class communication extends page {

    public function sendInvitation($data){
      $headers  = "From: Festuves.lt < no-reply@festuves.lt >\n" . 'X-Mailer: PHP/' . phpversion() . "X-Priority: 1\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=UTF-8\n";
      $subject = "Priminimas nepamiršti pasižymėti";
      $text = ' Labas dar kartą!<br><br>
                Primenam: Rugpjūčio 31 d.<br><br>
                Dar pridedam jog reikia nepamiršti: <br>
                - Gero vibe;<br>
                - ...<br><br>
                Su pagarba<br>
                Būsimi Žukauskai';
      mail($data['email'],$subject,$text,$headers);
      mail('XXXXXX',$data['name'].' invited','Invitation sent to '.$data['name'],$headers);
    }

    public function sendRequest($phone){
      $headers  = "From: Festuves.lt < no-reply@festuves.lt >\n" . 'X-Mailer: PHP/' . phpversion() . "X-Priority: 1\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=UTF-8\n";
      $subject = "Bandoma užsiregistruoti Festuves.lt";
      $text = 'Asmuo bandantis užsiregistruoti nurodė telefono numerį: '.$phone;
      mail('XXXXXX',$subject,$text,$headers);
    }

  }
?>
