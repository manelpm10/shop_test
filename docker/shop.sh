#!/usr/bin/env bash

FILE='shop.yml';

case "$1" in
    start)
        docker-compose -f $FILE start
        ;;
    stop)
        docker-compose -f $FILE stop
        ;;
    init)
        docker-compose -f $FILE up -d
        ;;
    status)
        docker-compose -f $FILE ps
        ;;
    destroy)
        docker-compose -f $FILE stop
        docker-compose -f $FILE rm
        ;;
    update)
        docker-compose -f $FILE stop
        docker-compose -f $FILE build
        docker-compose -f $FILE up -d
        ;;
    *)
        echo "Usage: ./shop.sh {start|stop|init|status|destroy|update}"
        exit 1
        ;;
esac