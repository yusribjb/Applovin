#!/bin/bash
# UPDATE UBUNTU
sudo apt-get update -y
sudo apt-get upgrade -y
# MENGHAPUS DATA
rm -rf /opt/firefox
rm -rf /root/virtualhost.sh
rm -rf /etc/hosts
rm -rf /var/www/applovin.com/index.php
rm -rf /root/.mozilla
# MEMBUAT VIRTUAL HOST
wget -q https://raw.githubusercontent.com/eyuswap/applovin/master/virtualhost.sh -O /root/virtualhost.sh
chmod +x /root/virtualhost.sh
/root/virtualhost.sh
# DOWNLOAD HOST, SCRIPT PHP, DAN PROFILE FIREFOX
wget -q https://raw.githubusercontent.com/eyuswap/applovin/master/hosts -O /etc/hosts
wget -q https://raw.githubusercontent.com/eyuswap/applovin/master/index.php -O /var/www/applovin.com/index.php
wget -q https://ftp.mozilla.org/pub/firefox/releases/56.0/linux-x86_64/en-US/firefox-56.0.tar.bz2 -O /opt/firefox.tar.bz2
wget -q https://raw.githubusercontent.com/eyuswap/applovin/master/profiles.tar.gz -O /root/profiles.tar.gz
# EXTRACT FIREFOX
cd /opt
tar -jxvf firefox.tar.bz2
rm -rf /opt/firefox.tar.bz2
sudo mv /usr/bin/firefox /usr/bin/firefox-backup
sudo ln -s /opt/firefox/firefox /usr/bin/firefox
# EXTRACT DATA PROFILE
cd /root
tar xvf profiles.tar.gz
rm -rf /root/profiles.tar.gz
# UPDATE CRONTAB
touch /var/spool/cron/root
/usr/bin/crontab /var/spool/cron/root
crontab -l | { cat; echo "@reboot /root/run.sh && sleep $(((RANDOM%10800)+10)) && screen -d -m -S FF firefox -headless && sleep $(((RANDOM%3600)+120)) && /sbin/shutdown -r now"; } | crontab -
/etc/init.d/cron restart
/etc/init.d/cron start
# SELESAI
