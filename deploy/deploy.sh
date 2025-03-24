#!/usr/bin/env bash
INTER="php"

git fetch
git reset --hard origin/master
composer-php8.1 update
cd web/app/themes/sage
composer-php8.1 update

ssh localhost . ~/test/deploy/build.sh