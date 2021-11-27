const formIngresoGuia = document.getElementById("nameForm").value;
if (formIngresoGuia) {
  const nroGuia=document.getElementById('nroGuia')
  const errorMessageNroGuia=document.getElementById('errorMessageNroGuia')

  const selectDestinatario = document.getElementById("destinatario");
  const inputRucDni = document.getElementById("rucDni");

  const selectPlaca = document.getElementById("placa");
  const inputMarca = document.getElementById("marca");
  const inputNroConstancia = document.getElementById("nroConstancia");

  const selectConductor = document.getElementById("nombreChofer");
  const inputNroLicencia = document.getElementById("nroLicencia");
  const puntoLlegada=document.getElementById("puntoLlegada");

  const selectTransportista = document.getElementById("nombreTransportista");
  const inputRucTransportista = document.getElementById("rucTransportista");

  const tipoComprobante=document.getElementById("tipoComprobante")
  const nroComprobante=document.getElementById("nroComprobante")
  const errorMessageTipoComprobante=document.getElementById("errorMessageTipoComprobante")

  nroGuia.addEventListener('keyup',()=>{
    let formDataNroGuia=new FormData();

    formDataNroGuia.append('nroGuia',nroGuia.value);

    fetch('./api/validaNroGuia.php',{
      method:'POST',
      body:formDataNroGuia
    })
    .then(res=>res.json())
    .then(data=>{
      if(data.length==1) errorMessageNroGuia.innerText="Ya existe este numero de guia";
      else errorMessageNroGuia.innerText=""
    })
    .catch(e=>console.log(e))

  })
  selectDestinatario.addEventListener("change", () => {
    puntoLlegada.innerHTML="<option value='' selected disabled>Seleccione una direccion</option>"
    const frag=document.createDocumentFragment();

    inputRucDni.value = selectDestinatario.options[selectDestinatario.selectedIndex].value;
    let formData=new FormData();
    formData.append('destinatario',selectDestinatario.options[selectDestinatario.selectedIndex].value);
    fetch('./api/direccionesJuridico.php',{
      method:'POST',
      body:formData
    })
    .then(res=>res.json())
    .then(data=>{
      //console.log(data)
      for(ele in data){
        //console.log(data[ele].codigo)
        const option=document.createElement('OPTION')
        option.value=data[ele].codigo;
        option.innerText=data[ele].direccion;
        frag.appendChild(option)
      }
      puntoLlegada.appendChild(frag)
    })
    .catch(e=>console.log(e))
    
    if(selectDestinatario.options[selectDestinatario.selectedIndex].value.length<9){
      console.log("entre al if")
      tipoComprobante.value=tipoComprobante.options[1].value
    }else{
      console.log("entre al else")
      tipoComprobante.value=tipoComprobante.options[0].value
    }
  });

  selectPlaca.addEventListener("change", () => {
    let dataVehiculo =
      selectPlaca.options[selectPlaca.selectedIndex].value.split("_");
    inputMarca.value = dataVehiculo[1];
    inputNroConstancia.value = dataVehiculo[2];
  });

  selectConductor.addEventListener("change", () => {
    inputNroLicencia.value =
      selectConductor.options[selectConductor.selectedIndex].value;
  });

  selectTransportista.addEventListener("change", () => {
    inputRucTransportista.value =
      selectTransportista.options[selectTransportista.selectedIndex].value;
  });
  const dataRow1=document.querySelector('.rowDetalleGuia1');
  const unidadMedida1=document.getElementById('unidadMedida1');
  const selectProducto1=dataRow1.childNodes[1].childNodes[0];

  selectProducto1.addEventListener('change',()=>{
    const unid=selectProducto1.options[selectProducto1.selectedIndex].value.split('_')
    unidadMedida1.value=unid[1];
  })

  let dataProductos=[] //Para almacenar los datos de los productos

  const tablaDetalle = document.getElementById("tableDetalleGuia");
  const selectProductosData = document.getElementById("producto1");
  const btnAgregarFila = document.getElementById("btnAgregarFilaDetalle");
  const btnEliminarFila = document.getElementById("btnEliminarFilaDetalle");
  const totalFilas = document.getElementById("totalFilasDetalle");

  for (let i = 1; i < selectProductosData.length; i++) {
      const codigo=selectProductosData[i].value
      const producto=selectProductosData[i].text
      dataProductos=[...dataProductos,[codigo,producto]]
  }

  let rowCount = 1; //Contador de filas del cuerpo de la guia

  btnAgregarFila.addEventListener("click", () => {
    rowCount++;
    console.log("Filas actuales",rowCount)
    const fragment = document.createDocumentFragment();
    const tr = document.createElement("TR");
    const tdProducto = document.createElement("TD");
    const tdUnidadMedida = document.createElement("TD");
    const tdCantidad = document.createElement("TD");
    const tdPesoTotal = document.createElement("TD");

    tr.classList.add('rowDetalleGuia')
    const selectProducto = document.createElement("SELECT");

    const inputUnidadMedida = document.createElement("INPUT");
    const inputCantidad = document.createElement("INPUT");
    const inputPeso = document.createElement("INPUT");

    let stringHtml="<option value='' disabled selected>Seleccione un producto</option>"
    dataProductos.forEach(e=>{
        stringHtml+=`<option value='${e[0]}'>${e[1]}</option>`
    })

    selectProducto.setAttribute("id", `producto${rowCount}`);
    selectProducto.setAttribute("name", `producto${rowCount}`);
    selectProducto.innerHTML = stringHtml;

    inputUnidadMedida.setAttribute("id",`unidadMedida${rowCount}`)
    inputUnidadMedida.setAttribute('readonly','true')

    inputCantidad.setAttribute("name",`cantidad${rowCount}`)

    inputPeso.setAttribute("name",`peso${rowCount}`)

    tdProducto.appendChild(selectProducto);
    tdUnidadMedida.appendChild(inputUnidadMedida)
    tdCantidad.appendChild(inputCantidad)
    tdPesoTotal.appendChild(inputPeso)

    tr.appendChild(tdProducto);
    tr.appendChild(tdUnidadMedida);
    tr.appendChild(tdCantidad);
    tr.appendChild(tdPesoTotal);

    fragment.appendChild(tr);
    tablaDetalle.appendChild(fragment);
    totalFilas.value = rowCount;

    const rowsDetallesGuia=document.querySelectorAll('.rowDetalleGuia');
    rowsDetallesGuia.forEach(e=>{
        const select=e.childNodes[0].childNodes[0]
        const inputUnid=e.childNodes[1].childNodes[0]
        select.addEventListener('change',()=>{
            let unid=select.options[select.selectedIndex].value.split('_')
            inputUnid.value=unid[1]
        })
    })

  });

  btnEliminarFila.addEventListener("click", () => {
    rowCount--;
    console.log("Filas actuales",rowCount)
    if (tablaDetalle.lastChild != tablaDetalle.childNodes[1]) {
      tablaDetalle.removeChild(tablaDetalle.lastChild);
    } else {
      alert("Se tiene que registrar un producto como minimo");
    }
    totalFilas.value = rowCount;
  });

  

  let valueTipoComprobante=tipoComprobante.options[tipoComprobante.selectedIndex].value
  nroComprobante.addEventListener('keyup',()=>{
    let formDataNroComprobante=new FormData();

    formDataNroComprobante.append('tipoComprobante',tipoComprobante.options[tipoComprobante.selectedIndex].value);
    formDataNroComprobante.append('nroComprobante',nroComprobante.value);

    fetch('./api/validaNroComprobante.php',{
      method:'POST',
      body:formDataNroComprobante
    })
    .then(res=>res.json())
    .then(data=>{
      if(data.length==1) errorMessageTipoComprobante.innerText="Este numero de comprobante actualmente ya esta registrado";
      else errorMessageTipoComprobante.innerText=""
    })
    .catch(e=>console.log(e))
  })
  


} else {
  const modalName = document.getElementById("modalPara").value;
  const modalBackground = document.querySelector(".modal-background");

  const crearFormulario = (modal) => {
    const fragment = document.createDocumentFragment();
    const form = document.createElement("FORM");
    const modalTitle = document.createElement("DIV");
    const modalBody = document.createElement("DIV");
    const modalFooter = document.createElement("DIV");
    const title = document.createElement("H3");
    const btnCancelar = document.createElement("BUTTON");
    const btnOk = document.createElement("BUTTON");

    form.setAttribute("method", "POST");

    modalTitle.classList.add("modal-title");
    modalBody.classList.add("modal-body");
    modalFooter.classList.add("modal-footer");

    btnCancelar.setAttribute("type", "button");
    btnCancelar.setAttribute("id", "btnCloseModal");
    btnCancelar.classList.add("btn");
    btnCancelar.innerText = "Cancelar";

    btnOk.setAttribute("type", "submit");
    btnOk.setAttribute("id", "btnSubmitData");
    btnOk.classList.add("btn");
    btnOk.innerText = "Registrar";

    title.setAttribute("id", "titleModal");
    form.classList.add("modal-container");
    const clave = document.createElement("INPUT");
    clave.setAttribute("type", "hidden");
    clave.setAttribute("id", "campoClave");
    clave.setAttribute("value", "crear");
    clave.setAttribute("name", "clave");
    if (modal == "productos") {
      form.setAttribute("action", "./?ctrl=productos&acc=createOrModify");
      title.innerText = "Nuevo producto";
      const unidadMedida = document.createElement("INPUT");
      const descripcion = document.createElement("INPUT");

      unidadMedida.setAttribute("type", "text");
      unidadMedida.setAttribute("name", "unidadMedida");
      unidadMedida.setAttribute("id", "unidadMedida");
      unidadMedida.setAttribute("placeholder", "Unidad de medida");
      unidadMedida.setAttribute("autocomplete", "off");

      descripcion.setAttribute("name", "descripcion");
      descripcion.setAttribute("id", "descripcion");
      descripcion.setAttribute("placeholder", "Descripcion");
      descripcion.setAttribute("autocomplete", "off");
      descripcion.setAttribute("type", "text");

      modalBody.appendChild(clave);
      modalBody.appendChild(unidadMedida);
      modalBody.appendChild(descripcion);
    } else if (modal == "vehiculos") {
      form.setAttribute("action", "./?ctrl=vehiculos&acc=createOrModify");
      title.innerText = "Nuevo vehiculo";
      const placa = document.createElement("INPUT");
      const marca = document.createElement("INPUT");
      const constanciaInsc = document.createElement("INPUT");

      placa.setAttribute("type", "text");
      placa.setAttribute("name", "placa");
      placa.setAttribute("id", "placa");
      placa.setAttribute("placeholder", "Numero de placa");
      placa.setAttribute("autocomplete", "off");

      marca.setAttribute("type", "text");
      marca.setAttribute("name", "marca");
      marca.setAttribute("id", "marca");
      marca.setAttribute("placeholder", "Marca del vehiculo");
      marca.setAttribute("autocomplete", "off");

      constanciaInsc.setAttribute("type", "text");
      constanciaInsc.setAttribute("name", "constanciaInscripcion");
      constanciaInsc.setAttribute("id", "constanciaInscripcion");
      constanciaInsc.setAttribute(
        "placeholder",
        "Numero de constancia de inscripcion"
      );
      constanciaInsc.setAttribute("autocomplete", "off");

      modalBody.appendChild(clave);
      modalBody.appendChild(placa);
      modalBody.appendChild(marca);
      modalBody.appendChild(constanciaInsc);
    } else if (modal == "conductores") {
      form.setAttribute("action", "./?ctrl=conductores&acc=createOrModify");
      title.innerText = "Nuevo Conductor";
      const nroLicencia = document.createElement("INPUT");
      const dni = document.createElement("INPUT");
      const apellidos = document.createElement("INPUT");
      const nombres = document.createElement("INPUT");
      const telefono = document.createElement("INPUT");

      nroLicencia.setAttribute("type", "text");
      nroLicencia.setAttribute("name", "nroLicencia");
      nroLicencia.setAttribute("id", "nroLicencia");
      nroLicencia.setAttribute("placeholder", "Numero de licencia de conducir");
      nroLicencia.setAttribute("autocomplete", "off");

      dni.setAttribute("type", "text");
      dni.setAttribute("name", "dni");
      dni.setAttribute("id", "dni");
      dni.setAttribute("placeholder", "Numero de DNI");
      dni.setAttribute("autocomplete", "off");

      apellidos.setAttribute("type", "text");
      apellidos.setAttribute("name", "apellidos");
      apellidos.setAttribute("id", "apellidos");
      apellidos.setAttribute("placeholder", "Apellidos");
      apellidos.setAttribute("autocomplete", "off");

      nombres.setAttribute("type", "text");
      nombres.setAttribute("name", "nombres");
      nombres.setAttribute("id", "nombres");
      nombres.setAttribute("placeholder", "Nombres");
      nombres.setAttribute("autocomplete", "off");

      telefono.setAttribute("type", "text");
      telefono.setAttribute("name", "telefono");
      telefono.setAttribute("id", "telefono");
      telefono.setAttribute("placeholder", "Numero de telefono");
      telefono.setAttribute("autocomplete", "off");

      modalBody.appendChild(clave);
      modalBody.appendChild(nroLicencia);
      modalBody.appendChild(dni);
      modalBody.appendChild(apellidos);
      modalBody.appendChild(nombres);
      modalBody.appendChild(telefono);
    }
    modalTitle.appendChild(title);
    modalFooter.appendChild(btnCancelar);
    modalFooter.appendChild(btnOk);
    form.appendChild(modalTitle);
    form.appendChild(modalBody);
    form.appendChild(modalFooter);

    fragment.appendChild(form);
    modalBackground.appendChild(fragment);
  };
  crearFormulario(modalName);

  const openModal = document.getElementById("btnOpenModal");
  const closeModal = document.getElementById("btnCloseModal");
  const modalContainer = document.querySelector(".modal-container");

  const rowData = document.querySelectorAll(".row");
  const titleModal = document.getElementById("titleModal");
  const btnSubmitData = document.getElementById("btnSubmitData");

  const campoClave = document.getElementById("campoClave");
  //Inputs del formulario producto
  const inputUnidadMedida = document.getElementById("unidadMedida");
  const inputDescripcion = document.getElementById("descripcion");
  //Inputs del formulario vehiculo
  const inputPlaca = document.getElementById("placa");
  const inputMarca = document.getElementById("marca");
  const inputConstanciaInscripcion = document.getElementById(
    "constanciaInscripcion"
  );
  //Inputs del formulario conductor
  const inputNroLicencia = document.getElementById("nroLicencia");
  const inputDni = document.getElementById("dni");
  const inputApellidos = document.getElementById("apellidos");
  const inputNombres = document.getElementById("nombres");
  const inputTelefono = document.getElementById("telefono");

  rowData.forEach((element) => {
    element.childNodes[0].addEventListener("click", () => {
      modalBackground.classList.add("show-modal-bg");
      modalContainer.classList.add("show-modal");
      titleModal.innerText = "Modificar producto";
      btnSubmitData.innerText = "Modificar";
      llenarFormulario(modalName, element);
    });

    element.childNodes[1].addEventListener("click", () => {
      let deleteKey = element.childNodes[2].value.split("_");
      if (confirm("¿Estas seguro que deseas eliminar el registro?")) {
        if (modalName == "productos") {
          window.location.href = `./?ctrl=productos&acc=delete&clave=${deleteKey[0]}`;
        } else if (modalName == "vehiculos") {
          window.location.href = `./?ctrl=vehiculos&acc=delete&clave=${deleteKey[0]}`;
        } else if (modalName == "conductores") {
          window.location.href = `./?ctrl=conductores&acc=delete&clave=${deleteKey[0]}`;
        }

        //console.log(deleteKey[0])
      }
    });
  });

  openModal.addEventListener("click", () => {
    modalBackground.classList.add("show-modal-bg");
    modalContainer.classList.add("show-modal");
    limpiarInputs();
  });

  closeModal.addEventListener("click", () => {
    modalBackground.classList.remove("show-modal-bg");
    modalContainer.classList.remove("show-modal");
    titleModal.innerText = "Nuevo producto";
    btnSubmitData.innerText = "Registrar";
    campoClave.value = "crear";
  });

  const llenarFormulario = (nombreFormulario, e) => {
    let data = e.lastChild.value.split("_");
    if (nombreFormulario == "productos") {
      campoClave.value = data[0];
      inputUnidadMedida.value = data[1];
      inputDescripcion.value = data[2];
    } else if (nombreFormulario == "vehiculos") {
      campoClave.value = data[0];
      inputPlaca.value = data[0];
      inputMarca.value = data[1];
      inputConstanciaInscripcion.value = data[2];
    } else if (nombreFormulario == "conductores") {
      campoClave.value = data[0];
      inputNroLicencia.value = data[0];
      inputDni.value = data[1];
      inputApellidos.value = data[2];
      inputNombres.value = data[3];
      inputTelefono.value = data[4];
    }
  };
  const limpiarInputs = () => {
    if (modalName == "productos") {
      inputUnidadMedida.value = "";
      inputDescripcion.value = "";
    } else if (modalName == "vehiculos") {
      inputMarca.value = "";
      inputPlaca.value = "";
      inputConstanciaInscripcion.value = "";
    } else if (modalName == "conductores") {
      inputNroLicencia.value = "";
      inputDni.value = "";
      inputApellidos.value = "";
      inputNombres.value = "";
      inputTelefono.value = "";
    }
  };
}
