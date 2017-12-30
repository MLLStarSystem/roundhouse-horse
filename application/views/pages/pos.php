<style>
    .txtQty{width:100%;text-align:center;max-width:60px;border:0px;background-color: transparent;}
    .tdQty{padding:0;}
    .form-group2 {
        width: 100%;
        border: solid 1px #aaa;
        background-color: #efefef;
        padding: 10px;
    }
    #service_list thead th {
        border-bottom: double 3px #aaa8a8;
        font-size:12px;
    }
    .cs-skin-elastic > span{height: 38px;padding-top:8px;}
    #customer_info td{font-size:14px;border-bottom:solid 2px #aaa;padding-bottom:10px}
    #service_payment td{padding:15px;}
    .customer_field{font-size: 13px;border-radius: 0;}
    #service_list td {               
        color: #000;
        font-size:12px;
        padding: 2px 11px;
    }
    .ddlDiscount.navbar-nav, .ddlDiscount.navbar-nav > li{width:100%}
    .ddlDiscount.navbar-nav > li > a{padding: 10px 0px;}
    .row.payment_list div {
        padding:0px;font-size:13px
    }
    .kbd.text-muted {
        font-weight: 600;
        position: absolute;
        width: 20px;
        right: 15px;
    }
    ul.ddlDiscount li ul.dropdown-menu{width:100%}
    .bgcolor1{background-color:#DCE2E1;}
    .bgcolor2{background-color:#ACD1D1;}
    .bgcolor3{background-color:#5BA1B0;color:#fff;font-size:16px;text-transform:uppercase;border-bottom:solid 3px #f3f2f2;}
    .square {border-radius:0px;}
    .btn.square{padding: 10px 0;font-size: 13px;width: 100%;cursor:pointer;}

    .hover_underline{cursor:pointer;}
    .hover_underline:hover{border-bottom:dashed 1px blue;}
    body,html{height:100%;max-height:100%;}
    .wrapper,.wrapper > .container{height:100%;max-height:100%;}
    .payment_list table tbody td {
        border-collapse: separate;
        padding: 3px 10px;
    }
    .box-shadow1{-webkit-box-shadow: 0px 8px 5px -3px rgba(192,192,192,1);
        -moz-box-shadow: 0px 8px 5px -3px rgba(192,192,192,1);
        box-shadow: 0px 8px 5px -3px rgba(192,192,192,1);}    
    .group_wrapper {
        background-color: #e5e5e5;
        padding: 10px;
        position:relative;
    }
    .slimScrollDiv{width:100% !Important;padding: 0px 10px;}
    div.cs-skin-elastic{height:auto;padding-bottom:10px}
    .cs-skin-elastic > span {
        height: 34px;
        padding-top: 4px;
        border-radius: 0px;
        border-color: #ced4da;
    }
</style>



<div class="row m-t-15 h-100 mh-100" style="background-color: #fff;">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mh-100 h-100" style="background-color: #dbdee1;padding:0 29px">
        <div class="row h-5" style="min-height:40px;padding:10px 5px">
            <div class="col-sm-12 col-md-6 text-left" id="tdCustomer" data-id="0">[Customer name]</div>
            <div class="d-none d-xs-block d-sm-block d-md-none col-md-12"><?php date_default_timezone_set('Asia/Singapore'); echo date('Y-m-d H:iA'); ?></div>
            <div class="d-none d-md-block d-lg-block text-right col-sm-12 col-md-6"><?php date_default_timezone_set('Asia/Singapore'); echo date('Y-m-d H:iA'); ?></div>  
        </div>
        <div class="row h-65 m-0 box-shadow1" style="padding:0px 0px 17px 0;min-height:180px;overflow-y: auto;position:relative;vertical-align: top;width: 100%;background-color: #fff;border:solid 2px #c0c0c0">
            <div class="slimscroll">
                <table id="service_list" class="table-striped" style="width: 100%;">  
                    <thead>
                        <tr>
                            <th class="col-md-6" style="padding: 9px 10px;">Description</th>
                            <th class="col-md-1 text-center" style="padding: 9px 10px;">Qty</th>
                            <th class="col-md-2 text-right" style="padding: 9px 10px;">Price</th>
                            <th class="col-md-3 text-right" style="padding: 9px 10px;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <table id="service_payment" style="display:none;width: 100%;margin-top:20px;position: absolute;bottom: 0;left: 0;">  
                    <tbody>
                        <tr colspan="2" class="hide hide_if_member">
                            <td class="col-md-10">CHANGE</td><td class="col-md-2 text-right tdPaymentChange">0.00</td>
                        </tr>
                        <tr>
                            <td style="width:25%">TOTAL</td><td  style="width:25%" class="text-right tdTotalAmtToPay">0.00</td>

                            <td style="width:25%">Payment</td><td style="width:25%" class="text-right tdAmtTendered">0.00</td>
                        </tr>
                        <tr colspan="2" class="hide hide_if_member">
                            <td class="col-md-10">CHANGE</td><td class="col-md-2 text-right tdPaymentChange">0.00</td>
                        </tr>
                    </tbody>
                </table>  
            </div>
        </div>
        <div class="row payment_list m-0" style="background-color: transparent;max-width:792px;margin: auto !important;position: relative;">
            <div style="padding:5px 10px;width:100%">
                <table style="width:100%;background-color:#fff;">
                    <thead><tr><th style="width:25%"></th><th style="width:25%"></th><th style="width:25%"></th><th style="width:25%"></th></tr></thead>
                    <tbody>
                        <tr><td colspan="2"></td></tr>
                        <tr>
                            <td>Discount</td>
                            <td>
                                <div class="text-right ddlDiscountWrapper"  style="padding:0">
                                    <ul class="nav navbar-nav dropup ddlDiscount">
                                        <li class="dropdown">
                                            <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown">None (0) <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" data-id="0" discount-type="percentage" data-discount="0"  data-text="None (0)">None <span class="kbd text-muted">0%</span></a></li>
                                                <?php 
                                                if(count($discounts) > 0){
                                                for($i=0;$i<count($discounts);$i++){ ?>
                                                        <li><a href="#" data-id="<?php echo $discounts[$i]['ID']; ?>" discount-type="percentage" data-discount="<?php echo $discounts[$i]['discount_value']; ?>" data-text="<?php echo $discounts[$i]['discount']." (%".$discounts[$i]['discount_value'].")"; ?>"><?php echo $discounts[$i]['discount']; ?> <span class="kbd text-muted"><?php echo $discounts[$i]['discount_value'];?>%</span></a></li>
                                                <?php } 
                                                }?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <td>Tax <a id="txtTaxPercent" class="hover_underline" data-tax="<?php echo $profile[0]['vat'];?>" style="cursor:pointer;padding-left:10px;"><?php echo $profile[0]['vat'];?>%</a></td>
                            <td class="tdTaxTotalAmt text-right">0.00</td>

                        </tr>
                        <tr>
                            <td>Sub total</td>
                            <td id="amttopay" class="text-right">0.00</td>
                            <td>Total</td>
                            <td id="overall_total" class="text-right">0.00</td>
                        </tr>
                        <tr><td colspan="2"></td></tr>
                    </tbody>
                </table>
                <table style="width:100%;background-color:#fff;margin-top:10px">
                    <thead><tr><th style="width:25%"></th><th style="width:25%"></th><th style="width:25%"></th><th style="width:25%"></th></tr></thead>
                    <tbody>
                        <tr><td colspan="2"></td></tr>
                        <tr>
                            <td>Load balance</td>
                            <td class="text-right"><a class="load_balance hover_underline">0.00</a></td>
                            <td>Points</td>
                            <td class="text-right"><span id="PointsEarned" data-newpoints="">0</span> Pts</td>

                        </tr>
                        <tr><td colspan="2"></td></tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 p-0 m-0 h-100 mh-100">
        <div class="card-box h-100 mh-100 m-b-0" style="padding:0 10px">
            <div id="customer_field" class="row box-shadow1" style="background-color: #f6f6f6;padding: 10px 10px 0;">
                <div class="col-xs-9 col-md-9 col-lg-9" style="padding-left: 0px;">
                    <fieldset class="form-group m-b-5">
                        <input id="txtCustomerNum" class="form-control customer_field" placeholder="Enter guest name" type="text"></input>
                        <input id="txtCustomer" class="form-control customer_field hide" placeholder="Tap member card" type="text"></input>
                    </fieldset>
                </div>
                <div class="col-sm-3 col-md-3" style="padding:0">
                    <select id="ddlCustomerType" class="select cs-select cs-skin-elastic" label="">
                        <option value="guest" selected="selected">Guest</option>
                        <option value="member">Member</option>
                    </select>
                </div>
            </div>
            <div class="row" style="padding:10px">  
                <div class="col-md-12">
                    <div class="row selections">
                        <?php 
                        $x = 0;
                        for($i=0;$i<intVal($this->session->userdata('washer_count'));$i++){ ?>
                            <div class="button_wrapper  col-md-3 col-xl-3 m-0 p-0">
                                <button type="button" id="washer_<?php echo $i; ?>" class="btn btnWashers" data-price="<?php echo $washers[$i]["price"]; ?>" data-transaction="washer" data-id="<?php echo $washers[$i]["ID"]; ?>" 
                                    data-member-price="<?php echo $washers[$i]["members_price"]; ?>"><?php echo $washers[$i]["description"]; ?></button>
                            </div>
                            <?php $x++;
                            if($x > 0 && $x == 4)
                                $x = 0;
                        }
                        if($x < 4 && (intVal($this->session->userdata('washer_count')) %4 != 0) ){
                            for($i=$x;$i<4;$i++){ ?>
                                <div class="button_wrapper col-md-3 col-xl-3  m-0 p-0">
                                    <button type="button" class="btn btnWashers disabled">&nbsp;</button>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row selections">
                        <?php 
                        $x = 0;
                        for($i=0;$i<intVal($this->session->userdata('dryer_count'));$i++){ ?>
                            <div class="button_wrapper  col-md-3 col-xl-3  m-0 p-0">
                                <button id="dryer_<?php echo $i; ?>" data-transaction="dryer" type="button" class="btn btnDryers" data-id="<?php echo $dryers[$i]["ID"]; ?>"  data-price="<?php echo $dryers[$i]["price"]; ?>"
                                    data-member-price="<?php echo $dryers[$i]["members_price"]; ?>"><?php echo $dryers[$i]["description"]; ?></button>
                            </div>
                            <?php $x++;
                            if($x > 0 && $x == 4)
                                $x = 0;
                        }
                        if($x < 4 && (intVal($this->session->userdata('dryer_count')) %4 != 0) ){
                            for($i=$x;$i<4;$i++){ ?>
                                <div class="button_wrapper">
                                    <button type="button" class="btn col-lg-3 m-0 p-0 disabled">&nbsp;</button>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>   
                </div> 
                <div class="col-md-12">
                    <div class="row selections">  
                        <?php 
                        if(count($addons) > 0){
                            $counter = count($addons);
                            if(count($addons) % 2 != 0)
                                $counter = 2;
                            $x=0;
                        for($i=0;$i<count($addons);$i++){ ?>
                                <div class="button_wrapper col-md-6 col-xl-6  m-0 p-0">
                                    <button id="addon_<?php echo $i; ?>" data-transaction="addon" data-id="<?php echo $addons[$i]["ID"]; ?>" type="button" class="btn btnAddOns" data-price="<?php echo $addons[$i]["price"]; ?>"
                                        data-member-price="<?php echo $addons[$i]["members_price"]; ?>" data-inventory="<?php echo $addons[$i]["with_inventory"]; ?>" data-stocks="<?php echo $addons[$i]["stocks"]; ?>" data-alert="<?php echo $addons[$i]["stocks_alert"]; ?>" ><?php echo $addons[$i]["description"]; ?></button>
                                </div>
                                <?php $x++;
                            }
                            if($x < 2){
                                for($i=$x;$i<2;$i++){ ?>
                                    <div class="button_wrapper">
                                        <button type="button" class="btn m-0 p-0 col-lg-2 disabled">&nbsp;</button>
                                    </div>
                        <?php }
                            }
                        }?> 
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 p-0 m-0 h-100 mh-100">
        <div class="group_wrapper">
            <div style="width:100%;text-align:center;color:#fff;font-weight:600;background: #898787;position: absolute;top: 0;left: 0;padding: 4px;">PAY BY</div>
            <button type="button" class="square col-sm-12 col-md-12 m-t-30 btn btn-success" id="btnPay">CASH</button>
            <button type="button" class="square col-sm-12 col-md-12 btn btn-primary m-t-10" id="btnPayByPoints">POINTS</button>
        </div>
        <div class="group_wrapper m-t-10">
            <div style="width:100%;text-align:center;color:#fff;font-weight:600;background: #898787;position: absolute;top: 0;left: 0;padding: 4px;">OTHERS</div>
            <button type="button" class="square col-sm-12 col-md-12 btn btn-info m-t-30" id="btnReload">RELOADING</button>
            <button type="button" class="square col-sm-12 col-md-12 btn btn-info m-t-10" id="btnReload">SYNC</button>
            <button type="button" class="square col-sm-12 col-md-12 btn btn-info m-t-10" id="btnReload">SHUTDOWN</button>
        </div>
    </div>


</div>

<form id="my_form"></form>
<input type="hidden" id="hidFullInvoiceNo" value="<?php echo str_pad($next_order_no[0]["new_number"], 6, "0", STR_PAD_LEFT);?>" />
<input type="hidden" id="hidInvoiceNo" value="<?php echo $next_order_no[0]["new_number"];?>" />
<input type="hidden" id="hidPointsPercentage" value="0" />
<input type="hidden" id="hidPointsEarned" value="0" />
<input type="hidden" id="hidMemberNumber" value="0" />
<input type="hidden" id="hidMemberLoad" value="0" />
<input type="hidden" id="hidDiscount" value="0" discount-type="percentage" data-discount="0" />
<div id="hidInventory"></div>
<script>
    (function($){
        $.fn.focusTextToEnd = function(){
            this.focus();
            var $thisVal = this.val();
            this.val('').val($thisVal);
            this.select();
            return this;
        }

        $('.slimscroll').slimScroll({
            height: '100%',
            railVisible: true
        });
        }(jQuery));

    $(document).ready(function(){


        $("a.load_balance").click(function(){
            if($("#hidMemberNumber").val() != "0"){
                $("#txtPayment2").val("");
                Custombox.open({
                    target: "#reload_modal",
                    effect: "door",
                    overlaySpeed: "100",
                    overlayColor: "#36404a"
                })

            }else{
                toastr["error"]("Please tap the member card first");
            }    
        });


        $("#btnPayByCash").click(function(){
            save("cash");
        });

        $("#btnPayByPoints").click(function(){
            if(parseInt(clearmoney($("#overall_total").text())) > "0"){
                if($("#hidMemberNumber").val() != "0"){
                    if(parseFloat($("#hidPointsEarned").val()) < parseFloat(clearmoney($("#overall_total").text()))){
                        toastr["error"]("Current points is less than the total amount to pay");
                        return false;
                    }else{
                        var footer = '<button class="btn btn-success" id="btnPayByPointsGo" type="button">Yes</button>'+
                        '<button data-dismiss="modal" class="btn btn-white cancel" onclick="Custombox.close();" type="button">Cancel</button>';

                        $("#confirm_modal .custom-modal-title").text("Please confirm");
                        $("#confirm_modal .custom-modal-text").text("Are you sure you want to use points to pay for this transaction?");                        
                        $("#confirm_modal .modal-footer").html(footer);
                        Custombox.open({
                            target: "#confirm_modal",
                            effect: "door",
                            overlaySpeed: "100",
                            overlayColor: "#36404a"
                        });
                    }
                }else{
                    toastr["error"]("Please tap the member card first");
                }
            }else{
                toastr["error"]("Please select a service first before making a payment.");
            }
        });

        $(document).on("click","#btnPayByPointsGo",function(){
            save("points"); 
        });

        $("#btnPay").click(function(){
            if(parseInt(clearmoney($("#overall_total").text())) > "0"){
                $("#amttopay3").text($("#overall_total").text());
                if($("#hidMemberNumber").val() != "0"){
                    $("#txtPayment").val("");
                    $(".hide_if_member").addClass("hide");
                    Custombox.open({
                        target: "#payment_modal",
                        effect: "door",
                        overlaySpeed: "100",
                        overlayColor: "#36404a"
                    })
                }else{
                    $("#txtPayment").val("");
                    $(".hide_if_member").removeClass("hide");
                    Custombox.open({
                        target: "#payment_modal",
                        effect: "door",
                        overlaySpeed: "100",
                        overlayColor: "#36404a"
                    })
                }
            }else{
                toastr["error"]("Please select a service first before making a payment.");
            }
        });

        $('.dropdown-menu li a').click(function (e) {
            var $div = $(this).closest("ul.nav.navbar-nav.dropup.ddlDiscount"); 
            var $btn = $div.find('a.dropdown-toggle');
            $btn.html($(this).attr("data-text") + ' <span class="caret"></span>');
            $div.removeClass('open');
            $("#hidDiscount").val($(this).attr("data-text"));
            $("#hidDiscount").attr("data-discount",$(this).attr("data-discount"));
            $("#hidDiscount").attr("discount-type",$(this).attr("discount-type"));
            compute_total();
        });

        $(".selections").on("click",".btn:not('.disabled')",function(){

            if($(this).hasClass("selected")){
                $(this).removeClass("selected");
                $("#service_list tbody").find("tr."+$(this).attr("id")).remove();

                if($(this).hasClass("btnAddOns")){
                    if($(this).attr("data-inventory") == "1"){
                        if($("#addon_inventory_"+$(this).attr("data-id")).length > 0)
                            $("#addon_inventory_"+$(this).attr("data-id")).remove();
                    }
                }
            }
            else{

                $(this).addClass("selected");

                var desciption = $(this).text().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();
                });

                var addon_stocks = "";
                if($(this).hasClass("btnAddOns")){
                    if($(this).attr("data-inventory") == "1"){
                        $("#hidInventory").append("<input type='hidden' class='addon_inventory' id='addon_inventory_"+$(this).attr("data-id")+"' addon-id="+$(this).attr("data-id")+" orig-stocks='"+$(this).attr("data-stocks")+"' data-alert='"+$(this).attr("data-alert")+"' value='"+$(this).attr("data-stocks")+"' />");
                        addon_stocks = "data-id='addon_inventory_"+$(this).attr("data-id")+"' ";
                    }
                }


                $(".txtQty.new").removeClass("new");

                var _price = $(this).attr("data-price");
                if($("#hidMemberNumber").val() != "0")
                    _price = $(this).attr("data-member-price");


                var str_item = '<tr '+addon_stocks+'class="'+$(this).attr("id")+'" data-service="'+$(this).attr("data-transaction")+'"><td class="col-md-6 tdDescription">'+desciption+'</td>'+
                '<td class="col-md-1 text-center tdQty"><input type="text" class="txtQty new" data-prev="1" value="1" /></td>'+
                '<td class="col-md-2 text-right txtItemPrice">'+_price+'</td>'+
                '<td class="col-md-3 text-right txtSubTotal">'+_price+'</td></tr>';
                $("#service_list tbody").append(str_item);
                $(".txtQty.new").focusTextToEnd();

            }
            compute_total();

        });


        $("#ddlCustomerType").on("propertychange change keyup paste input",function(){
            customer_type_selection($(this).val());
        });

        function customer_type_selection(_type){
            reset();
            if(_type == "guest"){

                change_price();
                compute_total();     
                $(this).addClass("active");
                $(".load_wrapper").removeClass("show");
                $("#txtCustomerNum").removeClass("hide");
                $("#txtCustomer").addClass("hide");
                $(".customer_field").val("");
                $(".hide_if_member").removeClass("hide");
                $("#txtCustomerNum").focus();
            }else{
                $(".load_wrapper").addClass("show");
                $("#txtCustomerNum").addClass("hide");
                $("#txtCustomer").removeClass("hide");
                $(".customer_field").val("");
                $(".hide_if_member").addClass("hide");
                $("#txtCustomer").focus();
            }


        }

        function reset(){
            $("#tdCustomer").text("[Customer name]");
            $("#tdCustomer").attr("data-id","0");  
            $("#hidPointsPercentage").val("0");
            $("#hidPointsEarned").val("0");
            $("#PointsEarned").text("0");
            $("#hidMemberNumber").val("0");
            $(".load_balance").text("0");
            $("#hidMemberLoad").val("0");
        }

        $("#txtCustomerNum").on("propertychange change keyup paste input",function(){
            if($(this).attr("ID") == "txtCustomerNum")
                $("#tdCustomer").text($(this).val());
        });

        $(document).on("change input","input.txtQty",function(e){

            var qty = $(this).val();
            if($.trim(qty) == "" || $.trim(qty) == "0"){
                qty = 1;
                $(this).val("1");
            }

            var regex = /^[1-9]\d*$/;

            var numStr = $(this).val();
            if (!regex.test(numStr))
                $(this).val("1");

            var subtotal = parseFloat($(this).closest("tr").find(".txtItemPrice").text()) * parseInt($(this).val());

            $(this).closest("tr").find(".txtSubTotal").text(money(subtotal));
            compute_total();

            //Check stocks         

            if($(this).closest("tr").attr("data-id") != undefined){
                //alert("#"+$(this).closest("tr").attr("data-id"));
                if($("#"+$(this).closest("tr").attr("data-id")).length > 0){
                    var _input = $("#"+$(this).closest("tr").attr("data-id"));
                    var new_val = parseInt(_input.attr("orig-stocks")) - parseInt($(this).val());
                    _input.val(new_val);

                    toastr.options = {
                        "preventDuplicates": true,
                        "preventOpenDuplicates": true
                    };
                    if(parseInt(_input.val()) <= parseInt(_input.attr("data-alert")) ){
                        if( parseInt(_input.val()) <= 0  ){

                            toastr["error"]($(this).closest("tr").find("td.tdDescription").text()+" is out of stock!");
                        }else{
                            toastr["error"]($(this).closest("tr").find("td.tdDescription").text()+" is running out of stock!");    
                        }
                    }
                }
            }
        });

        $("#txtPayment").on("propertychange change keyup paste input",function(){
            calculate();
        });

        $("#txtPayment2").on("propertychange change keyup paste input",function(){
            reload_calculate();
        });

        $("#ddlReloadAmt").on("propertychange change keyup paste input",function(){
            reload_calculate();
        });

        $("#btnReload").click(function(){
            if($("#hidMemberNumber").val() != "0"){
                $("#txtPayment2").val("");
                Custombox.open({
                    target: "#reload_modal",
                    effect: "door",
                    overlaySpeed: "100",
                    overlayColor: "#36404a"
                }) 
            }else{
                toastr["error"]("Please tap the member card first");
            }
        });

        $("#btnReloadCard").click(function(){
            var regex = /^[1-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;

            var numStr = $("#txtPayment2").val();
            if (regex.test(numStr))
                reload();
            else
                toastr["error"]("Please enter a valid amout.");  
        });

        function compute_total(){
            var total = 0;
            $("#service_list tbody tr").each(function(){
                var price = parseFloat(clearmoney($(this).find(".txtSubTotal").text()));
                total = parseFloat(total) + price;
            });

            $("#amttopay").text(money(total));

            //Tax computation
            var vat = parseFloat($("#txtTaxPercent").attr("data-tax"));
            $(".tdTaxTotalAmt").text(money(total * vat/100));
            var vat_value = clearmoney($(".tdTaxTotalAmt").text());
            //Total with taxes
            total = parseFloat(total)+parseFloat(vat_value);

            var discount = $("#hidDiscount").attr("data-discount");
            var discount_type = $("#hidDiscount").attr("discount-type");  

            //For percentage type of discount
            if(discount_type == "percentage" && discount != "0"){
                var total_with_dc = total - (total * discount/100);        
                total = total_with_dc;
            }

            $("#overall_total").text(money(total));
            $("#service_payment").find(".tdTotalAmtToPay").text(money(total));
            $("#amttopay2").text(money(total));

            var points = parseFloat(total * (parseFloat($("#hidPointsPercentage").val())/100));
            var total_points = parseInt($("#hidPointsEarned").val());
            $("#PointsEarned").attr("data-newpoints",parseFloat(points));
            $("#PointsEarned").text(money(parseFloat(total_points)));



        }

        function calculate(){

            var amt = clearmoney($("#overall_total").text());
            var change =  parseFloat($("#txtPayment").val())-parseFloat(amt);
            if(!$.isNumeric(change))
                change = 0;

            if(change < 0){
                $(".change_color").css("border-color","red");
                $("#amtChange3").css("color","red");
            }
            else{
                $(".change_color").css("border-color","green");
                $("#amtChange3").css("color","green");
            }

            $("#amtChange3").text(money(change));
            $(".tdPaymentChange").text(money(change));
        }

        function reload_calculate(){
            var amt = $("#ddlReloadAmt option:selected").val();
            var change =  parseFloat($("#txtPayment2").val())-parseFloat(amt);
            if(!$.isNumeric(change))
                change = 0;

            if(change < 0){
                $(".change_color2").css("border-color","red");
                $("#amtChange2").css("color","red");
            }
            else{
                $(".change_color2").css("border-color","green");
                $("#amtChange2").css("color","green");
            }

            $("#amtChange2").text(money(change)); 
        }

        $( "#txtCustomer" ).autocomplete({
            minLength:2, 
            delay: 0,
            selectFirst: true,
            autoFocus: true,
            response: function(event, ui) {
                ui.item = ui.content[0];
                $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                $(this).autocomplete('close');

            },
            source:function(request,response){
                $.ajax({
                    url: $("#hidBaseUrl").val()+'Members/customer_autocomplete?q='+request.term,
                    data: request,
                    dataType: null,
                    type: "GET",
                    success: function(data){
                        var listarray= jQuery.parseJSON(data);

                        response(
                            $.map(listarray, function(item) {
                                var text = item.fullname;
                                var code = item.card_number;
                                var cus_id = item.ID;
                                var points = item.points;
                                var load = item.current_load;
                                var poits_percentage = item.poits_percentage;
                                return {
                                    label: text,
                                    value: code,
                                    cus_id: cus_id,
                                    points: points,
                                    load: load,
                                    points_percentage: poits_percentage
                                }
                            })
                        )
                    },
                    error:function(data){
                        console.log(data)
                    }
                });
            },
            select: function( event, ui ) {
                event.preventDefault();

                //Change value
                $(this).val(ui.item.label);
                $("#tdCustomer").text(ui.item.label);
                $("#tdCustomer").attr("data-id",ui.item.cus_id); 
                $("#hidPointsPercentage").val(ui.item.points_percentage);
                $("#hidPointsEarned").val(ui.item.points);
                $("#hidMemberNumber").val(ui.item.value);
                $(".load_balance").text(ui.item.load);
                $("#hidMemberLoad").val(ui.item.load);

                change_price();
                setTimeout(function(){compute_total(); },100);
            }
        });

        $("#selector").click(function(){
            selectme();
        });

        function selectme(){
            var downKeyEvent = $.Event("keydown");
            downKeyEvent.keyCode = $.ui.keyCode.DOWN;  // event for pressing "down" key

            var enterKeyEvent = $.Event("keydown");
            enterKeyEvent.keyCode = $.ui.keyCode.ENTER;  // event for pressing "enter" key

            $("#autoComplete").val("c"); // enter text to trigger autocomplete
            $("#autoComplete").trigger(downKeyEvent);  // First downkey invokes search
            $("#autoComplete").trigger(downKeyEvent);  // Second downkey highlights first item
            $("#autoComplete").trigger(enterKeyEvent); // Enter key selects highlighted item 

        }

        function change_price(){

            $(".selections .btn.selected").each(function(){

                var desciption = $(this).text().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();
                });

                var _price = $(this).attr("data-price");

                if($("#hidMemberNumber").val() != "0")
                    _price = $(this).attr("data-member-price");

                $("#service_list tbody tr."+$(this).attr("id")).find("td.txtItemPrice").text(_price);
                var txtQty = $("#service_list tbody tr."+$(this).attr("id")).find("input.txtQty").val();

                var subtotal = parseFloat(_price) * parseInt(txtQty);
                $("#service_list tbody tr."+$(this).attr("id")).find("td.txtSubTotal").text(money(subtotal));

            });
        }

        function reload(){
            if($("#hidMemberNumber").val() != "0"){

                if( (parseFloat($("#ddlReloadAmt").val()) > parseFloat($("#txtPayment2").val())) || $.trim($("#txtPayment2").val()) == "") {
                    toastr["error"]("Please enter a payment greater or equal to the payable amout.");        
                    return false;
                }

                var new_load = parseFloat($("#hidMemberLoad").val()) + parseInt($("#ddlReloadAmt").val());

                var frmData = $("#my_form").serializeArray();
                frmData.push({name: "customer_id", value: $("#tdCustomer").attr("data-id")});
                frmData.push({name: "amount", value:new_load });



                $.ajax({
                    url: $("#hidBaseUrl").val()+"Main/reload_account",
                    type: 'POST',
                    data: frmData,
                    cache: false,
                    success: function(result) {  

                    },
                    error: function(result) {
                        //alert("some error occured, please try again later");
                    },
                    complete: function( jqXHR, textStatus ){
                        Custombox.close();
                        $("#hidMemberLoad").val(new_load);
                        $("a.load_balance").text(new_load);
                        $("div.load_balance").text(new_load);
                        // location.href = $("#hidBaseUrl").val()+"Billing";
                    }
                });
            }else{
                toastr["error"]("Please tap the member card first");
            }
        }

        function save(mode){

            var payment = "";
            var points_used = "0";
            if($("#hidMemberNumber").val() != "0"){
                if(mode=="points"){
                    if(parseFloat(clearmoney($("#hidPointsEarned").val())) < parseFloat(clearmoney($("#overall_total").text()))){
                        toastr["error"]("Current points is less than the total amount to pay");
                        return false;
                    }else{
                        payment = clearmoney($("#overall_total").text());
                        points_used = clearmoney($("#overall_total").text());
                    }
                }else{
                    if(parseFloat(clearmoney($("#hidMemberLoad").val())) < parseFloat(clearmoney($("#overall_total").text()))){
                        toastr["error"]("Current balance is less than the total amount to pay");
                        return false;
                    }else{
                        payment = clearmoney($("#overall_total").text());
                    }
                }   
            }

            if($("#hidMemberNumber").val() == "0"){ //Only applies for non member who is not using a load
                if($.trim($("#txtCustomerNum").val()) == ""){
                    toastr["error"]("Customer name is required.");        
                    return false;
                }

                if($(".selections .btn.selected").length == 0){
                    toastr["error"]("Invalid item selections");        
                    return false;
                }

                var regex = /^[1-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;

                var numStr = $("#txtPayment").val();
                if (!regex.test(numStr)){
                    toastr["error"]("Please enter a valid amout.");
                    return false;
                }

                if( (parseFloat(clearmoney($("#overall_total").text())) > parseFloat($("#txtPayment").val())) || $.trim($("#txtPayment").val()) == "") {
                    toastr["error"]("Please enter a payment greater or equal to the payable amout.");        
                    return false;
                }else{
                    payment = $("#txtPayment").val();
                }

            }

            var points_earned = $("#PointsEarned").attr("data-newpoints");
            if(mode=="points")
                points_earned = "0";

            var frmData = $("#my_form").serializeArray();

            var new_points = parseFloat($("#PointsEarned").text())+parseFloat(points_earned);

            frmData.push({name: "user_id", value: $("#hidUserId").val()});
            frmData.push({name: "invoice_no", value: $("#hidInvoiceNo").val()});
            frmData.push({name: "full_invoice_no", value: $("#hidFullInvoiceNo").val()});
            frmData.push({name: "customer_id", value: $("#tdCustomer").attr("data-id")});
            frmData.push({name: "customer_name", value: $("#tdCustomer").text()});
            frmData.push({name: "payment", value: payment});
            frmData.push({name: "earned_points", value: points_earned});
            frmData.push({name: "new_points", value: new_points});

            frmData.push({name: "discount", value: $("#hidDiscount").attr("data-discount")});
            frmData.push({name: "discount_desc", value: $("#hidDiscount").val()});
            frmData.push({name: "tax", value: $("#txtTaxPercent").text()});
            frmData.push({name: "tax_value", value: clearmoney($(".tdTaxTotalAmt").text())});

            frmData.push({name: "subtotal", value: clearmoney($("#amttopay").text())});
            frmData.push({name: "total", value: clearmoney($("#overall_total").text())});
            frmData.push({name: "points_used", value: points_used});

            $(".addon_inventory").each(function(){
                frmData.push({name: "addon_stocks[]", value: $(this).attr("addon-id")+"_"+$(this).val()});
            });
            
            if($("#service_list tr[data-service='washer']").length > 0){
                $("#service_list tr[data-service='washer']").each(function(){
                    var _button = $("#"+$(this).attr("class"));
                    for(var i=0;i<parseInt($(this).find("input.txtQty").val());i++){

                        frmData.push({name: "washer_id[]", value: _button.attr("data-id")});
                        frmData.push({name: "washer_desc[]", value: _button.text()});
                        var service_price = money(_button.attr("data-price"));
                        if($("#hidMemberNumber").val() != "0")
                            service_price = money(_button.attr("data-member-price"));

                        frmData.push({name: "washer_price[]", value: clearmoney(service_price)});
                    }
                });
            }

            if($("#service_list tr[data-service='dryer']").length > 0){
                $("#service_list tr[data-service='dryer']").each(function(){
                    var _button = $("#"+$(this).attr("class"));
                    for(var i=0;i<parseInt($(this).find("input.txtQty").val());i++){

                        frmData.push({name: "dryer_id[]", value: _button.attr("data-id")});
                        frmData.push({name: "dryer_desc[]", value: _button.text()});
                        var service_price = money(_button.attr("data-price"));
                        if($("#hidMemberNumber").val() != "0")
                            service_price = money(_button.attr("data-member-price"));

                        frmData.push({name: "dryer_price[]", value: clearmoney(service_price)});
                    }
                });
            }

            if($("#service_list tr[data-service='addon']").length > 0){
                $("#service_list tr[data-service='addon']").each(function(){
                    var _button = $("#"+$(this).attr("class"));
                    for(var i=0;i<parseInt($(this).find("input.txtQty").val());i++){

                        frmData.push({name: "addons_id[]", value: _button.attr("data-id")});
                        frmData.push({name: "addon_desc[]", value: _button.text()});
                        var service_price = money(_button.attr("data-price"));
                        if($("#hidMemberNumber").val() != "0")
                            service_price = money(_button.attr("data-member-price"));

                        frmData.push({name: "addons_price[]", value: clearmoney(service_price)});
                    }
                });
            }

            $.ajax({
                url: $("#hidBaseUrl").val()+"Main/save_sales",
                type: 'POST',
                data: frmData,
                cache: false,
                success: function(result) {  

                },
                error: function(result) {
                    //alert("some error occured, please try again later");
                },
                complete: function( jqXHR, textStatus ){
                    location.href = $("#hidBaseUrl").val()+"Main/sales";
                }
            });
           
           /* jQuery.support.cors = true;
            $.ajax({
                url: "http://biztrack.ph/cms_api/Rest_server/user_post2",
                type: 'POST',
                crossOrigin: true,
                data: frmData,
                cache: false,
                success: function(result) {  

                },
                error: function(result) {
                    //alert("some error occured, please try again later");
                },
                complete: function( jqXHR, textStatus ){
                 //   location.href = $("#hidBaseUrl").val()+"Main/sales";
                }
            });
            */
        }

        $("#tab-1 .ui-pinpad-command-panel table tbody tr:eq(0)").find("button").text("Cancel");
        $("#tab-1 .ui-pinpad-command-panel table tbody tr:eq(1)").find("button").text("Delete");
        $("#tab-1 .ui-pinpad-command-panel table tbody tr:eq(2)").find("button").addClass("success").text("Pay");
        //            $("#tab-1 .ui-pinpad-command-panel table tbody tr:eq(3)").find("button").addClass("info").text("Points");

        $("#tab-2 .ui-pinpad-command-panel table tbody tr:eq(0)").find("button").text("Cancel");
        $("#tab-2 .ui-pinpad-command-panel table tbody tr:eq(1)").find("button").text("Delete");
        $("#tab-2 .ui-pinpad-command-panel table tbody tr:eq(2)").find("button").addClass("success").text("Confirm");
    });
</script>


