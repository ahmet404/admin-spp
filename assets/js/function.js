function show(){
						var x = document.getElementById("pass").type;
						if(x == "password"){
										document.getElementById("pass").type = "text";
										document.getElementById("change").innerHTML = "<i class='fa fa-eye'></i>";
						}else{
										document.getElementById("pass").type = "password";
										document.getElementById("change").innerHTML = "<i class='fa fa-eye-slash'></i>";
						}
		}
	$("#user").focus(function(){
					$('.user-input').addClass('border');
	});
	$("#user").blur(function(){
					$('.user-input').removeClass('border');
	});
	$("#pass").focus(function(){
					$('.pass-input').addClass('border');
	});
	$("#pass").blur(function(){
					$('.pass-input').removeClass('border');
	});

function dropDown(){
						document.getElementById('drop-content').classList.toggle('out-visible');
		}
function dropSide(){
						document.getElementById('dashboard').classList.toggle('side');
						document.getElementById('sidebar').classList.toggle('visible');
		}

