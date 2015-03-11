<h1>Créer une liste à puce ou numérotée</h1>
<p>Les listes à puces sont importantes dans les sites web car elles permettent de structurer les informations, mais participent aussi à la création des menus. <br>
Il existe trois types différents de listes à puces : les listes non ordonnées (listes à puces), les listes ordonnées (chaque élément de la liste commence par un numéro (1, 2, 3) ou une lettre  (A, B, C) et les listes de définitions (plus rares, elles permettent par exemple de créer un lexique).
</p>
<h2>Créer une liste à puces</h2>
<p>Une liste non ordonnée se place à l’intérieur des balises &lt;ul&gt; &lt;/ul&gt;. Ces balises doivent être situées à l’extérieur des paragraphes. Chaque &lt;li&gt; &lt;/li&gt; représente une puce.</p>
<div class="row">
<div class="col-md-6"><pre><?= htmlentities('<ul>
<li> élément 1 </li>
<li> élément 2 </li>
<li> élément 3 </li>
<li> élément 4 </li>
<br> élément 4 bis </li>
<li> élément 5 </li>
</ul>'); ?></pre></div>
<div class="col-md-6"><ul>
<li> élément 1 </li>
<li> élément 2 </li>
<li> élément 3 </li>
<li> élément 4 </li>
<br> élément 4 bis </li>
<li> élément 5 </li>
</ul></div></div>
    
<h2>Créer une liste numérotée</h2>
<p>Une liste ordonnée se construit exactement de la même manière qu’une liste non ordonnée. Seule la balise &lt;ul&gt; change : elle est remplacée par &lt;ol&gt;.</p>
<div class="row">
<div class="col-md-6"><pre><?= htmlentities('<ol>
<li> élément 1 </li>
<li> élément 2 </li>
<li> élément 3 </li>
<li> élément 4 </li>
<br> élément 4 bis </li>
<li> élément 5 </li>
</ol>'); ?></pre></div><div class="col-md-6">
<ol>
<li> élément 1 </li>
<li> élément 2 </li>
<li> élément 3 </li>
<li> élément 4 </li>
<br> élément 4 bis </li>
<li> élément 5 </li>
</ol></div></div>
<h2>Changer le numéro initial</h2>
<div class="row">
<div class="col-md-6"><pre><?= htmlentities('<ol start="4">
<li> élément 1 </li>
<li> élément 2 </li>
<li> élément 3 </li>
<li> élément 4 </li>
<br> élément 4 bis </li>
<li> élément 5 </li>
</ol>'); ?></pre></div><div class="col-md-6"></td>
<td ><ol start="4">
<li> élément 1 </li>
<li> élément 2 </li>
<li> élément 3 </li>
<li> élément 4 </li>
<br> élément 4 bis </li>
<li> élément 5 </li>
</ol></div></div>
<p>Il est possible de changer le type de numérotation ou de puce, pour ce faire nous ferons appel au CSS.</p>
<h2>Créer une liste imbriquée</h2>
<p>Il est possible d’imbriquer une liste à puces dans une autre, il suffit d’ouvrir une nouvelle balise &lt;ul&gt; à l’intérieur d’une puce  &lt;li&gt;.</p>
<div class="row">
<div class="col-md-6"><pre><?= htmlentities('<ol type="a">
<li> introduction
	<ol type="a">
	<li> qui sommes-nous ? </li>
	<li> historique de notre société </li>
	<li> pourquoi nous choisir ? </li>
	</ol>
</li>
<li> notre rôle</li>
<li> produits commercialisés </li>
</ol>'); ?></pre></div>
<div class="col-md-6"><ol type="a">
<li> introduction
	<ol type="a">
	<li> qui sommes-nous ? </li>
	<li> historique de notre société </li>
	<li> pourquoi nous choisir ? </li>
	</ol>
</li>
<li> notre rôle</li>
<li> produits commercialisés </li>
    </ol></div></div>
<h2>Créer une citation</h2>
<p>On utilise la balise &lt;dl&gt; pour délimiter le début et la fin d’une liste de définitions. <br>
Une liste de définitions est une succession de mots suivis de leur définition, on alterne :</p>
<p>
&lt;dt&gt; : indique le mot que l’on veut définir. <br>
&lt;dd&gt; : délimite la définition de ce mot. </p>

<div class="row">
<div class="col-md-6"><pre><?= htmlentities('<p>Vocabulaire du parfait petit webmaster :</p>
<dl>
<dt>HTML</dt>
<dd>Langage de balisage permettant la rédaction de pages web structurées.</dd>
<dt>CSS</dt>
<dd>Langage de description utilisé pour la mise en forme des pages web.</dd>
</dl>'); ?></pre>
</div><div class="col-md-6">
<p>Vocabulaire du parfait petit webmaster :</p>
<dl>
<dt>HTML</dt>
<dd>Langage de balisage permettant la rédaction de pages web structurées.</dd>
<dt>CSS</dt>
    <dd>Langage de description utilisé pour la mise en forme des pages web.</dd></dl></div></div>
<p>Ces balises pourront être redécorées plus tard à l’aide du langage CSS.</p>