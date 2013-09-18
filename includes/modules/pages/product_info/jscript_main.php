<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: jscript_main.php 5444 2006-12-29 06:45:56Z drbyte $
//
?>
<script language="javascript" type="text/javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=100,height=100,screenX=150,screenY=150,top=150,left=150')
}
function popupWindowPrice(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=600,height=400,screenX=150,screenY=150,top=150,left=150')
}
//--></script>
<script>

    var numTabs = <?php echo count($tabs); ?>;

    function changeTab(tab)
    {
      for( i = 0; i < numTabs; i++)
        {
                document.getElementById('tab_' + i).style.display = 'none';
                document.getElementById('tab_top_' + i).style.backgroundColor = '#EEE';
                document.getElementById('tab_top_' + i).style.borderBottomWidth = '1px';
                document.getElementById('tab_top_' + i).style.borderBottomColor = '#E2E2E2';
        }
      document.getElementById('tab_' + tab).style.display = 'inline';
      document.getElementById('tab_top_' + tab).style.borderBottomWidth = '1px';
      document.getElementById('tab_top_' + tab).style.borderBottomColor = '#FFFFFF';
      document.getElementById('tab_top_' + tab).style.backgroundColor = '#FFFFFF';
    }

</script>
