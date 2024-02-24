
//fetch config.js
fetch('scripts/config.json')
    .then(response => response.json())
    .then(json_data =>
        logout_btn(json_data)
    ).catch(error => console.log(error));


function logout_btn(json_data){
    $(".logout_btn").click(function(e) {
        e.preventDefault();
        let username_db = localStorage.getItem("username");
        let apiUrl = json_data.API_URL;
        if (username_db == null) {
            Error("no", '<span>Unrecognized user: self destruct started</span>', "6000");
            setTimeout(function () {
                window.close();
            }, 2000);
        } else {
            $.ajax({
                method: 'GET',
                data: {username: username_db},
                url: apiUrl+'/user/logout.php',
                dataType: "json",
                cache: false,
                success: function (res) {
                    // console.log(res);
                    if (res.status == true) {
                        Error("yes", '<span>Users session terminated, redirecting...</span>', "6000");
                        setTimeout(function () {
                            localStorage.removeItem("username");
                            window.close();
                        }, 2000);
                    }
                }, error: function () {
                    Error("no", " API error", "6000");
                }
            })
        }
    });
}


function Error(success, text, time) {
    if(success == "yes"){
        $('#msgLogout').html('<center class="err"><p style="color: #30bf5a " >'+text+'</p></center>');
    }else{
        $('#msgLogout').html('<center class="err"><p style="color: #fa5348 " >'+text+'</p></center>');
    }
    setTimeout(function() {
        $('.err').hide();
    },time);
}



