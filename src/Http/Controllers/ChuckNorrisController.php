<?php

namespace Kevinb1989\ChuckNorrisJokes\Http\Controllers;

use Kevinb1989\ChuckNorrisJokes\Facades\ChuckNorris;

class ChuckNorrisController
{
    public function __invoke()
    {
        return ChuckNorris::getRandomJoke();
    }
}