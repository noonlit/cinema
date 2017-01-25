#!/usr/bin/env bash

cp ./.env.dist ./.env
cp ./config/config.php.dist ./config/config.php

php ./composer.phar install
docker-compose up -d

#wait for the mysql container to start
sleep 5

cat ./sqlScripts/cinemaScriptCreate.sql | docker exec -i cinema_mysql_cinema_1 mysql -uroot -proot cinemadatabase
cat ./sqlScripts/cinemaPopulateDatabase.sql | docker exec -i cinema_mysql_cinema_1 mysql -uroot -proot cinemadatabase

