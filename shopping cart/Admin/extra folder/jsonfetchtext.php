$(document).ready(function(){
        // $('.sub-btn').hover(function(){
        //     $(this).next('.sub-menu').slideToggle();
        //     $(this).find('.dropdown').toggleClass('rotate');
        // });
        $('.sub-btn').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });

        function putdata(){
            $('#prosuctdata').html("");
            $.ajax({
                // url: "http://localhost/mycode/shpoingcart/phpfiles/producttbreaddata.php",
                url: "./phpfiles/producttbreaddata.php",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    // var json = $.parseJSON(data);
                    // console.log(json);
                    for (var i=0;i<data.length;++i)
                        $('#productdata').append(' <div class="col-sm-4 d-flex pb-3"><div class="card" style="width: 18rem;"><img class="card-img-top" src="'+ data[i].productimage+'" alt="Card image cap"><div class="card-body" style="color: black"><h5 class="card-title">'+data[i].productprice+'</h5><p class="card-text">'+data[i].productname+'</p><button class="btn btn-primary" data-id="'+ data[i].id+'">ADD CART</button></div></div></div>');
                    }
                });
                // $("#category-menu").html("");
                $.ajax({
                // url: "http://localhost/mycode/shpoingcart/phpfiles/producttbreaddata.php",
                url: "./phpfiles/productreadcategory.php",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    // var json = $.parseJSON(data);
                    // console.log(json);
                    for (var i=0;i<data.length;++i)
                        $('#category-menu').append('<a class="sub-item" data-id="'+data[i].category+'"  >'+data[i].category+'</a>');
                    }
                }); 
        }
        putdata();
        // $(".sub-item").click(function(){
        //     alert($(this).data("id"));
        // });
        $(document).on("click",".sub-item",function(){
            var id = $(this).data("id");
            alert(id);
        });
    });