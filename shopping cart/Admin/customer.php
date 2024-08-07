<?php 
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="showcart.css"> -->
    <link rel="stylesheet" href="showcart1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

        <title>main page</title>
        <style>
        ::placeholder {
            text-align: center;
        }
        </style>
</head>

<body>
    <div class="side-bar">
        <div class="menu">
            <div class="item">
                <a>
                    <i class="fas fa-search"></i>
                    <input type="text" name="search-cust-product" id="search-cust-product"
                        style="height: 30px; width:180px;border : 0px solid gray;border-radius: 10px;"
                        placeholder="Search">
                </a>
            </div>
            <div class="item"><a id="home"><i class="fas fa-home"></i>HOME</a></div>
            <div class="item">
                <a class="sub-btn"><i class="fas fa-th"></i>CATEGORY<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu" id="category-menu">
                </div>
            </div>
            <div class="item"><a id="showcart"><i class="fas fa-shopping-cart"></i>CART</a></div>
            <div class="item"><a><i class="fas fa-info-circle"></i>ABOUT</a></div>

            <div class="item">
                <a class="sub-btn" id="usernamelinkid"
                    data-unid="<?php if(!isset( $_SESSION['username'])){echo "guest";}else{echo $_SESSION['username'];}?>">
                    <i class="fas fa-th"></i>
                    <?php 
            		if(!isset($_SESSION['username']))
                    {
	                    echo "Guest User";
                    }
                    else
                    {
                    	echo $_SESSION['username'];
            		    
                    }
            		
            		?>
                </a>
                <div class="sub-menu">
                    <a class="sub-item" id="userlinkid"
                        data-lid="<?php if(!isset( $_SESSION['userid'])){echo "guest";}else{echo $_SESSION['userid'];}?>"
                        style="display:none;">
                        <?php 
		            		if(!isset( $_SESSION['userid']))
		                    {
			                    echo "Guest User";
		                    }
		                    else
		                    {
		            		    echo "User-ID :- ".$_SESSION['userid'];;
		                    }	            		
		            		?>
                    </a>
                </div>
            </div>
            <div class="item" id="logout"><a href="logout1.php"><i class="fa fa-sign-out"
                        style="color:red"></i>LogOut</a></div>
            <div class="item" id="signup"><a href="signup.php"><i class="fa fa-user" style="color:red"></i>Sign Up</a>
            </div>
            <div class="item" id="login"><a href="adminlogin.php"><i class="fa fa-user-circle" style="color:red"></i>Log
                    in</a></div>
        </div>
    </div>
    <div class="right-bar">
        <div class="container" id="main-data">
            <h5 style="padding: 20px;">HOME</h5>
            <div class="row equal" id="productdata"></div>
        </div>

        <div class="container" id="showingcart">
            <h1 style="padding: 10px;">Shopping Cart</h1>

            <div class="cart" id="cart">
            </div>
            <!-- // cart end
 -->
        </div> <!-- // showing cart end -->


        <div id="updateform">
            <div
                style="margin-top: 15%;margin-left: 250px;margin-right: 250px;margin-bottom: 5%;border: 7px solid white;border-radius: 10px;">
                <!-- update form -->

                <form id="main-form" method="post" enctype="multipart/form-data"
                    style="background-color: rgba(255, 255, 255, 0.1);backdrop-filter: blur(15px);padding: 40px;">
                    <div class="form-group">
                        <label>Email-Id : </label>
                        <input type="email" id="update-email" name="update-email" class="form-control">
                        <label>Phno : </label>
                        <input type="number" id="update-phno" name="update-phno" class="form-control">
                        <label>UserName : </label>
                        <input type="text" id="update-username" name="update-username" class="form-control">
                        <label>Password : </label>
                        <input type="password" id="update-password" name="Update-password" class="form-control"><br>
                        <center>
                            <button class="btn btn-sm btn-primary" id="update-user" name="update-user">UPDATE
                                DATA</button>
                        </center>
                    </div>
                </form>





            </div> <!-- update from -->
            <br><br>

            <div>
                
				


            </div>





        </div>






    </div>





    </div>
</body>
<script src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    function loadrefresh() {
        location.reload(true);
    }

    //------------------------------------- toggles event

    function dataappend(data) {
        for (var i = 0; i < data.length; ++i)
            $('#productdata').append(
                '<div class="col-sm-4 d-flex pb-3"><div class="card" style="width: 18rem;"><img class="card-img-top" src="' +
                data[i].pimage +
                '" alt="Card image cap"><div class="card-body" style="color: black"><h5 class="card-title"> price : ' +
                data[i].price + '</h5><p class="card-text"> Product Name : ' + data[i].pname +
                '</h5><p class="card-text"> Product Category : ' + data[i].category +
                '</p><button class="add-cart btn btn-primary" data-id="' + data[i].pid +
                '">ADD CART</button></div></div></div>');
    }

    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------




    function loadtable() {

        $("#showingcart").hide();
        $("#main-data").show();
        $("#updateform").hide();

        $("#productdata").html("");



        $.ajax({
            url: "custdisplay.php",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                /*for (var i=0;i<data.length;++i)
                $('#productdata').append('<div class="col-sm-4 d-flex pb-3"><div class="card" style="width: 18rem;"><img class="card-img-top" src="'+ data[i].pimage+'" alt="Card image cap"><div class="card-body" style="color: black"><h5 class="card-title"> price : '+data[i].price+'</h5><p class="card-text"> Product Name : '+data[i].pname+'</h5><p class="card-text"> Product Category : '+data[i].category+'</p><button class="add-cart btn btn-primary" data-id="'+ data[i].pid+'">ADD CART</button></div></div></div>');*/
                dataappend(data);
            }
        });

        $('#category-menu').html("");

        $.ajax({
            url: "fetchcategory.php",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                //console.log(data)
                for (var i = 0; i < data.length; ++i)
                    $('#category-menu').append('<a class="sub-item" data-id="' + data[i].category +
                        '"  >' + data[i].category + '</a>');
            }
        });


    }
    loadtable();

    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------

    //-------------------------- home click evet

    $("#home").on("click", function() {
        loadtable();
    });

    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------

    //---------------------------------------------------category wise display

    $(document).on("click", ".sub-item", function() {

        $("#showingcart").hide();
        $("#main-data").show();
        $("#updateform").hide();


        var id = $(this).data("id");
        //alert(id);

        $('#productdata').html("");

        $.ajax({
            url: "categorywise.php",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data) {
                //console.log(data)
                /*for (var i=0;i<data.length;++i)
                	$('#productdata').append('<div class="col-sm-4 d-flex pb-3"><div class="card" style="width: 18rem;"><img class="card-img-top" src="'+ data[i].pimage+'" alt="Card image cap"><div class="card-body" style="color: black"><h5 class="card-title"> price : '+data[i].price+'</h5><p class="card-text"> Product Name : '+data[i].pname+'</h5><p class="card-text"> Product Category : '+data[i].category+'</p><button class="add-cart btn btn-primary" data-id="'+ data[i].pid+'">ADD CART</button></div></div></div>');*/
                dataappend(data);
            }
        });

    });

    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------
    //---------------------------------------------------------

    //check add-to-cart -----------------------------------------------------------------------


    var pid;
    var lid;
    var unid;

    $(document).on("click", ".add-cart", function() {
        pid = $(this).data("id");
        //alert(pid);

        lid = $("#userlinkid").data("lid");
        unid = $("#usernamelinkid").data("unid");
        //alert("welcome : "+unid+ " here is your unique ID : "+lid);

        if (lid == "guest" || unid == "guest") {
            alert("You Need To Login To Access Cart");
            window.location.href = "adminlogin.php";

        } else {
            $.ajax({
                url: "carttb.php",
                type: "POST",
                data: {
                    unid: unid,
                    pid: pid
                },
                // dataType : "JSON",
                success: function(data) {
                    //console.log(data);
                    //alert(data);
                    if (data == "Successfully Added To cart") {
                        alert(data);
                    } else if (data == "Not Added To Cart") {
                        alert(data);
                    } else if (data == 0) {
                        alert("Product Alreday Exists In Your Cart");
                        setTimeout(loadrefresh, 1000);
                    }
                }
            }); //ajax
        }
    });


    //---------------------------------------------------------------

    function scart() {
        var unid = $("#usernamelinkid").data("unid");
        // alert(unid);
        $("#showingcart").html("");
        //$('#cart').html("");
        $.ajax({
            url: "showcart.php",
            type: "POST",
            data: {
                unid: unid
            },
            dataType: "JSON",
            success: function(data) {
                //console.log(data);
                //alert(data.length);
                //var result = data.split(" ");
                //console.log(result);
                $("#showingcart").append('<h1 style = "padding: 10px;">Your Cart</h1>'); //
                $("#showingcart").append('<div class="cart" id = "cart"></div>');
                $("#cart").append('<div class="products" id = "products"></div>');
                var j = 0;
                for (var i = 0; i < data.length - 3; i++) {
                    $('#products').append('<div class="product"><img src="' + data[i].pimage +
                        '"><div class="product-info"><h3 class="product-name">' + data[i]
                        .pname + '</h3><h4 class="product-price">' + data[i].price +
                        '</h4><p class="product-quantity">Qnt: <input id = "' + data[i].pid +
                        '" value="' + data[data.length - 2][i].qty +
                        '"></p><button class = "btn btn-primary update-show-cart" id = "update-show-cart" data-puid="' +
                        data[i].pid +
                        '">Update</buttton><button class = "btn btn-danger delete-show-cart" id = "delete-show-cart" style = "float:right;" data-rid="' +
                        data[i].pid + '">remove</buttton></div></div>');
                    //j++;
                }

                // $("#cart").append('</div>');
                if (data.length == 3)
                    $("#cart").append(
                        '<div class="cart-total"><p><span>Total Price</span><span>₹ 0</span></p><p><span>Number of Items</span><span> 0 </span></p><div class="d-grid gap-2 clearall"><button class="btn btn-warning"><b><i class="fas fa-trash"></i>&nbsp;Remove All</b></button></div></div>'
                    );
                else
                    $("#cart").append('<div class="cart-total"><p><span>Total Price</span><span>₹' +
                        data[data.length - 1][j].payprice +
                        '</span></p><p><span>Number of Items</span><span>' + data[data.length - 3][
                            j
                        ].total +
                        '</span></p><div class="d-grid gap-2 clearall"><button class="btn btn-warning"><b><i class="fas fa-trash"></i>&nbsp;Remove All</b></button></div></div>'
                    );
                //data[data.length - 1][j].payprice
                if (data.length > 3)
                    $("#showingcart").append(
                        '<div class="d-grid gap-2 order"><br><br><div align="center" id ="pay"><table> <tr><td>Enter your Credit Card Number :- &nbsp;&nbsp;&nbsp;</td><td><input type = "text" id = "cno"></td></tr><tr><td>Enter your CVV :- </td><td><input type = "text" id = "cvv"></td></tr><tr><td>Total Payment :- &nbsp;&nbsp;&nbsp;</td><td><input type = "text" id = "payprice" value = "' +
                        data[data.length - 1][j].payprice +
                        '" readonly></td></tr></table></ div><br><br><br><br><button style = "margin-top:10px;" id ="confirmorder" class="btn btn-primary" data-btnid = "' +
                        unid + '"><b>Confirm Order</b></button></div><br><br><br><br>');
            }
        });
    }



    //-----------------show cart // guest check karavo -- done

    $("#showcart").on("click", function() {

        $("#main-data").hide();
        $("#showingcart").show();
        $("#updateform").hide();

        lid = $("#userlinkid").data("lid");
        var unid = $("#usernamelinkid").data("unid");

        if (lid == "guest" || unid == "guest") {
            alert("You Need To Login To Access Cart");
            window.location.href = "adminlogin.php";

        } else {
            scart();
        }



        /*var unid = $("#usernamelinkid").data("unid");
        	alert(unid);
        	//$('#showingcart').html("");
        	$('#cart').html("");
        	$.ajax({
				url : "showcart.php",
				type : "POST",
	        	data : {unid : unid},
				dataType : "JSON",
				success : function(data){
					console.log(data);
					alert(data.length);
					//var result = data.split(" ");
					//console.log(result);
					$("#cart").append('<div class="products" id = "products"></div>');
					var j = 0;
						for (var i=0;i<data.length-3;i++)
						{
						$('#products').append('<div class="product"><img src="'+data[i].pimage+'"><div class="product-info"><h3 class="product-name">'+data[i].pname+'</h3><h4 class="product-price">'+data[i].price+'</h4><p class="product-quantity">Qnt: <input value="'+data[data.length-2][i].qty+'" name=""></p><button class = "btn btn-primary update-show-cart" id = "update-show-cart" data-puid="'+data[i].id+'">update</buttton><button class = "btn btn-danger delete-show-cart" id = "delete-show-cart" style = "float:right;" data-rid="'+data[i].id+'">remove</buttton></div></div>');
						//j++;
						}

						// $("#cart").append('</div>');
					    $("#cart").append('<div class="cart-total"><p><span>Total Price</span><span>₹'+data[data.length-1][j].payprice+'</span></p><p><span>Number of Items</span><span>'+data[data.length-3][j].total+'</span></p></div>');
				}
			});*/



    });


    //------------------------------------------------------------------------------------------------------------------------------- update qty

    // gloabal

    // pid //lid // unid

    // ---------------------- delete - show -cart
    $(document).on("click", ".delete-show-cart", function() {

        var rid = $(this).data("rid");

        var unid = $("#usernamelinkid").data("unid");
        //alert(rid + " " + unid);

        $.ajax({
            url: "delete-cart.php",
            type: "POST",
            data: {
                unid: unid,
                rid: rid
            },
            //dataType
            success: function(data) {
                if (data == 1) {
                    scart();
                } else {
                    alert("Not Deleted");
                }

            }
        });
    });

    //------------------------- update cart

    $(document).on("click", ".update-show-cart", function() {

        var puid = $(this).data("puid");

        var unid = $("#usernamelinkid").data("unid");

        var qty = $("#" + puid).val();





        //alert(puid + " " + unid + " " + qty);

        $.ajax({
            url: "update-cart.php",
            type: "POST",
            data: {
                unid: unid,
                puid: puid,
                qty: qty
            },
            //dataType
            success: function(data) {
                //alert(data);
                if (data == 1) {
                    scart();
                } else {
                    alert("Not Updated");
                }

            }
        });
    });



    //---------------- refresh page 

    $('.sub-btn').click(function() {
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
        loadtable();
    });

    //------------------------------------------------- updates functionality

    //----------------- fetch-1 details for update;


    $("#usernamelinkid").on("click", function() {
        $("#main-data").hide();
        $("#showingcart").hide();
        $("#updateform").show();

        lid = $("#userlinkid").data("lid");
        var unid = $("#usernamelinkid").data("unid");


        if (lid == "guest" || unid == "guest") {
            alert("You Need To Login To Access Cart");
            window.location.href = "adminlogin.php";

        } else {
            alert("you click for update");
        }



        lid = $("#userlinkid").data("lid");

        var unid = $("#usernamelinkid").data("unid");

        //alert(lid + " "+unid);

        $.ajax({
            url: "update-fetch-1.php",
            type: "POST",
            data: {
                lid: lid,
                unid: unid
            },
            dataType: "JSON",
            success: function(data) {
                //console.log(data);
                //alert(data);
                $("#update-email").val(data[0].email);
                $("#update-phno").val(data[0].phno);
                $("#update-username").val(data[0].username);
                $("#update-password").val(data[0].password);


            }
        });

    });

    $("#update-user").on("click", function(e) {
        e.preventDefault();

        var uemail = $("#update-email").val();
        var uphno = $("#update-phno").val();
        var uusername = $("#update-username").val();
        var upassword = $("#update-password").val();
        lid = $("#userlinkid").data("lid");

        //alert(uemail + " "+ uusername + " " + upassword);

        if (uemail == "") {
            alert("pls enter your email");
            $("#update-email").focus();
        }
        if (uphno == "") {
            alert("pls enter your phno");
            $("#update-phno").focus();
        }
        if (uusername == "") {
            alert("pls enter your username");
            $("#update-username").focus();
        }
        if (upassword == "") {
            alert("pls enter your password");
            $("#update-password").focus();
        }

        if (uemail != "" && uusername != "" && upassword != "") {
            $.ajax({
                url: "update-customer-details.php",
                type: "POST",
                data: {
                    id: lid,
                    email: uemail,
                    phno: uphno,
                    username: uusername,
                    password: upassword
                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        alert("Details Updated");
                    } else {
                        alert("Record Not Updated");
                    }
                }
            })
        }

    });


    //--------------------------- search products

    $("#search-cust-product").on("keyup", function() {

        $("#main-data").show();
        $("#showingcart").hide();
        $("#updateform").hide();

        var search_term = $(this).val();
        //alert(search_term);
        $('#productdata').html("");

        $.ajax({
            url: "search-cust-product.php",
            type: "POST",
            data: {
                search: search_term
            },
            dataType: "JSON",
            success: function(data) {
                //alert(data);
                if (data) {
                    dataappend(data);
                } else {
                    alert("No Search Found");
                }
            }
        });

    });

    // loads logout for main customer and guest

    function loadlogout() {
        lid = $("#userlinkid").data("lid");
        var unid = $("#usernamelinkid").data("unid");

        if (lid == "guest" || unid == "guest") {

            $("#logout").hide();
            $("#signup").show();
            $("#login").show();
        } else {
            $("#logout").show();
            $("#signup").hide();
            $("#login").hide();
        }

    }

    loadlogout();

    //------------------------------------ ordertb logic here confirm order


    // $(document).on("click",".order",function(){
    // 	var unid = $("#usernamelinkid").data("unid");
    // 	//alert(unid);

    // 	if(confirm('Are You Sure You Want To Place Order?') == true)
    // 	{
    // 			$.ajax({
    // 			url : "confirmorder.php",
    // 			type : "POST",
    // 			data : {unid : unid},
    // 			success : function(data){
    // 				//alert(data);
    // 				if(data == 1)
    // 				{
    // 					alert("Order Placed \n Continue Shopping");
    // 					scart();
    // 				}
    // 				else
    // 				{
    // 					alert("Order Not Placed");
    // 				}
    // 			}
    // 		});

    // 	}
    // 	else
    // 	{
    // 		alert("Continue Shopping");
    // 	}


    // });

    $(document).on("click", "#confirmorder", function() {



        var unid = $("#usernamelinkid").data("unid");

        var flag = 1;

        var cno = $("#cno").val();

        var cvv = $("#cvv").val();

        var un =
            "<?php if(!isset($_SESSION['username'])){echo "Guest User";}else{echo $_SESSION['username'];}?>";

        if (cno == "") {
            $("#cno").focus();
            alert("credit number is required");
            flag = 0;
        }

        if (cno.length < 12) {
            $("#cno").focus();
            alert("credit number should contain 12 digits");
            flag = 0;
        }

        if (cvv == "") {
            $("#cvv").focus();
            alert("cvv is required for transaction");
            flag = 0;
        }

        if (cvv.length < 3) {
            $("#cvv").focus();
            alert("cvv number should contain 3 digits");
            flag = 0;
        }

        if (flag == 1) {
            if (confirm('Are You Sure You Want To Place Order?') == true) {
                $.ajax({
                    url: "payment.php",
                    type: "POST",
                    data: {
                        cno: cno,
                        cvv: cvv,
                        un: un
                    },
                    success: function(data) {
                        //alert(data);
                        if (data == 1) {

                            //alert("insert");
                            //scart();
                            $.ajax({
                                url: "confirmorder.php",
                                type: "POST",
                                data: {
                                    unid: unid
                                },
                                success: function(data) {
                                    //alert(data);
                                    if (data == 1) {
                                        alert(
                                            "Order Placed \n Continue Shopping"
                                        );
                                        scart();
                                        //$("#cno").val("");
                                        //$("#cvv").val("");
                                        //$("#payprice").val("");
                                    } else {
                                        alert("Order Not Placed");
                                    }
                                }
                            });

                        } else {
                            alert("Error in transaction");
                        }
                    }
                });

            } else {
                alert("Continue Shopping");
            }
        }
    });

    //------------------------------------ remove all



    $(document).on("click", ".clearall", function() {
        var unid = $("#usernamelinkid").data("unid");
        //alert(unid);

        if (confirm('Are You Sure You Want To Clear The Cart?') == true) {
            $.ajax({
                url: "remove-all.php",
                type: "POST",
                data: {
                    unid: unid
                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        alert("Cart Empty");
                        scart();
                    } else {
                        alert("Order Not Placed");
                    }
                }
            });

        } else {
            alert("Continue Shopping");
        }

    });

});
</script>

</html>