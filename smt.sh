#!/bin/bash
for i in {1..254}
do
	OUTPUT=$(nslookup 128.200.166.$i)
	VAL=${OUTPUT#*=}
	VAL=${VAL%"Authoritative answers can be found from:"}
	VAL=${VAL::-3}
	if [[ "$VAL::-5" == *"NXDOM"* ]]; then
		VAL="none"
	fi
	echo "-----------------------------"
	echo "128.200.166.$i ${VAL//[[:blank:]]/}"
done
