# spiky_pollution

### Laravel solution (required)

#### pre-requisites: [sail](https://laravel.com/docs/10.x/sail)

#### local setup
```bash
cd laravel
cp ./example.env .env
sail build
sail up -d
sail composer install
sail yarn
sail yarn build
sail artisan migrate
sail artisan db:seed
```
..use `sail stop` to stop the sail services

### Alternative solution (Atk4)

```bash
cd atk4
docker compose up -d
docker compose exec -it web composer install
docker compose exec -it web ./vendor/bin/phinx migrate
docker compose exec -it web ./vendor/bin/phinx seed:run
```
..use `docker compose down` to stop the docker containers
