<?php
class Mailer{
    public function  __construct()
    {
        require(APPPATH . "third_party/phpmailer/src/PHPMailer.php");
        require(APPPATH . "third_party/phpmailer/src/SMTP.php");

        $this->mail = new PHPMailer\PHPMailer\PHPMailer();
        $this->mail->IsSMTP();                    // enable SMTP

        $this->mail->SMTPDebug = 1;            // debugging: 1 = errors and messages, 2 = messages only
        $this->mail->SMTPAuth = true;             // authentication enabled
        $this->mail->SMTPSecure = 'ssl';          // secure transfer enabled REQUIRED for Gmail
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;               // or 587
        $this->mail->IsHTML(true);
    }


    public  function send_mail($user_mail,$body,$subject){

        $this->mail->Username = "reclutas.in@gmail.com";
        $this->mail->Password = "Team@reclutaS";
        $this->mail->SetFrom("reclutas.in@gmail.com", "Recruitment");
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AddAddress("$user_mail");

        if (!$this->mail->Send()) {
            return false;
        } else {
            return true;
        }

    }//end of func
}//end of class
?>