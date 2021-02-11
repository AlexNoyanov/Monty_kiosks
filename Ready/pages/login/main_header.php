<div class="login-box">
  <div class="login-logo">
    <a href="../../pages/dashboard2/"><b>Monty</b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="process.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="User">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
  </div>
    
    <style>
    .mystyle {
            background-color:#e0e0eb;
    }
    </style>
<!-- 
    <div  id="cookieDiv" class="mystyle">
<p>This site uses cookie. Please accept <button onclick="myFunction()">Accept</button>
    </p></div>

    <script>
    function myFunction() {
      var element = document.getElementById("cookieDiv");
      element.classList.remove("mystyle");

            $("p").remove();
         
    }

    
    </script> -->

  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
