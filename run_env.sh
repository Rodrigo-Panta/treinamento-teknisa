#!/bin/bash
#This is a Shell script for running the sample project created during the Teknisa Internship Training 
([ -d './laravel/teknisa-dev-api' ] && [ -d './vue/teste_teknisa' ]) || ( echo "Please run this script in a directory containing both vue and laravel projects" && exit 1) 

cd './laravel/teknisa-dev-api'
php artisan serve > /dev/null 2>&1 &
cd ../../vue/teste_teknisa
npm run dev > /dev/null 2>&1 &  
cd ../..

echo 'Your aplication is likely to be running in  http://localhost:2550'

select a in "Sair" 
do 
    if [ $a == "Sair" ] 
    then
        killall node*
        killall php*
        echo 'Bye!'
        exit 0;
    fi
done