package handlers

import (
	"html/template"
	"net/http"
	"rasplocalserver/repository"
	"regexp"
)

var templates = template.Must(template.ParseFiles("tmpl/home.html"))
var validPath = regexp.MustCompile("^/")

func HomeHandler(w http.ResponseWriter, r *http.Request) {
	p := &Page{
		PlaylistId:    repository.GetPlaylistId(),
		BottomPhrases: repository.GetMarqueeBottomPhrases(),
		AnimationTime: repository.GetAnimationTime(),
	}

	renderTemplate(w, "home", p)
}
