# mvc-portfolio

Curriculum / portafolio personal (sitio en ingles) en PHP vanilla (sin frameworks), MVC propio, Postgres como base de datos, todo en Docker.

Plantilla visual: [iPortfolio](https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/) de BootstrapMade, partida en vistas PHP. Todo el contenido (perfil, skills, resume, portafolio, servicios) sale de la base de datos, no del HTML.

## Estructura

```
app/
  public/            document root (Apache)
    index.php        front controller + router
    .htaccess        rewrite a index.php
    assets/          css, js, vendor e imagenes de la plantilla
  src/
    Config/          conexion PDO a Postgres
    Core/            Router, Asset (cache busting)
    Controllers/     portafolio (SSR), contacto (POST), Api/ (JSON)
    Models/          ProfileModel, ContactMessageModel
    Views/portfolio/ index.php + partials/ (una por seccion)
  db/migrations/     esquema SQL versionado
  bin/               migrate.php, seed.php
compose.yml
Dockerfile
```

## Levantar el proyecto

1. Copiar el archivo de entorno:

   ```
   cp .env.example .env
   ```

2. Build y arranque:

   ```
   docker compose up -d --build
   ```

3. Migrar y sembrar:

   ```
   docker compose exec app php bin/migrate.php
   docker compose exec app php bin/seed.php
   ```

4. Abrir `http://localhost:8092/`.

## Puertos

- App (Apache + PHP): `8092` en el host.
- Postgres: `5435` en el host (interno sigue en `5432`).

Elegidos para no chocar con `mvc-template` (8090) ni `mvc-blog` (8091 / 5434).

## Rutas

| Metodo | Ruta           | Que hace                                              |
|--------|----------------|-------------------------------------------------------|
| GET    | `/`            | Renderiza el portafolio completo desde la base        |
| POST   | `/contact`     | Guarda el mensaje del formulario, responde `OK`       |
| GET    | `/api/profile` | Devuelve todo el CV en JSON (CORS abierto)            |

El formulario usa `validate.js` de la plantilla, que espera literalmente la respuesta `OK`; por eso `ContactController` responde texto plano y no JSON.

## Base de datos

Tablas: `profile` (una fila, la edad se calcula desde `birth_date`), `social_links`, `stats`, `skills`, `resume_items` (`kind` = education | experience, con `bullets text[]`), `portfolio_items`, `services`, `contact_messages`.

`portfolio_items` arranca vacia a proposito: la seccion Portfolio (y su enlace en el menu) solo aparece cuando hay filas.

Para editar el CV se cambian filas, no HTML. Ejemplo:

```
docker compose exec db psql -U portfolio_user -d portfolio -c "UPDATE skills SET percent = 90 WHERE name = 'PHP';"
```

Ver los mensajes recibidos:

```
docker compose exec db psql -U portfolio_user -d portfolio -c "SELECT created_at, name, subject FROM contact_messages ORDER BY created_at DESC;"
```

## Licencia de la plantilla

iPortfolio es gratuita con atribucion: los enlaces a BootstrapMade en el footer deben quedarse (ver `app/public/assets/TEMPLATE-LICENSE.txt`).
