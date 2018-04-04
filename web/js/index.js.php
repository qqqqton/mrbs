<?php
namespace MRBS;

require '../defaultincludes.inc';

http_headers(array("Content-type: application/x-javascript"),
             60*30);  // 30 minute expiry

if ($use_strict)
{
  echo "'use strict';\n";
}


// Only show the bottom nav bar if no part of the top one is visible.
?>
var checkNav = function() {
    if ($('nav.main_calendar').eq(0).visible(true))
    {
      $('nav.main_calendar').eq(1).hide();
    }
    else
    {
      $('nav.main_calendar').eq(1).show();
    }
  };

<?php
// =================================================================================

// Extend the init() function 
?>

var oldInitIndex = init;
init = function(args) {
  
  oldInitIndex.apply(this, [args]);
  
  checkNav();
  $(window).scroll(checkNav);
  $(window).resize(checkNav);
  
};
