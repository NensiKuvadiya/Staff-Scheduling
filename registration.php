<html lang="en">
<head>
<title>Registration</title>

   <style type="text/css">
        body {
            font-family: Oswald, sans-serif;
            background-image: url("css/image/background.png");;
            background-size: cover;
            background-repeat: no-repeat;
            font-size: 20px;
}
.heading{
        color: rgb(75, 7, 147);
      } 
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            
        }
        .btn {
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 20px;
            border: 2px solid rgb(75, 7, 147);

        }
        .btn:hover{
            color: white;
            background-color: rgb(75, 7, 147);
        }

        
        input[type="text"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 20px;
        }
        
        
    </style>
    
</head>
<body>
<h2 align="center" class="heading">Registration form</h2>
<form name="user_form" >
<label >Select your role:</label>
            <select id="s1">
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
            </select><br><br>
            <button type="Submit" onclick="return submit1()" class="btn">Submit</button>

     </form>
     <script>
    
function submit1(){
    var role=document.getElementById('s1').value;
    switch(role){
            case'student':
            document.user_form.action = "registrationStudent.php";
            
            break;
            case'faculty':
            document.user_form.action = "registrationFaculty.php";
           
            break;
        }
      
}


    </script>

</body>
</html>
