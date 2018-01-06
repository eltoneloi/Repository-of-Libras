@extends('layouts.app')


@section('title','listCategory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                
                    <ul class="list-group">
                        <li class="list-group-item">
                          <a href="/home">
                            <span class="badge badge-primary">Disciplinas</span>
                          </a>
                        </li>
                        @if(count($categories))
                            <li class="list-group-item list-group-item active">Categorias</li>
                            @foreach($categories as $category)
                            <li class="list-group-item"><a href="/category/{{$category->id}}/words">{{$category->catName}}</a></li>
                            @endforeach
                        @else
                            <li class="list-group-item">Infelizmente não existem categorias cadastradas nessa disciplina</li>
                        @endif
                    </ul>
                    
               
                    
               
            </div>
        </div>
    </div>
</div>
@endsection
