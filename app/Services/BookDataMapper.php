<?php

namespace App\Services;

class BookDataMapper
{
    #Maps BooksAPI data to a sanitized and usable representation

    public static function sanitize($arr){
        return collect($arr->getItems())->map(function ($arr){
            return [
                'id' => $arr['id'] ?? null,
                'thumbnail' => $arr['volumeInfo']['imageLinks']['thumbnail'] ?? null,
                'large-thumbnail' => $arr['volumeInfo']['imageLinks']['large'] ?? null,
                'authors' => $arr['volumeInfo']['authors'] ?? null,
                'title' => $arr['volumeInfo']['title'] ?? null,
                'snippet' => $arr['searchInfo']['textSnippet'] ?? null,
                'description' => $arr['volumeInfo']['description'] ?? null,
                'subtitle' => $arr['volumeInfo']['subtitle'] ?? null,
                'isbn_13' => $arr['volumeInfo']['industryIdentifiers'] ?? null,
                'publisher' => $arr['volumeInfo']['publisher'] ?? null,
                'publication_date' => $arr['volumeInfo']['publishedDate'] ?? null,
                'category' => $arr['volumeInfo']['categories'] ?? null,
                'page_count' => $arr['volumeInfo']['pageCount'] ?? null,
                'embeddable' => $arr['accessInfo']['embeddable'] ?? null

            ];
        });
    }
}
