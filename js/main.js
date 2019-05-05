$("#login-submit").click(function() {
  //e.preventDefault();
  login = $('input[id=authLogin]').val();
  pass = $('input[id=authPass]').val();

  $.post("//"+document.domain+"/auth.php", { 'login': login, 'pass': pass}, function(json){
		data = JSON.parse(json);
		if(data.err == 'ok'){
			document.location.href="/profile";
		}else{
			$("#loginMes").html("<font color=red>"+data.mes+"</font>");
		}
	});
});

$("#reg-submit").click(function() {
  //e.preventDefault();
  login = $('input[id=regLogin]').val();
  mail = $('input[id=regMail]').val();
  pass = $('input[id=regPass]').val();
  $.post("//"+document.domain+"/reg.php", { 'login': login, 'pass': pass, 'mail': mail}, function(json){
		data = JSON.parse(json);
		if(data.err == 'ok'){
			document.location.href="/profile";
		}else{
			$("#regMes").html("<font color=red>"+data.mes+"</font>");
		}
	});
});

$("#exit").click(function() {
  //e.preventDefault();
  $.post("//"+document.domain+"/logout.php", {}, function(){
		document.location.href="/";
	});
});
