<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LAPORAN DATA KELOMPOK</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .line-title {
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
    }

    table {
        border-collapse: collapse;
        border: 2px solid rgb(200, 200, 200);
        letter-spacing: 1px;
        font-family: sans-serif;
        font-size: .8rem;
    }

    th {
        border: 1px solid rgb(190, 190, 190);
        padding: 10px;
    }

    th[scope="row"] {
        background-color: #d7d9f2;
    }

    th[scope="col"] {
        background-color: #696969;
        color: #fff;
    }

    td {
        border: 1px solid rgb(190, 190, 190);
        padding: 10px;
    }

    td {
        text-align: center;
    }

    tr {
        border: 1px solid;
    }

    @media print {
        * {
            color: black;
            background: white;
        }

        table {
            font-size: 80%;
            border: 20px;
        }
    }
    </style>
</head>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <table style="width: 100%;">
            <tr>
                <td align="center">
                    <span style=" font-weight: bold; font-size:
                    20px">
                        SISTEM INFORMASI PENERANGAN JALAN UMUM
                        <br>KOTA SURABAYA
                    </span>
                </td>
            </tr>
        </table>

        <hr class="line-title">
        <p align="center">
            <span style=" font-weight: bold; font-size:
                    20px">LAPORAN DATA KELOMPOK</span>
        </p>

        <div class="table-responsive">
            <table id="example" class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="row" width="5%">No</th>
                        <th scope="row">Kode Kelompok</th>
                        <th scope="row">Nama Kelompok</th>
                    </tr>
                </thead>

                <?php
                $no = 1;
                foreach ($kelompok as $row) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->kode_kelompok; ?></td>
                        <td><?php echo $row->nama_kelompok; ?></td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>