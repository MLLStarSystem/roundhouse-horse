<!-- Modal -->
 
<div id="wide-modal" class="modal-demo" style="width:300px">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title"></h4>
    <div class="custom-modal-text p-20">

    </div>
    <div class="modal-footer">

    </div>
</div>  

<div id="receipt_modal" class="modal-demo" style="width:300px">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title"></h4>
    <div class="custom-modal-text p-20">

    </div>
    <div class="modal-footer">

    </div>
</div>  

<div id="confirm_modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title"></h4>
    <div class="custom-modal-text">

    </div>
    <div class="modal-footer">

    </div>
</div>

<div id="reload_modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Reload account</h4>
    <div class="custom-modal-text">
        <div class="row">
            <div class="col-md-6 load_wrapper" style="color:green;font-weight:600;padding: 6px 0px 12px;font-size: 19px;">Load Balance</div>
            <div class="col-md-6 text-right load_wrapper load_balance" style="color:green;font-weight:600;padding: 6px 11px 12px;font-size: 19px;">0.00</div>
            <div class="col-md-6" style="padding: 6px 1px;font-size: 17px;">Reload Amt.</div>
            <div class="col-md-6 text-right" style="font-size: 18px;">
                <select id="ddlReloadAmt" class="select cs-select cs-skin-elastic" label="">
                    <option value="100">100 Php</option>
                    <option value="200">200 Php</option>
                    <option value="300">300 Php</option>
                    <option value="500">500 Php</option>
                    <option value="1000">1000 Php</option>
                </select>

            </div>
            <div class="clearfix"></div>
            <div class="col-md-6" style="font-size: 18px;padding: 0px 3px;">Payment</div>
            <div class="col-md-6" > 
                <input id="txtPayment2" class="form-control text-right" type="text" style="height:32px;border-radius: 0;"></input>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 change_color2" style="margin-top:10px;border-top: solid 3px green;font-size:18px;padding:10px 0">Change</div>
            <div id="amtChange2" class="col-md-6 text-right change_color2" style="margin-top:10px;border-top: solid 3px green;font-size:18px;padding:10px 0">0.00</div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" id="btnReloadCard" type="button">Pay</button>
        <button data-dismiss="modal" class="btn btn-white cancel" onclick="Custombox.close();" type="button">Cancel</button> 
    </div>
</div>


<div id="payment_modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Payment</h4>
    <div class="custom-modal-text">
        <div class="row">
            <div class="col-md-6 load_wrapper " style="color:green;font-weight:600;padding: 6px 1px;font-size: 17px;">Load Balance</div>
            <div class="col-md-6 text-right padding-right-20 load_wrapper load_balance" style="color:green;font-weight:600;padding: 6px;font-size: 17px;">0.00</div>
            <div class="col-md-6" style="padding: 6px 1px;font-size: 18px;">Amount</div>
            <div id="amttopay3" class="col-md-6 text-right " style="color:green;font-weight:600;padding: 6px;font-size: 18px;">0.00</div>
            <div class="col-md-6 hide_if_member" style="margin-top:14px;font-size: 18px;padding: 0px 3px;">Payment</div>
            <div class="col-md-6 hide_if_member" style="padding: 10px 0;"> 
                <input id="txtPayment" class="form-control text-right" type="text" style="font-size:18px;height:30px;padding-right: 6px;"></input>
            </div>
            <div class="col-md-6 hide_if_member change_color" style="margin-top:10px;border-top: solid 3px green;font-size:18px;padding:0">Change</div><div id="amtChange3" class="col-md-6 text-right padding-right-20 hide_if_member  change_color" style="margin-top:10px;border-top: solid 3px green;font-size:18px;padding:0">0.00</div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" id="btnPayByCash" type="button">Pay</button>
        <button data-dismiss="modal" class="btn btn-white cancel" onclick="Custombox.close();" type="button">Cancel</button> 
    </div>
</div>

<div tabindex="-1" role="dialog" aria-labelledby="wide-modal" aria-hidden="true" id="wide-modal" class="modal fade modal-fade-in-scale-up modal-info" style="display: none;">
    <div class="overlay"></div>
    <div class="modal-dialog" style="max-width: 800px;width:100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="header-title"></h4>
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body padding-0">

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Modal title</h4>
    <div class="custom-modal-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </div>
</div>

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->

<script src="<?php echo base_url();?>public/assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->
<script src="<?php echo base_url();?>public/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/assets/js/waves.js"></script>
<script src="<?php echo base_url();?>public/assets/js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url();?>public/assets/plugins/switchery/switchery.min.js"></script>

<script src="<?php echo base_url();?>public/assets/plugins/custombox/js/custombox.min.js"></script>
<script src="<?php echo base_url();?>public/assets/plugins/custombox/js/legacy.min.js"></script>

<script src="<?php echo base_url();?>public/js/toastr.min.js"></script>
<script src="<?php echo base_url();?>public/js/main.js"></script>

<!-- App js -->
<script src="<?php echo base_url();?>public/assets/js/jquery.core.js"></script>
<script src="<?php echo base_url();?>public/assets/js/jquery.app.js"></script>

<script type="text/javascript">
    (function() {
        [].slice.call( document.querySelectorAll( 'select.cs-select.cs-skin-elastic') ).forEach( function(el) {    
            new SelectFx(el,{label:$(el).attr("label")});
        } );

    })(); 

</script>