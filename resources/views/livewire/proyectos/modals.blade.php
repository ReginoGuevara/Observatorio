<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Proyecto</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="proyecto_id"></label>
                        <input wire:model="proyecto_id" type="text" class="form-control" id="proyecto_id" placeholder="Proyecto Id">@error('proyecto_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="codigo"></label>
                        <input wire:model="codigo" type="text" class="form-control" id="codigo" placeholder="Codigo">@error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="acronimo"></label>
                        <input wire:model="acronimo" type="text" class="form-control" id="acronimo" placeholder="Acronimo">@error('acronimo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_inicio"></label>
                        <input wire:model="fecha_de_inicio" type="text" class="form-control" id="fecha_de_inicio" placeholder="Fecha De Inicio">@error('fecha_de_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_finalizacion"></label>
                        <input wire:model="fecha_finalizacion" type="text" class="form-control" id="fecha_finalizacion" placeholder="Fecha Finalizacion">@error('fecha_finalizacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pagina_web"></label>
                        <input wire:model="pagina_web" type="text" class="form-control" id="pagina_web" placeholder="Pagina Web">@error('pagina_web') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="mandato"></label>
                        <input wire:model="mandato" type="text" class="form-control" id="mandato" placeholder="Mandato">@error('mandato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="uri"></label>
                        <input wire:model="uri" type="text" class="form-control" id="uri" placeholder="Uri">@error('uri') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_proyecto_cod__tipo_cod"></label>
                        <input wire:model="tipo_proyecto_cod__tipo_cod" type="text" class="form-control" id="tipo_proyecto_cod__tipo_cod" placeholder="Tipo Proyecto Cod  Tipo Cod">@error('tipo_proyecto_cod__tipo_cod') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoria_cod"></label>
                        <input wire:model="categoria_cod" type="text" class="form-control" id="categoria_cod" placeholder="Categoria Cod">@error('categoria_cod') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_cod"></label>
                        <input wire:model="estado_cod" type="text" class="form-control" id="estado_cod" placeholder="Estado Cod">@error('estado_cod') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Proyecto</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="proyecto_id"></label>
                        <input wire:model="proyecto_id" type="text" class="form-control" id="proyecto_id" placeholder="Proyecto Id">@error('proyecto_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="codigo"></label>
                        <input wire:model="codigo" type="text" class="form-control" id="codigo" placeholder="Codigo">@error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="acronimo"></label>
                        <input wire:model="acronimo" type="text" class="form-control" id="acronimo" placeholder="Acronimo">@error('acronimo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_inicio"></label>
                        <input wire:model="fecha_de_inicio" type="text" class="form-control" id="fecha_de_inicio" placeholder="Fecha De Inicio">@error('fecha_de_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_finalizacion"></label>
                        <input wire:model="fecha_finalizacion" type="text" class="form-control" id="fecha_finalizacion" placeholder="Fecha Finalizacion">@error('fecha_finalizacion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="pagina_web"></label>
                        <input wire:model="pagina_web" type="text" class="form-control" id="pagina_web" placeholder="Pagina Web">@error('pagina_web') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="mandato"></label>
                        <input wire:model="mandato" type="text" class="form-control" id="mandato" placeholder="Mandato">@error('mandato') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="uri"></label>
                        <input wire:model="uri" type="text" class="form-control" id="uri" placeholder="Uri">@error('uri') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_proyecto_cod__tipo_cod"></label>
                        <input wire:model="tipo_proyecto_cod__tipo_cod" type="text" class="form-control" id="tipo_proyecto_cod__tipo_cod" placeholder="Tipo Proyecto Cod  Tipo Cod">@error('tipo_proyecto_cod__tipo_cod') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="categoria_cod"></label>
                        <input wire:model="categoria_cod" type="text" class="form-control" id="categoria_cod" placeholder="Categoria Cod">@error('categoria_cod') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_cod"></label>
                        <input wire:model="estado_cod" type="text" class="form-control" id="estado_cod" placeholder="Estado Cod">@error('estado_cod') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
