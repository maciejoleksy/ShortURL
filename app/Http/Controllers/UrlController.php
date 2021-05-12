<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ShortenerRepositoryInterface;
use App\Http\Requests\StoreRequest;

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

    public function short(StoreRequest $request)
    {
        $url = $this->shortenerRepository->store(
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
        $url = $this->shortenerRepository->link($link);

        return redirect($url);
    }
}
