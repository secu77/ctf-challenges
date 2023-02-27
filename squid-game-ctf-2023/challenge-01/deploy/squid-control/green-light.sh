#!/bin/bash

cwd=/opt/squid-control
cd $cwd

CONF_FILE="squid.conf"
if [ ! -f "$CONF_FILE" ]; then
  echo "[!] File $CONF_FILE not exists"
  exit 1
fi

ORIG_PATH=$(awk -F "=" '/ORIG_PATH/ {print $2}' $CONF_FILE)
DEST_PATH=$(awk -F "=" '/DEST_PATH/ {print $2}' $CONF_FILE)
TAR_BIN=$(awk -F "=" '/TAR_BIN/ {print $2}' $CONF_FILE)
ROTATE_AFTER=$(awk -F "=" '/ROTATE_AFTER/ {print $2}' $CONF_FILE)

cd $DEST_PATH
find . -type f -maxdepth 1 -mmin +$ROTATE_AFTER -delete
sleep 2
cd $ORIG_PATH
CURR_NAME=$(date +"%Y_%m_%d_%I_%M")
$TAR_BIN -czvf $DEST_PATH/$CURR_NAME.tar.gz * >/dev/null
cd $cwd
sleep 2
