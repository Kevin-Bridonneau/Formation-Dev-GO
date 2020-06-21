#!/bin/bash
for i in `seq 1 $1`;
do
    if [ ! -d ex_0${i} ]
    then
	if [ ${i} -lt 10 ]
	then
	    mkdir ex_0${i}
	else
	    mkdir ex_${i}
	fi
    fi
done
