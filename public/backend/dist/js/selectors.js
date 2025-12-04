const url = "{{ route('pagos.obtenerTotal') }}";
$(document).ready(function() {
    
	$("#metodospagos").select2({
        allowClear: true,
        height:'300px'
    });

    $("#salida").select2({
        allowClear: true,
        height:'300px'
    });
    $("#tipos_documentos").select2({
        allowClear: true,
        height:'300px'
    });
    $("#cliente").select2({
        allowClear: true,
        height:'300px'
    });
    $("#vehiculo").select2({
        allowClear: true,
        height:'300px'
    });
    $("#bahia").select2({
        allowClear: true,
        height:'300px'
    });
    $("#registrosalida").select2({
        allowClear: true,
        height:'300px'
    });
    $("#marca").select2({
        allowClear: true,
        height:'300px'
    });
    $("#tipo_vehiculo").select2({
        allowClear: true,
        height:'300px'
    });
    $("#tarifas").select2({
        allowClear: true,
        height:'300px'
    });
    $("#tarifas_id").select2({
        allowClear: true,
        height:'300px'
    });
    $("#tipos_vehiculos").select2({
        allowClear: true,
        height:'300px'
    });

    $("#salida").on('change', function() {
        const salidaId = this.value;
        const $opt = $(this).find('option:selected');
        const ingreso = $opt.data('ingreso') || '';
        const salida = $opt.data('salida') || '';
        const tarifa = $opt.data('tarifa') || '';
        const hora = $opt.data('hora') || '';
        const parcial = $opt.data('parcial') || '';
        const dia = $opt.data('dia') || '';
        const mensual = $opt.data('mensual') || '';
        const total = calcularTotal(ingreso, salida, hora, parcial);
        $('#salidas_id').val(salidaId);
        $('#ingresofecha').val(ingreso);
        $('#salidafecha').val(salida);
        $('#tarifa').val(tarifa);
        $('#total').val(total);
        $('#valor_total').val(total);
    });
});
function calcularTotal(fechaIngreso, fechaSalida, valorHora, valorParcial) {
    if (!fechaIngreso || !fechaSalida) return 0;
    
    const ingreso = new Date(fechaIngreso);
    const salida = new Date(fechaSalida);
    
    // Calcular diferencia en milisegundos y convertir a horas
    const diferenciaMilisegundos = salida - ingreso;
    const diferenciaHoras = diferenciaMilisegundos / (1000 * 60 * 60);
    
    let total = 0;
    
    // Si es 0.5 horas o menos (media hora)
    if (diferenciaHoras <= 0.5) {
        total = valorParcial;
    } else {
        // Redondear hacia arriba las horas y multiplicar por valor hora
        total = Math.ceil(diferenciaHoras) * valorHora;
    }
    
    return total;
}
