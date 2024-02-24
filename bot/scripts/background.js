
 // let injectFrame = chrome.querySelector('.start_bet9ja');
 // var aa = document.getElementById('rustyZone-element-host');
 // $(".rustyZone-element-host").addClass("hide");
 // aa.style.display = 'none';

 // function backgroundFunction() {
 //     alert('Background, reporting for duty!');
 // }



// function runIframe() {
//
//      try {
//          chrome.tabs.onUpdated.addListener(function(tabId, changeInfo, tab) {
//
//              if (changeInfo.status == 'complete') {
//                  if (tab.url?.startsWith("chrome://")) {
//                      return undefined;
//                  } else {
//                      console.log(tab.id);
//                      chrome.scripting.executeScript({
//                          files: ['scripts/iframeScript.js'],
//                          target: {tabId: tab.id}
//                      });
//                  }
//              }
//          });
//      } catch (e) {
//          console.log("Fatal error from background.js "+e);
//      }
//  }

 //Save tab id on local storage
 // chrome.tabs.onActivated.addListener(tab => {
 //     chrome.tabs.get(tab.tabId, current_tab_info =>{
 //         chrome.storage.local.set({ "chrome_tab_id": tab.tabId }, function(){
 //             //  Data's been saved boys and girls, go on home
 //         });
 //
 //         localStorage.setItem("chrome_tab_id", tab.tabId);//save to local storage
 //         // console.log("Tab Id: "+tab.tabId);//get tab id
 //         // console.log("Window Id: "+tab.windowId);//get window id
 //         // console.log("Current Tab Url: "+current_tab_info.url);//get current tab url
 //     });
 // });

// chrome.storage.local.get(["chrome_tab_id"], function(items){
//     return items.chrome_tab_id;
// });
//
//  console.log(chrome_tab_id);
//  chrome.storage.sync.set({ "chrome_tab_id": savedId }, function(){
//
//  });
//  chrome.storage.local.get(["chrome_tab_id"], function(items){
//      console.log(items.chrome_tab_id);
//  });


 //Getting a tab Id when user switch tab
 chrome.tabs.onActivated.addListener(tab => {
     chrome.tabs.get(tab.tabId, current_tab_info =>{
         // let savedId = tab.tabId;
         // console.log("tab id: "+ savedId);
         chrome.runtime.onMessage.addListener(function(message, sender, sendResponse) {
             if (message.command == "openIframe") {

                 chrome.scripting.executeScript({
                     files: ['scripts/iframeScript.js'],
                     target: {tabId: tab.tabId}
                 });
                 // var aa = document.getElementById('vsm-ea-iframe').innerHTML;
                 // alert(aa);
                 console.log(message);
                 console.log(sender);
                 sendResponse({res: "Request Received"});
             }
             return true;
         });
     });
 });





