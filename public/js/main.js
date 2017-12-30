	function genericModal(title, body, footer){
        $("#generic-modal").css("display","block");
        $("#generic-modal").find(".header-title").html("");
        $("#generic-modal").find(".header-title").html(title);
        $("#generic-modal").find(".modal-body").html("");
        $("#generic-modal").find(".modal-body").append(body);

        $("#generic-modal").find(".modal-footer").html("");
        $("#generic-modal").find(".modal-footer").html(footer);
        $("#generic-modal").stop().animate({"opacity":"1"},300, function(){
            $("#generic-modal").addClass("in");
        });
    }

    function openModal(obj,title, body, footer){
       
        obj.css("display","block");
        obj.find(".header-title").html("");
        obj.find(".header-title").html(title);
        obj.find(".modal-body").html("");
        obj.find(".modal-body").append(body);

        obj.find(".modal-footer").html("");
        obj.find(".modal-footer").html(footer);
        obj.stop().animate({"opacity":"1"},300, function(){
            $(this).addClass("in");
        });
    }

    function openmodal(obj){
        obj.css("display","block");
        obj.stop().animate({"opacity":"1"},300, function(){
            $(this).addClass("in");
        });
    }

    
$(document).on('click','.modal-header > .close', function( ev ) {
	ev.stopPropagation();
     if( ev.target != this ) 
       return;
    //...do stuff
    
    closeModalNow();
});

$(document).on('click','.modal-footer > .cancel', function( ev ) {
	ev.stopPropagation();
     if( ev.target != this ) 
       return;
    //...do stuff
    
    closeModalNow();
});

$(document).on('click','.modal-footer > .cancelMe', function( ev ) {
    ev.stopPropagation();
     if( ev.target != this ) 
       return;
    //...do stuff
    closeMyModalNow($(this));
});

//Immediately close parent modal	
function closeMyModalNow(obj){
    var modal = obj.closest(".modal.in");
    modal.removeClass("in");
    setTimeout( function() {
        modal.css("display","none");
        if(modal.hasClass("confirmation-modal") == true){
            modal.remove();
        }
    }, 100 );
}


function closeModalNow(){
	var modal = $(".modal.in");
    modal.removeClass("in");
    setTimeout( function() {
        modal.css("display","none");
        if(modal.hasClass("confirmation-modal") == true){
        	modal.remove();
        }
    }, 100 );
}

function closeModal(modalId){
    modal = document.querySelector(modalId);
    classie.remove( modal, 'md-show' );
    $(".md-overlay").removeClass("show");
}

$(".column-control input:checkbox").click(function(){
    var column = "table ." + $(this).attr("data-field");
    if($(this).prop("checked")){
        $(column).removeClass("hide");
    }else{
        $(column).addClass("hide");
    }
});

function money(amt){
    return parseFloat(amt, 10).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
}
function clearmoney(amt){
    return amt.replace("'","").replace(",","").replace("Php","").replace(" Php","").replace("P","").replace("P ","");
}
$('.cleartoasts').click(function () {
    toastr.clear();
});


            $("#selectall").click(function () {
                var checkAll = $("#selectall").prop('checked');
                    if (checkAll) {
                        $(".case").prop("checked", true);
                    } else {
                        $(".case").prop("checked", false);
                    }
                });

            $(".case").click(function(){
                if($(".case").length == $(".case:checked").length) {
                    $("#selectall").prop("checked", true);
                } else {
                    $("#selectall").prop("checked", false);
                }

            });


        function clearconsole() { 
          console.log(window.console);
          if(window.console || window.console.firebug) {
           console.clear();
          }
        }

$(".select2").select2();
$(".select2.nosearch").select2({ "minimumResultsForSearch": -1});

$(".main-tab").click(function(){

    $(".tab-holder .main-tab.active").removeClass("active");
    $(".tab-panel.active").removeClass("active");
    $(this).addClass("active"); 
    $("#"+$(this).attr("tab")).addClass("active");

    if($(this).attr("tab") == "article_list")
        $(".freetext").expanding();
});

$(".datepicker").datepicker();


 function gup( name )
                {
                    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
                    var regexS = "[\\?&]"+name+"=([^&#]*)";
                    var regex = new RegExp( regexS );
                    var results = regex.exec( window.location.href );
                    if( results == null )
                        return null;
                    else
                        return results[1];
                }    
                