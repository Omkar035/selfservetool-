//show year
var year = new Date();
var current = year.getFullYear();
document.getElementById("year").innerHTML = current;

// hamberger
const menu = () => {
  document.getElementById("check").checked = false;
}

// video modal
var modal = document.getElementById("video-modal");
var video = `<div class="modal-content">
<span id="close" class="close colorblack user_none" onclick="closeVid()">&times;</span>
<video id="modal-video" class="scale-video" controls autoplay>
    <source src="https://hc-do.sgp1.cdn.digitaloceanspaces.com/selfserve/icons/explainervid.mp4"
        type="video/mp4">
</video>
</div>`;

var btn = document.getElementById("onplay");
const vid = document.getElementById("modal-video");
var span = document.getElementById("close");

const openVid = () => {
  modal.innerHTML += video;
  modal.style.display = "block";
}

const closeVid = () => {
  modal.innerHTML = "";
  modal.style.display = "none";
}

// footer modal
const footermodal = document.getElementById("footer_modal");
const anscale = document.getElementById("ct2");
const onget = document.getElementById("contatctbtn");
const closee = document.getElementsByClassName("close2")[0];
const usname = document.getElementById("usname");
const showname = document.getElementById("namedisplay");
const usemail = document.getElementById("usemail");
const agname = document.getElementById("agname");
const usnum = document.getElementById("usnum");
const err = document.getElementById("err");


const valid = () => {
  if (usname.value == "") {
    usname.style.border = "3px solid red";
    err.innerHTML = "Please input all input fields";
    setTimeout(function () {
      usname.style.border = "3px solid transparent";
      usemail.style.border = "3px solid transparent";
      agname.style.border = "3px solid transparent";
      usnum.style.border = "3px solid transparent";
      err.innerHTML = "";
    }, 2000);
  }
  if (usemail.value == "") {
    usemail.style.border = "3px solid red";
    err.innerText = "Please input all input fields";
    setTimeout(function () {
      usname.style.border = "3px solid transparent";
      usemail.style.border = "3px solid transparent";
      agname.style.border = "3px solid transparent";
      usnum.style.border = "3px solid transparent";
      err.innerHTML = "";
    }, 2000);
  }
  if (agname.value == "") {
    agname.style.border = "3px solid red";
    err.innerText = "Please input all input fields";
    setTimeout(function () {
      usname.style.border = "3px solid transparent";
      usemail.style.border = "3px solid transparent";
      agname.style.border = "3px solid transparent";
      usnum.style.border = "3px solid transparent";
      err.innerHTML = "";
    }, 2000);
  }
  if (usnum.value == "") {
    usnum.style.border = "3px solid red";
    err.innerText = "Please input all input fields";
    setTimeout(function () {
      usname.style.border = "3px solid transparent";
      usemail.style.border = "3px solid transparent";
      agname.style.border = "3px solid transparent";
      usnum.style.border = "3px solid transparent";
      err.innerHTML = "";
    }, 2000);
  }
//   if (usname.value !== "" && agname.value !== "" && usemail.value !== "" && usnum.value !== "" && usnum.value.length === 10 && usnum.value !== "0000000000" && usnum.value !== "1111111111" && usnum.value !== "2222222222" && usnum.value !== "3333333333" && usnum.value !== "4444444444" && usnum.value !== "5555555555" && usnum.value !== "6666666666" && usnum.value !== "7777777777" && usnum.value !== "8888888888" && usnum.value !== "9999999999") {
//     anscale.classList.add("scalemore");
//     showname.innerHTML = usname.value;
//     setTimeout(function () {
//       footermodal.style.display = "none";
//     }, 5000);
//   } else {
//     footermodal.style.display = "none";
//   }
}


window.onclick = function (event) {
  if (event.target == modal) {
    modal.innerHTML = "";
    modal.style.display = "none";
  }
}


// Show laptop
const laptop = document.getElementById("laptop");
const fullLaptop = `<div class="fullshow" style="position:relative;">
<img class="fulllapitopi" style="position:absolute;top:0;z-index:-1;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop.webp">
<img class="fulllapitopi1" style="position:absolute;top:0;z-index:1;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop1.webp">
<img class="fulllapitopi2" style="position:absolute;top:0;z-index:2;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop2.webp">
<img class="fulllapitopi3" style="position:absolute;top:0;z-index:3;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop3.webp">
<img class="fulllapitopi4" style="position:absolute;top:0;z-index:4;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop4.webp">
<img class="fulllapitopi5" style="position:absolute;top:0;z-index:4;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop5.webp">
<img class="fulllapitopi6" style="position:absolute;top:0;z-index:4;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop6.webp">
<img class="fulllapitopi6" style="top: 0;z-index:4;"
    src="https://s.hcurvecdn.com/selfserve/icons/fulllapitop7.webp">
</div>`;
const halfLaptop = `<div class="halfshow" style="position:relative;">
<img class="halflapitopi" style="position:absolute;top:0;z-index:-1;"
    src="https://s.hcurvecdn.com/selfserve/icons/halftapitop.webp">
<img class="halflapitopi1" style="position:absolute;top:0;z-index:1;"
    src="https://s.hcurvecdn.com/selfserve/icons/halftapitop1.webp">
<img class="halflapitopi2" style="position:absolute;top:0;z-index:2;"
    src="https://s.hcurvecdn.com/selfserve/icons/halftapitop2.webp">
<img class="halflapitopi3" style="position:absolute;top:0;z-index:3;"
    src="https://s.hcurvecdn.com/selfserve/icons/halftapitop3.webp">
<img class="halflapitopi4" style="position:absolute;top:0;z-index:4;"
    src="https://s.hcurvecdn.com/selfserve/icons/halftapitop4.webp">
<img class="halflapitopi5" style="position:absolute;top:0;z-index:4;"
    src="https://s.hcurvecdn.com/selfserve/icons/halftapitop5.webp">
<img class="halflapitopi6" style="top:0;z-index:4;"
    src="https://s.hcurvecdn.com/selfserve/icons/halftapitop6.webp">
</div>`;

const showLaptop = (x) => {
  if (x.matches) {
    laptop.innerHTML += fullLaptop;
    console.log("laptop");
  } else {
    laptop.innerHTML = halfLaptop;
  }
}

const x = window.matchMedia("(max-width: 750px)");
showLaptop(x);
x.addListener(showLaptop);


//swiper first
var swiper = new Swiper(".swiper-container", {
  slidesPerView: 1,
  initialSlide: 0,
  spaceBetween: 10,
  loop: true,
  breakpoints: {
    350: {
      slidesPerView: 1,
      spaceBetween: 50
    },
    480: {
      slidesPerView: 1,
      spaceBetween: 20
    },
    580: {
      slidesPerView: 2,
      spaceBetween: 40
    },
    646: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    900: {
      slidesPerView: 2,
      spaceBetween: 5
      // width: 1000,
    },
    1000: {
      slidesPerView: 3,
      spaceBetween: 20
      // width: 1000,
    },
    2000: {
      slidesPerView: 3,
      spaceBetween: 20
    }
  },
  // Optional parameters
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  navigation: {
    nextEl: ".swiper-left-btn",
    prevEl: ".swiper-right-btn"
  },
  autoplay: {
    delay: 3000,
    disableOnInteraction: true,
    reverseDirection: false
  }
});


// count ++
var a = 0;
$(window).scroll(function () {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function () {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
        countNum: countTo
      },

        {

          duration: 2000,
          easing: 'swing',
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }
  var opc = $('#banner').offset().top - window.innerHeight;
  if ($(window).scrollTop() > opc) {
    console.log("hello");
  }


});



//carousel last

//carousel last
var swiper = new Swiper(".marbales", {
    slidesPerView: 1,
    spaceBetween: 10,
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    loop: false,
    height: 500,
    coverflowEffect: {
        rotate: 0,
        stretch: 90,
        depth: 200,
        modifier: 1.4,
        slideShadows: false
    },
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 30
        },
        350: {
            slidesPerView: 1,
            spaceBetween: 0
        },
        480: {
            slidesPerView: 2,
            spaceBetween: 0
        },
        580: {
            slidesPerView: 2,
            spaceBetween: 0
        },
        646: {
            slidesPerView: 2,
            spaceBetween: 30
        },
        900: {
            slidesPerView: 2,
            spaceBetween: 5
            // width: 1000,
        },
        1000: {
            slidesPerView: 3,
            spaceBetween: 20
            // width: 1000,
        },
        2000: {
            slidesPerView: 3,
            spaceBetween: 20
        }
    },
    // Optional parameters
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    },
    navigation: {
        nextEl: ".swiper-left-btn",
        prevEl: ".swiper-right-btn"
    },
    autoplay: {
        delay: 6000,
        disableOnInteraction: true,
        reverseDirection: false
    }
});

// animations
function vidBounce() {
  var tll = new TimelineMax({ repeat: 0, repeatDelay: 0, delay: 0 });
  tll.fromTo("#vidcontent", 0.5, { x: 300, scale: 0, ease: Power0.easePower0 }, { x: 0, scale: 1, ease: Power0.easePower0 });
  tll.to("#vidcontent", 0.2, { x: 100, scale: 0.65, ease: Power0.easePower0 });
  tll.to("#vidcontent", 0.3, { x: 0, scale: 1, ease: Power0.easePower0 });
} vidBounce();


gsap.from(".icon1,.icon3", {
  scale: 0,
  repeat: -1,
  repeatDelay: 1,
  duration: 0.8,
  ease: "bounce"
});






// WHY DCO

function DCO_cunt() {
  var gsap = new TimelineMax({
    repeat: -1,
    repeatDelay: 2.5,
    delay: 0.8
  });

  gsap.from(".mobsty", 0.8, {
    y: 230,
    x: 55,
    scale: 0,
    opacity: 1,
    ease: Power1.easeOut
  });
  gsap.from(".inmobpaper", 0.8, {
    scale: 0.8,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".dashsty1,.databt1", 0.8, {
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".dashsty2,.databt2", 0.8, {
    opacity: 0,
    ease: Power1.easeOut
  });
} DCO_cunt();

// Main Section Gsap

function MainTropMone() {
  var gsap = new TimelineMax({
    repeat: -1,
    repeatDelay: 2.5,
    delay: 0.8
  });
  gsap.from(".f1data", 0.8, {
    y: 25,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".f2data", 0.8, {
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".f3data", 0.8, {
    y: -100,
    opacity: 0,
    ease: "bounce.out"
  });
  gsap.from(".f5data", 0.5, {
    y: 100,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".f6data", 0.5, {
    y: 100,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.to(".f5data", 0.5, {
    y: -100,
    x: -200,
    opacity: 1,
    ease: Power1.easeOut
  });
  gsap.from(".f7data", 0.5, {
    y: 100,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".f4data", 0.5, {
    y: 100,
    opacity: 0,
    ease: Power1.easeOut
  });
}
MainTropMone();


// Creative 1

function creativeoneCRE() {
  var gsap = new TimelineMax({
    repeat: -1,
    repeatDelay: 2.5,
    delay: 0.8
  });
  gsap.from(".mainnewLAP3", 0.6, {
    x: 100,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".mainnewLAP4", 0.6, {
    y: -100,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".mainnewLAP5", 0.6, {
    scale: 0,
    transformOrigin: "120px 260px",
    opacity: 0,
    ease: Power1.easeOut
  });
  var gsap2 = new TimelineMax({
    repeat: -1,
    repeatDelay: 0.1
  });
  gsap2.to(".mainnewLAP2", 0.3, {
    x: 10,
    opacity: 1,
    ease: Power1.easeOut
  });
  gsap2.to(".mainnewLAP2", 0.3, {
    x: -10,
    opacity: 1,
    ease: Power1.easeOut
  });
}
creativeoneCRE();


// Creative 2


function creativetwoCRE() {
  var gsap = new TimelineMax({
    repeat: -1,
    repeatDelay: 2.5,
    delay: 0.8
  });
  gsap.from(".ast1", 0.8, {
    x: -100,
    opacity: 0,
    transformOrigin: "440px 45px",
    ease: Power1.easeOut
  });
  gsap.from(".ast2", 0.6, {
    scale: 0,
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".ast3", 0.6, {
    y: -100,
    opacity: 0,
    ease: Power1.easeOut
  });

  var tl = new TimelineMax({
    repeat: -1,
    repeatDelay: 2.5,
    delay: 0.8
  });
  tl.fromTo(".ast5", 0.8, {
    x: 0,
    opacity: 1,
    ease: Power1.easeOut
  }, {
    x: 250,
    opacity: 1,
    ease: Power1.easeOut
  });
  tl.to(".ast5", 0.8, {
    x: 0,
    opacity: 1,
    ease: Power1.easeOut
  });
}
creativetwoCRE();

// Creative 3

function creativeThreeCRE() {
  var gsap = new TimelineMax({ repeat: -1, repeatDelay: 2.5, delay: 0.8 });
  gsap.from(".analyticGRIL2", 0.8, { y: -300, opacity: 0, ease: "bounce.out" });
  gsap.from(".analyticGRIL3", 0.8, { x: 100, opacity: 0, ease: Power1.easeOut });
  gsap.from(".analyticGRIL4", 0.8, { opacity: 0, ease: Power1.easeOut });
} creativeThreeCRE();



// Half Laptop

function NRconHalfLap() {
  var gsap = new TimelineMax({ repeat: -1, repeatDelay: 2.5, delay: 0.8 });
  gsap.from(".halflapitopi1", 0.8, { opacity: 0, ease: Power1.easeOut }, "+=0.3");
  gsap.from(".halflapitopi3", 0.8, { opacity: 0, ease: Power1.easeOut }, "-=0.5");
  gsap.from(".halflapitopi2", 0.8, { opacity: 0, ease: Power1.easeOut });
  gsap.from(".halflapitopi4", 0.8, { opacity: 0, ease: Power1.easeOut });
  gsap.from(".halflapitopi5", 0.8, { opacity: 0, ease: Power1.easeOut });
  gsap.from(".halflapitopi6", 0.8, { opacity: 0, ease: Power1.easeOut });
  gsap.from(".halflapitopi7", 0.8, { opacity: 0, ease: Power1.easeOut });
} NRconHalfLap();

// Full Laptop


function NRconFullLap() {
  var gsap = new TimelineMax({
    repeat: -1,
    repeatDelay: 2.5,
    delay: 0.8
  });
  gsap.from(".fulllapitopi1", 0.5, {
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".fulllapitopi4", 0.5, {
    opacity: 0,
    ease: Power1.easeOut
  }, "-=0.2");
  gsap.from(".fulllapitopi3", 0.5, {
    opacity: 0,
    ease: Power1.easeOut
  }, "+=0.2");
  gsap.from(".fulllapitopi2", 0.5, {
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".fulllapitopi5", 0.5, {
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".fulllapitopi6", 0.5, {
    opacity: 0,
    ease: Power1.easeOut
  });
  gsap.from(".fulllapitopi7", 0.5, {
    opacity: 0,
    ease: Power1.easeOut
  });
} NRconFullLap();
