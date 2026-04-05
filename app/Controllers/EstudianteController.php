<?php

namespace App\Controllers;

use App\Models\ProyectoModel;

/**
 * EstudianteController
 * Gestiona las acciones permitidas para los alumnos: subir proyectos y ver su estado.
 */
class EstudianteController extends BaseController
{
    public function dashboard()
    {
        $data = [
            'title' => 'Panel de Control - Estudiante',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Estudiante', 'url' => '#', 'active' => false],
                ['name' => 'Dashboard', 'url' => '#', 'active' => true]
            ]
        ];
        return view('estudiante/dashboard', $data);
    }

    public function subir_proyecto()
    {
        $data = [
            'title' => 'Subir Nuevo Proyecto - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Dashboard', 'url' => base_url('estudiante'), 'active' => false],
                ['name' => 'Subir Proyecto', 'url' => '#', 'active' => true]
            ]
        ];
        return view('estudiante/subir_proyecto', $data);
    }

    public function mis_proyectos()
    {
        $data = [
            'title' => 'Mis Proyectos - UDG-Proyectos',
            'breadcrumbs' => [
                ['name' => 'Inicio', 'url' => base_url(), 'active' => false],
                ['name' => 'Dashboard', 'url' => base_url('estudiante'), 'active' => false],
                ['name' => 'Mis Proyectos', 'url' => '#', 'active' => true]
            ]
        ];
        return view('estudiante/mis_proyectos', $data);
    }

    public function guardar_proyecto()
    {
        helper(['form', 'url', 'text']);

        if ($this->request->getMethod() !== 'POST') {
            return redirect()->to('estudiante/subir_proyecto');
        }

        // 1. Validaciones
        $rules = [
            'title'             => 'required|min_length[5]|max_length[255]',
            'description'       => 'required', // La validación de palabras se hará manualmente o con custom rule
            'keywords'          => 'required',
            'area_conocimiento' => 'required',
            'tipo_actividad'    => 'required',
            'asesor_nombre'     => 'required',
            'status'            => 'required|in_list[borrador,enviado]',
            'file'              => 'uploaded[file]|max_size[file,512000]|ext_in[file,pdf]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validar palabras en resumen (máximo 500)
        $description = $this->request->getPost('description');
        $wordCount = count(explode(' ', trim($description)));
        if ($wordCount > 500) {
            return redirect()->back()->withInput()->with('errors', ['description' => 'El resumen no puede exceder las 500 palabras.']);
        }

        // 2. Manejo de archivos
        $mainFile = $this->request->getFile('file');
        $mainFilePath = '';
        if ($mainFile->isValid() && !$mainFile->hasMoved()) {
            $newName = $mainFile->getRandomName();
            $mainFile->move(FCPATH . 'uploads/projects/main', $newName);
            $mainFilePath = 'uploads/projects/main/' . $newName;
        }

        // Anexos (opcional)
        $anexosPaths = [];
        if ($files = $this->request->getFileMultiple('annexes')) {
            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/projects/annexes', $newName);
                    $anexosPaths[] = 'uploads/projects/annexes/' . $newName;
                }
            }
        }

        // 3. Generar Folio Único
        $folio = 'UDG-' . date('Ymd') . '-' . strtoupper(random_string('alnum', 6));

        // 4. Guardar en Base de Datos
        $proyectoModel = new ProyectoModel();

        // En un caso real, student_id vendría de la sesión del usuario
        // Por ahora lo dejamos como 1 (simulado)
        $studentId = 1; 

        $data = [
            'student_id'        => $studentId,
            'title'             => $this->request->getPost('title'),
            'description'       => $description,
            'keywords'          => $this->request->getPost('keywords'),
            'area_conocimiento' => $this->request->getPost('area_conocimiento'),
            'tipo_actividad'    => $this->request->getPost('tipo_actividad'),
            'asesor_nombre'     => $this->request->getPost('asesor_nombre'),
            'folio'             => $folio,
            'status'            => $this->request->getPost('status'),
            'file_path'         => $mainFilePath,
            'anexos_paths'      => json_encode($anexosPaths),
        ];

        if ($proyectoModel->insert($data)) {
            return redirect()->to('estudiante/dashboard')->with('success', '¡Proyecto guardado con éxito! Folio de seguimiento: ' . $folio);
        } else {
            return redirect()->back()->withInput()->with('errors', $proyectoModel->errors());
        }
    }

}
