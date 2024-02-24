let bet9jaOrigin = "http://localhost/vinna/controller/init-bot.php";
// let bet9jaOrigin = "https://virtual.bet9ja.com/virtual";
let SportBetOrigin = "https://virtual.bet9ja.com";
// var allowedOrigins = ['https://virtual.bet9ja.com/virtual', 'http://localhost/vinna/controller/init-bot.php'];

// Post message to iframe
// setTimeout(function () {
//     let vinnaIframe = document.querySelector(".vinnaIframe");
//         vinnaIframe.contentWindow.postMessage("hide", bet9jaOrigin);//post to bet-9ja
//         vinnaIframe.contentWindow.postMessage("hide", SportBetOrigin);//post to sporty bet
//         alert("message Posted by content script");

// }, 5000);

window.addEventListener('message', (event) => {
    setTimeout(function () {
    // Check the origin of the sender
    // if (event.origin !== SportBetOrigin) return;
    // Access the iframe element
    // const iframe = document.getElementById('targetIframe');
    const iframe = document.querySelector(".vinnaIframe");
    // Check if the event source is the iframe
    // if (event.source === iframe.contentWindow) {
    //     alert(event.origin);

        // Access the message sent from the iframe
        const messageFromIframe = event.data;

        // Perform actions with the message received from the iframe
        console.log('Received message from iframe happy new year:', messageFromIframe);

        // Manipulate the iframe content (if necessary)

        // document.querySelector(".main-wrapper").style.display = 'none';
        iframe.contentDocument.body.innerHTML = '<h1>Modified by Extension!</h1>';
    // }
    }, 5000);
});
