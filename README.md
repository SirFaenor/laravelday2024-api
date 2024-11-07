## Istruzioni di installazione

- clonare il repository https://github.com/atrioteam/base nella directory del nuovo progetto ed eseguire `git clone --depth=1 https://github.com/atrioteam/base ./` dalla directory di destinazione
- creare un database con utente e password e riportare i dati di connessione nel file `env/.master.env`.
- eseguire `composer install && php artisan key:generate`
- eseguire  `php artisan vendor:publish --force --tag=marvin:setup` (force per sovrascrivere eventuali modifiche apportate alla base in fase di sviluppo / test)
- compilare il file `resources/vendor/marvin/setup/setup.json` (v. istruzioni a seguire)
- eseguire  `php artisan:migrate --fresh` per creare le tabelle di base e le funzioni  (fresh per sovrascrivere eventuali modifiche apportate alla base in fase di sviluppo / test). Questo crea tutte le tabelle necessarie alle funzioni come configurate nel file setup.json .
- spostarsi nella directory del progetto (httpdocs) ed eseguire `php artisan marvin:setup && sudo chmod -R 777 storage && sudo chmod -R 777 resources/lang/vendor/marvin`
- enjoy :-)


## File '.env'
La directory env contiene file di ambiente:
- il file master.env viene caricato sempre
- un eventuale file nominato  `.cli.{NOME_HOST}.` viene caricato quando l'app viene eseguita da riga di comando sull'host corrispondente (come restituito da funzione gethostname() di php), integrando e sovrascrivendo quelle del file master
- altri file nominati con un nome host (come da `$_SERVER["HTTP_HOST"]`) vengono caricati condizionalmente in base all'host HTTP di esecuzione e sono pensati per detenere configurazioni specifiche che andranno a sovrascrivere quelle del file master (e le altri chiavi di configurazione a cui si riferiscono)


## Cms, compilazione file setup.json

### Sezione utenti

Ciascuna voce dell'elenco rappresenta un utente del cms, che sarà automaticamente creato.
La chiave rappresenta lo username che sarà usato per il login.
L'utente root di default gestisce utenti, funzioni, testi e link.


Esempio:
```
    "users" : {
        "root" : { // username login
            "name" : "Root", // nome visibile
            "password" : "lsdi-hf75775hIUdgetf34" // password
        },
        "admin_base" : { // username login
            "name" : "Admin", // nome visibile
            "password" : "wuejUUudiao36746ak" // password
        }
    },
```

### Sezione funzioni
Esempio: 

```
"functions": [
        {
            "code" : "news",
            "label": "News",
            "menu" : "Y",
            "group" : "Demo",
            "redirect_type" : "list",
            "users" : "admin_base"
        },
        {
            "code" : "tags",
            "label": "Tag",
            "menu" : "Y",
            "group" : "Demo",
            "redirect_type" : "list",
            "users" : "admin_base"
        },
        {
            "code" : "prodcats",
            "label": "Categorie",
            "menu" : "Y",
            "group" : "Demo",
            "redirect_type" : "list",
            "users" : "admin_base"
        },
        {
            "code" : "products",
            "label": "Prodotti",
            "menu" : "Y",
            "group" : "Demo",
            "redirect_type" : "list",
            "users" : "admin_base",
            "gallery" : true,
            "relations" : "products"
        }
```


### Creazione successiva di una nuova funzione
- per creare una nuova funzione dopo il setup iniziale eseguire `php artisan marvin:function-new --code=newscats --label="News - Categorie" --menu=Y --group=Demo --users=admin_base` (parametri di esempio, v. signature di `app\Commands\FunctionNew` per la lista, sono gli stessi usati in setup.json).

- per ogni funzione, verrà creato:
  - un modello, es `News`
  - un modello per la tabella lingua, es `NewsLang`

#### parametri per funzione
- chiave dell'elenco: codice funzione e nome tabella
- "label" : etichetta visibile nel menu, se composta da più parole circondare la stringa da virgolette singole dentro alle doppie (es. "'Lista news'")
- "menu" : Y/N visibilità nel menu
- "group" : se compilato, fa da aggregante per un gruppo di funzioni. Se composto da più parole circondare la stringa da virgolette singole dentro alle doppie (es. "'Sezione XYZ'")
- "redirect_type" : list / update
- "users" : elenco username separati da virgola associati alla funzione
- "gallery" : se true, la funzione prevede la gallery
- "relations" : elenco tabelle/codici separati da virgola per relazione multipla



### Creazione successiva di una nuova relazione
- per creare una nuova tabella di relazione dopo il setup iniziale eseguire `php artisan functions:relation --main=products --related=tags` (parametri di esempio, v. signature di `app\Commands\FunctionsRelation`)


## Css
- per pubblicare le risorse di origine (viste, js e sass) eseguire `php artisan vendor:publish --tag=marvin:resources`, agire su questi e ricompilare per modifiche (rispettando i percorsi di output)
- cms: per cambiare il colore globale del cms agire sul file `resources/sass/_variables.scss` e ricompilare

## Risoluzione errori
- `Please provide a valid cache path` : assicurarsi che sia presente la cartella storage/framework'
- se avviene sempre un redirect, eseguire `php artisan config:clear` e `php artisan cache:clear`
- Errore permessi su storage: eseguire `sudo chmod -R 777 storage`
- Errore caricamento di qualche libreria: una volta caricato online, eliminare il file boostrap/cache/pacakges.php

## Caricamento online
- eliminare il contenuto delle cartelle `/storage/framework/sessions`, `app/bootstrap/cache`, `storage/logs`
