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
  siteNavigation.classList.remove='closeanimation';
  siteNavigation.classList.add='openanimation';
  setTimeout("siteNavigation.style.height = '100vh';", 280);
  menu.style.display = 'flex';
  setTimeout("menu.style.height = '100vh';", 150);
  setTimeout("menu.style.display = 'flex';", 150);
  menu.style.width = "100vw";
  menu.style.margin = "auto";
  menu.style.padding = "0";
  menu.style.height = "70vh";
  menu.style.flexDirection = "column";

  schalter = true;
};

function close() {
  siteNavigation.classList.remove='openanimation';
  siteNavigation.classList.add='closeanimation';
  setTimeout("siteNavigation.style.height = '100px';", 280);
  setTimeout("menu.style.display = 'none';", 100);
  schalter = false;
};


// Smooth scoller
// by clicking on a menu item, the function handles the href attribute and scrolls to it
//

$('#primary-menu a ').click(function() {
  var p = $(this).attr('href');
  p = p.replace("/", "");
  
  $('html, body').animate({
    scrollTop : $(p).position().top
  },1000);
  if (schalter == true) {
    close();
  }
});




