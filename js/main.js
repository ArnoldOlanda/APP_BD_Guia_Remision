const openModal=document.getElementById('btnOpenModal');
const closeModal=document.getElementById('btnCloseModal');
const modalBackground=document.querySelector('.modal-background');
const modalContainer=document.querySelector('.modal-container');

const rowData=document.querySelectorAll('.row');
const titleModal=document.getElementById('titleModal');
const btnSubmitData=document.getElementById('btnSubmitData')

//Inputs del formulario
const inputId=document.getElementById('idProd');
const inputUnidadMedida=document.getElementById('unidadMedida');
const inputDescripcion=document.getElementById('descripcion');

rowData.forEach(element => {
    element.childNodes[0].addEventListener('click',()=>{
        modalBackground.classList.add('show-modal-bg')
        modalContainer.classList.add('show-modal')
        titleModal.innerText="Modificar producto";
        btnSubmitData.innerText="Modificar";

        let data=element.childNodes[1].value.split("-")
        inputId.value=data[0]
        inputUnidadMedida.value=data[1]
        inputDescripcion.value=data[2]
    })
    
});

openModal.addEventListener("click",()=>{
    
    inputId.value=""
    inputUnidadMedida.value=""
    inputDescripcion.value=""
    modalBackground.classList.add('show-modal-bg')
    modalContainer.classList.add('show-modal')
})

closeModal.addEventListener('click',()=>{
    modalBackground.classList.remove('show-modal-bg')
    modalContainer.classList.remove('show-modal')
    titleModal.innerText="Nuevo producto";
    btnSubmitData.innerText="Registrar";
})