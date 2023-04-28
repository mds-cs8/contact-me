let name = document.getElementById('name');
let email = document.getElementById('email');
let num = document.getElementById('phone');
let msg = document.getElementById('message');



name.addEventListener('input',()=>{
    if (name.value.length < 4){
        document.getElementById("name-error").style.display = "block";
    }
    else {
        document.getElementById("name-error").style.display = "none";

    }
})
email.addEventListener('blur' ,()=>{
    if (email.value.length < 1 ){
        document.getElementById("email-error").style.display = "block";

    }
})
num.addEventListener('input' , ()=>{
    var regex = new RegExp(/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/);
    if (!regex.test(num.value)){
        document.getElementById("phone-error").style.display = "block";

    }
    else {
        document.getElementById("phone-error").style.display = "none";

    }

})
msg.addEventListener('input',()=>{
    if (msg.value.length <10){
        document.getElementById("msg-error").style.display = "block";

    }
    else{
        document.getElementById("msg-error").style.display = "none";

    }
})


