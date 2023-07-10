<div>
    <form wire:submit.prevent="saveData">
        @foreach ($inputs as $index => $input)
            <div class="input-group">
                <input type="text" wire:model="inputs.{{ $index }}.marca" placeholder="Marca" />
                @error('inputs.'.$index.'.marca') <span class="error">{{ $message }}</span> @enderror

                <input type="text" wire:model="inputs.{{ $index }}.modelo" placeholder="Modelo" />
                @error('inputs.'.$index.'.modelo') <span class="error">{{ $message }}</span> @enderror

                <input type="text" wire:model="inputs.{{ $index }}.matricula" placeholder="Matrícula" />
                @error('inputs.'.$index.'.matricula') <span class="error">{{ $message }}</span> @enderror

                <input type="date" wire:model="inputs.{{ $index }}.data_matricula" placeholder="Data de Agendamento" />
                @error('inputs.'.$index.'.data_matricula') <span class="error">{{ $message }}</span> @enderror

                <select wire:model="inputs.{{ $index }}.tipo_veiculo">
                    <option value="">Selecione</option>
                    <option value="Ligeiro" selected>Ligeiro</option>
                    <option value="Pesado">Pesado</option>
                    <option value="Reboque">Reboque</option>
                    <option value="Semi-reboque">Semi-reboque</option>
                    <option value="Motociclo">Motociclo</option>
                    <option value="Triciclo">Triciclo</option>
                    <option value="Quadriciclo">Quadriciclo</option>
                    <option value="Híbrido">Híbrido</option>
                </select>

                <select wire:model="inputs.{{ $index }}.combustivel">
                    <option value="">Selecione</option>
                    <option value="Gasolina" selected>Gasolina</option>
                    <option value="Gasóleo">Gasóleo</option>
                    <option value="Gás">Gás</option>
                    <option value="Eléctrico">Eléctrico</option>
                    <option value="Híbrido">Híbrido</option>
                </select>
            </div>
        @endforeach

        <button type="button" wire:click="addInput">Adicionar Input</button>
        <button type="submit">Enviar</button>
    </form>
</div>
