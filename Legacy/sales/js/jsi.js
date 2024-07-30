$(document).ready(function(){

/* interface */

$(function() {
  $('.header').wrapInner('<div class="header_res"></div>');
  $('.content').wrapInner('<div class="content_res"></div>');
  $('.footer').wrapInner('<div class="footer_res"></div>');

  $('.jsi_gv').children('.gadget_border').children('h3').wrap('<div class="gadget_title vertsortable_head"></div>');
  $('.jsi_gv').children('.gadget_border').children('.gadget_title').children('h3').before('<a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" width="24" height="66" /></a>');
  $('.jsi_gh').children('.gadget_border').children('h3').wrap('<div class="gadget_title horizsortable_head"></div>');
  $('.jsi_gh').children('.gadget_border').children('.gadget_title').children('h3').before('<a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" width="24" height="66" /></a>');
  $('.jsi_gd').children('.gadget_border').children('h3').wrap('<div class="gadget_title horizsortable_head"></div>');

  $('.bg_grey').wrapInner('<span></span>');
  $('.jsi_msg_yellow').children('p').prepend('<img src="images/icon_msg_yellow.gif" width="14" height="14" class="pix" />');
  $('.jsi_msg_red').children('p').prepend('<img src="images/icon_msg_red.gif" width="14" height="14" class="pix" />');
  $('.mail_msg').before('<img src="images/icon_mail.gif" width="16" height="12" alt="mail" class="iconmail" />')
  $('.logout').before('<img src="images/pimpa_off.gif" width="16" height="16" alt="off" class="iconlogoff" />');
  $('.butright').wrapInner('<span></span>');
  $('.myacc').before('<a href="#"><img src="images/icon_myaccount.gif" width="16" height="16" alt="off" class="iconlogoff" /></a>');
  $('.mylo').before('<a href="#"><img src="images/icon_logout.gif" width="16" height="16" alt="off" class="iconlogoff" /></a>');
  
  });

});
