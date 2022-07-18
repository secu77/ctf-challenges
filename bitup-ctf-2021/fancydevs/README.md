# FancyDevs

## Index

[[_TOC_]]

## Points

* Difficulty: Medium-Hard
* Maximum Score `500`
* Minimum Score `50`
* Decadence `15`

## Hints

None

## Flag

`bitup21{c6ad18768ca224cbc2eb7c5bbeac8aa8}`

## Attachments

None

## Deploy

Click [here](deploy) to see how to deploy the challenge with Docker. 

## Requirements

**Docker** is required to deploy the challenge.

## Description

![](images/description.jpg)

Make it worse, make it in PHP - FancyDevs

## Writeup

First, we start by visiting the website that comes in the description of the challenge. We can see a home page without any functionality.

![](images/1.png)

Next, if we check the "robots.txt" endpoint, we can see that there are **two** endpoints that are being hidden from automated indexing tools.

![](images/2.png)

If we visit the "/flag.php" endpoint, we can see a message suggesting that we need to increase our privileges to see the flag.

![](images/3.png)

If we inspect the response code (as verification), we can see the line "echo getenv('FLAG')" which suggests that the flag is in an environment variable.

![](images/4.png)

If we visit the other endpoint, "/admin.php", we can see a section where different functionalities seem to be available.

![](images/5.png)

Some of them are: uploading files, checking website and checking if a file exists. The rest seem to be disabled.

![](images/6.png)
![](images/7.png)
![](images/8.png)

If we proceed to upload a file, the website tells us in which path it has been uploaded.

![](images/9.png)

We can check that it has been uploaded into the "uploads" folder.

![](images/10.png)

But if we try to exploit this functionality to try to get an Arbitrary File Upload (AFU), we will get that it only allows to upload "jpg", "jpeg" and "png" files. Therefore we explore the other functionalities. The one to check the web seems to return the content of the HTTP response.

![](images/11.png)

If we try to use the PHP wrapper "file://", to try to read a file from the system, we can observe how we discover an Arbitrary File Read (AFR) vulnerability by obtaining the content of the /etc/passwd file.

![](images/12.png)

Taking advantage of this vulnerability, we proceed to read the file "flag.php" but, in fact, we verify that the flag has to be found in an environment variable.

![](images/13.png)

We continue reading the backend files to try to get an idea of how the web application is designed.

![](images/14.png)

In doing so, we can see the 3 functionalities that are implemented, and the functions that are called. After analysing the code we can validate that, the Arbitrary File Upload is a Rabbit Hole, because the file upload does not allow uploading files that can be executed, in the same way it is not possible to combine the file upload together with the arbitrary file read to get RCE.

![](images/15.png)
![](images/16.png)

Now, if you inspect the function that handles the HTTP request that is invoked with the "Check Website" functionality, you can see that the URL parameter is passed directly to the cURL. This means that, in addition to the Arbitrary File Read, you can try to exploit a Server Side Request Forgery (SSRF).

![](images/17.png)

But, there is a small check that verifies that a request is not made to localhost, what it basically does is to get the domain and make a resolution, if that domain points to localhost, it does not make the request.

![](images/18.png)

However, this check does not mitigate the vulnerability completely, because... you can see that when the request is made with cURL there is a parameter that will allow us to exploit the SSRF, and this is the "CURLOPT_FOLLOWLOCATION => TRUE". By specifying this option to cURL, what it allows us to do is to raise an HTTP server on an external server and tell it, when it receives an HTTP request, to return a 302 response code to the URL we are interested in (in this case localhost).

In this way, the DNS resolution does not point to localhost, but the request makes a follow redirect and will end up making the request to the URL that we control.

![](images/19.png)
![](images/20.png)

Once the vulnerability has been validated, the HTTP request is passed to an intermediate proxy such as BurpSuite in order to be able to handle the requests more comfortably. Try making several requests to internal services and observe the responses you get. For this, we will use a small redirector like the following one:

![](images/21.png)

To automate this task, pass the request to Intrude and fuzz the list of ports. After several attempts, you can see that there do not seem to be any open ports, however, this is not entirely true, because if you show the time that each request takes, you can see that there is a known port whose response takes much longer than the rest. This is port 6379, which is the default port for Redis.

![](images/22.png)
![](images/23.png)
![](images/24.png)

As a note, you may have noticed that, in the HTTP response from "admin.php", there is a commented "button", which is described as "Ping Server". If you have followed this or have started to enumerate directories, you may have found the endpoint "ping.php". And if you read the content of this file using the Arbitrary File Read, you will see that it is a file that checks the connection to an internal Redis server.

![](images/25.png)
![](images/26.png)
![](images/27.png)

Knowing that there is a Redis server exposed, if you look for some information you will find that it is possible to exploit the Redis functionality to write files to disk. This can be done by sending the following commands to Redis:

![](images/28.png)

However, in order to be able to do so, certain conditions must be met:

1. The first is that the Redis does not have Authentication (by default it does not).
2. The "gopher" protocol can be used to send commands to Redis by "Protocol Smuggling" (PHP's cURL allows you to use the wrapper "gopher://" in the URL).
3. That there is no functionality that prevents these actions and there is a directory where Redis can write (the directory /var/www/html/uploads seems to be a possible candidate).

Once the following points have been raised, the request to be sent is formed. The goal is to write a very simple webshell to validate if the conditions detailed above are met. To do this, we will modify our redirector to respond with the encoded payload:

![](images/29.png)
![](images/30.png)

After sending the request, it is verified that the file has been successfully written in the indicated folder.

```
gopher://127.0.0.1:6379/_CONFIG%20SET%20dir%20/var/www/html/uploads%0D%0ACONFIG%20SET%20dbfilename%20webshell2.php%0D%0ASET%20webshell2%20%22%3C%3Fphp%20echo%20exec%28%24_GET%5B%27cmd%27%5D%29%3B%20%3F%3E%22%0D%0ASAVE
```

![](images/31.png)

And, when accessing the webshell, it is possible to check how, when consulting the environment variable "FLAG", the flag of the challenge is obtained.

![](images/32.png)

## Notes

It should be noted that it is possible to perform this operation with Redis because it is configured without authentication and without any security policy. For more information you can consult the following [link](https://redis.io/topics/security)

## References

* https://maxchadwick.xyz/blog/ssrf-exploits-against-redis
* https://redis.io/topics/security

## Author

@Secury
