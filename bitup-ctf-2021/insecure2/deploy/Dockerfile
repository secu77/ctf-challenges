# container for golang compilation
FROM golang:1.16
WORKDIR /go/src/
RUN go get -d -v golang.org/x/net/http2/h2c
COPY src/h2c-golang-server/ ./
RUN CGO_ENABLED=0 GOOS=linux go build -a -installsuffix cgo -o h2cserver .

# container for serve application
FROM nginx:latest

RUN apt-get update && apt-get install -y supervisor

RUN mkdir -p /var/log/supervisor

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY src/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY src/nginx/default.conf /var/www/html/default.conf.txt
COPY src/nginx/robots.txt /var/www/html/robots.txt

COPY --from=0 /go/src/h2cserver ./h2cserver
RUN chmod +x /h2cserver

EXPOSE 80

CMD ["/usr/bin/supervisord"]
