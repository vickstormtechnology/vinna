// let bet9jaOrigin = "http://localhost/vinna/controller/init-bot.php";
let bet9jaOrigin = "https://virtual.bet9ja.com/virtual";
let SportBetOrigin = "https://virtual.bet9ja.com/virtual";

    document.querySelector(".start_betting").addEventListener("click", function(){
        // let form = document.querySelector(".vinnaIframe").contentDocument.querySelector('.main-wrapper');
        // var d = document.querySelectorAll('iframe')[1]
        // var d = document.querySelectorAll('iframe')[1].contentWindow.innerHTML
        // var d = document.querySelectorAll('iframe')[1].contentWindow.document.body.querySelectorAll('a')
        // console.log(d);
        // if (window.top !== window.self) {
        //
        // }
        setTimeout(function () {
            window.top.postMessage("cross-origin", bet9jaOrigin);

                alert("Message II Posted");


            // var targetIframe = document.querySelector('iframe[src*="https://vgcommon.aitcloud.de/srvg-launcher/stable/bwg.html?clientId=1205&id=&lang=en&product=vfb&refId=&timeZone=Africa:Lagos"]');
            //
            // if (targetIframe) {
            //
            //     targetIframe.contentWindow.postMessage("cross-origin", bet9jaOrigin);
            //     alert("Message II Posted");
            // }



            // let vinnaIframe = document.querySelectorAll('iframe')[1];
            // if(vinnaIframe){
            //     vinnaIframe.contentWindow.postMessage("cross-origin", bet9jaOrigin);
            //     vinnaIframe.contentWindow.postMessage("cross-origin", SportBetOrigin);
            //     alert("Message II Posted");
            // }
        }, 1000);



    });

    //receive message from from content_script.js
window.addEventListener('message', function (event) {
    if(event.data == "hide"){
        document.querySelector(".terminate_bot").style.display="none";
        alert("Sent message is: "+event.data);
    }

    //receive message from iframe cross-origin
    setTimeout(function () {
        if(event.data == "cross-origin"){
            // document.querySelector('.main-wrapper').style.display="none";
            alert("Sent message II is: "+event.data);
        }
    }, 1000);

}, false);

    //receive message from admin js
    // window.addEventListener('message', function (event) {
    //     if(event.data == "cross-origin"){
    //         // document.querySelectorAll('iframe')[0].style.display="none";
    //         // document.querySelector(".main-wrapper").style.display="none";
    //         // document.querySelectorAll('iframe')[1].contentWindow.
    //         document.body.querySelector('.main-wrapper').style.display="none";
    //         alert("Message II sent");
    //     }
    // }, false);