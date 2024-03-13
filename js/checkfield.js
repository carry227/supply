// ------------------------------------------------------------------
// Make form field check
// ------------------------------------------------------------------

// ------------------------------------------------------------------
// error(code, msg)
function error(code, msg) {
	alert(msg);
}

// ------------------------------------------------------------------
// checkNull(form, nullValue, code, msg)
function checkNull(form, nullValue) {
	if (form.value == nullValue) {
		error(code, msg);
		form.focus();
		return false;
	}
	return true;
}

// ------------------------------------------------------------------
// checkNullList(form, nullValue, code, msg)
function checkNullList(form, nullValue, code, msg) {
	if (form.options[form.selectedIndex].value == nullValue) {
		error(code, msg);
		form.focus();
		return false;
	}
	return true;
}

// ------------------------------------------------------------------
// checkSame(form1, form2)
function checkSame(form1, form2) {
	if (!(form1.value == form2.value)) {
		error("000", "您輸入的密碼不一致哦!!");
		form1.value = "";
		form2.value = "";
		form1.focus();
		return false;
	}
	return true;
}

// ------------------------------------------------------------------
// checkEmail(form)
function checkEmail(form) {
	var email = new String(form.value);
	if (!(email.indexOf("@") > 0) || !(email.indexOf("@") < email.length-1)) {
		error("001", "你的E-mail信箱輸入不正確哦!!");
		form.focus();
		return false;
	}
	return true;
}

// ------------------------------------------------------------------
// checkBlank(form)
function checkBlank(form) {
	var field = new String(form.value);
	if (field.length == 0) {
		error("002", "這個欄位不能是空白哦!!");
		form.focus();
		return false;
	}
	return true;
}
// ------------------------------------------------------------------
// checklenpass(form)
function checklenpass(form) {
	var field = new String(form.value);
	   if(isNaN(field )){
          error("004", "要是數字哦!!");
          form.focus();
          return false; 
        }  
	   if (field.length != 10) {
           error("004", "欄位的長度是10碼哦!!");
	       form.focus();
     	   return false;
	    }
       
       //alert("kk");
        return true;
}

// ------------------------------------------------------------------
// checklenpass(form)
function checkisbn(form) {
	var field = new String(form.value);
    
	if (field.length != 10) {
           error("004", "欄位的長度是10碼哦!!");
	       form.focus();
     	   return false;
	 }
//===============================================
	var field1 = new Array(10);

	for (var i=0 ; i<10 ; i++)
		field1[i] = field.charAt(i);

	var enstring1 = "0123456789";

    for (var j=0; j<9 ; j++){
	field1[j] = enstring1.indexOf(field1[j]);

	if(field1[j] == -1)

	{

		alert("ISBN的前九碼必須是數字！");

		form.focus();

		return false;

	}
	}
	
	var enstring2 = "0123456789X";

	field1[9] = enstring2.indexOf(field1[9]);

	if(field1[9] == -1)

	{

		alert("ISBN的最後一碼是數字或大窯英文字母X！");

		form.focus();

		return false;

	}
//===============================================
	   //if(isNaN(field)){
       //   error("004", "要是數字哦!!");
       //   form.focus();
       //   return false; 
       // }  
	   
       
       //alert("kk");
        return true;
}

// ------------------------------------------------------------------

// checklenpass(form)
function checkAddr(form) {
	var field = new String(form.value);
        
	if (field.length < 7) {
           error("004", "抱歉!你輸入的通訊地址有誤!!!!");
	   form.focus();
     	   return false;
	}
       
        return true;
}

// ------------------------------------------------------------------
// checkDate(MonthField, month, DayField, day)
function checkDate(MonthField, month, DayField, day) {
	m = parseInt(month);
	d = parseInt(day);
	if (m > 12 || m < 0) {
		error("003", "月份輸入不正確!!");
		MonthField.focus();
		return false;
	}
	if (d > 31 || d < 0) {
		error("004", "日期輸入不正確!!");
		DayField.focus();
		return false;
	}
	switch (m) {
		case 4: case 6: case 9: case 11:
			if (d > 30) {
				error("004", "日期輸入不正確");
				DayField.focus();
				return false;
			} break;
		case 2:
			if (d > 29) {
				error("004", "日期輸入不正確");
				DayField.focus();
				return false;
			} break;
	}
	return true;
}

// ------------------------------------------------------------------
// checkBirth(form)
function checkBirth(form, year, month, day) {
	var today = new Date();
	var birth = new Date(month + "/" + day + "/" + year);
	if (birth >= today) {
		error("003", "生日不正確哦!!");
		form.focus();
		return false;
	}
	return true;
}

function checkoption(form) {
	if( (form.options[form.selectedIndex].value == 0) ) {
		alert("您尚未選擇項目咧!!");
		form.focus();
		return false;
	}
	return true;


}


// 確認中華民國身份證號
//

function idCheck(objID)

{

	id = objID.value

	if (id == null || id.length == 0)

	{

		alert("請輸入您的身分證號碼！");

		objID.focus();

		return false;

	}


	id = id.toUpperCase();

	if (id.length != 10)

	{

		alert("您輸入的身分證號碼有誤！");

		objID.focus();

		return false;

	}


	var ID_Input = new Array(10);

	for (var i=0 ; i<10 ; i++)
		ID_Input[i] = id.charAt(i);


	var engstring = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	ID_Input[0] = engstring.indexOf(ID_Input[0]);

	if(ID_Input[0] == -1)

	{

		alert("身分證號碼錯誤！");

		objID.focus();

		return false;

	}

	if (ID_Input[1] != 1 && ID_Input[1] != 2)

	{

		alert("身分證號碼錯誤！");

		objID.focus();

		return false;

	}


	var NumArray  = new Array(26);

	NumArray[0]  = 1 ;
	NumArray[1]  = 10;
	NumArray[2]  = 19;

	NumArray[3]  = 28;
	NumArray[4]  = 37;
	NumArray[5]  = 46;

	NumArray[6]  = 55;
	NumArray[7]  = 64;
	NumArray[8]  = 39;

	NumArray[9]  = 73;
	NumArray[10] = 82; 
	NumArray[11] = 2 ;

	NumArray[12] = 11;
	NumArray[13] = 20;
	NumArray[14] = 48;

	NumArray[15] = 29;
	NumArray[16] = 38;
	NumArray[17] = 47;

	NumArray[18] = 56;
	NumArray[19] = 65;
	NumArray[20] = 74;

	NumArray[21] = 83;
	NumArray[22] = 21;
	NumArray[23] = 3 ;

	NumArray[24] = 12;
	NumArray[25] = 30;

	var result = NumArray[ID_Input[0]];


	for (var i = 1; i < 10; i++)

	{

		var NumString = "0123456789";

		ID_Input[i] = NumString.indexOf(ID_Input[i]);

		if (ID_Input[i] == -1)

		{

			alert("身分證號碼錯誤!");

			objID.focus();

			return (false);

		}

		else

		{

			result += ID_Input[i] * (9-i);

		}

	}

	result += 1 * ID_Input[9];

	if (result % 10 != 0)

	{

		alert("身分證號碼錯誤!");

		objID.focus();

		return (false);

	}

	else

	{

		objID.value=id;

		return true;

	}

}


