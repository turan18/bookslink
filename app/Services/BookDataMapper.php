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
                'volume_id' => $arr['id'] ?? null,
                'thumbnail' => $arr['volumeInfo']['imageLinks']['thumbnail'] ?? null,
                'large-thumbnail' => $arr['volumeInfo']['imageLinks']['large'] ?? null,
                'authors' => $arr['volumeInfo']['authors'] ?? null,
                'title' => $arr['volumeInfo']['title'] ?? null,
                'description' => $arr['volumeInfo']['description'] ?? null,
                'subtitle' => $arr['volumeInfo']['subtitle'] ?? null,

            ]);
        });
        if(count($arr) == 0){
            return [];
        }
        return static::sanitizeVolumes(static::$volumes);
    }



    public static function forSingleVolumeKeys($arr): array
    {
        static::$volume[] = ([
            'volume_id' => $arr['id'] ?? null,
            'thumbnail' => $arr['volumeInfo']['imageLinks']['thumbnail'] ?? null,
            'large-thumbnail' => $arr['volumeInfo']['imageLinks']['large'] ?? null,
            'authors' => $arr['volumeInfo']['authors'] ?? null,
            'title' => $arr['volumeInfo']['title'] ?? null,
            'description' => strip_tags($arr['volumeInfo']['description']) ?? null,
            'subtitle' => $arr['volumeInfo']['subtitle'] ?? null,
            'isbn_13' => $arr['volumeInfo']['industryIdentifiers'][1]['identifier'] ?? null,
            'publisher' => $arr['volumeInfo']['publisher'] ?? null,
            'publication_date' => $arr['volumeInfo']['publishedDate'] ?? null,
            'categories' => $arr['volumeInfo']['categories'] ?? null,
            'page_count' => $arr['volumeInfo']['pageCount'] ?? null,
            'embeddable' => $arr['accessInfo']['embeddable'] ?? null,
            'link' => $arr['volumeInfo']['previewLink'] ?? null
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
            $book['description'] = html_entity_decode(strip_tags($book['description']));
            $book['thumbnail'] = str_replace('http','https',$book['thumbnail']);
            $book['snippet'] = static::snippet(html_entity_decode(strip_tags($book['description'])),30);
        }
        return $books;
    }

    private static function sanitizeVolume($volume)
    {
        $book_collection = collect(collect($volume)->first());

        if (isset($book_collection['thumbnail'])){
            $book_collection['thumbnail'] = str_replace('http','https',$book_collection['thumbnail']);
        }

        if (isset($book_collection['large-thumbnail'])){
            $book_collection['large-thumbnail'] = str_replace('http','https',$book_collection['large-thumbnail']);
        }
        $book_collection['description'] = html_entity_decode(strip_tags($book_collection['description']));
        $book_collection['snippet'] = static::snippet(html_entity_decode(strip_tags($book_collection['description'])),30);

        if(isset($book_collection['categories'])){
            $categories = explode('/',implode('',$book_collection['categories']));
            $book_collection['categories'] = implode('|',array_slice($categories, 0, 3));
        }
        if(isset($book_collection['authors'])){
            $authors = implode(',',$book_collection['authors']);
            $book_collection['authors'] = $authors;
        }
        return $book_collection->toArray();
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
