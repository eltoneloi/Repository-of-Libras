@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Endereço de e-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmação de senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('typeAccount') ? ' has-error' : '' }}">
                            <label for="typeAccount" class="col-md-4 control-label">Tipo de conta</label>

                            <div class="col-md-6">
                                <select class="form-control" id="typeAccount" name="typeAccount">
                                    <option value="notSet"></option>
                                    @php
                                        $type = ['collaborator' => 'Colaborador', 'common' => 'Comum'];
                                    @endphp
                                        @foreach ($type as $key => $value)
                                        <option value="{{ $key }}"
                                        >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="formChangeable">
                        <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                            <label for="institution" class="col-md-4 control-label">Instituicao vinculada</label>

                            <div class="col-md-6">
                                <input id="institution" type="text" class="form-control" name="institution" @if(old('institution') == 'notSet')
                                    value=""
                                @else
                                    value="{{ old('institution') }}"
                                @endif required>
                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div  class="form-group{{ $errors->has('lattes') ? ' has-error' : '' }}">
                            <label for="lattes" class="col-md-4 control-label">Link de currículo Lattes</label>

                            <div class="col-md-6">
                                <input id="lattes" type="text" class="form-control" name="lattes" @if(old('lattes') == 'notSet')
                                    value=""
                                @else
                                    value="{{ old('lattes') }}"
                                @endif required>

                                @if ($errors->has('lattes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lattes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div  class="form-group{{ $errors->has('academicTitle') ? ' has-error' : '' }}">
                            <label for="academicTitle" class="col-md-4 control-label">Titulação</label>

                            <div class="col-md-6">
                                <select class="form-control" id="academicTitle" name="academicTitle">
                                    <option value="notSet"></option>
                                    @php
                                        $options = ['doctor' => 'Doutor', 'master' => 'Mestre', 'graduate' => 'Bacharel'];
                                    @endphp
                                        @foreach ($options as $key => $value)
                                        <option value="{{ $key }}"
                                        @if ($key == old('academicTitle'))
                                            selected="selected"
                                        @endif
                                        >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
