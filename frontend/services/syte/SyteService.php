<?php

namespace frontend\services\syte;

use Yii;
use frontend\models\Contact;

class SyteService
{
    private $letterTheme;
    private $adminEmail;
    
    public function __construct($adminEmail, $letterTheme)
    {
        $this->adminEmail = $adminEmail;
        $this->letterTheme = $letterTheme;
    }

    public function sendLetter(Contact $contact)
    {
        $message = "Tекст: {$contact->userText} . от {$contact->userEmail}";
        $result = Yii::$app->mailer->compose()
                ->setFrom($contact->userEmail)
                ->setTo($this->adminEmail)
                ->setTextBody($message)
                ->send();
        if (!$result) {
            throw new \RuntimeException("Don't send email");
        }
        return $result;
    }
}