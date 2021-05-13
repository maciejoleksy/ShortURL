<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ShortenerRepositoryInterface;
use App\Http\Requests\StoreRequest;

class LinkController extends Controller
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

    public function store(StoreRequest $request)
    {
        $link = $this->shortenerRepository->store(
            $request->only(
                'longUrl',
                'shortUrl'
            )
        );

        return view('url.shorturl', [
            'link' => $link,
        ]);
    }

    public function getLinkByShortName(string $shortName)
    {
        $longLink = $this->shortenerRepository->getLinkByShortName($shortName);

        return redirect($longLink);
    }
}
