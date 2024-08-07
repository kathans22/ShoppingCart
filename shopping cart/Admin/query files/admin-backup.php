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

    <link rel="stylesheet" type="text/css" href="adminstyle.css">
    
</head>
<body>
	
	<div class="header">
		<h1>Welcome - 
			<?php echo $_SESSION['adminusername']?>	
		</h1>&nbsp;&nbsp;&nbsp;&nbsp;

		<div id = "combine">

			<div id = "pmdiv">
			    <a href="#productsdiv" name = "pm" id = "pm">Products Management</a>&nbsp;&nbsp;&nbsp;
		    </div>

		    <div id = "vodiv">
			    <a href="#viewdiv" name = "vo" id = "vo">View Orders</a>&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;
		    </div>

		    <div id = "cddiv">
			    <a href="#deletecategory" name = "deleted1" id = "deleted1">Category Management</a>&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;
		    </div>

		    <div id = "userdiv">
			    <a href="#usermanage" name = "userlink" id = "userlink">User Management</a>&nbsp;&nbsp;&nbsp;&nbsp;
			    &nbsp;
		    </div> 

        </div>
		<form method = "POST">
			<a href="logout.php"><input type="button" name = "logout" id = "logout" value = "logout"></a>
		</form> 
    </div>

  


    <hr class = "new4">
    <hr class = "new4">

    <div id = "productsdiv">
    	<table id = "main" border = "0" cellspacing = "0" align="center">
		<tr>
			<td id = "header">
				<h1 align="center">Search Panel :-</h1>

				<div id = "search-bar" align="center">
					<label>Search :</label>
					<input type="text" name="search" id = "search" autocomplete="off">
				</div><br><hr><hr>
			</td>
		</tr>
<!--  -->
		<tr>
			<td id = "table-form">
			    <div id = "table-align" align = center>
					<form id = "addform" action = "insert.php" method = "POST" enctype="multipart/form-data">
						
						Product ID : <input type = "text" name = "pid" id = "pid">
						<div id = "piderror"></div><br><br>
						
						Product Name : <input type = "text" name = "pname" id = "pname">
						<div id = "pnameerror"></div><br><br>
						
						Product Price : <input type = "number" name = "price" id = "price">
						<div id = "priceerror"></div><br><br>

						Product Category : <input type = "text" name = "category" id = "category">
						<div id = "categoryerror"></div><br><br>
						
						Product Image : <input type = "file" name = "pimage" id = "pimage" accept="image/png, image/jpeg">
						<div id = "pimageerror"></div><br><br>

						<input type = "button" id = "confirm-button" value = "Confirm Details"> &nbsp;&nbsp;&nbsp;&nbsp;
						
						<input type = "submit" id = "save-button" value = "Add Product">
					</form>
			</div><br><hr><hr>
			</td>
		</tr>

		<tr>
			<td id="table-data">
				
			</td>
		</tr>
	</table>
	<br><br>

	

	

	<!-- popup modal box for update the records-->
	<div id = "modal" align = "center">
		<div id = "modal-form" align = "center">
			<h2>Edit Form</h2>
			<form action = "update.php" method = "POST" id = "edit-form" enctype="multipart/form-data">
				<table id = "product-edit-table" align = "center" border = "1">
					<tr>
						<td width = "90px">Product ID</td>
						<td>
							<input type="text" name="sppid" id = "edit-ppid">
							<div id = "sppiderror"></div>
						</td>
					</tr>
					<tr>
						<td width = "90px">Product Name</td>
						<td>
							<input type="text" name="spname" id = "edit-pname">
							<div id = "spnameerror"></div>
							<input type="text" name="spid" id = "edit-pid" hidden = "">
						</td>
					</tr>

					<tr>
						<td>Product Price</td>
						<td>
							<input type="number" name="sprice" id = "edit-price">
							<div id = "spriceerror"></div>
						</td>
					</tr>

					<tr>
						<td>Product category</td>
						<td>
							<input type="text" name="scategory" id = "edit-category">
							<div id = "scategoryerror"></div>
						</td>
					</tr>

					<tr>
						<td>Product Image</td>
						<td>
							<input type="file" name="spimage" id = "edit-pimage">
							<div id = "spimageerror"></div>
						</td>
					</tr>

					<tr>
						<td>Required Action</td>
						<td>
							<input type="button" name="confirm-edit" id = "confirm-edit" value="Confirm Updation">&nbsp;&nbsp;
							<input type="submit" name="edit-submit" id = "edit-submit" value="Update">
						</td>
					</tr>
				</table>
			</form><br><br>
			<div id="close-div">
				<input type="button" name="close-btn" id = "close-btn" value="Close(X)">
			</div>
			<br><hr>
    <hr>
		</div>
	</div>
    </div>
    <br>
    

    <!--  -->

    <hr class = "new4">
    <hr class = "new4">
    <hr class = "new4">
    <hr class = "new4"><br>

    <!--  -->
    <div id = "deletecategory" align="center">
    	<h2>Category Deletion Management :-</h2>
    	<br><br>
    	<form id = "delete-category-form" method = "POST">
	    	<input type="text" name="category-delete" id = "category-delete" autocomplete="off" placeholder = "Enter category name which needed to be deleted">
	    	<input type="button" name="category-delete-btn" id = "category-delete-btn" value = "Delete Category">
        </form>
    </div><br>

    <div id = "error-message" class = "messages" align="center"></div><br><br>
	
	<div id = "success-message" class = "messages" align="center"></div>
    
    <Br><Br>

    <hr class = "new4">
    <hr class = "new4">
    <hr class = "new4">

    <!--  -->

    <div id = "usermanage" align = "center">
    	<h1>User Management :-</h1>
    	<table id = "user-main" border = "0" cellspacing = "0" align="center">
			<tr>
				<td id = "header">
					<h2 align="center">Search Panel :-</h2>

					<div id = "search-bar-user" align="center">
						<input type="text" name="search-user" id = "search-user" autocomplete="off" placeholder="Search User:">
					</div><br><hr><hr>
				</td>
			</tr>


			<tr>
				<td id="tabledatauser">
					
				</td>
			</tr>
        </table>
    </div><br><br>

    

    <hr class = "new4">
    <hr class = "new4">
    <hr class = "new4">
    

    <div id = "viewdiv">
    	orders are listed here
    </div>




    <script type="text/javascript" src="jquery.js"></script>

    <script type = "text/javascript">
    	$(document).ready(function(){

    		function loadtable(){
    		$("#table-data").html("");
            $("#modal").hide();
			$.ajax({
				url : "display.php",
				type : "POST",
				success : function(data){
					$("#table-data").html(data);
				}
			});
		}
		loadtable();
    	

    	//------------------------- load table
    	
    	//----------------------------------insert
    	$("#confirm-button").on("click",function(e){
    		
    		//e.preventDefault();

    		var pid = $("#pid").val();
    		var pname = $("#pname").val(); 
    		var price = $("#price").val();
    		var category = $("#category").val();
    		var pimage = $("#pimage").val();

    		

    		if(pid == "")
    		{
    			$("#pid").focus();
    			$("#piderror").html("These Field is required");
    		}
    		else
    		{
    			$("#piderror").html("");
    		}

    		//----------------------------------------------------------------------------------------------------------------------------

    		// error of pid

    		//----------------------------------------------------------------------------------------------------------------------------


    		if(pname == "")
    		{
    			$("#pname").focus();
    			$("#pnameerror").html("These Field is required");
    		}
    		else
    		{
    			$("#pnameerror").html("");
    		}

    		//----------------------------------------------------------------------------------------------------------------------------

    		//error of pname

    		//----------------------------------------------------------------------------------------------------------------------------


    		if(price == "")
    		{
    			$("#price").focus();
    			$("#priceerror").html("These Field is required");
    		}
    		else
    		{
    			$("#priceerror").html("");
    		}

    		if(category == "")
    		{
    			$("#category").focus();
    			$("#categoryerror").html("These Field is required");
    		}
    		else
    		{
    			$("#categoryerror").html("");
    		}

            //----------------------------------------------------------------------------------------------------------------------------

    		//error of price

    		//----------------------------------------------------------------------------------------------------------------------------

    		if(pimage == "")
    		{
    			$("#pimage").focus();
    			$("#pimageerror").html("These Field is required");

    		}
    		else
    		{
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

    		if(pid != "" && pname != "" && price != "" && pimage != "")
    		{
    			alert(pid + " " + pname + " " + price + " " +pimage);
    			$("#save-button").focus();
    		}

    	});

    	//--------------------------- delete

        var id;
        var eid;
    	$(document).on("click",".delete-btn",function(){
			id = $(this).data("id");
			//alert(studentid);
			$.ajax({
				url : "delete.php",
				type : "POST",
				data : {key:id},
				success : function(data){
					alert(data);
					if(data == 1)
					{
						loadtable();
					}
					else
					{
						alert("false");
					}
					//$("#table-data").html(data);
			}

			});
		});

		// edit fetch 1 record

		$(document).on("click",".edit-btn",function(){
			$("#modal").show();
			$("#edit-ppid").focus();
			eid = $(this).data("eid");

			$.ajax({
				url : "fetch-1.php",
	        	type : "POST",
	        	data : {eid : eid},
	        	success : function(data){
	        		alert(data);
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

		$("#confirm-edit").on("click",function(e){
    		
    		//e.preventDefault();

    		var sppid = $("#edit-ppid").val();
    		var spname = $("#edit-pname").val(); 
    		var sprice = $("#edit-price").val(); 
    		var scategory = $("#edit-category").val();
    		var spimage = $("#edit-pimage").val();

    		

    		if(sppid == "")
    		{
    			$("#sppid").focus();
    			$("#sppiderror").html("These Field is required");
    		}
    		else
    		{
    			$("#sppiderror").html("");
    		}

    		//----------------------------------------------------------------------------------------------------------------------------

    		// error of pid

    		//----------------------------------------------------------------------------------------------------------------------------


    		if(spname == "")
    		{
    			$("#spname").focus();
    			$("#spnameerror").html("These Field is required");
    		}
    		else
    		{
    			$("#spnameerror").html("");
    		}

    		//----------------------------------------------------------------------------------------------------------------------------

    		//error of pname

    		//----------------------------------------------------------------------------------------------------------------------------


    		if(sprice == "")
    		{
    			$("#sprice").focus();
    			$("#spriceerror").html("These Field is required");
    		}
    		else
    		{
    			$("#spriceerror").html("");
    		}

    		if(scategory == "")
    		{
    			$("#scategory").focus();
    			$("#scategoryerror").html("These Field is required");
    		}
    		else
    		{
    			$("#scategoryerror").html("");
    		}

            //----------------------------------------------------------------------------------------------------------------------------

    		//error of price

    		//----------------------------------------------------------------------------------------------------------------------------

    		if(spimage == "")
    		{
    			$("#spimage").focus();
    			$("#spimageerror").html("These Field is required");

    		}
    		else
    		{
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

    		if(sppid != "" && spname != "" && sprice != "" && spimage != "")
    		{
    			alert(sppid + " " + spname + " " + sprice + " " +spimage);
    			$("#edit-submit").focus();
    		}

    	});

		//close btn for update

		$("#close-btn").on("click",function(){
			$("#modal").hide();
		});

		// search

		$("#search").on("keyup",function(){
			var search_term = $(this).val();

			$.ajax({
				url : "search.php",
				type : "POST",
				data : {search : search_term},
				success : function (data) {
					$("#table-data").html(data);
				}
			});
		}); 

		//-----------------------------------------------------------------------
		//----------------- products management done

		//---------------------------------------------------------------------

		// category management for deletion:-

		$("#category-delete-btn").on("click",function(){
			var value = $("#category-delete").val();

			if(value == "")
			{
				$("#error-message").html("Please Enter Category Name Which needs to be deleted");
			}
			else
			{
				$.ajax({
					url : "deletecategory.php",
					type : "POST",
					data : {value : value},
					success : function(data){
						alert(data);
						if(data == 1)
						{
							$("#success-message").html("Category Deleted");
							setTimeout(loadtable,1000);
						}
						else
						{
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

		function loaduser()
		{
			$("#tabledatauser").html("");
			$.ajax({
				url : "display1.php",
				type : "POST",
				success : function(data){
					$("#tabledatauser").html(data);
				}
			});
		}

		loaduser();

		    // search user

		$("#search-user").on("keyup",function(){
			var search_term = $(this).val();

			$.ajax({
				url : "search1.php",
				type : "POST",
				data : {search : search_term},
				success : function (data) {
					$("#tabledatauser").html(data);
				}
			});
		}); 


		  // delete user through admin

		var udid;
    	$(document).on("click",".delete-btn-user",function(){
			udid = $(this).data("udid");
			//alert(udid);
			$.ajax({
				url : "delete1.php",
				type : "POST",
				data : {key:udid},
				success : function(data){
					alert(data);
					if(data == 1)
					{
						loaduser();
					}
					else
					{
						alert("false");
					}
					//$("#table-data").html(data);
			}

			});
		});








	});

    </script>

</body>
</html>
