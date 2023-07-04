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
                    <div class="card-body {{ $errors->has('service_id') ? ' has-error' : '' }}">
                        <select wire:model="service_id" class="form-control" id="service_id">
                            <option value="">Selecione um serviço</option>
                            @foreach ($servicos as $valor => $servico)
                                <option value="{{ $valor }}">{{ $servico }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('service_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('service_id') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="employee_id">Atendente</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                        <select wire:model="employee_id" class="form-control" id="employee_id">
                            <option value="">Selecione o atendente</option>
                            @foreach ($atendentes as $valor => $servico)
                                <option value="{{ $valor }}">{{ $servico }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('employee_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('employee_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card-header">
                            <label class="card-title mb-0" for="data">Data</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('data') ? ' has-error' : '' }}">
                            <input type="date" wire:model="data" class="form-control" id="data"/>

                            @if ($errors->has('data'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('data') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <label class="card-title mb-0" for="start_time">Hora</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('start_time') ? ' has-error' : '' }}">
                            <select wire:model="start_time" class="form-control" id="start_time">
                                @foreach ($horariosDisponiveis as $horario)
                                    <option value="{{ $horario }}">{{ $horario }}</option>
                                @endforeach
                            </select>
                           
                            @if($errors->has('start_time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('start_time') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="comments">Comentário</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('comments') ? ' has-error' : '' }}">
                        <textarea type="text" wire:model="comments" class="form-control" id="comments">{{{ $comments ?? '' }}}</textarea>
                        
                        @if($errors->has('comments'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comments') }}</strong>
                            </span>
                        @endif
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
                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="marca">Marca do Veículo</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('marca') ? ' has-error' : '' }}">
                        <input type="text" wire:model="marca" class="form-control" id="marca"/>

                        @if ($errors->has('marca'))
                            <span class="help-block">
                                <strong>{{ $errors->first('marca') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
    
                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="modelo">Modelo</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('modelo') ? ' has-error' : '' }}">
                        <input type="text" wire:model="modelo" class="form-control" id="modelo"/>

                        @if ($errors->has('modelo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('modelo') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card-header">
                            <label class="card-title mb-0" for="matricula">Matrícula</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('matricula') ? ' has-error' : '' }}">
                            <input type="text" wire:model="matricula" class="form-control" id="matricula"/>

                            @if ($errors->has('matricula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('matricula') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header">
                            <label class="card-title mb-0" for="data_matricula">Data de Matrícula</label>
                            <font color="red">*</font>
                        </div>
                        <div class="card-body {{ $errors->has('data_matricula') ? ' has-error' : '' }}">
                            <input type="date" wire:model="data_matricula" class="form-control" id="data_matricula"/>
                           
                            @if($errors->has('data_matricula'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('data_matricula') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="tipo_veiculo">Tipo de Veículo</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('tipo_veiculo') ? ' has-error' : '' }}">
                        <select wire:model="tipo_veiculo" class="form-control" id="tipo_veiculo">
                            <option value="Ligeiro" selected>Ligeiro</option>
                            <option value="Pesado">Pesado</option>
                            <option value="Reboque">Reboque</option>
                            <option value="Semi-reboque">Semi-reboque</option>
                            <option value="Motociclo">Motociclo</option>
                            <option value="Triciclo">Triciclo</option>
                            <option value="Quadriciclo">Quadriciclo</option>
                            <option value="Híbrido">Híbrido</option>
                        </select>

                        @if ($errors->has('tipo_veiculo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tipo_veiculo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="mb-2">
                    <div class="card-header">
                        <label class="card-title mb-0" for="combustivel">Combustível</label>
                        <font color="red">*</font>
                    </div>
                    <div class="card-body {{ $errors->has('combustivel') ? ' has-error' : '' }}">
                        <select wire:model="combustivel" class="form-control" id="combustivel">
                            <option value="Gasolina" selected>Gasolina</option>
                            <option value="Gasóleo">Gasóleo</option>
                            <option value="Gás">Gás</option>
                            <option value="Eléctrico">Eléctrico</option>
                            <option value="Híbrido">Híbrido</option>
                        </select>

                        @if ($errors->has('combustivel'))
                            <span class="help-block">
                                <strong>{{ $errors->first('combustivel') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button class="btn btn-primary-yellow nextBtn btn-lg pull-right mb-4" type="button" wire:click="secondStepSubmit">
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
                        <td>Servico:</td>
                        <td><strong>{{$service_id}}</strong></td>
                    </tr>
                    <tr>
                        <td>Data:</td>
                        <td><strong>{{$data}}</strong></td>
                    </tr>
                    <tr>
                        <td>Hora:</td>
                        <td><strong>{{$start_time}}</strong></td>
                    </tr>
                </table>
                <hr>
                <h4>Veículo Adicionado</h4>
                <table class="table">
                    <tr>
                        <td>Marca:</td>
                        <td><strong>{{$marca}}</strong></td>
                    </tr>
                    <tr>
                        <td>Modelo:</td>
                        <td><strong>{{$modelo}}</strong></td>
                    </tr>
                    <tr>
                        <td>Matrícula:</td>
                        <td><strong>{{$matricula}}</strong></td>
                    </tr>
                    <tr>
                        <td>Combustível:</td>
                        <td><strong>{{$combustivel}}</strong></td>
                    </tr>
                </table>
                
                <button class="btn btn-primary-yellow btn-lg pull-right mb-4" wire:click="submitForm" type="button">
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