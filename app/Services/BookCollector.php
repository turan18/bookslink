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

    public function retrieveAll(string $title,$filters = ['maxResults'=>'10']){
        return BookDataMapper::forAllVolumesKeys($this->client->volumes->listVolumes($title, $filters));
    }

    public function retrieveSpecific(string $id){
        return BookDataMapper::forSingleVolumeKeys($this->client->volumes->get($id));
    }


}
