# 🏠 Proyecto Inmobiliaria - DAW

## 📌 Descripción

Este proyecto consiste en el desarrollo de una aplicación web de gestión inmobiliaria realizada en el módulo de Desarrollo Web en Entorno Servidor (DAW).

La aplicación permite gestionar usuarios y pisos, diferenciando entre distintos tipos de usuarios (administrador, vendedor y comprador), y controlando el acceso mediante sesiones.

---

## 🛠️ Tecnologías utilizadas

- HTML5
- CSS3
- PHP
- MySQL
- XAMPP

---

## 👥 Tipos de usuarios

### 🔐 Administrador
- Gestión completa de usuarios (CRUD)
- Gestión completa de pisos (CRUD)

### 🟢 Vendedor
- Crear pisos
- Editar sus pisos
- Eliminar sus pisos
- Subir imágenes

### 🔵 Comprador
- Ver pisos disponibles
- Comprar pisos

### 🌐 Usuario no registrado
- Ver pisos disponibles

---

## ⚙️ Instalación y ejecución

Para ejecutar el proyecto en local:

1. Instalar XAMPP
2. Copiar la carpeta del proyecto en:
C:\xampp\htdocs\inmobiliaria
3. Iniciar Apache y MySQL desde el panel de XAMPP

4. Importar la base de datos:
   - Abrir phpMyAdmin
   - Crear una base de datos llamada `inmobiliaria`
   - Importar el archivo `.sql`

5. Acceder al proyecto desde el navegador:
http://localhost/inmobiliaria/

---

## 🔑 Usuarios de prueba

Puedes crear usuarios desde el registro o usar:

- Admin:
  - Email: admin@admin.com
  - Password: 1234

---

## 📂 Estructura del proyecto
/backend → Panel de administración
/frontend → Zona de usuarios
/includes → Conexión a la base de datos
/uploads → Imágenes de los pisos
/css → Estilos

---

## 🚀 Funcionalidades principales

- Registro de usuarios
- Login con sesiones
- CRUD de usuarios (admin)
- CRUD de pisos (admin y vendedor)
- Compra de pisos
- Subida de imágenes
- Control de acceso por roles

---

## 💡 Mejoras implementadas

- Mejora de usabilidad en navegación
- Redirección tras logout a la página principal
- Botones de navegación entre páginas

---

## 📌 Autor

Gonzalo Arranz Alonso  
DAW - Desarrollo Web en Entorno Servidor