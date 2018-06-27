# Football API

## Revisions

// Each time someone works on the project and is required to update the readme please update revisions so the next person can see when last it was updated.

Name           | Date       | Revision
---------------|------------|----------
 Name          | 27/05=6/2018 | 1.0

Displaying the result set from the API for the markets

## !Important

This is a demo of the API market on Task 1

## Getting Started

Pull the project from the git repo, in this case Laravel 5.6. Run composer in the command line to do the installation

### Prerequisites

PHP version 7.1.3 or higher
Unix OS
Apache/Nginx

### Installing

A step by step series of examples that tell you how to get a development env running

Git pull
```
git clone https://github.com/pieter365/football-api.git
```

Create your working branch

```
git branch -b football-api/Football
```

Edit config files in /website/.env

```
APP_NAME=Football
APP_ENV=local
APP_KEY=base64:SPuwbZiKihEGX8dGM4VBJ4LFhIJGBDieYEtst5Jvlas=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://live.test

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

FOOTBALL_API=http://192.168.33.10:8888/

```

To create a new APP_KEY for the project to run on your local, follow these instrauctions:
http://laravel-recipes.com/recipes/283/generating-a-new-application-key

FOOTBALL_API - this value depends on the URL that is hosting the API

## Acknowledgments

// Any final tips

* Hat tip to anyone whose code was used


