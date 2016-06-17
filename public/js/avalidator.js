// Validation
$("button").click( function(e){

    e.preventDefault();

    var address = $("#address").val();
    var city = $("#city").val();
    var state = $("#state").val();

    if( address == "" ||  city == "" || state == ""){
        console.log("empty fields");
        $('#errormsg').text("All three fields are necessary, please try again.");
        hideErrorMsg();
    } else {
        $('#indicator').show();
        sendRequestAjax(address, city, state);
    }
});

function sendRequestAjax(address, city, state){

    $.ajax({
        url: "../ajax/validate_address.php",
        data: {input1: address, input2: city, input3: state},
        dataType: "json",
        success: function(result){
            $('#indicator').hide();
            console.log(result);
            if (result.street.length > 0){
                appendNewAddress(result);
            } else {
                badAddress();
            }
        },
        error: function(){
            $('#indicator').hide();
            console.log('something went wrong');
        }

    });

}

// Appends new item to the top of the table
function appendNewAddress(newAddress){
    $('tbody').prepend('<tr id="last" class="flash"><td>'+ newAddress.street +'</td><td>' + newAddress.city + '</td><td>' + newAddress.state + '</td><td>' + newAddress.zip + '</td></tr>');
    setTimeout(function(){
        $('#last').removeClass('flash');
    },3000);

    resetFields();
}

// Displays error message when results come back
function badAddress(){
    $('#errormsg').text("No results came back, please try again.");
    hideErrorMsg();
    resetFields();
}

function hideErrorMsg(){
    setTimeout(function(){
        $('#errormsg').text("");
    },3000);
}

function resetFields(){
    $("#address").val("");
    $("#city").val("");
    $("#state").val("");
}