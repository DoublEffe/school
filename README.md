<a name="readme-top"></a>


<!-- PROJECT LOGO -->
<br />
<div align="center">
 
  <h3 align="center">SCHOOL AI ASSISTANT</h3>

  <p align="center">
    Una pagina web per supportare sia insegnanti che studenti della scuola pubblica italiana.
    <br />
    <a href="https://github.com/DoublEffe/school/blob/main/README.md"><strong>Escplora la documentazione »</strong></a>
    <br />
    <br />
    <a href="https://school-uzyr.onrender.com">Demo</a>
    ·
    <a href="https://github.com/DoublEffe/school/issues">Riporta bug</a>
    ·
    <a href="https://github.com/DoublEffe/school/issues">Richiedi Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Contenuti</summary>
  <ol>
    <li>
      <a href="#about-the-project">Spiegazione progetto</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#come-usare">Come Usare</a>
      <ul>
        <li><a href="#studente">Studente</a>
        <li><a href="#insegnante">Insegnante</a>
      </ul>
    </li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## Spiegazione progetto
Questo progetto mira ad aiutare gli studenti e gli insegnanti della scuola pubblica italiana.
Per quanto riguarda gli studenti la demo permette di visualizzare i compiti assegnati dagli insegnati divisi per materia inoltre è possibile
avvalersi dell'uso di un IA per chiedere eventuali spiegazioni di supporto un pò come fosse un tutor personale.
Per gli insegnnati è possibile assegnare i compiti per materia e per classe, visulizzare le risposte degli studenti divisi per classe e attraverso l'IA vedere delle ststistiche su quali materie gli studenti abbiano avuto difficoltà.
In questo progetto inoltre si propone di raccogliere tutto il materiale scolastico a licenza libera in modo da usare quello per archivio esercizi e per aiutare gli studenti in difficoltà economica.
<p align="right">(<a href="#readme-top">torna all'inizio</a>)</p>



### Built With

La pagina web è stata sviluppata usando angular per il frontend e laravel per il backend e un database postgreSQL.
inoltre il frontend è stato sviluppato usando il kit angular conforme alle Linee guida di design per i servizi digitali della PA.

* [![Angular][Angular-url]][Angular.io]
* [![Angular Design Kit][Angular-design-kit]][Angular-material.io]
* [![laravel][Laravel]][laravel]
* [![postgresql][postGreSQL]][postgresql]


<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Come Usare

La prima cosa che si vede all'apertura è la pagina di login dove si dovrnno immettere email, password e se si intende efettuare il login come insegnate o studente.

![Login screen shoot](https://github.com/DoublEffe/school/blob/main/images/login.png)

Ogni credenziale verrà fornita dall'istituto scolastico all'iscrizione

### Studente

La sezione Studente è divisa in due parti: 

* selezione delle materie per accedere agli esercizi.

![student main page](https://github.com/DoublEffe/school/blob/main/images/studente1.png)

  - una volta selezionata la materia la pagina ci mostrerà gli esercizi associati ad essa assegnati dall'insegnante.

  ![student exercise page](https://github.com/DoublEffe/school/blob/main/images/studente1-1.png)

* chat con IA.

![student chat](https://github.com/DoublEffe/school/blob/main/images/studente2.png)



### Insegnante

La sezione Insegnante è divisa in tre parti:

* sezione principale dove compare la lista delle classi tenute dall'insegnante.

![teacher main page](https://github.com/DoublEffe/school/blob/main/images/insegnante1.png)

  - una volta selezionata la classela pagina ci mostrerà le risposte date dagli studenti.

  ![teacher exercise page](https://github.com/DoublEffe/school/blob/main/images/insegnante1-1.png)

* assegnazione esercizi per materie e classe.

  ![teacher assign page](https://github.com/DoublEffe/school/blob/main/images/insegnante2.png)

* pagina di statistiche per tema.

![teacher statistics page](https://github.com/DoublEffe/school/blob/main/images/insegnate3.png)


<p align="right">(<a href="#readme-top">back to top</a>)</p>





<!-- MARKDOWN LINKS & IMAGES -->
[Angular.io]: https://angular.io/
[Angular-url]: https://img.shields.io/badge/Angular-DD0031?style=for-the-badge&logo=angular&logoColor=white
[Angular-design-kit]: https://img.shields.io/badge/Angular%20Material-8A2BE2
[Angular-material.io]: https://design-angular-kit.vercel.app/design-angular-kit#/info/welcome
[Laravel]: https://img.shields.io/badge/Laravel-8A2BE2
[laravel]: https://laravel.com/
[postGreSQL]: https://img.shields.io/badge/PostGreSQL-8A2BE2
[postgresql]: https://www.postgresql.org/
