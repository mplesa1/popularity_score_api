# popularity_score_api

## Prerequisites

Before you begin, ensure you have met the following requirements:

If you are installing project locally make sure that:
* You have installed [composer](https://getcomposer.org/)
* You have installed [php](https://www.php.net/downloads.php) version: >=8.1
* You have installed [postgreSQL](https://www.postgresql.org/)

## Installing the project

To install the project, follow these steps:

Clone project: `git clone ssh://git@github.com:mplesa1/popularity_score_api.git`

Change directory: `cd popularity_score_api`

### Local

Linux, macOS:
```
cp .env.example .env
```
Edit .env file appropriate data. database, app name, etc.
```
composer install
php artisan migrate:fresh --seed
php artisan key:generate
```
Run project
```
php artisan serve
```
### Docker

```
cp .env.example .env
cp docker/.env.example .env
```
Edit .env files if you want to change something, if left untouched it will use default settings

Run docker
```
cd docker
docker compose up 
```
if you want run in background
```
docker-compose up -d
```
Run additional command in container
```
docker exec <php_docker_container> php artisan migrate:fresh --seed
docker exec <php_docker_container> php artisan key:generate
```
php_docker_container is `popularity-score-api-php` by default.

## How does it work

Get all active search providers
```
GET localhost/api/v1/search_providers
Response:
{
    "code": 200,
    "response": {
        "msg": "messages.search_providers",
        "payload": [
            {
                "id": 1,
                "name": "github",
                "created_at": "2023-04-08T23:37:42.000000Z",
                "updated_at": "2023-04-08T23:37:42.000000Z"
            },
            {
                "id": 2,
                "name": "twitter",
                "created_at": "2023-04-08T23:37:42.000000Z",
                "updated_at": "2023-04-08T23:37:42.000000Z"
            }
        ]
    }
}
```
Run search with desired keyword and search provider
```
POST localhost/api/v1/search_results
Request:
{
    "search_provider_id": 1,
    "keyword": "laravel"
}
Response:
{
    "code": 200,
    "response": {
        "msg": "messages.search_results",
        "payload": {
            "id": 1,
            "keyword": "laravel",
            "count": 688724,
            "positive_count": 134,
            "negative_count": 374,
            "score": 0.0019456269855558977,
            "search_provider_id": 1,
            "search_provider": null,
            "created_at": "2023-04-09T01:04:11.000000Z",
            "updated_at": "2023-04-09T01:04:11.000000Z"
        }
    }
}
```
## Contact

If you want to contact me you can reach me at mplesa09@gmail.com.
