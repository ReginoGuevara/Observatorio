<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Persona</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="persona_id"></label>
                        <input wire:model="persona_id" type="text" class="form-control" id="persona_id" placeholder="Persona Id">@error('persona_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombres"></label>
                        <input wire:model="nombres" type="text" class="form-control" id="nombres" placeholder="Nombres">@error('nombres') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos"></label>
                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos">@error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="genero"></label>
                        <input wire:model="genero" type="text" class="form-control" id="genero" placeholder="Genero">@error('genero') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto"></label>
                        <input wire:model="foto" type="text" class="form-control" id="foto" placeholder="Foto">@error('foto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="domicilio"></label>
                        <input wire:model="domicilio" type="text" class="form-control" id="domicilio" placeholder="Domicilio">@error('domicilio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="documento_nacional_identidad"></label>
                        <input wire:model="documento_nacional_identidad" type="text" class="form-control" id="documento_nacional_identidad" placeholder="Documento Nacional Identidad">@error('documento_nacional_identidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="orcid"></label>
                        <input wire:model="orcid" type="text" class="form-control" id="orcid" placeholder="Orcid">@error('orcid') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="identificador_registro_personas"></label>
                        <input wire:model="identificador_registro_personas" type="text" class="form-control" id="identificador_registro_personas" placeholder="Identificador Registro Personas">@error('identificador_registro_personas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="scopus_author_id"></label>
                        <input wire:model="scopus_author_id" type="text" class="form-control" id="scopus_author_id" placeholder="Scopus Author Id">@error('scopus_author_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="research_id"></label>
                        <input wire:model="research_id" type="text" class="form-control" id="research_id" placeholder="Research Id">@error('research_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="isni"></label>
                        <input wire:model="isni" type="text" class="form-control" id="isni" placeholder="Isni">@error('isni') <span class="error text-danger">{{ $message }}</span> @enderror
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
                <h5 class="modal-title" id="updateModalLabel">Update Persona</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="persona_id"></label>
                        <input wire:model="persona_id" type="text" class="form-control" id="persona_id" placeholder="Persona Id">@error('persona_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nombres"></label>
                        <input wire:model="nombres" type="text" class="form-control" id="nombres" placeholder="Nombres">@error('nombres') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos"></label>
                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos">@error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="genero"></label>
                        <input wire:model="genero" type="text" class="form-control" id="genero" placeholder="Genero">@error('genero') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto"></label>
                        <input wire:model="foto" type="text" class="form-control" id="foto" placeholder="Foto">@error('foto') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="domicilio"></label>
                        <input wire:model="domicilio" type="text" class="form-control" id="domicilio" placeholder="Domicilio">@error('domicilio') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="documento_nacional_identidad"></label>
                        <input wire:model="documento_nacional_identidad" type="text" class="form-control" id="documento_nacional_identidad" placeholder="Documento Nacional Identidad">@error('documento_nacional_identidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="orcid"></label>
                        <input wire:model="orcid" type="text" class="form-control" id="orcid" placeholder="Orcid">@error('orcid') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="identificador_registro_personas"></label>
                        <input wire:model="identificador_registro_personas" type="text" class="form-control" id="identificador_registro_personas" placeholder="Identificador Registro Personas">@error('identificador_registro_personas') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="scopus_author_id"></label>
                        <input wire:model="scopus_author_id" type="text" class="form-control" id="scopus_author_id" placeholder="Scopus Author Id">@error('scopus_author_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="research_id"></label>
                        <input wire:model="research_id" type="text" class="form-control" id="research_id" placeholder="Research Id">@error('research_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="isni"></label>
                        <input wire:model="isni" type="text" class="form-control" id="isni" placeholder="Isni">@error('isni') <span class="error text-danger">{{ $message }}</span> @enderror
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
