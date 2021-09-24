<head>
    <title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<?php foreach ($data_pju as $u) { ?>
    <form action="#" method="post">
        <table style="margin:20px auto;">
            <tr>
                <td>Nama</td>
                <td>
                    <input type="hidden" name="id_pju" value="<?php echo $u->id_pju ?>">
                    <input type="text" name="kode_pju" value="<?php echo $u->kode_kelompok ?>">
                </td>
            </tr>
        </table>
    </form>
<?php } ?>