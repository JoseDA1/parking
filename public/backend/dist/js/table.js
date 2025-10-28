class CustomDataTable {
    constructor(id) {
        this.id = id;
        this.initializeDataTable();
    }

    initializeDataTable() {
        $(this.id).DataTable({
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            language: {
                sLengthMenu: "Mostrar __MENU__ entradas",
                sEmptyTable: "No hay datos disponibles en la tabla",
                sInfo: "Mostrando __START__ a __END__ de __TOTAL__ entradas",
                sInfoEmpty: "Mostrando 0 a 0 de 0 entradas",
                sSearch: "Buscar:",
                sZeroRecords: "No se encontraron registros coincidentes en la tabla",
                sInfoFiltered: "(Filtrado de MAX entradas totales)",
                oPaginate: {
                    sFirst: "Primero",
                    sPrevious: "Anterior",
                    sNext: "Siguiente",
                    sLast: "Último"
                }
            }
        });
    }
}

// Uso de la clase CustomDataTable

$(document).ready(function() {
    const myDataTable = new CustomDataTable('#example1');
});
$(document).ready(function() {
    // $('#example1').DataTable({
    //     "responsive": true, "lengthChange": false, "autoWidth": false,
    //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    //     console.log("Se ha cambiado el estado del ${elementType} correctamente.");
});

$(document).ready(function () {
    $("#example1").DataTable();
    // Inicializar DataTable para example1 si es necesario

    // Manejar el evento de cambio para cualquier elemento con la clase toggle-class
    $('#example1').on('change', '.toggle-class', function() {

        var isChecked = $(this).prop('checked'); // Verificar si el checkbox está marcado o desmarcado
        var elementType = $(this).data('type'); // Obtener el tipo de elemento (país, departamento, ciudad, etc.)
        var elementId = $(this).attr('data-id'); // Obtener el ID del elemento
        var url; // Determinar la URL y los datos según el tipo de elemento

        switch (elementType) {
            case 'bahia':
                url = 'cambioestadobahia';
                break;
            case 'tarifa':
                url = 'cambioestadotarifa';
                break;
            case 'tipodocumento':
                url = 'cambioestadotiposdocumento';
                break;
            case 'metodopago':
                url = 'cambioestadometodospago';
                break;
            case 'cliente':
                url = 'cambioestadocliente';
                break;
            case 'marca':
                url = 'cambioestadomarca';
                break;
            case 'registro':
                url = 'cambioestadoregistro';
                break;
            case 'pago':
                url = 'cambioestadopago';
                break;
            case 'vehiculo':
                url = 'cambioestadovehiculo';
                break;
            case 'tipovehiculo':
                url = 'cambioestadotipovehiculo';
                break;
           
            default:
                return; // Salir de la función si el tipo de elemento no es válido
        }

        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            data: {
                'estado': isChecked ? 1 : 0, // Estado (1 para marcado, 0 para desmarcado)
                'id': elementId // ID del elemento
            },
            success: function(data) {
                console.log("Se ha cambiado el estado del ${elementType} correctamente.");
                // Realizar acciones adicionales después del éxito de la solicitud AJAX
				console.log('Respuesta del servidor:', data);
            },
            error: function(xhr, status, error) {
                console.error("Error al cambiar el estado del ${elementType}:"+ error);
                // Manejar errores de la solicitud AJAX si es necesario
            }
       });
});
});
