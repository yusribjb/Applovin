#!/bin/bash
#Localhost 127.0.0.1
sudo mkdir /var/www/applovin.com
# Block Host Tracking
sudo mkdir /var/www/s2s.adjust.com
sudo mkdir /var/www/0c3-a.tlnk.io
sudo mkdir /var/www/impression.appsflyer.com
sudo mkdir /var/www/track.tenjin.io
sudo mkdir /var/www/imp.control.kochava.com
sudo mkdir /var/www/app.adjust.com
sudo mkdir /var/www/adtrack.appcpi.net
sudo mkdir /var/www/view.adjust.com
sudo chown -R $USER:$USER /var/www/applovin.com
sudo chown -R $USER:$USER /var/www/s2s.adjust.com
sudo chown -R $USER:$USER /var/www/0c3-a.tlnk.io
sudo chown -R $USER:$USER /var/www/impression.appsflyer.com
sudo chown -R $USER:$USER /var/www/track.tenjin.io
sudo chown -R $USER:$USER /var/www/imp.control.kochava.com
sudo chown -R $USER:$USER /var/www/app.adjust.com
sudo chown -R $USER:$USER /var/www/adtrack.appcpi.net
sudo chown -R $USER:$USER /var/www/view.adjust.com
sudo chmod -R 755 /var/www
cd /etc/apache2/sites-available
cat > applovin.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@applovin.com
ServerName applovin.com
ServerAlias www.applovin.com
DocumentRoot /var/www/applovin.com
</VirtualHost>
EOF
cat > s2s.adjust.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@s2s.adjust.com
ServerName s2s.adjust.com
ServerAlias s2s.adjust.com
DocumentRoot /var/www/s2s.adjust.com
</VirtualHost>
EOF
cat > 0c3-a.tlnk.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@0c3-a.tlnk.io
ServerName 0c3-a.tlnk.io
ServerAlias www.0c3-a.tlnk.io
DocumentRoot /var/www/0c3-a.tlnk.io
</VirtualHost>
EOF
cat > impression.appsflyer.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@impression.appsflyer.com
ServerName impression.appsflyer.com
ServerAlias www.impression.appsflyer.com
DocumentRoot /var/www/impression.appsflyer.com
</VirtualHost>
EOF
cat > track.tenjin.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@track.tenjin.io
ServerName track.tenjin.io
ServerAlias www.track.tenjin.io
DocumentRoot /var/www/track.tenjin.io
</VirtualHost>
EOF
cat > imp.control.kochava.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@imp.control.kochava.com
ServerName imp.control.kochava.com
ServerAlias www.imp.control.kochava.com
DocumentRoot /var/www/imp.control.kochava.com
</VirtualHost>
EOF
cat > app.adjust.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@app.adjust.com
ServerName app.adjust.com
ServerAlias www.app.adjust.com
DocumentRoot /var/www/app.adjust.com
</VirtualHost>
EOF
cat > adtrack.appcpi.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@adtrack.appcpi.net
ServerName adtrack.appcpi.net
ServerAlias www.adtrack.appcpi.net
DocumentRoot /var/www/adtrack.appcpi.net
</VirtualHost>
EOF
cat > view.adjust.com.conf <<EOF
<VirtualHost *:80>
ServerAdmin support@adtrack.appcpi.net
ServerName adtrack.appcpi.net
ServerAlias www.adtrack.appcpi.net
DocumentRoot /var/www/adtrack.appcpi.net
</VirtualHost>
EOF
cd /root
sudo a2ensite applovin.conf
sudo a2ensite s2s.adjust.conf
sudo a2ensite 0c3-a.tlnk.conf
sudo a2ensite impression.appsflyer.conf
sudo a2ensite track.tenjin.conf
sudo a2ensite imp.control.kochava.conf
sudo a2ensite app.adjust.conf
sudo a2ensite adtrack.appcpi.conf
sudo a2ensite view.adjust.com.conf
sudo systemctl restart apache2
