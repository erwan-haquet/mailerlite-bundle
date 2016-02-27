<?php

namespace MailerLiteBundle\Wrapper;

class UserWrapper
{
    public $name;
    public $email;
    public $date;
    public $sent;
    public $opened;
    public $clicked;

    public function hydrate($array){
        $this->name = $array['name'];
        $this->email = $array['email'];
        $this->date = $array['date'];
        $this->sent = $array['sent'];
        $this->opened = $array['opened'];
        $this->clicked = $array['clicked'];
    }
}