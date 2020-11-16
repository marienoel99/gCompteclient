const v = [];
const host = '127.0.0.1'
document.getElementById('el').onchange = function(e) {
    document.getElementById('ini').innerHTML = "<div class=\"clientTitle\">Nouvelle opération, choisissez un client pour initier l'opération</div>"
    document.getElementById('ini').style.border = "none"
    fetch(`http://${host}:8000/caissep`, {
        method: 'POST',
        'Content-Type': 'application/json',
        body: e.target.value
    }).then(res => {
        return res.text();
    }).then(res => {
        document.getElementById('va').innerHTML = res
    }).then(() => {
        const v = [];
        for (var i = 0; i <= document.getElementsByClassName('clientT').length - 1; i++) {

            var a = document.getElementsByClassName('clientT')[i];
            v.push(a);
        }
        v.forEach((val, index) => {
            val.onclick = function() {
                const data = {
                    i: val.dataset.key,
                    id: val.id
                }
                fetch(`http://${host}:8000/opera`, {
                    method: 'POST',
                    'Content-Type': 'application/json',
                    body: JSON.stringify(data)
                }).then(res => {
                    return res.text();
                }).then(res => {
                    document.getElementById('ini').innerHTML = res
                    document.getElementById('ini').style.border = "0.2px solid rgba(0, 0, 0, 0.1)"
                    document.getElementById('ini').style.height = "400px"
                }).catch(error => {
                    alert(error)
                })
            }


        })
    }).catch(error => {
        alert(error)
    })
}

for (var i = 0; i <= document.getElementsByClassName('clientT').length - 1; i++) {

    var a = document.getElementsByClassName('clientT')[i];
    v.push(a);
    console.log(v[i])
}

v.forEach((val, index) => {
    val.onclick = function() {
        const data = {
            i: val.dataset.key,
            id: val.id
        }
        fetch(`http://${host}:8000/opera`, {
            method: 'POST',
            'Content-Type': 'application/json',
            body: JSON.stringify(data)
        }).then(res => {
            return res.text();
        }).then(res => {

            document.getElementById('ini').innerHTML = res
            document.getElementById('ini').style.border = "0.2px solid rgba(0, 0, 0, 0.1)"
            document.getElementById('ini').style.height = "400px"


        }).catch(error => {
            alert(error)
        })
    }


})