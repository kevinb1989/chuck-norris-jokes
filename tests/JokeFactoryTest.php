<?php

namespace Kevinb1989\ChuckNorrisJokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Kevinb1989\ChuckNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    public function test_it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['Content-Type' => 'application/json'],
                json_encode([
                    'categories' => [],
                    'created_at' => '2020-01-05 13:42:19.576875',
                    'icon_url' => 'https://api.chucknorris.io/img/avatar/chuck-norris.png',
                    'id' => '7Po2MPWaTdCoRD0eD8g6TQ',
                    'updated_at' => '2020-01-05 13:42:19.576875',
                    'url' => 'https://api.chucknorris.io/jokes/7Po2MPWaTdCoRD0eD8g6TQ',
                    'value' => 'Chuck Norris urinates while doing a hand-stand on the toilet seat.',
                ]),
            )
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(compact('handler'));

        $jokes = new JokeFactory($client);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('Chuck Norris urinates while doing a hand-stand on the toilet seat.', $joke);
    }
}
