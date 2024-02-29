//signup
document.getElementById('passView').onclick = ()=>{
    if(document.getElementById('passView').getAttribute('class') == 'fa-solid fa-eye'){
        document.getElementById('passView').setAttribute('class','fa-solid fa-eye-slash')
        document.getElementById('password').setAttribute('type','text')
    }
    else{
        document.getElementById('passView').setAttribute('class','fa-solid fa-eye')
        document.getElementById('password').setAttribute('type','password')
    }
}
document.getElementById('rePassView').onclick = ()=>{
    if(document.getElementById('rePassView').getAttribute('class') == 'fa-solid fa-eye'){
        document.getElementById('rePassView').setAttribute('class','fa-solid fa-eye-slash')
        document.getElementById('rePassword').setAttribute('type','text')
    }
    else{
        document.getElementById('rePassView').setAttribute('class','fa-solid fa-eye')
        document.getElementById('rePassword').setAttribute('type','password')
    }
}

document.getElementById('password').onkeyup = ()=>{
    if(!document.getElementById('password').value.match(/[A-Z]/g)) {  
        document.getElementById('signupMsg').innerText = 'Password contain atleast one uppercase letter';
        document.getElementById('password').style.borderColor = 'red';
    }
    else if(!document.getElementById('password').value.match(/[a-z]/g)) {  
        document.getElementById('signupMsg').innerText = 'Password contain atleast one lowercase letter';
        document.getElementById('password').style.borderColor = 'red';
    }
    else if(!document.getElementById('password').value.match(/[0-9]/g)) {  
        document.getElementById('signupMsg').innerText = 'Password contain atleast one number';
        document.getElementById('password').style.borderColor = 'red';
    }
    else if(document.getElementById('password').value.length < 8) {  
        document.getElementById('signupMsg').innerText = 'Password contain atleast 8 characters';
        document.getElementById('password').style.borderColor = 'red';
    }
    else{
        document.getElementById('signupMsg').innerText = '';
        document.getElementById('password').style.borderColor = '';
    }
    
}

document.getElementById('rePassword').onkeyup = ()=>{
    if(document.getElementById('password').value != document.getElementById('rePassword').value){
        document.getElementById('signupMsg').innerText = 'Password should be same';
        document.getElementById('rePassword').style.borderColor = 'red';
    }
    else{
        document.getElementById('signupMsg').innerText = '';
        document.getElementById('rePassword').style.borderColor = '';
    }
}



document.getElementById('signupBtn').addEventListener('click',()=>{
    if(document.getElementById('name').value == ''){
        document.getElementById('signupMsg').innerText = 'Please enter your Full Name';
        document.getElementById('name').style.borderColor = 'red';
        document.getElementById('name').onchange = ()=>{
            document.getElementById('name').style.borderColor = '';
            document.getElementById('signupMsg').innerText = '';
        }
    }
    else if(document.getElementById('email').value == ''){
        document.getElementById('signupMsg').innerText = 'Please enter a valid Email Address';
        document.getElementById('email').style.borderColor = 'red';
        document.getElementById('email').onchange = ()=>{
            document.getElementById('email').style.borderColor = '';
            document.getElementById('signupMsg').innerText = '';
        }
    }
    else if(document.getElementById('phone').value == ''){
        document.getElementById('signupMsg').innerText = 'Please enter a valid Phone Number';
        document.getElementById('phone').style.borderColor = 'red';
        document.getElementById('phone').onchange = ()=>{
            document.getElementById('phone').style.borderColor = '';
            document.getElementById('signupMsg').innerText = '';
        }
    }
    else if(document.getElementById('password').value == ''){
        document.getElementById('signupMsg').innerText = 'Please enter a Password';
        document.getElementById('password').style.borderColor = 'red';
        document.getElementById('password').onchange = ()=>{
            document.getElementById('password').style.borderColor = '';
        }
        document.getElementById('password').onkeyup = ()=>{
            if(!document.getElementById('password').value.match(/[A-Z]/g)) {  
                document.getElementById('signupMsg').innerText = 'Password contain atleast one uppercase letter';
                document.getElementById('password').style.borderColor = 'red';
            }
            else if(!document.getElementById('password').value.match(/[a-z]/g)) {  
                document.getElementById('signupMsg').innerText = 'Password contain atleast one lowercase letter';
                document.getElementById('password').style.borderColor = 'red';
            }
            else if(!document.getElementById('password').value.match(/[0-9]/g)) {  
                document.getElementById('signupMsg').innerText = 'Password contain atleast one number';
                document.getElementById('password').style.borderColor = 'red';
            }
            else if(document.getElementById('password').value.length < 8) {  
                document.getElementById('signupMsg').innerText = 'Password contain atleast 8 characters';
                document.getElementById('password').style.borderColor = 'red';
            }
            else{
                document.getElementById('signupMsg').innerText = '';
                document.getElementById('password').style.borderColor = '';
            }
            
        }
    }
    else if(document.getElementById('rePassword').value == ''){
        document.getElementById('signupMsg').innerText = 'Re-enter your password';
        document.getElementById('rePassword').style.borderColor = 'red';
        document.getElementById('rePassword').onkeyup = ()=>{
            if(document.getElementById('password').value != document.getElementById('rePassword').value){
                document.getElementById('signupMsg').innerText = 'Password should be same';
                document.getElementById('rePassword').style.borderColor = 'red';
            }
            else{
                document.getElementById('signupMsg').innerText = '';
                document.getElementById('rePassword').style.borderColor = '';
            }
        }
    }
    else{
        $.ajax({
            url:"signup.php",
            type:"POST",
            data:{"name":document.getElementById('name').value,
                "email":document.getElementById('email').value,
                "phone":document.getElementById('phone').value,
                "password":document.getElementById('password').value},
            success:function(res){
                if(res == "Email already exists, please login"){
                    document.getElementById('signupMsg').innerText = res
                }
                if(res == "New record created successfully"){
                    // document.getElementById('signupMsg').innerText = ''
                    window.location.href = '/';
                }
            }
        })
    }    
})


//login
document.getElementById('loginPassView').onclick = ()=>{
    if(document.getElementById('loginPassView').getAttribute('class') == 'fa-solid fa-eye'){
        document.getElementById('loginPassView').setAttribute('class','fa-solid fa-eye-slash')
        document.getElementById('loginPassword').setAttribute('type','text')
    }
    else{
        document.getElementById('passView').setAttribute('class','fa-solid fa-eye')
        document.getElementById('password').setAttribute('type','password')
    }
}

document.getElementById('loginBtn').addEventListener('click',()=>{
    $.ajax({
        url:"login.php",
        type:"POST",
        data:{"email":document.getElementById('loginEmail').value,
            "password":document.getElementById('loginPassword').value},
        success:function(res){
            if(res == "Email does not exists, please Signup!"){
                document.getElementById('loginMsg').innerText = res
            }
            else if(res == "Incorrect Password!"){
                document.getElementById('loginMsg').innerText = res
            }
            else{
                window.location.href = '/';
            }
        }
    })
})


//logout
document.getElementById('navLogoutBtn').addEventListener('click',()=>{
    $.ajax({
        url:"logout.php",
        type:"GET",
        success:function(res){
            window.location.href = '/'
            document.getElementById('navLogoutBtn').style.display = 'none';
            document.getElementById('navLoginBtn').style.display = '';
            document.getElementById('navSignupBtn').style.display = '';
        }
    })
})
