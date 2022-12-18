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
                        <form action="<?= base_url('crips/edit_proses'); ?>" method="POST">
                        <?php foreach($crips as $c): ?>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Kriteria</label>
                        <div class="col-md-10">
                            <select name="kriteria" id="kriteria" class="form-control">
                                <option value="<?= $c->id_kriteria ?>"><?= $c->kriteria ?></option>
                                <?php foreach($kriteria as $data): ?>
                                <option value="<?= $data->id_kriteria ?>"><?= $data->kriteria ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                       
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Crips</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text" name="crips" value="<?= $c->crips ?>" id="html5-search-input" />
                          <input class="form-control" type="hidden" name="id" value="<?= $c->id_crips ?>" id="html5-search-input" />
                        </div>
                        <small class="text-danger">
                    <?= form_error('crips'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Keterangan</label>
                        <div class="col-md-10">
                          <input type="radio" style="margin-right:30px;" name="ket" id="A" value="A" <?php if($c->keterangan == "A"){
                            echo "checked";
                          }else{
                            echo "";
                          } ?>>
                           <label for="A" style="margin-left: -50px; padding-left:20px; width:95px;">A</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="B" value="B" <?php if($c->keterangan == "B"){
                            echo "checked";
                          }else{
                            echo "";
                          } ?>> 
                          <label for="B" style="margin-left: -50px; padding-left:20px; width:95px;">B</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="C" value="C" <?php if($c->keterangan == "C"){
                            echo "checked";
                          }else{
                            echo "";
                          } ?>> 
                          <label for="C" style="margin-left: -50px; padding-left:20px; width:95px;">C</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="D" value="D" <?php if($c->keterangan == "D"){
                            echo "checked";
                          }else{
                            echo "";
                          } ?>> 
                          <label for="D" style="margin-left: -50px; padding-left:20px; width:95px;">D</label>
                          <input type="radio" style="margin-right:30px;" name="ket" id="E" value="E" <?php if($c->keterangan == "E"){
                            echo "checked";
                          }else{
                            echo "";
                          } ?>> 
                          <label for="E" style="margin-left: -50px; padding-left:20px; width:95px;">E</label>
                        </div>
                        <small class="text-danger">
                    <?= form_error('ket'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Nilai</label>
                        <div class="col-md-10">
                          <input type="text" name="nilai" id="nilai" class="form-control" value="<?= $c->nilai; ?>">
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
                      <?php endforeach; ?>
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


