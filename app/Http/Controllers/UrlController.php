<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ShortenerRepositoryInterface;
use App\Models\UrlShort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UrlController extends Controller
{
    private $shortenerRepository;

    public function __construct(
        ShortenerRepositoryInterface $shortenerRepository
    ) {
        $this->shortenerRepository = $shortenerRepository;
    }

    public function index()
    {
        return view('url.short');
    }

    public function short(Request $request)
    {
        $url = $this->shortenerRepository->firstOrCreate(
            $request->only(
                'longUrl',
                'shortUrl'
            )
        );

        return view('url.shorturl', [
            'url' => $url,
        ]);
    }

    public function shortLink($link)
    {
        $url = UrlShort::where('short', $link)->first();

        if (!preg_match("~^(?:f|ht)tps?://~i", $url->url)) {
            $url = "http://" . $url->url;

            return redirect($url);
        }

        return redirect($url->url);
    }
}
