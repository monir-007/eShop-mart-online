<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>shopMart || @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('user-view/assets/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('user-view/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('user-view/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('user-view/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user-view/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('user-view/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('user-view/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('user-view/assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor_components/toastr/toastr.min.css')}}">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('user-view/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('user-view.layouts.components._header')

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <!-- ============================================== SIDEBAR ============================================== -->

        <!-- /.sidemenu-holder -->
        <!-- ============================================== SIDEBAR : END ============================================== -->
        <!-- ========================================== SECTION – HERO ========================================= -->

        <!-- ============================================== INFO BOXES : END ============================================== -->
        <!-- ============================================== CONTENT ============================================== -->
    @yield('content')


    <!-- /.homebanner-holder -->
        <!-- ============================================== CONTENT : END ============================================== -->
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('user-view.layouts.components._footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- ============================================== ADD TO CART MODAL ============================================== -->
<!-- Add to Cart Product Modal -->
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><strong id="productName"></strong></h4>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card" style="width: 20rem;">
                            <img src="" id="productImage" class="card-img-top" alt=""
                                 style="height: 250px; width: 270px">
                        </div>
                    </div><!-- // end col md -->

                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Price:
                                <strong class="text-danger">$<span id="productPrice"></span></strong>
                                <del class="text-danger" id="productOldPrice"><span>$</span></del>
                            </li>
                            <li class="list-group-item">Code: <strong id="productCode"></strong></li>
                            <li class="list-group-item">Category: <strong id="productCategory"></strong></li>
                            <li class="list-group-item">Subcategory: <strong id="productSubcategory"></strong></li>
                            <li class="list-group-item">Stock:
                                <span id="productStock" class="badge badge-pill badge-success"
                                      style="background: limegreen; color: white"></span>
                                <span id="productStockOut" class="badge badge-pill badge-danger"
                                      style="background: red; color: white"></span>
                            </li>
                        </ul>
                    </div><!-- // end col md -->

                    <div class="col-md-4">
                        <div class="form-group col-md-10" id="productColorBox">
                            <label for="productColor">Choose Color</label>
                            <select class="form-control"
                                    id="productColor" name="productColor">
                            </select>
                        </div>
                        <div class="form-group col-md-10" id="productSizeBox">
                            <label for="productSize">Choose Size</label>
                            <select class="form-control" id="productSize"
                                    name="productSize">
                            </select>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="productQuantity">Quantity:</label>
                            <input type="number" class="form-control" id="productQuantity" name="productQuantity"
                                   value="1" min="1">
                        </div>
                        <input type="hidden" id="productId">
                        <div class="form-groupr text-right">
                            <button type="submit" class="btn btn-primary" onclick="addToCart()"><i
                                    class="fa fa-shopping-cart inner-right-vs"></i>ADD TO CART
                            </button>
                        </div>
                    </div><!-- // end col md -->
                </div> <!-- // end row -->
            </div> <!-- // end modal Body -->
        </div>
    </div>
</div>
<!-- End Add to Cart Product Modal -->

<!-- ============================================== ADD TO CART MODAL : END ============================================== -->


<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('user-view/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/echo.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('user-view/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/wow.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/scripts.js')}}"></script>

<script src="{{asset('assets/vendor_components/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('user-view/assets/js/sweetalert2.all.min.js')}}"></script>

{{--Notifications Alert--}}
<script>
    @if(Session::has('message'))
    const type = "{{ Session::get('alert-type','success') }}";
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;
        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;
        case 'error':
            toastr.error("{{Session::get('message')}}");
            break;
    }
    @endif
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function productShow(id) {
        // alert(id)
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + id,
            dataType: 'json',
            success: function (data) {
                console.log(data)
                $('#productName').text(data.product.name_eng);
                $('#productCode').text(data.product.code);
                $('#productCategory').text(data.product.category.name_eng);
                $('#productSubcategory').text(data.product.subcategory.name_eng);
                $('#productImage').attr('src', '/' + data.product.product_thumbnail);

                $('#productId').val(id);
                $('#productQuantity').val(1);


                if (data.product.discount_price == null) {
                    $('#productPrice').text('');
                    $('#productOldPrice').text('');
                    $('#productPrice').text(data.product.selling_price);
                } else {
                    $('#productPrice').text(data.product.discount_price);
                    $('#productOldPrice').text(data.product.selling_price);

                }

                if (data.product.quantity > 0) {
                    $('#productStock').text('');
                    $('#productStockOut').text('');
                    $('#productStock').text('available');
                } else {
                    $('#productStock').text('');
                    $('#productStockOut').text('');
                    $('#productStockOut').text('stockout');
                }

                $('select[name="productColor"]').empty();
                $.each(data.color, function (key, value) {
                    $('select[name="productColor"]').append('<option class="text-capitalize" value=" ' + value + ' "> ' + value + ' </option>')
                    if (data.color == "") {
                        $('#productColorBox').hide();
                    } else {
                        $('#productColorBox').show();
                    }
                })

                $('select[name="productSize"]').empty();
                $.each(data.size, function (key, value) {
                    $('select[name="productSize"]').append('<option class="text-capitalize" value=" ' + value + ' "> ' + value + ' </option>')
                    if (data.size == "") {
                        $('#productSizeBox').hide();
                    } else {
                        $('#productSizeBox').show();
                    }
                })

            }
        })
    }

    // Add to Cart
    function addToCart() {
        let productName = $('#productName').text();
        let id = $('#productId').val();
        let color = $('#productColor option:selected').text();
        let size = $('#productSize option:selected').text();
        let quantity = $('#productQuantity').val();

        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                productName: productName,
                color: color,
                size: size,
                quantity: quantity
            },
            url: "/cart/data/store/" + id,
            success: function (data) {
                miniCart();
                $('#closeModal').click();
                // console.log(data)
                const Toast = Swal.mixin({
                    toast: true,
                    icon: 'success',
                    animation: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        animation: true,
                        type: 'error',
                        title: data.error
                    })
                }
            }

        })
    }

    //     add product to Mini Cart
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $('span[id="cartSubTotalId"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                let miniCart = "";
                $.each(response.carts, function (key, value) {
                    miniCart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"><a href="detail.html"><img src="/${value.options.image}"
                                                                                          alt=""></a></div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">${value.price}*${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                             <button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}"
                                            onclick="miniCartRemove(this.id)">
                                                <i class="fa fa-trash"></i></button></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                 <hr>`
                });
                $('#miniCart').html(miniCart);
            }
        });
    }

    miniCart();

    //     add product to Mini Cart   Remove
    function miniCartRemove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/minicart/product/remove/' + rowId,
            dataType: 'json',
            success: function (data) {
                miniCart();

                const Toast = Swal.mixin({
                    toast: true,
                    icon: 'warning',
                    animation: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        animation: true,
                        type: 'error',
                        title: data.error
                    })
                }
            }
        })
    }

    //     add product to Wishlist
    function addToWishlist(product_id) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: '/wishlist/add-to-wishlist/' + product_id,
            success: function (data) {

                const Toast = Swal.mixin({
                    toast: true,
                    animation: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        animation: true,
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }

            }
        });
    }

</script>
<script type="text/javascript">

    function wishlist() {
        $.ajax({
            type: 'GET',
            url: '/user/wishlist/get-product',
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                let rows = "";
                $.each(response, function (key, value) {
                    rows += `<tr>
                    <td class="col-md-2"><img src="/${value.product.product_thumbnail} "></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.name_eng}</a></div>
                        <div class="price">
                        ${value.product.discount_price == null
                        ? `$${value.product.selling_price}`
                        :
                        `$${value.product.discount_price} <span>$${value.product.selling_price}</span>`
                    }
                        </div>
                    </td>
                    <td class="col-md-2">
                        <button data-toggle="modal"
                                 data-target="#addToCartModal"
                                 class="btn btn-primary icon"
                                 id="${value.product_id}"
                                 onclick="productShow(this.id)"
                                 title="Add Cart"
                                 type="button">
                                 <i class="fa fa-shopping-cart"></i> Add to Cart
                        </button>
                    </td>
                    <td class="col-md-1 close-btn">
                        <button
                                 class="btn btn-danger icon"
                                 id="${value.id}"
                                 onclick="wishlistProductRemove(this.id)"
                                 title="Add Cart"
                                 type="submit">
                                 <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>`
                });
                $('#wishlist').html(rows);
            }
        });
    }
    wishlist();

    //     add product Remove from
    function wishlistProductRemove(id) {
        $.ajax({
            type: 'GET',
            url: '/user/wishlist/product/remove/' + id,
            dataType: 'json',
            success: function (data) {
                wishlist();

                const Toast = Swal.mixin({
                    toast: true,
                    animation: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
            }
        })
    }
</script>
</body>
</html>
