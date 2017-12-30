<style>
    body,html{height:100%;max-height:100%;background-color:#fff;}
    .wrapper,.wrapper > .container{height:100%;max-height:100%;}
    .table tbody td {
        padding: 4px;
        font-size: 13px;
        vertical-align: middle;
    }
    .table thead th {
        vertical-align: bottom;
        padding: 13px 5px;
    }
</style>
<div class="col-sm-12">
    <div class="btn-group pull-right m-t-15">
        <div class="form-group pull-right" style="padding:0;margin:0;width:100%">
            <input type="text" class="datepick form-control text-center" placeholder="Search sales by date" id="txtDate" />
        </div>
    </div>
    <h4 class="page-title"> <?php
        $date = new DateTime();
        $search = $date->format('m/d/Y');
        if($this->input->get("search") != ""){
            $search = $this->input->get("search");
        }
    ?>
        Sales record for <?php echo $search; ?>
    </h4>
</div>
<div class="row m-t-0">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="row">
            <div class="col-md-12">
                <div class="widget">             
                    <div class="widget-body main-wrapper">
                        <table class="table table-striped">
                            <thead class="thead-default">
                                <tr>
                                    <th style="width: 100px;">Date</th>
                                    <th style="width: 100px;">Invoice No#</th>
                                    <th>Personel</th>
                                    <th>Customer</th>
                                    <th>Type</th>
                                    <th class="text-center">Discount</th>
                                    <th class='text-right'>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
                            if(count($records) > 0){
                            foreach($records as $val){?>
                                    <tr data-id="<?php echo $val["ID"]; ?>">
                                        <td><?php echo $val["date_created"]; ?></td>
                                        <td class='hidden order_no'><?php echo $val["full_invoice_no"]; ?></td>
                                        <td><?php echo $val["employee"]; ?></td>
                                        <td class='customer'><?php echo ($val["member_name"] != NULL ? $val["member_name"] : $val["customer_name"]); ?></td>
                                        <td><?php echo ($val["customer_id"] != "0" ? "MEMBER" : "GUEST"); ?></td>
                                        <td class="text-center"><?php echo $val["discount_desc"]; ?></td>
                                        <td class='text-right'>₱ <?php echo $val["total"]; ?></td>
                                        <td style="text-align:right">
                                            <button type="button" class="btn btn-primary btnView btn-sm"><i class="fa fa-search"></i> View</button>
                                            <button type="button" class="btn btn-info btnSwitch btn-sm"><i class="fa fa-toggle-on"></i> Switch</button>
                                            <?php if($this->session->userdata('role') == "admin") { ?>
                                                <button type="button" class="btn btn-danger btnDelete btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php }
                            }?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</div>  
<script>
    $(document).ready(function(){
        $('.datepick').datepicker().on("input change", function (e) {
            location.href = "?search="+e.target.value;
        });


        $(".btnSwitch").click(function(){
            var _id = $(this).closest("tr").attr("data-id");
            var customer = $(this).closest("tr").find("td.customer").text();

            var footer = '<button data-dismiss="modal" class="btn btn-sm btn-white pull-right" onclick="Custombox.close();"  type="button">Close</button>';


            $.ajax({
                url: $("#hidBaseUrl").val()+"Machines/secured_switch",
                data: "q="+_id,
                type: 'POST',
                dataType: "html",
                cache: false,
                success: function(result) {  
                    body = result;
                    $("#wide-modal .custom-modal-title").text("SECURED SWITCH FOR "+customer);
                    $("#wide-modal .custom-modal-text").html(body);                        
                    $("#wide-modal .modal-footer").html(footer);

                    Custombox.open({
                        target: "#wide-modal",
                        effect: "door",
                        overlaySpeed: "100",
                        overlayColor: "#36404a",
                        width:"600"
                    })

                },
                error: function(result) {
                    //alert("some error occured, please try again later");
                }
            });
        });

        $(document).on("click",".btn.btnDelete",function(){
            var bill_id = $(this).closest("tr").attr("data-id");
            var body = "Are you sure you want to delete this record?";
            var title = "Please confirm";
            var footer = '<button class="btn btn-sm btn-info pull-right" id="btnDeleteGo" data-id="'+bill_id+'" type="button">Yes</button>'+
            '<button data-dismiss="modal" class="btn btn-sm btn-white cancel pull-right" onclick="Custombox.close();" type="button">No</button>';

             $("#confirm_modal .custom-modal-title").text(title);
                    $("#confirm_modal .custom-modal-text").html(body);                        
                    $("#confirm_modal .modal-footer").html(footer);
                    
              Custombox.open({
                        target: "#confirm_modal",
                        effect: "door",
                        overlaySpeed: "100",
                        overlayColor: "#36404a"
                    })
                                                               
        });

        $(document).on("click","#btnDeleteGo",function(){
            var _id = $(this).attr("data-id");
            $.ajax({
                url: $("#hidBaseUrl").val()+"Billing/delete_sales",
                data: "id="+_id,
                type: 'POST',
                dataType: "html",
                cache: false,
                success: function(result) {  
                    closeModalNow();
                },
                error: function(result) {
                    //alert("some error occured, please try again later");
                }
            }).done(function(){

            }); 

            jQuery.support.cors = true;
            $.ajax({
                url: "http://biztrack.ph/cms_api/Rest_server/delete_sales",
                type: 'POST',
                crossOrigin: true,
                data: "id="+_id+"&user_id="+$("#hidUserId").val(),
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


        });

        $(document).on("click",".btn.btnView",function(){
            var _id = $(this).closest("tr").attr("data-id");
            var order_no = $(this).closest("tr").find("td.order_no").text();
            var footer = '<button class="btn btn-block btn-info pull-right hide" id="btnPrint" type="button">Print</button>'+
            '<button data-dismiss="modal" class="btn btn-sm btn-white pull-right" onclick="Custombox.close();"  type="button">Close</button>';

            var body = "";

            $.ajax({
                url: $("#hidBaseUrl").val()+"Main/print_receipt",
                type: 'GET',
                data: 'id='+_id,
                dataType: "html",
                cache: false,
                success: function(result) {  
                    body = result;
                },
                error: function(result) {
                    //alert("some error occured, please try again later");
                }
            }).done(function(){
                $("#receipt_modal .custom-modal-title").text("ORDER NUMBER #"+order_no);
                $("#receipt_modal .custom-modal-text").html(body);                        
                $("#receipt_modal .modal-footer").html(footer);

                Custombox.open({
                    target: "#receipt_modal",
                    effect: "door",
                    overlaySpeed: "100",
                    overlayColor: "#36404a",
                    width: "300"
                })

            });

        });
    });
</script>