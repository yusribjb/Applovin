#!/bin/bash
#UPDATE UBUNTU,VIRTUAL HOST, CRONTAB, FIREFOX DAN PROFILE, SCRIPT PHP, HOST DAN PROXY
wget -q https://raw.githubusercontent.com/eyuswap/applovin/master/update.sh -O /root/update.sh
chmod +x /root/update.sh
/root/update.sh
