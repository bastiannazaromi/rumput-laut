<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ; ?></h1>
    </div>

    <div class="section-body">
      <div class="container-fluid mt--5">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header bg-transparent">
                <div class="table-responsive">
                  <table id="example" class="table table-bordered align-items-center" width="100%" cellspacing="0">
                      <thead>
                          <tr class="table table-info">
                              <th>#</th>
                              <th>Waktu</th>
                              <th>Suhu</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                          foreach ($rekap as $hasil) : ?>
                              <tr>
                                  <th><?= $i++ ?></th>
                                  <td><?= date('d F Y - H:i:s', strtotime($hasil['waktu'])) ; ?></td>
                                  <td><?= $hasil['suhu'] . "* Celcius" ; ?></td>
                                  <td>
                                      <a href="<?= base_url() ?>Dashboard/hapusRekap/<?= $hasil['id']; ?>" class="badge badge-danger delete-people tombol-hapus"><i class="fa fa-trash"></i> Hapus</a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

