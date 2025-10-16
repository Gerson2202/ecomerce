<?php
namespace App\Livewire;

use App\Models\Dimension;
use App\Models\Numeral;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\ValidationException;

class GestionNumeralesDimensiones extends Component
{
    use WithPagination;

    public $numero;
    public $medida;
    public $numeralSeleccionado;
    public $editNumero;
    public $editMedida;
    public $editDimensionId;
    public $page = 1;
    public $nombreNumeral;

    protected $rules = [
        'numero' => 'required|integer|unique:numerals,numero',
        'medida' => 'required|string|max:255',
        'editNumero' => 'required|integer|unique:numerals,numero',
        'editMedida' => 'required|string|max:255',
    ];

    public function gotoPage($page)
    {
        $this->page = $page;
    }

    public function seleccionarNumeral($numeralId)
    {
        $this->numeralSeleccionado = $numeralId;
        $numero = Numeral::find($numeralId);
        $this->nombreNumeral= $numero->numero;     
    }

    public function guardarNumeral()
    {
        $this->validate(['numero' => 'required|integer|unique:numerals,numero']);

        try {
            Numeral::create(['numero' => $this->numero]);
            $this->dispatch('notify', type: 'success', message: 'Numeral creado exitosamente');
            $this->reset('numero');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Error al crear numeral: ' . $e->getMessage());
        }
    }

    public function guardarDimension()
    {
        $this->validate([
            'medida' => 'required|string|max:255',
            'numeralSeleccionado' => 'required|exists:numerals,id'
        ]);

        try {
            Dimension::create([
                'medida' => $this->medida,
                'numeral_id' => $this->numeralSeleccionado
            ]);
            $this->dispatch('notify', type: 'success', message: 'Dimensión agregada exitosamente');
            $this->reset('medida');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Error al agregar dimensión: ' . $e->getMessage());
        }
    }

    public function prepararEditarNumeral($numeralId)
    {
        $numeral = Numeral::findOrFail($numeralId);
        $this->numeralSeleccionado = $numeralId;
        $this->editNumero = $numeral->numero;
        $this->dispatch('mostrarModal', modal: '#editNumeralModal');
    }


    public function actualizarNumeral()
    {
        try {
            // Validar en español
            $this->validate([
                'editNumero' => [
                    'required',
                    'integer',  
                    'unique:numerals,numero,' . $this->numeralSeleccionado,
                ],
            ], [
                // Mensajes personalizados
                'editNumero.required' => 'El número es obligatorio.',
                'editNumero.integer' => 'El número debe ser un valor numérico.',
                'editNumero.unique' => 'Este número ya existe en el sistema.',
            ]);

            // Actualizar el numeral
            Numeral::find($this->numeralSeleccionado)->update([
                'numero' => $this->editNumero,
            ]);

            // Notificar éxito y cerrar modal
            $this->dispatch('notify', type: 'success', message: 'Numeral actualizado correctamente.');
            $this->dispatch('cerrarModal', modal: '#editNumeralModal');
            $this->reset(['editNumero']);
        } catch (ValidationException $e) {
            // Capturar el primer error y mostrarlo con Toastr
            $mensaje = collect($e->validator->errors()->all())->first();
            $this->dispatch('notify', type: 'error', message: $mensaje);
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Ocurrió un error: ' . $e->getMessage());
        }
    }


    public function eliminarNumeral($numeralId)
    {
        try {
            Numeral::findOrFail($numeralId)->delete();
            $this->dispatch('notify', type: 'success', message: 'Numeral eliminado correctamente');
            $this->numeralSeleccionado = null;
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Error al eliminar numeral: El numeral esta siendo usando en articulos');
        }
    }

    public function prepararEditarDimension($dimensionId)
    {
        $dimension = Dimension::findOrFail($dimensionId);
        $this->editDimensionId = $dimensionId;
        $this->editMedida = $dimension->medida;
        $this->dispatch('mostrarModal', modal: '#editDimensionModal');
    }

   public function actualizarDimension()
    {
        try {
            // Validación con mensajes personalizados
            $validated = $this->validate(
                [
                    'editMedida' => 'required|string|max:255',
                ],
                [
                    'editMedida.required' => 'El campo medida es obligatorio.',
                    'editMedida.string'   => 'El campo medida debe ser un texto válido.',
                    'editMedida.max'      => 'El campo medida no puede tener más de 255 caracteres.',
                ]
            );

            // Buscar la dimensión
            $dimension = Dimension::find($this->editDimensionId);

            if (!$dimension) {
                throw new \Exception("No se encontró la dimensión con ID {$this->editDimensionId}");
            }

            // Actualizar
            $dimension->update([
                'medida' => $this->editMedida,
            ]);

            // Éxito
            $this->dispatch('notify', type: 'success', message: 'Dimensión actualizada correctamente');
            $this->dispatch('cerrarModal', modal: '#editDimensionModal');
            $this->reset(['editMedida', 'editDimensionId']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura errores de validación y muestra el primero
            $mensaje = collect($e->validator->errors()->all())->first();
            $this->dispatch('notify', type: 'error', message: $mensaje);
        } catch (\Exception $e) {
            // Otros errores
            $this->dispatch('notify', type: 'error', message: 'Error al actualizar dimensión: ' . $e->getMessage());
        }
    }



    public function eliminarDimension($dimensionId)
    {
        try {
            Dimension::findOrFail($dimensionId)->delete();
            $this->dispatch('notify', type: 'success', message: 'Dimensión eliminada correctamente');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'error', message: 'Error al eliminar dimensión: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $numerals = Numeral::withCount('dimensiones')
            ->orderBy('numero')
            ->paginate(10, ['*'], 'page', $this->page);

        $currentNumeral = $this->numeralSeleccionado
            ? Numeral::with('dimensiones')->find($this->numeralSeleccionado)
            : null;

        return view('livewire.gestion-numerales-dimensiones', [
            'numerals' => $numerals,
            'currentNumeral' => $currentNumeral
        ]);
    }
}