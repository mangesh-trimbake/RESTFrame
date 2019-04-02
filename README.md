# RESTFrame
Web framework to create REST API 
## enable use of .htaccess in Apache on Ubuntu
Open file as
```
sudo vim /etc/apache2/apache2.conf
```
remove comment sign (#) if you find it before this line ( line number 187 approx.)
```
AccessFileName .htaccess
```

Then find the line where there is
```
<Directory /var/www/>
	 Options Indexes FollowSymLinks
	 AllowOverride None
	 Require all granted
</Directory>
```
replace "None" with "All"
```
AllowOverride All
```
Activate ModRewrite
```
sudo a2enmod rewrite
service apache2 restart
```


	
	
	
