#!/bin/bash

#start server
httpd

count=1
while true
do
 echo "WebApp Alive ... `echo $count`"
 count=`expr $count + 1`
 sleep 5
done