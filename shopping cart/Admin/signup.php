<html>
    <head>
        <title>
            Sign-Up Form
        </title>
        <link rel="stylesheet" href="adminmain.css">
      </head>
      <body>
      
      <div class = "img-area"></div>
      
      <div class="container">
        
        <h2 class="form-title">Signup Form</h2>
        <!--  -->
        <form id="submit-signupform" method="POST">

          <div class="form-group">
            <input type = "text" class="form-control" id="email" placeholder="Enter your E-mail" name="email" required>
            <br/>
          </div>
          
          <div id="emailerror"></div>
          <!-- -->

          <div class="form-group">
            <input type = "number" class="form-control" id="phno" placeholder="Enter your Contact-No" name="phno" required>
            <br/>
          </div>
          
          <div id="phnoerror"></div>
          
          <!-- -->
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

            <img src="captcha.php"><br/><br>
            <input type="text" name="captcha" id = "captcha">

            <br><Br>
          
            <input type="button" id="submit-btn" class="btn btn-default button-4" value = "Submit"></button>
            <br/><br/>
          </div>

          <div id = "error" align="center"></div>
          <br/>
          <p class="form-text">
            <a class="form-link" href="adminlogin.php" id="linkLogin">Already have an account? Sign in</a>
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

            var email = $("#email").val();
            var phno = $("#phno").val();
            var username = $("#username").val();
            var pass = $("#pass").val();
            //var length = pass.length;

            if(email == "")
            {
              $("#email").focus();
              $("#emailerror").html("Pls enter Your E-mail");
            }
            else
            {
              $("#emailerror").html("");
            }

            if(phno == "")
            {
              $("#phno").focus();
              $("#phnoerror").html("Pls enter Your Contact number");
            }
            else
            {
              $("#phnoerror").html("");
            }

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
              $("#usererror1").text("Pls enter Your Password value");
              alert("blank");
            }
            else
            {
              $("#usererror1").html("");
            }

            if(email != "" && username != "" && pass != "")
            {
              $.ajax({
                url : "signup-insert.php",
                type : "POST",
                data : $("#submit-signupform").serialize(),
                success : function(data){
                  //alert(data);

                  if(data == 1)
                  {
                    alert("User You Are Registered Successfully On Our Website");
                    window.location.href = "adminlogin.php";
                  }
                  else
                  {
                    $("#error").html("User You Are Not Registered Successfully On Our Website Or else Captcha Code Is Wrong Please Wait For Seconds We Reload The Page So you Can Start With Sign up Again");

                    setTimeout(load,5000);

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