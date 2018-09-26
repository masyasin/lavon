cd /var/www/html/lavon
echo "DELETING LOG FILES"

rm -v app/logs/*.log

echo "DELETING CACHE FILES"

rm -f app/cache/*

echo "MKDIR app/cache/{assets,cooke,query}"

mkdir app/cache/assets
mkdir app/cache/cookie
mkdir app/cache/query

rm -f app/cache/assets/*
rm -f app/cache/cookie/*
rm -f app/cache/query/*

chmod -R 0777 app/cache
chmod -R 0777 app/cache/*

bash bin/pull
bash bin/seed