function selectCurso() {
    var area_f = form_cad.area_formacao
    var curso = form_cad.nome_curso

   console.log(area_f,curso);

    let request = new XMLHttpRequest()

    request.open('GET', 'admin.controller.php?acao=recuperar_curso&area_formacao='+area_f.value, true)
    
    request.onreadystatechange = () => {
      if (request.readyState == 4 && request.status ==200) {
         curso.innerHTML=request.responseText;
         curso.disabled=false
      }
    }
    request.send()
    
}


