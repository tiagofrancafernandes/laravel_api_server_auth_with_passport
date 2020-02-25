##To resolve 

#Key path "file:///app/storage/oauth-public.key" does not exist or is not readable
php artisan passport:keys

#Personal access client not found. Please create one.
php artisan passport:install

#Permissions
sudo chmod 777 -R storage/ database/ storage/

#Se usar SQLite
touch /app/database/database.sqlite

#SQLITE Comand line simple
sqlite3 --list /ongoing/laravel_api_server_auth_with_passport/database/database.sqlite "select count(*) from users;"
sqlite3 --list $(pwd)/database/database.sqlite "select count(*) from users;"

#Gmail Apps
https://support.google.com/accounts/answer/185833?hl=pt
https://myaccount.google.com/apppasswords
