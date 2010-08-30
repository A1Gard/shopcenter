    <style type="text/css">
.red{
    border: 1px solid red;
}
.grn{
    border: 1px solid lime;
}
.org{
    border: 1px solid orange;
}
.normal{
    font-family: tahoma;
    width: 140px;
    text-align: center;
    float: left;
}
.lbl{
        float: left; 
        clear: both; 
		margin-left:300px;		
}
.dd{
    position: absolute;
    left: 220px;
    right:200px;
    top: 100px;
}
</style>
<script type="text/javascript">
	function namecheck(edit)
    {
        if (edit.value.length < 8)
        {
            edit.className = 'red';
        }
        else
        {
            edit.className = 'grn';
        }
    }
    function idmcheck (edit)
    {
        if (edit.value.length < 10)
        {
           edit.className = 'red'; 
        }
        else
        {
           var strFilter = /^[-+]?\d*\.?\d*$/;
           var val = edit.value ;
           if (!strFilter.test(val))
           {
                edit.className = 'red';
           } else
           {
                edit.className = 'grn';
           }
        }
    }
    function mailcheck (edit)
    {
        var strValue = edit.value;
        var strFilter = /^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i;
        if (!strFilter.test(strValue))
        {
             edit.className = 'red';    
        }
        else
        {
             edit.className = 'grn';
        } 
        
    }
    function telcheck (edit)
    {
        if (edit.value.length < 11)
        {
           edit.className = 'red'; 
        }
        else
        {
           var strFilter = /^0[-+]?\d*\.?\d*$/;
           var val = edit.value ;
           if (!strFilter.test(val))
           {
                edit.className = 'red';
           } else
           {
                edit.className = 'grn';
           }
        }
    }
   	function addresscheck(edit)
    {
        if (edit.value.length < 20)
        {
            edit.className = 'red';
        }
        else
        {
            edit.className = 'grn';
        }
    }
    function password1 (edit)
    {
        if (edit.value.length < 4)
        {
           edit.className = 'red'; 
        }
        else
        {
            if (edit.value.length < 9)
            {
                edit.className = 'org';
            }
            else
            {
                edit.className = 'grn';
            }
        }
        var val = document.getElementById('pass2');
        if (edit.value === val.value)
        {
            val.className = 'grn';
        }
        else
        {
            val.className = 'red';
        }
    }
    function password2 (edit)
    {
        var val = document.getElementById('pass1');
        if (edit.value === val.value)
        {
            edit.className = 'grn';
        }
        else
        {
            edit.className = 'red';
        }
    }
    </script>
	<div class="posttop">ثبت نام</div>
    <div class="posttxt">
<form action="pop/amrs.php" method="POST" id="frm">
<br /><label class="lbl">نام و نام خانوادگی:  <input class="normal" type="text" name="ffname" id="inpf" maxlength="30" onkeyup="namecheck(this);"/></label><br /><br />
<label class="lbl"> کد ملی:  <input class="normal" type="text" name="idm" id="inpi" maxlength="10" onkeyup="idmcheck(this);"/></label><br /><br />
<label class="lbl">ایمیل:  <input class="normal" type="text" name="mail" id="inpm" maxlength="30" onkeyup="mailcheck(this);" /> </label><br /><br />
<label class="lbl">پسورد:  <input class="normal" type="password" name="p1" id="pass1" onkeyup="password1(this);" /> </label><br /><br />
<label class="lbl">تکرار پسورد:  <input class="normal" type="password" name="p2" id="pass2" onkeyup="password2(this);" /></label><br /><br />
<label class="lbl"> تلفن:  <input class="normal" type="text" name="tel" id="inpt" maxlength="11" onkeyup="telcheck(this);" /></label><br /><br />
<label class="lbl"> آدرس:  <input class="normal" type="text" name="addr" id="inpa" maxlength="1023" onblur="addresscheck(this);" /></label><br /><br />
<label class="lbl"> کد پستی:  <input class="normal" type="text" name="idp" id="inpi" maxlength="10" onkeyup="idmcheck(this);"/></label><br /><br />
<label class="lbl"> IP:  <input class="normal" readonly="true" type="text" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>" /></label><br /><br /><br />
<label class="lbl"><input type="reset" style="width:75;" /><input type="submit" value="ثبت نام" style="width:75;" /><br /></label><br /><br /><br />
<label class="lbl"><br /></label>
</form>
	</div>