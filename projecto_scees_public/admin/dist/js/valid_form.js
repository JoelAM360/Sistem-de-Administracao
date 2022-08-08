function valida() {
    
    //Selecionando Elementos para validação
    var nome=form_cad.name.value
    var genero=form_cad.genero.value
    var pais=form_cad.pais.value
    var phone1=form_cad.phone1.value
    var provincia=form_cad.provincia.value
    var email=form_cad.email.value
    var bi=form_cad.bi.value
    var data_nascimento=form_cad.data_nascimento.value
    
   if (nome=='') {
    alert('Preencha o campo Nome')
    nome.focus()
    return false
   } else if (data_nascimento=='') {
    alert('Preencha o campo Data de nascimento')
    data_nascimento.focus()
    return false
    } else if (genero=='') {
    alert('Preencha o campo Gênero')
    form_cad.genero.focus()
    return false
    } else if (pais=='') {
    alert('Preencha o campo Nacionalidade')
    form_cad.pais.focus()
    return false
    } else if (provincia=='') {
      alert('Preencha o campo Provincia')
      form_cad.provincia.focus()
    return false
    }  else if (phone1=='') {
    alert('Preencha o campo Telefone1')
    form_cad.phone1.focus()
    return false
    } else if (email=='') {
    alert('Preencha o campo Email')
    form_cad.email.focus()
    return false
    } 

}
