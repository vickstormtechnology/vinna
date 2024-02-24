$(".stop_bet9ja").hide();
$(".stop_sportybet").hide();
//getting data saved in the local storage
let username_db = localStorage.getItem("username");
let email_db = localStorage.getItem("email");
let access_key_db = localStorage.getItem("access_key");
//setting username to display
if(username_db != null){
    // alert(username_db);
    document.querySelector('.name').innerText = username_db;
    document.querySelector('.name_home').innerText = username_db;
}

//kEEP THE BET9JA START BETTING BUTTON PERSISTENT
let startBotBet9ja = localStorage.getItem("startBotBet9ja");
    startBotBet9ja == "true" ? $(".stop_bet9ja").show() : $(".stop_bet9ja").hide();
    startBotBet9ja == "true" ? $(".start_bet9ja").hide() : $(".start_bet9ja").show();

//kEEP THE SPORTY BET START BETTING BUTTON PERSISTENT
let startBotSporty = localStorage.getItem("startBotSporty");
    startBotSporty == "true" ? $(".stop_sportybet").show() : $(".stop_sportybet").hide();
    startBotSporty == "true" ? $(".start_sportybet").hide() : $(".start_sportybet").show();


//Start Bet9ja
document.getElementById("start_bet9ja").addEventListener("click", async function(){
    chrome.tabs.query({active: true, lastFocusedWindow: true}, tabs => {
        let url = tabs[0].url;
        if (url.indexOf('bet9ja') > -1 || url.indexOf('vgcommon') > -1) {

            chrome.runtime.sendMessage({
                command: "openIframe"
            }, function(response) {
                let username_db = localStorage.getItem("username");

                if (username_db != null) {
                    localStorage.setItem("startBotBet9ja", "true");
                    $(".start_bet9ja").hide();
                    $(".stop_bet9ja").show();
                }
            });
        }
    });

});

//Stop Bet9ja
function stop_bet9ja(){
    $(".stop_bet9ja").click(function(e) {
        let username_db = localStorage.getItem("username");
        localStorage.removeItem("startBotBet9ja");
        if (username_db != null) {
            $(".start_bet9ja").show();
            $(".stop_bet9ja").hide();
        }
    });
}


//Start sportyBet
function start_sportybet(){
    $(".start_sportybet").click(function(e) {
        chrome.tabs.query({active: true, lastFocusedWindow: true}, tabs => {
            let url = tabs[0].url;
            if (url.indexOf('sportybet') > -1) {
                let username_db = localStorage.getItem("username");
                if (username_db != null) {
                    localStorage.setItem("startBotSporty", "true");
                    $(".start_sportybet").hide();
                    $(".stop_sportybet").show();
                }
            }
        });
    });
}


//Stop sportyBet
function stop_sportybet(){
    $(".stop_sportybet").click(function(e) {
        let username_db = localStorage.getItem("username");
        localStorage.removeItem("startBotSporty");
        if (username_db != null) {
            $(".start_sportybet").show();
            $(".stop_sportybet").hide();
        }
    });
}



stop_bet9ja();
start_sportybet()
stop_sportybet()