<?php

namespace frontend\services\syte;

use Yii;
use frontend\models\Contact;

class SyteService
{
    private $letterTheme;
    private $adminEmail;
    private $contact;
    
    public function __construct($adminEmail, Contact $contact, $letterTheme)
    {
        $this->adminEmail = $adminEmail;
        $this->contact = $contact;
        $this->letterTheme = $letterTheme;
    }

    public function sendLetter()
    {
        $message = "Tекст: {$this->contact->userText} . от {$this->contact->userEmail}";
        //$result = mail($this->adminEmail, $this->letterTheme, $message);
        $result = Yii::$app->mailer->compose()
                ->setFrom($this->contact->userEmail)
                ->setTo($this->adminEmail)
                ->setTextBody($message)
                ->send();
        if (!$result) {
            throw new \RuntimeException("Don't send email");
        }
        return $result;
    }
}