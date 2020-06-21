#!/bin/bash

if [ -z $1 ]
then
    echo "Error."
else
    getent passwd $1 > /dev/null 2&>1

    if [ $? -eq 0 ]
    then
	sed -n -e "/`echo $1`/s/[^:]*:[^:]*:[^:]*:[^:]*:[^:]*:\([^:]*\):\([^:]*\)/Home Directory: \1\nDefault Shell: \2/p" /etc/passwd
    else
	echo "Error."
    fi
    rm 1
fi






