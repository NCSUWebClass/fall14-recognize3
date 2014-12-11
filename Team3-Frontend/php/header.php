<?php
/* PHP header for every Better Recognize page, includes vars for page titles
* This page does not acutally provide markup, that is done in /html/header.html
*/

/* Returns "active" when the active page title matches a title.
* Mainly used for automating which page gets highlighted on the navbar.
*
* @param title String of constant page title
* @param active_title String of the active page title
* @return String "active" if both parameters equal, "" otherwise
*/
session_start();

function getActivePage($title, $active_title){
  if($title === $active_title){
    return "\"active\"";
  } else {
    return "\"\"";
  }
}
?>
