## Progetto finale Boolean, Classe #113, Team n'3

# Boolbnb

## Descrizione del Progetto

Boolbnb è un'applicazione web sviluppata dal Team 3, composto da Giuseppe Belforte, Antonio Stasullo, Melissa Musumeci, Alessandro Greco e Marco Benfante. Questa applicazione, sviluppata seguendo le direttive fornite, è suddivisa in una parte front-end, dedicata alla ricerca da parte dei guests, e una parte back-end per la gestione dei dati degli appartamenti, navigabile dai proprietari.

## Funzionalità

### Front-end

#### Parte 1: Presentazione Iniziale e Home (Giuse)

**Home**

-   **Header**: Include il logo dell'azienda, un menu centrale e una sezione dedicata al login e alla creazione di un nuovo account, che conduce al back-end del sistema di gestione.
-   **Jumbotron**: Presentazione introduttiva del sito.
-   **Funzione di Ricerca di Base**: Implementata con un pacchetto, permette di trovare appartamenti disponibili in un raggio di 20 km, con suggerimenti di indirizzi.
-   **Appartamenti Popolari**: Sezione dedicata agli appartamenti più popolari, sponsorizzati dai proprietari.
-   **Footer**: Mostra il logo dell'azienda e icone per i collegamenti ai principali social network.
-   **Responsive Design**: Le pagine sono progettate per essere responsive su dispositivi mobile e tablet.

#### Parte 2: Funzione di Ricerca Avanzata e Pagina Dettaglio Appartamento (Antonio)

**Funzione di Ricerca Avanzata**

-   Accessibile dalla ricerca di base, permette di filtrare gli appartamenti per distanza, servizi offerti, numero di letti, stanze e bagni.

**Pagina Dettaglio Appartamento**

-   **Card**: Cliccando su una card si apre la pagina di dettaglio con un'immagine rappresentativa, elenco delle caratteristiche e servizi.
-   **Mappa Dettagliata**: Visualizzazione della posizione dell'appartamento tramite TomTom.
-   **Modulo di Contatto**: Permette di contattare il proprietario dell'appartamento, richiedendo campi obbligatori come email e messaggio, con validazione dei campi.

### Back-end

#### Parte 3: Login e Dashboard (Marco)

**Login / Registrazione**

-   Creazione di un account compilando campi obbligatori come email e password, con regole di validazione.
-   Accesso alla pagina principale del gestionale tramite login.

**Dashboard**

-   Pagina di atterraggio con statistiche globali degli appartamenti, visualizzazioni e messaggi ricevuti.
-   **Grafici**: Implementati con un pacchetto esterno.
-   **Navigazione**: Header simile al sito-vetrina e una sidebar che mostra appartamenti posseduti, messaggi ricevuti e appartamenti sponsorizzati.

#### Parte 4: Sezione Appartamenti (Melissa)

**Appartamenti**

-   Tabella riassuntiva di tutti gli appartamenti inseriti dal proprietario e link per l'inserimento di nuovi appartamenti.
-   Validazione dei campi obbligatori durante l'inserimento.
-   **Barra di Ricerca**: Utilizza lo stesso sistema del front-end implementato con TomTom.
-   **Filtraggio e Visualizzazione**: Sistema di filtraggio e tools per visualizzare, modificare o eliminare un appartamento.
-   **Dettagli Appartamento**: Riepilogo con grafici e statistiche specifiche.

#### Parte 5: Sponsorizzazioni e Messaggi (Alessandro)

**Sponsorizzazioni**

-   Accesso agli sponsor per mettere in evidenza un appartamento nella home.
-   **Checkout**: Pagina di riepilogo e form per il pagamento tramite Braintree.
-   **Tabella Sponsorizzazioni**: Riepilogo delle sponsorizzazioni acquistate, con stato attuale.

**Messaggi**

-   Visualizzazione dei messaggi inviati nel front-office, con possibilità di aprirli in una finestra pop-up o eliminarli.
