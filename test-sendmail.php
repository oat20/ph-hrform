<?php
ini_set('SMTP', 'mumail.mahidol.ac.th');
ini_set('smtp_port', '25');
ini_set('sendmail_from', 'noreply@'.$_SERVER['HTTP_HOST']);

mail('chakkapan.cha@mahidol.ac.th', 'Test', 'Test');
?>