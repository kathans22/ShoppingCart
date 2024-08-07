<html>
    <head>
        <title>
            Login Form
        </title>
        <link rel="stylesheet" href="adminmain.css">
      </head>
      <body>
      
      <div class = "img-area"></div>
      
      <div class="container">
        
        <h2 class="form-title">Login</h2>
        <!--  -->
        <form id="submit-form" method="POST">
          
          <div class="form-group">
            <input type = "text" class="form-control" id="username" placeholder="Enter your user name" name="username" required>
            <br/>
          </div>
          
          <div id="usererror"></div>

          
          <div class="form-group">
            <input type="password" class="form-control" id="pass" placeholder="Enter your password here" name="pass" maxlength="20" required>
          </div>

          <div id="usererror1"></div>
          
          <br><Br>
          
          <div id = "center" align="center">

            <img src="captcha.php"><br>&nbsp;&nbsp;
            <br/>
            <input type="text" name="captcha" id = "captcha">

            <br><Br>
          
            <input type="button" id="submit-btn" class="btn btn-default button-4" value = "Submit"></button>
            <br/><br/>
          </div>

          <div id = "error" align="center"></div>
          <br/>
          <p class="form-text">
            <a href="signup.php" class="form__link" id="linksignup"> : New User? :- Sign Up</a>
            <br>Or<br> 
            <a href="customer.php" class="form__link" id="link-customer-website"> : Visit Website Without Log-In</a>
          </p><br>
          <p class="form-text">
            <a href="#" class="form__link"> : Forgot your password?</a>
          </p>
        </form>
      </div>
      
      <script src = "jquery.js"></script>
      
      <script type="text/javascript">
        $(document).ready(function(){

          function load(){
            location.reload(true);
          }

          $("#submit-btn").on("click",function(e){
            e.preventDefault();

            var username = $("#username").val();
            var pass = $("#pass").val();
            //var length = pass.length;


            //alert(pass);

            if(username == "")
            {
              $("#username").focus();
              $("#usererror").html("Pls enter Your User-Name");
            }
            else
            {
              $("#usererror").html("");
            }


            if(pass == "")
            {
              $("#pass").focus();
              $("#usererror1").html("Pls enter Your Password value");
              //alert("blank");
            }
            else
            {
              $("#usererror1").html("");
            }

            if(username != "" && pass != "")
            {
              $.ajax({
                url : "logincheck.php",
                type : "POST",
                data : $("#submit-form").serialize(),
                success : function(data){
                  //alert(data);

                  if(data != 0)
                  {
                    if(data == "admin")
                    {
                      window.location.href = "admin.php";
                    }
                    else
                    {
                      window.location.href = "customer.php";
                    }
                  }
                  else
                  {
                    $("#error").html("Invalid user");

                    setTimeout(load,2000);

                  }
                }
              });
            }


          });

          //----------------------------------------
        
        });

        //------------------------------------------

      </script>
      
      </body>
      </html>