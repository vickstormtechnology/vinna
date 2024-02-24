
    /*****SELECT ELEMENT*****/
    // // let bet9jaElement = document.querySelector('.sr-cell  > #marketoffer');//div to append the iframe
    // let bet9jaElement = document.querySelector('.project > .app > .wrapper > main > .container > .main-wrapper');//div to append the iframe
    // // let bet9jaElement = document.querySelector('.project > .app > .wrapper > main > .container > .main-wrapper > iframe');//div to append the iframe
    // let sportyBetElement = document.querySelector('.content');//div to append the iframe


    // // const hostEle = document.createElement('div');
    // // hostEle.className = 'rustyZone-element-host';
    // // // hostEle.style.margin = '0px 0px -340px 0px';
    // // hostEle.innerHTML = '';
    // // // bet9jaElement.appendChild(hostEle);
    // // bet9jaElement.insertBefore(hostEle, bet9jaElement.children[0]);
    //
    // //Using Shadow Root
    // // let host = document.querySelector('.rustyZone-element-host');
    // // let root = host.attachShadow({mode: 'open'}); // Create a Shadow Root
    // let div = document.createElement('iframe');
    // div.className = 'div root-class vinnaIframe';
    // div.src = 'http://localhost/vinna/controller/init-bot.php';
    // div.height="350";
    // div.width="100%";
    // bet9jaElement.insertBefore(div, bet9jaElement.children[0]);
    // // host.appendChild(div);









    /*****Append using shadow element*****/
    let bet9jaElement = document.querySelector('.project > .app > .wrapper > main > .container > .main-wrapper');//div to append the iframe
    // let bet9jaElement = document.querySelector('.project > .app > .wrapper > main > .container > .main-wrapper > iframe');//div to append the iframe
    let sportyBetElement = document.querySelector('.content');//div to append the iframe


    // const hostEle = document.createElement('div');
    // hostEle.className = 'rustyZone-element-host';
    // // hostEle.setAttribute("id", "rustyZone-element-host");
    // // hostEle.style.margin = '0px 0px -340px 0px';
    // hostEle.innerHTML = '';
    // // bet9jaElement.appendChild(hostEle);
    // bet9jaElement.insertBefore(hostEle, bet9jaElement.children[0]);

    //Using Shadow Root
    // let host = document.querySelector('.rustyZone-element-host');
    // let root = host.attachShadow({mode: 'open'}); // Create a Shadow Root
    let div = document.createElement('iframe');
    div.className = 'div root-class vinnaIframe';
    div.src = 'http://localhost/vinna/controller/init-bot.php';
    div.height="350";
    div.width="100%";
    // root.appendChild(div);
    bet9jaElement.insertBefore(div, bet9jaElement.children[0]);
