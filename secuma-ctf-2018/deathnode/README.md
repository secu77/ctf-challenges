# CTF DeathNode (hard)

## Writeup

Podeis encontrar el Writeup completo en el blog de [**Kalrong**](https://blog.kalrong.net/es/2018/11/24/secuma-2018-deathnode-500/), muchas gracias de nuevo por permitirme publicarlo!

<img src="https://blog.kalrong.net/wp-content/uploads/2016/04/banner2-1.png" alt="Banner Blog Kalrong">

## How to build ?

Clone the repository.
`git clone https://gitlab.com/bitupalicante/secuma18`

Move to ronscoffee directory.
`cd web/deathnode`

Check that you have installed **docker** and **docker-compose**.

Build the images.
`docker-compose build`

Up the containers.
`docker-compose up`

To do in daemon mode (no logs) use:
`docker-compose up -d`

To daemonize but save logs.
`nohup docker-compose up &`
`tail -f nohup.out`


## How to check that is running ?

Show current containers running.
`docker-compose ps`

Show current images.
`docker-compose images`


## How to stop and clean the environment ?

Stop all containers of this project.
`docker-compose stop`

Stop all containers and delete the vols.
`docker-compose down -v`
