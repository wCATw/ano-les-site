#!/usr/bin/env bash
INTER="php"

git fetch
git reset --hard master
git pull
composer update
cd web/app/themes/sage
composer update

. ~/test/deploy/build.sh