
/////////// Sign in check ////////////

var Nom=document.getElementById('Full name');
var mail=document.getElementById('E-mail');
var password=document.getElementById('Mot de passe');
var password2=document.getElementById('password2');
var myform=document.getElementById('form');
myform.addEventListener('submit',function(e){
    if (Nom.value==""){ 
        e.preventDefault();
        alert('le champ est obligatoire.');
        Nom.style.border='2px solid red';
    }
    if (mail.value==""){ 
        e.preventDefault();
        alert('le champ est obligatoire.');
        mail.style.border='2px solid red';
    }
    if (password.value==""){ 
        e.preventDefault();
            alert('le champ est obligatoire.');
            password.style.border='2px solid red';
 
    }   
    if (password2.value==""){ 
        e.preventDefault();
            alert('le champ est obligatoire.');
            password2.style.border='2px solid red'; 
    }
    if (password.value.length<6){ 
        e.preventDefault();
        alert('Votre mot de passe est invalide. Il doit contenir au moins 6 caractères.');
        password.style.border='2px solid red';
    }
     if (password.value!=password2.value){ 
    e.preventDefault();
    alert('le mdp incorect');
    password2.style.border='2px solid red'; 
    }
})