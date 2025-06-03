<?php 

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class WeatherService
{
      protected $apiKey;
    protected $apiUrl;
    protected $cacheMinutes;

    public function __construct()
    {
        $this->apiKey = config('weather.api_key');
        $this->apiUrl = config('weather.api_url');
        $this->cacheMinutes = config('weather.cache_minutes');
    }

  public function getWeather(string $city): array
{
    $cacheKey = "weather_{$city}";

    return Cache::remember($cacheKey, now()->addMinutes($this->cacheMinutes), function () use ($city) {
        $response = Http::get($this->apiUrl, [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        if (!$response->successful()) {
            return ['error' => 'Failed to fetch weather data.'];
        }

        $data = $response->json();

        return [
            'city'        => $data['name'] ?? $city,
            'country'     => $data['sys']['country'] ?? '',
            'temp'        => $data['main']['temp'] ?? null,
            'feels_like'  => $data['main']['feels_like'] ?? null,
            'humidity'    => $data['main']['humidity'] ?? null,
            'description' => $data['weather'][0]['description'] ?? '',
            'icon'        => $data['weather'][0]['icon'] ?? '',
        ];
    });
}
}