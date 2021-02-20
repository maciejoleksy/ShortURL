<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Models\UrlShort;

class UrlController extends Controller
{
    public function short(Request $request) {
        $url = UrlShort::whereUrl($request->url)->first();

        if($url == null) {
            $short = $this->generateShortUrl();
            UrlShort::create([
                'url' => $request->url,
                'short' => $short,
            ]);

            $url = UrlShort::whereUrl($request->url)->first();
        }

        return view('url.shorturl', compact('url'));
    }

    public function generateShortUrl() {
        $result = base_convert(rand(1000, 99999), 10, 36);
        $data = UrlShort::whereShort($result)->first();

        if($data != null) {
            $this->generateShortUrl();
        }

        return $result;
    }

    public function shortLink($link) {
        $url = UrlShort::whereShort($link)->first();
        return redirect($url->url);
    }
}
