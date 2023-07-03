<div>
    @if(!empty($successMessage))
        <div class="alert alert-success">
        {{ $successMessage }}
        </div>
    @endif
    
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Passo 1</p>
            </div>
    
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Passo 2</p>
            </div>
    
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <p>Passo 3</p>
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Passo 1</h3>
                <div class="form-group mb-2">
                    <label for="title">Nome do Produto:</label>
                    <input type="text" wire:model="name" class="form-control" id="taskTitle">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group mb-2">
                    <label for="description">Quantidade:</label>
                    <input type="text" wire:model="amount" class="form-control" id="productAmount"/>
                    @error('amount') <span class="error">{{ $message }}</span> @enderror
                </div>
                
                <div class="form-group mb-2">
                    <label for="description">Descrição:</label>
                    <textarea type="text" wire:model="description" class="form-control" id="taskDescription">{{{ $description ?? '' }}}</textarea>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>
    
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Próximo</button>
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Passo 2</h3>
                <div class="form-group mb-2">
                    <label for="description">Estado</label><br/>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="1" {{{ $status == '1' ? "checked" : "" }}}> Activo</label>
                    <label class="radio-inline"><input type="radio" wire:model="status" value="0" {{{ $status == '0' ? "checked" : "" }}}> Não Activo</label>
                    @error('status') <span class="error">{{ $message }}</span> @enderror
                </div>
    
                <div class="form-group mb-2">
                    <label for="description">Estoque</label>
                    <input type="text" wire:model="stock" class="form-control" id="productAmount"/>
                    @error('stock') <span class="error">{{ $message }}</span> @enderror
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Próximo</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Voltar</button>
    
            </div>
        </div>
    </div>
    
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Passo 3</h3>
                <table class="table">
                    <tr>
                        <td>Nome do Produto:</td>
                        <td><strong>{{$name}}</strong></td>
                    </tr>
                    <tr>
                        <td>Quantidade:</td>
                        <td><strong>{{$amount}}</strong></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td><strong>{{$status ? 'Activo' : 'Desactivo'}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Description:</td>
                        <td><strong>{{$description}}</strong></td>
                    </tr>
                    <tr>
                        <td>Product Stock:</td>
                        <td><strong>{{$stock}}</strong></td>
                    </tr>
                </table>
                
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Terminar</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Voltar</button>
    
            </div>
    
        </div>
    
    </div>
    
</div>