<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('producto');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tabla de Productos</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary" data-toggle='modal' data-target='#modalRegistrarProducto'> <i
                                    class="fa fa-edit"></i> Registrar producto
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableProducto" name="dataTableProducto"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Imagen</th>
                                            <th>Nombre del producto</th>
                                            <th>descripcion</th>
                                            <th>precio</th>
                                            <th>stock</th>
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

<!--**************MODALS*************-->
<!--------------------------------------------------------- Modal Registrar----------------------------------------------->
<div class="modal fade" id="modalRegistrarProducto" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarProducto"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Cliente <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarProducto" enctype="multipart/form-data" name="formRegistrarProducto"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Producto</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-lg-6">
                                        <span><label>Imagen del Producto (*)</label></span>
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" accept="image/*" class="custom-file-input"
                                                    name="imagen" id="imagen" lang="es">
                                                <label class="custom-file-label" for="imagen">Seleccione
                                                    Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Nombre del producto (*)</label>
                                            <input type="text" class="form-control" id="nombreProducto"
                                                name="nombreProducto" placeholder="Nombre Producto" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Descripcion</label>
                                            <input type="text" class="form-control" id="descripcionProducto"
                                                name="descripcionProducto" placeholder="Descripcion" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>precio</label>
                                            <input type="text" class="form-control" id="precioProducto"
                                                name="precioProducto" placeholder="Precio" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label>stock (*)</label>
                                        <div class="input-group-prepend">
                                            <input type="text" id="stockProducto" name="stockProducto"
                                                class="form-control" placeholder="stock">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Categoria producto(*)</label>
                                        <select name="id_categoria" id="id_categoria" class="form-control pagoRegistrarCategoria" style="width:100%;">
                                            <option value="default">Seleccione la Categoria</option>
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

<!--------------------------------------------------------- Modal Actualizar----------------------------------------------->
<div class="modal fade" id="modalActualizarProducto" tabindex="-1" role="dialog"
    aria-labelledby="modalActualizarProducto" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-warning">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Producto <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formActualizarProducto" name="formActualizarProducto">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Producto</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div style="display: none;" class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Id (*)</label>
                                                <input type="text" class="form-control" id="id_productoActualizar"
                                                    name="id_productoActualizar" placeholder="Nombre del producto" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre del Producto (*)</label>
                                            <input type="text" class="form-control" id="nombreProductoActualizar"
                                                name="nombreProductoActualizar" placeholder="Nombre del producto" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Descripcion (*)</label>
                                            <input type="text" class="form-control" id="descripcionProductoActualizar"
                                                name="descripcionProductoActualizar" placeholder="Descripcion" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Precio (*)</label>
                                            <input type="text" class="form-control" id="precioProductoActualizar"
                                                name="precioProductoActualizar" placeholder="Precio del producto" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Stock (*)</label>
                                            <input type="text" class="form-control" id="stockProductoActualizar"
                                                name="stockProductoActualizar" placeholder="Stock del producto" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Categoria(*)</label>
                                         <select name="id_categoriaActualizar" id="id_categoriaActualizar" class="form-control pagoRegistrarCategoria" style="width:100%;">
                                            <option value="default">Seleccione categoria</option>
                                         </select>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------- Modal Detalle Gimnasio----------------------------------------------->
<div class="modal fade" id="modalDetalleProducto" tabindex="-1" role="dialog" aria-labelledby="modalDetalleProducto"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-primary">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Producto <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <!---->
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formConsulta" name="formConsulta">
                <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos del Producto</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div style="display: none;" class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Id (*)</label>
                                                <input type="text" class="form-control" id="id_productoConsultar"
                                                    name="id_productoConsultar" placeholder="Nombre del producto" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre del Producto (*)</label>
                                            <input type="text" class="form-control" id="nombreProductoConsultar"
                                                name="nombreProductoConsultar" placeholder="Nombre del producto" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Descripcion (*)</label>
                                            <input type="text" class="form-control" id="descripcionProductoConsultar"
                                                name="descripcionProductoConsultar" placeholder="Descripcion" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Precio (*)</label>
                                            <input type="text" class="form-control" id="precioProductoConsultar"
                                                name="precioProductoConsultar" placeholder="Precio del producto" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Stock (*)</label>
                                            <input type="text" class="form-control" id="stockProductoConsultar"
                                                name="stockProductoConsultar" placeholder="stock" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Categoria(*)</label>
                                         <select name="id_categoriaConsultar" id="id_categoriaConsultar" class="form-control pagoRegistrarCategoria" style="width:100%;">
                                            <option value="default">Seleccione categoria</option>
                                         </select>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ****************************** Modal Eliminar Rol *************************************************-->
<div class="modal fade" id="modalEliminarProducto" tabindex="-1" role="dialog" aria-labelledby="modalEliminarProducto"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarProducto" name="formEliminarProducto">
                <input type="text" hidden id="idEliminarProducto" name="idEliminarProducto">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar este Producto?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
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
                                <img src="" alt="gimnasio" id="imgPreview" class="img-fluid" onerror="handleErrorImage(this);">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" hidden class="form-control" id="idProductoUpdateImage" name="idProductoUpdateImage" placeholder="Id" />
                            </div>
                            <div class="col-lg-12">
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

<?php
$menu->footer();
?>

<script>
    $(document).ready(function () {
        llenarCategoria();
        mostrarProducto();
        enviarFormularioRegistrar();
        enviarFormularioActualizar();
        eliminarRegistro();
        rutaImagen();
        sendFormUpdateImage();
    });

    const llenarCategoria = () => {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>categoria/readCategoria",
            data: {
                id_gimnasio: id_gimnasio
            },
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_categoria;
                    var nombre = registro.nombre;
                    $(".pagoRegistrarCategoria").append('<option value=' + id + '>' + nombre + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
}

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    const rutaImagen = () => {
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>producto/read",
            async: false,
            dataType: "json",
            success: function (data) {
                $.each(data, function (key, registro) {
                    var id = registro.id_producto;
                    var nombre = registro.nombreProducto;
                    var imagen = registro.imagen;
                    var fotoConsulta = '<?php echo constant('URL') ?>public/producto/' + imagen;
                    $("#id_producto").append('<option value=' + id + '>' + fotoConsulta + '</option>');
                    $('#foto_productoConsultar').attr('src', fotoConsulta); 
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    var mostrarProducto = function () {
    var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
    var tableProducto = $('#dataTableProducto').DataTable({
        "processing": true,
        "ajax": {
            type: "POST",
            "url": "<?php echo constant('URL'); ?>producto/readTable",
            data: {
                id_gimnasio: id_gimnasio
            },
            dataSrc: function (json) {
                let customData = [];
                json.data.forEach(element => {
                    customData = [...customData, {
                        ...element, option: `
                        <button class='consulta btn btn-primary' data-toggle='modal' data-target='#modalDetalleProducto' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                        <button class='editar btn btn-warning' data-toggle='modal' data-target='#modalActualizarProducto' title="Editar Datos"><i class="fa fa-edit"></i></button>
                        <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarProducto' title="Eliminar Registro"><i class="fa fa-trash-o"></i></button>
                        <button class='eliminar btn btn-info' data-toggle='modal' data-target='#modalUpdateImage' title="Actualizar Imagen"><i class="fa fa-picture-o"></i></button>`}]
                })
                return customData;
            }
        },
            "columns": [{
                "data": "id_producto"
            },
            {
                defaultContent: "",
                'render': function (data, type, JsonResultRow, meta) {
                    var fullnameImagen = JsonResultRow.id_producto + '/' + JsonResultRow.imagen;
                    var urlImg = '<?php echo constant('URL'); ?>public/producto/' + fullnameImagen;
                    return '<center><img src="' + urlImg +
                        '" class="rounded-circle img-fluid " style="width: 50px; height: 50px;" onerror="handleErrorImage(this);"/></center>';
                }
            },
            {
                defaultContent: "",
                "render": function (data, type, full) {
                    return full['nombre'];
                }
            },
            {
                defaultContent: "",
                "render": function (data, type, full) {
                    return full['descripcion'];
                }
            },
            {
                "data": "precio"
            },
            {
                "data": "stock"
            },
            {
                "data": "stock"
            },
            {
                data: "option",
            }
            ],
            responsive: true,
            autoWidth: false,
            language: idiomaDataTable,
            lengthChange: true,
            buttons: ['copy', 'excel', 'csv', 'pdf'],
            dom: 'Bfltip'
        });
        obtenerdatosDT(tableProducto);
    }
    

    

    function handleErrorImage(image) {
        image.src = '<?php echo constant('URL'); ?>public/img/forcefit.png';
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
        $('#dataTableProducto tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            var routeImageGym = $("#imgPreview").attr("src", '<?php echo constant('URL'); ?>public/producto/' + data.id_gimnasio + '/' + data.imagen);
            var routeImageBackgroundCredential = $("#imgPreviewBackground").attr("src", '<?php echo constant('URL'); ?>public/gimnasio/fondo/' + data.id_gimnasio + '/' + data.fondoCredencial);
            var idProductoUpdateImage = $("#idProductoUpdateImage").val(data.id_producto);
            var idGymUpdateBackground = $("#idGymUpdateBackground").val(data.id_producto);

            var idEliminar = $('#idEliminarProducto').val(data.id_producto);

            var id_productoActualizar = $("#id_productoActualizar").val(data.id_producto);
            var id_categoriaActualizar = $("#id_categoriaActualizar").val(data.id_categoria);
            var nombreProductoActualizar = $("#nombreProductoActualizar").val(data.nombre);
            var descripcionProductoActualizar = $("#descripcionProductoActualizar").val(data.descripcion);
            var precioProductoActualizar = $("#precioProductoActualizar").val(data.precio);
            var stockProductoActualizar = $("#stockProductoActualizar").val(data.stock);
            
            var id_productoConsultar = $("#id_productoConsultar").val(data.id_producto);
            var id_categoriaConsultar = $("#id_categoriaConsultar").val(data.id_categoria);
            var nombreProductoConsultar = $("#nombreProductoConsultar").val(data.nombre);
            var descripcionProductoConsultar = $("#descripcionProductoConsultar").val(data.descripcion);
            var precioProductoConsultar = $("#precioProductoConsultar").val(data.precio);
            var stockProductoConsultar = $("# stockProductoConsultar").val(data.stock);

        });
    }

    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    var enviarFormularioRegistrar = function () {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.validator.setDefaults({
            submitHandler: function () {
                var datos = $('#formRegistrarProducto').serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>producto/insert",
                    async: false,
                    data: datos,
                    success: function (data) {
                        console.log("data", data)
                        var id_producto = data;
                        var idProducto = id_producto;
                        var form_data = new FormData();
                        form_data.append('id_gimnasio', id_gimnasio);
                        imagen = $('#imagen').prop('files')[
                            0];
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
                        form_data.append('nombreProducto', document.getElementById(
                            'nombreProducto').value);
                        form_data.append('descripcionProducto', document.getElementById(
                            'descripcionProducto').value);
                        form_data.append('precioProducto', document.getElementById(
                            'precioProducto').value);
                        form_data.append('stockProducto', document.getElementById(
                            'stockProducto').value);
                            form_data.append('id_categoria', document.getElementById(
                            'id_categoria').value);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo constant('URL'); ?>producto/insert",
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
                                        "El producto ha sido registrado de manera correcta",
                                        "success"
                                    ).then(function () {
                                        window.location =
                                            "<?php echo constant('URL'); ?>producto";
                                    })
                                } else {
                                    Swal.fire(
                                        "¡Error!",
                                        "Ha ocurrido un error al registrar el producto." +
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
        $('#formRegistrarProducto').validate({
            rules: {
                nombreProducto: {
                    required: true
                },
                descripcionProducto: {
                    required: true
                },
                precioProducto: {
                    required: true
                },
                stockProducto: {
                    required: true
                },
                imagen: {
                    required: true
                },
                id_categoria: {
                    required: true
                },
            },
            messages: {
                nombreProducto: {
                    required: "Ingrese el nombre del Producto"
                },
                descripcionProducto: {
                    required: "Ingresa la descripción"
                },
                precioProducto: {
                    required: "Ingresa el precio"
                },
                stockProducto: {
                    required: "Ingresa el stock"
                },
                imagen: {
                    required: "Ingresa la imagen"
                },
                id_categoria: {
                    required: "Ingresa la categoria"
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
    $('#formActualizarProducto').on('submit', function (e) {
        datosActualizar = new FormData(this);
    });
    var enviarFormularioActualizar = function () {
        $.validator.setDefaults({
            submitHandler: function (e) {

                $.ajax({
                    type: "POST",
                    url: "<?php echo constant('URL'); ?>producto/update",
                    data: datosActualizar,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('.submit').attr("disabled", "disabled");
                        $('#formActualizarProducto').css("opacity", ".5");
                    },
                    success: function (data) {
                        console.log("data ", data)
                        if (data.trim() == 'ok') {
                            Swal.fire(
                                "¡Éxito!",
                                "El producto ha sido Actualizado de manera correcta",
                                "success"
                            ).then(function () {
                                window.location =
                                    "<?php echo constant('URL'); ?>producto";
                            })
                        } else {
                            Swal.fire(
                                "¡Error!",
                                "Ha ocurrido un error al Actualizar el producto." + data,
                                "error"
                            );
                        }
                    },
                });
            }
        });
        $('#formActualizarProducto').validate({
            rules: {
                nombreProductoActualizar: {
                    required: true
                },
                descripcionProductoActualizar: {
                    required: true
                },
                precioProductoActualizar: {
                    required: true
                },
                stockProductoActualizar: {
                    required: true
                },
                id_categoriaActualizar: {
                    required: true
                }

            },
            messages: {
                nombreProductoActualizar: {
                    required: "Ingrese el nombre del producto"
                },
                descripcionProductoActualizar: {
                    required: "Ingresa la descripcion"
                },
                precioProductoActualizar: {
                    required: "Ingresa el precio"
                },
                stockProductoActualizar: {
                    required: "Ingresa el stock"
                },
                id_categoriaActualizar: {
                    required: "Ingresa la categoria del producto"
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
                    url: "<?php echo constant('URL'); ?>producto/UpdateImage",
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
                            window.location = "<?php echo constant('URL'); ?>producto";
                        });
                    },
                });
            }
        });
        $('#formUpdateImage').validate({
            rules: {
                idProductoUpdateImage: {
                    required: true
                },
                imageInput: {
                    required: true
                }
            },
            messages: {
                idProductoUpdateImage: {
                    required: "Seleccione el producto"
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

    var eliminarRegistro = function () {
        $("#formEliminarProducto").submit(function (event) {
            event.preventDefault();
            var datos = $('#formEliminarProducto').serialize();
            $.ajax({
                type: "POST",
                url: "<?php echo constant('URL'); ?>producto/delete",
                data: datos,
                success: function (data) {
                    if (data.trim() == 'ok') {
                        Swal.fire(
                            "¡Éxito!",
                            "El Producto ha sido eliminado correctamente",
                            "success"
                        ).then(function () {
                            window.location = "<?php echo constant('URL'); ?>producto";
                        })
                    } else {
                        Swal.fire(
                            "¡Error!",
                            "Ha ocurrido un error al eliminar el producto. " + data,
                            "error"
                        );
                    }
                },
            });
        });
    }
</script>

