<h1>Baliser le texte de sa page</h1>
<strong>Attention !  Toutes les balises ci-après s’intégreront entre une ouverture de &lt;body et une fermeture de &lt;/body&gt;</strong>
<h2>Créer des paragraphes</h2>
<p>Le langage HTML ne respecte pas les sauts de ligne que vous pourriez taper, c’est la balise &lt;p&gt; qui permet de structurer vos paragraphes. </p>
<pre><?= htmlentities('<p> Il existe actuellement des éditeurs spécifiquement conçus pour l’encodage de fichiers HTML ; ils ne sont pas indispensables mais accélèrent et facilitent simplement le processus d’application des balises.</p>
<p> D’autre part sont disponibles les éditeurs WYSIWIG (What You See Is What You Ghet), ceux-ci évitent au concepteur de page web d’intervenir directement au niveau des codes et des règles de structuration. </p>
'); ?></pre>
<p>Le navigateur sépare chaque paragraphe d'une ligne vide</p>
<pre><?= htmlentities('<p> 
<br> Exemples d’éditeurs WYSIWIG :
<br> Dreamweaver
<br> GoLive
<br> Frontpage
</p> 
'); ?></pre>
<p>La balise <span class="infobulle" data-toggle="tooltip" data-placement="bottom" title="Pour rappel, le '/' en fin de  balise (<br />), n’est plus obligatoire en HTML5">&lt;br&gt;</span>  (pour break), balise auto-fermante, sert simplement à indiquer qu’on insère un retour à la ligne à un endroit. La balise &lt;br&gt; est également utilisée pour passer des lignes vides. </p> 
<strong>ATTENTION  N’abusez pas des &lt;br&gt;</strong>
<p>Pour décaler le texte et le placer à un endroit précis sur la page, nous utiliserons le langage CSS.</p>
<strong>Placement des balises </strong>
<p>Vous devez impérativement placer la balise &lt;br&gt; à l’intérieur d’une balise de paragraphe &lt;p&gt; &lt;/p&gt; <br>
Si vous ne faites pas cela, aucune erreur ne s’affichera mais votre page sera considérée comme invalide. Une page invalide est une page qui ne respecte pas les règles du langage HTML, sa pérennité risque alors d’être affectée. Tout webmaster un tant soit peu consciencieux doit faire l’effort de respecter ces règles. 
</p>
<h2>Créer des titres</h2>
<p>Dans une page web correctement organisée, on trouve des titres, des sous-titres, des sous-sous-titres. </p>
<pre><?= htmlentities('<h1>Ceci est un titre de niveaux 1</h1>       Plus grand
<h2>Ceci est un titre de niveaux 2</h2>
<h3>Ceci est un titre de niveaux 3</h3>
<h4>Ceci est un titre de niveaux 4</h4>
<h5>Ceci est un titre de niveaux 5</h5>
<h6>Ceci est un titre de niveaux 6</h6>      Plus petit
'); ?></pre>
<strong>Il faut choisir la balise en fonction de l’importance du titre </strong>
<p>Lorsqu’on débute, on a tendance à choisir sa balise de titre en fonction de la taille dans lequel le texte est écrit. C’est une erreur, il faut choisir la balise en fonction du « niveau » du titre, c’est-à-dire de son importance car pour modifier la taille du texte c’est le langage CSS qu’il faut utiliser.</p>
<strong>Placement des balises de titre</strong>
<p>Les balises de titres doivent être placées à l’extérieur des balises de paragraphe.</p>
<h2>Mettre son texte en valeur</h2>
<strong>Gras ou italique</strong>
<pre><?= htmlentities('<p> Ceci est du texte ordinaire </p>
<p> <strong> Ceci est du texte en gras </strong> ou <b> gras </b> </p>
<p> <em> Ceci est du texte en italique </em> ou <i> italique </i> </p>
'); ?></pre>
<strong>Souligner ou barrer</strong>
<pre><?= htmlentities('<p> <u> ceci est un texte souligné </u> </p>
<p> <strike> ceci est un texte barré </strike> </p>'); ?></pre>
<strong>Mettre un texte en exposant ou en indice</strong>
<pre><?= htmlentities('<p> ce texte est mis en <sup>exposant</sup></p>
<p> ce texte est mis en <sub>indice</sub></p>'); ?></pre>
<strong>Agrandir ou réduire un texte</strong>
<pre><?= htmlentities('<p> vous désirez pêcher un <big> énorme</big>poisson ?</p><p> nos prix sont <small> majorés </small> pendant l\'été </p>'); ?></pre>
<strong>Placement des balises de mise en valeur</strong>
<p>Ces balises de mise en valeur de texte doivent être utilisées à l’intérieur de paragraphes &lt;p&gt;</p>
<strong>Les citations longues</strong>
<pre><?= htmlentities('<blockquote>
<p>
Le voile du matin sur les monts se déploie.<br />
Vois, un rayon naissant blanchit la vieille tour ;<br />
Et déjà dans les cieux s’unit avec amour,<br />
</p>
</blockquote>
'); ?></pre>
<p>Cette balise permet de générer des retraits de texte, elle ne doit pas se trouver dans un paragraphe mais elle doit au contraire contenir une balise de paragraphe. </p>
<strong>Les espaces</strong>
<pre><?= htmlentities('Exemples d’éditeurs WYSIWIG : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dreamweaver, GoLive, Frontpage.'); ?></pre>
<p>Ajoutez cette commande pour chaque espace à effectuer</p>
<strong>Contrôler les sauts de ligne</strong>
<p>Le navigateur ne renvoi pas le texte à la ligne, tout reste ensemble sur la même ligne</p>
<strong>Insérer des caractères spéciaux</strong>
<pre><?= htmlentities('<p> &#169; 2000 Marc Harmin </p>'); ?></pre>
<p>Ce code permet d'obtenir le sigle copyright</p>
<p>Lien pour une liste des différents caractères spéciaux :></p>
<ul>
<li><a href="http://www.commentcamarche.net/contents/html/htmlcarac.php3"  target="_blank">comment ca marche </a></li>
</ul>
<strong>Remarque :</strong>
<p><em>Nous verrons, lors de l’intégration du code CSS, que d’avantage de mises en forme sont possibles. <br>
C’est volontairement que nous n’utilisons plus les propriétés des balises HTML car celles-ci seront spécifiées dans le code CSS afin de simplifier et d’alléger le code HTML et de respecter la règle de base en web – LA SÉPARATION DU CONTENU ET DE LA MISE EN FORME.
</em></p>
<h2>L'importance de la sémantique</h2>
<p>Il est fondamental d'utiliser les bonnes balises au bon endroit, de mettre en place un balisage qui a du sens.
Par exemple : &lt;h1&gt; pour le titre principal, &lt;ul&gt; et &lt;li&gt;pour les listes de liens (menus), &lt;blockquote&gt; et &lt;q&gt; pour les citations, … exemple :
</p>
<pre><?= htmlentities('<h1>Titre de la page</h1>
<h2>Titre du paragraphe</h2>
Mon Texte.
<ul>
    <li>Idée 1</li>
    <li>Idée 2</li>
</ul>'); ?></pre>
<p>En HTML, il est recommandé d’abandonner les balises de mise en forme graphique comme &lt;i&gt; (désignant l’italique) au profit de balises de structuration plus logique comme &lt;em&gt; (mise en emphase). De même, l’élément de renforcement &lt;strong&gt; remplacera désormais la balise de gras &lt;b&gt;. La démarche pourra se résumer à l’abandon de toute balise de mise en forme au profit des seules balises porteuses de sens.</p>
<strong>Le respect de la sémantique comporte divers avantages :</strong>
<ul>
    <li>Votre code est nettement plus propre et structuré</li>
    <li>Les moteurs de recherches et les navigateurs analyseront beaucoup plus facilement vos pages</li>
<li>La hiérarchie des éléments de votre page est respectée même quand la feuille de style CSS est désactivée</li>
<li>L’interprétation de la page est facilitée pour les lecteurs braille (qui ne perçoivent pas la présentation réelle)</li>
</ul>
