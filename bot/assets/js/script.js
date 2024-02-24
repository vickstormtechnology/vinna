/*========================
 Manifest js
 ==========================*/
window.onload = () => {
  "use strict";
  if ("serviceWorker" in navigator) {
    navigator.serviceWorker.register("sw.js");
  }
};

/*=====================
    wishlist added start
==========================*/
const divs = document.querySelectorAll(".like-btn");
divs.forEach((el) =>
  el.addEventListener("click", (event) => {
    event.target.parentNode.classList.toggle("animate");
    event.target.parentNode.classList.toggle("active");
    event.target.parentNode.classList.toggle("inactive");
  })
);

/*====================
 Ratio js
=======================*/
window.addEventListener("load", () => {
  const bgImg = document.querySelectorAll(".bg-img");
  for (i = 0; i < bgImg.length; i++) {
    let bgImgEl = bgImg[i];

    if (bgImgEl.classList.contains("bg-top")) {
      bgImgEl.parentNode.classList.add("b-top");
    } else if (bgImgEl.classList.contains("bg-bottom")) {
      bgImgEl.parentNode.classList.add("b-bottom");
    } else if (bgImgEl.classList.contains("bg-center")) {
      bgImgEl.parentNode.classList.add("b-center");
    } else if (bgImgEl.classList.contains("bg-left")) {
      bgImgEl.parentNode.classList.add("b-left");
    } else if (bgImgEl.classList.contains("bg-right")) {
      bgImgEl.parentNode.classList.add("b-right");
    }

    if (bgImgEl.classList.contains("blur-up")) {
      bgImgEl.parentNode.classList.add("blur-up", "lazyload");
    }

    if (bgImgEl.classList.contains("bg_size_content")) {
      bgImgEl.parentNode.classList.add("b_size_content");
    }

    bgImgEl.parentNode.classList.add("bg-size");
    const bgSrc = bgImgEl.src;
    bgImgEl.style.display = "none";
    bgImgEl.parentNode.setAttribute(
      "style",
      `
      background-image: url(${bgSrc});
      background-size:cover;
      background-position: center;
      background-repeat: no-repeat;
      display: block;
      `
    );
  }
});

/*====================
 Range js
=======================*/
const rangeInputs = document.querySelectorAll('input[type="range"]');
const numberInput = document.querySelector('input[type="number"]');

function handleInputChange(e) {
  let target = e.target;
  if (e.target.type !== "range") {
    target = document.getElementById("range");
  }
  const min = target.min;
  const max = target.max;
  const val = target.value;

  target.style.backgroundSize = ((val - min) * 100) / (max - min) + "%100%";
}

rangeInputs.forEach((input) => {
  input.addEventListener("input", handleInputChange);
});

/*====================
 Plus Minus Quantity Item js
=======================*/
const plusMinus = document.querySelectorAll(".plus-minus ");

for (var i = 0; i < plusMinus.length; ++i) {
  const addButton = plusMinus[i].querySelector(".add");
  const subButton = plusMinus[i].querySelector(".sub");
  addButton?.addEventListener("click", function () {
    const inputEl = this.parentNode.querySelector("input[type='number']");
    if (inputEl.value < 10) {
      inputEl.value = Number(inputEl.value) + 1;
    }
  });
  subButton?.addEventListener("click", function () {
    const inputEl = this.parentNode.querySelector("input[type='number']");
    if (inputEl.value >= 1) {
      inputEl.value = Number(inputEl.value) - 1;
    }
  });
}

/*======================
 delate Quantity Item js
=======================*/
const cartBox = document.querySelectorAll(".cart-product-box");
cartBox?.forEach((el) => {
  const deleteButton = el.querySelector(".trash");
  deleteButton.addEventListener("click", function () {
    this.closest(".cart-product-box").style.display = "none";
  });
});

/*====================
  RTL js
======================*/
const dirSwitch = document.querySelector("#dir-switch");
const htmlDom = document.querySelector("html");
const rtlLink = document.querySelector("#rtl-link");
const initialCheck = localStorage.getItem("dir");
if (dirSwitch) {
  if (initialCheck === "rtl") dirSwitch.checked = true;
}
dirSwitch?.addEventListener("change", (e) => {
  const checkbox = e.target;
  console.log(checkbox.checked);
  if (checkbox.checked) {
    htmlDom.setAttribute("dir", "rtl");
    rtlLink.href = "assets/css/vendors/bootstrap.rtl.min.css";
    localStorage.setItem("rtlcss", "assets/css/vendors/bootstrap.rtl.min.css");
    localStorage.setItem("dir", "rtl");
  }

  if (!checkbox.checked) {
    htmlDom.setAttribute("dir", "ltr");
    rtlLink.href = "assets/css/vendors/bootstrap.min.css";
    localStorage.setItem("rtlcss", "assets/css/vendors/bootstrap.min.css");
    localStorage.setItem("dir", "ltr");
  }
});
// Rtl
htmlDom.setAttribute("dir", localStorage.getItem("dir") ? localStorage.getItem("dir") : "ltr");
rtlLink.href = localStorage.getItem("rtlcss") ? localStorage.getItem("rtlcss") : "assets/css/vendors/bootstrap.min.css";

/*====================
  Dark js
======================*/
const darkSwitch = document.querySelector("#dark-switch");
const bodyDom = document.querySelector("body");
const initialDarkCheck = localStorage.getItem("layout_version");
bodyDom.classList.add("dark");
localStorage.setItem("layout_version", "dark");


if (darkSwitch) {
  if (initialDarkCheck === "dark") darkSwitch.checked = true;
}
darkSwitch?.addEventListener("change", (e) => {
  const checkbox = e.target;
  if (checkbox.checked) {
    bodyDom.classList.add("dark");
    localStorage.setItem("layout_version", "dark");
  }

  if (!checkbox.checked) {
    bodyDom.classList.remove("dark");
    localStorage.removeItem("layout_version");
  }
});

if (localStorage.getItem("layout_version") == "dark") {
  bodyDom.classList.add("dark");
}
