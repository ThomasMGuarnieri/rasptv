package main

import (
	"log"
	"net/http"
	"rasplocalserver/handlers"
)

func main() {
	http.HandleFunc("/", handlers.MakeHandler(handlers.HomeHandler))
	http.HandleFunc("/css/", handlers.ServeResourceHandler)

	print("Listen on port :8080\n")

	log.Fatal(http.ListenAndServe(":8080", nil))
}
