@extends('layouts.app')


@section('title','listWord')

@section('content')

<link href="{{ asset('css/modalGesture.css') }}" rel="stylesheet">
<script src="{{ asset('js/modalWordSettings.js') }}"></script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                    <ul class="list-group">
                        <li class="list-group-item">
                          <a href="/home">
                            <span class="badge badge-primary">Disciplinas</span>
                          </a>
                          <a href="/backCategory/{{$category_id}}">
                            <span class="badge badge-danger">Categorias</span>
                          </a>
                        </li>

                        <li class="list-group-item list-group-item active">Termos</li>
                        @if(count($words))
                            @foreach($words as $word)
                            <li class="list-group-item"><a href="#{{$word->id}}"  onclick="modalVideo('{{$word->id}}')">{{$word->word}}</a></li>
                            @endforeach
                        @else
                            <li class="list-group-item">Infelizmente esta categoria não possui termos cadastrados</li>
                        @endif
                    </ul>
            </div>
        </div>
    </div>
</div>
<div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    
                    <iframe id="cartoonVideo" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class=modal-footer>
                    <p align="left">Aprovação</p>
                    <div class="progress">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">Aprovação 80%</div>
                        </div>
                            
                    </div>
                    <button id="buttonY" type="button" class="btn btn-default btn-sm">Gostei</button>
                    <button id="buttonN" type="button" class="btn btn-default btn-sm">Não gostei</button>
                </div>
            </div>
        </div>

        <div id="loginModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        
                    </div>
                    <div class="modal-body">
                        <span>Faça login ou crie uma conta para poder registrar sua avaliação</span>
                        <div>
                            <p></p>
                            <a href="/login" class="btn btn-primary btn-sm">Entrar</a>
                            <a href="/register" class="btn btn-primary btn-sm">Criar conta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>
<script src="https://www.youtube.com/iframe_api"></script>

@endsection
