package main

import (
	"log"
	"net/http"
	"rasplocalserver/handlers"
)

func main() {
	http.HandleFunc("/", handlers.MakeHandler(handlers.HomeHandler))
	http.HandleFunc("/css/", handlers.ServeResourceHandler)
	http.HandleFunc("/js/", handlers.ServeResourceHandler)

	print("Listen on port :3000\n")

	log.Fatal(http.ListenAndServe(":3000", nil))
}
