
##Настройки для создания единой точки входа на сайт и запрета доступа к php файлам

###config for apache

файл .htaccess корневой директории

    Options -Indexes
    ErrorDocument 404 /
    ErrorDocument 403 /
    RewriteEngine On

    RewriteBase /

    RewriteCond %{REQUEST_URI} !(^(.*\.png|.*\.jpg|.*\.css|.*\.js|.*\.ico)$) [NC]
    RewriteRule . index.php [NC,L]


настройка виртуального хоста

    <VirtualHost 127.0.0.1:84>
        ServerName grkvnko.me:84
        DocumentRoot "путь к папке с сайтом"
    </VirtualHost>


###config for nginx

добавить в кофиг nginx'а в секцию server {}

    set $home_path "путь к папке с сайтом";

    root        $home_path;
    index       index.php;

    error_page 403 403 /;

    location ~ \.(gif|jpg|png|js|css)$ {
        root $home_path;
        break;
    }

    location / {
        try_files $uri $uri/ /index.php;
    }

    location ~ /(app|config)/* {
        root $home_path;
        deny all;
        break;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9123;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }