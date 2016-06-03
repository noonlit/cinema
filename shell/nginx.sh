#!/bin/bash

installed=$(dpkg -l | grep nginx | grep 1.8 | wc -l)

if [ $installed = 0 ]; then
    sudo -s
    nginx=stable # use nginx=development for latest development version
    add-apt-repository ppa:nginx/$nginx
    apt-get update
    apt-get install -q -y nginx
fi