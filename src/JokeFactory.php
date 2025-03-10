<?php

namespace Kevinb1989\ChuckNorrisJokes;

use GuzzleHttp\Client;

class JokeFactory
{
    const API_ENDPOINT = 'https://api.chucknorris.io/jokes/random';

    protected $jokes = [
        "Chuck Norris doesn't read books. He stares them down until he gets the information he wants.",
        'Time waits for no man. Unless that man is Chuck Norris.',
        'If you spell Chuck Norris in Scrabble, you win. Forever.',
    ];

    protected Client $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function getRandomJoke(): string
    {
        $response = $this->client->get(self::API_ENDPOINT);

        $content = json_decode($response->getBody()->getContents());

        return $content->value;
    }
}
