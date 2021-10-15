 <!-- ======= Hero Section ======= -->
 <section id="hero" class="d-flex align-items-center">
     <div class="container">
         <h1>Welcome to PJU Sistem</h1>
         <h2>Layanan Pengaduan Penerangan Jalan Umum Kabupaten Bojonegoro</h2>
         <a href="#about" class="btn-get-started scrollto">Get Started</a>
     </div>
 </section><!-- End Hero -->

 <main id="main">
     <br>

     <!-- ======= Why Us Section ======= -->
     <section id="why-us" class="why-us">
         <div class="container">
             <div class="row">
                 <div class="col d-flex align-items-stretch">
                     <div class="shadow p-3 mb-5 bg-white rounded">
                         <div class="card-body">
                             <div class="card-header text-info">
                                 <h2 class="text-center font-weight-bold">SAMPAIKAN LAPORAN ANDA LANGSUNG KE DINAS PENERANGAN JALAN UMUM
                                 </h2>
                             </div>
                             <br>
                             <div class="card-text">
                                 <form class="user" method="post" action="<?= base_url('C_landingpage/tambah') ?>">
                                     <div class="form-row">
                                         <div class="form-group col-md-6">
                                             <div class="font-weight-bold">
                                                 <label for="inputNama">Nama Lengkap *</label>
                                             </div>
                                             <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh : Abdurrahman Hanif">
                                             <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>'); ?>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <div class="font-weight-bold">
                                                 <label for="inputWA">Nomor WhatsApp *</label>
                                             </div>
                                             <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Contoh : 0878xxxxxxxx"> <?= form_error('whatsapp', ' <small class="text-danger pl-3">', '</small>'); ?>
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <div class="font-weight-bold">
                                             <label for="alamat">Alamat Kerusakan *</label>
                                         </div>
                                         <textarea type="text" class="form-control" rows="2" id="alamat" name="alamat" placeholder="Contoh : Jl. Hr.Muhammad, Depan Pom Bensin"></textarea><?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
                                     </div>

                                     <div class="form-row">
                                         <div class="form-group col-md-6">
                                             <div class="font-weight-bold">
                                                 <label for="kecamatan">Kecamatan *</label>
                                             </div>
                                             <select class="form-control" id="kecamatan" name="kecamatan">
                                                 <option>Pilih Kecamatan</option>
                                                 <option>Sukomanunggal</option>
                                                 <option>Sawahan</option>
                                                 <option>Simomulyo</option>
                                             </select>
                                         </div>
                                         <div class="form-group col-md-6">
                                             <div class="font-weight-bold">
                                                 <label for="kelurahan">Kelurahan *</label>
                                             </div>
                                             <select class="form-control" id="kelurahan" name="kelurahan">
                                                 <option>Pilih Kelurahan</option>
                                                 <option>Putat Gede</option>
                                                 <option>Pradah</option>
                                                 <option>Kawal Kali Kendal</option>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <div class="font-weight-bold">
                                             <label for="laporan">Laporan Anda *</label>
                                         </div>
                                         <textarea type="text" class="form-control" id="laporan" name="laporan" rows="6" placeholder="Contoh : Lampu PJU mati di ruas jalan Hr.Muhammad depan Pom Bensin Hr.Muhammad arah ke Mayjend Sungkono sampai dengan depan Daihatsu Hr.Muhammad"></textarea><?= form_error('laporan', ' <small class="text-danger pl-3">', '</small>'); ?>
                                     </div>


                                     <!-- <div class="form-group">
                                         <div class="font-weight-bold">
                                             <label for="laporan">lampiran *</label>
                                         </div>
                                         <textarea type="text" class="form-control" id="gambar" name="gambar" rows="6" placeholder="Contoh : Lampu PJU mati di ruas jalan Hr.Muhammad depan Pom Bensin Hr.Muhammad arah ke Mayjend Sungkono sampai dengan depan Daihatsu Hr.Muhammad"></textarea><?= form_error('gambar', ' <small class="text-danger pl-3">', '</small>'); ?>
                                     </div> -->
                                     <div class="form-group">
                                         <div class="font-weight-bold">
                                             <label for="laporan">Lampiran Foto *</label>
                                         </div>
                                         <div class="custom-file">
                                             <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                                             <label class="custom-file-label" for="validatedCustomFile">Masukan Lampiran Foto...</label>
                                         </div>
                                     </div>
                                     <br>
                                     <div class="text-center">
                                         <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section><!-- End Why Us Section -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact">
         <div class="container">

             <div class="section-title">
                 <h2>Contact</h2>
                 <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
             </div>
         </div>

         <div>
             <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
         </div>
     </section><!-- End Contact Section -->

 </main><!-- End #main -->