## Installatie Instructies
Volg deze stappen om het project lokaal te installeren na het downloaden van de ZIP:

### 1. Vereisten
- PHP 8.2 of hoger
- Composer
- Node.js en NPM
- sqlite of een andere database


# stap 1 project openen
Pak het ZIP-bestand uit op je computer.
als je met je rechtermuisknop op het mapje klikt staat er een knopje genaamt open terminal klik hierop.

alle volgende stappen typt u in de terminal
# stap 2 bestanden installeren
composer install
wacht todat deze helemaal klaar is en er opnieuw in het scherm staat 
PS C:\mapje waar je project staat

# stap 3. Kopieer het .env.example bestand naar .env
copy .env.example .env    # Windows
# of
cp .env.example .env      # Linux/Mac
# 4. Genereer de applicatie sleutel
php artisan key:generate

# stap 5. Maak de database aan
php artisan migrate

# 6. Start de development server
php artisan serve




