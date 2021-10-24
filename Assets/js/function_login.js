document.addEventListener('DOMContentLoaded', function () {

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
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url + '/Login/loginUser';


        var formData = new FormData(formLogin);
        request.open("POST", ajaxurl, true);
        request.send(formData);

        console.log(request);
        request.onreadystatechange = function () {

          if (request.readyState != 4) return;
          if (request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
              window.location = base_url + 'home';
            } else {
              Swal.fire({
                icon: 'error',
                title: 'ATENCION',
                text: 'Error',
              });
              document.querySelector('#txtPassword').value = "";
            }
          } else {
            Swal.fire({
              icon: 'error',
              title: 'ATENCION',
              text: 'Error en el proceso',
            });
          }
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

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxurl = base_url + '/Login/resetPass';
        var formData = new FormData(formPasswordReset);
        request.open("POST", ajaxurl, true);
        request.send(formData);
        request.onreadystatechange = function () {
          console.log(request);
        }

      }
    }
  }
}, false);