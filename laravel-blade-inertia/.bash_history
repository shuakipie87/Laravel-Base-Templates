mkdir -p bootstrap/cache
chmod -R 777 bootstrap/cache
chmod -R 777 storage
exit
mkdir -p bootstrap/cache
chmod -R 777 bootstrap/cache
chmod -R 777 storage
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan storage:link
exit
eixt
exit
r
sudo chown -R $USER:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
exit
ps aux | grep php
docker compose logs nginx --tail=50
docker compose restart nginx
exit
chmod -R 775 /var/www/storage
chmod -R 775 /var/www/bootstrap/cache
sudo chmod -R 775 /var/www/storage
exit
