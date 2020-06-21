#!/bin/bash

if [ -z $1 ]
then
   echo "No commit message, no add and no push."
else
    array=($@)

    for index in ${!array[*]}
    do
	if  [ ! $index = 0 ];
	then
      	    git add ${array[$index]}

	fi
    done

    for index in ${!array[*]}
    do
	if  [  $index = 0 ];
	then
      	    git commit -m "${array[$index]}"

	fi
    done
    git push

fi
