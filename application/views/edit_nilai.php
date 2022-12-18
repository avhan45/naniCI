          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Input Data Nilai</h4>
              <div class="row">
                <!-- Basic -->
                <div class="col-xl-8">
                  <!-- HTML5 Inputs -->
                  <div class="card mb-4">
                    <h5 class="card-header">Form Input Data</h5>
                    <div class="card-body">
                        <form action="<?= base_url('Input_Nilai/updateNilai'); ?>" method="POST">
                          <?php foreach($nilai as $data): ?>
                            <input type="hidden" name="id" value="<?= $data->id_nilai; ?>">
                        <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Guru</label>
                        <div class="col-md-10">
                            <select name="guru" id="guru" class="form-control">
                                <option value="<?= $data->id_guru ?>"><?= $data->nama ?></option>
                                <?php foreach($guru as $gr): ?>
                                <option value="<?= $gr->id_guru ?>"><?= $gr->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <small class="text-danger">
                    <?= form_error('crips'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Kriteria</label>
                        <div class="col-md-10">
                            <select name="kriteria" id="kriteria" class="form-control">
                                <option value="<?= $data->id_kriteria ?>"><?= $data->kriteria ?></option>
                                <?php foreach($kriteria as $kr): ?>
                                <option value="<?= $kr->id_kriteria ?>"><?= $kr->kriteria ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                       
                      </div>
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Nilai</label>
                        <div class="col-md-10">
                          <div id="dtid">
                            <?php foreach($dtcrips as $cr): ?>
                              <input type="radio" name="nilai" id="nilai" value="<?= $data->id_crips ?>" checked>
                              <label for="nilai"><?= $cr->crips ?></label>
                              <?php endforeach; ?>
                            </div>
                          <!-- <input type="radio" name="nilai" id="nilai" value="<?= $data->id_crips ?>">
                          <label for="nilai"><?= $data->id_crips ?></label> -->
                          <div id="tampildata"></div>
                            <!-- <select name="nilai" id="nilai" class="form-control">
                                <option value="<?= $data->nilai ?>"><?= $data->nilai ?></option>
                                <?php foreach($crips as $c): ?>
                                <option value="<?= $c->crips ?>"><?= $c->crips ?></option>
                                <?php endforeach; ?>
                            </select> -->
                        </div>
                        <small class="text-danger">
                    <?= form_error('nilai'); ?>
                  </small>
                      </div>
                      <div class="mb-3 row ">
                        <div class="col-md-12 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?= base_url('Input_Nilai') ?>" class="btn btn-dark">Kembali</a>
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


    <script>
  $(document).ready(function() {
    $("#kriteria").bind('change', function(){
      var kriteria = $("#kriteria").val();
      $("input:radio").attr("checked", false);
      $("#dtid").hide();
      $.ajax({
        method: "POST",
        url: "<?= base_url('Input_Nilai/tampildata') ?>",
        data: {kriteria: kriteria },
        success: function(data){
          $("#tampildata").html(data);
        }
      });
    });
  })
</script>