#Personal photoblog

##conf for apache

    <VirtualHost 127.0.0.1:84>
        ServerName grkvnko.me:84
        DocumentRoot "C:/AppServ/www/grkvnko.me"
    </VirtualHost>

##conf for nginx

добавить в секцию server {}

    set $home_path "путь к папке с сайтом";

    root        $home_path;
    index       index.php;

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