<?php   session_start();
	
	 if(!isset($_SESSION['username']))
	 {
	    ?>

<html>
<head><title>
	Sign Up
</title>
<link href="css/links.css" rel="stylesheet" />
<link href="css/header.css" rel="stylesheet" />
<script src="js/lightbox-form.js"></script>
<link href="css/lightbox-form.css" rel="stylesheet" />
<style type="text/css">
#box-style {
font-size:20px;
font-family:"Times New Roman", Times, Serif;
border-radius:30px;
-moz-border-radius:30px;
}
.classname{-moz-box-shadow: 22px  15px  16px  #000000;-webkit-box-shadow: 22px  15px  5px  #000000;box-shadow: 22px  15px  16px  #000000;}
h3 {
     text-shadow: 0 0 10px #fff,
                   0 0 20px #fff,
                   0 0 30px #fff,
                   0 0 40px blue,
                   0 0 70px blue,
                   0 0 80px blue,
                   0 0 100px blue,
                   0 0 150px blue;
}
.wt
{
color:lightgrey;
font-family:arial;

}

    
        
        #maincontainer { width:900px;left:-150px;position:absolute; }

        #innerpadding { padding-left:61px; }

        #toppad { width:100%; height:10px; }

        
        .borderleft { border-left:solid 1px #ffffff; }
        .borderright { border-right:solid 1px #ffffff; }

        .leftspace { padding-left:7px; }
        .rightspace { padding-right:7px; }
.formfield { width:100px; border:solid 1px #ffffff; background-color:"WHITE"; color:"black";font-size:20px;
font-family:"Times New Roman", Times, Serif;
border-radius:3px;
-moz-border-radius:3px; }

        .formfields { width:250px; border:solid 1px #ffffff; background-color:"WHITE"; color:"black";font-size:20px;
font-family:"Times New Roman", Times, Serif;
border-radius:3px;
-moz-border-radius:3px; }
        .formspacer { width:100%; height:15px; }
        
        
        
    </style>
  
    <script type="text/javascript">

function reloadCAPTCHA1() {

	   

	            document.getElementById('CAPTCHA').src='CaptchaSecurityImages.php?width=100&height=40&characters=5';

	   

	} 

function pwd11()
{

var p=document.forms["form"]["pwd1"].value;

if((p.length)<8)
document.getElementById("pw").innerHTML="<font color=red>Minimum length should be eight</font>";
else
document.getElementById("pw").innerHTML="";

}
function pwd22()
{
var p1=document.forms["form"]["pwd1"].value;
var p2=document.forms["form"]["pwd2"].value;

if(p1!=p2)
document.getElementById("ppwd").innerHTML="<font color=red>Both Passwords dont match</font>";
else
document.getElementById("ppwd").innerHTML="<font color=green>Both Passwords match</font>";
}

function validateform()
{var k=0;
var a=document.forms["form"]["firstname"].value;
var b=document.forms["form"]["lastname"].value;
if (a==null || a=="" || a=="firstname")
   {
   alert("First name must be filled!");
  k=1;
return false;
   }
if (b==null || b=="" || b=="lastname")
  {
   alert("last name must be filled!");

  k=1;
return false;
  }
var c=document.forms["form"]["accname"].value;
if (c==null || c=="" || c=="accname")
   {
   alert("username must be filled!");
  k=1;
return false;
   }


var u=document.getElementById("tt1").textContent;

if(u=="username not available")
{alert("Username not available!");
k=1;
return false;
}


if(document.forms["form"]["pwd1"].value=="" || document.forms["form"]["pwd1"].value==null)
{alert("Passwords must be filled!");
k=1;
return false;
}

if(document.forms["form"]["pwd1"].value!=document.forms["form"]["pwd2"].value)
{alert("Both passwords dont match!");
k=1;
return false;
}

var minlength = 8;
if(document.forms["form"]["pwd1"].value<minlength)
{alert("Minimum length should be 8!");
k=1;
return false;
}

if(!document.getElementById("ckd").checked)
{alert("you must agree to terms and conditions!");
k=1;
return false;
}



if(k==0)
 return true;
}




function c2()
{
var k=document.forms["form"]["firstname"].value;
if(k=="" || k==null)
document.getElementById("txtHint").innerHTML="<font color=red>first name not entered</font>";
else
document.getElementById("txtHint").innerHTML="";
}

function c3()
{
var k=document.forms["form"]["lastname"].value;
if(k=="" || k==null)
document.getElementById("tt").innerHTML="<font color=red>last name not entered</font>";
else
document.getElementById("tt").innerHTML="";
}



function c5()
{
var k=document.forms["form"]["accname"].value;
if(k=="" || k==null)
document.getElementById("tt1").innerHTML="<font color=red>username not entered</font>";
else
{
var mm;
var xmlhttp;
var gii="news.php?q=" + k;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("tt1").innerHTML = xmlhttp.responseText;


    }

  }

xmlhttp.open("GET",gii,true);
xmlhttp.send();
}

}



 function c7(form)
  {
    

    if(!form.captcha.value.match($code)) 
	{
      alert('Please enter the CAPTCHA digits in the box provided');
      form.captcha.focus();
      return false;
    }

  return true;
  }
    



</script>
</head>

<body bgcolor="darkgrey" text="PINK">
  
<div id="shadowing" style="height:150%"></div>
<div id="sbox" style="height:130px">
  <span id="boxtitle"></span>
<form name="form2" action="search.php" method="post">
<p class="wt">Username : <input type="text" name="us"></p>
<br>
<input type="submit" value="Search" class="form">
<input type="button" value="Cancel" class="form" onclick="closebox('sbox')">
</form>
</div>

<div id="shadowing" style="height:150%"></div>
<div id="box">
  <span id="boxtitle"></span>
  <form name="loginform" method="post" action="login.php" target="_parent">
      
    <p class="wt">Username: <br>
      <input id="accname" type="text" name="accname" placeholder="username" maxlength="60" size="60">
    </p>
      
    <p class="wt">Password<br>
      <input type="password" name="password" placeholder="Password">

    </p>
      
	<p class="wt">
	<font size=2>New user? <a class="ln" href="1.php" > Register</a> here.</font>
	</p>
	<p class="wt">
	<font size=2>Login as <a class="ln" href="#" style="color:yellow;" onclick="openbox('Admin Login', 2,'box1')"> Admin !</a></font>
	</p>
    
    <p class="wt" style="left:170px;position:absolute;"> 
      <input class="form" type="submit" name="Login" value="Login">&emsp;
      <input class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box')" >
    </p>
  </form>
</div>

<div id="shadowing" style="height:150%">></div>
<div id="box1">
 <span id="boxtitle"></span>
  <form name="aloginform" method="post" action="admin.php" target="_parent">
      <br>
    <p class="wt">Admin ID: <br>
      <input id="accname" type="text" name="aid" placeholder="Admin id" maxlength="40" size="40">
    </p>
      
    <p class="wt">Password<br>
      <input type="password" name="pas" placeholder="Password">

    </p>
      
	
    <p class="wt" style="left:170px;position:absolute;"> 
      <input class="form" type="submit" name="Login" value="Login">&emsp;
      <input class="form" type="button" name="cancel" value="Cancel" onClick="closebox('box1')" >
    </p>
  </form>
</div>


<?php

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


mysql_select_db("minor", $con);
$rr = mysql_query("select * from about");
if (!$rr)
{
    die('Invalid query: ' . mysql_error());
}

while($r=mysql_fetch_array($rr))
{
$a=$r['home1'];
}
?>

<div id="head" >
<img src="img/logo_120.png" height="106" width="110" style="margin-left:85px">

<div id="putter">
<a href="home.php"> <h1 style="float:left;margin-top:46px;color:pink;">  UTTER..</h1></a>
<?php
echo '<h1 style="margin-top:43px;color:#0bf;width:550px;"><font size=5px face="Segoe Print">'.$a.'</font> </h1>'; 
?>
</div>



<div id="tabs">
<a class="but" href="#" onClick="openbox('Login', 2,'box')">Login</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="#" onClick="openbox('Search', 2,'sbox')" >Search</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="help.php" >Help</a> &emsp;&emsp;&emsp;&emsp;
<a class="but"  href="contactus.php" >Contact Us</a>
</div>

</div>
  <form name="form" method="post" onsubmit="return validateform()" action="signup.php">
<div style="margin:100px 0px 0px 700 px;">
    
        <center>
            <div id="toppad"></div>
            
              <div class="classname" style="background-color:#2a2a2a;position:absolute;top:120px;left:500px;width:500px;height:800px;">  
                 <div id="maincontainer"> 
                         <h3 >
<font face="Segoe Print" color="White" style="position:absolute;left:340px;">Sign Up</font>
</h3>       <br/><br/><br/>
               
                        
                        <!-- form -->
                        <td>
                            <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="borderleft leftspace">FirstName</td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><input placeholder="firstname" name="firstname" type="text" maxlength="65" id="firstname"  onchange="c2()"  class="formfields" /><div id="txtHint"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace">Lastname</td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><input placeholder="lastname" name="lastname" type="text" maxlength="65" id="lastname" onchange="c3()"  class="formfields" /><div id="tt"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace">Email</td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><input placeholder="email  id" name="email" type="email" maxlength="65" id="email" onchange="c4()"  class="formfields" /><div id="tt111"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace">Username</td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><input placeholder="username" name="accname" type="text" maxlength="65" id="accname" onchange="c5()"  class="formfields" /><div id="tt1"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace">Password</td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><input placeholder="password" name="pwd1" onchange="pwd11()" type="password" maxlength="65" id="password" class="formfields" /><div id="pw"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace">Password Confirmation</td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace"><input placeholder="password again" name="pwd2" onchange="pwd22()" type="password" maxlength="65" id="passwordconfirm" class="formfields" /><div id="ppwd"></div></td>
                            </tr>                            
                            <tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace">
                                    <table cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td colspan="4">country</td>
                                    </tr>
                                    <tr>
<td>
    <select name="country" id="country" class="formfields" size="1" >
	<option value="93">Afghanistan</option>
	<option value="355">Albania</option>
	<option value="213">Algeria</option>
	<option value="684">American Samoa</option>
	<option value="376">Andorra</option>
	<option value="244">Angola</option>
	<option value="1-264">Anguilla</option>
	<option value="1-268">Antigua and Barbuda</option>
	<option value="54">Argentina</option>
	<option value="374">Armenia</option>
	<option value="297">Aruba</option>
	<option value="61">Australia</option>
	<option value="43">Austria</option>
	<option value="994">Azerbaijan</option>
	<option value="1-242">Bahamas</option>
	<option value="973">Bahrain</option>
	<option value="880">Bangladesh</option>
	<option value="1-246">Barbados</option>
	<option value="375">Belarus</option>
	<option value="32">Belgium</option>
	<option value="501">Belize</option>
	<option value="229">Benin</option>
	<option value="1-441">Bermuda</option>
	<option value="975">Bhutan</option>
	<option value="591">Bolivia</option>
	<option value="387">Bosnia and Herzegovina</option>
	<option value="267">Botswana</option>
	<option value="55">Brazil</option>
	<option value="673">Brunei Darussalam</option>
	<option value="359">Bulgaria</option>
	<option value="226">Burkina Faso</option>
	<option value="257">Burundi</option>
	<option value="855">Cambodia</option>
	<option value="237">Cameroon</option>
	<option value="1">Canada</option>
	<option value="238">Cape Verde</option>
	<option value="1-345">Cayman Islands</option>
	<option value="236">Central African Republic</option>
	<option value="235">Chad</option>
	<option value="56">Chile</option>
	<option value="86">China</option>
	<option value="61-8">Christmas Island</option>
	<option value="61">Cocos (Keeling) Islands</option>
	<option value="57">Colombia</option>
	<option value="269">Comoros</option>
	<option value="243">Congo, Democratic Republic Of The</option>
	<option value="682">Cook Islands</option>
	<option value="506">Costa Rica</option>
	<option value="225">Cote D'ivoire (Ivory Coast)</option>
	<option value="385">Croatia (Hrvatska)</option>
	<option value="53">Cuba</option>
	<option value="357">Cyprus</option>
	<option value="420">Czech Republic</option>
	<option value="45">Denmark</option>
	<option value="253">Djibouti</option>
	<option value="1-767">Dominica</option>
	<option value="1-809">Dominican Republic</option>
	<option value="670">East Timor</option>
	<option value="593">Ecuador</option>
	<option value="20">Egypt</option>
	<option value="503">El Salvador</option>
	<option value="240">Equatorial Guinea</option>
	<option value="291">Eritrea</option>
	<option value="372">Estonia</option>
	<option value="251">Ethiopia</option>
	<option value="500">Falkland Islands (Islas Malvinas)</option>
	<option value="298">Faroe Islands</option>
	<option value="358">Finland</option>
	<option value="33">France</option>
	<option value="594">French Guiana</option>
	<option value="689">French Polynesia</option>
	<option value="241">Gabon</option>
	<option value="220">Gambia</option>
	<option value="995">Georgia</option>
	<option value="49">Germany</option>
	<option value="233">Ghana</option>
	<option value="350">Gibraltar</option>
	<option value="30">Greece</option>
	<option value="299">Greenland</option>
	<option value="1-473">Grenada</option>
	<option value="590">Guadeloupe</option>
	<option value="1-671">Guam</option>
	<option value="502">Guatemala</option>
	<option value="224">Guinea</option>
	<option value="245">Guinea-Bissau</option>
	<option value="592">Guyana</option>
	<option value="509">Haiti</option>
	<option value="504">Honduras</option>
	<option value="852">Hong Kong</option>
	<option value="36">Hungary</option>
	<option value="354">Iceland</option>
	<option selected="selected" value="91">India</option>
	<option value="62">Indonesia</option>
	<option value="98">Iran</option>
	<option value="964">Iraq</option>
	<option value="353">Ireland</option>
	<option value="972">Israel</option>
	<option value="39">Italy</option>
	<option value="1-876">Jamaica</option>
	<option value="81">Japan</option>
	<option value="962">Jordan</option>
	<option value="7">Kazakhstan</option>
	<option value="254">Kenya</option>
	<option value="686">Kiribati</option>
	<option value="850">Korea North</option>
	<option value="82">Korea South</option>
	<option value="965">Kuwait</option>
	<option value="856">Laos</option>
	<option value="371">Latvia</option>
	<option value="961">Lebanon</option>
	<option value="266">Lesotho</option>
	<option value="231">Liberia</option>
	<option value="218">Libya</option>
	<option value="423">Liechtenstein</option>
	<option value="370">Lithuania</option>
	<option value="352">Luxembourg</option>
	<option value="853">Macau</option>
	<option value="389">Macedonia</option>
	<option value="261">Madagascar</option>
	<option value="265">Malawi</option>
	<option value="60">Malaysia</option>
	<option value="960">Maldives</option>
	<option value="223">Mali</option>
	<option value="356">Malta</option>
	<option value="692">Marshall Islands</option>
	<option value="596">Martinique</option>
	<option value="222">Mauritania</option>
	<option value="230">Mauritius</option>
	<option value="52">Mexico</option>
	<option value="691">Micronesia</option>
	<option value="373">Moldova</option>
	<option value="377">Monaco</option>
	<option value="976">Mongolia</option>
	<option value="1-664">Montserrat</option>
	<option value="212">Morocco</option>
	<option value="258">Mozambique</option>
	<option value="95">Myanmar</option>
	<option value="264">Namibia</option>
	<option value="674">Nauru</option>
	<option value="977">Nepal</option>
	<option value="31">Netherlands</option>
	<option value="599">Netherlands Antilles</option>
	<option value="687">New Caledonia</option>
	<option value="64">New Zealand</option>
	<option value="505">Nicaragua</option>
	<option value="227">Niger</option>
	<option value="234">Nigeria</option>
	<option value="683">Niue</option>
	<option value="672">Norfolk Island</option>
	<option value="1-670">Northern Mariana Islands</option>
	<option value="47">Norway</option>
	<option value="968">Oman</option>
	<option value="92">Pakistan</option>
	<option value="680">Palau</option>
	<option value="970">Palestinian Authority</option>
	<option value="507">Panama</option>
	<option value="675">Papua New Guinea</option>
	<option value="595">Paraguay</option>
	<option value="51">Peru</option>
	<option value="63">Philippines</option>
	<option value="351">Portugal</option>
	<option value="1-787,00 1-939">Puerto Rico</option>
	<option value="974">Qatar</option>
	<option value="262">Reunion</option>
	<option value="40">Romania</option>
	<option value="7">Russia</option>
	<option value="250">Rwanda</option>
	<option value="290">Saint Helena</option>
	<option value="1-869">Saint Kitts And Nevis</option>
	<option value="1-758">Saint Lucia</option>
	<option value="508">Saint Pierre And Miquelon</option>
	<option value="1-784">Saint Vincent and The Grenadines</option>
	<option value="378">San Marino</option>
	<option value="239">Sao Tome and Principe</option>
	<option value="966">Saudi Arabia</option>
	<option value="221">Senegal</option>
	<option value="381">Serbia and Montenegro (Formerly Yugoslavia)</option>
	<option value="232">Sierra Leone</option>
	<option value="65">Singapore</option>
	<option value="421">Slovakia</option>
	<option value="386">Slovenia</option>
	<option value="677">Solomon Islands</option>
	<option value="252">Somalia</option>
	<option value="27">South Africa</option>
	<option value="34">Spain</option>
	<option value="94">Sri Lanka</option>
	<option value="249">Sudan</option>
	<option value="597">Suriname</option>
	<option value="268">Swaziland</option>
	<option value="46">Sweden</option>
	<option value="41">Switzerland</option>
	<option value="963">Syria</option>
	<option value="886">Taiwan</option>
	<option value="992">Tajikistan</option>
	<option value="255">Tanzania</option>
	<option value="66">Thailand</option>
	<option value="690">Tokelau</option>
	<option value="676">Tonga</option>
	<option value="1-868">Trinidad and Tobago</option>
	<option value="216">Tunisia</option>
	<option value="90">Turkey</option>
	<option value="993">Turkmenistan</option>
	<option value="1-649">Turks and Caicos Islands</option>
	<option value="688">Tuvalu</option>
	<option value="256">Uganda</option>
	<option value="380">Ukraine</option>
	<option value="971">United Arab Emirates</option>
	<option value="44">United Kingdom</option>
	<option value="1">United States</option>
	<option value="598">Uruguay</option>
	<option value="998">Uzbekistan</option>
	<option value="678">Vanuatu</option>
	<option value="58">Venezuela</option>
	<option value="84">Vietnam</option>
	<option value="1-340">Virgin Islands (U.S.)</option>
	<option value="681">Wallis and Futuna Islands</option>
	<option value="967">Yemen</option>
	<option value="260">Zambia</option>
	<option value="263">Zimbabwe</option>

</td>                                
                                    </tr>
                                    </table>
                                </td>
                            </tr>
 

<tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr> 
<td class="borderleft leftspace">
 <table cellpadding="0" cellspacing="0">    

                                       <tr>
                                <td class="leftspace">Date of birth</td>
                            </tr>
                                    
                                    <tr>
<td>                      
 <select name="date" class="formfield";>
<option value="none" selected="selected" >day</option><option value="1" >1</option><option value="2" >2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option><option value="7" >7</option><option value="8" >8</option><option value="9" >9</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option><option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option><option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option><option value="25" >25</option><option value="26" >26</option><option value="27" >27</option><option value="28" >28</option><option value="29" >29</option><option value="30" >30</option><option value="31" >31</option>
</select>
<select name="month" class="formfield">
  <option value="none" selected="selected" >month</option>
  <option value="jan" >january</option>
  <option value="feb" >february</option>
  <option value="mar" >march</option>
  <option value="apr" >april</option>
  <option value="may" >may</option>
  <option value="jun" >june</option>
  <option value="jul" >july</option>
  <option value="aug" >august</option>
  <option value="sept" >september</option>
  <option value="oct" >october</option>
  <option value="nov" >november</option>
  <option value="dec" >december</option>
</select>
<select name="year" class="formfield">
<option value="none" selected="selected" >year</option><option value="2012" >2012</option><option value="2011" >2011</option><option value="2010" >2010</option><option value="2009" >2009</option><option value="2008" >2008</option><option value="2007" >2007</option><option value="2006" >2006</option><option value="2005" >2005</option><option value="2004" >2004</option><option value="2003" >2003</option><option value="2002" >2002</option><option value="2001" >2001</option><option value="2000" >2000</option><option value="1999" >1999</option><option value="1998" >1998</option><option value="1997" >1997</option><option value="1996" >1996</option><option value="1995" >1995</option><option value="1994" >1994</option><option value="1993" >1993</option><option value="1992" >1992</option><option value="1991" >1991</option><option value="1990" >1990</option><option value="1989" >1989</option><option value="1988" >1988</option><option value="1987" >1987</option><option value="1986" >1986</option><option value="1985" >1985</option><option value="1984" >1984</option><option value="1983" >1983</option><option value="1982" >1982</option><option value="1981" >1981</option><option value="1980" >1980</option><option value="1979" >1979</option><option value="1978" >1978</option><option value="1977" >1977</option><option value="1976" >1976</option><option value="1975" >1975</option><option value="1974" >1974</option><option value="1973" >1973</option><option value="1972" >1972</option><option value="1971" >1971</option><option value="1970" >1970</option><option value="1969" >1969</option><option value="1968" >1968</option><option value="1967" >1967</option><option value="1966" >1966</option><option value="1965" >1965</option><option value="1964" >1964</option><option value="1963" >1963</option><option value="1962" >1962</option><option value="1961" >1961</option><option value="1960" >1960</option><option value="1959" >1959</option><option value="1958" >1958</option><option value="1957" >1957</option><option value="1956" >1956</option><option value="1955" >1955</option><option value="1954" >1954</option><option value="1953" >1953</option><option value="1952" >1952</option><option value="1951" >1951</option><option value="1950" >1950</option><option value="1949" >1949</option><option value="1948" >1948</option><option value="1947" >1947</option><option value="1946" >1946</option><option value="1945" >1945</option><option value="1944" >1944</option><option value="1943" >1943</option><option value="1942" >1942</option><option value="1941" >1941</option><option value="1940" >1940</option><option value="1939" >1939</option><option value="1938" >1938</option><option value="1937" >1937</option><option value="1936" >1936</option><option value="1935" >1935</option><option value="1934" >1934</option><option value="1933" >1933</option><option value="1932" >1932</option><option value="1931" >1931</option><option value="1930" >1930</option><option value="1929" >1929</option><option value="1928" >1928</option><option value="1927" >1927</option><option value="1926" >1926</option><option value="1925" >1925</option><option value="1924" >1924</option><option value="1923" >1923</option><option value="1922" >1922</option><option value="1921" >1921</option><option value="1920" >1920</option><option value="1919" >1919</option><option value="1918" >1918</option><option value="1917" >1917</option><option value="1916" >1916</option><option value="1915" >1915</option><option value="1914" >1914</option><option value="1913" >1913</option><option value="1912" >1912</option><option value="1911" >1911</option><option value="1910" >1910</option><option value="1909" >1909</option><option value="1908" >1908</option><option value="1907" >1907</option><option value="1906" >1906</option><option value="1905" >1905</option><option value="1904" >1904</option><option value="1903" >1903</option><option 
value="1902" >1902</option><option value="1901" >1901</option><option value="1900" >1900</option>
</select>                           
                            
 </td>                                
                                    </tr>
                                    </table>
                                </td>
                            </tr>                           

                           


 </td>
                            </tr>
                           
                            <tr>
                                <td class="borderleft leftspace"><div class="formspacer"></div></td>
                            </tr>
                            <tr>
                            <td class="borderleft leftspace"><img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" id="CAPTCHA"/>
                             <input type="button" id="formm" name="refresh" value="refresh" onclick="reloadCAPTCHA1()" /></td>
                            </tr>
                            <tr>
                                <td class="borderleft leftspace">Security code</td>
                            </tr>
                            <tr>
                            <td class="borderleft leftspace"><input id="security_code" name="security_code" type="text" maxlength="65" class="formfields"/></td>
                            </tr>
                            <tr> 
                            <td class="borderleft leftspace"><input type="checkbox" name="chk" value="check" id="ckd"/>Check it to agree to the <a href="terms.html"><span style="color:YELLOW;">terms and conditions</span></a> of the agreement.</td>
                            </tr>
 
                             <tr>
                                <td class="borderleft leftspace"><input class="form" type="submit" value="Sign Up"/> </td>
                            </tr>   
                             </table>                       
                                                       
                             
                            
                            
                  </div>     
                 </div>   
                </div>
                
            </div>
        </center>    
    </div>
    

</div>

</form>
</body>

</html>

<?php
	 }
	 else 
	 {
	   ?>
	<meta http-equiv="refresh" content="0;main.php">
	<?php
	  }

?>
