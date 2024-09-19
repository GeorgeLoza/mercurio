<?php

namespace App\Livewire;

use App\Models\Planta;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use PowerComponents\LivewirePowerGrid\Facades\Filter;

final class UserTable extends PowerGridComponent
{
    use WithExport;

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }
    public bool $showFilters = true;


    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): ?Builder
    {

        return User::query()->with('planta', 'division');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('codigo')
            ->add('nombre')
            ->add('apellido')
            ->add('telefono')
            ->add('correo')
            ->add('rol')
            ->add('planta_id', fn($user) => e($user->planta->nombre))
            ->add('division_id', fn($user) => e($user->division->nombre))
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Codigo', 'codigo')
                ->sortable()
                ->searchable(),

            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Apellido', 'apellido')
                ->sortable()
                ->searchable(),

            Column::make('Telefono', 'telefono')
                ->sortable()
                ->searchable(),

            Column::make('Correo', 'correo')
                ->sortable()
                ->searchable(),

            Column::make('Rol', 'rol')
                ->sortable()
                ->searchable(),

            Column::make('Planta', 'planta_id') // Muestra el nombre de la planta
                ->sortable()
                ->searchable(),
            Column::make('Division', 'division_id'),
            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('codigo', 'codigo')->placeholder('Buscar por código'),
            Filter::inputText('nombre', 'nombre')->placeholder('Buscar por nombre'),
            Filter::inputText('correo', 'correo')->placeholder('Buscar por correo'),
            Filter::select('planta_id', 'planta_id')
                ->dataSource(Planta::all())
                ->optionLabel('nombre') // Asegúrate de usar el campo correcto
                ->optionValue('id'),
            // Agrega un filtro para division_id si es necesario
        ];
    }


    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(User $row): array
    {
        return [
            Button::add('view')
                ->slot('Editar')
                ->class('text-sm bg-blue-500 hover:bg-blue-600 rounded py-1 px-2')
                ->openModal('usuario-component.editar', ['id' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
