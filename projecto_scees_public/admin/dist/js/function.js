function selectAutoRadio(radioValue,genero) {
    var selectRadio = document.getElementsByName(genero)
    for (let i = 0; i < selectRadio.length; i++) {
        if (selectRadio[i].value == radioValue) {
            selectRadio[i].checked = true
        }
    }
}
function selectAutoOption(optionValue,idSeletc) {
    var selectOption = document.getElementById(idSeletc)
    
   for (let i = 0; i < selectOption.length; i++) {
        if (selectOption[i].value == optionValue) {
            selectOption[i].selected=true
        }
    }
}
onsubmit = (e) => {
    var nome=form_cad.name
    var genero=form_cad.genero
    var pais=form_cad.pais
    var cargo=form_cad.cargo
    var email=form_cad.email
    //var bi=form_cad.bi
    var data_nascimento=form_cad.data_nascimento

   
    if (nome.value=='') {
        alert('Preencha o campo Nome')
        nome.focus()
        nome.style.borderColor="red"
        e.preventDefault()
    } else  if (email.value=='') {
        alert('Preencha o campo Email')
        email.focus()
        email.style.borderColor="red"
        e.preventDefault()
    } else  if (pais.value=='') {
        alert('Preencha o campo Pais')
        pais.focus()
        pais.style.borderColor="red"
        e.preventDefault()
    }else  if (cargo.value=='') {
        alert('Preencha o campo Cargo')
        cargo.focus()
        cargo.style.borderColor="red"
        e.preventDefault()
    } else  if (phone1.value=='') {
        alert('Preencha o campo Telefone 1')
        phone1.focus()
        phone1.style.borderColor="red"
        e.preventDefault()
    } else  if (provincia.value=='') {
        alert('Preencha o campo Provincia')
        provincia.focus()
        provincia.style.borderColor="red"
        e.preventDefault()
    }else  if (cargo.value=='') {
        alert('Preencha o campo Cargo')
        cargo.focus()
        cargo.style.borderColor="red"
        e.preventDefault()
    } else  if (data_nascimento.value=='') {
        alert('Preencha o campo Provincia')
        data_nascimento.focus()
        data_nascimento.style.borderColor="red"
        e.preventDefault()
    } 
}
