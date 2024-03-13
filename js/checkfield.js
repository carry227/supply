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
		error("000", "�z��J���K�X���@�P�@!!");
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
		error("001", "�A��E-mail�H�c��J�����T�@!!");
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
		error("002", "�o����줣��O�ťծ@!!");
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
          error("004", "�n�O�Ʀr�@!!");
          form.focus();
          return false; 
        }  
	   if (field.length != 10) {
           error("004", "��쪺���׬O10�X�@!!");
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
           error("004", "��쪺���׬O10�X�@!!");
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

		alert("ISBN���e�E�X�����O�Ʀr�I");

		form.focus();

		return false;

	}
	}
	
	var enstring2 = "0123456789X";

	field1[9] = enstring2.indexOf(field1[9]);

	if(field1[9] == -1)

	{

		alert("ISBN���̫�@�X�O�Ʀr�Τj�`�^��r��X�I");

		form.focus();

		return false;

	}
//===============================================
	   //if(isNaN(field)){
       //   error("004", "�n�O�Ʀr�@!!");
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
           error("004", "��p!�A��J���q�T�a�}���~!!!!");
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
		error("003", "�����J�����T!!");
		MonthField.focus();
		return false;
	}
	if (d > 31 || d < 0) {
		error("004", "�����J�����T!!");
		DayField.focus();
		return false;
	}
	switch (m) {
		case 4: case 6: case 9: case 11:
			if (d > 30) {
				error("004", "�����J�����T");
				DayField.focus();
				return false;
			} break;
		case 2:
			if (d > 29) {
				error("004", "�����J�����T");
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
		error("003", "�ͤ餣���T�@!!");
		form.focus();
		return false;
	}
	return true;
}

function checkoption(form) {
	if( (form.options[form.selectedIndex].value == 0) ) {
		alert("�z�|����ܶ��ث�!!");
		form.focus();
		return false;
	}
	return true;


}


// �T�{���إ��ꨭ���Ҹ�
//

function idCheck(objID)

{

	id = objID.value

	if (id == null || id.length == 0)

	{

		alert("�п�J�z�������Ҹ��X�I");

		objID.focus();

		return false;

	}


	id = id.toUpperCase();

	if (id.length != 10)

	{

		alert("�z��J�������Ҹ��X���~�I");

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

		alert("�����Ҹ��X���~�I");

		objID.focus();

		return false;

	}

	if (ID_Input[1] != 1 && ID_Input[1] != 2)

	{

		alert("�����Ҹ��X���~�I");

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

			alert("�����Ҹ��X���~!");

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

		alert("�����Ҹ��X���~!");

		objID.focus();

		return (false);

	}

	else

	{

		objID.value=id;

		return true;

	}

}


