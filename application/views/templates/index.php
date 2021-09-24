<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">
                <div class="container col-md">
                    <div class="row">
                        <div class="row col-md-4">
                            <form action="<?= base_url('C_data_pju/search'); ?>" method="post">
                                <div class=" input-group mb">
                                    <input type="text" class="form-control" placeholder="Keyword..." name="keyword" autocomplete="off" autofocus>
                                    <button class="btn btn-primary" type="submit" name="submit">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="col text-left">
                            <a href="<?= base_url('Welcome/tambah'); ?>" class="btn btn-primary"></a></i> Tambah Data</a>
                        </div>
                    </div>
                </div>
                </br>

                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="font-italic">
                            <tr>
                                <th width="5%">No</th>
                                <th>No.Meter</th>
                                <th>Alamat</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <td>
                            <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#update"></i> edit</a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete"></i> Hapus</a>
                        </td>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->