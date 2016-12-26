/*CREATE DATABASE*/
DROP DATABASE IF EXISTS webshop;
CREATE DATABASE webshop;
USE webshop;

/* DROP TABLES */
DROP TABLE IF EXISTS Klant;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS Bestelling;
DROP TABLE IF EXISTS ProductBestelling;


CREATE TABLE if not exists Klant 
( 
	klant_ID BIGINT(8) NOT NULL AUTO_INCREMENT,
	voornaam VARCHAR(45) NOT NULL ,
	naam VARCHAR(45) NOT NULL ,
	adres VARCHAR(100) NOT NULL ,
	gemeente VARCHAR(45) NOT NULL ,
	email VARCHAR(45) NOT NULL ,
	wachtwoord VARCHAR(45) NOT NULL ,
	admin boolean default 0,
	PRIMARY KEY (klant_ID)
);

CREATE TABLE if not exists Product 
( 
	product_ID BIGINT(8) unsigned NOT NULL AUTO_INCREMENT,
	productnaam VARCHAR(45) NOT NULL,
	productbeschrijving VARCHAR(500) NOT NULL,
	merk VARCHAR(45) NOT NULL,
	soort VARCHAR(45)NOT NULL, 
	categorie VARCHAR(45)NOT NULL, 
	prijs DECIMAL(10,2) NOT NULL,
	afbeelding VARCHAR(250) NOT NULL,
	PRIMARY KEY (product_ID)
);

CREATE TABLE if not exists Bestelling
(
	bestelling_ID BIGINT(8) NOT NULL AUTO_INCREMENT,
	Klant_ID BIGINT(8) NOT NULL,
	besteldatum DATE ,
	Betaald tinyint(1) DEFAULT NULL,
	PRIMARY KEY (bestelling_ID)	
);

CREATE TABLE if not exists ProductBestelling
(
	aantal BIGINT(8),
	bestelling_ID BIGINT(8) unsigned NOT NULL ,
	product_ID BIGINT(8) unsigned NOT NULL 
);


INSERT INTO Product VALUES (1, 'LaCoca Powerback Swimsuit','De opvallende kleuren van zwemkleding deze gedrukte dames zijn ge&iuml;nspireerd door de prachtige veren van een pauw. De PowerBack stijl biedt uitstekende bewegingsvrijheid, terwijl concurrerende, zodat er niets houdt je terug in het zwembad.
Gemaakt van Speedo Endurance &reg; + stof - 100% chloorbestendig en ontworpen voor het laatst voor langer', 'Speedo', 'badpak', 'vrouw', 50.00, 'images/producten/powerback.jpg');

INSERT INTO Product VALUES (2, 'Monogram Swimsuit', 'Breng een vleugje stijl aan het zwembad met onze Monogram muscleback pak, met stijlvolle kleurstellingen en behoud van vorm dankzij de Endurance &reg;10 stof technologie. Ideaal voor fitness-sessies, de multi-directionele stretch materiaal zorgt voor een uitstekende bewegingsvrijheid, zodat u zich optimaal kunt concentreren op uw fitness doelen.
', 'Speedo', 'badpak','vrouw', 55.00, 'images/producten/Monogram.jpg');

INSERT INTO Product VALUES (3, 'Speedo Fit Kickback Swimsuit', 'Duik in je workout! Dit stijlvolle Speedo Fit Kickback dames badpak is zeer geschikt voor dagelijks zwemmen sessies en is gemaakt van onze exclusieve, super-duurzame Speedo Endurance &reg; + stof.
100% chloorbestendig en ontworpen voor het laatst voor langer.', 'Speedo', 'badpak','vrouw', 45.00, 'images/producten/Kickback.jpg');

/*heren Speedo*/

INSERT INTO Product VALUES (4, 'Speedo Fit Pinnacle Jammer', 'Vol met Speedo innovatie, is de Speedo Fit Pinnacle Jammer ontworpen om u te helpen uw lichaam positionering in het water te verbeteren voor een snellere, effici&euml;ntere zwemmen. Gemaakt van Speedo Endurance &reg; + stof - 100% chloorbestendig en ontworpen om langer mee',
'Speedo', 'jammer','man', 46.00, 'images/producten/pinnacle.jpg');

INSERT INTO Product VALUES (5, 'Endurance slip', 'Ontworpen om langer mee, Endurance &reg; + is een exclusieve Speedo weefsel dat is 100% chloor-bestendig en bestand tegen haken en vervagende 20 keer langer mee dan elke andere zwemmen weefsel. Deze beschikt ook over 4 way stretch technologie voor extra zachtheid en comfort.'
, 'Speedo', 'slip','man', 25, 'images/producten/Enduranceslip.jpg');

INSERT INTO Product VALUES (6, 'Monogram Zwemslip', 'Onze iconische Monogram zwembroeken voor mannen zijn ideaal voor fitnesstraining en beschikken over een koordje dat vooor een beter pasvorm en comfort zorgt. Gemaakt met onze super-duurzame Endurance &reg; + stof, bieden ze totale bewegingsvrijheid tijdens de training, zodat u zich kunt richten op het bereiken van uw fitness doelen.
100% chloor-bestendig.', 'Speedo', 'broek','man', 37.00, 'images/producten/monogramslip.jpg');

/*meisjes Speedo*/

INSERT INTO Product VALUES (7, 'Splashback Swimsuit', 'Breng wat plezier in de training, zwemles en race dagen met dit rippleback badpak, met een heldere print. De stof is zo gemaakt dat het erg snel droog is en erg comfortabel met veel bewegingsvrijheid, dit is dankzij de Endurance &reg; 10 technologie.
De elastische stof zorgt ervoor dat jonge zwemmers hoogtepunte kunnen bereiken in comfort.', 'Speedo', 'badpak','meisje', 30.00, 'images/producten/Splashback.jpg');

INSERT INTO Product VALUES (8, 'Fruit Party Thinstrap Swimsuit', 'Leuk, kleurrijk en leuk kind badpak  omvat dunne bandjes, rekbare stoffen en een crossover terug om je water baby om te spelen, te verkennen en te genieten van het water in totaal comfort.
Perfect voor het zwembad of op het strand en is voorzien van vormvaste Speedo Endurance &reg;10 stof.', 'Speedo', 'badpak','meisje', 25.00, 'images/producten/Fruitparty.jpg');

INSERT INTO Product VALUES (9, 'Endurance &reg;+ Medalist Swimsuit', 'Ontworpen om langer mee, Endurance&reg; + is een exclusieve Speedo weefsel dat is 100% chloor-bestendig en bestand tegen haken en vervagende 20 keer langer mee dan elke andere zwemmen weefsel. Deze beschikt ook over 4 way stretch technologie voor extra zachtheid en comfort.'
, 'Speedo', 'badpak','meisje', 26.00, 'images/producten/Medalist.jpg');

/*jongens Speedo*/

INSERT INTO Product VALUES (10, 'Endurance &reg; + Zwembroek', 'Ideaal voor training , dit is een door jonge zwemmers meeste gedragen zwembroek ,die comfort en duurzaamheid een prioriteit maakt in het zwembad. De zwembroek biedt veel bewegingsvrijheid en is ideaal voor zwemmers die liever meer dekking dan slip. De Endurance &reg; + Short is voorzien van een koord aan voor een comfortabele en veilige pasvorm. 
Gemaakt met onze super-duurzame Endurance &reg; + stof die speciaal is ontworpen om langer duren.', 'Speedo', 'zwembroek','jongen', 20.00, 'images/producten/endurancebroek.jpg');

INSERT INTO Product VALUES (11, 'Fit Splice Zwembroek', 'Slank en stijlvol design, deze duurzame jongens Zwemslip van onze Monogram assortiment is perfect voor toekomstige zwemmers en is ontwikkeld met behulp van jarenlange onderzoek. Een koord zorgt voor een veilige, zekere pasvorm, zodat jonge atleten om te zwemmen en te spelen in comfort.',
 'Speedo', 'zwembroek','jongen', 38.95, 'images/producten/Fitsplice.jpg');

INSERT INTO Product VALUES (12, 'Monogram zwemslip', 'Veel comfort en vormvastheid, zwemmen na zwemmen. Endurance &reg;10 stof tot 10 keer meer dan chloorbestendig onbeschermde elastaan, duurzaam en bestand tegen haken.'
, 'Speedo', 'slip','jongen', 20.95, 'images/producten/monogram-slip.jpg');

/*vrouwen Nabaiji*/

INSERT INTO Product VALUES (13, ' Aquafitness Dary Flow ', 'Tonic aquagym heeft veel weg van fitness in het water. In het assortiment aquafitness van Nabaiji vind je een hele reeks badpakken die je lichaam goed ondersteunen. De gebruikte stof is chloorbestendig, zodat je onbezorgd en zo vaak als je wilt kunt aquagymmen.'
, 'Nabaiji', 'badpak', 'vrouw', 10.00, 'images/producten/Daryflow.jpg');

INSERT INTO Product VALUES (14, 'Badpak Kamiye ', ' Speciaal voor regelmatige zwemsters ontwikkelde Nabaiji een collectie badpakken die uitstekend bestand zijn tegen chloor en daarnaast alle nodige bewegingsvrijheid bieden. Dit is alledaagse badpak voor jong en oud.'
, 'Nabaiji', 'badpak', 'vrouw', 20.95, 'images/producten/Kamiye.jpg');

INSERT INTO Product VALUES (15, 'Damesbadpak Debo Baro', 'Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt voor elk figuurtype.
een badpak om te zwemmen moet vooral comfortabel zitten zodat je gemakkelijk en ongehinderd kunt bewegen. De O-vormige rug is perfect om mee te zwemmen. Hij biedt voldoende bewegingsvrijheid,de stof bestaat voor 80% uit polymide en 20% elastaan'
,'Nabaiji', 'badpak','vrouw', 15.95, 'images/producten/Debo.jpg');

/*heren Nabaiji*/

INSERT INTO Product VALUES (16, 'Zwemslip B-simple', 'Deze zwemslip heeft een klassiek en tijdloos model dat veel bewegingsvrijheid biedt en altijd goed blijft zitten. De stof zorgt ervoor dat het erg comfortabel zit en dankzij de elastisch stof past het zich aan je lichaam.'
, 'Nabaiji', 'slip','man', 5.00, 'images/producten/B-simple.jpg');

INSERT INTO Product VALUES (17, 'Jammer b-first zwart/allfrek', 'Je moet je er bovendien vrij in kunnen bewegen. De jammer biedt een zeer goede ondersteuning aan de quadriceps en bilspieren, voor een perfecte pasvorm. Ideaal voor de beginnende competitie zwemmer'
, 'Nabaiji', 'jammer','man', 24.50, 'images/producten/B-first.jpg');

INSERT INTO Product VALUES (18, 'zwembroek b-fit adi zwart/geel', 'Een zwembroek moet in de eerste plaats comfortabel zijn. Je moet gemakkelijk alle bewegingen kunnen uitvoeren. Een boxermodel is ideaal voor zwemmers die een model willen dat meer bedekt dan een slip. De zwembroek is gemaakt van 100% polyester wat ervoor zorgt dat de zwembroek goed bestand is tegen chloor',
 'Nabaiji', 'zwembroek','man', 20.95, 'images/producten/B-fit.jpg');

INSERT INTO Product VALUES (19, 'zwemslip b-strong all lini groen ', 'Een zwembroek moet in de eerste plaats comfortabel zijn. Je moet er vrij in kunnen bewegen. Zwemslips beschikt over een brede elastische band: een modieuze snit met een uitstekende bewegingsvrijheid. De zwembroek is bestemd voor regelmatig gebruik. Artikelen met het Aquaresist-label zijn hun volledige levensduur chloorbestendig. Ze behouden hun elasticiteit en zijn bestand tegen uv-straling. Daarom worden ze aanbevolen voor wie geregeld of vaak in een zwembad zwemt.'
, 'Nabaiji', 'slip','man', 15.00, 'images/producten/B-strong.jpg');

/*meisjes Nabaiji*/

INSERT INTO Product VALUES (20, 'meisjesbadpak debo light nib paars', 'Dit is badpak voor occasionele zwemmers/zwemsters van alle niveaus. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt zijn voor elk figuurtype.'
, 'Nabaiji', 'badpak','meisje', 10.00, 'images/producten/debolight.jpg');

INSERT INTO Product VALUES (21, 'bikini debo light blauw/paars', 'Dit is ideaal voor de beginnende zwemmertjes onder ons.Dit is badpak voor occasionele zwemmers/zwemsters van alle niveaus. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken, om te kunnen zwemmen met een product dat speciaal daarvoor gemaakt is en tegelijk geschikt is voor elke lichaamsbouw.
 De O-vormige rug is perfect om mee te zwemmen en biedt voldoende bewegingsvrijheid.', 'Nabaiji', 'bikini','meisje', 11.95, 'images/producten/bikinidebo.jpg');

INSERT INTO Product VALUES (22, 'meisjesbadpak neole blauw/roze ', 'Dit is een erg populair badpack bij de kinderen.Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt zijn voor elk figuurtype.'
, 'Nabaiji', 'badpak','meisje', 15.00, 'images/producten/neole.jpg');

INSERT INTO Product VALUES (23, 'bikini Riana Allnava roze', 'Dit is een bikini voor de kleinsten onder ons. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt voor elk figuurtype.
 ideaal voor watergewenning.', 'Nabaiji', 'bikini','meisje', 12.00, 'images/producten/allnava.jpg');

/*jongens Nabaiji*/

INSERT INTO Product VALUES (24, 'Zwemboxer b-active yoke zwart/blauw', 'Dit is een sportieve zwembroek voor jongens. Zwemkleding moet in de eerste plaats comfortabel zijn. Je moet er vrij in kunnen bewegen. Het is daarom heel belangrijk om de juiste zwembroek te kiezen.
Een boxer is ideaal voor zwemmers die een model willen dat meer bedekt dan een slip. Heel comfortabel en zacht, en met uitstekende elastische eigenschappen.'
, 'Nabaiji', 'zwembroek','jongen', 10.50, 'images/producten/B-active.jpg');

INSERT INTO Product VALUES (25, 'zwemboxer b-active allsquig geel', 'Boys boxer-stijl zwembroek met een trendy patroon! Zeer comfortabel en zacht met uitstekende stretch eigenschappen. Badmode voor occasioneel gebruik.'
, 'Nabaiji', 'zwembroek','jongen', 11.00, 'images/producten/B-active-geel.jpg');

INSERT INTO Product VALUES (26, 'Zwemslip B-sporty yoke zwart ', 'Zwemslip voor regelmatig gebruik. De zwembroek is gemaakt van 100%  polyester, dit zorgt ervoor dat het zer gsnel droog en goed chloorbestendigheid is'
, 'Nabaiji', 'slip','jongen',8.50, 'images/producten/B-sporty.jpg');

INSERT INTO Product VALUES (27, ' Zwembroek B-active pep buxx zwart/geel', 'Deze zwembroek is erg comfortabel en beschikt over uitstekende elastische eigenschappen.
Zwemkledij die je vaak gebruikt in een zwembad wordt aangetast door het chloor. Als je maar af en toe zwemt, vormt dit geen probleem. Anders kies je beter voor een stof in 100% polyester. De zwemslip is bedoeld voor occasioneel gebruik.'
, 'Nabaiji', 'zwembroek','jongen', 8.95, 'images/producten/B-active-pep.jpg');


INSERT INTO Product VALUES (28, 'Bamboo Beach bikini', 'Met zijn super-leuke kat ontwerp en mooie franje dit detaillering bikini/badpak is perfect voor kleine waterratten. Comfortabel, elastische stof kan uw kleintje om rond te spetteren, spelen en te verkennen in comfort.
Perfect voor het zwembad of op het strand en is voorzien van vormvaste Speedo Endurance &reg;10 stof.', 'Speedo', 'bikini','meisje', 25.00, 'images/producten/bamboo.jpg');

INSERT INTO Product VALUES (29, 'Adidas Color Block Badpak', 'Glijd door het water in dit meisjesbadbak. Het middelhoog uitgesneden badpak met racerbackmodel biedt comfortabele bedekking tijdens serieuze baantjes-trek-sessies. Chloorbestendig INFINITEX&reg; performance-materiaal behoudt zijn vorm en elasticiteit. Stof: Tricot, 80% gerecycled nylon / 20% spandex',
 'Adidas', 'badpak','meisje', 28.95, 'images/producten/colorblock.jpg');

INSERT INTO Product VALUES (30, '3-Stripes Badpak', 'Tik als snelste aan in dit junior trainingsbadpak voor meiden. Het heeft een middelhoge beenopening en gekruiste bandjes voor comfort en is gemaakt van chloorbestendige INFINITEX &reg;-stof die je badpak langdurig beschermt.Perfect voor alle trainingsniveaus
Stof: Tricot, 73% nylon / 27% elasthaan', 'Adidas', 'badpak','meisje', 30.00, 'images/producten/badpak-3-stripes.jpg');
	
INSERT INTO Product VALUES (31, '3-Stripes Boxershort', 'Concentreer je op de voortstuwende kracht in deze junior zwemboxer voor jongens. Ontworpen om in te trainen, met platte naden voor een comfortabele pasvorm. INFINITEX&trade;-stof is bestand tegen de schadelijke effecten van chloor zodat de boxer goed blijft passen en er als nieuw uit blijft zien.Stof:Tricot, 80% nylon / 20% elasthaan ',
 'Adidas', 'zwembroek','jongen', 22.50, 'images/producten/3-stripes-boxershort.jpg');

 INSERT INTO Product VALUES (32, '3-Stripes Zwemslip', 'Deze junior zwembroek voor jongens is gemaakt voor snelheid en comfort in het water. Gemaakt met chloorbestendig INFINITEX&reg;-materiaal zodat hij langer meegaat. 3-Stripes aan de zijkant maak de look helemaal af. De zwemslip is gemaakt met een stof  (tricot) dat bestaat uit nylon (80%)en elasthaan (20%).',
 'Adidas', 'slip','jongen', 20.00, 'images/producten/3-stripes-zwemslip.jpg');

 INSERT INTO Product VALUES (33, 'Leisure Swim Shorts', 'Dit is een tijdloze zwemshort voor de jeugd. Geschikt voor het strand en het zwembad, watershorts onze comfortabele jongens zijn veelzijdig en duurzaam',
 'Speedo', 'short','jongen', 22.50, 'images/producten/Leisureshort.jpg');
 
 INSERT INTO Product VALUES (34, 'Beach Wire Bikini', 'Deze sportieve en vrouwelijke bikini heeft ondersteunende beugels in het topje. Een grafische print en een effen kleurmix voor een opvallende look. Het broekje heeft een geplooide afwerking en de bandjes van de top zijn verstelbaar voor een perfecte pasvorm.',
 'Adidas', 'bikini','vrouw', 55.00, 'images/producten/Beachwire.jpg');
 
 INSERT INTO Product VALUES (35, '3-Stripes Bikini', 'Duik in je zwemtraining in een bikini die hetzelfde comfort en dezelfde functionaliteit en stijl heeft als de kleding die je naar de sportschool draagt. Beide onderdelen zijn gemaakt van zachte, chloorbestendige INFINITEX&reg;-stof met opgestikte 3-Stripes op de zijkanten. '
 , 'Adidas', 'bikini','vrouw', 45.50, 'images/producten/3-Stripes.jpg');
 
 INSERT INTO Product VALUES (36, 'Infinitex+ Graphic Badpak', 'Baan je razendsnel door je training in dit damesbadpak. Het badpak is gemaakt van duurzaam INFINITEX&reg;+ materiaal, is chloorbestendig om zijn stretch te behouden en blijft zacht, zelfs als het nat wordt. Met een medium uitgesneden hals en een L-rug voor optimale bewegingsvrijheid.',
 'Adidas', 'badpak','vrouw', 50.00, 'images/producten/Graphic.jpg');

 INSERT INTO Product VALUES (37, 'Dolly - Thunderbolt', 'Modern bikini voor de jeugd. Dit is een erg gegeerde bikini voor de zomer.',
 'Triangl', 'bikini','vrouw', 75.00, 'images/producten/Dolly.jpg');
 
 INSERT INTO Product VALUES (38, 'Delilah - Fiore Nero', 'Dit is een tijdloze bikini dat zowel door de jeugd als volwassen gedragen wordt. Dit is een bikini dat ontworpen is voor een betaalbare bikini voor iedereen ',
 'Triangl', 'bikini','vrouw', 75.00, 'images/producten/Delilah.jpg');
 
 INSERT INTO Product VALUES (39, 'Poppy - Summer Sorbet', 'Dit is  een Modern bikini voor de jeugd. Dit is een erg gegeerde bikini voor de zomer. 
Dit is een gestructeerd neoprene bikini in Cobalt blauw. de bikini heeft een balconnet stijl top, deze heeft voorgevormde cups wat ervoor zorgt dat alles goed ondersteund word.
De schouderbanden kunnen worden aangepast worden aan de lichaamsbouw van de drager.',
'Triangl', 'bikini	','vrouw', 82.95, 'images/producten/Poppy.jpeg');
 
 INSERT INTO Product VALUES (40, 'Farrah - Dancing In The Wind', ' De Farrah is een recente bikini van Triangl. Triangl heeft ervoor gekozen om de Farrah te maken in de traditionele BH-style. Dit wil zeggen dat je het bikini bovenstuk gedragen wordt en geopend en gesloten kan worden zoals een bh. 
 De schouderbanden van de bikini kunnen worden aangepast worden aan de lichaamsbouw van de drager.',
'Triangl', 'bikini','vrouw', 85.00, 'images/producten/Farrah.jpg');
 
 INSERT INTO Product VALUES (41, 'Lily - Aqua Punch', 'Dit is  een Modern bikini voor de jeugd en volwassen. Dit is een erg gegeerde bikini voor de zomer. 
 Het is strapless bikini dit wil zeggen dat je niet meer moet knoeien met hoe de de bikini moet vastmaken of geen last meer hebt van de koortjes van je bikini',
 'Triangl', 'bikini','vrouw', 85.00, 'images/producten/Lily.jpg');
 
 INSERT INTO Product VALUES (42, 'Marinestripe Triangle Bikini', 'Leuk, kleurrijk en speciaal voor de allerjongsten ontworpen! De Speedo Congobongo Essential Allover Aquashorts is de perfecte zwemuitrusting voor de jonge rakkers voor een plons in het zwembad of pootje baden op het strand.
Deze bikini is leuk gekleurd met een frisse stijl voor de jonge waterratten. Gemaakt uit Speedo"s Endurance 10 badstof, een superieur materiaal vergeleken met de klassiek gebruikte stretchstoffen voor zwempakken.',
 'Speedo', 'bikini','vrouw', 60.00, 'images/producten/Marinestripe.jpg');
 
 /*INSERT INTO Klant (klant_ID, voornaam, naam, adres, gemeente,email,wachtwoord,admin);*/

insert into Klant VALUES (1 ,'Jeroen', 'V', 'Jan Pieter de Nayerlaan 5', 'Sint-Katelijne-Waver', 'r0631103@student.thomasmore.be','63a9f0ea7bb98050796b649e85481845', TRUE);
insert into Klant VALUES (2 ,'Jef','Pet','kerkstraat 67', 'Kontich', 'Maecenas@gmail.com','c386950aa5131b703f031267f77e1075',FALSE);
insert into Klant VALUES (3 ,'Cathleen','Burton', 'Lelliestraat 15', 'Hasselt', 'Cat@telenet.be','c454552d52d55d3ef56408742887362b',FALSE);
insert into Klant VALUES (4 ,'Jael', 'Bradley', 'Melaan4', 'Mechelen', 'Jael.Bradley@hotmail.com', '098f6bcd4621d373cade4e832627b4f6', FALSE);

#Bestelling (bestelling_ID, Klant_ID, besteldatum, Betaald, )

INSERT INTO Bestelling VALUES (' ' , '1', '12-12-2016', '1');
INSERT INTO Bestelling VALUES (' ' , '1', '12-12-2016', '1');

#ProductBestelling (aantal,bestelling_ID, Product_product_ID)
INSERT INTO ProductBestelling VALUES(2 ,1 ,1 );
INSERT INTO ProductBestelling VALUES (2, 2,2 );