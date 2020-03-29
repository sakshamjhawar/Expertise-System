<html>
	<head>
		<title>Change Password</title>
		<script type="text/javascript">
/* 		function check(){
				alert(decodeURIComponent(window.location));
				alert(decodeURI(window.location));
				alert(window.location.search.split('email=')[1]);
				alert(decodeURIComponent(window.location.search.split('email=')[1]));
				
			} */

		function changePassword(){
			//alert("hi");
			var mail = decodeURIComponent(window.location.search.split('email=')[1]);
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
			//var mailformat = /^\w+([\.-]?\w+)*@rvce.edu.in$/;
			if(!mail.match(mailformat)) {  
				alert("Some problem occured. Please follow the link again from your mail."); 
				return false;  
			}  
			else {
				
				
				var newPassword = document.getElementById("new_password").value;
				var confirmNewPassword = document.getElementById("confirm_new_password").value;
				

				if(newPassword == confirmNewPassword){

					
					if(window.XMLHttpRequest) {
						
						xmlHttp = new XMLHttpRequest();
					}
					else {
						xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlHttp.onreadystatechange = function() {
						//alert(xmlHttp.readyState + ' ' + xmlHttp.status);
			            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			            	
				            alert(xmlHttp.responseText);
			            }
			            //alert('gupta')
			        }
			       // alert("resetPasswordBack.php?email="+mail+"&password="+newPassword);
			        xmlHttp.open("GET","resetPasswordBack.php?email="+mail+"&password="+newPassword);
			        xmlHttp.send(); 
				}
				else{
					alert("Passwords do not match");
				}
					
					
			}
		} 
		</script>
	</head>
	<body>
		<form> 
			<label>New Password</label>
			<input type = "password" id = "new_password" name = "new_password" />
			<br/>
			<label>Confirm New Password</label>
			<input type = "password" id = "confirm_new_password" name = "confirm_new_password" />
			<br/>
			<button type="button" onclick="changePassword()">Change Password</button>
		 </form> 
	</body>
</html>