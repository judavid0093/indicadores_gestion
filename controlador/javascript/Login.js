/**
 * Interprete de JS a PHP : Login
 */



'use strict';

var insertarLogin = async ()=>{
    let datos = {
            controller:"ControladorLogin",
            metodo:"insertarLogin",
            data: {usuario, clave}
        }
    let result =  await MLUtility.POST(datos);
    htmlSaluda(result);
    console.log(result);
}

var htmlInsertarLogin = (result) => {
    
    let Email = result.result[0].EmailFrom;

    var newDiv = document.createElement("div");
    var newContent = document.createTextNode(Email);
    newDiv.appendChild(newContent); //añade texto al div creado.
  
    // añade el elemento creado y su contenido al DOM
    var currentDiv = document.getElementById("div1");
    document.body.insertBefore(newDiv, currentDiv);

}

var validarLogin = async (usuario, clave)=>{
    
    let datos = {
            controller:"ControladorLogin",
            metodo:"validarLogin",
            data: {usuario, clave}
        }
    console.log(datos.controller);
    let result =  await MLUtility.POST(datos);
    //htmlValidarLogin(result);
    console.log(result);
}

var htmlValidarLogin = (result) => {
    let Email = result.result[0].EmailFrom;


    var newDiv = document.createElement("div");
    var newContent = document.createTextNode(Email);
    newDiv.appendChild(newContent); //añade texto al div creado.
  
    // añade el elemento creado y su contenido al DOM
    var currentDiv = document.getElementById("div1");
    document.body.insertBefore(newDiv, currentDiv);

}

var buscarLogin = async ()=>{
    let datos = {
            controller:"ControladorLogin",
            metodo:"buscarLogin",
            data: {}
        }
    let result =  await MLUtility.POST(datos);
    htmlBuscarLogin(result);
    console.log(result);
}

var htmlBuscarLogin = (result) => {
    let Email = result.result[0].EmailFrom;


    var newDiv = document.createElement("div");
    var newContent = document.createTextNode(Email);
    newDiv.appendChild(newContent); //añade texto al div creado.
  
    // añade el elemento creado y su contenido al DOM
    var currentDiv = document.getElementById("div1");
    document.body.insertBefore(newDiv, currentDiv);

}

var modificarLogin = async ()=>{
    let datos = {
            controller:"ControladorLogin",
            metodo:"modificarLogin",
            data: {Emails: "AAMkAGNhOWE3ZjdjLTI4MTctNGQ4Mi1hNTg3LTY0OTllY2U3M2ZmMgBGAAAAAAAvYfxgbN8LTaqr_Ya7A1K3BwD-Y25Oz6G9Q5sKsjGvYNTeAAAAAAEMAAD-Y25Oz6G9Q5sKsjGvYNTeAAUwWxSVAAA="}
        }
    let result =  await MLUtility.POST(datos);
    htmlModificarLogin(result);
    console.log(result);
}

var htmlModificarLogin = (result) => {
    let Email = result.result[0].EmailFrom;


    var newDiv = document.createElement("div");
    var newContent = document.createTextNode(Email);
    newDiv.appendChild(newContent); //añade texto al div creado.
  
    // añade el elemento creado y su contenido al DOM
    var currentDiv = document.getElementById("div1");
    document.body.insertBefore(newDiv, currentDiv);

}

var deshabilitarLogin = async ()=>{
    let datos = {
            controller:"ControladorLogin",
            metodo:"deshabilitarLogin",
            data: {Emails: "AAMkAGNhOWE3ZjdjLTI4MTctNGQ4Mi1hNTg3LTY0OTllY2U3M2ZmMgBGAAAAAAAvYfxgbN8LTaqr_Ya7A1K3BwD-Y25Oz6G9Q5sKsjGvYNTeAAAAAAEMAAD-Y25Oz6G9Q5sKsjGvYNTeAAUwWxSVAAA="}
        }
    let result =  await MLUtility.POST(datos);
    htmlDeshabilitarLogin(result);
    console.log(result);
}

var htmlDeshabilitarLogin= (result) => {
    let Email = result.result[0].EmailFrom;


    var newDiv = document.createElement("div");
    var newContent = document.createTextNode(Email);
    newDiv.appendChild(newContent); //añade texto al div creado.
  
    // añade el elemento creado y su contenido al DOM
    var currentDiv = document.getElementById("div1");
    document.body.insertBefore(newDiv, currentDiv);

}

var habilitarLogin = async ()=>{
    let datos = {
            controller:"ControladorLogin",
            metodo:"habilitarLogin",
            data: {Emails: "AAMkAGNhOWE3ZjdjLTI4MTctNGQ4Mi1hNTg3LTY0OTllY2U3M2ZmMgBGAAAAAAAvYfxgbN8LTaqr_Ya7A1K3BwD-Y25Oz6G9Q5sKsjGvYNTeAAAAAAEMAAD-Y25Oz6G9Q5sKsjGvYNTeAAUwWxSVAAA="}
        }
    let result =  await MLUtility.POST(datos);
    htmlHabilitarLogin(result);
    console.log(result);
}

var htmlHabilitarLogin = (result) => {
    let Email = result.result[0].EmailFrom;


    var newDiv = document.createElement("div");
    var newContent = document.createTextNode(Email);
    newDiv.appendChild(newContent); //añade texto al div creado.
  
    // añade el elemento creado y su contenido al DOM
    var currentDiv = document.getElementById("div1");
    document.body.insertBefore(newDiv, currentDiv);

}

var MLUtility = {
	POST: async function (datos) {
		let result = await fetch('./JavaScriptPhP.php', {
            method: "POST",
            body: JSON.stringify(datos),
            headers: {"Content-type": "application/json; charset=UTF-8"}
        });
        return await result.json();
	}
}