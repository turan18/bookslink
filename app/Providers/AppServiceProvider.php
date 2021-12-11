<?php

namespace App\Providers;

use App\Services\BookCollector;
use Google\Client;
use Google\Service\Books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        #Binding BookCollection instantiation by passing in GoogleBooksClient
        $this->app->bind(BookCollector::class,function(){
            $client = new Client();
            $client->setApplicationName("Bookslink");
            $client->setDeveloperKey(config('bookslink.key'));
            return new BookCollector(new Books($client));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useTailwind();
        Model::unguard();
    }
}
