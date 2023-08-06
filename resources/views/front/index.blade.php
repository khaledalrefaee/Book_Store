<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->

@include('front.partilas.header')

<!-- Navbar Start -->
@include('front.partilas.nav_bar')
<!-- Navbar End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


@yield('content')



@include('front.partilas.footer')

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('front/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('front/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('front/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('front/js/main.js')}}"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function addToCart(id){
        var book_name = $('#bname').text();
        var bid = id
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                name:book_name
            },
            url: "/cart/data/store/"+id,
        })

        myCart()
    }

    function myCart(){
        $.ajax({
            type: 'GET',
            url: '/get-myCart-product',
            dataType:'json',
            success:function(response){
                var rows = ""
                var total = response.cartTotal +'$';
                var count = response.cartQty;
                $.each(response.cart_content, function(key,value){
                    rows += `<tr>
                        <td class="align-middle"><img src="/${value.options.image}" alt="" style="width: 50px;"> ${value.name}</td>
                        <td class="align-middle">$ ${value.price}</td>
                        <td class="align-middle"><button  class="btn btn-sm btn-primary" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button></td>
                    </tr>`
                });

                $('#total').html(total);
                $('#Cart_page').html(rows);
                $('#cart_icon').html(count);
            }
        })
    }
    myCart()

    function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/cart-remove/'+id,
            dataType:'json',

        });
        myCart()
    }

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="city_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{url('/district-get/ajax')}}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="address_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="address_id"]').append('<option value="'+ value.id +'">' + value.address + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });


    });
</script>

</body>

</html>
