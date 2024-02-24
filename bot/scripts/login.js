
fetch('scripts/config.json')
    .then(response => response.json())
    .then(json_data =>
        login_btn(json_data)
    ).catch(error => console.log(error));

function login_btn(json_data){
    $(".login_btn").click(function(e) {
        e.preventDefault();
        let apiUrl = json_data.API_URL;
        let dataUser = $(".username").val();
        let dataAccess = $(".access_key").val();
        if ($(".username").val().length == 0 || $(".access_key").val().length == 0) {
            Error("no", '<span>Invalid username or access key combination </span>', "6000");
        } else {
            $.ajax({
                method: 'GET',
                data: {username: dataUser, access_key: dataAccess},
                url: apiUrl+'/user/login.php',
                dataType: "json",
                cache: false,
                beforeSend: function () {
                    $('.login_btn').html('Checking data...');
                },
                success: function (res) {

                    // console.log(res);
                    if (res.status == true) {
                        localStorage.setItem("username", res.data.username);
                        localStorage.setItem("email", res.data.email);
                        localStorage.setItem("access_key", res.data.access_key);

                        new Audio('assets/sounds/notification.wav').play();
                        setTimeout(function () {
                            new Audio('assets/sounds/access_granted.mp3').play();
                        }, 700);
                        Error("yes", res.message, "6000");

                        setTimeout(function () {
                            $(".login_btn").html('Sign Up');
                            window.location = "popup.html";
                        }, 4000);

                    } else if (res.status == false) {
                        new Audio('assets/sounds/access_denied.mp3').play();
                        Error("no", res.message, "6000");
                        $(".login_btn").html('Sign Up');
                    } else if (res.blocked == 1) {
                        new Audio('assets/sounds/access_denied.mp3').play();
                        Error("no", "Your account was suspended.", "6000");
                        $(".login_btn").html('Sign Up');
                    } else if (res.active == 1) {
                        new Audio('assets/sounds/access_denied.mp3').play();
                        Error("no", "You are already logged in to another computer, logout to access Vinna.", "6000");
                        $(".login_btn").html('Sign Up');
                    } else if (res.valid == 0) {
                        new Audio('assets/sounds/access_denied.mp3').play();
                        Error("no", "Account not active yet", "6000");
                        $(".login_btn").html('Sign Up');
                    }
                }, error: function () {
                    Error("no", " API error", "6000");
                    $(".login_btn").html('Sign Up');
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



