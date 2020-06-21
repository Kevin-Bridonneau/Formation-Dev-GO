#!/bin/bash

if [ -z $1 ]
then
    echo "error missing 1st argument"
    
else
    wc -w $1
fi
