@extends('layout.principal')
@section('conteudo')
    <form  action="salvar" method="post">
        <fieldset>
            <!-- Form Name -->
            <input type="hidden"
                   name="_token" value="{{ csrf_token() }}" />
            <div class="container-fluid">
                <section class="container">
                    <div class="container-page">
                        <div class="col-md-6">
                            <h2 class="dark-grey">Cadastrar novo setor</h2>

                            <div class="form-group col-lg-12">
                                <label>@lang('messages.descricao')</label>
                                <input type="text" name="descricao" class="form-control" id="" value="{{ old('descricao') }}">
                            </div>

                            <div class="form-group col-lg-7">
                                <label>@lang('messages.sala')</label>
                                <select class="selectpicker" name="sala_id">
                                    @foreach($salas as $sala)
                                        <option value="{{ $sala->id }}">{{ $sala->descricao }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('messages.responsavel')</label><br/>
                                <select class="selectpicker" name="servidor_id">
                                    @foreach($servidores as $servidor)
                                        <option value="{{ $servidor->id }}">{{ $servidor->nome }} - {{ $servidor->cargo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-lg-8">
                                <label>@lang('messages.curso')</label>
                                <select class="selectpicker" name="curso_id">
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn-inverse btn-large btn-block">Registrar</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </fieldset>
    </form>
@stop