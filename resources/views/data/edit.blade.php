@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="put" id="target" action="{{ route('update') }}" enctype="multipart/form-data">
                    @csrf
                        <!-- User -->
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="pull-left">
                                    <a href="{{ route('welcome') }}" class="btn btn-primary btn-xs" ><i class="fa fa-arrow-circle-left"></i> Atras</a>
                                </div>
                                <center>modificar información</center>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input id="id" name="id" type="hidden" value="{{ $user['id'] }}" >
                                        <div class="form-group">
                                            <label for="username" >Usuario: </label>
                                            <input id="username" value="{{ $user['username'] }}" type="text" class="form-control @error('username') is-invalid @enderror" name="username"  tabindex="1"   autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                              
                                        </div>

                                        <div class="form-group">
                                            <label for="name" >Nombre: </label>
                                            <input id="name" type="text" value="{{ $user['name'] }}" class="form-control @error('name') is-invalid @enderror" name="name"  tabindex="1"  autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                              
                                        </div>

                                        <div class="form-group">
                                            <label for="website" >Sitio web</label>
                                            <input id="website" type="text" value="{{ $user['website'] }}" class="form-control @error('website') is-invalid @enderror" name="website"  tabindex="1"  autocomplete="website" autofocus>
                                            @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                              
                                        </div>

                                        <div class="form-group">
                                            <label for="company" >Compañia</label>
                                            <input id="company" type="text" value="{{ $user['company']['name'] }}" class="form-control @error('company') is-invalid @enderror" name="company"  tabindex="1"  autocomplete="company" autofocus>
                                            @error('company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                              
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" >Correo Eletronico</label>
                                            <input id="email" type="email" value="{{ $user['email'] }}" class="form-control @error('email') is-invalid @enderror" name="email"  tabindex="1"  autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                              
                                        </div>

                                        <div class="form-group">
                                            <label for="address" >Dirección</label>
                                            <input id="address" type="text" value="{{ $user['address']['street'] }}" class="form-control @error('address') is-invalid @enderror" name="address"  tabindex="1" autocomplete="address" autofocus>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                              
                                        </div>

                                        <div class="form-group">
                                            <label for="phone" >Telefono</label>
                                            <input id="phone" type="text" value="{{ $user['phone'] }}" class="form-control @error('phone') is-invalid @enderror" name="phone"  tabindex="1"   autocomplete="phone" autofocus>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror                              
                                        </div>

                                    </div>

                                     <!-- Post -->
                                    <div class="pull-left">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpublicacion"><i class="fa fa-plus"></i> Agregar publicación</button>
                                    </div>
                                    <!-- tabla post -->
                                    <table class="table" id="myTablepost">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">Cuerpo</th>
                                                <th scope="col">ver comentario</th>
                                                <th scope="col">add comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                    <input type="hidden" id="addpost" name="addpost" value="1">
                                    
                                    <!-- Album -->
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalalbum"><i class="fa fa-plus"></i> Agregar Album</button>
                                    </div>

                                    <!-- albunes -->
                                    <table class="table" id="myTablealbum">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">ver Fotos</th>
                                                <th scope="col">add Fotos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        </table>
                                    </div>
                                    <input type="hidden" id="addalbum" name="addalbum" value="1">

                                    <!-- modal publicacion -->
                                    <div class="modal fade" id="modalpublicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><center>Agregar publicacion</center></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="titlepost" >Titulo</label>
                                                        <input id="titlepost" type="text" class="form-control @error('titlepost') is-invalid @enderror" name="titlepost"  tabindex="1"  autocomplete="titlepost" autofocus>   
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="bodypost" >Cuerpo:</label>
                                                        <input id="bodypost" type="text" class="form-control @error('bodypost') is-invalid @enderror" name="bodypost"  tabindex="1" autocomplete="bodypost" autofocus>                             
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnclosepost" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button" onclick="addposts()" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal albumnes -->
                                    <div class="modal fade" id="modalalbum" tabindex="-1" role="dialog" aria-labelledby="modalalbum" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><center>Agregar Album</center></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="titlealbum" >Titulo</label>
                                                        <input id="titlealbum" type="text" class="form-control @error('titlealbum') is-invalid @enderror" name="titlealbum"  tabindex="1"  autocomplete="titlealbum" autofocus>        
                                                    </div>
                                                </div>

                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnclosealbum" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button"  onclick="addalbums()" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal comentraios add -->
                                    <div class="modal fade" id="modaladdcometario" tabindex="-1" role="dialog" aria-labelledby="modaladdcometario" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><center>Agregar comentarios</center></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="namecomment" >Name</label>
                                                        <input id="namecomment" type="text" class="form-control @error('namecomment') is-invalid @enderror" name="namecomment"  tabindex="1"  autocomplete="namecomment" autofocus>        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailcomment" >email</label>
                                                        <input id="emailcomment" type="text" class="form-control @error('emailcomment') is-invalid @enderror" name="emailcomment"  tabindex="1"  autocomplete="emailcomment" autofocus>        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bodycomment" >Cuerpo</label>
                                                        <input id="bodycomment" type="text" class="form-control @error('bodycomment') is-invalid @enderror" name="bodycomment"  tabindex="1"  autocomplete="bodycomment" autofocus>        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnclosecomment" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button"  onclick="addcomentarios()" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal comentraios view -->
                                    <div class="modal fade" id="modalviewcometario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><center>Ver comentarios</center></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <table class="table" id="myTablecomentraio">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Nombre</th>
                                                                    <th scope="col">Correo</th>
                                                                    <th scope="col">Cuerpo</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                        <input type="hidden" id="numbercomentario" name="numbercomentario" value="1">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal photo add -->
                                    <div class="modal fade" id="modaladdphotos" tabindex="-1" role="dialog" aria-labelledby="modaladdcometario" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><center>Agregar fotos</center></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="titlephoto" >Titulo</label>
                                                        <input id="titlephoto" type="text" class="form-control @error('titlephoto') is-invalid @enderror" name="title"  tabindex="1"  autocomplete="titlephoto" autofocus>        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="urlphoto" >URL</label>
                                                        <input id="urlphoto" type="text" class="form-control @error('urlphoto') is-invalid @enderror" name="title"  tabindex="1"  autocomplete="urlphoto" autofocus>        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="thumbanialurlphoto" >thumbnailUrl</label>
                                                        <input id="thumbanialurlphoto" type="text" class="form-control @error('thumbanialurlphoto') is-invalid @enderror" name="title"  tabindex="1"  autocomplete="thumbanialurlphoto" autofocus>        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"  id="btncerrarmodalphoto" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button"  onclick="addphoto()" class="btn btn-primary">Guardar cambios</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal photo view -->
                                    <div class="modal fade" id="modalviewphotos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><center>Agregar datos fotos</center></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table" id="myTablephoto">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Titulo</th>
                                                            <th scope="col">URL</th>
                                                            <th scope="col">Thumb URL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                <input type="hidden" id="numberphoto" name="numberphoto" value="1">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- boton guardar -->
                                    <div class="form-group">
                                        <center>
                                            <button type="submit" id="modificarUsuario" class="btn btn-primary">Modificar</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>       
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
<script>
$( document ).ready(function() {
    
}); 
    function addposts(){
       var bodypost = $("#bodypost").val()
       var titlepost = $("#titlepost").val()
       var addpostnumber = $("#addpost").val()
       
       $('#myTablepost').append('<tr><td>'+addpostnumber+'</td><td><input type="text" name="titlepost'+addpostnumber+'" value='+titlepost+' ></td><td><input type="text" name="bodypost'+addpostnumber+'" value='+bodypost+' ></td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalviewcometario" ><i class="fa fa-eye"></i></button></td><td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaladdcometario"><i class="fa fa-plus"></i></button></td></tr>');
       addpostnumber = parseInt(addpostnumber) + parseInt(1);
       $("#addpost").val(addpostnumber);
       $("#btnclosepost").click();

    }

    function addalbums(){
       var titlealbum = $("#titlealbum").val()
       var addalbumnumber = $("#addalbum").val()
       
       $('#myTablealbum').append('<tr><td>'+addalbumnumber+'</td><td><input type="text" name="titlealbum'+addalbumnumber+'" value='+titlealbum+' ><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalviewphotos"><i class="fa fa-eye"></i></button></td><td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaladdphotos"><i class="fa fa-plus"></i></button></td></tr>');
       addalbumnumber = parseInt(addalbumnumber) + parseInt(1);
       $("#addalbum").val(addalbumnumber);
       $("#btnclosealbum").click();

    }

    function addcomentarios(){
       var namecomment = $("#namecomment").val()
       var emailcomment = $("#emailcomment").val()
       var bodycomment = $("#bodycomment").val()
       var addcomentarionumber = $("#numbercomentario").val()
       
       $('#myTablecomentraio').append('<tr><td>'+addcomentarionumber+'</td><td><input type="text" name="namecomment'+addcomentarionumber+'" value='+namecomment+' ></td><td><input type="text" name="emailcomment'+addcomentarionumber+'" value='+emailcomment+' ></td><td><input type="text" name="bodycomment'+addcomentarionumber+'" value='+bodycomment+' ></td></tr>');
       $("#numbercomentario").val(addcomentarionumber);
       $("#btnclosecomment").click();


    }

    function addphoto(){
       var titlephoto = $("#titlephoto").val()
       var urlphoto = $("#urlphoto").val()
       var thumbanialurlphoto = $("#thumbanialurlphoto").val()
       var addphotonumber = $("#numberphoto").val()
       
       $('#myTablephoto').append('<tr><td>'+addphotonumber+'</td><td><input type="text" name="titlephoto'+addphotonumber+'" value='+titlephoto+' ></td><td><input type="text" name="urlphoto'+addphotonumber+'" value='+urlphoto+' ></td><td><input type="text" name="thumbanialurlphoto'+addphotonumber+'" value='+thumbanialurlphoto+' ></td></tr>');
       addphotonumber = parseInt(addphotonumber) + parseInt(1);
       $("#numberphoto").val(addphotonumber);
       $("#btncerrarmodalphoto").click();
    }

</script>
