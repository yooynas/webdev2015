<h1>Les liens</h1>
<p>Dans la pratique votre site sera certainement composé de plusieurs pages. Pour que vos visiteurs puissent naviguer entre elles, nous allons apprendre à créer des liens.</p>
<h2>Créer un lien vers une de ses propres pages</h2>
<p>La balise &lt;a&gt; pour « ancre » à laquelle s’ajoute l’attribut href permet d’indiquer le nom de la page qui sera appelée lorsqu’on cliquera sur ce lien.</p>
<pre><?= htmlentities('<a href="index.html"> Retour à l’accueil </a>'); ?></pre>
<p>Lorsque vous cliquez sur un lien, la nouvelle page s’affiche dans la même fenêtre du navigateur.</p>
<strong>Des liens qui changent de couleur</strong>
<p>Par défaut, les liens se colorent en bleu et après avoir été cliqués, se colorent en violet. C’est le navigateur qui a changé sa couleur permettant ainsi au visiteur de savoir que c’est un lien qu’il a déjà visité. Il est possible de changer ces couleurs peu élégantes à l’aide des feuilles de style CSS.</p>
<h2>Insérer un lien vers une autre page web</h2>
<pre><?= htmlentities('<a href=" http://www.google.be" target="_blank"> Vers le site de Google </a>'); ?></pre>
<p>Considéré invalide en XHTML, il est à nouveau possible de faire en sorte que la nouvelle page s’ouvre dans une nouvelle fenêtre depuis HTML5. 
Si vous souhaitez utiliser cet attribut, pour que votre site soit valide, le doctype utilisé dans votre page doit impérativement être HTML5.</p>
<h2>Ajout d’une infobulle</h2>
<p>Cette bulle est un petit message qui s’affiche lorsque vous pointez avec la souris sur le lien.
Pour créer une bulle d’aide sur un lien, ajoutez à la balise &lt;a&gt; un attribut title.</p>
<pre><?= htmlentities('<a href="livreor.html" title="Signez mon livre !">Livre d’or</a>'); ?></pre>
<p>Le texte de la bulle d’aide doit être assez court</p>
<h2>Créer un lien au sein d'une même page Web</h2>
<h3>Nommer la partie de page à atteindre</h3>
<p>Pour créer une ancre, il suffit de rajouter un attribut id à n’importe quelle balise.</p>
<pre><?= htmlentities('<h2 id="titre01">Titre 01</h2>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga ad sapiente, nostrum quos eum est, repudiandae voluptatibus nam reiciendis ullam itaque inventore asperiores beatae voluptate suscipit quisquam
<h2 id="titre02">Titre 02</h2>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores veniam ut maxime repellat amet omnis nam'); ?></pre>
<p>Attention : Les identifiants ne peuvent contenir que des lettres et des chiffres et ils sont uniques (Il ne peut pas y avoir deux ancres avec le même nom dans une page). <br>
Pour que le lien vers l’ancre fonctionne, il faut que votre page web contienne suffisamment de texte. </p>
<h3>Créer un lien vers cette partie de page</h3>
<p>Lorsque l’ancre est créée, utilisez la balise &lt;a&gt; avec l’attribut href="#nomid".C’est-à-dire le nom de l’ancre précédé d’un dièse (#).</p>
<pre><?= htmlentities('<a href="#titre01">étape 1 : préparation </a>
<a href="#titre02">étape 2 : fabrication </a>'); ?></pre>
<strong>Pour Créer un lien vers une zone d'une autre page Web</strong>
<pre><?= htmlentities('<a href="page.html#partie1">allez consulter la partie 1</a>'); ?></pre>
<h2>Créer un lien vers une messagerie électronique</h2>
<pre><?= htmlentities('<a href="mailto:marcdifo@musicclassic.fr">faites-le moi savoir par courrier électronique</a>'); ?></pre>
<p>Totalement interdit !, car inutilisable sur un autre PC que celui de l'utilisateur</p>
<h2>Créer un lien vers un fichier</h2>
<pre><?= htmlentities('<a href="testpp.ppt">cliquez ici pour découvrir power point </a>'); ?></pre>
<h2>Créer un lien vers un site FTP</h2>
<pre><?= htmlentities('<a href="ftp://ftp.loc.gov">site ftp</a>'); ?></pre>
<h2>Les liens relatifs et absolus</h2>
<p>Dans le cas d’un <strong>lien relatif</strong>, on ne connaît pas l’adresse complète de la page vers laquelle on amène, on cible la page par rapport à celle qui contient le lien.</p>
<strong>S’il y a plusieurs dossiers imbriqués :</strong>
<pre><?= htmlentities('<a href="autrepage.html">Lien</a>'); ?></pre>
<p>lorsque les 2 pages se trouvent dans le même dossier </p>
<pre><?= htmlentities('<a href="dossier/page2.html">Lien</a>'); ?></pre>
<p>lorsque la page se trouve dans un sous-dossier</p>
<pre><?= htmlentities('<a href="dossier1/dossier2/page2.html">Lien</a>'); ?></pre>
<p>lorsque la page se trouve dans un sous-sous-dossier</p>
<p>En revanche, si votre fichier page2.html se trouve dans le dossier situé avant page1.html dans l’arborescence (et donc sortir du dossier courant pour remonter d’un niveau), il vous faudra l’indiquer grâce à ../ : </p>
<pre><?= htmlentities('<a href="../page2.html">Lien</a>'); ?></pre>
<strong>Exemple :</strong>
<div class="container-fluid ">
    <div class="row">
        <div class="col-xs-12">
           <?= img("img1mod8.jpg","lien relatifs et absolus");?>
        </div>
    </div> 
</div>
<p>Ce schéma montre une hiérarchie de fichiers dans un dossier racine de site : seule la page d'accueil du site est dans le dossier racine. Les pages de la rubrique téléchargements du site sont rassemblées dans un dossier (deux page pour la rubrique de téléchargements dans cet exemple).</p>
<ol>
    <li>Le schéma montre que pour faire un lien vers une page ou une image à partir de la page d'accueil Site/index.html, il suffit de nommer le ou les dossiers contenant le fichier, séparés par des slashs (/), puis d'indiquer le nom du fichier. 
Par contre, pour faire un lien à partir de la page Site/telechargements/index.html, il est parfois nécessaire de remonter d'un dossier avant de donner l'adresse relative d'un fichier, ce qui est fait avec "../". 
    </li>
    <li>Pour faire un lien vers l'image fond.png, il est nécessaire de remonter dans le dossier racine (donc "../"), puis de descendre dans le dossier images, et enfin trouver le fichier fond.png. </li>
    <li>Le fichier liste.html étant dans le même dossier que index.html, il n'y a aucun dossier à mentionner dans l'adresse relative</li>
</ol>
<strong>Attention !</strong>
<p>Évitez les noms de fichiers complexes, donnez à vos fichiers des noms en minuscules, sans espace ni accent.</p>
<p>Dans le cas d’un <strong>lien absolu</strong>, on précise l’adresse complète : </p>
<pre><?= htmlentities('<a href="http://www.csszengarden.com">Allez voir le Site de ZenGarden ! </a>'); ?></pre>
<p>Ce type de lien est le seul utilisable pour faire un lien vers un autre site que le sien.</p>
<p>Si tous les liens de votre site sont en absolu et que celui-ci change d’adresse, il faudra modifier tous ces liens pour les adapter à la nouvelle adresse. Les liens relatifs ne contenant pas le début de l’adresse, ils se révèlent plus pratiques.</p>
