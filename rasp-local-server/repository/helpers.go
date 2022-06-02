package repository

import (
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"
)

var endpoint = "http://192.168.1.7"
var DeviceId = "d27cb86e-feb8-4161-aa33-090e35a1640c"

type Data struct {
	Device Device `json:"data"`
}

type Device struct {
	Uuid       string `json:"uuid"`
	PlaylistId string `json:"playlist_id"`
	Phrases    string `json:"phrases"`
}

func GetDeviceData() Device {
	resp, err := http.Get(endpoint + "/api/device/" + DeviceId + "/refresh")
	if err != nil {
		log.Fatal(err)
	}

	defer resp.Body.Close()
	body, err := ioutil.ReadAll(resp.Body)
	if err != nil {
		log.Fatal(err)
	}

	var data Data

	err = json.Unmarshal(body, &data)
	if err != nil {
		log.Fatal(err)
	}

	return data.Device
}
