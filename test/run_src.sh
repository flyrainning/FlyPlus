#!/bin/bash

sudo docker-compose -f "./docker/run_src.yml" up
sudo docker-compose -f "./docker/run_src.yml" rm -f
