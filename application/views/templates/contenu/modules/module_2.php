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
