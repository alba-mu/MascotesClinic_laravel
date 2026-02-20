# 🏥 Mascotes Clinic

Aplicació web de gestió de clínica veterinària desenvolupada amb **Laravel** com a projecte educatiu.

## 📋 Descripció

Mascotes Clinic és un sistema de gestió integral per a clíniques veterinàries que permet administrar la informació dels propietaris, les seves mascotes i l'historial mèdic de cada animal. Aquest projecte ha estat desenvolupat com a pràctica educativa per aprendre i aplicar els conceptes fonamentals del framework Laravel.

## 🎯 Funcionalitats Principals

### Autenticació
Aquesta aplicació permet als usuaris registrar-se, iniciar sessió i tancar sessió de manera eficient utilitzant les funcionalitats d'autenticació de Laravel.

#### Rutes Típiques de Laravel
- `GET /register` - Pàgina de registre
- `POST /register` - Enviament del formulari de registre
- `GET /login` - Pàgina d'inici de sessió
- `POST /login` - Enviament del formulari d'inici de sessió
- `POST /logout` - Tancament de sessió

#### Passos Bàsics d'Ús
1. **Registre**: L'usuari pot accedir a la pàgina de registre per crear un compte.
2. **Inici de Sessió**: Una vegada registrat, l'usuari pot iniciar sessió a l'aplicació utilitzant les seves credencials.
3. **Tancar Sessió**: L'usuari pot tancar sessió fent clic a l'enllaç corresponent.

### 👥 Gestió de Propietaris
- **Llistar propietaris**: Visualització de tots els propietaris registrats al sistema
- **Buscar mascotes per propietari**: Cerca ràpida de totes les mascotes associades a un propietari específic
- **Modificar propietaris**: Actualització de la informació dels propietaris existents

### 🐾 Gestió de Mascotes
- **Llistar mascotes**: Visualització completa de totes les mascotes registrades
- **Modificar mascotes**: Edició de la informació de les mascotes existents
- **Buscar mascota**: Cerca d'una mascota específica per ID amb informació detallada

### 📋 Historial Mèdic
- **Afegir entrades a l'historial**: Registre de visites veterinàries amb:
  - Data de la visita
  - Motiu de la visita
  - Descripció detallada del diagnòstic i tractament

## 🛠️ Tecnologies Utilitzades

- **Framework**: Laravel (PHP)
- **Motor de plantilles**: Blade
- **Frontend**: 
  - HTML/CSS
  - Bootstrap 5
  - Bootstrap Icons
  - JavaScript
- **Base de dades**: MySQL

## 📂 Estructura del Projecte

El projecte segueix l'estructura estàndard de Laravel:

- **Models**: Representació de les entitats (Owner, Pet, History)
- **Controllers**: Lògica de negoci per a la gestió de propietaris, mascotes i historial
- **Views**: Plantilles Blade organitzades per funcionalitat
- **Routes**: Definició de les rutes de l'aplicació
- **Migrations**: Esquema de la base de dades
- **Seeders**: Dades de prova per a desenvolupament

## 🗄️ Models i Relacions

### Owner (Propietari)
```php
- id
- nom
- email
- mòvil
- mascotes (relació hasMany amb Pet)
```

### Pet (Mascota)
```php
- id
- nom
- propietari_id (relació belongsTo amb Owner)
- historial (relació hasMany amb History)
```

### History (Historial)
```php
- id
- data
- motiu_visita
- descripcio
- mascota_id (relació belongsTo amb Pet)
```

## 🎓 Propòsit Educatiu

Aquest projecte s'ha desenvolupat amb finalitats formatives per:

- Aprendre els conceptes bàsics del framework Laravel
- Practicar el patró MVC (Model-Vista-Controlador)
- Implementar operacions CRUD (Create, Read, Update, Delete)
- Treballar amb l'ORM Eloquent i les relacions entre models
- Utilitzar el motor de plantilles Blade
- Gestionar validacions i missatges Flash
- Aplicar bones pràctiques en el desenvolupament web amb PHP

## 💻 Requisits del Sistema

- PHP >= 8.1
- Composer
- MySQL altre SGBD compatible

## 🚀 Instal·lació

```bash
# Clonar el repositori
git clone https://github.com/alba-mu/MascotesClinic_laravel.git

# Instal·lar dependències
composer install

# Copiar el fitxer d'entorn
cp .env.example .env

# Generar la clau de l'aplicació
php artisan key:generate

# Configurar la base de dades a .env
# DB_HOST=el_teu_host
# DB_DATABASE=mascotes_clinic
# DB_USERNAME=el_teu_usuari
# DB_PASSWORD=la_teva_contrasenya

# Executar les migracions
php artisan migrate

# (Opcional) Carregar dades de prova
php artisan db:seed

# Iniciar el servidor de desenvolupament
php artisan serve
```

L'aplicació estarà disponible a `http://localhost:8000`

## 📝 Nota

Aquest és un projecte acadèmic creat amb finalitats educatives com a part d'una pràctica de classe. No està destinat a ús en producció.
