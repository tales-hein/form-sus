; Zone file for evisitas.api.previa.app
$TTL 14400
evisitas.api.previa.app.      86400     IN      SOA     ns1.tincoa.com.br.    host.tincoa.com.br.    (
                      2019101003 ;Serial Number
                      3600 ;refresh
                      7200 ;retry
                      1209600 ;expire
                      86400 ;minimum
   )
evisitas.api.previa.app.      86400     IN      NS      ns1.tincoa.com.br.
evisitas.api.previa.app.      86400     IN      NS      ns2.tincoa.com.br.
ns1     14400   IN    A 207.38.87.251
ns2     14400   IN    A 209.239.115.17
evisitas.api.previa.app.      14400     IN      A       207.38.87.251
evisitas.api.previa.app.      14400     IN      MX      0   evisitas.api.previa.app.
@ IN  A 207.38.87.251
@ IN  MX  0 evisitas.api.previa.app.
mail    14400   IN    CNAME     evisitas.api.previa.app.
www     14400   IN    CNAME     evisitas.api.previa.app.
ftp     14400   IN    CNAME     evisitas.api.previa.app.
evisitas.api.previa.app.      14400     IN      TXT     "v=spf1 mx ip4:207.38.87.251 ip4:209.239.115.17 mx:evisitas.api.previa.app -all"



zone "evisitas.api.previa.app" {
  type master;
  file "/etc/bind/db/db.evisitas.api.previa.app";
};



include "/etc/bind/zone/zone.evisitas.api.previa.app";



<VirtualHost *:80>
  ServerAdmin webmaster@localhost
  ServerName evisitas.api.previa.app
  DocumentRoot /var/www/dev/conasems/front-mais.conasems
</VirtualHost>

service bind9 restart

cd /etc/apache2/sites-available
a2ensite evisitas.api.previa.app.conf
service apache2 restart

certbot --apache -d evisitas.api.previa.app

<IfModule mod_ssl.c>
<VirtualHost *:443>
  ServerAdmin webmaster@localhost
  ServerName evisitas.api.previa.app
  DocumentRoot /var/www/dev/conasems/front-mais.conasems
SSLCertificateFile /etc/letsencrypt/live/evisitas.api.previa.app/fullchain.pem
SSLCertificateKeyFile /etc/letsencrypt/live/evisitas.api.previa.app/privkey.pem
Include /etc/letsencrypt/options-ssl-apache.conf

ProxyPass / http://127.0.0.1:8401/
ProxyPassReverse / http://127.0.0.1:8401/

</VirtualHost>
</IfModule>


service apache2 restart