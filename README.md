# UDG-Proyectos 🎓

**UDG-Proyectos** es una plataforma web desarrollada para la Universidad de Guadalajara (UDG) destinada a la gestión, seguimiento y publicación de tesis y proyectos de investigación estudiantiles.

## 🚀 Módulos del Sistema

El sistema cuenta con 4 roles principales y sus respectivos módulos:

1.  **Estudiante**: Carga de proyectos (PDF), seguimiento en tiempo real del estado de revisión y perfil profesional.
2.  **Comité (Evaluador)**: Panel de revisión de tesis, dictaminación (aprobado/rechazado) y retroalimentación técnica.
3.  **Administrador**: Gestión global de usuarios, roles, estadísticas y configuraciones del sistema.
4.  **Visitante (Público)**: Repositorio digital para búsqueda y consulta de investigaciones aprobadas.

## 🛠️ Tecnologías Usadas

- **Backend**: PHP 8.1+ con **CodeIgniter 4**.
- **Frontend**: Bootstrap 5, HTML5, CSS3 y JavaScript Vanilla.
- **Base de Datos**: MySQL / MariaDB.
- **Servidor Recomendado**: XAMPP / Apache.

## 📋 Requisitos del Sistema

- PHP 8.1 o superior.
- Extensiones de PHP: `intl`, `mbstring`, `mysqli`, `curl`.
- MySQL 5.7+ o MariaDB 10.3+.
- Composer (para gestión de dependencias).

## ⚙️ Instalación Paso a Paso

1.  **Clonar el repositorio**:
    ```bash
    git clone https://github.com/tu-usuario/udg-proyectos.git
    cd udg-proyectos
    ```

2.  **Instalar dependencias**:
    ```bash
    composer install
    ```

3.  **Configurar entorno**:
    - Renombra el archivo `env.example` a `.env`.
    - Configura la base de datos en las variables `database.default.*`.
    - Ajusta la `app.baseURL` a tu URL local (ej: `http://localhost/udg-proyectos/public/`).

4.  **Base de Datos**:
    - Crea una base de datos llamada `tesis_udg`.
    - Ejecuta las migraciones:
      ```bash
      php spark migrate
      ```
    - (Opcional) Ejecuta los seeders para datos iniciales:
      ```bash
      php spark db:seed MainSeeder
      ```

5.  **Iniciar Servidor**:
    ```bash
    php spark serve
    ```
    O accede vía XAMPP: `http://localhost/udg-proyectos/public/`.

## 📂 Estructura del Proyecto

```text
udg-proyectos/
├── app/                # Lógica de la aplicación (MVC)
│   ├── Config/         # Configuración del sistema y rutas
│   ├── Controllers/    # Controladores (Auth, Estudiante, etc.)
│   ├── Database/       # Migraciones y Seeders
│   ├── Models/         # Modelos de datos
│   └── Views/          # Vistas (Bootstrap 5)
├── public/             # Punto de entrada y activos (JS/CSS/Logo)
├── writable/           # Archivos temporales, logs y caché
└── tests/              # Pruebas unitarias
```

## 🔐 Credenciales de Prueba (Admin)
- **Usuario**: `admin`
- **Contraseña**: `admin123`

---
© 2026 Universidad de Guadalajara - Sistema de Gestión de Tesis.
