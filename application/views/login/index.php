<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title ; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ; ?>assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/uploads/default.jpg') ; ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="flash-sukses" data-flashdata="<?= $this->session->flashdata('flash-sukses') ; ?>"></div>
            <div class="flash-error" data-flashdata="<?= $this->session->flashdata('flash-error') ; ?>"></div>

            <div class="card card-primary">
              <div class="card-header bg-primary">
                <h4 class="text-white">Login</h4>
              </div>

              <div class="card-body">
                <form id="login-form" action="" onsubmit="ajax_login(); return false">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" tabindex="1" autofocus>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" >
                    <div class="invalid-feedback">
                      Password tidak boleh kosong
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url() ; ?>assets/modules/jquery.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/popper.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/tooltip.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ; ?>assets/modules/moment.min.js"></script>
  <script src="<?= base_url() ; ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?= base_url() ; ?>assets/js/scripts.js"></script>
  <script src="<?= base_url() ; ?>assets/js/custom.js"></script>

  <script src="<?= base_url('assets/js/sweetalert/sweetalert2.js') ; ?> "></script>
  <script src="<?= base_url('assets/js/sweetalert/new_script.js') ; ?> "></script>

</body>
</html>

<script>

  function ajax_login(){
    let email = $("#email").val();
    let password = $("#password").val();
    $.ajax({
        url: "<?= base_url('Login/login') ; ?>",
        type: "POST",
        data: {
          email: email,
          password: password
        },
        success:function(result){
            if (result == 'Valid')
            {
              
              Swal.fire({
                title: 'Success',
                text: 'Login Sukses',
                icon: 'success'
              }).then((result) => {
                if (result.value) {
                  setTimeout(function ()
                  {
                    document.location.href = "<?= base_url('Dashboard') ; ?>";
                  }, 500)
                }
              });
            }
            else
            {
              Swal.fire({
                title: 'Sorry !!',
                text: result,
                icon: 'warning'
              });

              $('#email').val("");
              $('#password').val("");
            }
        }
    });
  }
  
</script>