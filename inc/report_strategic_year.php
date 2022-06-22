<?php
$sql="SELECT budget_year
FROM project
GROUP BY budget_year
ORDER BY budget_year DESC";
$rs=mysql_query($sql);
while($ob=mysql_fetch_array($rs)){
	print "<a href=".$_SERVER[PHP_SELF]."?y=".$ob[budget_year].">".$ob[budget_year]."</a>&nbsp;";
}
?>