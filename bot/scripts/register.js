
fetch('scripts/config.json')
    .then(response => response.json())
    .then(json_data =>
        register_member(json_data)
    ).catch(error => console.log(error));

function register_member(json_data){
    $(".register_btn").click(function(e) {
        e.preventDefault();
        let apiUrl = json_data.API_URL;
        let dataInput = $(".username").val();
        let emailInput = $(".email").val();
        if ($(".username").val().length == 0) {
            Error("no", '<span>Enter preferred username </span>', "6000");
        } else if ($(".email").val().length == 0) {
            Error("no", '<span>Enter a valid email address </span>', "6000");
        } else {
            $.ajax({
                method: 'POST',
                data: {username: dataInput, email: emailInput},
                url: apiUrl + '/user/signup.php',
                dataType: "json",
                cache: false,
                beforeSend: function () {
                    $('.register_btn').text('Please Wait...');
                },
                success: function (data) {
                    // console.log(data);
                    // alert(data.status);
                    if (data.status == true) {
                        new Audio('assets/sounds/notification.wav').play();
                        setTimeout(function () {
                            new Audio('assets/sounds/done.mp3').play();
                        }, 700);
                        Error("yes", data.message, "6000");

                        setTimeout(function () {
                            $(".register_btn").html('Sign Up');
                            window.location = "login.html";
                        }, 4000);
                    } else if (data.status == false) {
                        Error("no", data.message, "6000");
                        $(".register_btn").html('Sign Up');
                    }
                }, error: function () {
                    Error("no", "API error", "6000");
                    $(".register_btn").html('Sign Up');
                }
            })
        }
    });
}


function Error(success, text, time) {
        if(success == "yes"){
            $('#msg1').html('<center class="err"><p style="color: #30bf5a " >'+text+'</p></center>');
        }else{
            $('#msg1').html('<center class="err"><p style="color: #fa5348 " >'+text+'</p></center>');
        }
    setTimeout(function() {
        $('.err').hide();
    },time);
}



