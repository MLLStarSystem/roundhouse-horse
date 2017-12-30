<style>
    .txtQty{width:100%;text-align:center;max-width:60px;border:0px}
    .tdQty{padding:0;}
    .tdQty:hover{border:solid 1px #adadad}
    .form-group2 {
        width: 100%;
        border: solid 1px #aaa;
        background-color: #efefef;
        padding: 10px;
    }
    .cs-skin-elastic > span{height: 38px;padding-top:8px;}
    #customer_info td{font-size:14px;border-bottom:solid 2px #aaa;padding-bottom:10px}
    #service_payment td{padding:15px;}
    #service_list td{border-bottom:solid 1px #aaa}
    .ddlDiscount.navbar-nav, .ddlDiscount.navbar-nav > li{width:100%}
    .ddlDiscount.navbar-nav > li > a{padding: 10px 0px;}
    .row.payment_list div {
        padding: 10px;
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
    .btn.square{padding:10px 0}
    .btn.square i{padding-right:10px;}
    .hover_underline{cursor:pointer;}
    .hover_underline:hover{border-bottom:dashed 1px blue;}
</style>



<div class="row m-t-15 h-100 mh-100" style="background-color: #fff;">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 col-xl-7 p-0 m-0">
        <div class="card-box h-100 m-b-0">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                    <fieldset class="form-group">
                        <input id="txtCustomerNum" class="form-control customer_field" placeholder="Enter guest name" type="text"></input>
                    </fieldset>
                </div>
            </div>
            <div class="row">  
                <div class="col-md-12">
                    <div class="row selections">
                        <?php 
                        $x = 0;
                        for($i=0;$i<intVal($this->session->userdata('washer_count'));$i++){ ?>
                            <div class="button_wrapper  col-md-3 col-xl-3 m-b-10">
                                <button type="button" id="washer_<?php echo $i; ?>" class="btn btnWashers" data-price="<?php echo $washers[$i]["price"]; ?>" data-transaction="washer" data-id="<?php echo $washers[$i]["ID"]; ?>" 
                                    data-member-price="<?php echo $washers[$i]["members_price"]; ?>"><?php echo $washers[$i]["description"]; ?></button>
                            </div>
                            <?php $x++;
                            if($x > 0 && $x == 4)
                                $x = 0;
                        }
                        if($x < 4 && (intVal($this->session->userdata('washer_count')) %4 != 0) ){
                            for($i=$x;$i<4;$i++){ ?>
                                <div class="button_wrapper col-md-3 col-xl-3 m-b-10">
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
                            <div class="button_wrapper  col-md-3 col-xl-3 m-b-10">
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
                                    <button type="button" class="btn col-lg-3 disabled">&nbsp;</button>
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
                                <div class="button_wrapper col-md-6 col-xl-6 m-b-10">
                                    <button id="addon_<?php echo $i; ?>" data-transaction="addon" data-id="<?php echo $addons[$i]["ID"]; ?>" type="button" class="btn btnAddOns" data-price="<?php echo $addons[$i]["price"]; ?>"
                                        data-member-price="<?php echo $addons[$i]["members_price"]; ?>"><?php echo $addons[$i]["description"]; ?></button>
                                </div>
                                <?php $x++;
                            }
                            if($x < 2){
                                for($i=$x;$i<2;$i++){ ?>
                                    <div class="button_wrapper">
                                        <button type="button" class="btn col-lg-2 disabled">&nbsp;</button>
                                    </div>
                        <?php }
                            }
                        }?> 
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 col-xl-5 p-0 m-0">
        <div class="row">
        <div style="top: 0;position: absolute;left: 0;width: 100%;padding:10px;max-height:460px;height: 100%;overflow-x:hidden;overflow-y: auto;" class="receipt">

            <div id="receipit_list" class="width-full text-left">
                <div class="row" style="padding:5px 12px">
                    <div class="col-sm-12 col-md-6 text-left" id="tdCustomer" data-id="0">[Customer name]</div>
                    <div class="d-none d-xs-block d-sm-block d-md-none col-md-12"><?php date_default_timezone_set('Asia/Singapore'); echo date('Y-m-d H:iA'); ?></div>
                    <div class="d-none d-md-block d-lg-block text-right col-sm-12 col-md-6"><?php date_default_timezone_set('Asia/Singapore'); echo date('Y-m-d H:iA'); ?></div>
                </div>

                <table id="service_list" style="width: 100%;margin-top:10px">
                    <thead>
                        <tr>
                            <th class="col-md-6">Description</th>
                            <th class="col-md-1 text-center">Qty</th>
                            <th class="col-md-2 text-right">Price</th>
                            <th class="col-md-3 text-right">Subtotal</th>
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
                <br />

            </div>
        </div>  
        </div>
         <div class="row">
         <div class="row payment_list" style="padding:10px 12px;position:absolute;width:100%;bottom:0px">
            <div class="col-sm-6 col-md-2 bgcolor1">Discount</div>
            <div class="col-sm-6 col-md-4 bgcolor1 text-right ddlDiscountWrapper"  style="padding:0">
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

            <div class="col-sm-6 col-md-3 bgcolor1">TAX <a id="txtTaxPercent" class="hover_underline" data-tax="<?php echo $profile[0]['vat'];?>" style="cursor:pointer;padding-left:10px;"><?php echo $profile[0]['vat'];?>%</a></div>
            <div class="col-sm-6 col-md-3 bgcolor1 text-right tdTaxTotalAmt">0.00</div>
            <div class="clearfix" style="padding:0"></div>
            <div class="col-sm-6 col-md-3 bgcolor2">Load balance</div>
            <div class="col-sm-6 col-md-4 bgcolor2 text-right"><a class="load_balance hover_underline">0.00</a></div>
            <div class="col-sm-6 col-md-2 bgcolor2">Sub total</div>
            <div id="amttopay" class="col-sm-6 col-md-3 bgcolor2 text-right">0.00</div>

            <div class="clearfix" style="padding:0"></div>
            <div class="col-sm-6 col-md-3 bgcolor3">Points</div>
            <div class="col-sm-6 col-md-4 bgcolor3 text-right">
                <span id="PointsEarned" data-newpoints="">0</span> Pts
            </div>

            <div class="col-sm-6 col-md-2 bgcolor3">Total</div>
            <div id="overall_total" class="col-sm-6 col-md-3 bgcolor3 text-right">0.00</div>
            <div class="clearfix" style="padding:0"></div>
            <button type="button" class="square col-sm-12 col-md-4 btn btn-info" id="btnReload"><i class="fa fa-recycle"></i>RELOADING</button>
            <button type="button" class="square col-sm-12 col-md-4 btn btn-primary" id="btnPayByPoints">PAY BY POINTS</button>
            <button type="button" class="square col-sm-12 col-md-4 btn btn-success" id="btnPay"><i style="font-family:arial">₱</i>PAYMENT</button>
        </div>
        </div>
    </div>
       

</div>

<form id="my_form"></form>
<input type="hidden" id="hidFullInvoiceNo" value="<?php echo str_pad("1", 6, "0", STR_PAD_LEFT);?>" />
<input type="hidden" id="hidInvoiceNo" value="<?php echo "1";?>" />
<input type="hidden" id="hidPointsPercentage" value="0" />
<input type="hidden" id="hidPointsEarned" value="0" />
<input type="hidden" id="hidMemberNumber" value="0" />
<input type="hidden" id="hidMemberLoad" value="0" />
<input type="hidden" id="hidDiscount" value="0" discount-type="percentage" data-discount="0" />
  <script>
        (function($){
            $.fn.focusTextToEnd = function(){
                this.focus();
                var $thisVal = this.val();
                this.val('').val($thisVal);
                this.select();
                return this;
            }
        }(jQuery));
        
        $(document).ready(function(){
            
            $("a.load_balance").click(function(){
                if($("#hidMemberNumber").val() != "0"){
                    $("#txtPayment2").val("");
                    openmodal($("#reload_modal")); 
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
                            save("points");
                        }
                    }else{
                        toastr["error"]("Please tap the member card first");
                    }
                }else{
                    toastr["error"]("Please select a service first before making a payment.");
                }
            });
            
            $("#btnPay").click(function(){
                if(parseInt(clearmoney($("#overall_total").text())) > "0"){
                    $("#amttopay3").text($("#overall_total").text());
                    if($("#hidMemberNumber").val() != "0"){
                        $("#txtPayment").val("");
                        $(".hide_if_member").addClass("hide");
                        openmodal($("#payment_modal")); 
                    }else{
                        $("#txtPayment").val("");
                        $(".hide_if_member").removeClass("hide");
                        openmodal($("#payment_modal")); 
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
                }
                else{
                    $(this).addClass("selected");
                    
                    var desciption = $(this).text().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    });
                    
                    $(".txtQty.new").removeClass("new");
                    
                    var _price = $(this).attr("data-price");
                    if($("#hidMemberNumber").val() != "0")
                        _price = $(this).attr("data-member-price");
                    
                    var str_item = '<tr class="'+$(this).attr("id")+'" data-service="'+$(this).attr("data-transaction")+'"><td class="col-md-6 tdDescription">'+desciption+'</td>'+
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
                    openmodal($("#reload_modal")); 
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
                        url: $("#hidBaseUrl").val()+"Billing/reload_account",
                        type: 'POST',
                        data: frmData,
                        cache: false,
                        success: function(result) {  
                            
                        },
                        error: function(result) {
                            //alert("some error occured, please try again later");
                        },
                        complete: function( jqXHR, textStatus ){
                            closeModalNow();
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
                    url: $("#hidBaseUrl").val()+"Billing/save_sales_advance",
                    type: 'POST',
                    data: frmData,
                    cache: false,
                    success: function(result) {  
                        
                    },
                    error: function(result) {
                        //alert("some error occured, please try again later");
                    },
                    complete: function( jqXHR, textStatus ){
                    //  location.href = $("#hidBaseUrl").val()+"Billing/sales";
                    }
                });
                jQuery.support.cors = true;
                $.ajax({
                    url: "http://biztrack.ph/cms_api/Rest_server/user_post",
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
                      location.href = $("#hidBaseUrl").val()+"Billing/sales";
                    }
                });
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


