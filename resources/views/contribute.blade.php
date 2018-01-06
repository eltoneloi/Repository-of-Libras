@extends('layouts.app')

@section('title','contribute')

@section('content')

	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	        	@if($contributionSuccess == 'ok')
	        	<div class="alert alert-success">
	        		<p>Sua contribuição foi registrada com sucesso. Se desejar, continue contribuindo conosco</p>
	        	</div>
                @elseif($contributionSuccess == 'error')
                <div class="alert alert-danger">
                    <p>Você deve alterar sua conta para colaborador para poder cadastrar novos termos</p>
                </div>
	        	@endif
	            <div class="panel panel-default">
	            	<label class="list-group-item">Contribua</label>
	            </div>
	            @if(count($contexts) > 0)

	           	<form class="form-horizontal" method="POST" action="{{ route('createContribute') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('context') ? ' has-error' : '' }}">
                            <label for="context" class="col-md-4 control-label">Disciplina</label>

                            <div class="col-md-6">
                                <select class="form-control" id="context" name="context">
                                        <option></option>
                                        @foreach ($contexts as $context)
                                        <option value="{{ $context->id }}"
                                        @if ($context == old('context'))
                                            selected="selected"
                                        @endif
                                        >{{ $context->contName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('caregory') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Categoria</label>

                            <div class="col-md-6">
                                <select class="form-control" id="category" name="category" required="required">
           								<option value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('word') ? ' has-error' : '' }}">
                            <label for="word" class="col-md-4 control-label">Termo</label>

                            <div class="col-md-6">
                                <input id="word" type="text" class="form-control" name="word" value="{{ old('word') }}" required>

                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('word') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('youtubeEmbed') ? ' has-error' : '' }}">
                            <label for="youtubeEmbed" class="col-md-4 control-label">Link para video do Youtube</label>

                            <div class="col-md-6">
                                <input id="youtubeEmbed" type="text" class="form-control" name="youtubeEmbed" value="{{ old('youtubeEmbed') }}" required>

                                @if ($errors->has('youtubeEmbed'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtubeEmbed') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                            </div>
                        </div>
	           	</form>
	           	@else
	           	<ul class="list-group">
	  				<li class="list-group-item">Disciplinas e categorias ainda não foram cadastradas</li>
	  			</ul>
	           	@endif
	        </div>
	    </div>
	</div>
     
   
@endsection