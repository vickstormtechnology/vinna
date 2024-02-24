setInterval(function(){
//fetch config.js
fetch('scripts/config.json')
    .then(response => response.json())
    .then(json_data =>
        validate_session(json_data)
    ).catch(error => console.log(error));

function validate_session(json_data){
        let username_db = localStorage.getItem("username");
        let apiUrl = json_data.API_URL;
        if (username_db == null) {
            setTimeout(function () {
                window.close();
            }, 2000);
        } else {
            $.ajax({
                method: 'GET',
                data: {username: username_db},
                url: apiUrl+'/user/selectUsersDetail.php',
                dataType: "json",
                cache: false,
                success: function (res) {
                    // alert(res.data.blocked);
                    if (res.data.blocked == 1) {
                        localStorage.removeItem("username");
                    }else if(res.data.active_session == 0){
                        localStorage.removeItem("username");
                    }else if(res.data.valid_subscriber == 0){
                        localStorage.removeItem("username");
                        localStorage.removeItem("email");
                        localStorage.removeItem("access_key");
                    }else if(res.status == false){
                        setTimeout(function () {
                            window.close();
                        }, 2000);
                    }
                }, error: function () {
                    alert('Validation Error');
                }
            })
        }
}

}, 4000);
