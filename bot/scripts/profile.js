

//getting data saved in the local storage
let username_db = localStorage.getItem("username");
let email_db = localStorage.getItem("email");
let access_key_db = localStorage.getItem("access_key");
//setting username to display
if(username_db != null){
    document.getElementById('profile_username').innerText = username_db;
    document.getElementById('profile_username2').innerText = username_db;
    document.getElementById('profile_email').innerText = email_db;
}
