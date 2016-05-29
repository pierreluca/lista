<?php

/*
|--------------------------------------------------------------------------
| Set Environment Variables
|--------------------------------------------------------------------------
|
| Split the Heroku-provided environment variables into the individual
| pieces that Laravel expects.
|
*/

if ($db_url = getenv('DATABASE_URL')) {
    if (parse_url($db_url, PHP_URL_SCHEME) == 'postgres') {
        putenv('DB_CONNECTION=' . 'pgsql');
    }

    putenv('DB_USERNAME=' . parse_url($db_url, PHP_URL_USER));
    putenv('DB_PASSWORD=' . parse_url($db_url, PHP_URL_PASS));
    putenv('DB_HOST=' . parse_url($db_url, PHP_URL_HOST));
    putenv('DB_PORT=' . parse_url($db_url, PHP_URL_PORT));
    putenv('DB_DATABASE=' . ltrim(parse_url($db_url, PHP_URL_PATH), '/'));
}

if ($redis_url = getenv('REDIS_URL')) {
    putenv('REDIS_USERNAME=' . parse_url($redis_url, PHP_URL_USER));
    putenv('REDIS_PASSWORD=' . parse_url($redis_url, PHP_URL_PASS));
    putenv('REDIS_HOST=' . parse_url($redis_url, PHP_URL_HOST));
    putenv('REDIS_PORT=' . parse_url($redis_url, PHP_URL_PORT));
}
