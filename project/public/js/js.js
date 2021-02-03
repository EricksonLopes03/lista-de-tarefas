function editar(id, descricaoTarefa, data, hora, listarpendente){
    //CRIANDO UM FORMULÁRIO PARA A EDIÇÃO DE CADA REGISTRO

    let form = document.createElement('form') //formulario
    if(listarpendente){
        form.action = 'tarefa_controller.php?listapendente=sim&acao=atualizar'
    }else{
        form.action = 'tarefa_controller.php?acao=atualizar'
    }
    
    form.method = 'post'

    let inputTarefa = document.createElement('input') //input para tarefa
    inputTarefa.type = 'text'
    inputTarefa.value = descricaoTarefa
    inputTarefa.name = 'tarefa'
    inputTarefa.className = 'form-control'

    let inputData = document.createElement('input') //input para data
    inputData.type = 'date'
    inputData.value = data
    inputData.name = 'data'
    inputData.className = 'form-control'

    let inputHora = document.createElement('input') //input para hora
    inputHora.type = 'time'
    inputHora.name = 'hora'
    inputHora.value = hora
    inputHora.className = 'form-control'

    let inputId = document.createElement('input') //botao submit
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id

    let btn = document.createElement('button') //botao submit
    btn.type = 'submit'
    btn.className = 'btn btn-primary'
    btn.innerHTML = 'Salvar alterações'
    

    //adicionando elementos dentro do form
    form.appendChild(inputTarefa)
    form.appendChild(inputData)
    form.appendChild(inputHora)
    form.appendChild(inputId)
    form.appendChild(btn)

    //atribuindo um id unico para cada registro retornado na div
    let tarefa = document.getElementById(`tarefa_${id}`)

    //limpando a div tarefa
    tarefa.innerHTML = ''

    //inserindo formulario na div
    tarefa.insertBefore(form, tarefa[0])
    

}

function remover(id, listarpendente){
    if(listarpendente){
        location.href = 'tarefa_controller.php?listapendente=sim&acao=excluir&id='+id
    }else{
        location.href = 'tarefa_controller.php?acao=excluir&id='+id
    }

}

function marcarTarefaRealizada(id, listarpendente){
    if(listarpendente){
        location.href = 'tarefa_controller.php?listapendente=sim&acao=marcarTarefaRealizada&id='+id
    }else{
        location.href = 'tarefa_controller.php?acao=marcarTarefaRealizada&id='+id
    }
}


