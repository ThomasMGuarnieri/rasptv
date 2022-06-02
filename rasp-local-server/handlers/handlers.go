package handlers

import (
	"net/http"
)

type Page struct {
	PlaylistId    string
	BottomPhrases []string
	AnimationTime int
}

func renderTemplate(w http.ResponseWriter, tmpl string, p *Page) {
	err := templates.ExecuteTemplate(w, tmpl+".html", p)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
	}
}

func MakeHandler(fn func(http.ResponseWriter, *http.Request)) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		m := validPath.FindStringSubmatch(r.URL.Path)
		if m == nil {
			http.NotFound(w, r)
			return
		}
		fn(w, r)
	}
}

func ServeResourceHandler(w http.ResponseWriter, req *http.Request) {
	path := "/var/www/tmpl" + req.URL.Path
	http.ServeFile(w, req, path)
}
