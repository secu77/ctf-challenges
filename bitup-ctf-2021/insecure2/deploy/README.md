# Deploy

First, note that you can make the following changes to the challenge:

- You can change the challenge flag in the "docker-compose.yml" file following "FLAG".
- You can change the port to bind to in the "docker-compose.yml" file after "ports".

Build the container with:

`sudo docker-compose build`

Deploy the container with:

`sudo docker-compose up -d`

To verify that the challenge is working, you can do it with simple HTTP GET request using cURL:

`curl http://localhost:8181/`

And you should get a result like the following:

`Hello, friend. You maybe try something different than '/'`

You can also check the container logs with:

`sudo docker-compose logs -f`