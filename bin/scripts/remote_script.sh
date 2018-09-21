cd /var/www/html/lavon
echo "DELETING LOG FILES"

rm -v app/logs/*.log

echo "DELETING CACHE FILES"

rm -f app/cache/*
rm -f app/cache/assets/*
rm -f app/cache/cookie/*
rm -f app/cache/query/*

git pull