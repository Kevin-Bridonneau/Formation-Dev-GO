#!/bin/bash

if [ -z $1 ]
then
    echo "error missing 1st argument"
    
else
    user='kevin.bridonneau@epitech.eu'
    blih -u $user repository create $1
    blih -u $user repository setacl $1 ramassage-tek r
    blih -u $user repository setacl $1 gecko r
    git clone git@git.epitech.eu:/$user/$1
fi
