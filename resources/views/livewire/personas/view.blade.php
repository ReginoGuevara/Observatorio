@section('title', __('Personas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="bi-house-check-fill text-info"></i>
							Persona Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Personas">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="bi-plus-lg"></i>  Add Personas
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.personas.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Persona Id</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Genero</th>
								<th>Foto</th>
								<th>Domicilio</th>
								<th>Documento Nacional Identidad</th>
								<th>Orcid</th>
								<th>Identificador Registro Personas</th>
								<th>Scopus Author Id</th>
								<th>Research Id</th>
								<th>Isni</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($personas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->persona_id }}</td>
								<td>{{ $row->nombres }}</td>
								<td>{{ $row->apellidos }}</td>
								<td>{{ $row->genero }}</td>
								<td>{{ $row->foto }}</td>
								<td>{{ $row->domicilio }}</td>
								<td>{{ $row->documento_nacional_identidad }}</td>
								<td>{{ $row->orcid }}</td>
								<td>{{ $row->identificador_registro_personas }}</td>
								<td>{{ $row->scopus_author_id }}</td>
								<td>{{ $row->research_id }}</td>
								<td>{{ $row->isni }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Persona id {{$row->id}}? \nDeleted Personas cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Delete </a></li>  
										</ul>
									</div>								
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $personas->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>