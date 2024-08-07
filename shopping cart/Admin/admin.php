<?php 
session_start();

if(!isset($_SESSION['adminusername']))
{
	header("Location: adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="adminstyle.css"> -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <!-- <script type="text/javascript" src = "jspdf.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script> -->

    <style>
    .flex-container {
        display: flex;
    }

    .flex-container .card {
        max-width: 18rem;
        margin: 10px;
        padding: 20px;
        width: 500px
    }

    .flex-container .card .card-header {
        color: black;
    }

    .flex-container .card .card-title {
        color: black;
    }

    .flex-container .card .card-text {
        color: black;
    }

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
                    <input type="text" name="global-search" id="global-search"
                        style="height: 30px; width:180px;border : 0px solid gray;border-radius: 10px;"
                        placeholder="Global Search">
                </a>
            </div>

            <div class="item"><a id="dashboard"><i class="fas fa-th"></i>Dashboard</a></div>

            <div class="item"><a id="home"><i class="fas fa-home"></i>Home</a></div>

            <div class="item"><a id="add-products"><i class="fa fa-amazon"></i>Add Products</a></div>

            <div class="item"><a id="user-management"><i class="far fa-address-book"></i>Manage User</a></div>

            <div class="item">
                <a class="sub-btn"><i class="fas fa-th"></i>Category<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu" id="category-menu">
                </div>
            </div>

            <div class="item"><a id="category-delete"><i class="fas fa-trash"></i>Category Deletion</a></div>

            <!--             <div class="item"><a id="showcart"><i class="fas fa-shopping-cart"></i>Cart</a></div>-->
            <div class="item"><a id="manage-order"><i class="fas fa-trash"></i>Manage Order</a></div>

            <div class="item">
                <a class="sub-btn" id="usernamelinkid">
                    <i class="fas fa-th"></i>
                    <?php echo $_SESSION['adminusername']; ?>
                </a>
            </div>
            <div class="item" id="logout"><a href="logout.php"><i class="fa fa-sign-out"
                        style="color:red"></i>LogOut</a></div>
        </div>
    </div>

    <div class="right-bar">
        <div class="alldetail">
            <div class="container">
                <!-- <div class="col-sm-2 d-flex pb-2"> -->
                <h2 style="padding: 15px;">Dashboard</h2>
                <div class="flex-container">
                    <div class="card text-white bg-primary mb-3 allproduct">
                        <div class="card-header">Product</div>
                        <div class="card-body">
                            <h5 class="card-title">Total Product</h5>
                            <p class="card-text" id="totalproduct">100</p>
                        </div>
                    </div>
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Users</div>
                        <div class="card-body">
                            <h5 class="card-title">Total users</h5>
                            <p class="card-text" id="totalusers">100</p>
                        </div>
                    </div>
                    <div class="card bg-light mb-3">
                        <div class="card-header">Category</div>
                        <div class="card-body">
                            <h5 class="card-title">Total category</h5>
                            <p class="card-text" id="totalcategory">100</p>
                        </div>
                    </div>
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">Order</div>
                        <div class="card-body">
                            <h5 class="card-title">Total order</h5>
                            <p class="card-text" id="totalorder">100</p>
                        </div>
                    </div>

                </div>
                <!-- </div> -->
            </div>
        </div><br><br>
        <hr>

        <div class="container" id="main-data1">
            <div id="productsdiv">

                <div id="header">
                    <h1 align="center">Search Panel :-</h1>

                    <div id="search-bar" align="center">
                        <label>Search :</label>
                        <input type="text" name="search" id="search" autocomplete="off">
                    </div><br>
                    <hr>
                    <hr>
                </div>

                <!--  -->


                <div id="table-align">

                    <div align="center">

                        <form id="addform" action="insert.php" method="POST" enctype="multipart/form-data">

                            Product ID : <input type="text" name="pid" id="pid">
                            <div id="piderror"></div><br><br>

                            Product Name : <input type="text" name="pname" id="pname">
                            <div id="pnameerror"></div><br><br>

                            Product Price : <input type="number" name="price" id="price">
                            <div id="priceerror"></div><br><br>

                            Product Category : <input type="text" name="category" id="category">
                            <div id="categoryerror"></div><br><br>

                            Product Image : <input type="file" class="btn btn-secondary" name="pimage" id="pimage"
                                accept="image/png, image/jpeg">
                            <div id="pimageerror"></div><br><br>

                            <input type="button" id="confirm-button" class="btn btn-warning" value="Confirm Details">
                            &nbsp;&nbsp;&nbsp;&nbsp;

                            <input type="submit" id="save-button" class="btn btn-success" value="Add Product"
                                style="display:none;">
                        </form>

                    </div><br>

                    <hr>
                    <hr>
                    <br><br>
                </div>

                <table id="table-data" class="table table-borderless" style="color:white;">
                </table><br><br>

                <!-- <hr>
                <hr> -->



                <!-- popup modal box for update the product records-->
                <div id="modal" align="center">
                    <div id="modal-form" align="center"
                        style="border:10px solid black;border-radius: 15px;background-color:aliceblue;color:black;width: 500px;">
                        <h2>Edit Form For Products</h2>
                        <hr>
                        <form action="update.php" method="POST" id="edit-form" enctype="multipart/form-data">
                            <table id="product-edit-table" align="center">
                                <tr style="padding-left: 15%;">
                                    <td width="90px">Product ID</td>
                                    <td>
                                        <input type="text" name="sppid" id="edit-ppid">
                                        <div id="sppiderror"></div>
                                    </td>
                                </tr>


                                <tr style="padding-left: 15%;">
                                    <td width="90px">Product Name</td>
                                    <td>
                                        <input type="text" name="spname" id="edit-pname">
                                        <div id="spnameerror"></div>
                                        <input type="text" name="spid" id="edit-pid" hidden="">
                                    </td>
                                </tr>



                                <tr style="padding-left: 15%;">
                                    <td>Product Price</td>
                                    <td>
                                        <input type="number" name="sprice" id="edit-price">
                                        <div id="spriceerror"></div>
                                    </td>
                                </tr>

                                <tr style="padding-left: 15%;">
                                    <td>Product category</td>
                                    <td>
                                        <input type="text" name="scategory" id="edit-category">
                                        <div id="scategoryerror"></div>
                                    </td>
                                </tr>



                                <tr style="padding-left: 15%;">
                                    <td>Product Image</td>
                                    <td>
                                        <input type="file" name="spimage" id="edit-pimage" class="btn btn-secondary">
                                        <div id="spimageerror"></div>
                                    </td>
                                </tr>



                                <tr style="padding-left: 15%;">
                                    <td>Required Action</td>
                                    <td>
                                        <input type="button" name="confirm-edit" id="confirm-edit"
                                            class="btn btn-warning" value="Confirm Updation">&nbsp;&nbsp;
                                        <input type="submit" name="edit-submit" id="edit-submit" class="btn btn-primary"
                                            value="Update" style="display: none;">
                                    </td>
                                </tr>


                            </table>
                        </form><br>
                        <div id="close-div">
                            <input type="button" name="close-btn" id="close-btn" class="btn btn-danger close-btn"
                                value="Close(X)">
                        </div>
                        <hr>
                        <hr>
                    </div>
                </div>
            </div>
            <br>


            <!--  -->

            <!-- <hr> -->
            <br>

            <!--  -->
            <div id="deletecategory" align="center">
                <hr>
                <h2>Category Deletion Management :-</h2>
                <br><br>
                <form id="delete-category-form" method="POST">
                    <input type="text" name="category-delete" id="category-delete" autocomplete="off"
                        placeholder="Enter category name which needed to be deleted">
                    <input type="button" name="category-delete-btn" id="category-delete-btn" class="btn btn-danger"
                        value="Delete Category">
                </form>
                <br>
                <div id="error-message" class="messages" align="center"></div><br><br>

                <div id="success-message" class="messages" align="center"></div>

                <hr>
                <hr>
                <br>
                <Br>

            </div>

            <!--  -->
            <!--  -->
            <!--  -->
            <!--  -->
            <!--  -->
            <!--  -->

            <!--  -->

            <div id="usermanage" align="center">
                <h1>User Management :-</h1>


                <div id="headeruser" align="center">
                    <h2 align="center">Search Panel :-</h2><br>

                    <div id="search-bar-user" align="center">
                        <input type="text" name="search-user" id="search-user" autocomplete="off"
                            placeholder="Search User:">
                        <hr>

                    </div><br>
                </div>
            </div><br><br>

            <table id="tabledatauser" class="table table-borderless" style="color:white;">
            </table><br><br>
            <!-- <hr> -->

            <!--  -->


            <!-- popup modal box for update the user records 2 -->
            <div id="modal-user" align="center">

                <div id="modal-form-user" align="center"
                    style="border:10px solid black;border-radius: 15px;background-color:aliceblue;color:black;width: 500px;">

                    <h2>Edit Form For User</h2>
                    <hr>

                    <form method="POST" id="edit-form-users" enctype="multipart/form-data">

                        <table id="users-edit-table" align="center">

                            <tr style="padding-left: 15%;">
                                <td width="90px">Email ID</td>
                                <td>
                                    <input type="Email" name="edit-email-user" id="edit-email-user">
                                    <div id="edit-email-error"></div>
                                </td>
                            </tr>


                            <tr style="padding-left: 15%;">
                                <td width="90px">Phno</td>
                                <td>
                                    <input type="number" name="edit-phno-user" id="edit-phno-user">
                                    <div id="edit-phno-error"></div>
                                    <input type="text" name="edit-id-user" id="edit-id-user" hidden="">
                                </td>
                            </tr>



                            <tr style="padding-left: 15%;">
                                <td>User-Name</td>
                                <td>
                                    <input type="text" name="edit-un-user" id="edit-un-user">
                                    <div id="edit-un-error"></div>
                                </td>
                            </tr>

                            <tr style="padding-left: 15%;">
                                <td>Password</td>
                                <td>
                                    <input type="password" name="edit-pass-user" id="edit-pass-user">
                                    <div id="edit-pass-error"></div>
                                </td>
                            </tr>

                            <tr style="padding-left: 15%;">
                                <td>Required Action</td>
                                <td>
                                    <input type="button" name="confirm-edit-users" id="confirm-edit-users"
                                        class="btn btn-warning" value="Confirm Updation">&nbsp;&nbsp;

                                    <input type="button" name="edit-submit-users" id="edit-submit-users"
                                        class="btn btn-primary" value="Update" style="display:none;">
                                </td>
                            </tr>


                        </table>
                    </form><br>
                    <div id="close-div">
                        <input type="button" name="close-btn-users" id="close-btn-users" class="btn btn-danger"
                            value="Close(X)">
                    </div>
                    <hr>
                    <hr>
                </div>
            </div>
        </div>
        <br>


        <!--  -->
        <!--  -->
        <!--  -->
        <!--  -->
        <!--  -->
        <!--  -->

        <!-- <hr> -->

        <!--  -->



        <div id="viewdiv">
            <hr>
            <div id="header-order">
                <h1 align="center">Search Panel :-</h1>

                <div id="search-bar-order" align="center">
                    <label>Search :</label>
                    <input type="text" name="search-orders" id="search-orders" autocomplete="off">
                </div><br>
                <hr>
                <hr>
            </div>
        </div><br>


        <table id="table-order" class="table table-borderless" style="color:white;">
        </table><br><br><br><br><br>
        <!-- <hr> -->


        <!-- popup modal box for update the order records-->
        <div id="modal-order" align="center">

            <div id="modal-form-order" align="center"
                style="border:10px solid black;border-radius: 15px;background-color:aliceblue;color:black;width: 500px;">

                <h2>Edit Form For Order</h2>
                <hr>

                <form method="POST" id="edit-form-order" enctype="multipart/form-data">

                    <table id="order-edit-table" align="center">

                        <tr style="padding-left: 15%;">
                            <td width="90px">Product ID</td>
                            <td>
                                <input type="text" name="edit-pid-order" id="edit-pid-order">
                                <div id="edit-pid-error"></div>
                            </td>
                        </tr>


                        <tr style="padding-left: 15%;">
                            <td width="90px">Quantity</td>
                            <td>
                                <input type="text" name="edit-qty-order" id="edit-qty-order">
                                <div id="edit-qty-error"></div>
                                <input type="number" name="edit-id-order" id="edit-id-order" hidden="">
                            </td>
                        </tr>

                        <tr style="padding-left: 15%;">
                            <td>Required Action</td>
                            <td>
                                <input type="button" name="confirm-edit-order" id="confirm-edit-order"
                                    class="btn btn-warning" value="Confirm Updation">&nbsp;&nbsp;

                                <input type="button" name="edit-submit-order" id="edit-submit-order"
                                    class="btn btn-primary" value="Update" style="display:none;">
                            </td>
                        </tr>


                    </table>
                </form><br>
                <div id="close-div">
                    <input type="button" name="close-btn-order" id="close-btn-order" class="btn btn-danger"
                        value="Close(X)">
                </div>
                <hr>
                <hr>
            </div>
        </div>
        <br><br>

        <div align = "center" style="border:10px solid black;border-radius: 15px;background-color:aliceblue;color:black; min-height:400px">
            <hr>
            <h3>Bill Generation management System</h3>
            <hr>
            <div style = "margin: 5px;">
            Enter Payment-order Id To Generate Bill :-> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="userbillid" id = "userbillid" placeholder = "Enter Payment-order Id">
                <br><br>
                <input type="button" class="btn btn-primary" name="gb" id = "gb" value = "Generate Bill">
            </div>
            <hr>

            <div id = "receiptdiv">
            <br><br>
            <div id = "username">

            </div>

            <br><br>
            
            <div id = "tblproduct">
                <table id = "productstb" class = "table table-borderless"></table>
            </div>

            <br>
            
            <div id = "totalpay">

            </div>

            <div id = "errorbill">

            </div>

            <br><br><br><Br><br>
        </div>

                
            


        </div>

        <!-- <br><br><br><br><br> -->

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        


        




    </div>
    
    
    
    <!-- </div>

    </div> -->




    <!-- <hr class = "new4">
    <hr class = "new4"> -->






    <script type="text/javascript" src="jquery.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        function loadrefresh() {
            location.reload(true);
        }





        function loadtable() {
            $("#table-data").html("");
            $("#modal").hide();
            $("#modal-user").hide();
            $("#modal-order").hide();
            $.ajax({
                url: "display.php",
                type: "POST",
                success: function(data) {
                    $("#table-data").html(data);
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
                        $('#category-menu').append('<a class="sub-item" data-id="' + data[i]
                            .category + '"  >' + data[i].category + '</a>');
                }
            });
        }
        loadtable();




        //------------------------- load table

        //----------------------------------insert
        $("#confirm-button").on("click", function(e) {

            //e.preventDefault();

            var pid = $("#pid").val();
            var pname = $("#pname").val();
            var price = $("#price").val();
            var category = $("#category").val();
            var pimage = $("#pimage").val();



            if (pid == "") {
                $("#pid").focus();
                $("#piderror").html("These Field is required");
            } else {
                $("#piderror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            // error of pid

            //----------------------------------------------------------------------------------------------------------------------------


            if (pname == "") {
                $("#pname").focus();
                $("#pnameerror").html("These Field is required");
            } else {
                $("#pnameerror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            //error of pname

            //----------------------------------------------------------------------------------------------------------------------------


            if (price == "") {
                $("#price").focus();
                $("#priceerror").html("These Field is required");
            } else {
                $("#priceerror").html("");
            }

            if (category == "") {
                $("#category").focus();
                $("#categoryerror").html("These Field is required");
            } else {
                $("#categoryerror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            //error of price

            //----------------------------------------------------------------------------------------------------------------------------

            if (pimage == "") {
                $("#pimage").focus();
                $("#pimageerror").html("These Field is required");

            } else {
                $("#pimageerror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            //error of pimage

            //----------------------------------------------------------------------------------------------------------------------------


            //----------------------------------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------------------------------


            // what if there is no error

            if (pid != "" && pname != "" && price != "" && pimage != "") {
                //alert(pid + " " + pname + " " + price + " " + pimage);
                $("#save-button").show();
                $("#save-button").focus();
            }

        });

        //--------------------------- delete

        var id;
        var eid;
        $(document).on("click", ".delete-btn", function() {
            id = $(this).data("id");
            //alert(studentid);
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: {
                    key: id
                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        loadtable();
                    } else {
                        alert("false");
                    }
                    //$("#table-data").html(data);
                }

            });
        });

        // edit fetch 1 record

        $(document).on("click", ".edit-btn", function() {
            $("#modal").show();
            $("#edit-ppid").focus();
            eid = $(this).data("eid");

            $.ajax({
                url: "fetch-1.php",
                type: "POST",
                data: {
                    eid: eid
                },
                success: function(data) {
                    //alert(data);
                    var result = data.split(' ');
                    $("#edit-pid").val(result[0]);
                    $("#edit-ppid").val(result[1]);
                    $("#edit-pname").val(result[2]);
                    $("#edit-price").val(result[3]);
                    $("#edit-category").val(result[4]);
                }
            });
        });

        //----------------------------------------

        //update//---

        $("#confirm-edit").on("click", function(e) {

            //e.preventDefault();

            var sppid = $("#edit-ppid").val();
            var spname = $("#edit-pname").val();
            var sprice = $("#edit-price").val();
            var scategory = $("#edit-category").val();
            var spimage = $("#edit-pimage").val();



            if (sppid == "") {
                $("#sppid").focus();
                $("#sppiderror").html("These Field is required");
            } else {
                $("#sppiderror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            // error of pid

            //----------------------------------------------------------------------------------------------------------------------------


            if (spname == "") {
                $("#spname").focus();
                $("#spnameerror").html("These Field is required");
            } else {
                $("#spnameerror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            //error of pname

            //----------------------------------------------------------------------------------------------------------------------------


            if (sprice == "") {
                $("#sprice").focus();
                $("#spriceerror").html("These Field is required");
            } else {
                $("#spriceerror").html("");
            }

            if (scategory == "") {
                $("#scategory").focus();
                $("#scategoryerror").html("These Field is required");
            } else {
                $("#scategoryerror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            //error of price

            //----------------------------------------------------------------------------------------------------------------------------

            if (spimage == "") {
                $("#spimage").focus();
                $("#spimageerror").html("These Field is required");

            } else {
                $("#spimageerror").html("");
            }

            //----------------------------------------------------------------------------------------------------------------------------

            //error of pimage

            //----------------------------------------------------------------------------------------------------------------------------


            //----------------------------------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------------------------------
            //----------------------------------------------------------------------------------------------------------------------------


            // what if there is no error

            if (sppid != "" && spname != "" && sprice != "" && spimage != "") {
                //alert(sppid + " " + spname + " " + sprice + " " + spimage);

                $("#edit-submit").show();
                $("#edit-submit").focus();
            }

        });

        //close btn for update

        $("#close-btn").on("click", function() {
            $("#modal").hide();
            //loadrefresh();
        });

        $("#close-btn-order").on("click", function() {
            $("#modal-order").hide();
            //loadrefresh();
        });

        $("#close-btn-users").on("click", function() {
            $("#modal-user").hide();
            //loadrefresh();
        });

        // ----------------search

        $("#search").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        });

        //-----------------------------------------------------------------------
        //----------------- products management done

        //---------------------------------------------------------------------

        // category management for deletion:-

        $("#category-delete-btn").on("click", function() {
            var value = $("#category-delete").val();

            if (value == "") {
                $("#error-message").html("Please Enter Category Name Which needs to be deleted");
            } else {
                $.ajax({
                    url: "deletecategory.php",
                    type: "POST",
                    data: {
                        value: value
                    },
                    success: function(data) {
                        //alert(data);
                        if (data == 1) {
                            $("#success-message").html("Category Deleted");
                            setTimeout(loadtable, 1000);
                        } else {
                            $("#error-message").html("");
                            $("#error-message").html("Category not deleted");
                        }
                    }
                });
            }
        });


        //-----------------------------------------------------------------------
        //-----------------------------------------------------------------------
        // user management system

        function loaduser() {
            $("#tabledatauser").html("");
            $.ajax({
                url: "display1.php",
                type: "POST",
                success: function(data) {
                    $("#tabledatauser").html(data);
                }
            });
        }

        loaduser();

        // search user

        $("#search-user").on("keyup", function() {
            var search_term = $(this).val();

            $.ajax({
                url: "search1.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#tabledatauser").html(data);
                }
            });
        });


        // delete user through admin

        var udid;
        $(document).on("click", ".delete-btn-user", function() {
            udid = $(this).data("udid");
            //alert(udid);
            $.ajax({
                url: "delete1.php",
                type: "POST",
                data: {
                    key: udid
                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        loaduser();
                    } else {
                        alert("false");
                    }
                    //$("#table-data").html(data);
                }

            });
        });

        //------------------------ fetch -1 user for update


        $(document).on("click", ".edit-btn-user", function() {
            $("#modal-user").show();
            $("#edit-email-user").focus();
            var ueid = $(this).data("ueid");

            $.ajax({
                url: "fetch-user-single-edit.php",
                type: "POST",
                data: {
                    ueid: ueid
                },
                success: function(data) {
                    //alert(data);
                    var result = data.split(' ');
                    $("#edit-id-user").val(result[0]);
                    $("#edit-email-user").val(result[1]);
                    $("#edit-phno-user").val(result[2]);
                    $("#edit-un-user").val(result[3]);
                    $("#edit-pass-user").val(result[4]);
                }
            });
        });

        //------------ confirmation for form

        $("#confirm-edit-users").on("click", function() {

            var edit_email_user = $("#edit-email-user").val();
            var edit_phno_user = $("#edit-phno-user").val();
            var edit_un_user = $("#edit-un-user").val();
            var edit_pass_user = $("#edit-pass-user").val();

            //


            if (edit_email_user == "") {
                $("#edit-email-user").focus();
                $("#edit-email-error").html("These Field is required");
            } else {
                $("#edit-email-error").html("");
            }


            if (edit_phno_user == "") {
                $("#edit-email-user").focus();
                $("#edit-phno-error").html("These Field is required");
            } else {
                $("#edit-phno-error").html("");
            }


            if (edit_un_user == "") {
                $("#edit-un-user").focus();
                $("#edit-un-error").html("These Field is required");
            } else {
                $("#edit-un-error").html("");
            }

            if (edit_pass_user == "") {
                $("#edit-pass-user").focus();
                $("#edit-pass-error").html("These Field is required");
            } else {
                $("#edit-pass-error").html("");
            }

            // what if there is no error

            if (edit_email_user != "" && edit_phno_user != "" && edit_un_user != "" && edit_pass_user !=
                "") {
                //alert(edit_email_user + " " + edit_phno_user + " " + edit_un_user + " " +edit_pass_user);

                $("#edit-submit-users").show();
                $("#edit-submit-users").focus();
            }
        });

        // updation of users after fetching

        $("#edit-submit-users").on("click", function() {
            var edit_id_user = $("#edit-id-user").val();
            var edit_email_user = $("#edit-email-user").val();
            var edit_phno_user = $("#edit-phno-user").val();
            var edit_un_user = $("#edit-un-user").val();
            var edit_pass_user = $("#edit-pass-user").val();

            $.ajax({
                url: "update-users.php",
                type: "POST",
                data: {
                    id: edit_id_user,
                    email: edit_email_user,
                    phno: edit_phno_user,
                    un: edit_un_user,
                    pass: edit_pass_user
                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        alert("Details Updated");
                        $("#edit-submit-users").hide();
                        $("#modal-user").hide();
                        loaduser();
                    } else {
                        alert("Record Not Updated");
                    }
                }
            });
        });




        //------------------------------------------- order system

        function loadorder() {
            $("#table-order").html("");
            $.ajax({
                url: "displayorder.php",
                type: "POST",
                success: function(data) {
                    $("#table-order").html(data);
                }
            });
        }

        loadorder();

        // search user

        $("#search-orders").on("keyup", function() {
            var search_term = $(this).val();
            $("#table-order").html("");
            $.ajax({
                url: "search-order.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-order").html(data);

                }
            });
        });


        //------------------------ 
        //fetch -1 user for update the order


        $(document).on("click", ".edit-btn-order", function() {
            $("#modal-order").show();
            $("#edit-pid-order").focus();
            var oeid = $(this).data("oeid");
            //alert(oeid);

            $.ajax({
                url: "fetch-user-order-single-edit.php",
                type: "POST",
                data: {
                    oeid: oeid
                },
                success: function(data) {
                    //alert(data);
                    var result = data.split(' ');
                    $("#edit-id-order").val(result[0]);
                    $("#edit-pid-order").val(result[1]);
                    $("#edit-qty-order").val(result[2]);
                }
            });
        });

        //------------ confirmation for form for order changes

        $("#confirm-edit-order").on("click", function() {

            var edit_pid_order = $("#edit-pid-order").val();
            var edit_qty_order = $("#edit-qty-order").val();



            if (edit_pid_order == "") {
                $("#edit-pid-order").focus();
                $("#edit-pid-error").html("These Field is required");
            } else {
                $("#edit-pid-error").html("");
            }


            if (edit_qty_order == "") {
                $("#edit-qty-order").focus();
                $("#edit-qty-error").html("These Field is required");
            } else {
                $("#edit-qty-error").html("");
            }

            // what if there is no error

            if (edit_pid_order != "" && edit_qty_order != "") {
                //alert(edit_pid_order + " " + edit_qty_order);

                $("#edit-submit-order").show();
                $("#edit-submit-order").focus();
            }
        });

        //---------------------- updation of orders

        $("#edit-submit-order").on("click", function() {
            var edit_id_order = $("#edit-id-order").val();
            var edit_pid_order = $("#edit-pid-order").val();
            var edit_qty_order = $("#edit-qty-order").val();

            $.ajax({
                url: "update-order.php",
                type: "POST",
                data: {
                    orderid: edit_id_order,
                    pid: edit_pid_order,
                    qty: edit_qty_order
                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        alert("Details Updated");
                        $("#edit-submit-order").hide();
                        $("#modal-order").hide();
                        loadorder();
                    } else {
                        alert("Order Not Updated");
                    }
                }
            });
        });

        //deletion of particular order through customer

        $(document).on("click", ".delete-btn-order", function() {
            odid = $(this).data("odid");
            //alert(odid);
            $.ajax({
                url: "delete-order.php",
                type: "POST",
                data: {
                    odid: odid
                },
                success: function(data) {
                    //alert(data);
                    if (data == 1) {
                        loadorder();
                    } else {
                        alert("Order Not Deleted");
                    }
                    //$("#table-data").html(data);
                }

            });
        });


        // loads the dashboard count

        function cardsloads() {
            $.ajax({
                url: "totalcount.php",
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //console.log(data);
                    $("#totalproduct").html(data['totalproduct'][0].totalproduct);
                    $("#totalusers").html(data['totaluser'][0].totaluser);
                    $("#totalcategory").html(data['totalcategory'][0].totalcategory);
                    $("#totalorder").html(data['totalorder'][0].totalorder);
                }
            });
            //loadrefresh(); 
        }
        cardsloads();


        //global search........

        $("#global-search").on("keyup", function() {
            var search_term = $(this).val();

            $("#table-data").html("");
            $("#tabledatauser").html("");
            $("#table-order").html("");

            if (search_term != "") {
                //change

                $("#table-data").show(); //table products
                $("#tabledatauser").show();
                $("#table-order").show(); // table for order


                $("#main-data1").show();
                $("#table-align").hide(); //products
                $("#header").hide();
                $("#usermanage").hide();
                $("#viewdiv").hide();
                $("#deletecategory").hide();

                //change
            } else {
                $("#main-data1").show();
                $("#table-data").show(); //table products  
                $("#table-align").show(); //products
                $("#header").show(); //products search header
                // $("#main-data1").show();
                $("#deletecategory").show();
                $("#usermanage").show();
                $("#tabledatauser").show();

                $("#viewdiv").show(); //order search
                $("#table-order").show(); // table for order

                loadtable();
            }




            //----search-product

            $.ajax({
                url: "search.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });



            //------ search user

            $.ajax({
                url: "search1.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#tabledatauser").html(data);
                }
            });



            //-------- search -order
            $.ajax({
                url: "search-order.php",
                type: "POST",
                data: {
                    search: search_term
                },
                success: function(data) {
                    $("#table-order").html(data);

                }
            });
        });

        //----------------hide & show management------------------

        //dashboard

        $("#dashboard").on("click", function() {
            $("#main-data1").hide(); //main
            $("#viewdiv").hide(); //order search
            $("#table-order").hide(); // table for order
        });

        //home

        $("#home").on("click", function() {

            $("#main-data1").show();
            $("#table-data").show(); //table products  
            $("#table-align").show(); //products
            $("#header").show(); //products search header
            // $("#main-data1").show();
            $("#deletecategory").show();
            $("#usermanage").show();
            $("#tabledatauser").show();

            $("#viewdiv").show(); //order search
            $("#table-order").show(); // table for order

            loadtable();
        });

        //add-products

        $("#add-products").on("click", function() {
            $("#main-data1").show();
            $("#table-data").show(); //table products  
            $("#table-align").show(); //products
            $("#header").show(); //products search header

            $("#deletecategory").hide();
            $("#usermanage").hide();
            $("#tabledatauser").hide();
            $("#viewdiv").hide(); //order search
            $("#table-order").hide(); // table for order

        });

        //user-management

        $("#user-management").on("click", function() {
            $("#main-data1").show();
            $("#usermanage").show();
            $("#tabledatauser").show();
            $("#deletecategory").hide();
            $("#viewdiv").hide(); //order search
            $("#table-order").hide(); // table for order
            $("#table-data").hide(); //table products  
            $("#table-align").hide(); //products
            $("#header").hide(); //products search header
        });

        // category wise record showing

        $(document).on("click", ".sub-item", function() {

            //change

            $("#main-data1").show();
            $("#table-data").show(); //table products  
            $("#table-align").hide(); //products
            $("#header").hide(); //products search header

            $("#deletecategory").hide();
            $("#usermanage").hide();
            $("#tabledatauser").hide();
            $("#viewdiv").hide(); //order search
            $("#table-order").hide(); // table for order

            //change

            $("#table-data").html("");

            var id = $(this).data("id");
            //alert(id);

            $.ajax({
                url: "categorywise1.php",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    //console.log(data)
                    $("#table-data").html(data);
                }
            });

        });

        //---------------- refresh page 

        $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');

            //change

            $("#main-data1").show();
            $("#table-data").show(); //table products  
            $("#table-align").hide(); //products
            $("#header").hide(); //products search header

            $("#deletecategory").hide();
            $("#usermanage").hide();
            $("#tabledatauser").hide();
            $("#viewdiv").hide(); //order search
            $("#table-order").hide(); // table for order

            //change
            loadtable();
        });

        //category-delete

        $("#category-delete").on("click", function() {
            $("#main-data1").show();
            $("#header").hide(); //products search header
            $("#table-align").hide(); //products
            $("#deletecategory").show();
            $("#tabledatauser").hide();
            $("#usermanage").hide();
            $("#viewdiv").hide(); //order search
            $("#table-order").hide(); // table for order
            $("#table-data").hide(); //table products
        });

        //manage-order

        $("#manage-order").on("click", function() {
            $("#viewdiv").show(); //order search
            $("#table-order").show(); // table for order
            $("#main-data1").hide();
        });


        var filename;

        $("#gb").on("click", function(){
            var userbillid = $("#userbillid").val();

            //alert(userbillid);
            //receipt

            //$("#receiptdiv").html("");
            $("#username").html("");
            $("#productstb").html("");
            $("#totalpay").html("");
            
            
            $.ajax({
                url: "receipt.php",
                type: "POST",
                data: {userbillid: userbillid},
                dataType: "JSON",
                success: function(data) {

                    
                    
                    //alert("ajax return "+data);
                    //console.log(data.productstb.length);
                    //console.log(data.usernames[0].username);
                    //console.log(data['productstb'][0].pid);
                    // console.log(data['totalpay'][0].total);

                    if(data)
                    {
                        $("#username").append('username :-> <span id = "uspan">'+data.usernames[0].username+'</span>');

                        $("#productstb").append("<tr class = 'bg-warning' style = 'color:black;'><th scope='col'>Product Id</th><th scope='col'>Product Name</th><th scope='col'>Product Total Price</th><th scope='col'>Product Category</th><th scope='col'>Product Qty</th></tr>");

                        for(var i = 0; i < data.productstb.length; i++)
                        {
                            $("#productstb").append("<tr><th scope='row'>"+ data.productstb[i].pid+ "</th><td>"+ data.productstb[i].pname +"</td><td>"+ data.productstb[i].total +"</td><td>"+ data.productstb[i].category +"</td><td>"+ data.productstb[i].qty +"</td></tr>");
                        }


                        $("#totalpay").append('Total Payment :-> <span>'+data.totalpay[0].total+'</span><br><br><br><br><input type="button" class="btn btn-primary" name="pb" id = "pb" value = "Print Bill" hidden>');
                    }
                    else
                    {
                        $("#errorbill").html(data);
                    }

                }
            });

        });


        $(document).on("click", "#pb", function(){

            filename = $("#uspan").text();

            alert(filename);

            window.jsPDF = window.jspdf.jsPDF;

            var doc = new jsPDF();

            var elementHTML = document.querySelector("#receiptdiv");

            doc.html(elementHTML, {
                callback: function(doc) {
                    // Save the PDF
                    doc.save('sample-document.pdf');
                },
                x: 15,
                y: 15,
                width: 170, //target width in the PDF document
                windowWidth: 650 //window width in CSS pixels
            });
            
            // html2canvas($('#receiptdiv')[0], {
            //     onrendered: function (canvas) {
            //         var data = canvas.toDataURL();
            //         var docDefinition = {
            //             content: [{
            //                 image: data,
            //                 width: 2000
            //             }]
            //         };
            //         pdfMake.createPdf(docDefinition).download(filename+".pdf");
            //     }
            // });


        });


    });
    </script>

</body>

</html>