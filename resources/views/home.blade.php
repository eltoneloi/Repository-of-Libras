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
                        @if (count($contexts) > 0)
                            <li class="list-group-item list-group-item active">Disciplinas</li>
                            @foreach($contexts as $context)
                            <li class="list-group-item"><a href="/category/{{$context->id}}">{{$context->contName}}</a></li>
                            @endforeach
                        @else
                            <li class="list-group-item">Infelzmente a aplicação não possui Disciplinas cadastradas</li>
                        @endif
                    </ul>
                    
               
                    
               
            </div>
        </div>
    </div>
</div>
@endsection
