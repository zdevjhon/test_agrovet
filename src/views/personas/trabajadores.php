<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'src/views/includes/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>

    <?php include_once 'src/views/includes/menu.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <nav aria-label="breadcrumb p-2">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 me-sm-6 me-5 d-flex align-items-center">
                    <li class="breadcrumb-item text-sm text-dark">
                        <button type="button" class="btn btn-primary" id="btnAgregarTrabajador"> Agregar Trabajador
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="card-title">Lista de Trabajadores</div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped w-100" id="trabajadoresTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre Completo</th>
                                            <th>Doc.</th>
                                            <th>N° Doc.</th>
                                            <th>Sexo</th>
                                            <th>F. Nacimiento</th>
                                            <th>Ubicación</th>
                                            <th>Dirección</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="trabajadorModal" tabindex="-1" aria-labelledby="trabajadorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="trabajadorModalLabel">Registrar Trabajador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="trabajadorForm" class="row">
                            <input type="hidden" id="id_trabajador" name="id_trabajador">

                            <div class="mb-3 col-md-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="apellido_materno" class="form-label">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
                            </div>

                            <div class="mb-3 col-md-3">
                                <label for="tipo_documento" class="form-label">Tipo Documento</label>
                                <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                                    <option value="">Seleccione</option>
                                    <option value="RUC">RUC</option>
                                    <option value="DNI">DNI</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="numero_documento" class="form-label">N° Documento</label>
                                <input type="text" class="form-control" id="numero_documento" name="numero_documento" pattern="[0-9]*" required>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-select" id="sexo" name="sexo" required>
                                    <option value="">Seleccione</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="fecha_nacimiento" class="form-label">F. Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label for="id_departamento" class="form-label">Departamento</label>
                                <select class="form-select" id="id_departamento" name="id_departamento" required>
                                    <option value="">Seleccione Departamento</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="id_provincia" class="form-label">Provincia</label>
                                <select class="form-select" id="id_provincia" name="id_provincia" required disabled>
                                    <option value="">Seleccione Provincia</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="id_distrito" class="form-label">Distrito</label>
                                <select class="form-select" id="id_distrito" name="id_distrito" required disabled>
                                    <option value="">Seleccione Distrito</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="saveTrabajadorBtn">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </main><?php include_once 'src/views/includes/footer.php'; ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

<script>
    // FIX: Inicialización nativa de Bootstrap 5.3 para evitar "Illegal invocation"
    const trabajadorModalEl = document.getElementById('trabajadorModal');
    const trabajadorModal = new bootstrap.Modal(trabajadorModalEl);

    // URL del controlador
    const API_URL = 'src/Controllers/TrabajadorController.php';

    // URLs de los tres archivos JSON (deben coincidir con tu ruta)
    const GEO_JSON_URLS = {
        departamentos: 'assets/data/departamentos.json',
        provincias: 'assets/data/provincias.json',
        distritos: 'assets/data/distritos.json',
    };

    // Variable global para almacenar los datos cargados
    let geoData = {
        departamentos: [],
        provincias: [],
        distritos: [],
    };

    // --- FUNCIONES DE CARGA Y FILTRADO JSON ---

    /**
     * Carga los tres archivos JSON simultáneamente usando Promise.all.
     */
    function loadAllGeoData() {
        const promises = [
            // Aseguramos que la respuesta se parsee como JSON
            fetch(HOST + GEO_JSON_URLS.departamentos).then(res => res.json()),
            fetch(HOST + GEO_JSON_URLS.provincias).then(res => res.json()),
            fetch(HOST + GEO_JSON_URLS.distritos).then(res => res.json()),
        ];

        return Promise.all(promises)
            .then(([depData, provData, distData]) => {
                geoData.departamentos = depData;
                geoData.provincias = provData;
                geoData.distritos = distData;
                populateDepartamentos(); // Iniciar el llenado
            })
            .catch(error => {
                console.error("Error al cargar uno o más archivos geográficos:", error);
                alert("No se pudieron cargar los datos geográficos de Perú. Revise las rutas y el formato JSON.");
            });
    }

    /**
     * Busca el nombre de una ubicación a partir de su ID (código).
     * Busca en los arrays geoData.departamentos, geoData.provincias o geoData.distritos.
     * @param {string} id - El código de ubicación (ej: "01", "101", "010101").
     * @returns {string} El nombre de la ubicación o "Desconocido" si no lo encuentra.
     */
    function getGeoName(id) {
        if (!id) return '';

        // El largo del ID determina qué array buscar
        let collection;
        let idKey = 'id';

        if (id.length === 2) { // Ejemplo: "01" (Departamento)
            collection = geoData.departamentos;
        } else if (id.length === 4) { // Ejemplo: "0101" (Provincia)
            collection = geoData.provincias;
        } else if (id.length === 6) { // Ejemplo: "010101" (Distrito)
            collection = geoData.distritos;
        } else {
            return 'ID Inválido';
        }

        const item = collection.find(item => item[idKey] === id);

        // Recordatorio: Tus JSON usan 'name' como clave para el nombre
        return item ? item.name : 'Desconocido';
    }

    /**
     * Llena el select de Departamentos al inicio.
     */
    function populateDepartamentos(selectedDepId = null) {
        const depSelect = document.getElementById('id_departamento');
        depSelect.innerHTML = '<option value="">Seleccione Departamento</option>';

        geoData.departamentos.forEach(dep => {
            // Uso de dep.name y comparación de IDs como strings
            const option = new Option(dep.name, dep.id, false, dep.id == selectedDepId);
            depSelect.appendChild(option);
        });
        depSelect.disabled = false;
    }

    /**
     * Llena el select de Provincias basado en el Departamento.
     */
    function populateProvincias(depId, selectedProvId = null) {
        const provSelect = document.getElementById('id_provincia');
        provSelect.innerHTML = '<option value="">Seleccione Provincia</option>';
        provSelect.disabled = true;

        if (!depId) return;

        // FILTRADO CORREGIDO: Usando 'department_id' como clave para filtrar
        const provinciasFiltradas = geoData.provincias.filter(p => p.department_id == depId);

        if (provinciasFiltradas.length > 0) {
            provinciasFiltradas.forEach(prov => {
                // Uso de prov.name y comparación de IDs como strings
                const option = new Option(prov.name, prov.id, false, prov.id == selectedProvId);
                provSelect.appendChild(option);
            });
            provSelect.disabled = false;
        }
    }

    /**
     * Llena el select de Distritos basado en la Provincia.
     */
    function populateDistritos(provId, selectedDistId = null) {
        const distSelect = document.getElementById('id_distrito');
        distSelect.innerHTML = '<option value="">Seleccione Distrito</option>';
        distSelect.disabled = true;

        if (!provId) return;

        // FILTRADO CORREGIDO: Usando 'province_id' como clave para filtrar
        const distritosFiltrados = geoData.distritos.filter(d => d.province_id == provId);

        if (distritosFiltrados.length > 0) {
            distritosFiltrados.forEach(dist => {
                // Uso de dist.name y comparación de IDs como strings
                const option = new Option(dist.name, dist.id, false, dist.id == selectedDistId);
                distSelect.appendChild(option);
            });
            distSelect.disabled = false;
        }
    }

    // --- LÓGICA DE INICIALIZACIÓN Y EVENTOS ---

    document.addEventListener('DOMContentLoaded', function() {
        // ... CÓDIGO DE INICIALIZACIÓN DE DATATABLES Y OTRAS FUNCIONES ...

        // 1. CARGA INICIAL DE LOS JSON
        loadAllGeoData();

        // 2. EVENTO: DEPARTAMENTO -> PROVINCIA
        document.getElementById('id_departamento').addEventListener('change', function() {
            const depId = this.value;
            const distSelect = document.getElementById('id_distrito');

            populateProvincias(depId);

            // Limpiar y deshabilitar distritos
            distSelect.innerHTML = '<option value="">Seleccione Distrito</option>';
            distSelect.disabled = true;
        });

        // 3. EVENTO: PROVINCIA -> DISTRITO
        document.getElementById('id_provincia').addEventListener('change', function() {
            const provId = this.value;
            populateDistritos(provId);
        });

        // 4. SOBRESCRIBIR editTrabajador (asegúrate de que esta función reemplace tu versión anterior)
        window.editTrabajador = function(id) {
            // Asegurarse de que los datos geográficos estén cargados antes de continuar
            if (geoData.departamentos.length === 0) {
                alert("Espere a que los datos geográficos se carguen completamente.");
                return;
            }

            fetch(HOST + API_URL + '?action=read', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_trabajador: id
                    })
                })
                .then(handleResponse)
                .then(data => {
                    // ... Rellenar campos estáticos ...
                    document.getElementById('id_trabajador').value = data.id_trabajador;
                    document.getElementById('nombre').value = data.nombre;
                    document.getElementById('apellido_paterno').value = data.apellido_paterno;
                    document.getElementById('apellido_materno').value = data.apellido_materno;
                    document.getElementById('tipo_documento').value = data.tipo_documento;
                    document.getElementById('numero_documento').value = data.numero_documento;
                    document.getElementById('sexo').value = data.sexo;
                    document.getElementById('fecha_nacimiento').value = data.fecha_nacimiento;
                    document.getElementById('direccion').value = data.direccion;
                    aplicarValidacionDocumento(data.tipo_documento);

                    // Lógica de carga geográfica con preselección (data.id_xxx son los IDs guardados en BD)
                    const depId = data.id_departamento;
                    const provId = data.id_provincia;
                    const distId = data.id_distrito;

                    // 1. Preseleccionar DEPARTAMENTO
                    populateDepartamentos(depId);

                    // 2. Preseleccionar PROVINCIA
                    // Necesitamos esperar que el select de departamento se actualice antes de cargar provincias,
                    // pero ya lo hacemos de forma sincrónica aquí:
                    populateProvincias(depId, provId);

                    // 3. Preseleccionar DISTRITO
                    populateDistritos(provId, distId);

                    document.getElementById('trabajadorModalLabel').textContent = '✏️ Editar Trabajador ID: ' + id;
                    trabajadorModal.show();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al obtener los datos del trabajador: ' + error.message);
                });
        }

    });

    // Función para manejar las respuestas JSON del backend
    function handleResponse(response) {
        if (!response.ok) {
            // Manejar errores HTTP (400, 500, etc.)
            return response.json().then(error => {
                // El error.message viene de las excepciones del Controller
                throw new Error(error.message || `Error HTTP: ${response.status}`);
            });
        }
        return response.json();
    }

    // --- LÓGICA DE VALIDACIÓN FRONTAL DE DOCUMENTO ---
    function aplicarValidacionDocumento(tipo) {
        const inputDoc = document.getElementById('numero_documento');

        inputDoc.removeAttribute('maxlength');
        inputDoc.title = 'Ingrese un número de documento válido.';

        if (tipo === 'RUC') {
            inputDoc.setAttribute('maxlength', '11');
            inputDoc.title = 'RUC debe tener 11 dígitos numéricos.';
        } else if (tipo === 'DNI') {
            inputDoc.setAttribute('maxlength', '8');
            inputDoc.title = 'DNI debe tener 8 dígitos numéricos.';
        } else if (tipo === 'Pasaporte') {
            inputDoc.setAttribute('maxlength', '12');
            inputDoc.title = 'Pasaporte debe tener 12 dígitos numéricos.';
        }
    }

    // --- FUNCIONES CRUD ---

    function saveTrabajador() {
        // Detener el envío de formulario por defecto
        event.preventDefault();

        const form = document.getElementById('trabajadorForm');
        const formData = new FormData(form);
        const trabajador = {};
        formData.forEach((value, key) => {
            trabajador[key] = value;
        });

        const action = trabajador.id_trabajador ? 'update' : 'create';

        // 1. VALIDACIÓN FRONTAL DE LONGITUD EXACTA (Antes de enviar)
        const tipo = trabajador.tipo_documento;
        const numDoc = trabajador.numero_documento;
        let expectedLength = 0;
        if (tipo === 'RUC') expectedLength = 11;
        else if (tipo === 'DNI') expectedLength = 8;
        else if (tipo === 'Pasaporte') expectedLength = 12;

        if (numDoc.length !== expectedLength) {
            alert(`⚠️ Error de formato: El ${tipo} debe tener exactamente ${expectedLength} dígitos.`);
            return;
        }

        // 2. ENVÍO DE DATOS
        fetch(HOST + API_URL + `?action=${action}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(trabajador)
            })
            .then(handleResponse)
            .then(data => {
                showMessage(data.message || 'Operación exitosa!', 'success');
                trabajadorModal.hide();
                $('#trabajadoresTable').DataTable().ajax.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al guardar trabajador: ' + error.message);
            });
    }

    function editTrabajador(id) {
        fetch(HOST + API_URL + '?action=read', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_trabajador: id
                })
            })
            .then(handleResponse)
            .then(data => {
                // Rellenar campos
                document.getElementById('id_trabajador').value = data.id_trabajador;
                document.getElementById('nombre').value = data.nombre;
                document.getElementById('apellido_paterno').value = data.apellido_paterno;
                document.getElementById('apellido_materno').value = data.apellido_materno;
                document.getElementById('tipo_documento').value = data.tipo_documento;
                document.getElementById('numero_documento').value = data.numero_documento;
                document.getElementById('sexo').value = data.sexo;
                document.getElementById('fecha_nacimiento').value = data.fecha_nacimiento;
                document.getElementById('departamento').value = data.departamento;
                document.getElementById('provincia').value = data.provincia;
                document.getElementById('distrito').value = data.distrito;
                document.getElementById('direccion').value = data.direccion;

                // Aplicar la validación de longitud al cargar datos
                aplicarValidacionDocumento(data.tipo_documento);

                // Cambiar el título del modal
                document.getElementById('trabajadorModalLabel').textContent = 'Editar Trabajador ID: ' + id;

                trabajadorModal.show(); // Mostrar modal con instancia nativa
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al obtener los datos del trabajador: ' + error.message);
            });
    }

    function deleteTrabajador(id) {
        if (confirm('¿Está seguro de que desea eliminar este trabajador?')) {
            fetch(HOST + API_URL + '?action=delete', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_trabajador: id
                    })
                })
                .then(handleResponse)
                .then(data => {
                    showMessage(data.message || 'Eliminación exitosa!', 'success');
                    $('#trabajadoresTable').DataTable().ajax.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al eliminar el trabajador: ' + error.message);
                });
        }
    }

    // --- INICIALIZACIÓN ---
    document.addEventListener('DOMContentLoaded', function() {

        // Inicializar DataTables
        const trabajadoresTable = $('#trabajadoresTable').DataTable({
            ajax: {
                url: HOST + API_URL + '?action=read_all',
                dataSrc: ''
            },
            columns: [{
                    data: 'id_trabajador',
                    title: 'ID'
                },
                {
                    data: null,
                    title: 'Nombre Completo',
                    render: (data) => `${data.nombre} ${data.apellido_paterno} ${data.apellido_materno}`
                },
                {
                    data: 'tipo_documento',
                    title: 'Doc.'
                },
                {
                    data: 'numero_documento',
                    title: 'N° Doc.'
                },
                {
                    data: 'sexo',
                    title: 'Sexo'
                },
                {
                    data: 'fecha_nacimiento',
                    title: 'F. Nacimiento'
                },
                {
                    data: null,
                    title: 'Ubicación',
                    render: function(data) {
                        // Obtenemos los códigos almacenados en la BD
                        const depCode = data.id_departamento;
                        const provCode = data.id_provincia;
                        const distCode = data.id_distrito;

                        // Traducimos los códigos a nombres usando la data global de los JSON
                        const depName = getGeoName(depCode);
                        const provName = getGeoName(provCode);
                        const distName = getGeoName(distCode);

                        // Formato de salida: Distrito, Provincia, (Departamento)
                        return `${distName}, ${provName}, (${depName})`;
                    }
                },
                {
                    data: 'direccion',
                    title: 'Dirección'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-warning btn-sm edit-btn" onclick="editTrabajador(${row.id_trabajador})" title="Editar datos"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger btn-sm delete-btn" onclick="deleteTrabajador(${row.id_trabajador})" title="Eliminar registro"><i class="bi bi-trash"></i></button>
                        `;
                    }
                }
            ],
            "language": {

                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });

        // Evento para abrir el modal (Botón Agregar Trabajador)
        document.getElementById('btnAgregarTrabajador').addEventListener('click', function() {
            // Limpiar formulario y poner título de Registro
            document.getElementById('trabajadorForm').reset();
            document.getElementById('id_trabajador').value = '';
            document.getElementById('trabajadorModalLabel').textContent = 'Registrar Trabajador';

            // Asegurar que la validación de documento se aplique
            aplicarValidacionDocumento(document.getElementById('tipo_documento').value);

            trabajadorModal.show(); // Mostrar modal con instancia nativa
        });

        // Manejar el envío del formulario (Crear/Actualizar)
        document.getElementById('saveTrabajadorBtn').addEventListener('click', saveTrabajador);

        // Manejar la validación de longitud al cambiar el tipo de documento
        document.getElementById('tipo_documento').addEventListener('change', function(e) {
            aplicarValidacionDocumento(e.target.value);
            document.getElementById('numero_documento').value = ''; // Limpiar el número al cambiar el tipo
        });

    });
</script>

</html>