<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codeigniter 4 PDF Generate Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        table th {
            background: #0c1c60 !important;
            color: #fff !important;
            border: 1px solid #ddd !important;
            line-height: 15px !important;
            text-align: center !important;
            vertical-align: middle !important;

        }

        table td {
            line-height: 15px !important;
            text-align: center !important;
        }
    </style>
</head>

<body>
    <div class="container">

        <h2>Generate PDF in Codeigniter 4 - Online Web Tutor</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Keterangan Buku</th>
                    <th>Total Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sewa as $no => $res) : ?>
                    <tr>
                        <td><?= $no + 1 ?></td>
                        <td><?= $res['name'] ?></td>
                        <td><?= $res['book_title'] ?></td>
                        <td><?= $res['description'] ?></td>
                        <td><?= $res['sum_fine'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
