<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title ; ?></h1>
    </div>

    <div class="section-body">
      
      <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1 bg-light">
            <div class="card-icon bg-primary">
              <i class="fas fa-temperature-high"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header mb-3">
                <h4 class="text-dark">SUHU</h4>
              </div>
              <div class="card-body" id="suhu">
                
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1 bg-light">
            <div class="card-icon bg-success">
              <i class="fas fa-clock"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header mb-3">
                <h4 class="text-dark">Waktu Pengeringan</h4>
              </div>
              <div class="card-body">
                <span class="h6"><?= $rumput[0]['lama_pengeringan'] . " Menit" ; ?></span>
                <span class="h6" id="sejak"></span>
                <button type="button" class="btn btn-sm btn-dark float-right mb-2" data-toggle="modal" data-target="#modalEdit"><i class="fas fa-edit"></i> Setting</button>
                <br>
                <span class="h6 mb-0">Sisa Waktu : </span>
                <span class="h6 mb-0" id="menit"><?= $menit ;?></span>
                <span class="h6 mb-0">:</span>
                <span class="h6 mb-0" id="detik"><?= $detik ;?></span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1 bg-light">
            <div class="card-icon bg-danger">
              <i class="fas fa-fire"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header mb-3">
                <h4 class="text-dark">RUMPUT LAUT</h4>
              </div>
              <div class="card-body">
              <span class="h6" id="rumput"></span>
              </div>
            </div>
          </div>
        </div>

      </div>
      
    </div>

  </section>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('Dashboard/editJam'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Setting Waktu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Lama Pengeringan (Menit)</label>
            <select class="custom-select" id="inputGroupSelect02" name="jam">
              <option value="">-- Jam --</option>
              <?php for ($i=1; $i<=24; $i++) : ?>
                {
                    <option value="<?= $i ; ?>" <?php if ($rumput[0]['lama_pengeringan'] == $i) echo 'selected="selected"' ;?>><?= $i ; ?></option>
                }
              <?php endfor ; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" name="add" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>

  window.setTimeout("waktu()", 1000);

  function waktu() {
    let menit = parseInt($('#menit').text());
    let detik = parseInt($('#detik').text());

    setTimeout("waktu()", 1000);
    if (menit != 0)
    {
      detik -= 1;
      if (detik == 0) {
        detik = 59;
        menit -= 1;
      }

      $('#menit').text(menit);
      $('#detik').text(detik);
    }
    else
    {
      if (detik <= 59)
      {
        if (detik != 0) {
          detik -= 1;
          $('#menit').text(menit);
          $('#detik').text(detik);
        }
      }
    }
    
  }

  function tampil(){
    $.ajax({
        url: "<?= base_url('Dashboard/dashboard_realtime')?>",
        dataType: 'json',
        success:function(result){
          
          $('#suhu').text(result["suhu"]);
          $('#rumput').text(result["rumput"]);
          $('#sejak').text("Sejak : " + result["sejak"]);
          
          setTimeout(tampil, 2000); 
        }
    });
  }
  
  document.addEventListener('DOMContentLoaded',function(){
    tampil();
  });   

</script>