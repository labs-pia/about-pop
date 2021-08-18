const siteNavigation = document.getElementById( 'site-navigation' );
const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];
const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];
var schalter = false;

button.onclick = function () {
	if (schalter == false) {
		open();
		schalter = true;
	} else if (schalter == true) {
		close();
    }
};


function open() {
  siteNavigation.animate({
    "height":"100vh"
  }, 300);
  setTimeout("siteNavigation.style.height = '100vh';", 280);
	
  menu.animate({
    "display":"flex"
  }, 300);
  setTimeout("menu.style.display = 'flex';", 150);
  menu.style.width = "100vw";
  menu.style.margin = "25vh auto";
  menu.style.height = "50vh";
  menu.style.flexDirection = "column";
  menu.style.justifyContent = "space-between";

  schalter = true;
}

function close() {
  siteNavigation.animate({
    "height":"100px"
  }, 300);
  setTimeout("siteNavigation.style.height = '100px';", 280);
	
  menu.animate({
    "display":"none"
  }, 300);
  setTimeout("menu.style.display = 'none';", 100);

  schalter = false;
}


/* scroller */
var about = document.getElementById('menu-item-30');
var pop = document.getElementById('menu-item-31');
var konf = document.getElementById('menu-item-32');

//Back to top
jQuery(function($) {
  $('#menu-item-32').click(function(){
    alert("click....");
    return false;
  });
});


/*
about.onclick = function () {
	location.href = "http://popbuero.project2010.org/#about";
	about.scrollIntoView({behavior: "smooth"});
}

pop.onclick = function () {
  location.href = "http://popbuero.project2010.org/#pop";
  pop.scrollIntoView({behavior: "smooth"});
}

konf.onclick = function () {
  location.href = "http://popbuero.project2010.org/#konferenz";
  konf.scrollIntoView({behavior: "smooth"});
}
*/