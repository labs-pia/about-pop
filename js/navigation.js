const siteNavigation = document.getElementById( 'site-navigation' );
const button = document.getElementById( 'burger' );
const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];
var schalter = false;

button.onclick = function () {
  if (schalter == false) {
    open();
  } else if (schalter == true) {
    close();
    }
};

function open() {
  siteNavigation.classList.remove('closeanimation');
  siteNavigation.classList.add('openanimation');
  setTimeout("siteNavigation.style.height = '100vh';", 280);
  menu.style.display = 'flex';
  setTimeout("menu.style.height = '100vh';", 280);
  menu.style.width = "100vw";
  menu.style.margin = "0";
  menu.style.padding = "70px 0 0 0";
  menu.style.flexDirection = "column";
  schalter = true;
};

function close() {
  siteNavigation.classList.remove('openanimation');
  siteNavigation.classList.add('closeanimation');
  setTimeout("siteNavigation.style.height = '100px';", 280);
  let mql = window.matchMedia('(max-width: 768px)');
  console.log(mql);
    if (mql.matches) { // If media query matches
      setTimeout("siteNavigation.style.height = '70px';", 280);
    } else {
      setTimeout("siteNavigation.style.height = '100px';", 280);
    };
  setTimeout("menu.style.display = 'none';", 100);
  schalter = false;
};

// Smooth scoller
// by clicking on a menu item, the function handles the href attribute and scrolls to it
//

$('#primary-menu a ').click(function() {
  var p = $(this).attr('href');
     p = p.replace("/", "");
  // p = p.split("/").slice(-1);
  console.log(p);
  
  $('html, body').animate({
    scrollTop : $(p).position().top
  },1000);
  if (schalter == true) {
    close();
  }
});




