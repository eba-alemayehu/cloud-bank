// APP 

$(document).on('click', 'main,footer', function(){
    $("#app-navbar-collapse").slideUp();
});
$(document).on('click','#mobile-drop',function(){
    $("#app-navbar-collapse").toggle(700);
});
$("#navigation li").each(function(){
    if(window.location.pathname == '/'+$(this).attr("name"))
        $(this).addClass("active");

});


// FORM VALIDATION
$(document).children("body").each(function(data){
    console.log(data);
});

// PAYMENT BUTTON GENERATOR
$('#paymentButton').on("submit", 'form',function(e){
    e.preventDefault();
    var color = $(this).find("[name='buttonColor']").val();
    var inputs = [];
    $(this).find('input').each(function(i,input){
        inputs.push($(input).val());
    });
    var formStart = "<form action='/pay' method='POST'>";
    var price = "<input type='text' name='price' value='"+inputs[2]+"' hidden/>"
    var key = "<input type='text' name='key' value='"+api_key+"' hidden/>";
    var redirect = "<input type='text' name='redirect' value='"+inputs[4]+"' hidden/>";
    var payButton  = "<button type='submit' style='padding:.5em .8em .5em .8em;color:"+inputs[1]+";background:"+
                    inputs[0]+";box-shadow:2px 3px 4px rgba(0,0,0,.3);border:none;border-radius:3px'"+
                    "onclick='this.style.boxShadow = \"0px 0px 0px rgba(0,0,0)\" '"
                    +">"+
                    inputs[3]+"</button>"
    var formEnd = "</form>";
    var html = formStart + price + key +redirect+ payButton + formEnd;
    $("#htmlCode").css('display','block').find('textarea').text(html);
    $("#buttonView").css('display','block').html("<label>Button Preview</label>"+html);
    return false; 
});