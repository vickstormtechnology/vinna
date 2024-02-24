
window.rgsplus.initialize(null, err => {
    if (err && Array.isArray(err)) {
        err.forEach(err => {
            console.error(err);
        });
    } else {
        console.error(err);
    }

    if (document.getElementsByTagName('gaming-vgpc-composition')){
        document.getElementsByTagName('html')[0].classList.add('h-100')
    }
});


