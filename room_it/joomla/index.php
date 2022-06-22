<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/room_it/css/style.css" type="text/css" />
</head>

<body>
<div id="warp">
	
    <div id="top">
    	<img src="<?php echo $this->baseurl ?>/templates/room_it/images/logo.png" border="0">
        <div class="module">
       	  <jdoc:include type="modules" name="user1" style="none" />
        </div>
        <div style="clear:both">
    </div>
  </div>

	<div style="clear:both">
    </div>

	<div id="left">
    	<img src="<?php echo $this->baseurl ?>/templates/room_it/images/life.png" border="0">
        <div class="menu">
          <jdoc:include type="modules" name="left" style="xhtml" />
		</div>
  	</div>

	<div id="right">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><img src="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_01.png" width="27" height="26"></td>
        <td background="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_02.png"></td>
        <td width="26"><img src="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_03.png" width="26" height="26"></td>
      </tr>
      <tr>
        <td background="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_05.png"></td>
        <td bgcolor="#FFFFFF"><jdoc:include type="component" /></td>
        <td background="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_07.png"></td>
      </tr>
      <tr>
        <td><img src="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_08.png" width="27" height="23"></td>
        <td background="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_09.png"></td>
        <td><img src="<?php echo $this->baseurl ?>/templates/room_it/images/tb/images/1_10.png" width="26" height="23"></td>
      </tr>
    </table>
    </div>
	
    <div id="footer">
   	  <jdoc:include type="modules" name="debug" style="none" />
    </div>
    
    <div class="style2">
    	Revised: Copyright @ 2008, คณะสาธารณสุขศาสตร์, มหาวิทยาลัยมหิดล, Webmaster.<br/>
420/1 ถนนราชวิถี เขตราชเทวี กรุงเทพฯ 10400.โทร 0-2354-8543 
    </div>
    
</div>
</body>
</html>
