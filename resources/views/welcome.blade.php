@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white"><center>Información</center></div>
                <div class="card-body">
                    <div class="pull-right">
                        <div class="btn-group">
                        <a href="{{ route('create') }}"  class="btn btn-info" >Añadir data <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Completo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </thead>
                            <tbody>
                            @foreach($datos as $data)  
                            <tr>
                                <td>{{$data['id'] }}</td>               
                                <td>{{$data['title'] }}</td>
                                <td>{{$data['completed'] }}</td>
                                <td><a class="btn btn-primary" href="{{ url('edit/'.$data['userId']) }}" ><i class="fa fa-pencil"></i></a></td>
                                <td>
                                    <button class="btn btn-danger" onclick="deleted( {{ $data['userId'] }} ) " type="submit"><i class="fa fa-trash"></i></button>
                                </td>
                                </tr>
                                @endforeach

                               
                            </tr>
                           
                           
                            </tbody>
                        </table>                             
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script  type="text/javascript">
    function deleted(id){  
        swal({
            title: "Esta seguro de eliminar?",
            text: "Usuario id: "+id,
            buttons: true,
            closeModal: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var parametros = {
                    "_token": "{{ csrf_token() }}",
                    "id":id
                }
                $.ajax({
                    type: "get",
                    url: "delete/"+id,
                    data: parametros,
                    success: function(status){
                        if(status == 200){
                            swal("Eliminacion del registro "+id, "Se elimino con exito", "success");
                        }else{
                            swal("No se pudo eliminar", "Lo sentimos", "danger");
                        }
                }
                });

            
            } 
        });
    }
</script>