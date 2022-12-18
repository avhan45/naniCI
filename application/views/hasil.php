          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Tabel Nilai Analisa</h4>
              <?= $this->session->flashdata('message'); ?>

              <div class="card">
               
                <div class="">
                  <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th>Nama Guru</th>
                        <?php foreach($kriteria as $data):?>
                        <th><?= $data->kode_kriteria; ?></th>
                        <?php endforeach; ?>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($guru as $g): 
                        $id_guru = $g->id_guru
                        ?>
                      <tr>
                          <td><?= $g->nama ?></td>
                          <?php 
                          $query = $this->db->query("SELECT DISTINCT kriteria,nilai FROM `nilai`, kriteria WHERE nilai.id_kriteria=kriteria.id_kriteria AND nilai.id_guru=$id_guru;");
                          foreach($query->result() as $row):?>
                          <td><?= $row->nilai ?></td>
                          <?php endforeach; ?>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    
                  </table>
                </div>
              </div>                 
            </div>
            <!-- ======================================================= -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Tabel Nilai Normalisasi</h4>
              <?= $this->session->flashdata('message'); ?>
              <div class="m-2">
                <a href="<?= base_url('Hasil/normalisasi') ?>" class="btn btn-primary">Lakukan Proses Normalisasi</a> 
                <a href="<?= base_url('Hasil/deleteNormalisasi') ?>" class="btn btn-warning">Bersihkan Normalisasi</a>
              </div>
              <div class="card">
                <div class="">
                  <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th>Nama Guru</th>
                        <?php foreach($kriteria as $data):?>
                        <th><?= $data->kode_kriteria; ?></th>
                        <?php endforeach; ?>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($guru as $g): 
                        $id_guru = $g->id_guru
                        ?>
                      <tr>
                          <td><?= $g->nama ?></td>
                          <?php 
                          $query = $this->db->query("SELECT DISTINCT kriteria.kriteria,normalisasi.nilai_normalisasi FROM normalisasi,kriteria WHERE normalisasi.id_kriteria=kriteria.id_kriteria AND normalisasi.id_guru='$id_guru'");
                          foreach($query->result() as $row):?>
                          <td><?= $row->nilai_normalisasi ?></td>
                          <?php endforeach; ?>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    
                  </table>
                </div>
              </div>                 
            </div>

            <!-- ======================================================= -->
            <div class="container-xxl flex-grow-1 container-p-y hitung">
              <h4 class="fw-bold py-2 mb-1"> Tabel Nilai Perhitungan</h4>
              <?= $this->session->flashdata('message'); ?>
              <div class="m-2">
                <a href="<?= base_url('Hasil/analisa') ?>" class="btn btn-primary">Lakukan Proses Analisa</a> 
                <a href="<?= base_url('Hasil/deleteAnalisa') ?>" class="btn btn-warning">Bersihkan Analisa</a>
              </div>
              <div class="card">
                <div class="">
                  <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th>Nama Guru</th>
                        <?php foreach($kriteria as $data):?>
                        <th><?= $data->kode_kriteria; ?></th>
                        <?php endforeach; ?>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php foreach($guru as $g): 
                        $id_guru = $g->id_guru
                        ?>
                      <tr>
                          <td><?= $g->nama ?></td>
                          <?php 
                          $query = $this->db->query("SELECT DISTINCT kriteria.kriteria,perhitungan.nilai_perhitungan FROM perhitungan,kriteria WHERE perhitungan.id_kriteria=kriteria.id_kriteria AND perhitungan.id_guru='$id_guru'");
                          foreach($query->result() as $row):?>
                          <td><?= number_format($row->nilai_perhitungan,2) ?></td>
                          <?php endforeach; ?>
                          <td>
                            <?php
                            $query2 = $this->db->query("SELECT id_guru,id_kriteria,SUM(perhitungan.nilai_perhitungan) as total FROM perhitungan WHERE id_guru='$id_guru'");
                            foreach($query2->result() as $ck){
                              $id_gg = $ck->id_guru;
                              $rank = $ck->total;
                              echo number_format(floatval($ck->total),3);
                            }
                             $query3 = $this->db->query("SELECT DISTINCT id_guru,nilai_rangking FROM rangking WHERE id_guru = '$id_gg'");
                             $sr = $query3->num_rows();

                             if($sr == 0){
                              $this->db->query("INSERT INTO rangking (id_guru, nilai_rangking) VALUES ('$id_gg', '$rank')");
                             }
                            ?>
                            
                          </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    
                  </table>
                </div>
              </div>                 
            </div>
           

              <!-- ======================================================= -->
              <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Tabel Rangking</h4>
              <?= $this->session->flashdata('message'); ?>
             
              <div class="card">
                <div class="">
                  <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th>Ranking</th>
                        <th>Nama Guru</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                          <?php 
                          $no=1;
                          $query = $this->db->query("SELECT * FROM rangking INNER JOIN guru WHERE rangking.id_guru = guru.id_guru ORDER BY nilai_rangking DESC");;
                          foreach($query->result() as $row):?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= round($row->nilai_rangking,3); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    
                  </table>
                  <!-- <div class="d-flex justify-content-between"> -->
                  <button class="btn btn-primary btn-sm m-3"><i class="menu-icon tf-icons bx bx-printer" id="cetak" onclick="print_page()"></i></button>
                  <a style="float: right;" href="" class="btn btn-info btn-sm m-3"><i class="menu-icon tf-icons bx bx-archive-in"></i></a>
                  <!-- </div> -->
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
  function print_page(){
    window.print();
  }
</script>