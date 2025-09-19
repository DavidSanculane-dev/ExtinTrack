@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Utilizadores')
@section('content_header_title', 'Gestão de Utilizadores')
@section('content_header_subtitle', 'Lista de Utilizadores')

{{-- Content body: main page content --}}

@section('content_body')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Utilizadores</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" >
                   Adicionar Utilizador 
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        
    </div>
   

    {{-- modal de adicionar utilizador --}}
    <div class="modal fade" id="modal-adicionar-utilizador">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adicionar Utilizador</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite o nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Digite o email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Tipo</label>
                            <select class="form-control" id="tipo">
                                <option>Administrador</option>
                                <option>Utilizador</option>
                                <option>Convidado</option>
                            </select>
                        </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush