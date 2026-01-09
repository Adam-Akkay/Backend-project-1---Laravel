# ⚽ Zaalvoetbal Soda JC

Website voor het zaalvoetbalteam SODA JC, een dynamische website gebouwd met Laravel voor het beheren van nieuws, gebruikersprofielen, FAQ's en contactberichten.

## Over het Project

Deze website is ontwikkeld voor het zaalvoetbalteam SODA JC, bestaande uit jongeren van 18 tot 35 jaar die spelen in de D-reeks van de Vlaamse zaalvoetbalcompetitie. De website biedt een platform voor teamleden en bezoekers om op de hoogte te blijven van nieuws, wedstrijden en teamactiviteiten.

## Features & Functionaliteiten

### Authenticatie
- **Inloggen/Uitloggen**: Gebruikers kunnen inloggen met email en wachtwoord
- **Registreren**: Nieuwe gebruikers kunnen zich registreren
- **Wachtwoord Reset**: Gebruikers kunnen hun wachtwoord opnieuw instellen via email
- **Remember Me**: Optie om ingelogd te blijven
- **Rollen**: Twee gebruikersrollen - `user` en `admin`

### Gebruikersprofielen
- **Publieke Profielen**: Alle gebruikers hebben een publiek toegankelijk profiel
- **Profiel Bewerken**: Gebruikers kunnen hun eigen profiel bewerken (username, verjaardag, profielfoto, over mij)
- **Profielwall**: Ingelogde gebruikers kunnen publieke berichten plaatsen op andere gebruikersprofielen
- **Bericht Verwijderen**: Alleen de auteur of een admin kan berichten verwijderen

### Nieuws
- **Nieuwsitems Bekijken**: Publieke toegang tot alle nieuwsitems
- **Admin CRUD**: Admins kunnen nieuwsitems aanmaken, bewerken en verwijderen
- **Reacties**: Ingelogde gebruikers kunnen reacties plaatsen op nieuwsitems
- **Reacties Verwijderen**: Alleen de auteur of een admin kan reacties verwijderen
- **Favorieten**: Ingelogde gebruikers kunnen nieuwsitems als favoriet markeren (many-to-many relatie)

### FAQ
- **Categorieën**: FAQ's zijn georganiseerd in categorieën
- **Publieke Toegang**: Iedereen kan de FAQ's bekijken
- **Admin CRUD**: Admins kunnen FAQ categorieën en items beheren

### Contact
- **Contactformulier**: Bezoekers kunnen contact opnemen via het contactformulier
- **Email Notificatie**: Contactberichten worden via email verstuurd
- **Database Opslag**: Alle contactberichten worden opgeslagen in de database
- **Admin Dashboard**: Admins kunnen alle contactberichten bekijken en beantwoorden
- **Status Tracking**: Contactberichten hebben een status (open/beantwoord)

### Admin Panel
- **Gebruikersbeheer**: Admins kunnen gebruikers beheren, adminrechten toekennen/verwijderen en gebruikers verwijderen
- **Beschermde Admin**: De gebruiker met email `admin@ehb.be` kan niet verwijderd worden
- **Nieuwsbeheer**: Volledige CRUD functionaliteit voor nieuwsitems
- **FAQ Beheer**: Beheer van FAQ categorieën en items
- **Contactberichten**: Overzicht en beantwoording van contactberichten

## Technische Vereisten

- **PHP**: ^8.2
- **Composer**: Voor dependency management
- **Node.js & NPM**: Voor asset compilation
- **Database**: MySQL, PostgreSQL of SQLite
- **PHP Extensies**: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath

## Installatie

### Stap 1: Repository Clonen
```bash
git clone [repository-url]
cd project-1-laravel-adam-akkay
```

### Stap 2: Dependencies Installeren
```bash
composer install
npm install
```

### Stap 3: Environment Configuratie
**Belangrijk**: De docent gebruikt zijn eigen `.env` bestand om verbinding te maken met de database. Zorg ervoor dat het `.env` bestand correct is geconfigureerd met de database instellingen.

### Stap 4: Application Key Genereren
```bash
php artisan key:generate
```

### Stap 5: Assets Compileren
```bash
npm run build
```

### Stap 6: Database Setup
**Belangrijk**: De docent voert `php artisan migrate:fresh --seed` uit om de database te initialiseren. Dit commando:
- Verwijdert alle bestaande tabellen
- Voert alle migraties opnieuw uit
- Seed de database met standaard data

De seeder maakt automatisch:
- Een standaard admin gebruiker
- Alle FAQ categorieën en items

## Standaard Accounts

Na het uitvoeren van `php artisan migrate:fresh --seed` is er een standaard admin account beschikbaar:

- **Email**: `admin@ehb.be`
- **Wachtwoord**: `Password!321`
- **Rol**: `admin`

**Beveiliging**: Deze gebruiker kan niet verwijderd worden via de frontend of backend. Dit is een beschermde beheerder.

## Project Structuur

```
project-1-laravel-adam-akkay/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/          # Authenticatie controllers
│   │   │   ├── Admin/          # Admin controllers
│   │   │   └── ...             # Overige controllers
│   │   └── Middleware/         # Custom middleware
│   ├── Mail/                    # Mailable classes
│   ├── Models/                  # Eloquent models
│   ├── Policies/                # Authorization policies
│   └── View/
│       └── Components/          # Blade components
├── database/
│   ├── migrations/              # Database migraties
│   └── seeders/                 # Database seeders
├── resources/
│   ├── views/                   # Blade templates
│   │   ├── layouts/             # Layout templates
│   │   ├── components/          # Blade components
│   │   └── ...                  # Overige views
│   └── js/                      # JavaScript bestanden
├── routes/
│   └── web.php                  # Web routes
└── public/                      # Publieke assets
```

## Technologieën & Tools

- **Laravel 12.x**: PHP web framework
- **Blade**: Templating engine
- **Tailwind CSS 4.0**: CSS framework voor styling
- **Eloquent ORM**: Database ORM
- **JavaScript**: Client-side validatie
- **Vite**: Asset bundler

## Database Schema

### Belangrijkste Tabellen

- **users**: Gebruikers met rollen (user/admin)
- **news**: Nieuwsitems
- **comments**: Reacties op nieuwsitems
- **profile_messages**: Berichten op gebruikersprofielen
- **faq_categories**: FAQ categorieën
- **faq_items**: FAQ items
- **contact_messages**: Contactformulier berichten
- **favorites**: Pivot tabel voor favoriete nieuwsitems (many-to-many)

### Database Relaties

**One-to-Many:**
- User → Comments
- User → ProfileMessages (als auteur)
- User → ProfileMessages (als profiel eigenaar)
- News → Comments
- FaqCategory → FaqItems

**Many-to-Many:**
- User ↔ News (via favorites tabel)

## Routes Overzicht

### Publieke Routes
- `/` - Homepagina
- `/news` - Nieuws overzicht
- `/news/{id}` - Nieuws detail
- `/faq` - FAQ pagina
- `/contact` - Contactformulier
- `/profiles/{user}` - Gebruikersprofiel

### Authenticatie Routes
- `/login` - Inloggen
- `/register` - Registreren
- `/logout` - Uitloggen
- `/forgot-password` - Wachtwoord vergeten
- `/reset-password/{token}` - Wachtwoord resetten

### Authenticated Routes
- Reacties plaatsen op nieuws
- Berichten plaatsen op profielen
- Favorieten toevoegen/verwijderen
- Profiel bewerken

### Admin Routes (Middleware: auth + admin)
- `/admin/news` - Nieuwsbeheer
- `/admin/faq-categories` - FAQ categorieën beheer
- `/admin/faq-items` - FAQ items beheer
- `/admin/users` - Gebruikersbeheer
- `/admin/contact-messages` - Contactberichten beheer

## Beveiliging

- **CSRF Protection**: Alle formulieren zijn beschermd met CSRF tokens
- **XSS Protection**: Blade templates escapen automatisch output
- **Middleware**: 
  - `auth`: Beschermt routes die authenticatie vereisen
  - `admin`: Beschermt admin-only routes
- **Policies**: Fine-grained autorisatie voor:
  - Profiel bewerken (eigen profiel of admin)
  - Reacties verwijderen (auteur of admin)
  - Profielberichten verwijderen (auteur of admin)
- **Password Hashing**: Wachtwoorden worden gehashed met bcrypt
- **Protected Admin**: De `admin@ehb.be` gebruiker kan niet verwijderd worden

## Blade Components

- **Alert Component** (`<x-alert />`): Herbruikbare component voor success/error/warning/info berichten

## Validatie

### Server-side Validatie
- Alle formulier input wordt gevalideerd op de server
- Laravel validation rules worden gebruikt

### Client-side Validatie
- JavaScript validatie voor real-time feedback
- Voorkomt formulier verzending bij fouten
- Validatie voor: required fields, email format, password length, password confirmation

## Email Functionaliteit

De applicatie gebruikt Laravel's Mail systeem voor:

- **Contactformulier**: Email notificatie bij nieuwe contactberichten
- **Password Reset**: Email met reset link
- **Admin Replies**: Email antwoorden op contactberichten

**Configuratie**: Zorg dat de mail instellingen correct zijn geconfigureerd in het `.env` bestand.

## Contact Informatie

- **Contactpersoon**: Adam Akkay
- **Email**: adam.akkay@hotmail.com
- **Locatie**: Sporthal Comenius, Gezusters Brontëplein 20, 1081 Koekelberg
- **Google Maps**: [Bekijk op Google Maps](https://maps.app.goo.gl/K1nSPWMKn1rvMRzu9)

## Development Notes

- **Code Taal**: Alle code en comments zijn in het Engels
- **UI Taal**: Alle gebruikersinterface teksten zijn in het Nederlands
- **Laravel Best Practices**: Het project volgt Laravel conventions en best practices
- **MVC Architectuur**: Duidelijke scheiding tussen Models, Views en Controllers
- **Resource Controllers**: Gebruikt waar mogelijk voor CRUD operaties
- **Sticky Footer**: Footer blijft onderaan de pagina met flexbox

## Database Seeders

### DatabaseSeeder
- Maakt de standaard admin gebruiker aan (`admin@ehb.be`)

### FaqSeeder
- Seed alle FAQ categorieën en items:
  - Team & Algemeen (4 items)
  - Lid worden / Deelname (3 items)
  - Website & Account (3 items)
  - Wedstrijden & Competitie (3 items)
  - Contact & Vragen (2 items)

**Idempotentie**: Seeders gebruiken `updateOrCreate()` zodat ze meerdere keren kunnen worden uitgevoerd zonder duplicaten.

## Licentie

Dit project is ontwikkeld voor educatieve doeleinden.

## Auteur

**Adam Akkay**

---

**Let op**: Deze applicatie is ontwikkeld volgens de technische vereisten van de cursus Back-end Web (docent - Bert Heyman). Alle functionaliteiten zijn getest en werkend.
