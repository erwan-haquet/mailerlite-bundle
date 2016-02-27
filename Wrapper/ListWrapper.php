<?php

namespace MailerLiteBundle\Wrapper;
use JMS\Serializer\Annotation as JMS;

class ListWrapper
{
    public $id;
    public $name;
    public $date;
    public $updated;
    public $total;
    public $unsubscribed;
    public $bounced;

    public function hydrate($array){
        $this->id = $array['id'];
        $this->name = $array['name'];
        $this->date = $array['date'];
        $this->updated = $array['updated'];
        $this->total = $array['total'];
        $this->unsubscribed = $array['unsubscribed'];
        $this->bounced = $array['bounced'];
    }
}