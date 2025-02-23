<?php

namespace Kevinb1989\ChuckNorrisJokes\Tests;

use Kevinb1989\ChuckNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    public function test_it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke'
        ]);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    public function test_it_returns_a_predefined_joke()
    {
        $jokes = new JokeFactory();
        $joke = $jokes->getRandomJoke();

        $this->assertNotEmpty($joke);
    }
}