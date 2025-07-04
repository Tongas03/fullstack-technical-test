# 🧪 Prueba Técnica — Full Stack Developer

Este proyecto es una **prueba técnica** para el puesto de **Desarrollador Full Stack Senior**. Fue desarrollado utilizando **Laravel** (con Breeze + React) para el backend y frontend, con una base de datos MySQL y entorno de desarrollo basado en **Homestead/Vagrant** (aunque también es compatible con Linux).

---

## 🎯 Objetivo del proyecto

Implementar una aplicación web funcional que sirva como evaluación técnica, cumpliendo con los siguientes criterios:

- Estructura clara de backend y frontend desacoplados
- Autenticación completa con Laravel Breeze + React
- Integración con base de datos MySQL
- Buenas prácticas de arquitectura, control de versiones y documentación

---

## ⚙️ Setup local

> ✅ **Paso 1:** Ejecutar el script de instalación automática

Este proyecto incluye un script de configuración llamado `setup_env.sh`, que automatiza todo el proceso de preparación para entornos **Linux nativos**.

```bash
./setup_env.sh
```

Este script realiza lo siguiente:

- Crea la base de datos MySQL (`proyecto_prueba`)
- Copia el archivo `.env` desde `.env.example` si no existe
- Instala dependencias PHP y JavaScript
- Genera la clave de aplicación Laravel
- Ejecuta las migraciones y seeders
- Compila los assets de frontend con Vite

---

### 🔧 Requisitos

Antes de ejecutar el script, asegurate de tener instalado:

- PHP 8.1+
- Composer
- Node.js + npm
- MySQL (con acceso root)
- Git (opcional)

---

## 🖥️ Acceso a la aplicación

Una vez ejecutado el setup, podés acceder desde tu navegador:

```
http://localhost:8000
```

(Usá `php artisan serve` si no usás servidor embebido como Apache o Nginx)

---

## 🔑 Credenciales de prueba

```text
Email: admin@example.com
Password: password
```

> Podés modificar estos datos en los seeders si querés probar otros usuarios.

---

## 📚 Tecnologías utilizadas

- Laravel (backend)
- Laravel Breeze (autenticación)
- React + Tailwind CSS (frontend)
- Vite (compilador frontend)
- MySQL (base de datos)
- Redis (opcional)
- **Entorno de desarrollo:** Windows + Vagrant + Homestead (también compatible con Linux)

---

## 🧪 Tests

```bash
php artisan test
```

---

## 🛠️ Estructura del proyecto

```text
/resources/js/         → Componentes React
/routes/web.php        → Rutas protegidas (Laravel)
/database/seeders/     → Seeders para datos de prueba
/public/               → Archivos públicos y build
```

---

## 📎 Notas adicionales

- El código sigue el estándar PSR-12.
- Los commits siguen un estilo claro y atómico.

---

## 🧑‍💻 Autor

Gaston Raimundo — [github.com/Tongas03](https://github.com/Tongas03)

---

## ✅ Estado del proyecto

> Proyecto funcional — entregado como parte de una prueba técnica.
