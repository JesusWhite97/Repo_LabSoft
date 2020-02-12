var flagImg = 0;
function goBack() {
  window.history.back()
}

function readURL(input) 
{
  flagImg = 1;
  if (input.files && input.files[0]) 
  {
      var reader = new FileReader();
      reader.onload = function(evt)
      {
        var field = document.getElementById('blah');
        field.style.backgroundImage = "url('"+evt.target.result+"')";
      }
      reader.readAsDataURL(input.files[0]);
  }
}

function isNumberKey(evt){
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode != 46 && charCode > 31 
  && (charCode < 48 || charCode > 57))
  return false;
  return true;
} 

var flag = 0;
function openNav() {
  
  if(flag == 0){
    document.getElementById("myNav").style.height = "100%";
    document.getElementById("menu").style.backgroundImage= "url('../img/close.svg')"
    window.addEventListener('scroll', noScroll);
    flag = 1;
  }else{
    document.getElementById("menu").style.backgroundImage= "url('../img/menu.svg')"
    document.getElementById("myNav").style.height = "0%";
    window.removeEventListener('scroll', noScroll);
    flag = 0;
  } 
}
function openModal() {
    document.getElementById("contenedorModal").style.height = "100%";
    window.addEventListener('scroll', noScrollModal);
}

function closeModal(){
  document.getElementById("contenedorModal").style.height = "0%";
  window.removeEventListener('scroll', noScrollModal);
} 


function noScroll() {
  window.scrollTo(0, 0);
}
function noScrollModal() {
  var y1 = document.getElementById("contenedorModal").offsetTop;
  var y2 = y1 + document.getElementById("contenedorModal").height;
  window.scrollTo(y1, y2);
}

function mostrarInput(dias,contenedorBtn,btnReg){
  var input = document.getElementById(dias);
  var botonR = document.getElementById(btnReg);
  var botones = document.getElementById(contenedorBtn);
  input.classList.remove("visible");
  input.classList.remove("noVisible");
  input.classList.add("registroPrueba");
  botonR.style.display = "none";
  botones.style.display = "grid";
}

function cancelarRegistro(dias, checkbox,contenedorBtn,btnReg){
  var input = document.getElementById(dias);
  var botonR = document.getElementById(btnReg);
  var botones = document.getElementById(contenedorBtn);
  var check = document.getElementById(checkbox);
  input.classList.add("noVisible");
  input.classList.remove("registroPrueba");
  input.value = "";
  botonR.style.display = "block";
  botones.style.display = "none";
  botonR.innerHTML = "Registrar Prueba";
  check.checked = false; 
}


function guardarRegistro(dias, checkbox,contenedorBtn,btnReg){
  var input = document.getElementById(dias);
  var botonR = document.getElementById(btnReg);
  var botones = document.getElementById(contenedorBtn);
  var check = document.getElementById(checkbox);
  var prueba7 = document.getElementById("checkbox");
  var prueba14 = document.getElementById("checkbox1");
  if(input.value == ""){
    cancelarRegistro(dias, checkbox,contenedorBtn,btnReg);
  }else{
    if(dias == "diasUnoCuatro" && prueba7.checked == false){
      alert("No se puede agregar, debido a que no se registro la prueba de 7 días.");
      cancelarRegistro(dias, checkbox,contenedorBtn,btnReg);
    }else{
      if(dias == "diasDosOcho" && prueba14.checked == false){
        alert("No se puede agregar, debido a que no se registro la prueba de 14 días.");
        cancelarRegistro(dias, checkbox,contenedorBtn,btnReg);
    }else{
      if(checkbox == "checkbox"){
        document.getElementById("botonCancelarPrueba").innerHTML = "Borrar";
      }
      if(checkbox == "checkbox2"){
        document.getElementById("botonCancelarPruebaDos").innerHTML = "Borrar";
      }
      if(checkbox == "checkbox3"){
        document.getElementById("botonCancelarPruebaTres").innerHTML = "Borrar";
      }
      input.classList.add("visible");
      input.classList.remove("registroPrueba");
      botonR.style.display = "block";
      botonR.innerHTML = "Modificar";
      botones.style.display = "none";
      check.checked = true;
      }
    }
  }
}

  function eliminarUsuario(str) {
    var respuesta = "";
    const postData ={metodo:"eliminar",usuario:str};
    $.post('../Logica/claseProcedures.php',postData,function(response){
      console.log(response);
      let arrayResponse = JSON.parse(response);
      document.getElementById("textoExito").innerHTML = arrayResponse[0].mensajeDatos;
      document.getElementById("contenedorModal").style.height = "0%";
      document.getElementById("contenedorModalEliminado").style.height = "100%";
      window.addEventListener('scroll', noScrollModal);

    });
    return respuesta;
}


    function cambiarPantallaEditar(item){

      let arrayInputs = document.getElementsByTagName("input");
      let arraySelects = document.getElementsByTagName("select");
      let btnImg = document.getElementById("botonImg");
      let btnGuardar = document.getElementById("botonGuardar");
      let btnsDelPrint = document.getElementById("botonesDelPrint");
      let btnEdit = document.getElementById("editar");
      let textoModalPregunta = document.getElementById("textoModalPregunta");
      let botonEliminarModal = document.getElementById("botonEliminarModal");
      let botonGuardarModal = document.getElementById("botonGuardarModal");


      for(let i = 0; i < arrayInputs.length;i++){
        arrayInputs[i].classList.add("registro");
      }
      for(let i = 0; i < arraySelects.length;i++){
        arraySelects[i].classList.add("registro");
      }
      btnImg.style.display = "block";
      btnGuardar.style.display = "block";
      btnsDelPrint.style.display = "none";
      botonGuardarModal.style.display = "block";
      btnEdit.style.display = "none";
      botonEliminarModal.style.display = "none";
      textoModalPregunta.innerHTML = "Desea modificar " + item + " ?";
    }

    function cambiarPantallaInfo(item){

      let arrayInputs = document.getElementsByTagName("input");
      let arraySelects = document.getElementsByTagName("select");
      let btnImg = document.getElementById("botonImg");
      let btnGuardar = document.getElementById("botonGuardar");
      let btnsDelPrint = document.getElementById("botonesDelPrint");
      let btnEdit = document.getElementById("editar");
      let textoModalPregunta = document.getElementById("textoModalPregunta");
      let botonEliminarModal = document.getElementById("botonEliminarModal");
      let botonGuardarModal = document.getElementById("botonGuardarModal");


      for(let i = 0; i < arrayInputs.length;i++){
        arrayInputs[i].classList.remove("registro");
      }
      for(let i = 0; i < arraySelects.length;i++){
        arraySelects[i].classList.remove("registro");
      }
      btnImg.style.display = "none";
      btnGuardar.style.display = "none";
      btnsDelPrint.style.display = "block";
      botonGuardarModal.style.display = "none";
      btnEdit.style.display = "block";
      botonEliminarModal.style.display = "block";
      textoModalPregunta.innerHTML = "Desea eliminar " + item + " ?";
      document.getElementById("contenedorModalEliminado").style.height = "0%";
      window.removeEventListener('scroll', noScrollModal);

    }



    function obtenerValorSelect(index){
      var arrayOptions = document.getElementsByTagName("option");
      return arrayOptions[index].value;
    }
    var respuestaSubirIMG = "";

    function modificarUsuario(img){
      var respuesta;
      
      if(flagImg == 1){
        subirImg();
        respuestaImg = "../img/"+ respuestaSubirIMG;
        console.log(respuestaSubirIMG);
        console.log(respuestaImg);
      }else{
        respuestaImg = img;
      }

      if(respuestaImg != "../img/NO"){
      const postData ={
        metodo:"modificar",
        titulo:document.getElementById("tituloInfo").value,
        img:respuestaImg,
        puesto:obtenerValorSelect(document.getElementById("puesto").selectedIndex),
        primerNombre:document.getElementById("primerNombre").value,
        segundoNombre:document.getElementById("segundoNombre").value,
        apellidoPaterno:document.getElementById("apellidoPaterno").value,
        apellidoMaterno:document.getElementById("apellidoMaterno").value,
        rfc:document.getElementById("rfc").value,
        curp:document.getElementById("curp").value,
        telefono:document.getElementById("telefono").value,
        email:document.getElementById("email").value,
        calle:document.getElementById("calle").value,
        entre:document.getElementById("entre").value,
        ciudad:document.getElementById("ciudad").value,
        cp:document.getElementById("cp").value,
        colonia:document.getElementById("colonia").value
      };
      $.post('../Logica/claseProcedures.php',postData,function(response){
        console.log(response);
        let arrayResponse = JSON.parse(response);
        document.getElementById("textoExito").innerHTML = arrayResponse[0].mensajeDatos;
        document.getElementById("contenedorModal").style.height = "0%";
        document.getElementById("contenedorModalEliminado").style.height = "100%";
        window.addEventListener('scroll', noScrollModal);
  
      });
    }else{
      document.getElementById("textoExito").innerHTML = "Error al subir la imagen";
      document.getElementById("contenedorModal").style.height = "0%";
      document.getElementById("contenedorModalEliminado").style.height = "100%";
      window.addEventListener('scroll', noScrollModal);

    }
      return respuesta;
    }

    function subirImg(){
      var postData = new FormData(document.getElementById("formImg"));
      console.log(postData);
      $.ajax({
        data:postData,
        url:'../Logica/claseSubirImg.php',
        type:"POST",
        contentType:false,
        processData:false,
        async:false,
        success:function(response){ 
          var arrayResponse = JSON.parse(response);

          console.log(arrayResponse[0].respuesta);
          respuestaSubirIMG = arrayResponse[0].respuesta;
          console.log(respuestaSubirIMG);
        }
      });
  }

  function registrarUsuario(){
    var respuesta;
      subirImg();
      respuestaImg = "../img/"+ respuestaSubirIMG;
      console.log(respuestaSubirIMG);
      console.log(respuestaImg);
    if(respuestaImg != "../img/NO"){
    const postData ={
      metodo:"registrar",
      titulo:document.getElementById("tituloInfo").value,
      img:respuestaImg,
      puesto:obtenerValorSelect(document.getElementById("puesto").selectedIndex),
      primerNombre:document.getElementById("primerNombre").value,
      segundoNombre:document.getElementById("segundoNombre").value,
      apellidoPaterno:document.getElementById("apellidoPaterno").value,
      apellidoMaterno:document.getElementById("apellidoMaterno").value,
      rfc:document.getElementById("rfc").value,
      curp:document.getElementById("curp").value,
      telefono:document.getElementById("telefono").value,
      email:document.getElementById("email").value,
      password:document.getElementById("password").value,
      calle:document.getElementById("calle").value,
      entre:document.getElementById("entre").value,
      ciudad:document.getElementById("ciudad").value,
      cp:document.getElementById("cp").value,
      colonia:document.getElementById("colonia").value
    };
    $.post('../Logica/claseProcedures.php',postData,function(response){
      console.log(response);
      let arrayResponse = JSON.parse(response);
      document.getElementById("textoExito").innerHTML = arrayResponse[0].mensajeDatos;
      document.getElementById("contenedorModal").style.height = "0%";
      document.getElementById("contenedorModalEliminado").style.height = "100%";
      window.addEventListener('scroll', noScrollModal);

    });
  }else{
    document.getElementById("textoExito").innerHTML = "Error al subir la imagen";
    document.getElementById("contenedorModal").style.height = "0%";
    document.getElementById("contenedorModalEliminado").style.height = "100%";
    window.addEventListener('scroll', noScrollModal);

  }
    return respuesta;
  }

  function registrarCliente(){
    var respuesta;
      subirImg();
      respuestaImg = "../img/"+ respuestaSubirIMG;
      console.log(respuestaSubirIMG);
      console.log(respuestaImg);
    if(respuestaImg != "../img/NO"){
    const postData ={
      metodo:"registrarCliente",
      titulo:document.getElementById("tituloInfo").value,
      img:respuestaImg,
      nombre:document.getElementById("nombre").value,      
      rfc:document.getElementById("rfc").value,      
      direccion:document.getElementById("direccion").value,      
      cp:document.getElementById("cp").value,      
      colonia:document.getElementById("colonia").value,      
      ciudad:document.getElementById("ciudad").value,      
      nombreContacto:document.getElementById("nombreContacto").value,      
      telefono:document.getElementById("telefono").value,      
      email:document.getElementById("email").value,      
      notas:document.getElementById("descripcion").value,      
    };
    $.post('../Logica/claseProcedures.php',postData,function(response){
      console.log(response);
      let arrayResponse = JSON.parse(response);
      document.getElementById("textoExito").innerHTML = arrayResponse[0].mensajeDatos;
      document.getElementById("contenedorModal").style.height = "0%";
      document.getElementById("contenedorModalEliminado").style.height = "100%";
      window.addEventListener('scroll', noScrollModal);

    });
  }else{
    document.getElementById("textoExito").innerHTML = "Error al subir la imagen";
    document.getElementById("contenedorModal").style.height = "0%";
    document.getElementById("contenedorModalEliminado").style.height = "100%";
    window.addEventListener('scroll', noScrollModal);

  }
    return respuesta;
  }


  function modificarCliente(img){
    var respuesta;
    if(flagImg == 1){
      subirImg();
      respuestaImg = "../img/"+ respuestaSubirIMG;
      console.log(respuestaSubirIMG);
      console.log(respuestaImg);
    }else{
      respuestaImg = img;
    }

    if(respuestaImg != "../img/NO"){
    const postData ={
      metodo:"modificarCliente",
      idCliente:document.getElementById("id").value,
      titulo:document.getElementById("tituloInfo").value,
      img:respuestaImg,
      nombre:document.getElementById("nombre").value,
      rfc:document.getElementById("rfc").value,
      nombreContacto:document.getElementById("nombreContacto").value,
      numeroContacto:document.getElementById("numeroContacto").value,
      email:document.getElementById("email").value,
      direccion:document.getElementById("direccion").value,
      ciudad:document.getElementById("ciudad").value,
      cp:document.getElementById("cp").value,
      colonia:document.getElementById("colonia").value,
      notas:document.getElementById("descripcion").value
    };
    $.post('../Logica/claseProcedures.php',postData,function(response){
      console.log(response);
      let arrayResponse = JSON.parse(response);
      document.getElementById("textoExito").innerHTML = arrayResponse[0].mensajeDatos;
      document.getElementById("contenedorModal").style.height = "0%";
      document.getElementById("contenedorModalEliminado").style.height = "100%";
      window.addEventListener('scroll', noScrollModal);

    });
  }else{
    document.getElementById("textoExito").innerHTML = "Error al subir la imagen";
    document.getElementById("contenedorModal").style.height = "0%";
    document.getElementById("contenedorModalEliminado").style.height = "100%";
    window.addEventListener('scroll', noScrollModal);

  }
    return respuesta;
  }

  function eliminarCliente() {
    var respuesta = "";
    const postData ={metodo:"eliminarCliente",cliente:document.getElementById("id").value};
    $.post('../Logica/claseProcedures.php',postData,function(response){
      console.log(response);
      let arrayResponse = JSON.parse(response);
      document.getElementById("textoExito").innerHTML = arrayResponse[0].mensajeDatos;
      document.getElementById("contenedorModal").style.height = "0%";
      document.getElementById("contenedorModalEliminado").style.height = "100%";
      window.addEventListener('scroll', noScrollModal);

    });
    return respuesta;
}
function eliminarObra(id) {
  var respuesta = "";
  const postData ={metodo:"eliminarObra",idObra:id};
  $.post('../Logica/claseProcedures.php',postData,function(response){
    console.log(response);
    let arrayResponse = JSON.parse(response);
    document.getElementById("textoExito").innerHTML = arrayResponse[0].mensajeDatos;
    document.getElementById("contenedorModal").style.height = "0%";
    document.getElementById("contenedorModalEliminado").style.height = "100%";
    window.addEventListener('scroll', noScrollModal);

  });
  return respuesta;
}
  
  



  