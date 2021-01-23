/* Aprés Redirection vers login
   Enlever l'alert de l'enregistrement aprés 3 secondes */
   const loginAlert = document.getElementsByClassName('alert-login')[0];
   if ( loginAlert ){
           setTimeout(function()
           {
               // supprimer l'element a traver son Parent
               loginAlert.calssName = 'slide';
               loginAlert.parentElement.removeChild(loginAlert);
           }, 3000);
   }
