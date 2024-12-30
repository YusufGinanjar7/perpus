<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{

    public function showNews()
    {
        $url = 'https://newsapi.org/v2/top-headlines?apiKey=064383c9fa314fa384fdae200018f03e&category=science';
        $response = Http::withOptions([
            'verify' => 'C:\\laragon\\etc\\ssl\\cacert.pem', // Path to cacert.pem file
        ])->get($url);

        if ($response->successful()) {
            $newsData = $response->json();
            return view('user.news', compact('newsData'));
        } else {
            return view('user.news')->with('error', 'Unable to fetch data.');
        }
        echo ini_get('curl.cainfo');
    }
}
