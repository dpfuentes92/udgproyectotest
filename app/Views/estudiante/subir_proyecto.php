<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center py-4">
    <div class="col-lg-10">
        <!-- Wizard Header -->
        <div class="card shadow border-0 mb-4 overflow-hidden">
            <div class="card-header bg-primary text-white text-center p-4">
                <h3 class="mb-1">Registro de Nuevo Proyecto Académico</h3>
                <p class="mb-0 opacity-75">Completa los 3 pasos para registrar los metadatos de tu investigación.</p>
            </div>
            <div class="card-body p-0">
                <div class="d-flex wizard-steps border-bottom">
                    <div class="step-item active" id="step-header-1">
                        <div class="step-number">1</div>
                        <div class="step-text">Metadatos</div>
                    </div>
                    <div class="step-item" id="step-header-2">
                        <div class="step-number">2</div>
                        <div class="step-text">Asesor</div>
                    </div>
                    <div class="step-item" id="step-header-3">
                        <div class="step-number">3</div>
                        <div class="step-text">Archivos</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Multi-Step Form -->
        <form id="projectForm" action="<?= base_url('estudiante/guardar_proyecto') ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <?= csrf_field() ?>
            <input type="hidden" name="status" id="formStatus" value="enviado">

            <!-- Step 1: Metadatos -->
            <div class="card shadow-sm border-0 mb-4 wizard-step-content active" id="step-1">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold mb-4 d-flex align-items-center">
                        <span class="badge bg-primary rounded-circle me-2">1</span> Información General del Proyecto
                    </h5>
                    
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label fw-semibold">Título del Proyecto *</label>
                            <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Ej: Aplicación de Redes Neuronales en el Clima" required>
                            <div class="invalid-feedback">Por favor ingresa un título válido.</div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-end mb-2">
                                <label for="description" class="form-label fw-semibold mb-0">Resumen / Abstract *</label>
                                <span id="wordCounter" class="badge bg-secondary">0 / 500 palabras</span>
                            </div>
                            <textarea class="form-control" id="description" name="description" rows="6" placeholder="Describe brevemente de qué trata tu investigación..." required></textarea>
                            <div class="invalid-feedback" id="descriptionError">Por favor ingresa un resumen (máx. 500 palabras).</div>
                        </div>

                        <div class="col-md-6">
                            <label for="keywords" class="form-label fw-semibold">Palabras Clave *</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Separa por comas (ej: AI, Salud, Web)" required>
                            <div class="invalid-feedback">Por favor ingresa al menos una palabra clave.</div>
                        </div>

                        <div class="col-md-3">
                            <label for="area_conocimiento" class="form-label fw-semibold">Área de Conocimiento *</label>
                            <select class="form-select" id="area_conocimiento" name="area_conocimiento" required>
                                <option value="" disabled selected>Seleccionar...</option>
                                <option value="Ciencias Naturales">Ciencias Naturales</option>
                                <option value="Ingeniería y Tecnología">Ingeniería y Tecnología</option>
                                <option value="Ciencias Médicas">Ciencias Médicas</option>
                                <option value="Ciencias Agrícolas">Ciencias Agrícolas</option>
                                <option value="Ciencias Sociales">Ciencias Sociales</option>
                                <option value="Humanidades">Humanidades</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label for="tipo_actividad" class="form-label fw-semibold">Tipo de Actividad *</label>
                            <select class="form-select" id="tipo_actividad" name="tipo_actividad" required>
                                <option value="" disabled selected>Seleccionar...</option>
                                <option value="Tesis">Tesis</option>
                                <option value="Tesina">Tesina</option>
                                <option value="Proyecto Terminal">Proyecto Terminal</option>
                                <option value="Informe de Investigación">Informe de Investigación</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Asesor -->
            <div class="card shadow-sm border-0 mb-4 wizard-step-content" id="step-2">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold mb-4 d-flex align-items-center">
                        <span class="badge bg-primary rounded-circle me-2">2</span> Selección del Asesor Institucional
                    </h5>
                    
                    <div class="alert alert-info py-2">
                        <small><i class="bi bi-info-circle-fill me-1"></i> El asesor seleccionado debe ser un miembro activo registrado en el directorio de la UDG.</small>
                    </div>

                    <div class="mb-4 position-relative">
                        <label for="asesor_search" class="form-label fw-semibold">Buscar Asesor por Nombre o Código *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" id="asesor_search" placeholder="Escribe el nombre del docente...">
                        </div>
                        <ul id="asesor-results" class="list-group position-absolute w-100 z-3 shadow-lg d-none">
                            <!-- Results will appear here -->
                        </ul>
                        <input type="hidden" id="asesor_nombre" name="asesor_nombre" required>
                    </div>

                    <div id="asesor-selected-card" class="card d-none border-primary bg-light">
                        <div class="card-body d-flex align-items-center p-3">
                            <div class="avatar-circle me-3"><i class="bi bi-person-check-fill fs-3 text-primary"></i></div>
                            <div>
                                <h6 class="mb-0 fw-bold" id="selected-asesor-name">--</h6>
                                <p class="mb-0 small text-muted" id="selected-asesor-details">Miembro Activo UDG</p>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger ms-auto" id="remove-asesor"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Archivos -->
            <div class="card shadow-sm border-0 mb-4 wizard-step-content" id="step-3">
                <div class="card-body p-4">
                    <h5 class="card-title fw-bold mb-4 d-flex align-items-center">
                        <span class="badge bg-primary rounded-circle me-2">3</span> Documentación Final
                    </h5>

                    <div class="mb-4">
                        <label for="file" class="form-label fw-semibold">Cargar Documento Principal (PDF) *</label>
                        <div class="drop-zone p-4 rounded-3 border-dashed text-center cursor-pointer" id="mainFileZone">
                            <i class="bi bi-file-earmark-pdf fs-1 text-primary mb-2"></i>
                            <p class="mb-1 fw-bold">Arrastra tu archivo aquí o haz clic para seleccionar</p>
                            <p class="small text-muted mb-0">Solo archivos PDF (Máx. 500MB)</p>
                            <input type="file" class="d-none" id="file" name="file" accept=".pdf" required>
                            <div class="mt-2 text-primary d-none" id="mainFileName"></div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="annexes" class="form-label fw-semibold">Archivos Anexos (Opcional)</label>
                        <div class="drop-zone p-3 rounded-3 border-dashed text-center cursor-pointer" id="annexesFileZone">
                            <i class="bi bi-files fs-2 text-secondary mb-2"></i>
                            <p class="mb-1 fw-semibold">Seleccionar archivos anexos</p>
                            <p class="small text-muted mb-0">Formatos varios (Máx. 500MB total)</p>
                            <input type="file" class="d-none" id="annexes" name="annexes[]" multiple>
                            <div class="mt-2 text-muted small d-none" id="annexesCount">0 archivos seleccionados</div>
                        </div>
                    </div>

                    <!-- Progress Bar for Large Files -->
                    <div id="uploadProgressContainer" class="d-none mb-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small fw-semibold">Subiendo archivos...</span>
                            <span id="progressPercent" class="small fw-semibold">0%</span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div id="uploadProgressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                        </div>
                    </div>

                    <div class="alert alert-warning border-0 bg-opacity-10 bg-warning mb-0">
                        <div class="d-flex">
                            <i class="bi bi-shield-check-fill flex-shrink-0 fs-4 me-3 text-warning"></i>
                            <div>
                                <p class="fw-bold mb-1 small text-warning-emphasis">Escaneo de Virus Activo</p>
                                <p class="mb-0 small text-warning-emphasis">Todos tus archivos serán analizados en busca de malware antes de ser almacenados de forma segura en nuestros servidores.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary px-4 d-none" id="prevBtn">Anterior</button>
                <div class="ms-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-primary px-4" id="saveDraftBtn">Guardar Borrador</button>
                    <button type="button" class="btn btn-primary px-5" id="nextBtn">Siguiente</button>
                    <button type="submit" class="btn btn-success px-5 d-none" id="submitBtn">Enviar Proyecto</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    /* Custom Wizard Styles */
    .wizard-steps {
        display: flex;
        background-color: #fcfcfc;
    }
    .step-item {
        flex: 1;
        padding: 1.5rem 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
        position: relative;
        opacity: 0.5;
        transition: all 0.3s ease;
    }
    .step-item.active {
        opacity: 1;
        background-color: white;
    }
    .step-item.active .step-number {
        background-color: var(--bs-primary);
        color: white;
    }
    .step-item.completed .step-number {
        background-color: #198754;
        color: white;
    }
    .step-number {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: #dee2e6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    .step-text {
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .wizard-step-content {
        display: none;
    }
    .wizard-step-content.active {
        display: block;
        animation: fadeIn 0.4s ease;
    }

    .border-dashed {
        border: 2px dashed #dee2e6;
        transition: all 0.3s ease;
    }
    .drop-zone:hover {
        border-color: var(--bs-primary);
        background-color: #f8f9fa;
    }
    .cursor-pointer {
        cursor: pointer;
    }

    .avatar-circle {
        width: 50px;
        height: 50px;
        background-color: #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const projectForm = document.getElementById('projectForm');
    const steps = ['step-1', 'step-2', 'step-3'];
    let currentStep = 0;

    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    const saveDraftBtn = document.getElementById('saveDraftBtn');
    const formStatus = document.getElementById('formStatus');

    // --- Navigation Logic ---
    function updateWizard() {
        // Update Content
        document.querySelectorAll('.wizard-step-content').forEach(s => s.classList.remove('active'));
        document.getElementById(steps[currentStep]).classList.add('active');

        // Update Headers
        document.querySelectorAll('.step-item').forEach((h, idx) => {
            h.classList.remove('active', 'completed');
            if (idx === currentStep) h.classList.add('active');
            if (idx < currentStep) h.classList.add('completed');
        });

        // Visibility of Buttons
        prevBtn.classList.toggle('d-none', currentStep === 0);
        
        if (currentStep === steps.length - 1) {
            nextBtn.classList.add('d-none');
            submitBtn.classList.remove('d-none');
        } else {
            nextBtn.classList.remove('d-none');
            submitBtn.classList.add('d-none');
        }
    }

    nextBtn.addEventListener('click', () => {
        if (validateStep(currentStep)) {
            currentStep++;
            updateWizard();
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    });

    prevBtn.addEventListener('click', () => {
        currentStep--;
        updateWizard();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });

    function validateStep(step) {
        const currentContainer = document.getElementById(steps[step]);
        const inputs = currentContainer.querySelectorAll('input[required], textarea[required], select[required]');
        let valid = true;
        
        inputs.forEach(input => {
            if (!input.value) {
                input.classList.add('is-invalid');
                valid = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });

        // Additional validation for summary words
        if (step === 0) {
            const desc = document.getElementById('description').value;
            const words = desc.trim().split(/\s+/).filter(word => word.length > 0).length;
            if (words > 500) {
                document.getElementById('description').classList.add('is-invalid');
                valid = false;
            }
        }

        return valid;
    }

    // --- Word Counter Logic ---
    const description = document.getElementById('description');
    const wordCounter = document.getElementById('wordCounter');

    description.addEventListener('input', function() {
        const words = this.value.trim().split(/\s+/).filter(word => word.length > 0).length;
        wordCounter.textContent = `${words} / 500 palabras`;
        
        if (words > 500) {
            wordCounter.classList.remove('bg-secondary');
            wordCounter.classList.add('bg-danger');
            this.classList.add('is-invalid');
        } else {
            wordCounter.classList.remove('bg-danger');
            wordCounter.classList.add('bg-secondary');
            this.classList.remove('is-invalid');
        }
    });

    // --- Advisor Search Mock Logic ---
    const asesorSearch = document.getElementById('asesor_search');
    const asesorResults = document.getElementById('asesor-results');
    const asesorHidden = document.getElementById('asesor_nombre');
    const asesorSelectedCard = document.getElementById('asesor-selected-card');
    const selectedAsesorName = document.getElementById('selected-asesor-name');
    const removeAsesor = document.getElementById('remove-asesor');

    const mockAdvisors = [
        "Dr. Juan Pérez", "Mtra. María García", "Dr. Roberto Hernández", "Dra. Laura Flores", "Dr. Carlos Santoyo", "Mtra. Sofía Ramírez"
    ];

    asesorSearch.addEventListener('input', function() {
        const val = this.value.toLowerCase();
        asesorResults.innerHTML = '';
        if (val.length < 2) {
            asesorResults.classList.add('d-none');
            return;
        }

        const filtered = mockAdvisors.filter(a => a.toLowerCase().includes(val));
        if (filtered.length > 0) {
            filtered.forEach(name => {
                const li = document.createElement('li');
                li.className = 'list-group-item list-group-item-action cursor-pointer';
                li.textContent = name;
                li.addEventListener('click', () => selectAsesor(name));
                asesorResults.appendChild(li);
            });
            asesorResults.classList.remove('d-none');
        } else {
            asesorResults.classList.add('d-none');
        }
    });

    function selectAsesor(name) {
        asesorHidden.value = name;
        selectedAsesorName.textContent = name;
        asesorSearch.parentElement.classList.add('d-none');
        asesorResults.classList.add('d-none');
        asesorSelectedCard.classList.remove('d-none');
        asesorSearch.value = '';
    }

    removeAsesor.addEventListener('click', () => {
        asesorHidden.value = '';
        asesorSelectedCard.classList.add('d-none');
        asesorSearch.parentElement.classList.remove('d-none');
    });

    // --- File Drop-zone Logic ---
    setupDropzone('mainFileZone', 'file', 'mainFileName', (f) => f[0].name);
    setupDropzone('annexesFileZone', 'annexes', 'annexesCount', (f) => `${f.length} archivos seleccionados`);

    function setupDropzone(zoneId, inputId, labelId, labelFunc) {
        const zone = document.getElementById(zoneId);
        const input = document.getElementById(inputId);
        const label = document.getElementById(labelId);

        zone.addEventListener('click', () => input.click());
        input.addEventListener('change', () => {
            if (input.files.length > 0) {
                label.textContent = labelFunc(input.files);
                label.classList.remove('d-none');
            }
        });
    }

    // --- Submit Logic (Draft vs Send) ---
    saveDraftBtn.addEventListener('click', () => {
        formStatus.value = 'borrador';
        projectForm.submit();
    });

    projectForm.addEventListener('submit', function(e) {
        if (!validateStep(currentStep)) {
            e.preventDefault();
            return;
        }
        
        // Simular progreso de carga
        const progressContainer = document.getElementById('uploadProgressContainer');
        const progressBar = document.getElementById('uploadProgressBar');
        const progressPercent = document.getElementById('progressPercent');
        
        progressContainer.classList.remove('d-none');
        
        // En una implementación real usaríamos XHR para rastrear el progreso
        let progress = 0;
        const interval = setInterval(() => {
            progress += 5;
            progressBar.style.width = progress + '%';
            progressPercent.textContent = progress + '%';
            if (progress >= 100) {
                clearInterval(interval);
            }
        }, 100);
    });
});
</script>
<?= $this->endSection() ?>
