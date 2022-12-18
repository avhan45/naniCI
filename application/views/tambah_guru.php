          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Tambah Data Guru</h4>
              <div class="row">
                <!-- Basic -->
                <div class="col-xl-8">
                  <!-- HTML5 Inputs -->
                  <div class="card mb-4">
                    <h5 class="card-header">Form Tambah Data</h5>
                    <div class="card-body">
                        <form action="<?= base_url('guru/tambah_proses'); ?>" method="POST">
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Nama</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="nama" value="<?= set_value('nama'); ?>" required autofocus />
                          <?= form_error('nama'); ?>
                        </div>
                       
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Nip</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="nip" value="<?= set_value('nip'); ?>" required id="html5-search-input" />
                        </div>
                        <small class="text-danger">
                    <?= form_error('nip'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Alamat</label>
                        <div class="col-md-10">
                          <textarea name="alamat" id="alamat" class="form-control"  rows="5"></textarea>
                        </div>
                      </div>
                      <div class="mb-3 row ">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('guru') ?>" class="btn btn-dark">Kembali</a>
                        </div>
                      </div>
                        </form>
                    </div>
                  </div>
              </div>
                            
            </div>
           
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://avhan.my.id" target="_blank" class="footer-link fw-bolder">Avhan</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


