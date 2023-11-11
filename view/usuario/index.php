<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('usuario');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla de Usuarios</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary" data-toggle='modal' data-target='#modalRegistrarUsuario'> <i
                                    class="fa fa-edit"></i> Registrar Usuario
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableUsuario" name="dataTableUsuario"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Nombre del usuario</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Gimnasio</th>
                                            <th>Plan Sistema</th>
                                            <th>Estatus del usuario</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--*****************************************MODALS****************************************-->
<!--------------------------------------------------------- Modal Registrar usuario----------------------------------------------->
<div class="modal fade" id="modalRegistrarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarUsuario"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Usuario <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarUsuario" enctype="multipart/form-data" name="formRegistrarUsuario"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Usuario</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span><label>Imagen del usuario (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    name="imagen" id="imagen" lang="es">
                                                <label class="custom-file-label" for="imagen">Seleccione
                                                    Fotografía</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre del Usuario (*)</label>
                                            <input type="text" class="form-control" id="nombreUsuario"
                                                name="nombreUsuario" placeholder="Nombre Usuario" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellidoPaternoUsuario"
                                                name="apellidoPaternoUsuario" placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellidoMaternoUsuario"
                                                name="apellidoMaternoUsuario" placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Teléfono (*)</label>
                                            <input type="text" class="form-control" id="telefonoUsuario"
                                                name="telefonoUsuario" placeholder="Telefono" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Correo (*)</label>
                                        <div class="input-group-prepend">
                                            <input type="email" id="correoUsuario" name="correoUsuario"
                                                class="form-control" placeholder="Correo">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Contraseña (*)</label>
                                        <div class="input-group-prepend">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Contraseña">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Dirección</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Calle(*)</label>
                                            <input type="text" class="form-control" id="calleUsuario"
                                                name="calleUsuario" placeholder="Calle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Estado (*)</label>
                                            <input type="text" name="estadoUsuario" id="estadoUsuario"
                                                class="form-control" placeholder="estado">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Municipio (*)</label>
                                            <input type="text" id="municipioUsuario" name="municipioUsuario"
                                                class="form-control" placeholder="Municipio">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia (*)</label>
                                            <input type="text" id="coloniaUsuario" name="coloniaUsuario"
                                                class="form-control" placeholder="Colonia">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input type="text" class="form-control" id="codigoPostalUsuario"
                                                name="codigoPostalUsuario" placeholder="Codigo Postal">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>Id Rol(*)</label>
                                    <select name="rolUsuario" id="rolUsuario" class="form-control pagoRegistrarRol" style="width:100%;">
                                            <option value="default">Seleccione Rol</option>
                                     </select>
                                    </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------- Modal Actualizar usuario----------------------------------------------->
<div class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalActualizarUsuario"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Usuario <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarUsuario" enctype="multipart/form-data" name="formActualizarUsuario"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">

                                <h3 class="card-title">Datos del Usuario</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <div style="display: none;" class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Id (*)</label>
                                                <input type="text" class="form-control" id="id_usuarioActualizar"
                                                    name="id_usuarioActualizar" placeholder="Id" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre del Usuario (*)</label>
                                            <input type="text" class="form-control" id="nombreUsuarioActualizar"
                                                name="nombreUsuarioActualizar" placeholder="Nombre Usuario" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" class="form-control"
                                                id="apellidoPaternoUsuarioActualizar"
                                                name="apellidoPaternoUsuarioActualizar"
                                                placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" class="form-control"
                                                id="apellidoMaternoUsuarioActualizar"
                                                name="apellidoMaternoUsuarioActualizar"
                                                placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input type="text" class="form-control"
                                                id="telefonoUsuarioActualizar"
                                                name="telefonoUsuarioActualizar"
                                                placeholder="Telefono" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="EmailUsuarioActualizar"
                                                name="EmailUsuarioActualizar" placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Dirección</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-around">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Calle</label>
                                            <input type="text" class="form-control" id="calleUsuarioActualizar"
                                                name="calleUsuarioActualizar" placeholder="Calle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" class="form-control" id="estadoUsuarioActualizar"
                                                name="estadoUsuarioActualizar" placeholder="Estado" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Municipio</label>
                                            <input type="text" class="form-control" id="municipioUsuarioActualizar"
                                                name="municipioUsuarioActualizar" placeholder="Municipio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Colonia</label>
                                            <input type="text" class="form-control" id="coloniaUsuarioActualizar"
                                                name="coloniaUsuarioActualizar" placeholder="Colonia" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Codigo Postal</label>
                                            <input type="text" class="form-control" id="codigopostalUsuarioActualizar"
                                                name="codigopostalUsuarioActualizar" placeholder="Codigo Postal" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Rol</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex align-items-center justify-content-center">
                                    <label for="idRolUsuarioActualizar" class="mr-2">Id Rol(*)</label>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="idRolUsuarioActualizar" id="idRolUsuarioActualizar" class="form-control pagoRegistrarRol" style="width:100%;">
                                                <option value="default">Seleccione Rol</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>


<!--------------------------------------------------------- Modal Detalle Usuario----------------------------------------------->
<div class="modal fade" id="modalDetalleUsuario" tabindex="-1" role="dialog" aria-labelledby="modalDetalleUsuario"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title"> Usuario <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" enctype="multipart/form-data" name="formConsulta" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Usuario</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Id (*)</label>
                                            <input type="text" disabled class="form-control" id="id_usuarioConsultar"
                                                name="id_usuarioConsultar" placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre del Usuario (*)</label>
                                            <input type="text" disabled class="form-control" id="nombreUsuarioConsultar"
                                                name="nombreUsuarioConsultar" placeholder="Nombre del usuario" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" disabled class="form-control"
                                                id="apellidoPaternoUsuarioConsultar"
                                                name="apellidoPaternoUsuarioConsultar" placeholder="Apellido Paterno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" disabled class="form-control"
                                                id="apellidoMaternoUsuarioConsultar"
                                                name="apellidoMaternoUsuarioConsultar" placeholder="Apellido Materno" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input type="text" disabled class="form-control"
                                                id="telefonoUsuarioConsultar"
                                                name="telefonoUsuarioConsultar" placeholder="Telefono" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" disabled class="form-control" id="emailUsuarioConsultar"
                                                name="emailUsuarioConsultar" placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Dirección</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Calle(*)</label>
                                            <input type="text" disabled class="form-control" id="calleUsuarioConsultar"
                                                name="calleUsuarioConsultar" placeholder="Calle" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Estado (*)</label>
                                            <input type="text" disabled class="form-control" id="estadoUsuarioConsultar"
                                                name="estadoUsuarioConsultar" placeholder="estado" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Municipio (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="municipioUsuarioConsultar" name="municipioUsuarioConsultar"
                                                placeholder="Municipio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Colonia (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="coloniaUsuarioConsultar" name="coloniaUsuarioConsultar"
                                                placeholder="Colonia" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Codigo Postal (*)</label>
                                            <input type="text" disabled class="form-control"
                                                id="codigoPostalUsuarioConsultar" name="codigoPostalUsuarioConsultar"
                                                placeholder="Codigo Postal" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Rol</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Rol (*)</label>
                                            <input type="text" disabled class="form-control" id="rolUsuarioConsultar"
                                                name="rolUsuarioConsultar" placeholder="Rol" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ****************************** Modal Eliminar Usuario*************************************************-->
<div class="modal fade" id="modalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEliminarUsuario"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarUsuario" name="formEliminarUsuario">
                <input type="text" hidden id="idEliminarUsuario" name="idEliminarUsuario">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este usuario?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ****************************** Modal Para asignar signasio y plan sistema*************************************************-->
<div class="modal fade" id="modalAsignarGimnasioYPlanSistema" tabindex="-1" role="dialog" aria-labelledby="modalAsignarGimnasioYPlanSistema" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" >
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h4 class="card-title">Asignar Gimnasio y Plan Sistema <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <form role="form" id="formAsignarGimnasioPlanSistema" enctype="multipart/form-data" name="formAsignarGimnasioPlanSistema" method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div  style="display: none;" class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Id (*)</label>
                                                <input type="text" class="form-control" id="id_usuarioAsignar" name="id_usuarioAsignar" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Seleccione Gimnasio(*)</label>
                                            <select name="id_gimnasioAsignar" id="id_gimnasioAsignar" class="form-control asignarGimnasio" style="width:100%;">
                                                <option value="default">Seleccione Gimnasio</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Seleccione Plan Sistema(*)</label>
                                            <select name="id_planSistemaAsignar" id="id_planSistemaAsignar" class="form-control asignarPlanSistema" style="width:100%;">
                                                <option value="default">Seleccione Plan Sistema</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Update Image ----------------------------------------------->
<div class="modal fade" id="modalUpdateImage" tabindex="-1" role="dialog" aria-labelledby="modalUpdateImage" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card-info">
                <div class="card-header bg-info">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Actualizar Imagen</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formUpdateImage" enctype="multipart/form-data" name="formUpdateImage" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="rounded-circle mx-auto d-inline-block overflow-hidden photo-container" style="width: 150px; height: 150px;">
                                <img src="" alt="cliente" id="imgPreview" class="img-fluid">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" hidden class="form-control" id="idUserUpdateImage" name="idUserUpdateImage" placeholder="Id" />
                            </div>
                            <div class="col-lg-12">
                                <span><label>Imagen del usuario (*)</label></span>
                                <div class="form-group input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" class="custom-file-input" onchange="previewImage(event, '#imgPreview')" name="imageInput" id="imageInput" lang="es">
                                        <label class="custom-file-label" for="imagen">Seleccione
                                            Fotografía</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-info">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Update Password ----------------------------------------------->
<div class="modal fade" id="modalUpdatePassword" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePassword" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header bg-secondary">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Actualizar Contraseña</h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formUpdatePassword" enctype="multipart/form-data" name="formUpdatePassword" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="idUser" name="idUser" hidden/>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Contraseña (*)</label>
                                    <div class="input-group-prepend">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Ingrese la Nueva Contraseña" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-secondary">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$menu->footer();
?>

<script>
    $(document).ready(function () {
        mostrarUsuario();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        rutaImagen();
        enviarFormularioAsignarGimnasioPlanSistema();
        llenarRol();
        llenarGimasio();
        llenarPlanSistema();
        sendFormUpdateImage();
        updatePassword();
    });

    const llenarRol = () => {
    $.ajax({
        type: "GET",
        url: "<?php echo constant('URL'); ?>rol/readTable",
        dataType: "json",
        success: function(data) {
            $.each(data.data, function(key, registro) {
                var id = registro.id_rol;
                var nombre = registro.nombreRol;
                $(".pagoRegistrarRol").append('<option value="' + id + '">' + nombre + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.log("Error en la solicitud AJAX:", status, error);
        }
    });
};

const llenarGimasio = () => {
    $.ajax({
        type: "GET",
        url: "<?php echo constant('URL'); ?>gimnasio/readTable",
        dataType: "json",
        success: function(data) {
            $.each(data.data, function(key, registro) {
                var id = registro.id_gimnasio;
                var nombre = registro.nombre_gimnasio;
                $(".asignarGimnasio").append('<option value="' + id + '">' + nombre + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.log("Error en la solicitud AJAX:", status, error);
        }
    });
};
const llenarPlanSistema = () => {
    $.ajax({
        type: "GET",
        url: "<?php echo constant('URL'); ?>planSistema/readTable",
        dataType: "json",
        success: function(data) {
            $.each(data.data, function(key, registro) {
                var id = registro.id_plan_sistema;
                var nombre = registro.nombre_plan_sistema;
                $(".asignarPlanSistema").append('<option value="' + id + '">' + nombre + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.log("Error en la solicitud AJAX:", status, error);
        }
    });
};


    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    const rutaImagen = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>usuario/read",
            async: false,
            dataType: "json",
            success: function (data) {
                $.each(data, function (key, registro) {
                    var id = registro.id_usuario;
                    var nombre = registro.nombreUsuario;
                    var apellido = registro.apellidoPaternoUsuario;
                    var imagen = registro.imagen;
                    var fullnameImagen = nombre + '' + apellido + '/' + imagen;
                    var fotoConsulta = '<?php echo constant('URL') ?>public/usuario/' +
                        fullnameImagen;
                    $(".id_usuario").append('<option value=' + id + '>' + fotoConsulta +
                        '</option>');
                    $('#foto_usuarioConsultar').attr(fotoConsulta);
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    var mostrarUsuario = function () {
        var tableUsuario = $('#dataTableUsuario').DataTable({
            "processing": true,
            "ajax": {
                "url": "<?php echo constant('URL'); ?>usuario/readTable"
            },
            "columns": [{
                "data": "id_usuario"
            },
            {
                defaultContent: "",
                'render': function (data, type, JsonResultRow, meta) {
                    var fullnameImagen = JsonResultRow.id_usuario + '/' + JsonResultRow.imagen;
                    var urlImg = '<?php echo constant('URL'); ?>public/usuario/' + fullnameImagen;
                    if (JsonResultRow.imagen == null || JsonResultRow.imagen ==
                        '') {
                        var urlImg = '<?php echo constant('URL'); ?>public/img/avatar.png';
                    } else {
                        var urlImg = '<?php echo constant('URL'); ?>public/usuario/' +
                            fullnameImagen;
                    }
                    return '<center><img src="' + urlImg +
                        '" class="rounded-circle img-fluid " style="width: 50px; height: 50px;"/></center>';
                }
            },
            {
                "data": "nombreUsuario",
                "render": function (data, type, JsonResultRow, meta) {
                    var nombreCompleto = JsonResultRow.nombreUsuario + ' ' + JsonResultRow.apellidoPaternoUsuario + ' ' + JsonResultRow.apellidoMaternoUsuario;
                    return nombreCompleto;
                }
            },
            {
                "data": "emailUsuario"
            },
            {
                "data": "nombreRol"
            },
            {
                "data": "nombre_gimnasio"
            },
            {
                "data": "nombre_plan_sistema"
            },
            {
                "data": "is_active",
                "render": function (data, type, row) {
                    if (data === 1) {
                        return '<span style="color: green;">Activo</span>';
                    } else {
                        return '<span style="color: red;">Inactivo</span>';
                    }
                }
            },
            {
                "defaultContent": `
                    <button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleUsuario' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                    <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarUsuario' title="Editar Datos"><i class="fa fa-edit"></i></button>
                    <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarUsuario' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>
                    <button class='asignacion btn btn-primary' data-toggle='modal' data-target='#modalAsignarGimnasioYPlanSistema' title="Asignar Gimnasio y Plan Sistema"><i class="fa fa-plus"></i> Asignar</button>
                    <button class='eliminar btn btn-info' data-toggle='modal' data-target='#modalUpdateImage' title="Actualizar Imagen"><i class="fa fa-picture-o"></i></button>
                    <button class='eliminar btn btn-secondary' data-toggle='modal' data-target='#modalUpdatePassword' title="Actualizar Contraseña"><i class="fa fa-lock fa-6" aria-hidden="true"></i></button>
                `
            }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableUsuario);
    }

    function previewImage(event, querySelector) {
        const input = event.target;
        $imgPreview = document.querySelector(querySelector);
        if (!input.files.length) return
        file = input.files[0];
        objectURL = URL.createObjectURL(file);
        $imgPreview.src = objectURL;
    }

    var obtenerdatosDT = function (table) {
        $('#dataTableUsuario tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            var routeImageUser = $("#imgPreview").attr("src", '<?php echo constant('URL'); ?>public/usuario/' + data.id_usuario + '/' + data.imagen);
            var idUserUpdateImage = $("#idUserUpdateImage").val(data.id_usuario);

            var idUsuario = $("#idUser").val(data.id_usuario);

            var idEliminar = $('#idEliminarUsuario').val(data.id_usuario);

            var id_usuarioAsignar= $("#id_usuarioAsignar").val(data.id_usuario);

            var idConsultar = $('#id_usuarioConsultar').val(data.id_usuario);
            var nombreUsuarioConsultar = $("#nombreUsuarioConsultar").val(data.nombreUsuario);
            var apellidoPaternoUsuarioConsultar = $("#apellidoPaternoUsuarioConsultar").val(data.apellidoPaternoUsuario);
            var apellidoMaternoUsuarioConsultar = $("#apellidoMaternoUsuarioConsultar").val(data.apellidoMaternoUsuario);
            var telefonoUsuarioConsultar = $("#telefonoUsuarioConsultar").val(data.telefonoUsuario);
            var emailUsuarioConsultar = $("#emailUsuarioConsultar").val(data.emailUsuario);
            var calleUsuarioConsultar = $("#calleUsuarioConsultar").val(data.calleUsuario);
            var estadoUsuarioConsultar = $("#estadoUsuarioConsultar").val(data.estadoUsuario);
            var municipioUsuarioConsultar = $("#municipioUsuarioConsultar").val(data.municipioUsuario);
            var coloniaUsuarioConsultar = $("#coloniaUsuarioConsultar").val(data.coloniaUsuario);
            var codigopostalUsuarioConsultar = $("#codigoPostalUsuarioConsultar").val(data.codigoPostalUsuario);
            var rolUsuarioConsultar = $("#rolUsuarioConsultar").val(data.nombreRol);

            var id_usuarioActualizar = $("#id_usuarioActualizar").val(data.id_usuario);
            var nombreUsuarioActualizar = $("#nombreUsuarioActualizar").val(data.nombreUsuario);
            var apellidoPaternoUsuarioActualizar = $("#apellidoPaternoUsuarioActualizar").val(data.apellidoPaternoUsuario);
            var apellidoMaternoUsuarioActualizar = $("#apellidoMaternoUsuarioActualizar").val(data.apellidoMaternoUsuario);
            var telefonoUsuarioActualizar = $("#telefonoUsuarioActualizar").val(data.telefonoUsuario);
            var EmailUsuarioActualizar = $("#EmailUsuarioActualizar").val(data.emailUsuario);
            var contraseñaUsuarioActualizar = $("#contraseñaUsuarioActualizar").val(data.passwordUsuario);
            var calleUsuarioActualizar = $("#calleUsuarioActualizar").val(data.calleUsuario);
            var estadoUsuarioActualizar = $("#estadoUsuarioActualizar").val(data.estadoUsuario);
            var municipioUsuarioActualizar = $("#municipioUsuarioActualizar").val(data.municipioUsuario);
            var coloniaUsuarioActualizar = $("#coloniaUsuarioActualizar").val(data.coloniaUsuario);
            var codigopostalUsuarioActualizar = $("#codigopostalUsuarioActualizar").val(data.codigoPostalUsuario);
            var idRolUsuarioActualizar = $("#idRolUsuarioActualizar").val(data.id_rol);
            var imagenUsuarioActualizar = $("#imagenUsuarioActualizar").val(data.imagen);


        });
    }

    var enviarFormularioAsignarGimnasioPlanSistema = function() {
    $.validator.setDefaults({
        submitHandler: function() {
            var datos = $('#formAsignarGimnasioPlanSistema').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>usuario/insertGymAndPlanSistema",
                data: datos,
                success: function(data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "La asignasion se ha registrado de manera correcta",
                            "success"
                        ).then(function() {
                            window.location =
                                "<?php echo constant('URL'); ?>usuario";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al Asignar gimnasio y plan Sistema. " + data,
                            "error"
                        );
                    }
                },
            });
        }
    });
    $('#formAsignarGimnasioPlanSistema').validate({
        rules: {
            id_gimnasioAsignar: {
                required: true
            },
            id_planSistemaAsignar: {
                required: true
            },
        },
        messages: {
            id_gimnasioAsignar: {
                required: "Ingrese Gimnasio"
            },
            id_planSistemaAsignar: {
                required: "Ingrese plan sistema"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
        });
    }

    var enviarFormularioRegistrar = function () {
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarUsuario').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>usuario/insert",
                    async: false,
                    data: datos,
                    success: function (data) {
                        console.log("data", data)
                        var id_usuario = data;
                        var idusuario = id_usuario;
                        var form_data = new FormData();
                        imagen = $('#imagen').prop('files')[0];
                        $urlImagenBasica =
                            '<?php echo constant('URL'); ?>public/img/avatar.png';
                        if ($('#imagen').val() == null) {
                            imagen =
                                $urlImagenBasica
                        }
                        var imagen = '<?php echo constant('URL'); ?>public/img/avatar.png';
                        if ($('#imagen').val() != null) {
                            imagen = $('#imagen').prop('files')[0];
                        } else {
                            imagen = "images/default-profile.jpg";
                        }
                        form_data.append('imagen', imagen);
                        form_data.append('nombreUsuario', document.getElementById(
                            'nombreUsuario').value);
                        form_data.append('apellidoPaternoUsuario', document.getElementById(
                            'apellidoPaternoUsuario').value);
                        form_data.append('apellidoMaternoUsuario', document.getElementById(
                            'apellidoMaternoUsuario').value);
                        form_data.append('telefonoUsuario', document.getElementById(
                            'telefonoUsuario').value);
                        form_data.append('correoUsuario', document.getElementById(
                            'correoUsuario').value);
                        form_data.append('password', document.getElementById(
                            'password').value);

                        form_data.append('calleUsuario', document.getElementById(
                            'calleUsuario').value);
                        form_data.append('estadoUsuario', document.getElementById(
                            'estadoUsuario').value);
                        form_data.append('municipioUsuario', document.getElementById(
                            'municipioUsuario').value);
                        form_data.append('coloniaUsuario', document.getElementById(
                            'coloniaUsuario').value);
                        form_data.append('codigoPostalUsuario', document.getElementById(
                            'codigoPostalUsuario').value);
                        form_data.append('rolUsuario', document.getElementById(
                            'rolUsuario').value);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo constant('URL'); ?>usuario/insert",
                            async: false,
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            success: function (data) {
                                if (data.trim() == 'ok') {
                                    Swal.fire(
                                        "¡Éxito!",
                                        "El usuario ha sido registrado de manera correcta",
                                        "success"
                                    ).then(function () {
                                        window.location =
                                            "<?php echo constant('URL'); ?>usuario";
                                    })
                                } else {
                                    Swal.fire(
                                        "¡Error!",
                                        "Ha ocurrido un error al registrar el usuario." +
                                        data,
                                        "error"
                                    );
                                }
                            },
                        });

                    },
                });
            }
        });
        $('#formRegistrarUsuario').validate({
            rules: {
                nombreUsuario: {
                    required: true
                },
                apellidoPaternoUsuario: {
                    required: true
                },
                apellidoMaternoUsuario: {
                    required: true
                },
                telefonoUsuario: {
                    required: true
                },
                correoUsuario: {
                    required: true
                },
                password: {
                    required: true
                },
                imagen: {
                    required: true
                },
                calleUsuario: {
                    required: true
                },
                estadoUsuario: {
                    required: true
                },
                municipioUsuario: {
                    required: true
                },
                coloniaUsuario: {
                    required: true
                },
                codigoPostalUsuario: {
                    required: true
                },
                rolUsuario: {
                    required: true
                },
            },
            messages: {
                nombreUsuario: {
                    required: "Ingrese el nombre del usuario"
                },
                apellidoPaternoUsuario: {
                    required: "Ingrese apellido paterno"
                },
                apellidoMaternoUsuario: {
                    required: "Ingrese apellido materno"
                },
                telefonoUsuario: {
                    required: "Ingrese el telefono"
                },
                correoUsuario: {
                    required: "Ingrese correo del usuario"
                },
                password: {
                    required: "Ingrese contraseña"
                },
                imagen: {
                    required: "Ingrese una imagen"
                },
                calleUsuario: {
                    required: "Ingrese calle"
                },
                estadoUsuario: {
                    required: "Ingrese Estado "
                },
                municipioUsuario: {
                    required: "Ingrese Municipio"
                },
                coloniaUsuario: {
                    required: "Ingrese colonia"
                },
                codigoPostalUsuario: {
                    required: "Ingrese Codigo Postal"
                },
                rolUsuario: {
                    required: "Ingrese rol"
                },

            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var datosActualizar = null;
    $('#formActualizarUsuario').on('submit', function (e) {
        datosActualizar = new FormData(this);
    });
    var enviarFormularioActualizar = function () {
        $.validator.setDefaults({
            submitHandler: function (e) {

                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>usuario/update",
                    data: datosActualizar,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.submit').attr("disabled", "disabled");
                        $('#formActualizarUsuario').css("opacity", ".5");
                    },
                    success: function (data) {
                        console.log("data ", data)
                        if (data.trim() == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El  usuario ha sido actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location =
                                    "<?php echo constant('URL'); ?>usuario";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al actualizar el usuario." + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarUsuario').validate({
            rules: {
                id_usuarioActualizar: {
                    required: true,
                    number: true
                },
                nombreUsuarioActualizar: {
                    required: true
                },
                apellidoPaternoUsuarioActualizar: {
                    required: true
                },
                apellidoMaternoUsuarioActualizar: {
                    required: true
                },
                telefonoUsuarioActualizar: {
                    required: true
                },
                EmailUsuarioActualizar: {
                    required: true
                },
                calleUsuarioActualizar: {
                    required: true
                },
                estadoUsuarioActualizar: {
                    required: true
                },
                municipioUsuarioActualizar: {
                    required: true
                },
                coloniaUsuarioActualizar: {
                    required: true
                },
                codigopostalUsuarioActualizar: {
                    required: true
                },
                idRolUsuarioActualizar: {
                    required: true
                }
            },
            messages: {
                id_usuarioActualizar: {
                    required: "Ingrese id"
                },

                nombreUsuarioActualizar: {
                    required: "Ingrese el nombre del usuario"
                },
                apellidoPaternoUsuarioActualizar: {
                    required: "Ingrese apellido paterno"
                },
                apellidoMaternoUsuarioActualizar: {
                    required: "Ingrese apellido materno"
                },
                telefonoUsuarioActualizar: {
                    required: "Ingrese el telefono"
                },
                EmailUsuarioActualizar: {
                    required: "Ingrese correo del usuario"
                },
                calleUsuarioActualizar: {
                    required: "Ingrese calle"
                },
                estadoUsuarioActualizar: {
                    required: "Ingrese Estado"
                },
                municipioUsuarioActualizar: {
                    required: "Ingrese Municipio"
                },
                coloniaUsuarioActualizar: {
                    required: "Ingrese el nombre del cliente"
                },
                codigopostalUsuarioActualizar: {
                    required: "Ingrese Codigo Postal"
                },
                idRolUsuarioActualizar: {
                    required: "Ingrese rol"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var imageUpdate = null;
    $('#formUpdateImage').on('submit', function(e) {
        imageUpdate = new FormData(this);
    });
    var sendFormUpdateImage = function() {
        $.validator.setDefaults({
            submitHandler: function(e) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>usuario/UpdateImage",
                    data: imageUpdate,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.submit').attr("disabled", "disabled");
                        $('#formUpdateImage').css("opacity", ".5");
                    },
                    success: function(data) {
                        var title = "¡Éxito!";
                        var message = "La imagen ha sido actualizada de manera correcta";
                        var icon = "success";
                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Ha ocurrido un error al actualizar la imagen." + data;
                            var icon = "error";
                        }
                        
                        Swal.fire(
                                title,
                                message,
                                icon
                        ).then(function() {
                            window.location = "<?php echo constant('URL'); ?>usuario";
                        });
                    },
                });
            }
        });
        $('#formUpdateImage').validate({
            rules: {
                idClientUpdateImage: {
                    required: true
                },
                imageInput: {
                    required: true
                }
            },
            messages: {
                idClientUpdateImage: {
                    required: "Seleccione el cliente"
                },
                imageInput: {
                    required: "Ingrese la fecha"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var updatePassword = function() {
        $.validator.setDefaults({
            submitHandler: function() {
                var datos = $('#formUpdatePassword').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>usuario/updatePassword",
                    data: datos,
                    success: function(data) {
                        var title = "¡Éxito!";
                        var message = "Su contraseña ha sido actualizada correctamente";
                        var icon = "success";

                        if (data.trim() !== 'ok') {
                            var title = "¡Error!";
                            var message = "Contraseña actual incorrecta. Inténtalo de nuevo.. ";
                            var icon = "error";
                        }

                        Swal.fire({
                            title: title,
                            text: message,
                            icon: icon
                        }).then(function(result) {
                            window.location = "<?php echo constant('URL'); ?>usuario";
                        });
                    },
                });
            }
        });
        $('#formUpdatePassword').validate({
            rules: {
                newPassword: {
                    required: true
                }
            },
            messages: {
                newPassword: {
                    required: "Ingrese una contraseña"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    }

    var eliminarRegistro = function () {
        $("#formEliminarUsuario").submit(function (event) {
            event.preventDefault();
            var datos = $('#formEliminarUsuario').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>usuario/delete",
                    data: datos,
                    success: function (data) {
                        if (data.trim() == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El Usuario ha sido eliminado correctamente",
                                "success"
                            ).then(function () {
                                window.location = "<?php echo constant('URL'); ?>usuario";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al eliminar el usuario. " + data,
                                "error"
                            );
                        }
                    },
                });
            });
        }
</script>
