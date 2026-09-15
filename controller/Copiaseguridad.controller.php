<?php
// Datos de ejemplo (luego los reemplazamos por consultas reales)
$estadoBD = ['texto' => 'Base de Datos: En línea / Saludable', 'ok' => true];

$resumen = [
    'ultimo_backup'       => '2026-09-08 03:00 AM',
    'tamano_bd'           => '2.4 GB',
    'respaldos_disponibles' => 47,
];

$historial = [
    ['fecha' => '2026-09-08 03:00 AM', 'tipo' => 'Descarga',    'archivo' => 'zoocria_prod_20260908.sql', 'usuario' => 'Andrea Rivera quino', 'estado' => 'Éxito'],
    ['fecha' => '2026-09-06 08:45 PM', 'tipo' => 'Restauración', 'archivo' => 'zoocria_peces_last.bak',    'usuario' => 'Ismin Idamaga',        'estado' => 'Éxito'],
    ['fecha' => '2026-09-05 11:20 PM', 'tipo' => 'Restauración', 'archivo' => 'zoocria_peces_v2.sql',      'usuario' => 'Jaider villa',         'estado' => 'Error'],
];

function colorTipo($tipo) {
    return $tipo === 'Descarga' ? 'primary' : 'warning';
}
function colorEstado($estado) {
    return $estado === 'Éxito' ? 'success' : 'danger';
}
?>

<div class="d-flex align-items-center justify-content-between pt-2 pb-1">
    <h3 class="fw-bold mb-0">Gestión de Copias de Seguridad</h3>
    <span class="badge badge-<?php echo $estadoBD['ok'] ? 'success' : 'danger'; ?> badge-round px-3 py-2">
        <i class="fa fa-circle me-1" style="font-size:8px;"></i> <?php echo $estadoBD['texto']; ?>
    </span>
</div>
<p class="op-7 mb-4">Descarga y restaura los puntos de respaldo de la base de datos del zoocriadero.</p>

<!-- Tarjetas resumen -->
<div class="row">
    <div class="col-md-4">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Último backup</p>
                            <h5 class="card-title"><?php echo $resumen['ultimo_backup']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Tamaño de BD</p>
                            <h5 class="card-title"><?php echo $resumen['tamano_bd']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                            <i class="fas fa-box-archive"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Respaldos disponibles</p>
                            <h5 class="card-title"><?php echo $resumen['respaldos_disponibles']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Acciones -->
<div class="card card-round">
    <div class="card-body">
        <h6 class="fw-bold mb-3">Acciones de seguridad</h6>
        <button type="button" class="btn btn-primary btn-round me-2">
            <i class="fas fa-download me-1"></i> Descargar Copia
        </button>
        <button type="button" class="btn btn-label-warning btn-round" data-bs-toggle="modal" data-bs-target="#modalRestaurar">
            <i class="fas fa-rotate-left me-1"></i> Restaurar Base de Datos
        </button>
    </div>
</div>

<!-- Historial -->
<div class="card card-round">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">Historial de Auditoría de Backups</div>
            <div class="card-tools">
                <span class="text-muted small">Últimas operaciones realizadas</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Fecha y Hora</th>
                        <th>Tipo de Operación</th>
                        <th>Nombre de Archivo</th>
                        <th>Ejecutado por</th>
                        <th>Estado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historial as $h): ?>
                    <tr>
                        <td><?php echo $h['fecha']; ?></td>
                        <td><span class="badge badge-<?php echo colorTipo($h['tipo']); ?>"><?php echo $h['tipo']; ?></span></td>
                        <td><?php echo htmlspecialchars($h['archivo']); ?></td>
                        <td><?php echo htmlspecialchars($h['usuario']); ?></td>
                        <td><span class="badge badge-<?php echo colorEstado($h['estado']); ?>"><?php echo $h['estado']; ?></span></td>
                        <td class="text-end">
                            <button class="btn btn-icon btn-link btn-sm" title="Descargar">
                                <i class="fa fa-download text-primary"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Confirmar restauración -->
<div class="modal fade" id="modalRestaurar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-body p-4">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                <i class="fas fa-triangle-exclamation text-warning" style="font-size: 40px;"></i>
                <h5 class="fw-bold mt-3">¿Restaurar la base de datos?</h5>
                <p class="op-7">Esta acción reemplazará los datos actuales por los del respaldo seleccionado. No se puede deshacer.</p>
                <button type="button" class="btn btn-label-secondary btn-round px-4 me-2" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning btn-round px-4">Sí, restaurar</button>
            </div>
        </div>
    </div>
</div>