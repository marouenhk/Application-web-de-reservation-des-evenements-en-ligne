
// formulaire check

var Nom=document.getElementById('Full name');
 var adresse=document.getElementById('adresse');
 var mail=document.getElementById('E-mail');
 var Téléphone=document.getElementById('Phone');
 var myform=document.getElementById('form');
 var number=document.getElementById('number')
 myform.addEventListener('submit',function(e){
    if (Nom.value==""){ 
        e.preventDefault();
        alert('Veuiller saisir votre nom');
        Nom.style.border='2px solid red';
    }else{
        Nom.style.border='2px solid green'
    }
    if (mail.value==""){ 
        e.preventDefault();
        alert('Veuiller saisir votre E-MAIL');
        mail.style.border='2px solid red';
    }else{
        mail.style.border='2px solid green'
    }
    if (adresse.value==""){ 
        e.preventDefault();
            alert('Veuiller saisir votre Adresse');
            adresse.style.border='2px solid red';
          
    }else{
        adresse.style.border='2px solid green'
    }
    if (Téléphone.value==""){ 
            e.preventDefault();
                alert('Veuiller saisir votre Télephone');
                Téléphone.style.border='2px solid red';
    } else if(Téléphone.value.length==8){
        Téléphone.style.border='2px solid green'
    }else if(Téléphone.value.length<8){
        e.preventDefault();
                alert('Veuiller saisir votre Télephone');
                Téléphone.style.border='2px solid red';
    } 

    //////// Resultat check /////////

    var numberOfTickets = parseInt(number.value); //convertir string en int
    if(!isNaN(numberOfTickets)) 
    {       
        var total = numberOfTickets * 35;
        alert ( 'Total Price: ' + total +' DT');
    }

})


//////////  button rest ///////////

function testConfirmDialog() {
    var result = confirm("Voulez-vous Réinitialiser ?");
    return result; // Renvoie true si l'utilisateur clique sur OK, sinon false
}




///////////// dark mode ////////////////
const content = document.querySelector('body');
const darkphoto = document.getElementById('dark');

darkphoto.addEventListener('click', function(e) {
    if (content.style.backgroundColor === 'black') {
        // Mode clair
        content.style.backgroundColor = 'white'; // Fond blanc
        content.style.color = 'black'; // Texte noir
        darkphoto.src = "images/moon.png"; 
    } else {
        // Mode Dark
        content.style.backgroundColor = 'black'; // Fond noir
        content.style.color = 'white'; // Texte blanc
        darkphoto.src = "images/sun.png"; 
    }
});



////////////// shadow button home in login ////////////
function changecolor(){
    var box=document.getElementById('bloc');
    var box1=document.getElementById('bloc1')
    box.style.backgroundColor="#B437D3" ;
    box1.style.backgroundColor="#B437D3"
}
function towhite(){
    var box=document.getElementById('bloc');
    var box1=document.getElementById('bloc1')
    box.style.backgroundColor='#fff' ;
    box1.style.backgroundColor="#fff"
}



//////// Login /////////////
function validation() {
    var username = document.getElementById('Username');
    var passw = document.getElementById('Password');
    var role = document.getElementById('rolee');
    var error = false;

    if (username.value === '') {
        alert('Le champ Nom d\'utilisateur est obligatoire.');
        username.style.border = '2px solid red';
        error = true;
    } else {
        username.style.border = '2px solid green';
    }

    if (passw.value === '') {
        alert('Le champ Mot de passe est obligatoire.');
        passw.style.border = '2px solid red';
        error = true;
    } else if (passw.value.length < 6) {
        alert('Votre mot de passe est invalide. Il doit contenir au moins 6 caractères.');
        passw.style.border = '2px solid red';
        error = true;
    } else {
        passw.style.border = '2px solid green';
    }

    if (role.value === '') {
        alert('Le champ Rôle est obligatoire.');
        role.style.border = '2px solid red';
        error = true;
    } else if (role.value !== 'admin' && role.value !== 'user') {// ajouter par moi
        alert('Rôle invalide.');
        role.style.border = '2px solid red';
        error = true;
    } else {
        role.style.border = '2px solid green';
    }
    return !error; // Retourne true si aucune erreur n'a été rencontrée, sinon retourne false
}


//////////////////   boutton entrer tnzel alyh    

        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') { 
                var loginBtn = document.getElementById('loginBtn');
                if (loginBtn) {
                    loginBtn.click(); 
                }
            }
        });
        
        document.getElementById('loginBtn').addEventListener('click', function() {
            validation(); 
        });


        
