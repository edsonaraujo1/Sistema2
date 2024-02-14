<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript"> 
function IEHoverPseudo() {
 
	var navItems = document.getElementById("primary-nav").getElementsByTagName("li");
	
	for (var i=0; i<navItems.length; i++) {
		if(navItems[i].className == "menuparent") {
			navItems[i].onmouseover=function() { this.className += " over"; }
			navItems[i].onmouseout=function() { this.className = "menuparent"; }
		}
	}
 
}
window.onload = IEHoverPseudo;
</script>
 
<style type="text/css"> 
 
body { font: normal 62.5% verdana; }
 
ul#primary-nav,
ul#primary-nav ul {
	margin: 0;
	padding: 0;
	width: 150px; /* Width of Menu Items */
	border-bottom: 1px solid #ccc;
	background: #fff; /* IE6 Bug */
	font-size: 100%;
	}
 
ul#primary-nav li {
	position: relative;
	list-style: none;
	}
 
ul#primary-nav li a {
	display: block;
	text-decoration: none;
	color: #777;
	padding: 5px;
	border: 1px solid #ccc;
	border-bottom: 0;
	}
 
/* Fix IE. Hide from IE Mac \*/
* html ul#primary-nav li { float: left; height: 1%; }
* html ul#primary-nav li a { height: 1%; }
/* End */
 
ul#primary-nav ul {
	position: absolute;
	display: none;
	left: 149px; /* Set 1px less than menu width */
	top: 0;
	}
 
ul#primary-nav li ul li a { padding: 2px 5px; } /* Sub Menu Styles */
 
ul#primary-nav li:hover ul ul,
ul#primary-nav li:hover ul ul ul,
ul#primary-nav li.over ul ul,
ul#primary-nav li.over ul ul ul { display: none; } /* Hide sub-menus initially */
 
ul#primary-nav li:hover ul,
ul#primary-nav li li:hover ul,
ul#primary-nav li li li:hover ul,
ul#primary-nav li.over ul,
ul#primary-nav li li.over ul,
ul#primary-nav li li li.over ul { display: block; } /* The magic */
 
ul#primary-nav li.menuparent { background: transparent url(arrow.gif) right center no-repeat; }
 
ul#primary-nav li.menuparent:hover,
ul#primary-nav li.over { background-color: #f9f9f9; }
 
ul#primary-nav li a:hover { color: #E2144A; }
 
</style>
</head>
<body>
<ul id="primary-nav">
  <li><a href="#">Home</a></li>
 
  <li class="menuparent"><a href="#">About</a> 
    <ul>
      <li><a href="#">History</a></li>
      <li><a href="#">Team</a></li>
      <li><a href="#">Offices</a></li>
    </ul>
  </li>
 
  <li class="menuparent"><a href="#">Services</a> 
    <ul>
      <li><a href="#">Web Design</a></li>
      <li><a href="#">Internet Marketing</a></li>
      <li class="menuparent"><a href="#">Hosting</a> 
        <ul>
          <li><a href="#">Dedicated</a></li>
 
          <li><a href="#">Virtual</a></li>
          <li><a href="#">Shared</a></li>
          <li><a href="#">Managed</a></li>
        </ul>
      </li>
      <li><a href="#">Domain Names</a></li>
      <li><a href="#">Broadband</a></li>
 
    </ul>
  </li>
  <li class="menuparent"><a href="#">Contact Us</a> 
    <ul>
      <li><a href="#">United Kingdom</a></li>
      <li><a href="#">France</a></li>
      <li><a href="#">USA</a></li>
 
      <li><a href="#">Australia</a></li>
    </ul>
  </li>
</ul>
</body>
</html>