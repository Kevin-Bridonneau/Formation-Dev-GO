#!/bin/bash

if [ -z $1 ] || [ -z $2 ] || [ -z $3 ]
then
    echo "error missing argument"
    
else
    sed -i -e "s/$2/$3/g" $1
fi
