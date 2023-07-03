<div class="mx-4">
    @if(!empty($successMessage))
        <div class="alert alert-success">
        {{ $successMessage }}
        </div>
    @endif
    
    <div class="stepwizard mt-2">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary-yellow' }}">1</a>
                <p>Passo 1</p>
            </div>
    
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary-yellow' }}">2</a>
                <p>Passo 2</p>
            </div>
    
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary-yellow' }}" disabled="disabled">3</a>
                <p>Passo 3</p>
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Passo 1: Agendamento</h3>
                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="service_id">Servico</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body">
                        <select wire:model="service_id" class="form-control" id="service_id">
                            <option value="">Selecione um serviço</option>
                            @foreach ($servicos as $valor => $servico)
                                <option value="{{ $valor }}">{{ $servico }}</option>
                            @endforeach
                        </select>

                        @error('service_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="employee_id">Atendente</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body">
                        <select wire:model="employee_id" class="form-control" id="employee_id">
                            <option value="">Selecione o atendente</option>
                            @foreach ($atendentes as $valor => $servico)
                                <option value="{{ $valor }}">{{ $servico }}</option>
                            @endforeach
                        </select>

                        @error('employee_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card-header">
                            <label class="card-title mb-0" for="data">Data</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <input type="date" wire:model="data" class="form-control" id="data"/>
                            @error('data') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <label class="card-title mb-0" for="start_time">Hora de Início</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body">
                            <select wire:model="start_time" class="form-control" id="start_time">
                                @foreach ($horariosDisponiveis as $horario)
                                    <option value="{{ $horario }}">{{ $horario }}</option>
                                @endforeach
                            </select>
                            @error('start_time') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="comments">Comentário</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body">
                        <textarea type="text" wire:model="comments" class="form-control" id="comments">{{{ $comments ?? '' }}}</textarea>
                        @error('comments') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
    
                <button class="btn btn-primary-yellow nextBtn btn-lg pull-right mb-4" wire:click="firstStepSubmit" type="button">
                    <span class="align-middle">Próximo</span>
                    <i class="align-middle" data-feather="arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Passo 2: Adicionar Viatura</h3>
                <div class="form-group mb-2">
                    <label for="description">Estado</label><br/>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="1" {{{ $start_time == '1' ? "checked" : "" }}}> Activo</label>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="0" {{{ $start_time == '0' ? "checked" : "" }}}> Não Activo</label>
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-group mb-2">
                    <label for="description">Estoque</label>
                    <input type="text" wire:model="stock" class="form-control" id="productAmount"/>
                    @error('stock') <span class="error">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-primary-yellow nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">
                    <span class="align-middle">Próximo</span>
                    <i class="align-middle" data-feather="arrow-right"></i>
                </button>
                <button class="btn btn-dark text-yellow1 nextBtn btn-lg pull-right mb-4" type="button" wire:click="back(1)">
                    <i class="align-middle" data-feather="arrow-left"></i>
                    <span class="align-middle">Voltar</span>
                </button>
    
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Passo 3: Guardar Dados</h3>
                <table class="table">
                    <tr>
                        <td>Nome do Produto:</td>
                        <td><strong>{{$start_time}}</strong></td>
                    </tr>
                    <tr>
                        <td>Quantidade:</td>
                        <td><strong>{{$start_time}}</strong></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td><strong>{{$start_time ? 'Activo' : 'Desactivo'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Description:</td>
                        <td><strong>{{$start_time}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Stock:</td>
                        <td><strong>{{$start_time}}</strong></td>
                    </tr>
                </table>
                
                <button class="btn btn-primary-yellow btn-lg pull-right" wire:click="submitForm" type="button">
                    <i class="align-middle" data-feather="save"></i>
                    <span class="align-middle">Guardar</span>
                </button>
                <button class="btn btn-dark text-yellow1 nextBtn btn-lg pull-right mb-4" type="button" wire:click="back(2)">
                    <i class="align-middle" data-feather="arrow-left"></i>
                    <span class="align-middle">Voltar</span>
                </button>
    
            </div>
    
        </div>
    
    </div>
    
</div>