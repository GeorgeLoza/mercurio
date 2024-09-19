<div x-data="gridComponent" x-init="initGrid()">
    <div id="usersGrid" class="ag-theme-alpine" style="height: 400px; width: 100%;"></div>
</div>
@script
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('gridComponent', () => ({
                users: @json($users),
                initGrid() {
                    if (typeof agGrid !== 'undefined') {
                        const columnDefs = [{
                                headerName: "ID",
                                field: "id"
                            },
                            {
                                headerName: "Código",
                                field: "codigo"
                            },
                            {
                                headerName: "Nombre",
                                field: "nombre"
                            },
                            {
                                headerName: "Apellido",
                                field: "apellido"
                            },
                            {
                                headerName: "Teléfono",
                                field: "telefono"
                            },
                            {
                                headerName: "Correo",
                                field: "correo"
                            },
                            {
                                headerName: "Rol",
                                field: "rol"
                            }
                        ];

                        const gridOptions = {
                            columnDefs: columnDefs,
                            rowData: this.users,
                            pagination: true
                        };

                        // Inicializar el grid
                        const gridDiv = document.querySelector('#usersGrid');
                        new agGrid.Grid(gridDiv, gridOptions);
                    } else {
                        console.error("AG Grid is not loaded");
                    }
                }
            }));
        });
    </script>
@endscript
