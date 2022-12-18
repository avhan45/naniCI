          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-2 mb-1"> Input Nilai Guru</h4>
              <?= $this->session->flashdata('message'); ?>

              <div class="card">
                <h5 class="card-header"><a class="btn btn-primary btn-sm" href="<?= base_url('Input_Nilai/tambah'); ?>"><i class="bx bx-plus-circle"></i> Tambah Data Crips</a></h5>
                <div class="">
                  <table class="table datatable" id="myTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kriteria</th>
                        <!-- <th>Keterangan</th> -->
                        <th>Nilai</th>
                        <!-- <th>Bobot</th> -->
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php 
                        $no=1; 
                        foreach($nilai as $data){
                        ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data->nama; ?></td>
                        <td><?= $data->kriteria; ?></td>
                        <td><?= $data->nilai; ?></td>
                        <td>
                            <a href="<?= base_url('Input_Nilai/edit/'.$data->id_nilai); ?>" class="btn btn-warning btn-sm"><i class="bx bx-message-square-edit"></i></a> | 
                            <a href="<?= base_url('Input_Nilai/delete/'.$data->id_nilai); ?>" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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


