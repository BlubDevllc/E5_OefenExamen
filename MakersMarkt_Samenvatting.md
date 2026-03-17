# MakersMarkt – Oefenexamen Samenvatting

## Over het project
Platform voor handgemaakte producten. Doel: makers kunnen producten aanbieden en verkopen via een gebruiksvriendelijk systeem.

---

## Rollen
| Rol | Beschrijving |
|---|---|
| **Maker** | Kunstenaar die producten aanbiedt |
| **Koper** | Koopt producten, laat reviews achter |
| **Moderator** | Beheert platform, verifieert accounts/producten |

---

## Functionaliteiten

### Gebruikersregistratie & Authenticatie
- Zelfregistratie (geen moderator nodig)
- Unieke gebruikersnaam + wachtwoord
- Rolgebaseerde toegangsbeperking (maker / koper / moderator)
- Profielinformatie bekijken en aanpassen

### Productcatalogus
- Bladeren, zoeken en filteren (type, materiaal, productietijd)
- Elk product heeft: naam, beschrijving, type, materiaalgebruik, productietijd, complexiteit, duurzaamheid, unieke eigenschappen
- **Types:** Sieraden, Keramiek, Textiel, Kunst
- Portfoliobeheer voor makers (sorteren, filteren)

### Verkoop & Bestellingen
- Geen echt betalingssysteem → moderators zetten **winkelkrediet** op accounts
- Krediet wordt overgeschreven van koper naar maker bij aankoop
- Maker ontvangt melding bij nieuwe bestelling
- Maker kan status aanpassen: `in productie` / `verzonden` / `geweigerd, terugbetaling verzonden`
- Maker voegt korte statusbeschrijving toe
- Koper ziet status van al zijn bestellingen
- Review pas mogelijk **na verzending**

### Ratings & Notificaties
- Kopers laten reviews achter (kwaliteit product + service)
- Makers ontvangen meldingen bij nieuwe bestelling of review

### Moderatorpaneel
- Accounts verifiëren
- Producten verifiëren, categoriseren, verwijderen
- Zoeken in alle gebruikersteksten (ongepaste taal)
- **Automatische markering** van berichten met externe links
- Gebruikers kunnen producten ook zelf markeren voor moderatie
- Statistieken: producten per categorie, gemiddelde waardering per maker, populairste producttypen

---

## Opdrachten

| # | Opdracht | Kernpunten |
|---|---|---|
| 2.1 | SCRUM-proces | Dagelijkse stand-ups, wordt geobserveerd |
| 2.2 | User Stories & Planning | GitHub Projects, eerlijke taakverdeling |
| 2.3 | ERD & Database normaliseren | Genormaliseerd ontwerp + datatypes per attribuut |
| 2.4 | Haalbaarheid, Privacy & Security | Eigen inbreng, geen AI-antwoorden, passend bij de app |
| 2.5 | Realiseren | Conventiedocument, Git + GitHub, branches |
| 2.6 | Testen & Testrapport | Testplan, testscenario's (ieder schrijft mee), testrapport, verbetervoorstellen |
| 2.7 | Sprint Retrospective | Max 15 min, gestructureerde vorm, concrete afspraken |
| 2.8 | Technische Oplevering | Alle code uitleggen (ook van collega's), keuzes onderbouwen |

---

## Belangrijke aandachtspunten
- Ieder groepslid moet **alles kunnen uitleggen**, ook elkaars code en keuzes
- Documenten als **één geheel** inleveren (zelfde stijl, samengevoegd)
- Bestanden aanleveren als **.pdf**
- Voorblad verplicht: naam opdracht, opdrachtgever, namen, datum, titel
- **Geen AI-tools** voor privacy/security/haalbaarheid vragen
- Werken met **Git branches**

---

## Beoordelingsmomenten
- **Stand-up** observatie
- **Individuele bevraging** over: casus, user stories, planning
- **Individuele bevraging** over: testplan, testscenario's
- **Technische Oplevering** (als groep, maar ieder apart bevraagd)
