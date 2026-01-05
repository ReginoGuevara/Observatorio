@section('title', __('Proyectos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="bi-house-check-fill text-info"></i>
							Proyecto Listing </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Proyectos">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="bi-plus-lg"></i>  Add Proyectos
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.proyectos.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Proyecto Id</th>
								<th>Codigo</th>
								<th>Acronimo</th>
								<th>Fecha De Inicio</th>
								<th>Fecha Finalizacion</th>
								<th>Pagina Web</th>
								<th>Mandato</th>
								<th>Uri</th>
								<th>Tipo Proyecto Cod  Tipo Cod</th>
								<th>Categoria Cod</th>
								<th>Estado Cod</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($proyectos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->proyecto_id }}</td>
								<td>{{ $row->codigo }}</td>
								<td>{{ $row->acronimo }}</td>
								<td>{{ $row->fecha_de_inicio }}</td>
								<td>{{ $row->fecha_finalizacion }}</td>
								<td>{{ $row->pagina_web }}</td>
								<td>{{ $row->mandato }}</td>
								<td>{{ $row->uri }}</td>
								<td>{{ $row->tipo_proyecto_cod__tipo_cod }}</td>
								<td>{{ $row->categoria_cod }}</td>
								<td>{{ $row->estado_cod }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="bi-pencil-square"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Proyecto id {{$row->id}}? \nDeleted Proyectos cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="bi-trash3-fill"></i> Delete </a></li>  
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
					<div class="float-end">{{ $proyectos->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>