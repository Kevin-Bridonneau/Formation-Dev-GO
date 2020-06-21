#!/bin/bash

if [ -z $1 ]
then
    echo "error missing argument"
    
else
    cat $1
fi

