<!-- TEMPLATE MASTER -->
@extends('dashboard.app')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Administradores Registrados</h4>
            <p class="card-description">
                <a class="btn btn-primary" href="{{ route('administrators') }}">
                    Registrar
                </a>
            </p>

            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Correo electrónico </th>
                            <th>Acciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)

                        <tr>
                            <td class="py-1">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td><a href="{{ route('updateadmin', ['id' => $users->id]) }}" class="btn btn-success">Editar</a></td>
                            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$users->id}}">Eliminar</button></td>
                        </tr>

                        <!-- MODAL -->
                        <div class="modal fade" id="modal{{$users->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Al eliminar el usuario  <strong>{{ $users->name }}</strong> no podra acceder a la plataforma de CMS. <br><br>
                                       
                                        ¿Está seguro que desea eliminar el usuario <strong>{{ $users->name }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No, cancelar</button>
                                        <form action="{{ route('deleteuser', [$users->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Sí, eliminar usuario</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>



@endsection