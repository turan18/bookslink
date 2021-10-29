<?php

namespace App\Services;

use Google\Service\Books;

class BookCollector
{

    protected $client;

    #Expecting GoogleBooksService client
    public function __construct(Books $client)
    {
        $this->client = $client;
    }

    public function retrieve(string $title,$filters = ['maxResults'=>'3']){
        return BookDataMapper::sanitize($this->client->volumes->listVolumes($title, $filters));
    }


}
