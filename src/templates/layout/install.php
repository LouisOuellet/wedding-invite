<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="/dist/img/favicon.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/vendor/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/vendor/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/vendor/select2/css/select2.min.css">
  <link rel="stylesheet" href="/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="/vendor/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
      .login-box{
        width: 800px;
      }
      .invalid-feedback{
        margin-left: 25%;
      }
      div.pace{
        display:none;
      }
      .terminal{
        max-height:500px;
        overflow:scroll;
        display:flex;
        flex-direction:column-reverse;
        background-color:#30353A;
        color:#FAFAFA;
        font-family:monospace;
        -ms-overflow-style: none;
        scrollbar-width: none;
      }
      .terminal::-webkit-scrollbar {
        display: none;
      }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-page">
    <div class="login-box">
      <form id="SetupWizard" name="SetupWizard" method="post">
        <div id="accordion">
          <div class="collapse show" data-parent="#accordion" id="welcome">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Fields['Installation Wizard'] ?></h5>
              </div>
              <div class="card-body">
                <p class="card-text"><?= $this->Fields['welcome_message'] ?></p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#site" data-toggle="collapse" aria-expanded="false" class="btn btn-primary float-right"><?= $this->Fields['Get Started'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="site">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Fields['Site Configuration'] ?></h5>
              </div>
              <div class="card-body">
                <p class="card-text">
                  <div class="form-group row">
                    <label for="site_timezone" class="col-sm-2 col-form-label"><?= $this->Fields['Password'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-key"></i>
                        </span>
                      </div>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="site_timezone" class="col-sm-2 col-form-label"><?= $this->Fields['Language'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-language"></i>
                        </span>
                      </div>
                      <select class="form-control select2bs4" name="language" id="language">
                        <?php foreach($this->Languages as $language) {?>
                          <option value="<?=$language?>"<?php if((isset($_POST['site_language']))&&($_POST['site_language']==$language)){echo" selected";} else { if($this->Language==$language){ echo " selected"; } }?>><?=$language?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="site_timezone" class="col-sm-2 col-form-label"><?= $this->Fields['Timezone'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-clock"></i>
                        </span>
                      </div>
                      <select class="form-control select2bs4" name="timezone" id="timezone">
                        <?php foreach($this->Timezones as $timezone) {?>
                          <option value="<?=$timezone?>"<?php if((isset($_POST['site_timezone']))&&($_POST['site_timezone']==$timezone)){echo" selected";} else { if(isset($this->Settings['timezone'])&&$this->Settings['timezone']==$timezone){ echo " selected"; } }?>><?=$timezone?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#welcome" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Fields['Back'] ?></button>
                <button type="button" data-target="#license" data-toggle="collapse" aria-expanded="false"  class="btn btn-primary float-right"><?= $this->Fields['Next'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="license">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Fields['License'] ?></h5>
              </div>
              <div class="card-body" style="max-height:500px;overflow:scroll;">
                <p class="card-text">
                  <?php include("LICENSE.html") ?>
                  <div class="form-group mb-0">
                    <div class="icheck-primary">
                      <input type="checkbox" id="license term field" name="license term" style="position: static !important;">
                      <label for="license term field"><?= $this->Fields['I have read this License'] ?></label>
                    </div>
                  </div>
                </p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#site" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Fields['Back'] ?></button>
                <button type="button" id="reviewBTN" data-target="#review" data-toggle="collapse" aria-expanded="false"  class="btn btn-primary float-right"><?= $this->Fields['Next'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="review">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Fields['Review Configuration'] ?></h5>
              </div>
              <div class="card-body">
  							<div class="col-12">
  								<div class="card card-primary my-2">
  				          <div class="card-header">
  				            <h5 class="m-0"><?= $this->Fields['Site Configuration'] ?></h5>
  				          </div>
  				          <div class="card-body">
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Language</div>
  											<div class="col-8" id="review_language"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Timezone</div>
  											<div class="col-8" id="review_timezone"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Password</div>
  											<div class="col-8" id="review_password"></div>
  										</div>
  									</div>
  								</div>
  							</div>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#license" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Fields['Back'] ?></button>
                <button type="submit" name="StartInstall" class="btn btn-success float-right"><?= $this->Fields['Install'] ?><i class="nav-icon far fa-play-circle ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="log">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Fields['Installation Details'] ?></h5>
              </div>
              <div class="card-body p-0">
                <div class="progress" style="height: 48px;">
                  <div id="log-progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
                <div class="m-3 p-2 terminal"><p class="card-text" id="log-container"></p></div>
              </div>
              <div class="card-footer">
                <button type="button" data-action="back" data-target="#welcome" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Fields['Back'] ?></button>
                <a href="<?=$this->URL?>" data-action="login" class="btn btn-success float-right">
                  <?= $this->Fields['Sign In'] ?><i class="nav-icon fas fa-sign-in-alt ml-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/vendor/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/vendor/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="/vendor/moment/moment.min.js"></script>
<script src="/vendor/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="/vendor/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/vendor/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- jquery-validation -->
<script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="/vendor/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<script>
	$("#reviewBTN").click(function(){
		$('#review_password').html($(document.getElementById("password")).val());
		$('#review_language').html($(document.getElementById("language")).find('option:selected').text());
		$('#review_timezone').html($(document.getElementById("timezone")).find('option:selected').text());
	});
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({theme:'bootstrap4'})

    //Date picker
    $('.datepicker').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 1950,
      locale: {
        "format": "YYYY-MM-DD",
      },
    })

    //Datetime picker
    $('.datetimepicker').daterangepicker({
      autoApply: true,
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 1950,
      timePicker: true,
      timePickerIncrement: 5,
      locale: {
        "format": "YYYY-MM-DD hh:mm",
      },
    })

  })
</script>
<script type="text/javascript">
  function checkProgress(){
    var checkInstall = setInterval(function(){
      $.ajax({
        url : "/tmp/resume.install",
        dataType:"text",
        success:function(data){
          clearInterval(checkInstall);
          $('button[data-action="back"][data-target="#welcome"]').hide();
          $('a[data-action="login"]').hide();
          $('#log-container').html("");
          $('#log').collapse('show');
          var max = parseInt(data);
          var now = 0;
          var error = 0;
          function setProgress(value){
            var progress = Math.round(((value / max) * 100));
            console.log($('#log-progress'));
            console.log('error: ', error,'progress: ', progress,'attr: ', parseInt($('#log-progress').attr('aria-valuenow')),parseInt(progress) == parseInt($('#log-progress').attr('aria-valuenow')));
            if(parseInt(progress) == parseInt($('#log-progress').attr('aria-valuenow'))){ error++; } else { error = 0; }
            $('#log-progress').attr('aria-valuenow',progress).width(progress+'%').html(progress+'%');
            switch(true){
              case (0 <= error &&  error < 15): $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated");break;
              case (15 <= error &&  error < 30): $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-info");break;
              case (30 <= error &&  error < 60): $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-lightblue");break;
              case (60 <= error &&  error < 120): $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-navy");break;
              case (120 <= error &&  error < 180): $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-warning");break;
              case (180 <= error &&  error < 240): $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-orange");break;
              case (240 <= error): $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-danger").html(progress+"% - It's been a while");break;
            }
          }
          setProgress(now);
          var checkLog = setInterval(function(){
            $.ajax({
              url : "/tmp/install.log",
              dataType:"text",
              success:function(data){
                $('#log-container').html(data.replace(/\n/g, "<br>"));
                now = 0;
                if(data.includes("Password Set!")){ now++; }
                if(data.includes("Language Set")){ now++; }
                if(data.includes("Timezone Set")){ now++; }
                if(data.includes("Installation has completed successfully")){ now++; }
                if(now >= max){
                  setProgress(max);
                  clearInterval(checkLog);
                  $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated");
                  $('#log-progress').addClass('bg-success').html('Completed');
                  $('a[data-action="login"]').show();
                } else { setProgress(now); }
                if(data.includes("Application is already installed")||data.includes("No password provided")||data.includes("No language provided")||data.includes("No timezone provided")||data.includes("Unable to complete the installation")){
                  clearInterval(checkLog);
                  setProgress(max);
                  $('#log-progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated").addClass('bg-danger').html('Error');
                  $('button[data-action="back"][data-target="#welcome"]').show();
                }
              }
            });
          }, 1000);
        }
      });
    }, 1000);
  }
</script>
<script type="text/javascript">
$(document).ready(function () {
  checkProgress();
  $.validator.addMethod("pwcheck", function(value) {
    if(!/[a-z]/.test(value)){
      $.validator.messages.pwcheck = 'You need a lowercase letter!';
      return false;
    }
    if(!/[A-Z]/.test(value)){
      $.validator.messages.pwcheck = 'You need an uppercase letter!';
      return false;
    }
    if(!/[0-9]/.test(value)){
      $.validator.messages.pwcheck = 'You need a number';
      return false;
    }
    if(!/[!@#$%^&*()-+_=;:'"<>,/?|`~]/.test(value)){
      $.validator.messages.pwcheck = 'You need a symbol';
      return false;
    }
    return true;
  });
  var rules = {
    language: {
      required: true,
    },
    timezone: {
      required: true,
    },
    password: {
      required: true,
      minlength: 8,
      pwcheck: "must contain a number, symbol, uppercase and lowercase",
    },
  };
  $('#SetupWizard').validate({
    ignore: [],
    rules: rules,
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    },
    submitHandler: function() {
      $('a[data-action="login"]').hide();
      $('#log-container').html("");
      $('#log').collapse('show');
      var language = document.getElementById("language").value;
      var timezone = document.getElementById("timezone").value;
      var password = document.getElementById("password").value;
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = {
        language: language,
        timezone: timezone,
        password: password,
      }
      // AJAX code to submit form.
      $.ajax({
        type: "POST",
        url: "/src/lib/install.php",
        data: dataString,
        cache: false,
      });
    },
  });
});
</script>
</body>
</html>
