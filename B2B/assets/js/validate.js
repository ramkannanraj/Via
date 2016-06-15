//$(".cyberplat_bal").load("index.php?cyberplatbal");

/*$.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?cyberplatbal',
		success: function(response) {
			$(".cyberplat_bal").html(response);
		}
	});

$.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?cynosurebal',
		success: function(response) {
			$(".cynosure_bal").html(response);
		}
	});*/
	
	$.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?appandukanbal',
		success: function(response) {
			$(".appandukan_bal").html(response);
		}
	});

    $.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?todaybusiness',
		success: function(response) {
			$(".todaybusiness_bal").html(response);
		}
	});
     $(document).ready(function(){
        $('.checkall').click(function (){
            $('.userlist_checkbox').prop('checked', this.checked);
            user_ids = '';
            $('input:checkbox[name=user_ids]:checked').each(function(){
	            user_ids = user_ids+$(this).val()+'~';
            });
            $("#hd_user_ids").val(user_ids)
        });
        $(".userlist_checkbox").click(function(){
            var check = ($('.checkall').filter(":checked").length == $('.userlist_checkbox').length);
            $('.checkall').prop("checked", check);

            user_ids = '';
            $('input:checkbox[name=user_ids]:checked').each(function(){
	            user_ids = user_ids+$(this).val()+'~';
            });
            $("#hd_user_ids").val(user_ids)

        });

        $(".status-buttons").click(function(){
            if($("#hd_user_ids").val()=='')
            {
                alert("Select user for perform action");
                return false;
            }
            var status = $(this).attr("data-status");
            $("#status_type").val(status);
            var msg = "Are sure want to "+( (status==1)?"active":"inactive")+" the selected users?";
            if(confirm(msg))
                $("#active_form").submit();
            else
                return false;
        });
    });

    function update_editable()
    {
      $(".userlist_checkbox").click(function(){
            var check = ($('.checkall').filter(":checked").length == $('.userlist_checkbox').length);
            $('.checkall').prop("checked", check);

            user_ids = '';
            $('input:checkbox[name=user_ids]:checked').each(function(){
	            user_ids = user_ids+$(this).val()+'~';
            });
            $("#hd_user_ids").val(user_ids)

        });
    }

function typesearch(token)
{
	var type = $('#type').val();
	var domain = document.location.hostname;
	window.open("index.php?listuserfilter&token="+token+"&type="+type,"_self");
}

	/*$.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?totalrecharge',
		success: function(response) {
			$("#totalrecharge").html(response);
		}
	}); */

	$.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?totalcommission',
		success: function(response) {
			$("#totalcommission").html(response);
		}
	});

/*$.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?mybal',
        dataType:'json',
		success: function(response) {
		    var avail_bal =response.balance ;
            $(".my_bal").html(avail_bal);
            $(".locked_bal").html(response.locked_balance);

		}
	});*/


var refreshId = setInterval(function() {
								  $.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?cyberplatbal',
		success: function(response) {
			$(".cyberplat_bal").html(response);
		}
	});
							   }, 100000);

var refreshId = setInterval(function() {
								  $.ajax({
		type: "POST",
		cache: false,
		//data: $('#forgetpasswordForm').serialize(),
		url: 'index.php?mybal',
		success: function(response) {
			$(".my_bal").html(response);
		}
	});
							   }, 100000);

function updatecommission(id,token,tablename)
{
	var val = $('#commission_'+id).val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updatecommission',
		success: function(response){
			alert(response);
		}
	});
}

function deleteuser(id,token)
{
	//var val = $('#commission_'+id).val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, token: token },
		url:'index.php?deleteuser',
		success: function(response){
			alert(response);
		}
	});
}


function updatedcommission(id,token,tablename)
{
	var val = $('#dcommission_'+id).val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updatedcommission',
		success: function(response){
			alert(response);
		}
	});
}

function updatesfcommission(id,token,tablename)
{
	var val = $('#sfcommission_'+id).val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updatesfcommission',
		success: function(response){
			alert(response);
		}
	});
}

function updatesdcommission(id,token,tablename)
{
	var val = $('#sdcommission_'+id).val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updatesdcommission',
		success: function(response){
			alert(response);
		}
	});
}

function updatescommission(id,token,tablename)
{
	var val = $('#scommission_'+id).val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updatescommission',
		success: function(response){
			alert(response);
		}
	});
}



function changepassword()
{
	$.ajax({
		type: "POST",
		cache:false,
		data: $('#changepasswordForm').serialize(),
		url:'index.php?userprofileprocess',
		success: function(response){
			alert(response);
		}
	});
}

function serviceprovider()
{
	var provider = $("#service").val();
	if(provider == "--select--")
	{
		return;
	}
	$.ajax({
		type: "POST",
		cache:false,
		data: { provider: provider },
		url:'index.php?serviceprovider',
		success: function(response){
			$("#serviceprovider").html(response);
		}
	});
}

function searchproviderdate(session)
{
	var fromdate = $("#fromdate").val();
	var todate = $("#todate").val();
	var service = $("#service").val();
	var serviceprovider = $("#serviceprovider").val();

}

function givetake()
{
    if(confirm("Are you sure want to transfer the amount?"))
    {
	    $.ajax({
		    type: "POST",
    		cache:false,
	    	data: $('#givetake').serialize(),
		    url:'index.php?givetakeprocess',
    		success: function(response){
	    		if(response.indexOf("Error") != -1)
		    	{
    				//$(this).hide(100);
	    			var temp = new Array();
		    		temp = response.split('@@');
			    	alert(temp);
    			}
	    		else if(response.indexOf("Success") != -1)
		    	{
			    	var temp = new Array();
				    temp = response.split('@@');
    				alert(temp);
	    			location.reload();
		    	}
    		}
	    });
    }
    return false;
}

function refund(txnid,token,amount,userid,commission)
{
	var flag = confirmFunctionrefund();
	if(flag == "1")
	{
		$.ajax({
			type: "POST",
			cache:false,
			data: 'txnid='+txnid+'&token='+token+'&amount='+amount+'&userid='+userid+'&commission='+commission,
			url:'index.php?refundprocess',
			success: function(response){
				alert(response);
				$("#ref"+txnid).html(response);
			}
		});
	}
}

function refund_pan(txnid,token,userid,coupenno)
{
	var flag = confirmFunctionrefund();
	if(flag == "1")
	{
		$.ajax({
			type: "POST",
			cache:false,
			data: 'txnid='+txnid+'&token='+token+'&userid='+userid+'&coupenno='+coupenno,
			url:'index.php?refundprocesspan',
			success: function(response){
				alert(response);
				$("#ref"+txnid).html(response);
			}
		});
	}
}

function release()
{
	$.ajax({
		type: "POST",
		cache:false,
		data: $('#release').serialize(),
		url:'index.php?releaseprocess',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				alert(temp);
			}
			else if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				alert(temp);
				location.reload(); 
			}
		}
	});
}

function lock()
{
	$.ajax({
		type: "POST",
		cache:false,
		data: $('#lock').serialize(),
		url:'index.php?lockprocess',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				alert(temp);
			}
			else if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				alert(temp);
				location.reload(); 
			}
		}
	});
}

function createticket()
{
	$.ajax({
		type: "POST",
		cache:false,
		data: $('#createticket').serialize(),
		url:'index.php?createticketprocess',
		success: function(response){
			alert(response);
		}
	});
}

function replyticket()
{


		$.ajax({
			type: "POST",
			cache:false,
			data: $('#replyticket').serialize(),
			url:'index.php?replyticketprocess',
			success: function(response){
				alert(response);
			}
		});

}

function updatestatus(id,token,tablename)
{
	var val = $('input[name=status_'+id+']:checked').val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updatestatus',
		success: function(response){
			alert(response);
		}
	});
}

function updateprovider(id,token,tablename)
{
	var val = $('input[name=provider_'+id+']:checked').val();
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updateprovider',
		success: function(response){
			alert(response);
		}
	});
}

function updateuserstatus(id,token,tablename,val)
{
	$.ajax({
		type: "POST",
		cache:false,
		data: { id: id, val: val, token: token, tablename: tablename },
		url:'index.php?updateuserstatus',
		success: function(response){
			$("#userstatus_"+id).html(response);
		}
	});
}


function chkSpecialChar(formelement,text)
{
	var msg='true';
	var a=formelement;
	var b=a.length;
	var cha='`~!@#$%^*&()+-[]{}/|;:,<>.?';
	var ch=cha.length;
	var i,j;
	for(i=0;i<ch;i++)
	{
		var ch1=cha.substring(i,i+1);
		for(j=0;j<b;j++)
		{
			var a1=a.substring(j,j+1);
			if(a1==ch1)
			{
				msg='Special Characters like ' +cha+ 'are not allowed in '+text;
				alert(msg);
				formelement.focus();
				return false;
			}
		}
	}
	if (msg=='true')
	{
	return true;
	}
}

function validate_retailerlimit()
{
	var limit = $("#limit").val();
	//var username = $("#username").val();
	if(limit == "")
	{
		alert("Kindly provide the limit.");
		$("#limit").focus();
		return false;
	}

	$.ajax({
		type: "GET",
		cache:false,
		data:$('#limitForm').serialize(),
		url:'index.php?buyretailerlimitprocess',
		success: function(response){
				alert(response);
			}
	});
};


function validate_login()
{
	var password = $("#password").val();
	var username = $("#username").val();
	if(username == "")
	{
		$("#error_login").html("<p style='color:red'>Can't be Empty.</p>");
		$("#username").focus();
		return false;
	}
	if(username.length > 20)
	{
		$("#error_login").html("<p style='color:red'>Must not be greater than 20 digit.</p>");
		$("#username").focus();
		return false;
	}
	if(password == "")
	{
		$("#error_login").html("<p style='color:red'>Can't be Empty.</p>");
		$("#password").focus();
		return false;
	}
	if(password.length < 7 || password.length > 12)
	{
		$("#error_login").html("<p style='color:red'>Must be between Eight to Twelve Digits.</p>");
		$("#password").focus();
		return false;
	}
    $("<p class=\"login-loader\"><br /><img style=\"height:20px\" src=\"application/images/ajax-loader.gif\" alt=\"Loading\" />").insertAfter("#form1 .cancel");
    $("#form1 .go").attr("disabled",true).css("opacity","0.5");
	$.ajax({
		type: "GET",
		cache:false,
		data:$('#form1').serialize(),
        dataType:"html",
		url:'index.php?dologin',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
                $(".login-loader").remove();
                $("#form1 .go").removeAttr("disabled").css("opacity","1");
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				$('#error_login').html(html);
			}//
			else
			{
				$('#error_login').html(response);

			}//
		}
	});
};

function validate_pan49a()
{

	$.ajax({
		type: "GET",
		cache:false,
		data:$('#pan49aForm').serialize(),
		url:'index.php?pan49aprocess',
		success: function(response){
			alert(response);
			if(response.indexOf("Success") != -1)
			{
				window.location = "http://appandukan.com/index.php?receipt";
			}
		}
	});
};

function validate_cardgeneration()
{
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#cardgenerationForm').serialize(),
		url:'index.php?cardgenerationprocess',
		success: function(response){
			alert(response);
			if(response.indexOf("Success") != -1)
			{
				window.location = "http://waalat.com/application/index.php?cardgenerationotp";
			}
			$.unblockUI();
		}
	});
};

function validate_cardgenerationotp()
{
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#cardgenerationotpForm').serialize(),
		url:'index.php?cardgenerationotpprocess',
		success: function(response){
			alert(response);
			/*if(response.indexOf("Success") != -1)
			{
				window.location = "http://waalat.com/application/index.php?cardgenerationotpsuccess";
			}*/
			$.unblockUI();
		}
	});
};

function validate_cardgenerationresendotp()
{
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#cardgenerationresendotpForm').serialize(),
		url:'index.php?cardgenerationresendotpprocess',
		success: function(response){
			alert(response);
			/*if(response.indexOf("Success") != -1)
			{
				window.location = "http://waalat.com/application/index.php?cardgenerationotpsuccess";
			}*/
			$.unblockUI();
		}
	});
};

function validate_cardgenerationresendvotp()
{
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#cardgenerationresendotpForm').serialize(),
		url:'index.php?cardgenerationresendvotpprocess',
		success: function(response){
			alert(response);
			/*if(response.indexOf("Success") != -1)
			{
				window.location = "http://waalat.com/application/index.php?cardgenerationotpsuccess";
			}*/
			$.unblockUI();
		}
	});
};


function validate_addbankdetailsotp()
{
	var otp = $("#vcode").val();
	var token = $("#token").val();
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		//data:$('#cardgenerationotpForm').serialize(),
		data: 'token='+token+'&otp='+otp,
		url:'index.php?addbankdetailsotpprocess',
		success: function(response){
			if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
				$.unblockUI();
				$('#cardtopup').html(html);
			}
			else
			{
				alert(response);
				$.unblockUI();
			}
		}
	});
};

function validate_cardtopup()
{
	var amount = $("#topupamount").val();
	var token = $("#token").val();
	var cardno = $("#cardno").val();
	var mobile = $("#mobile").val();
	//alert(amount);
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		//data:$('#cardtopupForm').serialize(),
		data: 'amount='+amount+'&token='+token+'&cardno='+cardno+'&mobile='+mobile,
		url:'index.php?cardtopupprocess',
		success: function(response){
			alert(response);
			if(response.indexOf("Success") != -1)
			{
				window.location = "http://waalat.com/application/index.php?cardgenerationotpsuccess";
			}
			$.unblockUI();
		}
	});
};

function validate_cardtopuplogin()
{
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#cardtopuploginForm').serialize(),
		url:'index.php?cardtopuploginprocess',
		success: function(response){
			//alert(response);
			if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
				$.unblockUI();
				$('#cardtopup').html(html);
			}
			else
			{
				alert(response);
				$.unblockUI();
			}
		}
	});
};

function validate_impstransferlogin()
{
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#cardtopuploginForm').serialize(),
		url:'index.php?impstransferloginprocess',
		success: function(response){
			//alert(response);
			if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
				$.unblockUI();
				$('#cardtopup').html(html);
			}
			else
			{
				alert(response);
				$.unblockUI();
			}
		}
	});
};

function validate_addbankdetails()
{
	var token = $("#token").val();
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "GET",
		cache:false,
		//data:$('#cardtopuploginForm').serialize(),
		data: 'token='+token,
		url:'index.php?addbankdetails',
		success: function(response){
			//alert(response);
			if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
				$.unblockUI();
				$('#cardtopup').html(html);
			}
			else
			{
				alert(response);
				$.unblockUI();
			}
		}
	});
};

function validate_getbankdetails()
{
	var token = $("#token").val();
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		//data:$('#cardtopuploginForm').serialize(),
		data: 'token='+token,
		url:'index.php?getbankdetails',
		success: function(response){
			//alert(response);
			if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
				$.unblockUI();
				$('#cardtopup').html(html);
			}
			else
			{
				alert(response);
				$.unblockUI();
			}
		}
	});
};

function validate_impstransferprocess(num)
{
	var token = $("#token").val();
	var beneid = $("#beneid"+num).val();
	var amount = $("#amount"+num).val();
	
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		//data:$('#cardtopuploginForm').serialize(),
		data: 'token='+token+'&beneid='+beneid+'&amount='+amount,
		url:'index.php?impstransferprocess',
		success: function(response){
			//alert(response);
			if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
				$.unblockUI();
				$('#cardtopup').html(html);
			}
			else
			{
				alert(response);
				$.unblockUI();
			}
		}
	});
};


function validate_addbankdetailsprocess()
{
	var token = $("#token").val();
	var beneficiaryname = $("#beneficiaryname").val();
	var beneficiarymobilenumber = $("#beneficiarymobilenumber").val();
	var beneficiarybankname = $("#beneficiarybankname").val();
	var beneficiarybankbranchname = $("#beneficiarybankbranchname").val();
	var beneficiarybankcityname = $("#beneficiarybankcityname").val();
	var beneficiarybankstatename = $("#beneficiarybankstatename").val();
	var beneficiaryifsc = $("#beneficiaryifsc").val();
	var beneficiaryaccountnumber = $("#beneficiaryaccountnumber").val();
	$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
	$.ajax({
		type: "POST",
		cache:false,
		//data:$('#addbankdetailsForm').serialize(),
		data: 'token='+token+'&beneficiaryname='+beneficiaryname+'&beneficiarymobilenumber='+beneficiarymobilenumber+'&beneficiarybankname='+beneficiarybankname+'&beneficiarybankbranchname='+beneficiarybankbranchname+'&beneficiarybankcityname='+beneficiarybankcityname+'&beneficiarybankstatename='+beneficiarybankstatename+'&beneficiaryifsc='+beneficiaryifsc+'&beneficiaryaccountnumber='+beneficiaryaccountnumber,
		url:'index.php?addbankdetailsprocess',
		success: function(response){
			//alert(response);
			if(response.indexOf("Success") != -1)
			{
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
				$.unblockUI();
				$('#cardtopup').html(html);
			}
			else
			{
				alert(response);
				$.unblockUI();
			}
		}
	});
};



function confirmFunctionrefund()
{
	var x;
	var str = "Are you sure you want to refund";
	var r=confirm(str);
	if (r==true)
  	{
  		x="1";
  	}
	else
  	{
  		x="0";
  	}
	return x;
}

function confirmFunction(mobilenumber,amount)
{
	var x;
	var str = "Kindly Confirm!";
	var r=confirm(str+"\r\n\r\nNumber: "+mobilenumber+"\r\nAmount: "+amount+"\r\n");
	if (r==true)
  	{
  		x="1";
  	}
	else
  	{
  		x="0";
  	}
	return x;
}

function confirmFunction_dthselling(place,amount)
{
	var x;
	var str = "Kindly Confirm!";
	var r=confirm(str+"\r\n\r\nPlace: "+place+"\r\nAmount: "+amount+"\r\n");
	if (r==true)
  	{
  		x="1";
  	}
	else
  	{
  		x="0";
  	}
	return x;
}


function requestpayments()
{
    $.ajax({
		type: "POST",
		cache:false,
		data: $('#requestpaymentForm').serialize(),
		url:'index.php?requestpaymentprocess',
		success: function(response){
			alert(response);
		}
	});
}

function validate(type)
{
	var serviceprovider = $("#serviceprovider_"+type).val();
	var amount = $("#amount_"+type).val();
	switch(type)
	{
		case "mobileprovider":
		case "mobilepostpaidprovider":
		case "dthprovider":
		case "datacardprovider":
			var mobilenumber = $("#mobilenumber_"+type).val();
			var billingtype = $("#billingtype_"+type).val();
			if(mobilenumber == "")
			{
				if(type == "mobileprovider")
				{
					alert("Mobile Number Empty.");
				}
				else
				{
					alert("Customer ID/VC Number Empty.");
				}
				return false;
			}
			if(isNaN(mobilenumber)===true)
			{
				if(type == "mobileprovider")
				{
					alert("Number only in Mobile Number.");
				}
				else
				{
					alert("Number only in Customer ID/VC Number.");
				}
				return false;
			}
			if(mobilenumber.length != 10)
			{
				if(type == "mobilenumber")
				{
					alert("Mobile Number must be of 10 digit.");
					return false;
				}
			}
			if(serviceprovider == "" || serviceprovider == "Choose Service Provider")
			{
				alert("Select Service Provider.");
				return false;
			}
			if(!billingtype)
			{
				alert("Billing Type is Empty.");
				return false;
			}
			if(amount == "")
			{
				alert("Amount Field can't be Empty.");
				return false;
			}
			if(isNaN(amount)===true)
			{
				alert("Number only in Amount.");
				return false;
			}
			if(amount.length > 5)
			{
				alert("Must not more than 4 digit.");
				return false;
			}
			if(amount < 0)
			{
				alert("Valid amount plz.");
				return false;
			}
			break;
		case "dthproviders":
			var subscriberid = $("#mobilenumber_"+type).val();
			if(serviceprovider == "" || serviceprovider == "Choose Service Provider")
			{
				$(".serviceprovider_"+type).html("<p style='color:red'>Select Sevice Provider.</p>").fadeIn().fadeOut(5000);
				return false;
			}
			if(subscriberid == "")
			{
				$("#subscriberid_"+type).effect("pulsate",{times:3},100);
				$(".subscriberid_"+type).html("<p style='color:red'>Can't be Empty.</p>").fadeIn().fadeOut(5000);
				return false;
			}
			if(isNaN(subscriberid)===true)
			{
				$("#subscriberid_"+type).effect("pulsate",{times:3},100);
				$(".subscriberid_"+type).html("<p style='color:red'>Numbers Only.</p>").fadeIn().fadeOut(5000);
				return false;
			}
			if(amount == "")
			{
				$("#amount_"+type).effect("pulsate",{times:3},100);
				$(".amount_"+type).html("<p style='color:red'>Can't be Empty.</p>").fadeIn().fadeOut(5000);
				return false;
			}
			if(isNaN(amount)===true)
			{
				$("#amount_"+type).effect("pulsate",{times:3},100);
				$(".amount_"+type).html("<p style='color:red'>Numbers Only.</p>").fadeIn().fadeOut(5000);
				return false;
			}
			if(amount.length > 5)
			{
				$("#amount_"+type).effect("pulsate",{times:3},100);
				$(".amount_"+type).html("<p style='color:red'>Must be not more than Four Digits.</p>").fadeIn().fadeOut(5000);
				return false;
			}
			break;
	}
	var res = confirmFunction(mobilenumber,amount);
	if(res == 1)
	{
		$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
		$.ajax({
			type: "GET",
			cache:false,
			data:$('#'+type+'Form').serialize(),
			url:'index.php?dorecharge',
			success: function(response){
				if(response.indexOf("Error") != -1)
				{
					//$(this).hide(100);
					var temp = new Array();
					temp = response.split('@@');
					var html='';
					for(var i=1;i<temp.length;i++){
						if(temp[i]!='')
						{
							html+=temp[i];
						}
					}

					alert(html);
				}//
				if(response.indexOf("Success") != -1)
				{
					//$(this).hide(100);
					var temp = new Array();
					temp = response.split('@@');
					var html='';
					for(var i=1;i<temp.length;i++){
						if(temp[i]!='')
						{
							html+=temp[i];
						}
					}
					alert(html);

					<!--window.location = "http://www.google.com/";-->
				}//
				$.unblockUI();
				$('#'+type+'Form')[0].reset();
			}
		});
	}
};

function validate_dthselling(type)
{
	var serviceprovider = $("#serviceprovider_"+type).val();
	if(serviceprovider == "")
	{
		alert("Kindly select Provider");
		return false;
	}
	var amount = $("#amount_"+type).val();
	switch(type)
	{
		case "dthselling":
			var place = $("#place_"+type).val();
			var billingtype = $("#billingtype_"+type).val();
			if(place == "")
			{
				alert("Kindly Select Place.");
				return false;
			}
			if(!billingtype)
			{
				alert("Billing Type is Empty.");
				return false;
			}
			if(amount == "")
			{
				alert("Amount Field can't be Empty.");
				return false;
			}
			if(isNaN(amount)===true)
			{
				alert("Number only in Amount.");
				return false;
			}
			if(amount.length > 5)
			{
				alert("Must not more than 4 digit.");
				return false;
			}
			if(amount < 0)
			{
				alert("Valid amount plz.");
				return false;
			}
			break;
	}
	var res = confirmFunction_dthselling(place,amount);
	if(res == 1)
	{
		$.blockUI({ css: {
            		border: 'none',
            		padding: '15px',
            		backgroundColor: '#000',
            		'-webkit-border-radius': '10px',
            		'-moz-border-radius': '10px',
            		opacity: .5,
            		color: '#fff'
        	} });
		$.ajax({
			type: "GET",
			cache:false,
			data:$('#'+type+'Form').serialize(),
			url:'index.php?dorechargedthselling',
			success: function(response){
				if(response.indexOf("Error") != -1)
				{
					//$(this).hide(100);
					var temp = new Array();
					temp = response.split('@@');
					var html='';
					for(var i=1;i<temp.length;i++){
						if(temp[i]!='')
						{
							html+=temp[i];
						}
					}

					alert(html);
				}//
				if(response.indexOf("Success") != -1)
				{
					//$(this).hide(100);
					var temp = new Array();
					temp = response.split('@@');
					var html='';
					for(var i=1;i<temp.length;i++){
						if(temp[i]!='')
						{
							html+=temp[i];
						}
					}
					alert(html);

					<!--window.location = "http://www.google.com/";-->
				}//
				$.unblockUI();
				$('#'+type+'Form')[0].reset();
			}
		});
	}
};



function validate_register_staff()
{
	var type = $("#type").val();
	var first_name = $("#first_name").val();
	var last_name = $("#last_name").val();
	var reg_mobile = $("#reg_mobile").val();
	var email = $("#email").val();
	if(type == "")
	{
		alert("Kindly select User Type.");
		$("#type").focus();
		return false;
	}
	if(first_name == "")
	{
		alert("Kindly Enter First Name.");
		$("#first_name").focus();
		return false;
	}
	if(first_name.length > 50)
	{
		alert("First Name must not be more than 50 character.");
		$("#first_name").focus();
		return false;
	}
	chkSpecialChar(first_name,"First Name");
	if(last_name == "")
	{
		alert("Kindly Enter Last Name.");
		$("#last_name").focus();
		return false;
	}
	if(last_name.length > 50)
	{
		alert("Last Name must not be more than 50 character.");
		$("#last_name").focus();
		return false;
	}
	chkSpecialChar(last_name,"Last Name");
	if(reg_mobile == "")
	{
		alert("Kindly Enter Mobile Number.");
		$("#reg_mobile").focus();
		return false;
	}
	if(isNaN(reg_mobile)===true)
	{
		alert("Mobile Number field must contain Number only.");
		$("#reg_mobile").focus();
		return false;
	}
	if(reg_mobile.length != 10)
	{
		alert("Mobile Number must not be more than 10 character.");
		$("#reg_mobile").focus();
		return false;
	}

	if(!validateEmail(email) && email != '')
	{
		alert("Kindly Enter Valid Email Id.");
		$("#email").focus();
		return false;
	}
	$("#loading").ajaxStart(function () {
            $(this).show();
    });

    $("#loading").ajaxStop(function () {
           $(this).hide();
    });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#userForm').serialize(),
		url:'index.php?addstaffprocessing',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
			}//
			if(response.indexOf("Success") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
				$('#userForm')[0].reset();
				<!--window.location = "http://www.google.com/";-->
			}//
		}
	});
};

function validate_update()
{
	var email = $("#email").val();
	var token = $("#token").val();
	var parent_id = $("#parent_id").val();
	var password = $("#password").val();
	var username = $("#username").val();
	var uid = $("#uid").val();
	var mobile = $("#mobile").val();
    var executive = $("#executive_name").val();
    var pincode  = $("#pincode").val();
    var lockedbalance = $('#lockedbalance').val();
	//alert(token);
	if(!validateEmail(email))
	{
		alert("Kindly Enter Valid Email Id.");
		$("#email").focus();
		return false;
	}
	$("#loading").ajaxStart(function () {
            	$(this).show();
    	});

    	$("#loading").ajaxStop(function () {
           	$(this).hide();
    	});
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#edituserForm').serialize(),
		//data:'token='+token+'&parent_id='+parent_id+'&password='+password+'&username='+username+'&email='+email+'&uid='+uid+'&mobile='+mobile+'&executive_name='+executive+'&pincode='+pincode+'&lockedbalance='+lockedbalance,
		url:'index.php?edituserprocessing',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"<br>";
					}
				}
				alert(html);
			}//
			if(response.indexOf("Success") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
                TINY.box.hide();
                alert(html);
			}
		}
	});
};

/* Function for updating User Mobile Number */
function update_mobilenumber()
{
    var token = $("#token").val();
	var uid = $("#uid").val();
    if(!validNumber('updated_mobile_number','Invalid mobile number'))
        return false;

    var mobile_number = $("#updated_mobile_number").val();
    $("#loading").ajaxStart(function(){ $(this).show(); });
   	$("#loading").ajaxStop(function(){ $(this).hide(); });
	$.ajax({
		type: "POST",
		cache:false,
        data:'token='+token+'&uid='+uid+'&mobile='+mobile_number+'&update_mobile_number=1',
		url:'index.php?edituserprocessing',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
                var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='') {
						html+=temp[i];
					}
				}
				alert(html);
			}
			if(response.indexOf("Success") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i];
					}
				}
                /*$('#example_wrapper').dataTable({
					"aaSorting": [],
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "index.php?datalistchangemobilenumber&token="+token
				});*/
                alert(html);
                window.location.reload();
				//window.location = "http://www.google.com/";-->
			}
		}
	});
};


function validate_register()
{
	var type = $("#type").val();
	var first_name = $("#first_name").val();
	var last_name = $("#last_name").val();
	var reg_mobile = $("#reg_mobile").val();
	var email = $("#email").val();
	if(type == "")
	{
		alert("Kindly select User Type.");
		$("#type").focus();
		return false;
	}
	if(first_name == "")
	{
		alert("Kindly Enter Name.");
		$("#first_name").focus();
		return false;
	}
	if(first_name.length > 50)
	{
		alert("First Name must not be more than 50 character.");
		$("#first_name").focus();
		return false;
	}
	chkSpecialChar(first_name,"First Name");
	if(last_name == "")
	{
		alert("Kindly Enter Firm Name.");
		$("#last_name").focus();
		return false;
	}
	if(last_name.length > 50)
	{
		alert("Last Name must not be more than 50 character.");
		$("#last_name").focus();
		return false;
	}
	chkSpecialChar(last_name,"Last Name");
	if(reg_mobile == "")
	{
		alert("Kindly Enter Mobile Number.");
		$("#reg_mobile").focus();
		return false;
	}
	if(isNaN(reg_mobile)===true)
	{
		alert("Mobile Number field must contain Number only.");
		$("#reg_mobile").focus();
		return false;
	}
	if(reg_mobile.length != 10)
	{
		alert("Mobile Number must not be more than 10 character.");
		$("#reg_mobile").focus();
		return false;
	}

	if(!validateEmail(email) && email != '')
	{
		alert("Kindly Enter Valid Email Id.");
		$("#email").focus();
		return false;
	}
	$("#loading").ajaxStart(function () {
            $(this).show();
    });

    $("#loading").ajaxStop(function () {
           $(this).hide();
    });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#userForm').serialize(),
		url:'index.php?adduserprocessing',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
			}//
			if(response.indexOf("Success") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
				$('#userForm')[0].reset();
				<!--window.location = "http://www.google.com/";-->
			}//
		}
	});
};



function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
/* Function for Valid number checking */
function validNumber(field, msg)
{
	var patt1=/\s/g;
    var number = $("#"+field).val();
	var number_start = number.charAt(0);
	if((number_start =='7') || (number_start == '8') || (number_start=='9')) {
	    if(isNaN(number)===true) {
	    	alert("Mobile number field must contain numbers only.");
    		$("#"+field).focus();
		    return false;
	    }
		if(number.length < 10) {
			alert('Mobile number doesnt have 10 digits');
            $("#"+field).focus();
			return false;
		}
		else if((number.match(patt1)) || (number.length > 10)) {
  			alert("Invalid mobilenumber. Enter valid mobilenumber");
            $("#"+field).focus();
			return false;
	  	}
		return true;
	}
	else {
		alert("Mobile number must start with 9 or 8 or 7");
		return false;
	}
	return true;
}

/* Function for Reverrequest Validation */
function validate_topup_reversal()
{
	var operator = $("#operator").val();
	var distributor_code = $("#distributor_code").val();
	var distributor_name = $("#distributor_name").val();
	var distributor_number = $("#distributor_number").val();
	var distributor_email = $("#distributor_email").val();
    var smartcard_number =  $("#smartcard_number").val();
    var transaction_amount =  $("#transaction_amount").val();
    var transaction_date =  $("#transaction_date").val();
    var transaction_number =  $("#transaction_number").val();

	if(operator == "")
	{
		alert("Select operator");
		$("#operator").focus();
		return false;
	}
	if(distributor_code == "")
	{
		alert("Enter distributor code");
		$("#distributor_code").focus();
		return false;
	}
    if(distributor_name == "")
	{
		alert("Enter distributor name");
		$("#distributor_name").focus();
		return false;
	}
    if(!validateEmail(distributor_email) && distributor_email != '')
	{
		alert("Enter valid distributor email.");
		$("#distributor_email").focus();
		return false;
	}
    if(distributor_number == "")
	{
		alert("Enter distributor mobile number.");
		$("#distributor_number").focus();
		return false;
	}
	if(isNaN(distributor_number)===true)
	{
		alert("Distributor mobile number field must contain number only.");
		$("#distributor_number").focus();
		return false;
	}
	if(distributor_number.length != 10)
	{
		alert("Invlaid mobile number. Enter valid mobile number");
		$("#distributor_number").focus();
		return false;
	}
    if(smartcard_number == "")
	{
		alert("Enter smartcard number");
		$("#smartcard_number").focus();
		return false;
	}
    if(transaction_amount == "")
	{
		alert("Enter transaction amount");
		$("#transaction_amount").focus();
		return false;
	}
    if(transaction_date == "")
	{
		alert("Enter transaction date");
		$("#transaction_date").focus();
		return false;
	}
    if(transaction_number == "")
	{
		alert("Enter transaction number");
		$("#transaction_number").focus();
		return false;
	}
    $("#loading").ajaxStart(function(){ $(this).show(); });
    $("#loading").ajaxStop(function(){ $(this).hide();  });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#topup_reversal').serialize(),
		url:'index.php?addreversal',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
			}//
			if(response.indexOf("Success") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
				$('#topup_reversal')[0].reset();
				<!--window.location = "http://www.google.com/";-->
			}//
		}
	});
};

/* Function for Amount Reversal Validation */
function validate_amount_reversal()
{
    var distributor_code = $("#amount_distributor_code").val();
	var distributor_name = $("#amount_distributor_name").val();
	var distributor_number = $("#amount_distributor_number").val();
	var distributor_email = $("#amount_distributor_email").val();
    var transaction_amount =  $("#amount_transaction_amount").val();
    var transaction_date =  $("#amount_transaction_date").val();
    var reversal_remarks =  $("#amount_reversal_remarks").val();

    if(distributor_code == "")
	{
		alert("Enter distributor code");
		$("#amount_distributor_code").focus();
		return false;
	}
    if(distributor_name == "")
	{
		alert("Enter distributor name");
		$("#amount_distributor_name").focus();
		return false;
	}
    if(!validateEmail(distributor_email) && distributor_email != '')
	{
		alert("Enter valid distributor email.");
		$("#amount_distributor_email").focus();
		return false;
	}
    if(distributor_number == "")
	{
		alert("Enter distributor mobile number.");
		$("#amount_distributor_number").focus();
		return false;
	}
	if(isNaN(distributor_number)===true)
	{
		alert("Distributor mobile number field must contain number only.");
		$("#amount_distributor_number").focus();
		return false;
	}
	if(distributor_number.length != 10)
	{
		alert("Invlaid mobile number. Enter valid mobile number");
		$("#amount_distributor_number").focus();
		return false;
	}
    if(transaction_amount == "")
	{
		alert("Enter transaction amount");
		$("#amount_transaction_amount").focus();
		return false;
	}
    if(transaction_date == "")
	{
		alert("Enter transaction date");
		$("#amount_transaction_date").focus();
		return false;
	}
    if(transaction_number == "")
	{
		alert("Enter transaction number");
		$("#amount_transaction_number").focus();
		return false;
	}
    $("#amount_loading").ajaxStart(function(){ $(this).show(); });
    $("#amount_loading").ajaxStop(function(){ $(this).hide();  });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('#amount_reversal_request').serialize(),
		url:'index.php?addreversal',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
			}//
			if(response.indexOf("Success") != -1)
			{
				//$(this).hide(100);
				var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
				$('#amount_reversal_request')[0].reset();
				<!--window.location = "http://www.google.com/";-->
			}//
		}
	});
};

/* Function for Recharge Limitations Validation */
function rechargeLimitations()
{
	var prepaid_limit = $("#prepaid_limit").val();
    var postpaid_limit = $("#postpaid_limit").val();
    var dth_limit = $("#dth_limit").val();

    var retailer_limit = $("#retailer_limit").val();
    var distributor_limit = $("#distributor_limit").val();
    if(isNaN(prepaid_limit)===true)
	{
		alert("Prepaid limit to be numeric");
		$("#prepaid_limit").focus();
		return false;
	}
    if(isNaN(postpaid_limit)===true)
	{
		alert("Postpaid limit to be numeric");
		$("#postpaid_limit").focus();
		return false;
	}
    if(isNaN(dth_limit)===true)
	{
		alert("DTH limit to be numeric");
		$("#dth_limit").focus();
		return false;
	}

    if(isNaN(retailer_limit)===true)
	{
		alert("Retailer recharge limit to be numeric");
		$("#dth_limit").focus();
		return false;
	}

    if(isNaN(distributor_limit)===true)
	{
		alert("Distributor fund transfer limit to be numeric");
		$("#dth_limit").focus();
		return false;
	}

    $("#loading").ajaxStart(function(){ $(this).show(); });
    $("#loading").ajaxStop(function(){ $(this).hide();  });
	$.ajax({
		type: "POST",
		cache:false,
		data:$('form#recharge_limit').serialize(),
		url:'index.php?rechargelimit_processing',
		success: function(response){
			if(response.indexOf("Error") != -1)
			{
                var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
			}
			if(response.indexOf("Success") != -1)
			{
                var temp = new Array();
				temp = response.split('@@');
				var html='';
				for(var i=1;i<temp.length;i++){
					if(temp[i]!='')
					{
						html+=temp[i]+"";
					}
				}
				alert(html);
                TINY.box.hide();
			}
		}
	});
};

function security_submit()
{
      if($.trim($("#security_key").val())=='')
      {
            alert("Enter security key");
            return false;
      }
      return true;
}
