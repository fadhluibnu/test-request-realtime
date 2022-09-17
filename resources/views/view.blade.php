<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <script>
        function readTextFile(getjson) {
            var rawFile = new XMLHttpRequest();
            rawFile.overrideMimeType("application/json");
            rawFile.open("GET", getjson, true);
            rawFile.onreadystatechange = function() {
                var hapus = new XMLHttpRequest();
                hapus.overrideMimeType("application/json");
                if (rawFile.readyState === 4 && rawFile.status == "200") {
                    var respon = JSON.parse(rawFile.response)
                    for (let index = 0; index <= respon.length - 1; index++) {
                        console.log(respon);
                        hapus.open("GET", "http://127.0.0.1:8000/delete/" + respon[index]['id'], true);
                        hapus.send(null);
                    }
                }
            }
            rawFile.send(null);
        }

        //usage:

        start()

        function start() {
            setTimeout(myGreeting, 2000);
        }

        function myGreeting() {
            readTextFile("http://127.0.0.1:8000/getJson")
            start()
        }
    </script>
</body>

</html>
