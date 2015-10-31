<?php
class lof{
	
	static $coefficient_classe = array(
		'1' => '1',
		'2' => '1.5',
		'3' => '2',
		'4' => '2.5',
		'5' => '3',
		'6' => '4',
		'7' => '5',
		'8' => '6',
		'9' => '8',
		'10' => '10',
		'12' => '12',
		'15' => '15',
		'18' => '18',
		'24' => '24',
		'30' => '30',
		'45' => '45',
		'60' => '60',
		'80' => '80',
		'100' => '100'
	);
	
	static $montant_classe_1 = 228;
	
	
	static $listeValeurs = array(
		'CIVILITE' => array(
			'1' => 'M',
			'2' => 'Mme',
			'3' => 'Mlle'
		),
		'CORPS' => array(
			'1' => '',
			'2' => 'Contractuel de la Fonction Publique',
			'3' => 'Fonction Publique d\'Etat',
			'4' => 'Fonction Publique Territoriale',
			'5' => 'Fonction Publique Hospitalière',
			'6' => 'Etablissement public, Entreprise',
			'7' => 'Publique ou semi-publique',
			'8' => 'Salarié du secteur privé',
			'9' => 'Commerçant',
			'10' => 'Profession libérale indépendante y compris médecin',
			'11' => 'Autre'
		),
		'SITUATION_FAMILIALE' => array(
			'1' => 'Marié(e)',
			'2' => 'Célibataire',
			'3' => 'Pacsé(e)',
			'4' => 'Veuf ou veuve',
			'5' => 'Divorcé(e)',
			'6' => 'Séparé(e)',
			'7' => 'Inconnue'
		),
		'QUALITE_AFFILIATION' => array(
			'1' => '',
			'2' => 'Fonctionnaire ou agent public en activité',
			'3' => 'Ancien fonctionnaire ou agent public',
			'4' => 'Conjoint ou pacsé(e) de fonctionnaire ou agent public',
			'5' => 'Veuf/veuve de fonctionnaire ou agent public',
			'6' => 'PUPH - MCUPH',
			'7' => 'Autre'
		),
		
		'TRANCHE_REVENU' => array(
			'moins de 25 000 €' => '&lt; 25 000 &euro;',
			'25 000 - 50 000 €' => '25 000 - 50 000 &euro;',
			'50 000 - 75 000 €' => '50 000 - 75 000 &euro;',
			'75 000 - 100 000 €' => '75 000 - 100 000 &euro;',
			'100 000 - 150 000 €' => '100 000 - 150 000 &euro;',
			'plus de 150 000 €' => '&gt; 150 000 &euro;',
		),
		
		'NOMBRE_ENFANTS' => array(
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6+' => '6 ou +'
		),
		
		'CATEGORIE_FONCTIONNAIRE' => array(
			'1' => '',
			'2' => 'A',
			'3' => 'B',
			'4' => 'C',
			'5' => 'HC'
		),
		
		
		'CLASSE_COTISATION' => array(
			'1' => '1 : 228 € / an',
			'3' => '3 : 456 € / an',
			'5' => '5 : 684 € / an',
			'6' => '6 : 912 € / an',
			'7' => '7 : 1140 € / an',
			'8' => '8 : 1368 € / an',
			'9' => '9 : 1824 € / an',
			'10' => '10 : 2280 € / an',
			'12' => '12 : 2736 € / an',
			'15' => '15 : 3420 € / an',
			'18' => '18 : 4104 € / an',
			'24' => '24 : 5472 € / an',
			'30' => '30 : 6840 € / an'
		),
		
		'CLASSE_COTISATION_MONTANT' => array(
			'1' => '228',
			'2' => '342',
			'3' => '456',
			'4' => '570',
			'5' => '684',
			'6' => '912',
			'7' => '1140',
			'8' => '1368',
			'9' => '1824',
			'10' => '2280',
			'12' => '2736',
			'15' => '3420',
			'18' => '4104',
			'24' => '5472',
			'30' => '6840',
			'45' => '10260',
			'60' => '13680',
			'80' => '18240',
			'100' => '22800'
		),
		
		'CLASSE_COTISATION_MOIS' => array(
			'1' => '1 : 19 € / mois',
			'2' => '2 : 28.5 € / mois',
			'3' => '3 : 38 € / mois',
			'4' => '4 : 47.5 € / mois',
			'5' => '5 : 57 € / mois',
			'6' => '6 : 76 € / mois',
			'7' => '7 : 95 € / mois',
			'8' => '8 : 114 € / mois',
			'9' => '9 : 152 € / mois',
			'10' => '10 : 190 € / mois',
			'12' => '12 : 228 € / mois',
			'15' => '15 : 285 € / mois',
			'18' => '18 : 342 € / mois',
			'24' => '24 : 456 € / mois',
			'30' => '30 : 570 € / mois',
			'45' => '45 : 855 € / mois',
			'60' => '60 : 1140 € / mois',
			'80' => '80 : 1520 € / mois',
			'100' => '100 : 1900 € / mois'
		),	
		'CLASSE_COTISATION_CALCUL' => array(
			'1' => '228'
		),
		
		'MODE_REGLEMENT_RETRAITE_COTISANT' => array(
			'1' => 'Chèque Annuel',
			'2' => 'Chèque Semestriel',
			'9' => 'Chèque Trimestriel',
			'10' => 'Chèque Mensuel',
			'3' => 'Précompte mensuel',
			'4' => 'Prélèvement Annuel',
			'5' => 'Prélèvement Semestriel',
			'6' => 'Prélèvement Trimestriel',
			'7' => 'Prélèvement Mensuel'
		),
		
		'MOIS_DEBUT_PRELEVEMENT' => array(
			'1' => 'Janvier',
			'2' => 'Février',
			'3' => 'Mars',
			'4' => 'Avril',
			'5' => 'Mai',
			'6' => 'Juin',
			'7' => 'Juillet',
			'8' => 'Aout',
			'9' => 'Septembre',
			'10' => 'Octobre',
			'11' => 'Novembre',
			'12' => 'Décembre'
		),
		
		'PLAGE_HORAIRE' => array(
			'9 - 12h' => '9 - 12h',
			'12 - 14h' => '12 - 14h',
			'14 - 17h' => '14 - 17h',
			'17 - 19h' => '17 - 19h',
		),
		
		'OCCUPATION_LOGEMENT' => array(
			'Propriétaire' => 'Propriétaire',
			'Locataire' => 'Locataire',
			'Hébergé à titre gratuit' => 'Hébergé à titre gratuit'
		),
		
		'REVENUS_ANNUELS_FOYER' => array(
			'moins de 25 000' => '< 25 000 €',
			'25 000 - 50 000' => '25 000 - 50 000 €',
			'50 000 - 75 000' => '50 000 - 75 000 €',
			'75 000 - 100 000' => '75 000 - 100 000 €',
			'100 000 - 150 000' => '100 000 - 150 000 €',
			'plus de 150 000' => '> 150 000 €'
		),
		
		'IMPOT_PAYE' => array(
			'0 €' => '0 &euro;',
			'0 - 5 000 €' => '0 - 5 000 &euro;',
			'5 000 - 10 000 €' => '5 000 - 10 000 &euro;',
			'10 000 - 20 000 €' => '10 000 - 20 000 &euro;',
			'plus de 20 000 €' => '&gt; 20 000 &euro;',
		),
		
		'CAPACITE_EPARGNE_MENSUELLE' => array(
			'moins de 50' => '< 50 €',
			'50 à 100' => '50 - 100 €',
			'100 à 300' => '100 - 300 €',
			'300 à 600' => '300 - 600 €',
			'plus de 600' => '> 600 €'
		),
		
		'ESTIMATION_PATRIMOINE' => array(
			'moins de 100 000' => '< 100 000 &euro;',
			'100 000 - 300 000 €' => '100 000 - 300 000 &euro;',
			'300 000 - 500 000 €' => '300 000 - 500 000 &euro;',
			'500 000 - 750 000 €' => '500 000 - 750 000 &euro;',
			'750 000 - 1 000 000 €' => '750 000 - 1 000 000 &euro;',
			'plus de 1 000 000 €' => '&gt; 1 000 000 &euro;'
		),
		
		
		'NB_ANNEES_RACHAT' => array(
			'0' => 'Pas de rachat',
			'-1' => 'Montant libre',
			'1' => '1 An Soit : 228 euros',
			'2' => '2 Ans Soit : 456 euros',
			'3' => '3 Ans Soit : 684 euros',
			'4' => '4 Ans Soit : 912 euros',
			'5' => '5 Ans Soit : 1 140 euros',
			'6' => '6 Ans Soit : 1 368 euros',
			'7' => '7 Ans Soit : 1 596 euros',
			'8' => '8 Ans Soit : 1 824 euros',
			'9' => '9 Ans Soit : 2 052 euros',
			'10' => '10 Ans Soit : 2 280 euros',
			'11' => '11 Ans Soit : 2 508 euros',
			'12' => '12 Ans Soit : 2 736 euros',
			'13' => '13 Ans Soit : 2 964 euros',
			'14' => '14 Ans Soit : 3 192 euros',
			'15' => '15 Ans Soit : 3 420 euros',
			'16' => '16 Ans Soit : 3 648 euros',
			'17' => '17 Ans Soit : 3 876 euros',
			'18' => '18 Ans Soit : 4 104 euros',
			'19' => '19 Ans Soit : 4 332 euros',
			'20' => '20 Ans Soit : 4 560 euros',
			'21' => '21 Ans Soit : 4 788 euros',
			'22' => '22 Ans Soit : 5 016 euros',
			'23' => '23 Ans Soit : 5 244 euros',
			'24' => '24 Ans Soit : 5 472 euros',
			'25' => '25 Ans Soit : 5 700 euros',
			'26' => '26 Ans Soit : 5 928 euros',
			'27' => '27 Ans Soit : 6 156 euros',
			'28' => '28 Ans Soit : 6 384 euros',
			'29' => '29 Ans Soit : 6 612 euros',
			'30' => '30 Ans Soit : 6 840 euros',
			'31' => '31 Ans Soit : 7 068 euros',
			'32' => '32 Ans Soit : 7 296 euros',
			'33' => '33 Ans Soit : 7 524 euros',
			'34' => '34 Ans Soit : 7 752 euros',
			'35' => '35 Ans Soit : 7 980 euros',
			'36' => '36 Ans Soit : 8 208 euros',
			'37' => '37 Ans Soit : 8 436 euros',
			'38' => '38 Ans Soit : 8 664 euros',
			'39' => '39 Ans Soit : 8 892 euros',
			'40' => '40 Ans Soit : 9 120 euros',
			'41' => '41 Ans Soit : 9 348 euros',
			'42' => '42 Ans Soit : 9 576 euros'
		),
		
		'LISTE_PAYS' => array(
			'Afghanistan' => 'Afghanistan',
			'Afrique_du_Sud' => 'Afrique du Sud',
			'Albanie' => 'Albanie',
			'Algerie' => 'Algérie',
			'Allemagne' => 'Allemagne',
			'Andorre' => 'Andorre',
			'Angola' => 'Angola',
			'Antigua-et-Barbuda' => 'Antigua-et-Barbuda',
			'Arabie_saoudite' => 'Arabie saoudite',
			'Argentine' => 'Argentine',
			'Armenie' => 'Arménie',
			'Australie' => 'Australie',
			'Autriche' => 'Autriche',
			'Azerbaidjan' => 'Azerbaïdjan',
			'Bahamas' => 'Bahamas',
			'Bahrein' => 'Bahreïn',
			'Bangladesh' => 'Bangladesh',
			'Barbade' => 'Barbade',
			'Belau' => 'Belau',
			'Belgique' => 'Belgique',
			'Belize' => 'Belize',
			'Benin' => 'Bénin',
			'Bhoutan' => 'Bhoutan',
			'Bielorussie' => 'Biélorussie',
			'Birmanie' => 'Birmanie',
			'Bolivie' => 'Bolivie',
			'Bosnie-Herzégovine' => 'Bosnie-Herzégovine',
			'Botswana' => 'Botswana',
			'Bresil' => 'Brésil',
			'Brunei' => 'Brunei',
			'Bulgarie' => 'Bulgarie',
			'Burkina' => 'Burkina',
			'Burundi' => 'Burundi',
			'Cambodge' => 'Cambodge',
			'Cameroun' => 'Cameroun',
			'Canada' => 'Canada',
			'Cap-Vert' => 'Cap-Vert',
			'Chili' => 'Chili',
			'Chine' => 'Chine',
			'Chypre' => 'Chypre',
			'Colombie' => 'Colombie',
			'Comores' => 'Comores',
			'Congo' => 'Congo',
			'Cook' => 'Cook',
			'Coree_du_Nord' => 'Corée du Nord',
			'Coree_du_Sud' => 'Corée du Sud',
			'Costa_Rica' => 'Costa Rica',
			'Cote_Ivoire' =>'Côte d\'Ivoire',
			'Croatie' => 'Croatie',
			'Cuba' => 'Cuba',
			'Danemark' => 'Danemark',
			'Djibouti' => 'Djibouti',
			'Dominique' => 'Dominique',
			'Egypte' => 'Égypte',
			'Emirats_arabes_unis' => 'Émirats arabes unis',
			'Equateur' => 'Équateur',
			'Erythree' => 'Érythrée',
			'Espagne' => 'Espagne',
			'Estonie' => 'Estonie',
			'Etats-Unis' => 'États-Unis',
			'Ethiopie' => 'Éthiopie',
			'Fidji' => 'Fidji',
			'Finlande' => 'Finlande',
			'France' => 'France',
			'Gabon' => 'Gabon',
			'Gambie' => 'Gambie',
			'Georgie' => 'Géorgie',
			'Ghana' => 'Ghana',
			'Grèce' => 'Grèce',
			'Grenade' => 'Grenade',
			'Guatemala' => 'Guatemala',
			'Guinee' => 'Guinée',
			'Guinee-Bissao' => 'Guinée-Bissao',
			'Guinee_equatoriale' => 'Guinée équatoriale',
			'Guyana' => 'Guyana',
			'Haiti' => 'Haïti',
			'Honduras' => 'Honduras',
			'Hongrie' => 'Hongrie',
			'Inde' => 'Inde',
			'Indonesie' => 'Indonésie',
			'Iran' => 'Iran',
			'Iraq' => 'Iraq',
			'Irlande' => 'Irlande',
			'Islande' => 'Islande',
			'Israël' => 'Israël',
			'Italie' => 'Italie',
			'Jamaique' => 'Jamaïque',
			'Japon' => 'Japon',
			'Jordanie' => 'Jordanie',
			'Kazakhstan' => 'Kazakhstan',
			'Kenya' => 'Kenya',
			'Kirghizistan' => 'Kirghizistan',
			'Kiribati' => 'Kiribati',
			'Koweit' => 'Koweït',
			'Laos' => 'Laos',
			'Lesotho' => 'Lesotho',
			'Lettonie' => 'Lettonie',
			'Liban' => 'Liban',
			'Liberia' => 'Liberia',
			'Libye' => 'Libye',
			'Liechtenstein' => 'Liechtenstein',
			'Lituanie' => 'Lituanie',
			'Luxembourg' => 'Luxembourg',
			'Macedoine' => 'Macédoine',
			'Madagascar' => 'Madagascar',
			'Malaisie' => 'Malaisie',
			'Malawi' => 'Malawi',
			'Maldives' => 'Maldives',
			'Mali' => 'Mali',
			'Malte' => 'Malte',
			'Maroc' => 'Maroc',
			'Marshall' => 'Marshall',
			'Maurice' => 'Maurice',
			'Mauritanie' => 'Mauritanie',
			'Mexique' => 'Mexique',
			'Micronesie' => 'Micronésie',
			'Moldavie' => 'Moldavie',
			'Monaco' => 'Monaco',
			'Mongolie' => 'Mongolie',
			'Mozambique' => 'Mozambique',
			'Namibie' => 'Namibie',
			'Nauru' => 'Nauru',
			'Nicaragua' => 'Nicaragua',
			'Niger' => 'Niger',
			'Nigeria' => 'Nigeria',
			'Niue' => 'Niue',
			'Norvège' => 'Norvège',
			'Nouvelle-Zelande' => 'Nouvelle-Zélande',
			'Oman' => 'Oman',
			'Ouganda' => 'Ouganda',
			'Ouzbekistan' => 'Ouzbékistan',
			'Pakistan' => 'Pakistan',
			'Panama' => 'Panama',
			'Papouasie-Nouvelle_Guinee' => 'Papouasie - Nouvelle Guinée',
			'Paraguay' => 'Paraguay',
			'Pays-Bas' => 'Pays-Bas',
			'Perou' => 'Pérou',
			'Philippines' => 'Philippines',
			'Pologne' => 'Pologne',
			'Portugal' => 'Portugal',
			'Qatar' => 'Qatar',
			'Republique_centrafricaine' => 'République centrafricaine',
			'Republique_dominicaine' => 'République dominicaine',
			'Republique_tcheque' => 'République tchèque',
			'Roumanie' => 'Roumanie',
			'Royaume-Uni' => 'Royaume-Uni',
			'Russie' => 'Russie',
			'Rwanda' => 'Rwanda',
			'Saint-Christophe-et-Nieves' => 'Saint-Christophe-et-Niévès',
			'Sainte-Lucie' => 'Sainte-Lucie',
			'Saint-Marin' => 'Saint-Marin',
			'Saint-Siège' => 'Saint-Siège, ou le Vatican',
			'Saint-Vincent-et-les_Grenadines' => 'Saint-Vincent-et-les Grenadines',
			'Salomon' => 'Salomon',
			'Salvador' => 'Salvador',
			'Samoa_occidentales' => 'Samoa occidentales',
			'Sao_Tome-et-Principe' => 'Sao Tomé-et-Principe',
			'Senegal' => 'Sénégal',
			'Seychelles' => 'Seychelles',
			'Sierra_Leone' => 'Sierra Leone',
			'Singapour' => 'Singapour',
			'Slovaquie' => 'Slovaquie',
			'Slovenie' => 'Slovénie',
			'Somalie' => 'Somalie',
			'Soudan' => 'Soudan',
			'Sri_Lanka' => 'Sri Lanka',
			'Suede' => 'Suède',
			'Suisse' => 'Suisse',
			'Suriname' => 'Suriname',
			'Swaziland' => 'Swaziland',
			'Syrie' => 'Syrie',
			'Tadjikistan' => 'Tadjikistan',
			'Tanzanie' => 'Tanzanie',
			'Tchad' => 'Tchad',
			'Thailande' => 'Thaïlande',
			'Togo' => 'Togo',
			'Tonga' => 'Tonga',
			'Trinite-et-Tobago' => 'Trinité-et-Tobago',
			'Tunisie' => 'Tunisie',
			'Turkmenistan' => 'Turkménistan',
			'Turquie' => 'Turquie',
			'Tuvalu' => 'Tuvalu',
			'Ukraine' => 'Ukraine',
			'Uruguay' => 'Uruguay',
			'Vanuatu' => 'Vanuatu',
			'Venezuela' => 'Venezuela',
			'Viet_Nam' => 'Viêt Nam',
			'Yemen' => 'Yémen',
			'Yougoslavie' => 'Yougoslavie',
			'Zaire' => 'Zaïre',
			'Zambie' => 'Zambie',
			'Zimbabwe' => 'Zimbabwe'		
		),
		
		'UNWANTED_CHARS' => array(
			'Š'=>'S',
			'š'=>'s',
			'Ž'=>'Z',
			'ž'=>'z',
			'À'=>'A',
			'Á'=>'A',
			'Â'=>'A',
			'Ã'=>'A',
			'Ä'=>'A',
			'Å'=>'A',
			'Æ'=>'A',
			'Ç'=>'C',
			'È'=>'E',
			'É'=>'E',
			'Ê'=>'E',
			'Ë'=>'E',
			'Ì'=>'I',
			'Í'=>'I',
			'Î'=>'I',
			'Ï'=>'I',
			'Ñ'=>'N',
			'Ò'=>'O',
			'Ó'=>'O',
			'Ô'=>'O',
			'Õ'=>'O',
			'Ö'=>'O',
			'Ø'=>'O',
			'Ù'=>'U', 
			'Ú'=>'U',
			'Û'=>'U',
			'Ü'=>'U',
			'Ý'=>'Y',
			'Þ'=>'B',
			'ß'=>'Ss',
			'à'=>'a',
			'á'=>'a',
			'â'=>'a',
			'ã'=>'a',
			'ä'=>'a',
			'å'=>'a',
			'æ'=>'a',
			'ç'=>'c',
			'è'=>'e',
			'é'=>'e',
			'ê'=>'e',
			'ë'=>'e',
			'ì'=>'i',
			'í'=>'i',
			'î'=>'i',
			'ï'=>'i',
			'ð'=>'o',
			'ñ'=>'n',
			'ò'=>'o',
			'ó'=>'o',
			'ô'=>'o',
			'õ'=>'o',
			'ö'=>'o',
			'ø'=>'o',
			'ù'=>'u',
			'ú'=>'u',
			'û'=>'u',
			'ý'=>'y',
			'þ'=>'b',
			'ÿ'=>'y'
		)

	);
	
	static function convertDateToAdobeFormat($date){
		if(strlen($date) == 10){
		$value = explode('/', $date);
		return $value[2]. '-' . $value[1] . '-' . $value[0];
		}else{
			return '';
		}
	}
	
	static function convertDateFromAdobeFormat($date){
		if(strlen($date) >= 10){
		$date =  new DateTime($date);
		$date->add(new DateInterval('PT2H'));
		return $date->format('d/m/Y');
		}else{
			return '';
		}
	}
	
	static function getValueFromSessiion($var, $dom, $attr){
		$res = '';
		foreach($_SESSION[$var] as $cle => $value){
			if($dom->getAttribute($attr) == $cle){
			return $value;
			}
		}
		return $res;
	}
	
	static function ifStringTooLong($str, $longueur = 35){
		if(strlen($str) > $longueur){
			$str = substr($str, 0, $longueur);
			$str[$longueur - 3] = $str[$longueur - 2] = $str[$longueur - 1] = '.';
		}
		return $str;
	}
	
	static function wd_remove_accents($str, $charset='utf-8')
	{
		$str = htmlentities($str, ENT_NOQUOTES, $charset);
		$str = preg_replace('#&([ecEC])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '_', $str);
		$str = preg_replace('#([ecEC])#', '_', $str);
		return $str;
	}
	
	static function sort_date($str){
		if(strlen($str) >= 10){
			return '<span style="display:none">'. str_replace('-', '', explode(' ',$str)[0]) .'</span>';
		}else{
			return "";
		}
	}
	
	
	
}

