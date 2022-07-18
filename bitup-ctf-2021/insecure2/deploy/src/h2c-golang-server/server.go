package main

import (
	"fmt"
	"golang.org/x/net/http2"
	"golang.org/x/net/http2/h2c"
	"net/http"
	"os"
)


func main() {
	h2s := &http2.Server{}

	handler := http.NewServeMux()
	handler.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		fmt.Fprintf(w, "Hello, friend. You maybe try something different than %v", r.URL.Path)
	})
 
	handler.HandleFunc("/flag", func(w http.ResponseWriter, r *http.Request) {
		fmt.Fprintf(w, "You got the flag: " + os.Getenv("FLAG"));
	})
 
	server := &http.Server{
		Addr: "127.0.0.1:9003",
		Handler: h2c.NewHandler(handler, h2s),
	}

	fmt.Printf("Listening [127.0.0.1:9003]...\n")
	server.ListenAndServe()
}
