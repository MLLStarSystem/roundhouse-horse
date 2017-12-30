
<style>
    .machines .btn{
        font-size: 18px;
        padding: 10px;
        margin: 0;
        cursor:pointer;
        border-radius: 0;
        border: solid 2px #fff !important;
    }
    .machines .btn.selected {
        background-color: #8a8a8a;
        color: #fff;}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <div class="machines">
                    <div class="row">
                        <?php 
                        if(count($washers) > 0){
                            for($i=0;$i<count($washers);$i++){
                                $activated = "";
                                if($washers[$i]["used"] == "1")
                                    $activated = "selected";

                        ?>
                                <button type="button" id="washer_<?php echo $i; ?>" data-salesid="<?php echo $washers[$i]["sales_id"]; ?>" data-id="<?php echo $washers[$i]["ID"]; ?>" type="button" class="btn btn-primary col-xs-3 col-sm-3 col-md-3 btnWashers <?php echo $activated; ?>" >
                                <?php echo $washers[$i]["description"]; ?></button>
                        <?php }
                        }?>
                        <div class="clearfix"></div>
                        <?php 
                        if(count($dryers) > 0){
                            for($i=0;$i<count($dryers);$i++){
                                $activated = "";
                                if($dryers[$i]["used"] == "1")
                                    $activated = "selected";
                        ?>
                                <button id="dryer_<?php echo $i; ?>" data-salesid="<?php echo $dryers[$i]["sales_id"]; ?>" data-id="<?php echo $dryers[$i]["ID"]; ?>" type="button" class="btn btn-info col-xs-3 col-sm-3 col-md-3 btnDryers <?php echo $activated; ?>"><?php echo $dryers[$i]["description"]; ?></button>
                        <?php }
                        }?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".machines").on("click",".btnWashers",function(){
            if(!$(this).hasClass("selected")){
                var desciption = $(this).text().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();
                });

                var id = $(this).attr("data-id");
                var sales_id = $(this).attr("data-salesid");
                $.ajax({
                    url: $("#hidBaseUrl").val()+"Machines/switch_washer_on_advance",
                    type: 'GET',
                    data: "ID="+id+"&sales_id="+sales_id,
                    cache: false,
                    success: function(result) {  

                    },
                    error: function(result) {
                        //alert("some error occured, please try again later");
                    },
                    complete: function( jqXHR, textStatus ){
                        toastr["success"](desciption+" has been activated and ready for use.");
                    }
                });
                $(this).addClass("selected");
            }
        });

        $(".machines").on("click",".btnDryers",function(){
            if(!$(this).hasClass("selected")){
                var desciption = $(this).text().toLowerCase().replace(/\b[a-z]/g, function(letter) {
                    return letter.toUpperCase();
                });

                var id = $(this).attr("data-id");
                var sales_id = $(this).attr("data-salesid");
                $.ajax({
                    url: $("#hidBaseUrl").val()+"Machines/switch_dryer_on_advance",
                    type: 'GET',
                    data: "ID="+id+"&sales_id="+sales_id,
                    cache: false,
                    success: function(result) {  

                    },
                    error: function(result) {
                        //alert("some error occured, please try again later");
                    },
                    complete: function( jqXHR, textStatus ){
                        toastr["success"](desciption+" has been activated and ready for use.");
                    }
                });
                $(this).addClass("selected");
            }
        });

    });
</script>
