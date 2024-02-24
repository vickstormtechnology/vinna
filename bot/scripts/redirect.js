
let username_db = localStorage.getItem("username");
let email_db = localStorage.getItem("email");
let access_key_db = localStorage.getItem("access_key");

if(username_db == null && email_db == null && access_key_db == null){
    window.location.href="onboarding.html";
}else if(username_db != null && email_db != null && access_key_db != null){
    window.location.href="popup.html";
}else if(username_db == null && email_db != null && access_key_db != null){
    window.location.href="login.html";
}