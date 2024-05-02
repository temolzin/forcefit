<?php
require 'view/menu.php';
$menu = new Menu();
$menu->header('ventas');
?>
<section class="content">
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ventas</h2>
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-primary" data-toggle='modal' data-target='#modalRegistrarVenta'> <i
                                    class="fa fa-edit"></i> Registrar Venta
                            </button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="dataTableVenta" name="dataTableVenta"
                                    class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cliente</th>
                                            <th>Producto</th>
                                            <th>Fecha</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
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
<!--------------------------------------------------------- Modal Registrar VENTA----------------------------------------------->
<div class="modal fade" id="modalRegistrarVenta" tabindex="-1" role="dialog" aria-labelledby="modalRegistrarVenta"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Venta <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formRegistrarVenta" enctype="multipart/form-data" name="formRegistrarVenta"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos de la venta</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Cliente (*)</label>
                                            <select name="id_cliente" id="id_cliente" class="form-control pagoRegistrarCliente" style="width:100%;">
                                                <option value="default">Seleccione cliente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Producto (*)</label>
                                            <select name="id_producto" id="id_producto" class="form-control pagoRegistrarProducto" style="width:100%;" onchange="actualizarPrecioUnitario()">
                                            <option value="default">Seleccione producto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la venta" value="<?php echo date('Y-m-d'); ?>" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Cantidad (*)</label>
                                            <input type="number" class="form-control" id="cantidad"
                                                name="cantidad" placeholder="Cantidad de productos vendidos" onchange="calcularSubtotal()" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Precio Unitario (*)</label>
                                            <input type="text" class="form-control" id="precio_Unitario"
                                                name="precio_Unitario" placeholder="Precio unitario del producto" onchange="calcularSubtotal()" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Subtotal (*)</label>
                                            <input type="text" class="form-control" id="subtotal"
                                                name="subtotal" placeholder="Subtotal de la venta" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Total (*)</label>
                                            <input type="text" class="form-control" id="total"
                                                name="total" placeholder="Total de la venta" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------- Modal Detalle VENTA----------------------------------------------->
<div class="modal fade" id="modalDetalleVenta" tabindex="-1" role="dialog" aria-labelledby="modalDetalleVenta"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card-success">
                <div class="card-header">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h4 class="card-title">Detalle de Venta <small> &nbsp;(*) Campos requeridos</small></h4>
                        <button type="button" class="close  d-sm-inline-block text-white" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                </div>
                <form role="form" id="formDetalleVenta" enctype="multipart/form-data" name="formDetalleVenta"
                    method="post">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header py-2 bg-secondary">
                                <h3 class="card-title">Datos de la venta</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Id (*)</label>
                                            <input type="text" disabled class="form-control" id="id_ventaDetalle"
                                                name="id_ventaDetalle" placeholder="id" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Cliente (*)</label>
                                            <input type="text" disabled class="form-control" id="clienteDetalle"
                                                name="clienteDetalle" placeholder="Cliente de la venta" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Producto (*)</label>
                                            <input type="text" disabled class="form-control" id="productoDetalle"
                                                name="productoDetalle" placeholder="Producto de la venta" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fecha (*)</label>
                                            <input type="text" disabled class="form-control" id="fechaDetalle"
                                                name="fechaDetalle" placeholder="Fecha de la venta" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Cantidad (*)</label>
                                            <input type="text" disabled class="form-control" id="cantidadDetalle"
                                                name="cantidadDetalle" placeholder="Cantidad de productos vendidos" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Precio Unitario (*)</label>
                                            <input type="text" disabled class="form-control" id="precioUnitarioDetalle"
                                                name="precioUnitarioDetalle" placeholder="Precio unitario del producto" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Subtotal (*)</label>
                                            <input type="text" disabled class="form-control" id="subtotalDetalle"
                                                name="subtotalDetalle" placeholder="Subtotal de la venta" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Total (*)</label>
                                            <input type="text" disabled class="form-control" id="totalDetalle"
                                                name="totalDetalle" placeholder="Total de la venta" />
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
<!-- ****************************** Modal Eliminar VENTA *************************************************-->
<div class="modal fade" id="modalEliminarVenta" tabindex="-1" role="dialog" aria-labelledby="modalEliminarVenta"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Venta</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" id="formEliminarVenta" name="formEliminarVenta">
                <input type="text" hidden id="idEliminarVenta" name="idEliminarVenta">
                <div class="modal-body text-center text-danger">¿Realmente deseas eliminar esta venta?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$menu->footer();
?>

<script>
    $('#formRegistrarVenta').submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: "<?php echo constant('URL'); ?>venta/insert",
        data: formData,
        success: function(response) {
            if (response.trim() === 'ok') {
                Swal.fire(
                    "¡Éxito!",
                    "La venta se ha registrado correctamente",
                    "success"
                ).then(function() {
                    window.location = "<?php echo constant('URL'); ?>venta";
                });
            } else {
                Swal.fire(
                    "¡Error!",
                    "Ha ocurrido un error al registrar la venta. " + response,
                    "error"
                );
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

    $(document).ready(function () {
        mostrarVenta();
        eliminarRegistro();
        llenarCliente();
        llenarProducto();
        actualizarPrecioUnitario();
        
    
    });

    
    const llenarCliente = () => {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>venta/readCustomer",
            data: {
                id_gimnasio: id_gimnasio
            },
            async: false,
            dataType: "json",
            success: function(data) {
                $.each(data, function(key, registro) {
                    var id = registro.id_cliente;
                    var nombre = registro.nombre_cliente;
                    $(".pagoRegistrarCliente").append('<option value=' + id + '>' + nombre + '</option>');
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    const llenarProducto = () => {
        var id_gimnasio = "<?php echo $_SESSION['id_gimnasio']; ?>"
        $.ajax({
            type: "GET",
            url: "<?php echo constant('URL'); ?>venta/readProduct",
            data: {
                id_gimnasio: id_gimnasio
            },
            async: false,
            dataType: "json",
            success: function(data) {
                datosProductos = data; 
            $.each(data, function(key, registro) {
                var id = registro.id_producto;
                var nombre = registro.nombre;
                $(".pagoRegistrarProducto").append('<option value=' + id + '>' + nombre + '</option>');
            });
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function actualizarPrecioUnitario() {
        var idProductoSeleccionado = $("#id_producto").val();
        var productoSeleccionado = datosProductos.find(producto => producto.id_producto == idProductoSeleccionado);
        $("#precio_Unitario").val(productoSeleccionado.precio);
    }

    function calcularSubtotal() {
        var cantidad = document.getElementById("cantidad").value;
        var precioUnitario = document.getElementById("precio_Unitario").value;
        var subtotal = cantidad * precioUnitario;
        document.getElementById("subtotal").value = subtotal.toFixed(2);
        document.getElementById("total").value = subtotal.toFixed(2); 
    }

    var mostrarVenta = function() {
    var tableVenta = $('#dataTableVenta').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo constant('URL'); ?>venta/readSales"
        },
        "columns": [{
                "data": "id_detalle"
            },
            {
                "data": "nombre_cliente"
            },
            {
                "data": "nombre_producto"
            },
            {
                "data": "fecha"
            },
            {
                "data": "cantidad"
            },
            {
                "data": "precio_Unitario"
            },
            {
                "data": "subtotal"
            },
            {
                "data": "total"
            },
            {
                data: null,
                "defaultContent": `<button class='detalle btn btn-primary' data-toggle='modal' data-target='#modalDetalleVenta' title="Ver Detalles"><i class="fa fa-eye"></i></button>
                                    <button class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminarVenta' title="Eliminar Venta"><i class="fa fa-trash-o"></i></button>`
            }
        ],
        responsive: true,
        autoWidth: false,
        language: idiomaDataTable,
        lengthChange: true,
        buttons: ['copy', 'excel', 'csv', 'pdf'],
        dom: 'Bfltip'
    });
    obtenerdatosDT(tableVenta);
}

var obtenerdatosDT = function(table) {
    $('#dataTableVenta tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        var idEliminar = $('#idEliminarVenta').val(data.id_detalle);


        var id_ventaDetalle = $("#id_ventaDetalle").val(data.id_venta);
        var clienteDetalle = $("#clienteDetalle").val(data.nombre_cliente);
        var productoDetalle = $("#productoDetalle").val(data.nombre_producto);
        var fechaDetalle = $("#fechaDetalle").val(data.fecha);
        var cantidadDetalle = $("#cantidadDetalle").val(data.cantidad);
        var precioUnitarioDetalle = $("#precioUnitarioDetalle").val(data.precio_Unitario);
        var subtotalDetalle = $("#subtotalDetalle").val(data.subtotal);
        var totalDetalle = $("#totalDetalle").val(data.total);
        
    });
}

var eliminarRegistro = function() {
    $("#formEliminarVenta").submit(function(event) {
        event.preventDefault();
        var datos = $('#formEliminarVenta').serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo constant('URL'); ?>venta/delete", 
            data: datos,
            success: function(data) {
                if (data.trim() == 'ok') {
                    Swal.fire(
                        "¡Éxito!",
                        "La venta ha sido eliminada correctamente",
                        "success"
                    ).then(function() {
                        window.location = "<?php echo constant('URL'); ?>venta"; 
                    })
                } else {
                    Swal.fire(
                        "¡Error!",
                        "Ha ocurrido un error al eliminar la venta. " + data,
                        "error"
                    );
                }
            },
        });
    });
}

</script>

