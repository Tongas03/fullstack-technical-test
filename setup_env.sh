#!/bin/bash

# ⚙️ Configuraciones
DB_NAME="homestead"
DB_USER="homestead"
DB_PASS="secret"
ENV_FILE=".env"

echo "🚀 Iniciando setup del entorno local para Laravel en Linux..."

# Paso 1: Crear base de datos localmente
echo "🗃️  Creando base de datos MySQL '$DB_NAME'..."
mysql -u"$DB_USER" -p"$DB_PASS" -e "
  CREATE DATABASE IF NOT EXISTS $DB_NAME CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
" || {
  echo "❌ Error al crear la base de datos. Verificá las credenciales."
  exit 1
}

# Paso 2: Copiar .env si no existe
if [ ! -f "$ENV_FILE" ]; then
  echo "📄 Copiando archivo .env desde .env.example..."
  cp .env.example .env
else
  echo "📄 Archivo .env ya existe. No se sobrescribe."
fi

# Paso 3: Instalar dependencias y configurar Laravel
echo "📦 Instalando dependencias de Laravel y compilando frontend..."
composer install || exit 1
npm install --no-bin-links || exit 1

echo "🔐 Generando clave de aplicación..."
php artisan key:generate

echo "🧬 Ejecutando migraciones y seeders..."
php artisan migrate --seed

echo "🌀 Compilando assets con Vite..."
npm run dev

echo "✅ Setup completado. Podés acceder a tu aplicación en el puerto configurado por tu servidor local (ej: http://localhost:8000)"
