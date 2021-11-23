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


rowData.forEach(element => {
    element.childNodes[0].addEventListener('click',()=>{
        modalBackground.classList.add('show-modal-bg')
        modalContainer.classList.add('show-modal')
        titleModal.innerText="Modificar producto";
        btnSubmitData.innerText="Modificar";
        llenarFormulario(modalName,element)
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
    let data=e.childNodes[1].value.split("_")
    if(nombreFormulario=='productos'){
        campoClave.value=data[0]
        inputUnidadMedida.value=data[1]
        inputDescripcion.value=data[2]
    }else if(nombreFormulario=='vehiculos'){
        campoClave.value=data[0]
        inputPlaca.value=data[0]
        inputMarca.value=data[1]
        inputConstanciaInscripcion.value=data[2]
    }
}
const limpiarInputs=()=>{
    inputUnidadMedida.value=""
    inputDescripcion.value=""
    inputMarca.value=""
    inputPlaca.value=""
    inputConstanciaInscripcion.value=""
}