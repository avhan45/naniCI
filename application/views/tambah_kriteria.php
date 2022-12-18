          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Tambah Data Kriteria</h4>
              <div class="row">
                <!-- Basic -->
                <div class="col-xl-8">
                  <!-- HTML5 Inputs -->
                  <div class="card mb-4">
                    <h5 class="card-header">Form Tambah Data</h5>
                    <div class="card-body">
                        <form action="<?= base_url('kriteria/tambah_proses'); ?>" method="POST">
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Kode Kriteria</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="kode" value="<?= set_value('kode'); ?>" required autofocus />
                          <?= form_error('kode'); ?>
                        </div>
                       
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Kriteria</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="kriteria" value="<?= set_value('kriteria'); ?>" required id="html5-search-input" />
                        </div>
                        <small class="text-danger">
                    <?= form_error('kriteria'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Attribut</label>
                        <div class="col-md-10">
                          <select class="form-control" name="attribut" id="attribut">
                            <option value="benefit">Benefit</option>
                            <option value="cost">Cost</option>
                          </select>
                        </div>
                        <small class="text-danger">
                    <?= form_error('kriteria'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Bobot</label>
                        <div class="col-md-10">
                          <input type="text" name="bobot" id="bobot" class="form-control" value="<?= set_value('bobot'); ?>">
                        </div>
                        <small class="text-danger">
                    <?= form_error('bobot'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row ">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('kriteria') ?>" class="btn btn-dark">Kembali</a>
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


