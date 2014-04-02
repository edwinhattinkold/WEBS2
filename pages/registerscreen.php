<div class="container">
	<!--<form id="registerform" action="index.php?page=register" method="post">  
		Username: <input name="username" type="text" value=""/><br/>  
		Password: <input name="pass" type="password" value=""/><br/>
		Retype password: <input name="repass" type="password" value=""/><br/>
		First name: <input name="first_name" type="text" value=""/><br/>  
		Surname: <input name="surname" type="text" value=""/><br/>  
		Email: <input name="email" type="text" value=""/><br/>  
		Adress: <input name="adress" type="text" value=""/><br/>  
		Zipcode: <input name="zipcode" type="text" value=""/><br/>  
		City: <input name="city" type="text" value=""/><br/>  
		<input type="submit" value="Register"/>  
	</form>  -->
	
	<script>
		$("#signupForm").validate({
			rules:
			{
				first_name: "required",
				surname: "required",
				username: "required",
				pass: {
					required: true,
					minlength: 5
				},
				repass:
				{
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email:
				{
					required: true,
					email: true
				}
			},
			messages:
			{
				first_name: "Please enter your firstname",
				surname: "Please enter your lastname",
				username:
				{
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				pass:
				{
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				repass:
				{
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address"
			}
		});
	</script>
	
	<form id="registerform" method="post" action="index.php?page=register">
		<fieldset>
			Name (required): <input id="username" name="username" type="text" required /><br/> 
			Password (required): <input id="pass" name="pass" type="password" required /><br/> 
			Retype password: <input id="repass" name="repass" type="password" required /><br/> 
			First name (required): <input id="first_name" name="first_name" type="text" required /><br/> 
			Surname (required): <input id="surname" name="surname" type="text" required /><br/> 
			E-Mail (required): <input id="email" name="email" type="email" required /><br/> 
			Adress (optional): <input id="adress" name="adress" type="text" /><br/> 
			Zipcode (optional): <input id="zipcode" name="zipcode" type="text" /><br/> 
			City (optional): <input id="city" name="city" type="text" /><br/> 
			<input class="submit" type="submit" value="Register"/>
		</fieldset>
	</form>
</div>