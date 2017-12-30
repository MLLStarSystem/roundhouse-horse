<style>
.table_receipt .table tbody td {
    padding: 4px;
    font-size: 11px;
}
.table_receipt .table thead th{padding:5px}
</style>
<div class="table_receipt">
    <table id="service_list" class="table thead-default" style="text-align:left;width: 100%;font-size:12px">
        <thead>
            <tr>
                <th style="text-align:left">Description</th>
                <th style="text-align:center">Qty</th>
                <th style="text-align:right">Price</th>
                <th style="text-align:right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
             if(count($washer_receipt) > 0){
                foreach($washer_receipt as $val){
            ?>
            <tr>
                <td style="text-align:left"><?php echo $val["description"];?></td>
                <td style="text-align:center"><?php echo $val["qty"];?></td>
                <td style="text-align:right"><?php echo $val["price"];?></td>
                <td class="tdsubtotal" style="text-align:right"><?php echo $val["subtotal"];?></td>
            </tr>
                <?php }
             }
             ?>
            
              <?php
             if(count($dryer_receipt) > 0){
                foreach($dryer_receipt as $val){
            ?>
            <tr>
                <td><?php echo $val["description"];?></td>
                <td style="text-align:center"><?php echo $val["qty"];?></td>
                <td style="text-align:right"><?php echo $val["price"];?></td>
                <td class="tdsubtotal" style="text-align:right"><?php echo $val["subtotal"];?></td>
            </tr>
                <?php }
             }
             ?>
            
              <?php
             if(count($addon_receipt) > 0){
                foreach($addon_receipt as $val){
            ?>
            <tr>
                <td><?php echo $val["description"];?></td>
                <td style="text-align:center"><?php echo $val["qty"];?></td>
                <td style="text-align:right"><?php echo $val["price"];?></td>
                <td class="tdsubtotal" style="text-align:right"><?php echo $val["subtotal"];?></td>
            </tr>
                <?php }
             }
             ?>
             </tbody>
        </table>
        <table id="payment" class="table" style="text-align:left;width: 100%;font-size:12px">
          <tbody>
            <tr>
                <td colspan="4">Tax: <span id="tax" style="margin-left:5px"><?php echo $sales[0]["tax"]; ?> </span>
                 <span style="float:right;text-align:right" id="tax_val"><?php echo $sales[0]["tax_value"]; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="4">Sub total:
                 <span style="float:right;text-align:right" id="subtotal"><?php echo $sales[0]["subtotal"]; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="4">DC: <span id="discount" style="margin-left:5px"><?php echo ($sales[0]["discount_desc"] == "0") ? "N/A": $sales[0]["discount_desc"]; ?></span>
                 <span style="float:right;text-align:right" id="discount_val"><?php echo $sales[0]["discount_value"]; ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="4">Total:
                 <span style="float:right;text-align:right" id="total"><?php echo $sales[0]["total"]; ?></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
         var total = 0;
                $("#service_list tbody tr").each(function(){
                    var price = parseFloat(clearmoney($(this).find(".tdsubtotal").text()));
                    total = parseFloat(total) + price;
                });
                
                $("#subtotal").text(money(total));
                
                
                $("#overall_total").text(money(total));
                $("#service_payment").find(".tdTotalAmtToPay").text(money(total));
                $("#amttopay2").text(money(total));
    });
</script>