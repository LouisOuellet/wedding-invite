<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->Settings['title']?> | <?= $this->Language->Field['Installation'] ?></title>
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
                <h5 class="m-0"><?= $this->Language->Field['Welcome_into'] ?> <?= $this->Settings['title']?></h5>
              </div>
              <div class="card-body">
                <p class="card-text"><?= $this->Language->Field['since_first_run'] ?></p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#sql" data-toggle="collapse" aria-expanded="false" class="btn btn-primary float-right"><?= $this->Language->Field['Get_Started'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="sql">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Language->Field['SQL_Database'] ?></h5>
              </div>
              <div class="card-body">
                <p class="card-text">
                  <div class="form-group row">
                    <label for="sql_host" class="col-sm-2 col-form-label"><?= $this->Language->Field['Host'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-server"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="<?= $this->Language->Field['Host'] ?>" id="sql_host" name="sql_host" value="<?php if(isset($_POST['sql_host'])){ echo $_POST['sql_host']; } else { if(isset($this->Settings['sql']['host'])){ echo $this->Settings['sql']['host']; } } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sql_database" class="col-sm-2 col-form-label"><?= $this->Language->Field['Database'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-database"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="<?= $this->Language->Field['Database'] ?>" id="sql_database" name="sql_database" value="<?php if(isset($_POST['sql_database'])){ echo $_POST['sql_database']; } else { if(isset($this->Settings['sql']['database'])){ echo $this->Settings['sql']['database']; } } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sql_username" class="col-sm-2 col-form-label"><?= $this->Language->Field['Username'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="<?= $this->Language->Field['Username'] ?>" id="sql_username" name="sql_username" value="<?php if(isset($_POST['sql_username'])){ echo $_POST['sql_username']; } else { if(isset($this->Settings['sql']['username'])){ echo $this->Settings['sql']['username']; } } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="sql_password" class="col-sm-2 col-form-label"><?= $this->Language->Field['Password'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user-lock"></i>
                        </span>
                      </div>
                      <input type="password" class="form-control" placeholder="<?= $this->Language->Field['Password'] ?>" id="sql_password" name="sql_password" value="<?php if(isset($_POST['sql_password'])){ echo $_POST['sql_password']; } else { if(isset($this->Settings['sql']['password'])){ echo $this->Settings['sql']['password']; } } ?>">
                    </div>
                  </div>
                </p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#welcome" data-toggle="collapse" aria-expanded="true" class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Language->Field['Back'] ?></button>
                <button type="button" data-target="#site" data-toggle="collapse" aria-expanded="false"  class="btn btn-primary float-right"><?= $this->Language->Field['Next'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="site">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Language->Field['Site_Configuration'] ?></h5>
              </div>
              <div class="card-body">
                <p class="card-text">
                  <div class="form-group row">
                    <label for="site_license" class="col-sm-2 col-form-label"><?= $this->Language->Field['Name'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-cube"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="site_name" name="site_name" value="<?php if(isset($_POST['site_name'])){ echo $_POST['site_name']; } else { if(isset($this->Settings['title'])){ echo $this->Settings['title']; } } ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="site_page" class="col-sm-2 col-form-label"><?= $this->Language->Field['Landing_Page'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-home"></i>
                        </span>
                      </div>
                      <select class="form-control select2bs4" name="site_page" id="site_page">
    										<?php foreach($this->Settings['plugins'] as $plugin => $conf){ ?>
                          <option value="<?=$plugin?>"<?php if((isset($_POST['site_page']))&&($_POST['site_page']==$plugin)){echo" selected";} else { if(isset($this->Settings['page'])&&$this->Settings['page']==$plugin){ echo " selected"; } }?>><?=ucwords(str_replace('_',' ',$plugin))?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="site_background_jobs" class="col-sm-2 col-form-label"><?= $this->Language->Field['Sync_Mode'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-sync-alt"></i>
                        </span>
                      </div>
                      <select class="form-control select2bs4" name="site_background_jobs" id="site_background_jobs">
                        <option value="cron"<?php if((isset($_POST['site_background_jobs']))&&($_POST['site_background_jobs']=='cron')){echo" selected";} else { if(isset($this->Settings['background_jobs'])&&$this->Settings['background_jobs']=="cron"){ echo " selected"; } }?>><?= $this->Language->Field['Cron'] ?></option>
                        <option value="service"<?php if((isset($_POST['site_background_jobs']))&&($_POST['site_background_jobs']=='service')){echo" selected";} else { if(isset($this->Settings['background_jobs'])&&$this->Settings['background_jobs']=="service"){ echo " selected"; } }?>><?= $this->Language->Field['Service'] ?></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="site_timezone" class="col-sm-2 col-form-label"><?= $this->Language->Field['Timezone'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-clock"></i>
                        </span>
                      </div>
                      <select class="form-control select2bs4" name="site_timezone" id="site_timezone">
                        <?php foreach($this->Timezones as $timezone) {?>
                          <option value="<?=$timezone?>"<?php if((isset($_POST['site_timezone']))&&($_POST['site_timezone']==$timezone)){echo" selected";} else { if(isset($this->Settings['timezone'])&&$this->Settings['timezone']==$timezone){ echo " selected"; } }?>><?=$timezone?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
    							<div class="form-group row">
    								<label class="col-sm-2 col-form-label"><?= $this->Language->Field['Sample Data'] ?></label>
    								<div class="icheck-primary col-sm-10">
                      <input type="checkbox" id="site_sample" name="site_sample" value="enabled" style="position: static !important;">
    									<label for="site_sample"><?= $this->Language->Field['Include'] ?></label>
                    </div>
                  </div>
                </p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#sql" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Language->Field['Back'] ?></button>
                <button type="button" data-target="#activation" data-toggle="collapse" aria-expanded="false"  class="btn btn-primary float-right"><?= $this->Language->Field['Next'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="activation">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Language->Field['Activation'] ?></h5>
              </div>
              <div class="card-body">
                <p class="card-text">
                  <div class="form-group row">
                    <label for="site_license" class="col-sm-2 col-form-label"><?= $this->Language->Field['Key'] ?></label>
                    <div class="col-sm-10 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-key"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX-XXXX-XXXX-XXXX-XXXX" id="activation_license" name="activation_license" value="<?php if(isset($_POST['site_license'])){ echo $_POST['site_license']; } else { if(isset($this->Settings['license'])){ echo $this->Settings['license']; } } ?>">
                    </div>
                  </div>
                </p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#site" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Language->Field['Back'] ?></button>
                <button type="button" data-target="#license" data-toggle="collapse" aria-expanded="false"  class="btn btn-primary float-right"><?= $this->Language->Field['Next'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="license">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Language->Field['License'] ?></h5>
              </div>
              <div class="card-body" style="max-height:500px;overflow:scroll;">
                <p class="card-text">
                  <?php include("LICENSE.html") ?>
                  <div class="form-group mb-0">
                    <div class="icheck-primary">
                      <input type="checkbox" id="license_term_field" name="license_term" style="position: static !important;">
                      <label for="license_term_field"><?= $this->Language->Field['I_have_read_this_License'] ?></label>
                    </div>
                  </div>
                </p>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#activation" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Language->Field['Back'] ?></button>
                <button type="button" id="reviewBTN" data-target="#review" data-toggle="collapse" aria-expanded="false"  class="btn btn-primary float-right"><?= $this->Language->Field['Next'] ?><i class="nav-icon fas fa-chevron-right ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="review">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Language->Field['Review_Configuration'] ?></h5>
              </div>
              <div class="card-body">
  							<div class="col-12">
  								<div class="card card-primary my-2">
  				          <div class="card-header">
  				            <h5 class="m-0"><?= $this->Language->Field['SQL_Database'] ?></h5>
  				          </div>
  				          <div class="card-body">
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Host</div>
  											<div class="col-8" id="DivSQL_host"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Database</div>
  											<div class="col-8" id="DivSQL_database"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Username</div>
  											<div class="col-8" id="DivSQL_username"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Password</div>
  											<div class="col-8" id="DivSQL_password"></div>
  										</div>
  									</div>
  								</div>
  								<div class="card card-primary my-2">
  				          <div class="card-header">
  				            <h5 class="m-0"><?= $this->Language->Field['Site_Configuration'] ?></h5>
  				          </div>
  				          <div class="card-body">
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Name</div>
  											<div class="col-8" id="DivSite_name"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Landing Page</div>
  											<div class="col-8" id="DivSite_landing"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Sync Mode</div>
  											<div class="col-8" id="DivSite_sync"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Timezone</div>
  											<div class="col-8" id="DivSite_timezone"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Sample Data</div>
  											<div class="col-8" id="DivSite_sample"></div>
  										</div>
  										<div class="row border-bottom pt-2">
  											<div class="col-4">License Terms</div>
  											<div class="col-8" id="DivSite_terms"></div>
  										</div>
  									</div>
  								</div>
  								<div class="card card-primary my-2">
  				          <div class="card-header">
  				            <h5 class="m-0"><?= $this->Language->Field['Activation'] ?></h5>
  				          </div>
  				          <div class="card-body">
  										<div class="row border-bottom pt-2">
  											<div class="col-4">Activation License</div>
  											<div class="col-8" id="DivSite_activation"></div>
  										</div>
  									</div>
  								</div>
  							</div>
              </div>
              <div class="card-footer">
                <button type="button" data-target="#license" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Language->Field['Back'] ?></button>
                <button type="submit" name="StartInstall" class="btn btn-success float-right"><?= $this->Language->Field['Install'] ?><i class="nav-icon far fa-play-circle ml-2"></i></button>
              </div>
            </div>
          </div>
          <div class="collapse" data-parent="#accordion" id="log">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0"><?= $this->Language->Field['Installation_Details'] ?></h5>
              </div>
              <div class="card-body p-0">
                <div class="progress" style="height: 48px;">
                  <div id="log_progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
                <div class="m-3 p-2 terminal"><p class="card-text" id="log_container"></p></div>
              </div>
              <div class="card-footer">
                <button type="button" data-action="back" data-target="#welcome" data-toggle="collapse" aria-expanded="false"  class="btn btn-default"><i class="nav-icon fas fa-chevron-left mr-2"></i><?= $this->Language->Field['Back'] ?></button>
                <a href="<?=$this->URL?>" data-action="login" class="btn btn-success float-right">
                  <?= $this->Language->Field['Sign_In'] ?><i class="nav-icon fas fa-sign-in-alt ml-2"></i>
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
		$('#DivSQL_host').html($(document.getElementById("sql_host")).val());
		$('#DivSQL_database').html($(document.getElementById("sql_database")).val());
		$('#DivSQL_username').html($(document.getElementById("sql_username")).val());
		$('#DivSQL_password').html($(document.getElementById("sql_password")).val());
		$('#DivSite_name').html($(document.getElementById("site_name")).val());
		$('#DivSite_landing').html($(document.getElementById("site_page")).find('option:selected').text());
		$('#DivSite_sync').html($(document.getElementById("site_background_jobs")).find('option:selected').text());
		$('#DivSite_timezone').html($(document.getElementById("site_timezone")).find('option:selected').text());
		$('#DivSite_sample').html($(document.getElementById("site_sample")).checked);
		$('#DivSite_activation').html($(document.getElementById("activation_license")).val());
		$('#DivSite_terms').html($(document.getElementById("license_term_field")).checked);
	});
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

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
          $('#log_container').html("");
          $('#log').collapse('show');
          var max = parseInt(data);
          var now = 0;
          var error = 0;
          function setProgress(value){
            var progress = Math.round(((value / max) * 100));
            // console.log('error: ', error,'progress: ', progress,'attr: ', parseInt($('#log_progress').attr('aria-valuenow')),parseInt(progress) == parseInt($('#log_progress').attr('aria-valuenow')));
            if(parseInt(progress) == parseInt($('#log_progress').attr('aria-valuenow'))){ error++; } else { error = 0; }
            $('#log_progress').attr('aria-valuenow',progress).width(progress+'%').html(progress+'%');
            if(site_sample){ $('#log_progress').append(' - This may take a while'); }
            switch(true){
              case (0 <= error &&  error < 15): $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated");break;
              case (15 <= error &&  error < 30): $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-info");break;
              case (30 <= error &&  error < 60): $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-lightblue");break;
              case (60 <= error &&  error < 120): $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-navy");break;
              case (120 <= error &&  error < 180): $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-warning");break;
              case (180 <= error &&  error < 240): $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-orange");break;
              case (240 <= error): $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated bg-danger").html(progress+"% - It's been a while");break;
            }
          }
          setProgress(now);
          var checkLog = setInterval(function(){
            $.ajax({
              url : "/tmp/install.log",
              dataType:"text",
              success:function(data){
                $('#log_container').html(data.replace(/\n/g, "<br>"));
                now = 0;
                if(data.includes("SQL Database Connexion Successfull!")){ now++; }
                if(data.includes("Removing existing tables from the database")){ now++; }
                if(data.includes("Database has been cleared")){ now++; }
                if(data.includes("Database structure was added successfully")){ now++; }
                if(data.includes("Database default records were created successfully")){ now++; }
                now = now + (data.match(new RegExp(" is already installed", "g")) || []).length;
                now = now + (data.match(new RegExp(" has been installed", "g")) || []).length;
                now = now + (data.match(new RegExp(" was updated", "g")) || []).length;
                now = now + (data.match(new RegExp(" was created", "g")) || []).length;
                now = now + (data.match(new RegExp("Records imported in ", "g")) || []).length;
                if(data.includes("Installation has completed successfully")){
                  now++;
                  setProgress(now);
                  if(now >= max){
                    setProgress(max);
                    clearInterval(checkLog);
                    $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated");
                    $('#log_progress').addClass('bg-success').html('Completed');
                    $('a[data-action="login"]').show();
                  }
                } else { setProgress(now); }
                if(data.includes("Application is already installed")||data.includes("Unable to activate the application, verify you license key")||data.includes("Unable to connect to SQL Server")||data.includes("Unable to import the database structure")||data.includes("Unable to import the database default records")){
                  clearInterval(checkLog);
                  setProgress(max);
                  $('#log_progress').attr("class", "progress-bar progress-bar-striped progress-bar-animated").addClass('bg-danger').html('Error');
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
    return /^[A-Za-z0-9\d=!\-+@._*]*$/.test(value) // consists of only these
      && /[a-z]/.test(value) // has a lowercase letter
      && /[A-Z]/.test(value) // has a uppercase letter
      && /\d/.test(value) // has a digit
  });
  var rules = {
    sql_host: {
      required: true,
    },
    sql_database: {
      required: true,
    },
    sql_username: {
      required: true,
    },
    sql_password: {
      required: true,
    },
    license_term: {
      required: true,
    },
    site_name: {
      required: true,
    },
    site_page: {
      required: true,
    },
    site_background_jobs: {
      required: true,
    },
    site_timezone: {
      required: true,
    },
  };
  <?php if($this->Settings['lsp']['required']){ ?>
    rules.activation_license = { required: true };
  <?php } ?>
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
      $('#log_container').html("");
      $('#log').collapse('show');
      var sql_host = document.getElementById("sql_host").value;
      var sql_database = document.getElementById("sql_database").value;
      var sql_username = document.getElementById("sql_username").value;
      var sql_password = document.getElementById("sql_password").value;
      var site_name = document.getElementById("site_name").value;
      var site_sample = document.getElementById("site_sample").checked;
      var site_page = document.getElementById("site_page").value;
      var site_background_jobs = document.getElementById("site_background_jobs").value;
      var site_timezone = document.getElementById("site_timezone").value;
      var activation_license = document.getElementById("activation_license").value;
      var serverid = "<?php echo $_SERVER['SERVER_SOFTWARE'].$_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_FILENAME'].$_SERVER['GATEWAY_INTERFACE'].$_SERVER['PATH']; ?>"
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = {
        sql_host: sql_host,
        sql_database: sql_database,
        sql_username: sql_username,
        sql_password: sql_password,
        site_name: site_name,
        site_sample: site_sample,
        site_page: site_page,
        site_background_jobs: site_background_jobs,
        site_timezone: site_timezone,
        activation_license: activation_license,
        serverid: serverid,
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
