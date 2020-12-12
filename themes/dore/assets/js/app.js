
window.addEventListener ('load', async e => {
	// Register Servie-worker
	if ('serviceWorker' in navigator) {
		navigator.serviceWorker.register(`${appPath}sw.js`)
		.then(function(swReg) {
			swRegistration = swReg;
			//initializeUI();
		})
		.catch(function(error) {
			console.error('Service Worker Error', error);
		});
	}
});


var submitFormSelectors = document.getElementsByClassName ('validate-form');
var i;
for (i = 0; i < submitFormSelectors.length; i++) {
	const submitFormSelector = submitFormSelectors[i];
	if (submitFormSelector) {	
		submitFormSelector.addEventListener ('submit', e => {
			e.preventDefault ();
			const formURL = submitFormSelector.getAttribute ('action');
			var formData = new FormData(submitFormSelector);
			toastr.clear ();
			toastr.info ('Please wait...');
			fetch (formURL, { 
				method : 'POST',
				body: formData,
			}).then (function (response) {
				return response.json ();
			}).then(function(result) {
				console.log (result);
				toastr.clear ();
				if (result.status == true) {
					toastr.success (result.message, '', {timeOut:1000});
					if (result.redirect != '') {
						document.location = result.redirect;
					}
				} else {
					var message = result.error.replace('/[\n\r]/g', '');
					toastr.error (message, '', {timeOut:2000});
				}
			});
		});
	}
}


/* JS Confirmation dialog */
function show_confirm (msg, url) {
	var k = confirm (msg);	
	if (k) {
		//toastr.success ('Action completed successfully');
		document.location = url;
	} 
}

function show_confirm_ajax (msg, url, redirect) {
	var k = confirm (msg);	
	if (k) {
		fetch (url, { 
			method : 'POST',
		}).then (function (response) {
			toastr.info ('Please wait...');
			return response.json ();
		}).then(function(result) {
			if (result.status == true) {
				toastr.success (result.message);
				document.location = redirect;
			} else {
				var message = result.error.replace('/[\n\r]/g', '');
				toastr.error (message);
			}
		});
	}
}



/*----==== Logout User ====----*/
function logout_user () {
	// Logout URL
	const logoutURL = appPath + logoutPath;

	// Clear Local Storage
	if (typeof(Storage) !== "undefined") {
		localStorage.clear ();
	} else {
		setCookie ('user_token', '', '-1');
	}

	// Clear Server Session
	fetch (logoutURL, { 
		method : 'POST',
	}).then (function (response) {
		return response.json ();
	}).then (function(result) {
		document.location = result.redirect;
	});
}


function update_session (user_token) {
	const updateURL = appPath + updatePath + '/' + user_token;
	fetch (updateURL, { 
		method : 'POST',
	}).then (function (response) {
		return response.json ();
	}).then (function(result) {
		document.location = result.redirect;
	});
}	

/*
 * Interactive App install button
*/
let deferredPrompt;
window.addEventListener('beforeinstallprompt', event => {

	// Prevent Chrome 67 and earlier from automatically showing the prompt
	event.preventDefault();

	// Stash the event so it can be triggered later.
	deferredPrompt = event;

	// Update UI notify the user they can add to home screen
	const installBannerSelector = document.querySelector('#installBanner');
	if (installBannerSelector) {
		installBannerSelector.style.visibility = 'visible';
		// Attach the install prompt to a user gesture
		document.querySelector('#installBtn').addEventListener('click', event => {

			// Show the prompt
			deferredPrompt.prompt();

			// Wait for the user to respond to the prompt
			deferredPrompt.userChoice
			  .then((choiceResult) => {
			    if (choiceResult.outcome === 'accepted') {
					// Update UI notify the user they can add to home screen
					document.querySelector('#installBanner').style.visibility = 'hidden';
			    } else {
			      console.log('User dismissed the A2HS prompt');
			    }
			    deferredPrompt = null;
			});
		});
	}



});

// Check if app was successfully installed
window.addEventListener('appinstalled', (evt) => {
	app.logEvent ('a2hs', 'installed');
	document.querySelector('#installBanner').style.visibility = 'hidden';
	//document.querySelector('#installBanner').style.display = 'none';
	$('#installBanner').hide ();
});


/* ===== Password  ===== */
$(document).ready(function() {
	$('.custom-file-input').on('change',(e) => {
        var thisElement = $(e.target);
        var files = thisElement.prop('files');
        var file = files[0];
        var fileName = file.name;
        thisElement.next('.custom-file-label').text(fileName);
    });
    $('#password').on('keyup',function(){		
        checkStrength(this.value);			
		matchPassword($("#conf_password").val());	 
	});    
	$('#conf_password').on('keyup',function(){		
			matchPassword(this.value);	
	});
	//If confirm_password didn't match.
	function matchPassword(conf_password){
		if (conf_password === $("#password").val() && ($("#conf_password").val().length !=0)) {            
			$('#re_pass').removeClass();            
			$('#re_pass').addClass('fa fa-check text-success');
		}
		else{
			$('#re_pass').removeClass();            
			$('#re_pass').addClass('fa fa-exclamation-triangle  text-danger');
		}	
	}
    function checkStrength(password){
        var strength = 0;
        //If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
             strength += 1 ;
			 $('#letter').removeClass();
             $('#letter').addClass('fa fa-check text-success');
        }
        else{
            $('#letter').removeClass();
			$('#letter').addClass('fa fa-exclamation-triangle  text-danger');
        }	
        //If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)){
            strength += 1;
			$('#number').removeClass();
            $('#number').addClass('fa fa-check text-success'); 
        } else{
            $('#number').removeClass();            
			$('#number').addClass('fa fa-exclamation-triangle  text-danger');
        } 
        //If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
            strength += 1;
			$('#spcl_char').removeClass();            
            $('#spcl_char').addClass('fa fa-check text-success');
        }
        else{
            $('#spcl_char').removeClass();            
			$('#spcl_char').addClass('fa fa-exclamation-triangle  text-danger');
        }
        if (password.length > 7){
         strength += 1;
		 $('#length').removeClass();            
         $('#length').addClass('fa fa-check text-success');
        }
        else{
            $('#length').removeClass();            
			$('#length').addClass('fa fa-exclamation-triangle  text-danger');
        }
       // If value is less than 2
        if (strength < 2 )
		{
            $('#password-strength').removeClass();
            $('#password-strength').addClass('progress-bar bg-danger');            
            $('#password-strength').css('width', '30%');
            $('#password-strength').html('Very Weak');
            $("input[type=submit]").attr("disabled",true);
        }
        else if (strength == 2 )
        {
            $('#password-strength').removeClass();
            $('#password-strength').addClass('progress-bar bg-warning');                                    
            $('#password-strength').css('width', '60%');
            $('#password-strength').html('Week');
			$("input[type=submit]").attr("disabled",true);
        }
        else if (strength == 4)
        {
            $('#password-strength').removeClass();
            $('#password-strength').addClass('progress-bar bg-success');
            $('#password-strength').css('width', '100%');
            $('#password-strength').html('Strong');
            $("input[type=submit]").attr("disabled",false);            
        }
    }	
});
/*
 * Cookie Functions
 *
 * @setCookie Create a new cookie, Change or Delete cookie
 * @getCookie Get the value of a cookie
 * @checkCookie To check if a cookie is set
 *
 */
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie(cname) {
  var name = getCookie(cname);
  if (name != "") {
   return true;
  } else {
   return false;
  }
}

function copy_text (selector) {
	var copySelector = document.getElementById (selector);
	copySelector.select();
	copySelector.setSelectionRange(0, 99999)
	document.execCommand("copy");
	toastr.success('Copied', '', {timeOut: 1000})
}