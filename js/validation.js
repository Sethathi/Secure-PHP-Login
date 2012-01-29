
            $(document).ready(function() {

                 
     
                $.validator.addMethod("uname",function(value,element){
                    return this.optional(element) || /^[a-zA-Z0-9._-]{3,16}$/i.test(value);  
                },"Username are 3-15 characters");


                $.validator.addMethod("pwd",function(value,element){
                    return this.optional(element) || /^[A-Za-z0-9!@#$%^&*()_]{6,16}$/i.test(value);  
                },"Passwords are 6-16 characters");


    
                // Validate signup form
                $("#form").validate({
                    rules: {
                         
                        uname: "required username",
                        pwd: "required password",

                    },
				

                });

            });
