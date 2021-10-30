<?php

namespace App\Services;

use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Static_;
use Psy\Util\Str;

class BookDataMapper
{
    #TODO sanitize data properly. IE account for missing keys and sanitize strings
    public static $volumes;
    public static $volume;

    public static function forAllVolumesKeys($arr): array
    {
         collect($arr->getItems())->map(function ($arr){

            static::$volumes[] = ([
                'id' => $arr['id'] ?? null,
                'thumbnail' => $arr['volumeInfo']['imageLinks']['thumbnail'] ?? null,
                'large-thumbnail' => $arr['volumeInfo']['imageLinks']['large'] ?? null,
                'authors' => $arr['volumeInfo']['authors'] ?? null,
                'title' => $arr['volumeInfo']['title'] ?? null,
                'description' => $arr['volumeInfo']['description'] ?? null,
                'subtitle' => $arr['volumeInfo']['subtitle'] ?? null,

            ]);
        });
         return static::sanitizeVolumes(static::$volumes);
    }



    public static function forVolumeKeys($arr): array
    {
        static::$volume[] = ([
            'id' => $arr['id'] ?? null,
            'thumbnail' => $arr['volumeInfo']['imageLinks']['thumbnail'] ?? null,
            'large-thumbnail' => $arr['volumeInfo']['imageLinks']['large'] ?? null,
            'authors' => $arr['volumeInfo']['authors'] ?? null,
            'title' => $arr['volumeInfo']['title'] ?? null,
            'description' => $arr['volumeInfo']['description'] ?? null,
            'subtitle' => $arr['volumeInfo']['subtitle'] ?? null,
            'isbn_13' => $arr['volumeInfo']['industryIdentifiers'] ?? null,
            'publisher' => $arr['volumeInfo']['publisher'] ?? null,
            'publication_date' => $arr['volumeInfo']['publishedDate'] ?? null,
            'category' => $arr['volumeInfo']['categories'] ?? null,
            'page_count' => $arr['volumeInfo']['pageCount'] ?? null,
            'embeddable' => $arr['accessInfo']['embeddable'] ?? null
        ]);
        return static::sanitizeVolume(static::$volume);

    }



    private static function sanitizeVolumes(array $books): array
    {
        foreach ($books as &$book){
            if (isset($book['authors']) && count($book['authors']) > 1){
                $book['multiple_authors'] = true;
            }
            else{
                $book['multiple_authors'] = false;
            }
            $book['thumbnail'] = str_replace('http','https',$book['thumbnail']);
            $book['snippet'] = static::snippet(html_entity_decode(strip_tags($book['description'])),30);
        }
        return $books;
    }

    private static function sanitizeVolume($volume)
    {
        $book = collect($volume)->first();
        if (isset($book['authors']) && count($book['authors']) > 1){
            $book['multiple_authors'] = true;
        }
        else{
            $book['multiple_authors'] = false;
        }
        if (isset($book['thumbnail'])){
            $book['thumbnail'] = str_replace('http','https',$book['thumbnail']);
        }
        if (isset($book['large-thumbnail'])){
            $book['large-thumbnail'] = str_replace('http','https',$book['large-thumbnail']);
        }
        $book['snippet'] = static::snippet(html_entity_decode(strip_tags($book['description'])),30);

        return $book;
    }

    private static function snippet($text, $limit): string
    {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }


}
