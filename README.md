# Ivan Media — One-page portfolio

Plantilla de portafolio visual e interactiva construida con **PHP, HTML semántico, Sass/SCSS, CSS y JavaScript vanilla**. No requiere React, Vue ni un framework de frontend.

## Incluye
- Hero editorial con collage visual y animaciones sutiles.
- Navegación responsive con menú móvil.
- Marquee horizontal de marcas/ideas.
- Secciones de presentación, proyectos, servicios, paquete y contacto.
- Filtro interactivo por categoría.
- Modal de detalle al seleccionar un proyecto.
- Acordeón para desplegar detalles de servicios.
- Animaciones de entrada al hacer scroll y barra de progreso.
- Estilos adaptables a móvil, tablet y escritorio.
- Composer para gestionar PHP y el compilador Sass.

## Cómo ejecutar localmente
Requiere PHP 8.1 o superior.

```bash
php -S localhost:8000
```

Abre `http://localhost:8000`.

## Compilar Sass
Instala las dependencias de desarrollo:

```bash
composer install
```

Compila `assets/scss/style.scss` a `assets/css/style.css`:

```bash
composer sass:build
```

Si el comando `scss` no queda disponible en tu entorno, puedes usar Sass CLI directamente:

```bash
sass assets/scss/style.scss assets/css/style.css --style=compressed
```

`assets/css/style.css` ya está incluido para poder probar la página sin compilar Sass.

## Personalización antes de publicar
1. En `index.php`, actualiza el WhatsApp, correo e Instagram del arreglo `$site`.
2. Sustituye las imágenes de muestra de Unsplash por fotografías y videos propios o autorizados.
3. Edita el arreglo `$projects` con nombres, categorías, imágenes y descripciones reales.
4. Cambia el contenido del paquete y elimina o sustituye el texto de presentación que no corresponda al servicio real.
5. Agrega testimonios reales únicamente con autorización. El bloque actual está escrito como una invitación de marca, no como una reseña atribuida a un cliente.
6. Revisa los enlaces, el texto SEO, la privacidad y los permisos de uso de cada imagen.

## Paleta implementada
- Celeste Hielo: `#D7EAFF`
- Azul Marino Profundo: `#021B39`
- Blanco: `#FFFFFF`
- Azul Pizarra: `#90A9C8`
- Gris Claro: `#F4F4F4`
- Gris Carbón / Casi Negro: `#272422`
- Negro Puro: `#000000`

## Notas
- La página usa Google Fonts e imágenes remotas de Unsplash; se necesita conexión a internet para cargarlas.
- El formulario de contacto se resuelve con enlace a WhatsApp para que funcione sin backend de correo adicional.
- El número de WhatsApp y correo iniciales son valores de ejemplo: reemplázalos antes de publicar.
