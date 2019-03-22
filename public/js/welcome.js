$(function(){
	$.ajaxSetup({
        beforeSend: function(xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
    });
  graficar();

});

//Motodo para eliminar una pregunta
$('.eliminarPregunta').click(function() {
  var id = $(this).attr('data-id');
  swal({
    title: "¿Estas seguro de eliminar esta pregunta?",
    text: "Una vez eliminado, No podras recuperar esta información!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      document.getElementById('preguntaEliminar'+id).submit();
    } else {
      swal("Esta pregunta esta a salvo!");
    }
  });

});

//Motodo para eliminar un usuario
$('.eliminar').click(function() {
  var id = $(this).attr('data-id');
  swal({
    title: "¿Estas seguro de eliminar a este usuario?",
    text: "Una vez eliminado, No podras recuperar esta información!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      document.getElementById('userEliminar'+id).submit();
    } else {
      swal("Este usuario esta seguro!");
    }
  });

});


//Motodo para eliminar un examne
$('.delete').click(function() {
  var id = $(this).attr('data-id');
  swal({
    title: "¿Estas seguro de eliminar este examen?",
    text: "Una vez eliminado, No podras recuperar esta información!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      document.getElementById('myform'+id).submit();
    } else {
      swal("Este examen esta seguro!");
    }
  });

});

//Este es el script para el cronometro de los examenes
var hr = $('#horas').val();
var mn = $('#minutos').val();
var sg = $('#segundos').val();

var centesimas = 0;
var segundos = 0;
var minutos = 0;
var horas = 0;

function inicio () {
 control = setInterval(cronometro,10);
}
function cronometro () {
 if (centesimas < 99) {
  centesimas++;
  if (centesimas < 10) { centesimas = "0"+centesimas }
  Centesimas.innerHTML = ":"+centesimas;
 }
 if (centesimas == 99) {
  centesimas = -1;
 }
 if (centesimas == 0) {
  segundos ++;
  if (segundos < 10) { segundos = "0"+segundos }
  Segundos.innerHTML = ":"+segundos;
 }
 if (segundos == 59) {
  segundos = -1;
 }
 if ( (centesimas == 0)&&(segundos == 0) ) {
  minutos++;
  if (minutos < 10) { minutos = "0"+minutos }
  Minutos.innerHTML = ":"+minutos;
 }
 if (minutos == 59) {
  minutos = -1;
 }
 if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) {
  horas ++;
  if (horas < 10) { horas = "0"+horas }
  Horas.innerHTML = horas;
 }
  if ( (centesimas == 0)&&(segundos == sg)&&(minutos == mn)&&(horas == hr) ) {
  clearInterval(control);
  alert("tu tiempo se agoto.")
  document.getElementById('formid').submit();
 }
}
//FIN del script para el cronometro de los examenes
function carga()
{
	var cronometro=0;
    contador_s =0;
    contador_m =0;
    s = document.getElementById("segundos");
    m = document.getElementById("minutos"); 
    cronometro = setInterval(
        function(){
            if(contador_s==60)
            {
                contador_s=0;
                contador_m++;
                m.innerHTML = contador_m;
                if(contador_m==60)
                {
                    contador_m=0;
                }
            }
            s.innerHTML = contador_s;
            contador_s++;
            //alert(cronometro)
        }
        ,100);
    if (cronometro === 10) {
      clearInterval(cronometro);
      alert("Se agoto tu tiempo.")
      window.location = "home";
    }
}
//Funcion para guardar las respuestas 
function ver () {
 	$(document).ready(function() {
 	    $('#enviar').click(function(){
 	        var selected = '';    
 	        $('#formid input[type=radio]').each(function(){
 	            if (this.checked) {
 	                selected += $(this).val()+', ';
 	                $("#respuestas").val(selected);
 	            }
 	        }); 

 	        //Token
 	        $.ajaxSetup({
	            beforeSend: function(xhr, type) {
	                if (!type.crossDomain) {
	                    xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
	                }
	            },
	        });

 	        if (selected != ''){
 	        	document.getElementById('formid').submit();
 	        	/*var json = JSON.stringify(selected);
 	        	//enviar las respuestas guardadas en la variable selected al archivo php(Controlador: PreguntaUsuario.php)
	 	        $.ajax({
            	method: 'POST',
            	dataType: 'html',
            	url: "respuestas",
            	data: ('json='+json), 
            	success: function(respuesta) {
            	  //$("#respu").val(selected);
            	  //console.log('Javascript')
	          	  //console.log(json)
	              //window.location = "/prueba";
	              document.getElementById('formid').submit();
	 	         },
	 	         error: function(respuesta){
	 	            alert("error: ")
	 	            //console.log(json);
	 	         }
 	            })*/ 
 	        } else
 	            alert('Debes seleccionar una opción para cada pregunta.')
 	        return false;
 	    });        
 	});  
 } 

document.getElementById("opcion4").addEventListener("change", myFunction4);
document.getElementById("opcion5").addEventListener("change", myFunction5);
document.getElementById("opcion6").addEventListener("change", myFunction6);

function myFunction4() {
  var opc4 = $('#opcion4').val();
  if (opc4 == "") {
    $("#opc4").attr("hidden","true");
  }else if (opc6 != ""){
    document.getElementById("opc4").removeAttribute('hidden');
  }
}
function myFunction5() {
  var opc5 = $('#opcion5').val();
  if (opc5 == "") {
    $("#opc5").attr("hidden","true");
  }else if (opc5 != ""){
    document.getElementById("opc5").removeAttribute('hidden');
  }
}
function myFunction6() {
  var opc6 = $('#opcion6').val();
  if (opc6 == "") {
    $("#opc6").attr("hidden","true");
  }else if (opc6 != ""){
    document.getElementById("opc6").removeAttribute('hidden');
  }
}




