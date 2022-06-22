<? session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<link href="tool/css_text.css" rel="stylesheet" type="text/css">
<body bgcolor="#5c7094" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
</head>
<!-- <script language="JavaScript" type="text/javascript" src="wysiwyg.js">
 -->
<body>
<?
if  ($key1==1009 )
{
//header("location:form_insertnewsimg.php");
include"form_insertnewsimgweek.php";
}

elseif  ($key1==1003 )
{
//header("location:form_insertnewsimg.php");
include"form_insertnewsimg.php";
}

else
{
//header("location:default,insertnews.php");

include"form_insertnews.php";
//include"test.php";

}
?>

</body>
</html>
