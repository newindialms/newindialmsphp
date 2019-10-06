/* firebase Authentication*/
var config = {
    apiKey: "AIzaSyBI_Bu7BSdOu5yLZCkrTToIwB1rqsVb79w",
    authDomain: "newindialmsdashboard.firebaseapp.com",
    databaseURL: "https://newindialmsdashboard.firebaseio.com",
    projectId: "newindialmsdashboard",
    storageBucket: "",
    messagingSenderId: "366642711009"
  };
  firebase.initializeApp(config);

  firebase.auth.Auth.Persistence.LOCAL;

/* loading of logi dialog */
$(function(){
    $('#exampleModal').modal('show');
   });

/* Login button clicked */

$('#login-button').click(function(){
    var emailaddress=$('#email').val();
    var password=$('#password').val();

    var login_result=firebase.auth().signInWithEmailAndPassword(emailaddress,password);

    login_result.catch(function(error){
            var login_errorcode=error.code;
            var login_errormessage=error.message;
            alert(login_errormessage);
            console.log(login_errorcode);
            console.log(login_errormessage);
    })
});

$('#logout_button').click(function(){
    firebase.auth().signOut().then(function() {
    window.location.href="index.html";
}, function(error) {
            console.log(error.code);
            console.log(error.message);
});
});