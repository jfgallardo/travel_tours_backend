# 🌍✈️ Travel Tours - Backend 🏨🚀

## 📌 Descripción
Backend desarrollado en 🏗️ **Laravel** para gestionar reservas de vuelos, usuarios y pagos de manera eficiente y segura. 

## 🚀 Características
- ✈️ Gestión de reservas de vuelos.
- 👤 Autenticación y gestión de usuarios.
- 💳 Integración con pasarelas de pago.
- 📡 API REST optimizada y documentada.
- 📊 Soporte para múltiples monedas y zonas horarias.

## 🛠️ Tecnologías utilizadas
- **Laravel** - ⚡ Framework para el backend.
- **PHP** - 🖥️ Lenguaje de desarrollo principal.
- **MySQL** - 🗄️ Base de datos relacional.
- **Eloquent ORM** - 📌 Gestión eficiente de datos.
- **JWT y Passport** - 🔐 Seguridad y autenticación.

## ⚙️ Instalación y configuración

### 📝 Requisitos previos
- 🖥️ PHP 8+
- 🗄️ MySQL
- 📦 Composer

### 🛠️ Pasos
1. 🖥️ Clona el repositorio:
   ```sh
   git clone https://github.com/jfgallardo/travel_tours_backend.git
   cd travel_tours_backend
   ```
2. 📦 Instala las dependencias:
   ```sh
   composer install
   ```
3. 🛠️ Configura las variables de entorno (`.env`):
   ```sh
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=travel_db
   DB_USERNAME=root
   DB_PASSWORD=tu_contraseña
   JWT_SECRET=tu_secreto
   ```
4. 🔄 Ejecuta las migraciones de la base de datos:
   ```sh
   php artisan migrate
   ```
5. ▶️ Inicia el servidor en modo desarrollo:
   ```sh
   php artisan serve
   ```
6. 🌐 Accede a la documentación de la API en `http://localhost:8000/api`.

## 🤝 Contribución
Las 🙌 son bienvenidas. Para 👥 colaborar:
1. 🔀 Haz un fork del repo.
2. 🎨 Crea una rama con tu 🆕: `git checkout -b feature/nueva-funcionalidad`
3. ✅ Realiza un commit con tus ✍️: `git commit -m "Agregada nueva funcionalidad"`
4. 📩 Envía un pull request.

## 📜 Licencia
Este 🏗️ está bajo la 📜 MIT. Consulta el 📄 `LICENSE` para más detalles.

