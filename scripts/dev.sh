#!/bin/bash

# Change to the theme root directory
cd "$(dirname "$0")/.." || exit

case $1 in
  start)
    if docker compose up -d; then
      echo "WordPress is running at http://localhost:8000"
    else
      echo "Failed to start Docker containers"
      exit 1
    fi
    ;;
  stop)
    docker compose down
    ;;
  *)
    echo "Usage: $0 {start|stop}"
    exit 1
    ;;
esac