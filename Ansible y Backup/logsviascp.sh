#!/bin/bash

#Nestor nuñez gang

serverdelogs="192.168.0.108"
user="master"
pass="1234"
puertodescp="6161"
servidor="slave"
date=$(date +%Y_%m_%d_%H_%M)

mkdir logs; cd logs

tar -cvzf $servidor.secure_$date.tar.gz -C /var/log/ secure
tar -cvzf $servidor.messages_$date.tar.gz -C /var/log/ messages

sshpass -p "'$pass'" scp -P $puertodescp $servidor.secure_$date.tar.gz $user@$serverdelogs:/home/$user/logs/
sshpass -p "'$pass'" scp -P $puertodescp $servidor.messages_$date.tar.gz $user@$serverdelogs:/home/$user/logs/


rm -rf ../logs