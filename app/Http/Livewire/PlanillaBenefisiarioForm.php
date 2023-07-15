<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TipoDesolisitudes;

class PlanillaBenefisiarioForm extends Component
{
    public $seleccionado = null;
    public $selec= '';
    public $contador = 1;
    public function contador(){
         $this->contador++;
    }
    public function render()
    {
        return view('livewire.planilla-benefisiario-form' , 
            ['solisitudes' => TipoDesolisitudes::all()]
        );
    }
}
