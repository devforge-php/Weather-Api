# Laravel Weather API Service 🌤️

This is a high-performance weather API service built with Laravel. It integrates with the [OpenWeatherMap API](https://openweathermap.org/) to provide accurate weather data in JSON format.

## 🚀 Features

- 🌐 Integration with OpenWeatherMap API
- ⚡ High speed using Laravel Octane
- 🔁 Singleton service container for optimized memory usage
- 🧠 Caching weather data with Redis
- 🛠️ Configurable through `.env` and `config/` files
- 🧩 Built using Laravel Service Container and Service Providers
- 📦 Clean and modular code architecture

## 📦 Technologies Used

- Laravel
- Laravel Octane (for performance)
- Redis (for caching)
- OpenWeatherMap API

## 📁 Project Structure Highlights

- `app/Services/WeatherService.php` – handles external API calls
- `app/Providers/WeatherServiceProvider.php` – binds the service to the container
- `routes/api.php` – exposes the API endpoint(s)
- `config/weather.php` – stores weather-related config values
- `.env` – for storing secret keys and environment configs

## 🔧 Setup Instructions

1. Clone the repo:
   ```bash
   git clone https://github.com/devforge-php/Weather-Api.git
