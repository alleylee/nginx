<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<script type="text/javascript" src="./views/js/common.js"></script>
<style type="text/css">
.style3 {
	color: #FF0000;
	font-weight: bold;
}
</style>
</head>
<body text=#000000 leftMargin=0 topMargin=0>
<br>
<br>
<br>
<br>
<br>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr> 
    <td height="49" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="154" align="center" >
<table width="509" height="286" border="7" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="493" height="272" align="center" valign="top" bgcolor="#FFFFFF"> <img src="./views/images/login_top.gif" height="60" width="493"> 
            <font color=red></font>
<form name="f" method="post" action="./index.php?action=login">
              <table width="68%" height="159" border="0" cellpadding="3" cellspacing="0">
                <tr> 
                  <td width="19%" height="36">用户名</td>
                  <td width="81%"> <input type="text" name="user" id="user" size="20" maxlength="20" style="height:22px;border:1px solid #006699"> 
                  </td>
                </tr>
                <tr> 
                  <td height="38">密&nbsp;码</td>
                  <td> <input type="password" name="pw" id="pw" size="20" maxlength="20" style="height:22px;border:1px solid #006699"> 
                  </td>
                </tr>
                <tr> 
<td width="19%" height="36">验证码</td>
                  <td> <input name="imgcode" id="imgcode" type="text" size="20" maxlength="20" style="height:22px;border:1px solid #006699"> <img src="../include/lib/checkcode.php" align="absmiddle">
                  </td>                </tr>
                <tr> 
                  <td></td>
                  <td valign="top" style="font-family:Arial, Helvetica, sans-serif ">&nbsp;&nbsp;&nbsp; <input name="submit" type="image" style="height:23px;width:70px;" value="登录" src="./views/images/login.gif" width="70" height="23"></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="52" align="center">&nbsp;</td>
  </tr>
</table>
<script>focusEle('user');</script>
</body>
</html>