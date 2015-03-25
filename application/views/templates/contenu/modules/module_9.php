<h1>Inserer des images</h1>
<p>Au-delà de l’aspect purement décoratif, les images permettent de donner une identité visuelle au site (avec le logo du site) et peuvent même constituer le centre de l’information.</p>
<h2>Choisissez bien le nom de votre image</h2>
<p>Pour éviter des problèmes, prenez l'habitude d'enregistrer vos fichiers avec des noms en minuscules, sans espaces ni accents. Par exemple : mon_image.png.<br>
Vous pouvez remplacer les espaces par le caractère "underscore": _ afin d’améliorer la lisibilité du nom du fichier.
</p>
<h2>Les formats d’image du Web</h2>
<p>Si les pages web sont parfois longues à charger, c’est souvent à cause des images. L’objectif est d’avoir des fichiers images les plus légers possible, d’où l’importance de choisir le format d’image approprié.</p>
<h3>Les 4 principaux formats que l’on utilise sur le Web sont :</h3>
<strong>JPEG ou JPG</strong>
<p>Les images au format JPEG (Joint Photographic Expert Group) sont très répandues. Elles sont en particulier très adaptées pour les photos, c’est- à-dire les images comportant beaucoup de couleurs différentes. <br>
Le format JPEG possède la particularité de proposer différents niveaux de compression, c’est à vous de trouver le meilleur compromis entre une image de très bonne qualité mais de poids plus important ou de qualité moindre mais de poids très faible. 
</p>
<strong>PNG</strong>
<p>Le format d’image PNG (Portable Network Graphics) est assez récent. Contrairement au JPEG, il compresse l’image sans en détériorer la qualité. On peut enregistrer indifféremment des images avec peu ou beaucoup de couleurs, bien que le format JPEG reste le plus indiqué pour les photos.  <br>
Le format PNG est libre de droit, contrairement au GIF qui est soumis à un brevet (il a d’ailleurs justement été créé pour offrir une alternative à ce format).  <br>
On distingue les PNG 8 bits qui peuvent stocker jusqu’à 256 couleurs différentes (adapté pour les images possédant très peu de couleurs) et les PNG 24 bits supportant plusieurs millions de couleurs (16 777 216 pour être précis). Notez toutefois qu’on recommande l’utilisation du JPEG pour les photos car la compression est plus efficace pour ce type d’image.
</p>
<strong>GIF</strong>
<p>Le format GIF (Graphics Interchange Format) est très répandu sur le Web (plus que le PNG) car c’est un format qui existe depuis plus longtemps. Contrairement aux PNG, les GIF ne peuvent pas contenir plus de 256 couleurs ce qui les rend inutilisables pour les photos. <br>
Ils peuvent être rendus transparents mais ne proposent pas autant d’options de transparence que les PNG. Il est donc aujourd’hui recommandé d’utiliser les PNG dans la mesure du possible. <br>
Les GIF, contrairement aux png peuvent être animés. Notez que les images animées peuvent distraire les visiteurs, voire les agacer. Par conséquent, évitez l’utilisation de GIF animés à moins que cela ne soit vraiment nécessaire.
</p>
<strong>SVG</strong>
<p>SVG (Scalable Vector Graphics) est un format de dessin vectoriel, élaboré à partir de 1998 par un groupe de travail comprenant entre autre IBM, Apple, Microsoft, Xerox. <br>
SVG est un format d'image léger lorsqu'il s'agit de représenter des formes simples, car seules les informations décrivant ces formes sont stockées (coordonnées, couleurs, effets) contrairement aux images bitmap (JPG, PNG, GIF) qui doivent mémoriser le contenu pixel par pixel. Ce principe rend les images SVG étirables sans perte de qualité. Il est également une alternative à Flash pour les petites animations lorsqu'il est combiné à SMIL, ou pour présenter des données qui doivent être dynamiques.</p>
<strong>Comparaison des formats d’image pixel</strong>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
           <?= img("img1mod9.jpg","Comparaison des formats");?>
        </div>
    </div>
</div>
<h2>Insérer une image dans une page Web</h2>
<p>La balise &lt;img&gt;, qui est auto-fermante, doit être insérée dans un paragraphe. <br>
Elle requiert obligatoirement deux attributs : src précisant le chemin vers l’image que vous voulez afficher et alt permettant d’indiquer un texte de remplacement.
</p>
<pre><?= htmlentities('<p>Voici une photo de mes dernières vacances en Espagne à Moraira :</p> 
<p><img src="moraira.jpg" alt="Photo de vacances" /></p> '); ?></pre>
<strong>Cibler l’image</strong>
<pre><?= htmlentities('<img src="tigre.jpg">'); ?></pre>
<p>lorsque l'image se trouve dans le même dossier que la page</p>
<pre><?= htmlentities('<img src="images/tigre.jpg">'); ?></pre>
<p>lorsque l'image se trouve dans un sous-dossier (images)</p>
<pre><?= htmlentities('<img src="../tigre.jpg">'); ?></pre>
<p>l'image se trouve dans le répertoire parent de la page web</p>
<h2>Prévoir un texte de remplacement si l'image ne s'affiche pas</h2>
<pre><?= htmlentities('<img src="tigre.jpg" alt="photo de tigre">'); ?></pre>
<p>L’attribut alt est particulièrement utile aux personnes qui ne peuvent pas voir les images, comme c’est le cas des non-voyants. Grâce à ce texte alternatif, ces personnes peuvent avoir une idée de l’image qui se trouve là. De plus, le texte alternatif est affiché par le navigateur à la place de l’image si celle-ci ne peut être chargée (parce que le fichier est introuvable, parce que l’utilisateur a désactivé le chargement des images, etc.). Notez que ce texte est également référencé par les moteurs de recherche. <br>
Si vous ne voyez pas de texte alternatif pertinent pour votre image (ex : images décoratives), laissez  l’attribut alt vide, comme ceci : &lt;img src="image.png" alt="" /&gt; <br> 
<strong>Il faut toujours mettre cet attribut alt , car il est obligatoire.
</strong></p>
<h2>Que faire si l’image ne s’affiche pas ?</h2>
<p>Si l’image refuse de s’afficher, c’est que vous avez mal indiqué son adresse : vérifiez si l’image se trouve bien dans le bon dossier, si le nom du fichier est bien correct, renommez le fichier de préférence afin que tout soit en minuscules, sans accents et sans espaces.</p>
<h2>Ajouter une infobulle</h2>
<p>Il est possible d’ajouter une infobulle qui s’affiche lorsqu’on pointe sur l’image, cela permet de donner au visiteur une information supplémentaire sur l’image qu’il est en train de consulter.</p>
<pre><?= htmlentities('<p>
<img src="moraira.jpg" alt="Photo de vacances" title="Le cadre est sympathique !" />
</p> '); ?></pre>
<h2>Imposer une taille d'image</h2>
<pre><?= htmlentities('<img src="tigre.jpg" width="100" height="200">'); ?></pre>
<h2>Habiller un texte autour d'une image</h2>
<p>C’est le langage CSS qui permettra de placer correctement plusieurs images sur une page.  En attendant, indiquez la mention suivante :</p>
<pre><?= htmlentities('<img src="tigre.jpg" align="left">'); ?></pre>
<p>L’image se placera à gauche de la page et le texte longera l’image, à sa droite.</p>
<pre><?= htmlentities('<br clear="left">'); ?></pre>
<p>Ce texte arrêtera de longer l’image et se placera en dessous de celle-ci.</p>
<br>
<pre><?= htmlentities('<img src="tigre.jpg" align="right">'); ?></pre>
<p>L’image se placera à droite de la page et le texte longera l’image, à sa gauche.</p>
<pre><?= htmlentities('<br clear="right">'); ?></pre>
<p>Ce texte arrêtera de longer l’image et se placera en dessous de celle-ci.</p>
<h2>Ajouter un trait horizontal</h2>
<pre><?= htmlentities('<h1> les tigres …</h1>
<hr/>'); ?></pre>
<p>La ligne horizontale se tracera là où est insérée la balise.  Notez toutefois que l’utilisation des bordures en CSS est souvent préférable dans la mesure du possible plutôt que les lignes horizontales.</p>
<h2>La balise Figure</h2>
<p>En HTML5, on dispose de la balise &lt;figure&gt;. Voici comment on pourrait l'utiliser :</p>
<pre><?= htmlentities('<figure>
<img src="images/la_joconde.png" alt="La Joconde" />
</figure> '); ?></pre>
<p>Si vous faites de votre image une figure, l'image peut être située en-dehors d'un paragraphe.
Une figure est le plus souvent accompagnée d'une légende. Pour ajouter une légende, utilisez la balise &lt;figcaption&gt; à l'intérieur de la balise &lt;figure&gt;, comme ceci : 
</p>
<pre><?= htmlentities('<figure>
<img src="images/la_joconde.png" alt="La Joconde" />
<figcaption>La représentation de la Joconde</figcaption>
</figure>'); ?></pre>
<strong>Quand insérer une image dans une balise &lt;figure&gt; plutôt que dans un paragraphe ?</strong>
<p>Si elle n'apporte aucune information et constitue seulement une illustration pour décorer : placez l'image dans un paragraphe. <br>
Si elle apporte une information importante pour la bonne compréhension du texte: placez l'image dans une figure.
</p>