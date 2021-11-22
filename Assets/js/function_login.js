

document.addEventListener('DOMContentLoaded', function () {
  var divLoading = document.querySelector("#divLoading");
  
  if (document.querySelector("#formLogin")) {

    let formLogin = document.querySelector("#formLogin");
    formLogin.onsubmit = function (e) {
      e.preventDefault();

      let strUsuario = document.querySelector("#idUsuario").value;
      let strPassword = document.querySelector("#idPassword").value;

      if (strUsuario == '' || strPassword == '') {

        Swal.fire({
          icon: 'error',
          title: 'ATENCION',
          text: 'Escriba usuario y contraseña',
        });
        return false;
      } else {

        divLoading.style.display = "flex";

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url + '/Login/loginUser';


        var formData = new FormData(formLogin);
        request.open("POST", ajaxurl, true);
        request.send(formData);

        request.onreadystatechange = function () {

          if (request.readyState != 4) return;
          if (request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
              window.location = base_url + 'home';
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Tus datos estan incorrectos',
              });
              document.querySelector('#idPassword').value = "";
              
            }
          } else {
            Swal.fire({
              icon: 'error',
              title: 'ATENCION',
              text: 'Error en el proceso',
            });
          
            
          }
          divLoading.style.display = "none";
          return false; 
        }
       
        
      }

    }

  }

  if (document.querySelector("#formPasswordReset")) {
    let formPasswordReset = document.querySelector("#formPasswordReset");
    formPasswordReset.onsubmit = function (e) {
      e.preventDefault();

      let strEmail = document.querySelector("#txtEmailReset").value;
      if (strEmail == "") {
        Swal.fire({
          icon: 'error',
          title: 'ATENCION',
          text: 'Escriba tu correo electronico',
        });
        return false;
      } else {
        divLoading.style.display = "flex";
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url + '/Login/resetPass';
        var formData = new FormData(formPasswordReset);
        request.open("POST", ajaxurl, true);
        request.send(formData);
        request.onreadystatechange = function () {
          if(request.readyState != 4) return;

          if(request.status == 200){

            var objData = JSON.parse(request.responseText);
           
            if(objData.status)
            {
              Swal.fire({
                text: objData.msg,
                icon: "success",
                confirmButtonText: "Aceptar",
                
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location = base_url;
                }
              });
              
            }else{
              Swal.fire("Atención", objData.msg, "error");
            }
          }else {
            Swal.fire("Atención","Error en el proceso", "error");
          }
          divLoading.style.display = "none";
          return false;
        }

      }
    }
  }

  if(document.querySelector("#formPasswordReset2")){
    let formPasswordReset2 = document.querySelector("#formPasswordReset2");
    formPasswordReset2.onsubmit = function(e) {
      e.preventDefault();

      let strPassword = document.querySelector('#txtPassword2').value;
      let strPasswordConfirm = document.querySelector('#txtPasswordConfirm2').value;
      let idUsuario = document.querySelector('#idUsuario2').value;
    
      if(strPassword == "" || strPasswordConfirm == ""){
        Swal.fire("Por favor", "Escribe la nueva contraseña.", "error");
        return false;
      }else{
        if(strPassword.length < 5){
          Swal.fire("Atencion", "La nueva contraseña debe tener un minimo de 5 caracteres.", "info");
          return false;
        }
        if(strPassword != strPasswordConfirm){
          Swal.fire("Atencion", "Las contraseñas no coinciden.", "info");
          return false;
        }

        var request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url+'/Login/setPassword';
        var formData = new FormData(formPasswordReset2);
        request.open("POST",ajaxUrl,true);
        request.send(formData);
        request.onreadystatechange = function(){
          if(request.readyState != 4) return;
          if(request.status == 200){
            var objData = JSON.parse(request.responseText);
            if(objData.status)
            {
              Swal.fire({
                text: objData.msg,
                icon: "success",
                confirmButtonText: "Iniciar sesión",
                
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location = base_url+'login';
                }
              });
            }else{
              Swal.fire("Atención", objData.msg, "error");
            }
          }else{
            Swal.fire("Atención","Error en el proceso", "error");
          }
        }
      }
    }
  }

}, false);