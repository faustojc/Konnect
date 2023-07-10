<?php
login_header();
?>
<style>
  .login-box{
    width: 360px;
    margin: 7% auto;
  }
  .wrapper{
    height: 100%;
    position: relative;
    overflow-x: hidden;
    overflow-y: auto;
  }
  .atag{
    background-color: Crimson;  
    border-radius: 5px;
    color: white;
    padding: .5em;
    text-decoration: none;
  }

  .atag:focus,
  .atag:hover {
    background-color: FireBrick;
    color: White;
  }
</style>
<!-- ############ PAGE START-->
<div class="wrapper">
  <div class="login-box">
    <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-12" style="text-align: center;">
                  <h1 class="m-0">OFFICE OF THE BUILDING OFFICIAL</h1>
              </div>
          </div>
      </div>
    </div>
    <div class="card-body">
      <!-- <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter Username">
      </div> 
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
      </div>
      -->
      <label for="username">Username</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
        </div>
        <input type="text" class="form-control" id="username" placeholder="Enter Username">
      </div>
      
      <label for="username">Password</label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
        </div>
        <input type="password" class="form-control" id="password" placeholder="Password">
      </div>
    </div>

    <div class="card-footer">
      <div class="row">
        <div class="col-2">
        </div>
        <div class="col-2">
        </div>
        <div class="col-5">
          <a href = "<?php echo base_url()?>Client_login/authentication" class="atag" style="margin: 7% auto;">client login</a>
        </div>
        <div class="col-3">
          <button type="button" class="btn btn-primary" style="margin: 7% auto;" id="loginBtn">Login</button>
        </div>
      </div>
    </div>`
  </div>
</div>       

<!-- ############ PAGE END -->
<?php
login_footer();
?>
<script src="<?php echo base_url()?>/assets/js/obo_login/obo_login.js"></script>