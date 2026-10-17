<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Oficina Digital | Gestión de Documentos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root {
    --navy: #1B2A4A;
    --navy-dark: #10192E;
    --azul-accion: #2D6CDF;
    --verde: #1D9A6C;
    --ambar: #B8860B;
    --celeste: #2B7FB0;
    --gris-fondo: #F3F5F9;
    --gris-borde: #E2E6EE;
    --gris-input: #F1F3F7;
    --texto: #1F2430;
    --texto-suave: #6B7280;
}

body {
    background: var(--gris-fondo);
    color: var(--texto);
    font-family: 'Segoe UI', Arial, sans-serif;
}

/* ---------- Header ---------- */
.app-header {
    background: var(--navy);
    color: #fff;
    padding: 14px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.app-header .marca {
    display: flex;
    align-items: center;
    gap: 12px;
}

.app-header .marca-icono {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    background: var(--azul-accion);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
}

.app-header .marca-texto h5 {
    margin: 0;
    font-weight: 700;
    font-size: 17px;
}

.app-header .marca-texto small {
    color: #B9C4DA;
    letter-spacing: 0.03em;
}

.app-header .usuario {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13.5px;
}

.app-header .usuario .avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--azul-accion);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

/* ---------- Pestañas de navegación ---------- */
.tabs-bar {
    background: #fff;
    border-bottom: 1px solid var(--gris-borde);
    padding: 0 24px;
    display: flex;
    gap: 4px;
}

.tabs-bar .tab-link {
    padding: 14px 18px;
    color: var(--texto-suave);
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    border-bottom: 3px solid transparent;
}

.tabs-bar .tab-link.active {
    color: var(--navy);
    border-bottom-color: var(--azul-accion);
}

.contenido-wrap {
    padding: 24px;
    max-width: 1200px;
    margin: 0 auto;
}

/* ---------- Tarjetas ---------- */
.card-panel {
    background: #fff;
    border: 1px solid var(--gris-borde);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
}

.form-label {
    font-size: 11.5px;
    font-weight: 700;
    letter-spacing: 0.03em;
    text-transform: uppercase;
    color: var(--texto-suave);
}

.form-control, .form-select {
    background: var(--gris-input);
    border: 1px solid var(--gris-borde);
    font-size: 14px;
}

.form-control:focus, .form-select:focus {
    background: #fff;
    border-color: var(--azul-accion);
    box-shadow: 0 0 0 3px #E3ECFC;
}

/* ---------- Formulario estilo móvil ---------- */
.telefono-frame {
    max-width: 560px;
    width: 100%;
    margin: 0 auto;
    background: #fff;
    border: 1px solid var(--gris-borde);
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(16, 25, 46, 0.08);
}

.telefono-header {
    background: var(--navy);
    color: #fff;
    padding: 16px 18px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.telefono-header .icono {
    width: 34px;
    height: 34px;
    border-radius: 8px;
    background: var(--azul-accion);
    display: flex;
    align-items: center;
    justify-content: center;
}

.telefono-header h6 {
    margin: 0;
    font-weight: 700;
    font-size: 14.5px;
}

.telefono-header small {
    color: #B9C4DA;
    font-size: 11px;
}

.telefono-body {
    padding: 22px;
}

@media (max-width: 576px) {
    .contenido-wrap { padding: 12px; }
    .telefono-body { padding: 16px; }
}

.btn-guardar {
    background: var(--azul-accion);
    border: none;
    padding: 12px;
    font-weight: 700;
    border-radius: 8px;
    width: 100%;
}

.btn-guardar:hover { background: #2259BD; }

.upload-box {
    border: 1.5px dashed var(--gris-borde);
    border-radius: 10px;
    padding: 16px;
    text-align: center;
    font-size: 12.5px;
    color: var(--texto-suave);
    cursor: pointer;
    background: var(--gris-input);
}

.upload-box:hover { border-color: var(--azul-accion); }

/* ---------- Badges de estatus ---------- */
.badge-estatus {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 11.5px;
    font-weight: 700;
    display: inline-block;
}

.badge-recibido { background: #E3F6ED; color: var(--verde); }
.badge-en-proceso { background: #FBF0D9; color: var(--ambar); }
.badge-atendido { background: #E3EFF8; color: var(--celeste); }

/* ---------- Tabla dashboard ---------- */
.tabla-docs th {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
    color: var(--texto-suave);
    border-bottom: 2px solid var(--gris-borde);
    white-space: nowrap;
}

.tabla-docs td {
    vertical-align: middle;
    font-size: 13px;
}

.select-estatus-fila {
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 6px;
    border: 1px solid var(--gris-borde);
}

.btn-accion-icono {
    border: none;
    background: transparent;
    color: var(--texto-suave);
    font-size: 15px;
    padding: 4px 6px;
}

.btn-accion-icono.eliminar:hover { color: #C0203C; }

.stat-mini {
    background: #fff;
    border: 1px solid var(--gris-borde);
    border-radius: 10px;
    padding: 14px 16px;
}

.stat-mini .num {
    font-size: 22px;
    font-weight: 700;
    color: var(--navy);
}

.stat-mini .lbl {
    font-size: 11.5px;
    color: var(--texto-suave);
    text-transform: uppercase;
    letter-spacing: 0.03em;
}


/* ---------- Adjuntar documento ---------- */
button.upload-box {
    width: 100%;
    font-family: inherit;
    line-height: 1.5;
}
.archivo-chip {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #fff;
    border: 1px solid var(--gris-borde);
    border-radius: 10px;
    padding: 10px 12px;
}
.archivo-chip .icono-arch { font-size: 22px; }
.archivo-chip .info { flex: 1; min-width: 0; }
.archivo-chip .info .nombre {
    font-size: 13px; font-weight: 600;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.archivo-chip .info .tam { font-size: 11.5px; color: var(--texto-suave); }
.archivo-chip .quitar {
    border: none; background: transparent; font-size: 18px;
    color: var(--texto-suave); cursor: pointer;
}
</style>
</head>
<body>

<!-- Header -->
<header class="app-header">
    <div class="marca">
        <div class="marca-icono">📂</div>
        <div class="marca-texto">
            <h5>Oficina Digital</h5>
            <small>GESTIÓN DE DOCUMENTOS Y OFICIOS</small>
        </div>
    </div>
    <div class="usuario">
        <span>Mesa de control documental</span>
        <div class="avatar">M</div>
    </div>
</header>

<!-- Pestañas -->
<nav class="tabs-bar">
    <a href="#" class="tab-link active" id="tab-dashboard">📊 Dashboard</a>
    <a href="#" class="tab-link" id="tab-registrar">📝 Registrar Documento</a>
</nav>

<!-- ======================= VISTA 1: DASHBOARD ======================= -->
<div class="contenido-wrap" id="vista-dashboard">

    <div id="alerta-dashboard" class="alert d-none" role="alert"></div>

    <div class="row g-3 mb-3">
        <div class="col-6 col-md-3">
            <div class="stat-mini">
                <div class="num" id="stat-total">0</div>
                <div class="lbl">Total documentos</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-mini">
                <div class="num" id="stat-recibido">0</div>
                <div class="lbl">Recibidos</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-mini">
                <div class="num" id="stat-proceso">0</div>
                <div class="lbl">En proceso</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-mini">
                <div class="num" id="stat-atendido">0</div>
                <div class="lbl">Atendidos</div>
            </div>
        </div>
    </div>

    <div class="card-panel">
        <div class="row g-2 align-items-end mb-3">
            <div class="col-12 col-md-4">
                <label class="form-label">Buscar</label>
                <input type="text" class="form-control" id="filtro-q" placeholder="No. oficio, asunto, remitente...">
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label">Estatus</label>
                <select class="form-select" id="filtro-estatus">
                    <option value="Todos">Todos</option>
                    <option value="Recibido">Recibido</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Atendido">Atendido</option>
                </select>
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label">Desde</label>
                <input type="date" class="form-control" id="filtro-desde">
            </div>
            <div class="col-6 col-md-2">
                <label class="form-label">Hasta</label>
                <input type="date" class="form-control" id="filtro-hasta">
            </div>
            <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100" id="btn-filtrar">Filtrar</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table tabla-docs">
                <thead>
                    <tr>
                        <th>No. Oficio</th>
                        <th>Fecha</th>
                        <th>Asunto</th>
                        <th>Remitente</th>
                        <th>Destinatario</th>
                        <th>Estatus</th>
                        <th>Documento</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="cuerpo-tabla"></tbody>
            </table>
            <p id="sin-datos" class="text-muted text-center py-4 d-none">No se encontraron documentos con esos filtros.</p>
        </div>
    </div>
</div>

<!-- ======================= VISTA 2: REGISTRAR (estilo móvil) ======================= -->
<div class="contenido-wrap d-none" id="vista-registrar">

    <div id="alerta-form" class="alert d-none" role="alert" style="max-width:560px; margin:0 auto 14px;"></div>

    <div class="telefono-frame">
        <div class="telefono-header">
            <div class="icono">📄</div>
            <div>
                <h6>Gestión de Documentos</h6>
                <small>Oficina Digital</small>
            </div>
        </div>

        <div class="telefono-body">
            <h6 class="fw-bold mb-3">📋 Registrar Documento</h6>

            <form id="formDocumento">
                <div class="row g-2 mb-2">
                    <div class="col-7">
                        <label class="form-label">No. de Oficio *</label>
                        <input type="text" class="form-control" name="no_oficio" placeholder="Ej. 0452/2026" required>
                    </div>
                    <div class="col-5">
                        <label class="form-label">Fecha *</label>
                        <input type="date" class="form-control" name="fecha" required>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label">Asunto *</label>
                    <textarea class="form-control" name="asunto" rows="2" placeholder="Descripción breve del asunto del documento" required></textarea>
                </div>

                <div class="row g-2 mb-2">
                    <div class="col-6">
                        <label class="form-label">Remitente *</label>
                        <input type="text" class="form-control" name="remitente" placeholder="Nombre o dependencia" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Destinatario *</label>
                        <input type="text" class="form-control" name="destinatario" placeholder="Nombre o área" required>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label">Estatus *</label>
                    <select class="form-select" name="estatus" required>
                        <option value="Recibido" selected>🟢 Recibido</option>
                        <option value="En proceso">🟡 En proceso</option>
                        <option value="Atendido">🔵 Atendido</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label">Documento (foto o PDF)</label>
                    <div class="row g-2">
                        <div class="col-6">
                            <button type="button" class="upload-box" id="btn-foto">📷<br>Tomar foto<br>del documento</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="upload-box" id="btn-pdf">⬆️<br>Seleccionar<br>archivo PDF</button>
                        </div>
                    </div>
                    <input type="file" id="input-documento" class="d-none" accept="application/pdf,image/*">
                    <div id="archivo-seleccionado" class="archivo-chip mt-2 d-none">
                        <span class="icono-arch" id="archivo-icono">📕</span>
                        <div class="info">
                            <div class="nombre" id="archivo-nombre"></div>
                            <div class="tam" id="archivo-tamano"></div>
                        </div>
                        <button type="button" class="quitar" id="quitar-archivo" title="Quitar archivo">✕</button>
                    </div>
                    <div class="form-text">PDF o imagen, máximo 1 MB (las fotos se reducen automáticamente).</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Notas (opcional)</label>
                    <input type="text" class="form-control" name="notas" placeholder="Observaciones adicionales">
                </div>

                <button type="submit" class="btn btn-guardar text-white">💾 Guardar Documento</button>
            </form>
        </div>
    </div>

</div>

<!-- Ventana de vista previa del documento -->
<div class="modal fade" id="modalVista" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-titulo"></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" id="modal-cuerpo"></div>
            <div class="modal-footer">
                <a id="modal-abrir" class="btn btn-outline-secondary btn-sm" target="_blank" rel="noopener">Abrir en pestaña nueva</a>
                <a id="modal-descargar" class="btn btn-primary btn-sm">Descargar</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function () {

    const MAX_BYTES = 1048576; // 1 MB
    let archivoSel = null;     // { blob, nombre }
    let urlVista = null;

    function esc(t) {
        return $('<div>').text(t == null ? '' : t).html();
    }

    // ---------- Cambiar entre pestañas (sin navegar) ----------
    $('#tab-dashboard').on('click', function (e) {
        e.preventDefault();
        $('#vista-dashboard').removeClass('d-none');
        $('#vista-registrar').addClass('d-none');
        $('#tab-dashboard').addClass('active');
        $('#tab-registrar').removeClass('active');
        cargarDocumentos();
    });

    $('#tab-registrar').on('click', function (e) {
        e.preventDefault();
        $('#vista-registrar').removeClass('d-none');
        $('#vista-dashboard').addClass('d-none');
        $('#tab-registrar').addClass('active');
        $('#tab-dashboard').removeClass('active');
    });

    function mostrarAlerta(selector, mensaje, tipo) {
        $(selector)
            .removeClass('d-none alert-success alert-danger')
            .addClass('alert-' + tipo)
            .text(mensaje);
    }

    // ---------- Adjuntar documento: foto o archivo ----------
    $('#btn-foto').on('click', function () {
        $('#input-documento').attr({ accept: 'image/*', capture: 'environment' }).val('').trigger('click');
    });
    $('#btn-pdf').on('click', function () {
        $('#input-documento').removeAttr('capture').attr('accept', 'application/pdf,image/*').val('').trigger('click');
    });

    $('#input-documento').on('change', function () {
        const f = this.files[0];
        if (f) procesarArchivo(f);
    });

    $('#quitar-archivo').on('click', function () {
        limpiarArchivo();
    });

    function limpiarArchivo() {
        archivoSel = null;
        $('#input-documento').val('');
        $('#archivo-seleccionado').addClass('d-none');
    }

    function formatoTamano(bytes) {
        return bytes < 1024 * 1024 ? Math.round(bytes / 1024) + ' KB' : (bytes / 1048576).toFixed(2) + ' MB';
    }

    // Las fotos del celular suelen pesar varios MB: las reducimos antes de subirlas
    function comprimirImagen(file) {
        return new Promise(function (resolve, reject) {
            const img = new Image();
            const url = URL.createObjectURL(file);
            img.onload = function () {
                const maxLado = 1600;
                const escala = Math.min(1, maxLado / Math.max(img.width, img.height));
                const canvas = document.createElement('canvas');
                canvas.width = Math.round(img.width * escala);
                canvas.height = Math.round(img.height * escala);
                const ctx = canvas.getContext('2d');
                ctx.fillStyle = '#fff';
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                URL.revokeObjectURL(url);
                canvas.toBlob(function (blob) {
                    blob ? resolve(blob) : reject();
                }, 'image/jpeg', 0.8);
            };
            img.onerror = function () { URL.revokeObjectURL(url); reject(); };
            img.src = url;
        });
    }

    async function procesarArchivo(file) {
        $('#alerta-form').addClass('d-none');
        const esPdf = file.type === 'application/pdf';
        const esImagen = file.type.startsWith('image/');

        if (!esPdf && !esImagen) {
            mostrarAlerta('#alerta-form', 'Formato no permitido. Usa PDF o imagen (JPG, PNG, WEBP).', 'danger');
            return;
        }

        let blob = file;
        let nombre = file.name || 'documento';

        if (esImagen) {
            try {
                blob = await comprimirImagen(file);
                nombre = nombre.replace(/\.[^.]+$/, '') + '.jpg';
            } catch (e) {
                mostrarAlerta('#alerta-form', 'No se pudo procesar la imagen.', 'danger');
                return;
            }
        }

        if (blob.size > MAX_BYTES) {
            mostrarAlerta('#alerta-form', 'El archivo pesa ' + formatoTamano(blob.size) + ' y el máximo es 1 MB.', 'danger');
            limpiarArchivo();
            return;
        }

        archivoSel = { blob: blob, nombre: nombre };
        $('#archivo-nombre').text(nombre);
        $('#archivo-tamano').text(formatoTamano(blob.size));
        $('#archivo-icono').text(esPdf ? '📕' : '🖼️');
        $('#archivo-seleccionado').removeClass('d-none');
    }

    // ---------- Registrar documento (AJAX con archivo) ----------
    $('#formDocumento').on('submit', function (e) {
        e.preventDefault();
        const datos = new FormData(this);
        if (archivoSel) {
            datos.append('documento', archivoSel.blob, archivoSel.nombre);
        }

        $.ajax({
            url: '../api/guardar.php',
            method: 'POST',
            data: datos,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.ok) {
                    mostrarAlerta('#alerta-form', 'Documento registrado (folio #' + respuesta.id + ').', 'success');
                    $('#formDocumento')[0].reset();
                    limpiarArchivo();
                } else {
                    mostrarAlerta('#alerta-form', respuesta.error || 'Ocurrió un error al registrar.', 'danger');
                }
            },
            error: function (xhr) {
                const respuesta = xhr.responseJSON;
                mostrarAlerta('#alerta-form', respuesta && respuesta.error ? respuesta.error : 'Error de conexión con el servidor.', 'danger');
            }
        });
    });

    // ---------- Cargar documentos (con filtros) ----------
    function cargarDocumentos() {
        const params = {
            q: $('#filtro-q').val(),
            estatus: $('#filtro-estatus').val(),
            desde: $('#filtro-desde').val(),
            hasta: $('#filtro-hasta').val()
        };

        $.getJSON('../api/listar.php', params, function (respuesta) {
            const filas = respuesta.data;
            $('#cuerpo-tabla').empty();

            $('#stat-total').text(filas.length);
            $('#stat-recibido').text(filas.filter(d => d.estatus === 'Recibido').length);
            $('#stat-proceso').text(filas.filter(d => d.estatus === 'En proceso').length);
            $('#stat-atendido').text(filas.filter(d => d.estatus === 'Atendido').length);

            if (filas.length === 0) {
                $('#sin-datos').removeClass('d-none');
                return;
            }
            $('#sin-datos').addClass('d-none');

            filas.forEach(function (doc) {
                const botonVer = doc.tiene_archivo == 1
                    ? `<button class="btn btn-sm btn-outline-primary btn-ver" data-id="${doc.id}">👁️ Ver</button>`
                    : '<span class="text-muted">—</span>';

                const fila = `
                    <tr data-id="${doc.id}">
                        <td><strong>${esc(doc.no_oficio)}</strong></td>
                        <td>${esc(doc.fecha)}</td>
                        <td>${esc(doc.asunto)}</td>
                        <td>${esc(doc.remitente)}</td>
                        <td>${esc(doc.destinatario)}</td>
                        <td>
                            <select class="select-estatus-fila" data-id="${doc.id}">
                                <option value="Recibido" ${doc.estatus === 'Recibido' ? 'selected' : ''}>Recibido</option>
                                <option value="En proceso" ${doc.estatus === 'En proceso' ? 'selected' : ''}>En proceso</option>
                                <option value="Atendido" ${doc.estatus === 'Atendido' ? 'selected' : ''}>Atendido</option>
                            </select>
                        </td>
                        <td>${botonVer}</td>
                        <td>
                            <button class="btn-accion-icono eliminar" data-id="${doc.id}" title="Eliminar">🗑️</button>
                        </td>
                    </tr>`;
                $('#cuerpo-tabla').append(fila);
            });
        });
    }

    $('#btn-filtrar').on('click', cargarDocumentos);
    $('#filtro-q').on('keypress', function (e) {
        if (e.which === 13) cargarDocumentos();
    });

    // ---------- Vista previa del documento (sin descargarlo) ----------
    function base64ABlob(b64, tipo) {
        const bin = atob(b64);
        const bytes = new Uint8Array(bin.length);
        for (let i = 0; i < bin.length; i++) bytes[i] = bin.charCodeAt(i);
        return new Blob([bytes], { type: tipo });
    }

    const modalEl = document.getElementById('modalVista');
    const modalVista = new bootstrap.Modal(modalEl);

    modalEl.addEventListener('hidden.bs.modal', function () {
        $('#modal-cuerpo').empty();
        if (urlVista) { URL.revokeObjectURL(urlVista); urlVista = null; }
    });

    $('#cuerpo-tabla').on('click', '.btn-ver', function () {
        const id = $(this).data('id');
        $('#modal-titulo').text('Cargando...');
        $('#modal-cuerpo').html('<p class="text-center text-muted py-5">Cargando documento...</p>');
        modalVista.show();

        $.getJSON('../api/ver.php', { id: id }, function (r) {
            const blob = base64ABlob(r.base64, r.tipo);
            urlVista = URL.createObjectURL(blob);

            $('#modal-titulo').text(r.nombre);
            $('#modal-abrir').attr('href', urlVista);
            $('#modal-descargar').attr({ href: urlVista, download: r.nombre });

            if (r.tipo === 'application/pdf') {
                $('#modal-cuerpo').html('<iframe src="' + urlVista + '" style="width:100%;height:70vh;border:0;"></iframe>' +
                    '<p class="small text-muted mt-2 mb-0">Si tu celular no muestra el PDF aquí, usa "Abrir en pestaña nueva".</p>');
            } else {
                $('#modal-cuerpo').html('<img src="' + urlVista + '" class="img-fluid d-block mx-auto" alt="Documento">');
            }
        }).fail(function (xhr) {
            const msg = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'No se pudo cargar el documento.';
            $('#modal-titulo').text('Error');
            $('#modal-cuerpo').html('<p class="text-danger text-center py-4">' + esc(msg) + '</p>');
        });
    });

    // ---------- Cambiar estatus desde la tabla ----------
    $('#cuerpo-tabla').on('change', '.select-estatus-fila', function () {
        const id = $(this).data('id');
        const nuevoEstatus = $(this).val();

        $.ajax({
            url: '../api/actualizar_estatus.php',
            method: 'POST',
            data: { id: id, estatus: nuevoEstatus },
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.ok) {
                    mostrarAlerta('#alerta-dashboard', 'Estatus del documento #' + id + ' actualizado a "' + nuevoEstatus + '".', 'success');
                    cargarDocumentos();
                } else {
                    mostrarAlerta('#alerta-dashboard', respuesta.error || 'No se pudo actualizar.', 'danger');
                }
            }
        });
    });

    // ---------- Eliminar documento ----------
    $('#cuerpo-tabla').on('click', '.eliminar', function () {
        const id = $(this).data('id');
        if (!confirm('¿Seguro que quieres eliminar el documento #' + id + '?')) return;

        $.ajax({
            url: '../api/eliminar.php',
            method: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.ok) {
                    mostrarAlerta('#alerta-dashboard', 'Documento #' + id + ' eliminado.', 'success');
                    cargarDocumentos();
                } else {
                    mostrarAlerta('#alerta-dashboard', respuesta.error || 'No se pudo eliminar.', 'danger');
                }
            }
        });
    });

    // Carga inicial
    cargarDocumentos();

});
</script>
</body>
</html>
