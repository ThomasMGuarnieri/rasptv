function currentTime() {
    let date = new Date();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let day = date.getDay();
    let month = date.getMonth();
    let year = date.getFullYear();

    hh = (hh < 10) ? "0" + hh : hh;
    mm = (mm < 10) ? "0" + mm : mm;
    day = (day < 10) ? "0" + day : day;
    month = (month < 10) ? "0" + month : month;

    document.getElementById("clock").innerText = day + "/" + month + "/" + year + " - " + hh + ":" + mm;
    setTimeout(function(){ currentTime() }, 60000);
}

function checkRefresh() {

    let deviceId = 'd27cb86e-feb8-4161-aa33-090e35a1640c';

    fetch(`http://192.168.1.7/api/device/${deviceId}`)
        .then(request => {
            request.json().then(data => {
                if (data.refresh === 1) {
                    location.reload()
                }
            })
        }, err => {
            console.log(err);
        });

    setTimeout(function () { checkRefresh() }, 60000);
}