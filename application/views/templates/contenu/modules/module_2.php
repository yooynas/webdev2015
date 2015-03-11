<h1>Rédiger sa 1<sup>er</sup> page HTML</h1>
<h2>Structure de base d'une page HTML</h2>
<strong>Une page web est constituée de balises</strong>
<p>En HTML, les balises s’écrivent entièrement en minuscules (le HTML impose l’utilisation de minuscules pour des raisons d’uniformisation), sans espace ni accent.</p>
<p>Une balise est une information spéciale s’adressant au navigateur. Elle n’est jamais affichée à vos visiteurs, mais elle est en revanche lue et « comprise » par le navigateur. Une balise commence par un chevron ouvrant &lt; et se termine par un chevron fermant &gt;. </p>
<p>Une balise permet de donner une indication à l’ordinateur sur la nature du texte, chaque balise donne un sens précis au texte qu’elle délimite. Par exemple, la balise &lt;titre&gt; indique que ce qui suit correspond à un titre. 
Vous devez choisir les balises que vous utilisez en fonction de leur signification et non pas en fonction de l’apparence qu’elles donnent au texte. Souvenez- vous que l’apparence peut être modifiée grâce au langage CSS. </p>
<strong>Il existe deux types de balises :</strong>
<p>Les balises en paires : ce sont celles que vous rencontrerez le plus souvent. On écrit une première fois la balise, on tape du texte, puis un referme la balise après le texte en récrivant le nom de la balise précédé d’un slash (/). 
Par exemple : &lt;titre&gt;Le titre de ma page&lt;/titre&gt; 
Ce codage signifie que tout ce qui se trouve entre &lt;titre&gt; et &lt;/titre&gt; est le titre de la page. 
Ces balises permettent donc de délimiter une partie de votre texte pour dire à quoi il correspond. 
Les balises auto-fermantes (ou monoatomiques) : Elles ne délimitent pas de texte, elles servent à insérer une information à un endroit <span class="infobulle" data-toggle="tooltip" data-placement="bottom" title="Une telle balise devait, pour respecter les normes XHTML, se terminer par un / avant le chevron fermant (exemple : <image />), ce n’est plus le cas depuis le HTML5 ">précis</span>
</p>
<strong>Les attributs</strong>
<p>Que la balise soit de type «paire» ou «unique», elle peut prendre en plus ce qu’on appelle des attributs. Le rôle des attributs est de compléter une balise pour donner des informations supplémentaires. 
    Un attribut s’écrit obligatoirement en lettres minuscules et ne comporte pas d’espace, tout comme le nom de la balise. Il est immédiatement suivi du signe égal « = » puis de guillemets qui entourent la valeur de <span class="infobulle" data-toggle="tooltip" data-placement="bottom" title="Notons que depuis l’HTML5, les guillemets ne sont plus obligatoires.">l’attribut</span> . La valeur de l’attribut n’est en revanche pas soumise aux mêmes règles : elle peut contenir des majuscules et des espaces sans problème. 
</p>
<h2>Le code source minimal d’une page</h2>
<p>Une page HTML doit comporter un minimum de code pour être « correcte ». Voici le code HTML que toute page doit obligatoirement comporter : </p>
<pre><?= htmlentities('
<!doctype html>
<html lang=fr>
    <head>
        <meta charset="utf-8">
        <title>Titre du document</title>
    </head>
<body>

</body>
</html>'); ?>
</pre>
<strong>Doctype :</strong>
<pre><?= htmlentities('<!doctype html>'); ?></pre>
<p>Il existe plusieurs versions du langage HTML cohabitant sur le WEB.  On doit donc indiquer au navigateur la version retenue pour un document donné en le préfaçant d'un doctype. <br>
C’est non seulement un moyen de s’assurer que le document sera bien interprété par les navigateurs, mais aussi un élément indispensable à sa validation par l’organisme de référence, le W3C. Utiliser un DOCTYPE incomplet ou désapprouvé —voire aucun DOCTYPE— déclenche dans ces navigateurs le mode "Quirks" ("habitudes bizarres") qui va considérer votre balisage comme invalide et démodé, conforme seulement aux normes de la fin des années 90<br>
Une déclaration de type de document doit apparaître dans le document juste avant l'élément html (qui est l'élément racine de tout document HTML).<br>
Depuis HTML 5, un seul DOCTYPE est prévu dont la syntaxe est simplifiée par rapport à celle d'un DOCTYPE classique.
Les DOCTYPES des versions plus anciennes de HTML sont plus longues car basées sur le SGML et, par conséquent, exigent une référence à une DTD. Avec HTML 5, ce n'est plus le cas et le DOCTYPE n'est nécessaire que pour activer le mode standard pour les documents écrits selon la syntaxe HTML.
</p>
<strong>En-tête et spécification de langue et d’encodage</strong>
<p>Les normes du web imposent également d'autres déclarations obligatoires dans l'en-tête de tous documents HTML : les spécifications de langues et d'encodage.</p>
<pre><?= htmlentities('<html lang=fr>'); ?></pre>
<p>La balise &lt;html&gt; permettant d'identifier un document comme une page web.  Elle renferme la spécification dela langue du document.</p>
<pre><?= htmlentities('<head> et </head>'); ?></pre>
<p>Les balises &lt;head&gt; et &lt;/head&gt; sont des balises d'en-tête renfermant toutes les informations générales sur la page Web, comme son titre, l'encodage (pour la gestion des caractères spéciaux), etc.  Les informations que l'en-tête contient ne sont pas affichées sur la page.</p>
<pre><?= htmlentities('<meta charset="utf-8">'); ?></pre>
<p>L'encodage est spécifié entre les <head>, à l'aide de l'attribut charset.  Il indique aux navigateurs les caractères potentiellement utilisés dans le texte de la page (la façon dont le fichier est enregistré).  C'est lui qui détermine comment les caractères spéciaux vont s'afficher (accents, idéogrammes chinois et japonais, symboles arabes, etc.).<br>
    <span class="infobulle" data-toggle="tooltip" data-placement="bottom" title="Pour vous rendre compte des immenses possibilités du jeu de caractères UTF-8 : http://www.columbia.edu/~fdc/utf8/">utf-8</span>  permet d'utiliser la plupart des caractères de la majorité des langues du monde, il est donc intéressant de <span class="infobulle" data-toggle="tooltip" data-placement="bottom" title="Pour un document en langue française, iso-8859-1 (presque complet pour les langues de l'Europe occidentale) ou iso-8859-15 (complète le précédent avec quelques caractères supplémentaires tels que €) peuvent être employés.">l’employer</span> . Attention ! Il faut également que votre fichier soit bien enregistré en UTF-8. C'est le cas le plus souvent sous Linux par défaut, mais sous Windows il faut généralement le dire au logiciel.
</p>
<p><strong>Problème d'affichage des accents sur sa page web ?</strong><br>
C’est qu'il y a un problème avec l'encodage. Vérifiez que la balise indique bien UTF-8 et que votre fichier est enregistré en UTF-8. <br>
    Sous Notepad++, allez dans le menu Encodage > Encoder en UTF-8 (sans <span class="infobulle" data-toggle="tooltip" data-placement="bottom" title="Le BOM (Byte Order Mark) est un caractère espace insécable de largeur nulle, l’utiliser permet d’éviter l’apparition de caractères invisibles à traiter : http://www.prelude.me/index.php/2011/01/15/utf-8-avec-ou-sans-bom/">BOM</span> ) pour que votre fichier soit enregistré en UTF-8 dès le début. Cela ne s'applique qu'au fichier actuellement ouvert. <br>
Pour ne pas avoir à le faire pour chaque nouveau fichier : menu Paramétrage > Préférences, onglet Nouveau document/Dossier. Sélectionnez UTF-8 sans BOM dans la liste.
</p>
<pre><?= htmlentities('<title> Mon Titre </title>'); ?></pre>
<p>Les balises &lt;titre&gt; et &lt;/titre&gt; sont des balises de titre : le titre d’une page web est affiché dans la barre de titre du navigateur et dans son onglet.  Toute page doit avoir un titre qui décrit ce qu'elle contient. Il est conseillé que le titre soit assez court (moins de 100 caractères en général). <br>
Choisissez-le avec soin car il a beaucoup d’importance pour les moteurs de recherche qui référencent les pages web, comme Google. 
</p>
<strong>Le contenu de la page</strong>
<pre><?= htmlentities('<body> et </body>'); ?></pre>
<p>Les balises &lt;body&gt; et &lt;/body&gt; sont des balises pour le corps du document : elles doivent encadrer le contenu de la page Web, tout ce qui se trouve à l’intérieur de cette balise sera affiché à l’écran.</p>
<pre><?= htmlentities('</html>'); ?></pre>
<p>Signifie la fin de la page web. <br>
Cette formulation est précise et rigoureuse (elle mêle notamment des balises et des parties en majuscules). Pour éviter d’éventuelles erreurs, contentez-vous d’un copier-coller dans vos créations.
</p>
<strong>Ajouter un commentaire</strong>
<p>Une balise de commentaire n’est visible que si on regarde le code source de la page web que l’on visite. C’est une information généralement destinée au webmaster qui peut servir de repère ou d’aide-mémoire pour ne pas oublier de coder quelque chose.</p>
<pre><?= htmlentities('<!--   Ajouter ici les commentaires   -->'); ?></pre>
<strong>Présentation du code source</strong>
<ul><li>Le code source HTML ne prend pas en compte vos retraits, sauts de ligne ou tabulations. Pour des raisons de lisibilité, aérez et indentez votre code source autant que possible.</li>
<li>Ajoutez des commentaires de manière à vous souvenir de l’utilité d’une balise plutôt qu’une autre ou détailler votre code à destination d’un collègue.</li>
</ul>