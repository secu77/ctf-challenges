# CTF Rons Coffee (easy)

## Integrity Writeup PDF.

> SHA256: 	37d4b58ba12a1c6788142e80fecaab69cc311991aeaa57ea3d9a2a19cac24ea9<br>
  Nombre: 	Writeup.pdf<br>
  Detecciones: 	0 / 58<br>
  Fecha de análisis: 	2018-11-26 15:15:58 UTC <br>

Check Virus Total [**Report**](https://www.virustotal.com/es/file/37d4b58ba12a1c6788142e80fecaab69cc311991aeaa57ea3d9a2a19cac24ea9/analysis/1543245358/)


## How to build ?

Clone the repository.
`git clone https://gitlab.com/bitupalicante/secuma18`

Move to ronscoffee directory.
`cd web/ronscoffee`

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
