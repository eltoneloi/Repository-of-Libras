function modalSettings(){
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });

});
}

//Recupera e adiciona o iframe e os buttons  do gesto
function modalVideo(id){
    $.get('/word/'+id, function(gesture){
        $('#cartoonVideo').replaceWith('<iframe id="cartoonVideo" width="560" height="315" src="' + gesture.gestFile +'" frameborder="0" allowfullscreen>');
        $('#buttonY').replaceWith('<button id="buttonY" onClick="evaluationYes('+gesture.id+')" type="button" class="btn btn-default btn-sm">Gostei</button>');
        $('#buttonN').replaceWith('<button id="buttonN" onClick="evaluationNo('+gesture.id+')" type="button" class="btn btn-default btn-sm">Não gostei</button>');
        //Carrega os parametros de avaliação
        updateEvaluationBar(gesture.id);
        //Faz o bloqueio de buttons de avaliação caso o usuario já tenha avaliado o gesto.
        blockButtonEvaluation(gesture.id);
    });

    //Exibe o modal
    $('#myModal').modal();
    
}

//Faz o bloqueio de buttons de avaliação caso o usuario já tenha avaliado o gesto.
function blockButtonEvaluation(gesture_id){
    $.get('/blockButtonEvaluation/'+gesture_id,function(evaluation){
        //faz o bloqueio do button de gostei e desbloqueia o não gostei
        if(evaluation.liked_it == 'y'){
            $('#buttonY').replaceWith('<button id="buttonY" type="button" class="btn btn-default btn-sm active">Gostei</button>');
            $('#buttonN').replaceWith('<button id="buttonN" onClick="evaluationNo('+evaluation.gesture_id+')" type="button" class="btn btn-default btn-sm">Não gostei</button>');
        }
        //faz o bloquei do button de não gostei e desbloqueia o de gostei
        else if(evaluation.liked_it == 'n'){
            $('#buttonN').replaceWith('<button id="buttonN" type="button" class="btn btn-default btn-sm active">Não gostei</button>');
            $('#buttonY').replaceWith('<button id="buttonY" onClick="evaluationYes('+evaluation.gesture_id+')" type="button" class="btn btn-default btn-sm">Gostei</button>');
        }
    });
}


//faz o update da barra de aprovação
function updateEvaluationBar(gesture_id){
    $.get('/evaluation/gesture/'+gesture_id, function(evaluation){
        
        if(evaluation < 0)
            $('.progress-bar').replaceWith('<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>');
        else
            $('.progress-bar').replaceWith('<div class="progress-bar" role="progressbar" style="width: '+evaluation+'%;" aria-valuenow="'+evaluation+'" aria-valuemin="0" aria-valuemax="100">'+evaluation+'%</div>');
    });
}

//Faz a avalaição como gostei
function evaluationYes(gesture_id){
    $.get('/checkAuthenticationToEvaluate',function(data){
        if(data == true){
            $.get('/gesture/'+gesture_id+'/createEvaluation/y',function(data){
                updateEvaluationBar(gesture_id);
                blockButtonEvaluation(gesture_id);
        });
        }
        else{
            $('#loginModal').modal();
        }
    }); 
}
    
//faz a avaliação cmo não gostei
function evaluationNo(gesture_id){
    //Faz a verificação de autenticação de usuario
   $.get('/checkAuthenticationToEvaluate',function(data){
        //Só dá a resposta caso o usuairo esteja autenticado
        if(data == true){
            $.get('/gesture/'+gesture_id+'/createEvaluation/n',function(data){
                updateEvaluationBar(gesture_id);
                blockButtonEvaluation(gesture_id);
        });
        }
        //Se não estiver logado abre o modal com opção de login e criação de conta
        else{
            $('#loginModal').modal();
        }
    }); 
   
}


