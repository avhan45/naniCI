          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Tambah Data Crips</h4>
              <div class="row">
                <!-- Basic -->
                <div class="col-xl-8">
                  <!-- HTML5 Inputs -->
                  <div class="card mb-4">
                    <h5 class="card-header">Form Tambah Data</h5>
                    <div class="card-body">
                        <form action="<?= base_url('crips/tambah_proses'); ?>" method="POST">
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Kriteria</label>
                        <div class="col-md-10">
                            <select name="kriteria" id="kriteria" class="form-control">
                                <option value="">--Pilih Kriteria--</option>
                                <?php foreach($kriteria as $data): ?>
                                <option value="<?= $data->id_kriteria ?>"><?= $data->kriteria ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                       
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Crips</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="crips" value="<?= set_value('crips'); ?>" required id="html5-search-input" />
                        </div>
                        <small class="text-danger">
                    <?= form_error('crips'); ?>
                  </small>
                      </div>

                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Keterangan</label>
                        <div class="col-md-10">
                          <input type="radio" style="margin-right:30px;" name="ket" id="A" value="A"> <label for="A" style="margin-left: -50px; padding-left:20px; width:95px;">A</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="B" value="B"> <label for="B" style="margin-left: -50px; padding-left:20px; width:95px;">B</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="C" value="C"> <label for="C" style="margin-left: -50px; padding-left:20px; width:95px;">C</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="D" value="D"> <label for="D" style="margin-left: -50px; padding-left:20px; width:95px;">D</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="E" value="E"> <label for="E" style="margin-left: -50px; padding-left:20px; width:95px;">E</label>
                        </div>
                        <small class="text-danger">
                    <?= form_error('ket'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Bobot</label>
                        <div class="col-md-10">
                          <input type="text" name="nilai" id="nilai" class="form-control" value="<?= set_value('nilai'); ?>">
                        </div>
                        <small class="text-danger">
                    <?= form_error('nilai'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row ">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('crips') ?>" class="btn btn-dark">Kembali</a>
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
<!-- 
<script>
  $(document).ready(function() {
    console.log("loading...");
  });
</script> -->
