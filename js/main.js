// CHAT

$('#bandeau').click(function(){
	$('.chat').toggleClass("chatOpen")
})

$('#sendChat').click(function(e){
	var message = document.getElementById('messageChat')
	var messageVal = message.value
	e.preventDefault();
	if(messageVal != "") {
		$.ajax({
			url:"ajax/envoyerMessage.php",
			method:"POST",
			data: "message=" + messageVal,
			dataType:"json",
			success:function(response){
				message.value = ""
			}, 
			error:function(){
				
			}
		})
	} else {
		alert('Le message est vide !')
	}
})

let lastId = 0
setInterval(chargerMessage, 1000)

function chargerMessage() {

    $.ajax({
        url:"ajax/chargerMessage.php?lastId="+lastId,
        method:'post',
        dataType:"json",
        success:function(response){
            response.forEach(users => {
				$("#message ul").append(`<li title='${users.date}'><span>${users.pseudo}</span> : ${users.message}</li>`)
				lastId = users.id
				console.log(lastId)
            });
        }
    })
}

// MENU BURGER

var content = document.querySelector('nav')
var sidebarBody = document.querySelector('#sidebar-body')   /* Duplication de la barre de navigation*/

$("#menu-burger").click(function(){
  $('#sidebar').show('slow');
  $('#overlayBurger').show();
})
                                                        
$('#overlayBurger').click(function(){                               /*MENU BURGER*/
  $('#sidebar').hide('slow');
  $('#overlayBurger').hide();
})

// RECUPERATION DEMANDE CONTACT

$('#envoieContact').click(function(e){
	e.preventDefault();
	var pseudo = document.getElementById('pseudo')
	var email = document.getElementById('email')
	var titre = document.getElementById('titre')
	var message = document.getElementById('message')

	var pseudoVal = pseudo.value
	var emailVal = email.value
	var titreVal = titre.value
	var messageVal = message.value

	if(pseudoVal != "" && emailVal != "" && titreVal != "" && messageVal != "") {
		$.ajax({
			url:"ajax/envoieContact.php",
			method:"POST",
			data: "pseudo=" + pseudoVal + '&email=' + emailVal + '&titre=' + titreVal + '&message=' + messageVal,
			success:function(response){
				$('#recu').html('Message envoyé !').css('background-color', 'green').css('transition', '0.5s')
			}, 
			error:function(){
				$('#recu').html('Erreur !').css('background-color', 'red').css('transition', '0.5s')
			}
		})
		
		pseudo.value = ""
		email.value = ""
		titre.value = ""
		message.value = ""

	} else {
		$('#recu').html('Vous devez remplir tous les champs !').css('background-color', 'red').css('transition', '0.5s')
	}
})

// DEFILLEMENT DE LA PAGE ----------------------------------------------------------------------

const target = document.getElementById('championnat'),
	  button = document.getElementById('decouvrir');

	if(button != null) {
		button.addEventListener('click', function(){
	
			target.scrollIntoView({
				block: 'start',
				behavior: 'smooth',
				inline: 'nearest'
			});
			
		});	
	}


// POP UP DE CONNEXION -------------------------------------------------------------------------

$('.connexion').hide();

$('#connect').click(function(){
	$('.connexion').show();
	$('#overlay').show();
})

$('.croix').click(function() {
	$('#overlay').hide("fast")
	$('.connexion').hide("fast");
})

$('#overlay').click(function() {
	$('#overlay').hide("fast")
	$('.connexion').hide("fast");
})

$('.inscription').hide();

$('#inscrip').click(function(){
	$('.inscription').show();
	$('#overlay').show();
})

$('.croix').click(function() {
	$('#overlay').hide("fast")
	$('.inscription').hide("fast");
})

$('#overlay').click(function() {
	$('#overlay').hide("fast")
	$('.inscription').hide("fast");
})

$('#connectPage').click(function(){
	$('.connexion').show();
	$('#overlay').show();
})