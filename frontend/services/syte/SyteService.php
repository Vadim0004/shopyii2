<?php

namespace frontend\services\syte;

use frontend\models\Contact;

class SyteService
{
    private $letterTheme;
    private $adminEmail;
    private $contact = [];
    
    public function __construct($adminEmail  = false, Contact $contact, $letterTheme  = false)
    {
        $this->adminEmail = $adminEmail;
        $this->contact = $contact;
        $this->letterTheme = $letterTheme;
    }

    public function sendLetter()
    {
        $message = "Tекст: {$this->contact->userText} . от {$this->contact->userEmail}";
        $result = mail($this->adminEmail, $this->letterTheme, $message);
        if (!$result) {
            throw new \RuntimeException("Don't send email");
        }
        return $result;
    }
}