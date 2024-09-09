<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Reverb</title>
</head>
<body>
    
    <table id="table-bid" border="1" style="font-size: 78px">
        <tr>
            <td>NAMA</td>
            <td>ALAMAT</td>
            <td>NO TELEPON</td>
            <td>PEKERJAAN</td>
            <td>ALAMAT</td>
            <td>TUJUAN PENGGUNAAN INFORMASI</td>
            <td>ALASAN PENGAJUAN KEBERATAN</td>
        </tr>
    </table>

<script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>
<script>
    var pusher = new Pusher("gid4gxkj7ga6ctceauh3", {
        cluster: "",
        enabledTransports: ['ws'],
        forceTLS:false,
        wsHost: "127.0.0.1",
        wsPort: "8080"
    });
    var channel = pusher.subscribe("pengajuan-keberatan");
    channel.bind("App\\Events\\PengajuanKeberatanEvent", (data) => {
        let tableBid = document.getElementById('table-bid');
            var row = tableBid.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = data.nama;
            cell2.innerHTML = data.email;
    });
</script>
</body>
</html>