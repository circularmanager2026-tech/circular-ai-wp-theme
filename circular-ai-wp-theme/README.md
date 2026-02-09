# Circular AI - WordPress Theme

Landing page theme para Circular AI con campos personalizables via ACF.

## 🚀 Instalación

### 1. Subir el theme
- Comprimí la carpeta `circular-ai-wp-theme` en un archivo ZIP
- En WordPress Admin: **Apariencia → Temas → Añadir nuevo → Subir tema**
- Activá el tema

### 2. Instalar ACF (Advanced Custom Fields)
- Necesitás el plugin **ACF PRO** o **ACF Free**
- Instalalo desde Plugins → Añadir nuevo
- Los campos se registran automáticamente al activar el theme

### 3. Configurar el landing
- En el admin: **Landing Settings** (menú lateral)
- Editá todos los campos personalizables:
  - Header (logo, navegación, botones)
  - Hero (título, subtítulo, CTA, notificaciones)
  - Marquee (items del footer)

## 📝 Campos Personalizables

### Header
| Campo | Descripción | Default |
|-------|-------------|---------|
| Logo Text | Texto del logo | Circular AI |
| Login Text | Texto botón login | Iniciar sesión |
| Login URL | URL del login | # |
| CTA Header Text | Texto botón principal | Comenzar gratis → |
| CTA Header URL | URL del CTA | # |
| Navigation Items | Menú de navegación (repeater) | 3 items |

### Hero
| Campo | Descripción | Default |
|-------|-------------|---------|
| Hero Title | Título principal | Crea Chatbots Inteligentes... |
| Hero Subtitle | Descripción | Circular AI es tu plataforma... |
| CTA Text | Texto del botón | Probar gratis → |
| CTA URL | URL del botón | # |
| Floating Notifications | Notificaciones animadas (repeater) | 3 notificaciones |

### Marquee
| Campo | Descripción |
|-------|-------------|
| Marquee Items | Items del scroll infinito (icono + texto) |

## 🎨 Estructura de archivos

```
circular-ai-wp-theme/
├── style.css           # Estilos + metadatos del theme
├── index.php           # Template principal
├── header.php          # Header con navegación
├── footer.php          # Footer con marquee
├── functions.php       # Funciones y campos ACF
├── screenshot.png      # Preview del theme (opcional)
└── README.md           # Este archivo
```

## 🐳 Docker (opcional)

Para usar con Docker:

```yaml
version: '3.8'
services:
  wordpress:
    image: wordpress:latest
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: wordpress
      WORDPRESS_DB_NAME: wordpress
    volumes:
      - ./circular-ai-wp-theme:/var/www/html/wp-content/themes/circular-ai
  
  db:
    image: mysql:5.7
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: wordpress
```

## 🔧 Requisitos

- WordPress 5.8+
- PHP 7.4+
- ACF (Advanced Custom Fields) plugin

## 📄 Licencia

GPL v2
