#!/bin/bash

#set solr user to cores (only linux dist)
if [ "$(uname)" = "Linux" ]; then
	echo "$(uname)"
	sudo chown -R 8983 ./.simoa/.solr
fi

if [ "$(uname)" = "Darwin" ]; then
	#for mac users
	echo "$(uname)"
	docker-compose -f docker-compose.yml -f docker-compose.mac.yml up -d --build
else
	#start docker containers in background
	echo "$(uname)"
	docker-compose up -d --build
fi
