const modalName=document.getElementById('modalPara').value
const modalBackground=document.querySelector('.modal-background');

const crearFormulario=(modal)=>{
    const fragment=document.createDocumentFragment()
    const form=document.createElement('FORM')
    const modalTitle=document.createElement('DIV')
    const modalBody=document.createElement('DIV')
    const modalFooter=document.createElement('DIV')
    const title=document.createElement('H3')
    const btnCancelar=document.createElement('BUTTON')
    const btnOk=document.createElement('BUTTON')

    
    form.setAttribute('method','POST')

    modalTitle.classList.add('modal-title')
    modalBody.classList.add('modal-body')
    modalFooter.classList.add('modal-footer')

    btnCancelar.setAttribute('type','button')
    btnCancelar.setAttribute('id','btnCloseModal')
    btnCancelar.classList.add('btn')
    btnCancelar.innerText='Cancelar'

    btnOk.setAttribute('type','submit')
    btnOk.setAttribute('id','btnSubmitData')
    btnOk.classList.add('btn')
    btnOk.innerText='Registrar'

    title.setAttribute('id','titleModal')
    form.classList.add('modal-container')
    const clave=document.createElement('INPUT')
    clave.setAttribute('type','hidden')
    clave.setAttribute('id','campoClave')
    clave.setAttribute('value','crear')
    clave.setAttribute('name','clave')
    if (modal=='productos') {
        form.setAttribute('action','./?ctrl=productos&acc=createOrModify')
        title.innerText="Nuevo producto"
        const unidadMedida=document.createElement('INPUT')
        const descripcion=document.createElement('INPUT')

        unidadMedida.setAttribute('type','text')
        unidadMedida.setAttribute('name','unidadMedida')
        unidadMedida.setAttribute('id','unidadMedida')
        unidadMedida.setAttribute('placeholder','Unidad de medida')
        unidadMedida.setAttribute('autocomplete','off')

        descripcion.setAttribute('name','descripcion')
        descripcion.setAttribute('id','descripcion')
        descripcion.setAttribute('placeholder','Descripcion')
        descripcion.setAttribute('autocomplete','off')
        descripcion.setAttribute('type','text')

        modalBody.appendChild(clave)
        modalBody.appendChild(unidadMedida)
        modalBody.appendChild(descripcion)
    } else if(modal=='vehiculos'){
        form.setAttribute('action','./?ctrl=vehiculos&acc=createOrModify')
        title.innerText="Nuevo vehiculo"
        const placa=document.createElement('INPUT')
        const marca=document.createElement('INPUT')
        const constanciaInsc=document.createElement('INPUT')

        placa.setAttribute('type','text')
        placa.setAttribute('name','placa')
        placa.setAttribute('id','placa')
        placa.setAttribute('placeholder','Numero de placa')
        placa.setAttribute('autocomplete','off')

        marca.setAttribute('type','text')
        marca.setAttribute('name','marca')
        marca.setAttribute('id','marca')
        marca.setAttribute('placeholder','Marca del vehiculo')
        marca.setAttribute('autocomplete','off')

        constanciaInsc.setAttribute('type','text')
        constanciaInsc.setAttribute('name','constanciaInscripcion')
        constanciaInsc.setAttribute('id','constanciaInscripcion')
        constanciaInsc.setAttribute('placeholder','Numero de constancia de inscripcion')
        constanciaInsc.setAttribute('autocomplete','off')
        
        modalBody.appendChild(clave)
        modalBody.appendChild(placa)
        modalBody.appendChild(marca)
        modalBody.appendChild(constanciaInsc)

    }else if(modal=='conductores'){

        form.setAttribute('action','./?ctrl=conductores&acc=createOrModify')
        title.innerText="Nuevo Conductor"
        const nroLicencia=document.createElement('INPUT')
        const dni=document.createElement('INPUT')
        const apellidos=document.createElement('INPUT')
        const nombres=document.createElement('INPUT')
        const telefono=document.createElement('INPUT')

        nroLicencia.setAttribute('type','text')
        nroLicencia.setAttribute('name','nroLicencia')
        nroLicencia.setAttribute('id','nroLicencia')
        nroLicencia.setAttribute('placeholder','Numero de licencia de conducir')
        nroLicencia.setAttribute('autocomplete','off')

        dni.setAttribute('type','text')
        dni.setAttribute('name','dni')
        dni.setAttribute('id','dni')
        dni.setAttribute('placeholder','Numero de DNI')
        dni.setAttribute('autocomplete','off')

        apellidos.setAttribute('type','text')
        apellidos.setAttribute('name','apellidos')
        apellidos.setAttribute('id','apellidos')
        apellidos.setAttribute('placeholder','Apellidos')
        apellidos.setAttribute('autocomplete','off')

        nombres.setAttribute('type','text')
        nombres.setAttribute('name','nombres')
        nombres.setAttribute('id','nombres')
        nombres.setAttribute('placeholder','Nombres')
        nombres.setAttribute('autocomplete','off')

        telefono.setAttribute('type','text')
        telefono.setAttribute('name','telefono')
        telefono.setAttribute('id','telefono')
        telefono.setAttribute('placeholder','Numero de telefono')
        telefono.setAttribute('autocomplete','off')

        modalBody.appendChild(clave)
        modalBody.appendChild(nroLicencia)
        modalBody.appendChild(dni)
        modalBody.appendChild(apellidos)
        modalBody.appendChild(nombres)
        modalBody.appendChild(telefono)
    }else if(modal=='natural'){
        form.setAttribute('action','./?ctrl=clientes&acc=createOrModifyNatural')
        title.innerText="Nuevo Cliente Natural"
        const dni=document.createElement('INPUT')
        const nombre=document.createElement('INPUT')
		const apellidos=document.createElement('INPUT')
        const direccion=document.createElement('INPUT')
		const telefono=document.createElement('INPUT')

        dni.setAttribute('type','text')
        dni.setAttribute('name','dni_natural')
        dni.setAttribute('id','dni_natural')
        dni.setAttribute('placeholder','Numero de DNI')
        dni.setAttribute('autocomplete','off')

        nombre.setAttribute('type','text')
        nombre.setAttribute('name','nombres_natural')
        nombre.setAttribute('id','nombres_natural')
        nombre.setAttribute('placeholder','Nombres')
        nombre.setAttribute('autocomplete','off')
		
		apellidos.setAttribute('type','text')
        apellidos.setAttribute('name','apellidos_natural')
        apellidos.setAttribute('id','apellidos_natural')
        apellidos.setAttribute('placeholder','Apellidos')
        apellidos.setAttribute('autocomplete','off')

        direccion.setAttribute('type','text')
        direccion.setAttribute('name','direccion_natural')
        direccion.setAttribute('id','direccion_natural')
        direccion.setAttribute('placeholder','Direccion')
        direccion.setAttribute('autocomplete','off')
        
		telefono.setAttribute('type','text')
        telefono.setAttribute('name','telefono_natural')
        telefono.setAttribute('id','telefono_natural')
        telefono.setAttribute('placeholder','Numero de telefono')
        telefono.setAttribute('autocomplete','off')
		
        modalBody.appendChild(clave)
        modalBody.appendChild(dni)
        modalBody.appendChild(nombre)
		modalBody.appendChild(apellidos)
        modalBody.appendChild(direccion)
		modalBody.appendChild(telefono)
    }else if(modal=='juridico'){
        form.setAttribute('action','./?ctrl=clientes&acc=createOrModifyJuridico')
        title.innerText="Nuevo Cliente Juridico"
        const ruc=document.createElement('INPUT')
        const nombre_empresa=document.createElement('INPUT')
        const direccion=document.createElement('INPUT')

        ruc.setAttribute('type','text')
        ruc.setAttribute('name','ruc')
        ruc.setAttribute('id','ruc')
        ruc.setAttribute('placeholder','Numero de ruc')
        ruc.setAttribute('autocomplete','off')

        nombre_empresa.setAttribute('type','text')
        nombre_empresa.setAttribute('name','nombre_empresa')
        nombre_empresa.setAttribute('id','nombre_empresa')
        nombre_empresa.setAttribute('placeholder','Nombre')
        nombre_empresa.setAttribute('autocomplete','off')

        direccion.setAttribute('type','text')
        direccion.setAttribute('name','direccion')
        direccion.setAttribute('id','direccion')
        direccion.setAttribute('placeholder','Direccion Domicilio fiscal')
        direccion.setAttribute('autocomplete','off')
        
        modalBody.appendChild(clave)
        modalBody.appendChild(ruc)
        modalBody.appendChild(nombre_empresa)
        modalBody.appendChild(direccion)

    }else if(modal=='detalleJuridico'){
		const ruc_doc= document.getElementById('ruc_cli').innerText
        form.setAttribute('action','./?ctrl=clientes&acc=createOrModifyDireccion')
        title.innerText="Nueva Direccion"
		const ruc_direc=document.createElement('INPUT')
        const cod_direc=document.createElement('INPUT')
        const direccion=document.createElement('INPUT')
		
		ruc_direc.setAttribute('type','hidden')
        ruc_direc.setAttribute('name','ruc_direccion')
        ruc_direc.setAttribute('id','ruc_direccion')
        ruc_direc.setAttribute('placeholder','Numero de ruc')
        ruc_direc.setAttribute('autocomplete','off')
		ruc_direc.setAttribute('value',ruc_doc)
		console.log(ruc_doc)
		
		cod_direc.setAttribute('type','hidden')
        cod_direc.setAttribute('name','cod_direc')
        cod_direc.setAttribute('id','cod_direc')
        cod_direc.setAttribute('placeholder','cod_direc')
        cod_direc.setAttribute('autocomplete','off')
		
        direccion.setAttribute('type','text')
        direccion.setAttribute('name','direccion_detalle')
        direccion.setAttribute('id','direccion_detalle')
        direccion.setAttribute('placeholder','Direccion')
        direccion.setAttribute('autocomplete','off')
        
        modalBody.appendChild(clave)
		modalBody.appendChild(ruc_direc)
		modalBody.appendChild(cod_direc)
        modalBody.appendChild(direccion)
    }
	
    modalTitle.appendChild(title)
    modalFooter.appendChild(btnCancelar)
    modalFooter.appendChild(btnOk)
    form.appendChild(modalTitle)
    form.appendChild(modalBody)
    form.appendChild(modalFooter)

    fragment.appendChild(form)
    modalBackground.appendChild(fragment)

}

crearFormulario(modalName)

const openModal=document.getElementById('btnOpenModal');
const closeModal=document.getElementById('btnCloseModal');
const modalContainer=document.querySelector('.modal-container');

const rowData=document.querySelectorAll('.row');
const titleModal=document.getElementById('titleModal');
const btnSubmitData=document.getElementById('btnSubmitData')

const campoClave=document.getElementById('campoClave');
//Inputs del formulario producto
const inputUnidadMedida=document.getElementById('unidadMedida');
const inputDescripcion=document.getElementById('descripcion');
//Inputs del formulario vehiculo
const inputPlaca=document.getElementById('placa')
const inputMarca=document.getElementById('marca')
const inputConstanciaInscripcion=document.getElementById('constanciaInscripcion')
//Inputs del formulario conductor
const inputNroLicencia=document.getElementById('nroLicencia')
const inputDni=document.getElementById('dni')
const inputApellidos=document.getElementById('apellidos')
const inputNombres=document.getElementById('nombres')
const inputTelefono=document.getElementById('telefono')
//Inputs del formulario cliente_natural
const inputDni_natural=document.getElementById('dni_natural')
const inputApellidos_natural=document.getElementById('apellidos_natural')
const inputNombres_natural=document.getElementById('nombres_natural')
const inputDireccion=document.getElementById('direccion_natural')
const inputTelefono_natural=document.getElementById('telefono_natural')

//Inputs del formulario cliente_juridico
const inputRuc_juridico=document.getElementById('ruc')
const inputNombre_empresa=document.getElementById('nombre_empresa')
const inputDireccionFis_juridico=document.getElementById('direccion')

//Inputs del formulario direccion_cliente_juridico
const inputRUC=document.getElementById('ruc_direccion')
const inputCod_direc=document.getElementById('cod_direc')
const inputDireccion_juridico=document.getElementById('direccion_detalle')


rowData.forEach(element => {
    element.childNodes[0].addEventListener('click',()=>{
        modalBackground.classList.add('show-modal-bg')
        modalContainer.classList.add('show-modal')
        titleModal.innerText="Modificar";
        btnSubmitData.innerText="Modificar";
        llenarFormulario(modalName,element)
    })

    element.childNodes[1].addEventListener('click',()=>{
        let deleteKey = element.childNodes[2].value.split('_')
		console.log(deleteKey[1])
        if(confirm("¿Estas seguro que deseas eliminar el registro?, es posible que algunos registros se eliminen")){
            if(modalName=='productos'){
                window.location.href = `./?ctrl=productos&acc=delete&clave=${deleteKey[0]}`;
            }else if(modalName=='vehiculos'){
                window.location.href = `./?ctrl=vehiculos&acc=delete&clave=${deleteKey[0]}`;
            }else if(modalName=='conductores'){
                window.location.href = `./?ctrl=conductores&acc=delete&clave=${deleteKey[0]}`;
            }else if(modalName=='natural'){
                window.location.href = `./?ctrl=clientes&acc=deleteNatural&clave=${deleteKey[0]}`;
            }else if(modalName=='juridico'){
                window.location.href = `./?ctrl=clientes&acc=deleteJuridico&clave=${deleteKey[0]}`;
            }else if(modalName=='detalleJuridico'){
                window.location.href = `./?ctrl=clientes&acc=deleteDetalle&clave=${deleteKey[0]}&cod=${deleteKey[1]}`;
            }
            
            
        }
    })
    
});

openModal.addEventListener("click",()=>{
    modalBackground.classList.add('show-modal-bg')
    modalContainer.classList.add('show-modal')
    limpiarInputs()
})

closeModal.addEventListener('click',()=>{
    modalBackground.classList.remove('show-modal-bg')
    modalContainer.classList.remove('show-modal')
    titleModal.innerText="Nuevo producto";
    btnSubmitData.innerText="Registrar";
    campoClave.value='crear'
})

const llenarFormulario=(nombreFormulario,e)=>{
    let data=e.lastChild.value.split("_")
    if(nombreFormulario=='productos'){
        campoClave.value=data[0]
        inputUnidadMedida.value=data[1]
        inputDescripcion.value=data[2]
    }else if(nombreFormulario=='vehiculos'){
        campoClave.value=data[0]
        inputPlaca.value=data[0]
        inputMarca.value=data[1]
        inputConstanciaInscripcion.value=data[2]
    }else if(nombreFormulario=='conductores'){
        campoClave.value=data[0]
        inputNroLicencia.value=data[0]
        inputDni.value=data[1]
        inputApellidos.value=data[2]
        inputNombres.value=data[3]
        inputTelefono.value=data[4]
    }else if(nombreFormulario=='natural'){
        campoClave.value=data[0]
        inputDni_natural.value=data[0]
        inputApellidos_natural.value=data[1]
        inputNombres_natural.value=data[2]
		inputDireccion.value=data[3]
        inputTelefono_natural.value=data[4]
		
    }else if(nombreFormulario=='juridico'){
        campoClave.value=data[0]
        inputRuc_juridico.value=data[0]
        inputNombre_empresa.value=data[1]
		inputDireccionFis_juridico.value=data[2]
		
    }else if(nombreFormulario=='detalleJuridico'){
		campoClave.value=data[0]
        //inputRUC.value=data[0]
		inputCod_direc.value=data[1]
		inputDireccion_juridico.value=data[2]
    }
}
const limpiarInputs=()=>{
    if(modalName=='productos'){
        inputUnidadMedida.value=""
        inputDescripcion.value=""
    }else if(modalName=='vehiculos'){
        inputMarca.value=""
        inputPlaca.value=""
        inputConstanciaInscripcion.value=""
    }else if(modalName=='conductores'){
        inputNroLicencia.value=''
        inputDni.value=''
        inputApellidos.value=''
        inputNombres.value=''
        inputTelefono.value=''
    }else if(modalName=='natural'){
        
        inputDni_natural.value=''
        inputApellidos_natural.value=''
        inputNombres_natural.value=''
		inputDireccion.value=''
        inputTelefono_natural.value=''
    }else if(modalName=='juridico'){
        
        inputRuc_juridico.value=''
		inputNombre_empresa.value=''
        inputDireccionFis_juridico.value=''
    }else if(modalName=='detalleJuridico'){
        
       	inputDireccion_juridico.value=''
    }
	
    

}