## Развертка
- склонируйте репозиторий

В корневой папке проекта выполните:

- docker-compose up --no-start
- docker-compose start
- docker-compose exec main go-www
- wp core download --locale=ru_RU
- mysql -h db -u root -p1234 -e "create database wordpress";
- wp config create --dbhost=db --dbname=wordpress --dbuser=root --dbpass=1234 --locale=ru_RU --force
- wp db import dump/db.sql

По адресу http://localhot должен стать доступен сайт. Вход в админку root/zaq12wsx

## Для сборки стилей и скриптов
В корневой папке проекта выполните:

- docker-compose exec main go-www
- cd wp-content/themes/testestate/src
- npm install
- npm run build