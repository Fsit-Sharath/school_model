
        function validateForm()//submit form after catcha enter
	        { 
	            var email=document.getElementById("email").value;
                var cptch=document.getElementById("logincpt").value;
                var pwd=document.getElementById("pwd").value;

                if(email=='' && pwd=='')
                     {
                        document.getElementById("cptMsg").style.color="red";
                         document.getElementById("cptMsg").innerHTML="please fill form";
                          return false;
                      }
                         if(cptch=='')
                           {
                               document.getElementById("cptMsg").style.color="red";
                               document.getElementById("cptMsg").innerHTML="please fill captch";
                               return false;
                            }
                
				}
						var code;

					    window.addEventListener("load",function(){
					    code=Math.random().toString(36).substring(7);
					    document.getElementById("loginctph").innerHTML=code;
					    })
                             
                function validate()
                    {
                        var captch=document.getElementById("captch").value;

                        if(code==captch)
                          {
                             document.getElementById("cptMsg").innerHTML="";
                          }
                         else{
                             document.getElementById("cptMsg").innerHTML="please fill captch correctly";
                             }
                    }
							


