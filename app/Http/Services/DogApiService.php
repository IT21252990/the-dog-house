<?php

namespace App\Http\Services;


use Illuminate\Support\Facades\Http;


class DogApiService {

private string $baseUrl = 'https://dog.ceo/api';


public function getBreeds(): array {

return Http::get("{$this->baseUrl}/breeds/list/all")->json('message');

}


public function randomImage(?string $breed = null): string {

$endpoint = $breed
? "{$this->baseUrl}/breed/{$breed}/images/random"
: "{$this->baseUrl}/breeds/image/random";


return Http::get($endpoint)->json('message');

}

}