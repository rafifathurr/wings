@extends('layouts.main')
@section('content')
    @php
        use App\Helpers\NumberFormat;
    @endphp
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Check Out Products</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <form action="{{ route('checkout.store') }}" method="post" class="f1">
                                    @csrf
                                    <div class="f1-steps">
                                        <div class="f1-progress">
                                            <div class="f1-progress-line" data-now-value="33" data-number-of-steps="3"
                                                style="width: 33%;"></div>
                                        </div>
                                        <center>
                                            <div class="f1-step active">
                                                <div class="f1-step-icon"></div>
                                                <p>Products</p>
                                            </div>
                                            <div class="f1-step">
                                                <div class="f1-step-icon"></div>
                                                <p>Checkout</p>
                                            </div>
                                            <div class="f1-step">
                                                <div class="f1-step-icon"></div>
                                                <p>Summary</p>
                                            </div>
                                        </center>
                                    </div>
                                    <!-- Product List -->
                                    <fieldset>
                                        <div class="mt-3">
                                            <h4><b>Products List</b></h4>
                                        </div>
                                        <hr>
                                        <div class="col-md-12 p-3">
                                            @foreach ($products as $index => $product)
                                                <div class="border mb-3">
                                                    <div class="d-flex flex-row justify-content-between">
                                                        <div class="p-2">
                                                            <div class="d-flex flex-row justify-content-between">
                                                                <div class="p-2">
                                                                    <div class="box border bg-primary rounded p-5">
                                                                        &nbsp;
                                                                    </div>
                                                                </div>
                                                                <div class="p-2">
                                                                    <a href="#modal_product_{{ $product->product_code }}"
                                                                        data-toggle="modal"
                                                                        data-target="#modal_product_{{ $product->product_code }}">
                                                                        <h4 for="product" class="col-md-12">
                                                                            <b>{{ $product->product_name }}</b>
                                                                        </h4>
                                                                    </a>
                                                                    @if ($product->discount != 0)
                                                                        <label for="discount"
                                                                            class="col-md-12"><s>{{ $product->currency . ' ' . NumberFormat::numberCurrencyFormat($product->price) }}</s>&nbsp;<span
                                                                                style="color:red!important;"> -
                                                                                {{ $product->discount * 100 }}
                                                                                %</span></label>
                                                                        <label for="price"
                                                                            class="col-md-12">{{ $product->currency . ' ' . NumberFormat::numberCurrencyFormat($product->price - $product->price * $product->discount) }}</label>
                                                                    @else
                                                                        <label for="price"
                                                                            class="col-md-12">{{ $product->currency . ' ' . NumberFormat::numberCurrencyFormat($product->price) }}</label>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="p-2 mt-auto mb-auto mr-3">
                                                            <input type="checkbox" class="form-control form-control-sm"
                                                                value="{{ json_encode($product) }}" name="product_code[]"
                                                                id="product_code_{{ $product->product_code }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modal_product_{{ $product->product_code }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    data-keyboard="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">
                                                                    <b>
                                                                        Product Detail
                                                                    </b>
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body row">
                                                                <div class="col-md-4">
                                                                    <div class="box border bg-primary rounded p-5">
                                                                        &nbsp;
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8 mt-auto mb-auto">
                                                                    <h4 class="col-md-12">
                                                                        <b>{{ $product->product_name }}</b>
                                                                    </h4>
                                                                    @if ($product->discount != 0)
                                                                        <label for="discount"
                                                                            class="col-md-12 mb-2"><s>{{ $product->currency . ' ' . NumberFormat::numberCurrencyFormat($product->price) }}</s>&nbsp;<span
                                                                                style="color:red!important;"> -
                                                                                {{ $product->discount * 100 }}
                                                                                %</span></label>
                                                                        <label for="price"
                                                                            class="col-md-12 mb-2">{{ $product->currency . ' ' . NumberFormat::numberCurrencyFormat($product->price - $product->price * $product->discount) }}</label>
                                                                    @else
                                                                        <label for="price"
                                                                            class="col-md-12 mb-2">{{ $product->currency . ' ' . NumberFormat::numberCurrencyFormat($product->price) }}</label>
                                                                    @endif
                                                                    <label for="dimension" class="col-md-12 mb-2">Dimension
                                                                        :
                                                                        {{ $product->dimension }}</label>
                                                                    <label for="price_unit" class="col-md-12 mb-2">Price
                                                                        Unit :
                                                                        {{ $product->unit }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="f1-buttons m-3">
                                            <button type="button" class="btn btn-md btn-primary btn-next">
                                                Next <i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </fieldset>
                                    <!-- Checkout -->
                                    <fieldset>
                                        <div class="mt-3">
                                            <h4><b>Checkout List</b></h4>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Product
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>
                                                        <th width="25%">
                                                            Qty
                                                        </th>
                                                        <th width="15%">
                                                            Unit
                                                        </th>
                                                        <th>
                                                            Sub Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body_checkout">
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" align="right">
                                                            <b>Total Price (Rp)&nbsp;</b>&nbsp;
                                                        </td>
                                                        <td align="right">
                                                            <input type="hidden" id="total_price">
                                                            <span id="total_price_display">
                                                                -
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="f1-buttons m-3">
                                            <button type="button" class="btn btn-md btn-warning btn-previous">
                                                <i class="fa fa-arrow-left"></i> Previous
                                            </button>
                                            <button type="button" class="btn btn-md btn-primary btn-next ml-2">
                                                Next <i class="fa fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </fieldset>
                                    <!-- Summary -->
                                    <fieldset>
                                        <div class="mt-3">
                                            <h4><b>Summary Checkout</b></h4>
                                        </div>
                                        <hr>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Product
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>
                                                        <th width="25%">
                                                            Qty
                                                        </th>
                                                        <th width="15%">
                                                            Unit
                                                        </th>
                                                        <th>
                                                            Sub Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_body_submit">
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" align="right">
                                                            <b>Total Price (Rp)&nbsp;</b>&nbsp;
                                                        </td>
                                                        <td align="right">
                                                            <input type="hidden" id="total_price_submit"
                                                                name="total_price_submit">
                                                            <span id="total_price_display_submit">
                                                                -
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="f1-buttons m-3">
                                            <button type="button" class="btn btn-md btn-warning btn-previous">
                                                <i class="fa fa-arrow-left"></i> Previous
                                            </button>
                                            <button type="submit" class="btn btn-md btn-primary ml-2">
                                                Submit <i class="fa fa-check"></i>
                                            </button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('javascript-bottom')
        <script>
            function scroll_to_class(element_class, removed_height) {
                var scroll_to = $(element_class).offset().top - removed_height;
                if ($(window).scrollTop() != scroll_to) {
                    $("html, body").stop().animate({
                        scrollTop: scroll_to
                    }, 0);
                }
            }

            function bar_progress(progress_line_object, direction) {
                var number_of_steps = progress_line_object.data("number-of-steps");
                var now_value = progress_line_object.data("now-value");
                var new_value = 0;
                if (direction == "right") {
                    new_value = now_value + 100 / number_of_steps;
                } else if (direction == "left") {
                    new_value = now_value - 100 / number_of_steps;
                }
                progress_line_object
                    .attr("style", "width: " + new_value + "%;")
                    .data("now-value", new_value);
            }

            function currencyFormat(value) {
                return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }

            function generatePrice(id) {
                let total_price = 0;

                let price_item = $('#item_price_' + id).val();

                let qty_item = $('#qty_product_' + id).val();

                let total_price_item = parseInt(price_item) * parseInt(qty_item);

                $('#qty_product_' + id).attr('value', qty_item);

                $('#item_total_price_' + id).val(total_price_item);

                if (!isNaN(total_price_item)) {
                    $('#item_total_price_display_' + id).html(currencyFormat(total_price_item));
                } else {
                    $('#item_total_price_display_' + id).html('-');
                }

                $("input[name='total_price_item[]']")
                    .map(function(index) {
                        total_price += parseInt($(this).val());
                    });

                $('#total_price').val(total_price);

                if (!isNaN(total_price) && total_price != 0) {
                    $('#total_price_display').html('IDR. ' + currencyFormat(total_price));
                } else {
                    $('#total_price_display').html('-');
                }
            }

            // Store Data Purchase Order 
            function storePurchase() {
                swal({
                    title: 'Are You Sure To Submit ?',
                    icon: 'info',
                    buttonsStyling: false,
                    buttons: ['Cancel', 'Yes, Submit!'],
                }).then((result) => {
                    if (result) {
                        $('form').unbind('submit').submit();
                    }
                });
            }

            $(document).ready(function() {
                var item_check = '';

                $("form").submit(function(e) {
                    e.preventDefault();
                    storePurchase();
                });

                // Form
                $(".f1 fieldset:first").fadeIn("slow");

                // step selanjutnya (ketika klik tombol selanjutnya)
                $(".f1 .btn-next").on("click", function() {
                    var parent_fieldset = $(this).parents("fieldset");
                    var next_step = true;
                    // navigation steps / progress steps
                    var current_active_step = $(this)
                        .parents(".f1")
                        .find(".f1-step.active");
                    var progress_line = $(this).parents(".f1").find(".f1-progress-line");

                    var item_check = $('input:checkbox:checked').map(function() {
                        return $(this).val();
                    }).get();

                    // if (item_check.length == 0) {
                    //     next_step = false;
                    // }

                    if (next_step) {
                        parent_fieldset.fadeOut(400, function() {
                            // change icons
                            current_active_step
                                .removeClass("active")
                                .addClass("activated")
                                .next()
                                .addClass("active");
                            // progress bar
                            bar_progress(progress_line, "right");
                            // show next step
                            $(this).next().fadeIn();
                            // scroll window to beginning of the form
                            scroll_to_class($(".f1"), 20);
                        });

                        let total_price_all = 0;

                        if ($(this).parents(".f1").find(".f1-progress-line").data("now-value") >= 33 && $(this)
                            .parents(".f1").find(".f1-progress-line").data("now-value") < 66) {

                            $("#table_body_checkout").empty();
                            item_check.forEach(function(item, index) {
                                let product = jQuery.parseJSON(item);
                                let price = 0;
                                if (parseFloat(product.discount) > 0) {
                                    price += parseInt(product.price) - (parseInt(product.price) *
                                        parseFloat(
                                            product.discount));
                                } else {
                                    price += parseInt(product.price);
                                }

                                total_price_all += price;

                                $('#table_body_checkout').append(
                                    "<tr> " +

                                    // BEGIN ITEM NAME
                                    "<td>" +
                                    product.product_name +
                                    "</td>" +
                                    // END ITEM NAME

                                    // BEGIN SUBTOTAL ITEM
                                    "<td align='right'>" +
                                    product.currency + " " +
                                    currencyFormat(price) +
                                    "</span>" +
                                    "</td>" +
                                    // END SUBTOTAL ITEM

                                    // BEGIN QTY TOTAL
                                    "<td>" +
                                    "<center>" +
                                    "<input type='hidden' value='" + price + "' " +
                                    " id='item_price_" + product.product_code + "'>" +
                                    "<input type = 'number' min='0' id='qty_product_" + product
                                    .product_code +
                                    "' name = 'qty_product[]' class='form-control' value='1'" +
                                    "oninput='generatePrice(" + '"' + product.product_code +
                                    '"' + ")' required>" +
                                    "</center>" +
                                    "</td>" +
                                    // END QTY TOTAL

                                    // BEGIN UNIT
                                    "<td>" +
                                    product.unit +
                                    "</td>" +
                                    // END UNIT

                                    // BEGIN SUBTOTAL ITEM
                                    "<td align='right'>" +
                                    product.currency + " " +
                                    "<span id='item_total_price_display_" + product.product_code +
                                    "'>" +
                                    currencyFormat(price) +
                                    "</span>" +
                                    "<input type='hidden' value='" + price + "' " +
                                    " id='item_total_price_" + product.product_code +
                                    "' name='total_price_item[]' >" +
                                    "</td>" +
                                    // END SUBTOTAL ITEM
                                    "</tr> "
                                );
                            });
                            $('#total_price').val(total_price_all);

                            if (!isNaN(total_price_all) && total_price_all != 0) {
                                $('#total_price_display').html('IDR. ' + currencyFormat(total_price_all));
                            } else {
                                $('#total_price_display').html('-');
                            }
                        }

                        if ($(this).parents(".f1").find(".f1-progress-line").data("now-value") > 66) {

                            $("#table_body_submit").empty();
                            var qty_item_arr = $("input[name='qty_product[]']")
                                .map(function(index) {
                                    return $(this).val();
                                }).get();

                            var total_price_item_arr = $("input[name='total_price_item[]']")
                                .map(function(index) {
                                    return $(this).val();
                                }).get();

                            var total_price_item = $('#total_price').val();

                            $('#total_price_submit').val(total_price_item);

                            item_check.forEach(function(item, index) {

                                let product = jQuery.parseJSON(item);
                                let price = 0;
                                if (parseFloat(product.discount) > 0) {
                                    price += parseInt(product.price) - (parseInt(product.price) *
                                        parseFloat(
                                            product.discount));
                                } else {
                                    price += parseInt(product.price);
                                }

                                if (total_price_item_arr.length > 0) {

                                    $('#table_body_submit').append(
                                        "<tr> " +

                                        // BEGIN ITEM NAME
                                        "<td>" +
                                        product.product_name +
                                        "</td>" +
                                        // END ITEM NAME

                                        // BEGIN SUBTOTAL ITEM
                                        "<td align='right'>" +
                                        product.currency + " " +
                                        currencyFormat(price) +
                                        "</span>" +
                                        "</td>" +
                                        // END SUBTOTAL ITEM

                                        // BEGIN QTY TOTAL
                                        "<td>" +
                                        "<center>" +
                                        qty_item_arr[index] +
                                        "</td>" +
                                        // END QTY TOTAL

                                        // BEGIN UNIT
                                        "<td>" +
                                        product.unit +
                                        "</td>" +
                                        // END UNIT

                                        // BEGIN SUBTOTAL ITEM
                                        "<td align='right'>" +
                                        product.currency + " " +
                                        currencyFormat(total_price_item_arr[index]) +
                                        "</td>" +
                                        // END SUBTOTAL ITEM
                                        "</tr> "
                                    );
                                }
                            });

                            if (!isNaN(total_price_item) && total_price_item != 0) {
                                $('#total_price_display_submit').html('IDR. ' + currencyFormat(
                                    total_price_item));
                            } else {
                                $('#total_price_display_submit').html('-');
                            }
                        }
                    }
                });

                // step sbelumnya (ketika klik tombol sebelumnya)
                $(".f1 .btn-previous").on("click", function() {
                    // navigation steps / progress steps
                    var current_active_step = $(this)
                        .parents(".f1")
                        .find(".f1-step.active");
                    var progress_line = $(this).parents(".f1").find(".f1-progress-line");

                    $(this)
                        .parents("fieldset")
                        .fadeOut(400, function() {
                            // change icons
                            current_active_step
                                .removeClass("active")
                                .prev()
                                .removeClass("activated")
                                .addClass("active");
                            // progress bar
                            bar_progress(progress_line, "left");
                            // show previous step
                            $(this).prev().fadeIn();
                            // scroll window to beginning of the form
                            scroll_to_class($(".f1"), 20);
                        });
                });

                // submit (ketika klik tombol submit diakhir wizard)
                $(".f1").on("submit", function(e) {
                    // validasi form
                    $(this)
                        .find('input[type="text"], input[type="password"], textarea')
                        .each(function() {
                            if ($(this).val() == "") {
                                e.preventDefault();
                                $(this).addClass("input-error");
                            } else {
                                $(this).removeClass("input-error");
                            }
                        });
                });
            });
        </script>
    @endpush
@endsection
