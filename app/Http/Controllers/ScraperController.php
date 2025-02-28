<?php

namespace App\Http\Controllers;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function scrape()
    {
        $client = new HttpBrowser(HttpClient::create());
        $crawler = $client->request('GET', 'https://gamewith.jp/pokemon-tcg-pocket/462535');

        // ページのタイトルを取得
        $title = $crawler->filter('title')->text();

        return "ページのタイトル: " . $title;
    }
}
