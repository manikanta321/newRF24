$("#contactForm1").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
  
    var email = $("#email").val();
    var catagary = $("#catagary").val();
    var band = $("#band").val();
    var gain = $("#gain").val();
    var testDataSelected = "Nothing is selectd";
    if($("#yesTestData").prop('checked'))testDataSelected = "YES selected";
    else if($("#noTestData").prop('checked'))testDataSelected="NO Selected";
    else if($("#tbdTestData").prop('checked'))testDataSelected="TBD Selected";
    var message = $("#message").val();


    $.ajax({
        type: "POST",
        url: "php/form-process1.php",
        data:  "email=" + email + "&catagary=" + catagary +"&band=" + band +"&gain=" + gain + "&testDataSelected=" + testDataSelected+ "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}

function formSuccess(){
    $("#contactForm1")[0].reset();
    submitMSG(true, "Message Submitted!")
}

function formError(){
    $("#contactForm1").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}