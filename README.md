VAGRANT
-------------
Vagrant file:

```php
Vagrant.configure("2") do |config|
	config.vm.box = "ubuntu/trusty32"

	# config.ssh.username = "vagrant"
	# config.ssh.password = "vagrant"
	# config.ssh.insert_key = "true"

	config.vm.provision "shell", path: ".provision/provision.bat"
	config.vm.network "private_network", ip: "192.168.33.10"
	config.vm.synced_folder ".", "/home/vagrant",
		type: "virtualbox",
		user: "www-data",
		group: "www-data"
end
```

NGINIX
-------------
Nginix file:

```php
# creditstar.com
server{
	listen 80;
	server_name creditstar.com www.creditstar.com ;
	root /home/vagrant/creditstar.com/;
	index index.php index.html index.htm;
	
	location / {
        try_files $uri $uri/ /index.php?$args;
    }
	location ~ \.php$ {
		try_files $uri = 404;
		fastcgi_split_path_info ^(.+\.php)(/.+)$;
		fastcgi_pass unix:/var/run/php5-fpm.sock;
		fastcgi_index index.php;
		include fastcgi_params;
		include /etc/nginx/mime.types;
		fastcgi_read_timeout 200;
	}
}
```

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
