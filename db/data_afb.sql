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
Gemaakt van Speedo Endurance&reg; + stof - 100% chloorbestendig en ontworpen voor het laatst voor langer', 'speedo', 'badpak', 'vrouw', 50.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dwc6769510/images/original/8-06187B051.jpg?sw=370');

INSERT INTO Product VALUES (2, 'Monogram Swimsuit', 'Breng een vleugje stijl aan het zwembad met onze Monogram muscleback pak, met stijlvolle kleurstellingen en vorm - met behoud van Endurance&reg;l0 stof technologie. 
Ideaal voor fitness-sessies, van de multi - directionele stretch materiaal zorgt voor een uitstekende bewegingsvrijheid, zodat u zich kunt concentreren op uw fitness doelen.
Samenstelling: 80% PA / 20% Xtra Life EA', 'speedo', 'badpak','vrouw', 55.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dw28419cad/images/original/8-09247A571.jpg?sw=370');

INSERT INTO Product VALUES (3, 'Speedo Fit Kickback Swimsuit', 'Duik in je workout! Dit stijlvolle Speedo Fit Kickback dames badpak is zeer geschikt voor dagelijks zwemmen sessies en is gemaakt van onze exclusieve, super-duurzame Speedo Endurance&reg; + stof.
100% chloorbestendig en ontworpen voor het laatst voor langer.', 'speedo', 'badpak','vrouw', 45.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dw27f93902/images/original/8-10367B013.jpg?sw=370');

/*heren speedo*/

INSERT INTO Product VALUES (4, 'Speedo Fit Pinnacle Jammer', 'Vol met Speedo innovatie, is de Speedo Fit Pinnacle Jammer ontworpen om u te helpen uw lichaam positionering in het water te verbeteren voor een snellere, effici&euml;ntere zwemmen. 
Gemaakt van Speedo Endurance&reg;+ stof - 100% chloorbestendig en ontworpen om langer mee','speedo', 'jammer','man', 46.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dwb7f48679/images/original/8-10370B024.jpg?sw=370');

INSERT INTO Product VALUES (5, 'Endurance slip', 'Ontworpen om langer mee, Endurance&reg;+ is een exclusieve Speedo weefsel dat is 100% chloor-bestendig en bestand tegen haken en vervagende 20 keer langer mee dan elke andere zwemmen weefsel. Deze beschikt ook over 4 way stretch technologie voor extra zachtheid en comfort.'
, 'speedo', 'slip','man', 25, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dwdaf20e43/images/original/8-083546446-cutout.jpg?sw=370');

INSERT INTO Product VALUES (6, 'Monogram Zwemslip', 'Een deel van onze iconische Monogram assortiment, onze mannen aquashorts zijn ideaal voor fitnesstraining en beschikken over een koord aan voor meer comfort en pasvorm. Gemaakt van onze super-duurzame Endurance&reg; + stof, bieden ze volledige bewegingsvrijheid tijdens de training, zodat u zich kunt richten op het bereiken van uw fitness doelen.
100% chloor-bestendig, onze mannen Monogram aquashorts zijn ideaal voor een regelmatige fitnesstraining.', 'speedo', 'slip','man', 37.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dw08698690/images/original/8-087423503-cutout.jpg?sw=370');

/*meisjes speedo*/

INSERT INTO Product VALUES (7, 'Splashback Swimsuit', 'Injecteer wat plezier in de training, zwemles en race dagen met rippleback badpak, met een heldere, print. De stof is zo gemaakt dat het erg snel droog is en erg comfortabel met veel bewegingsvrijheid, het bevat onze exclusieve vorm - met behoud van Endurance&reg;10 technologie.
Zacht aan te raken met elastische stof zodat jonge zwemmers kunnen bereiken, bewegen en strek in comfort.', 'speedo', 'badpak','meisje', 30.00, 'https://cdn.kleding.nl/L339596515/meisjes-badpakken-speedo-girls-monogram-allover-splashback-swimsuit.jpg');

INSERT INTO Product VALUES (8, 'Fruit Party Thinstrap Swimsuit', 'Leuk, kleurrijk en leuk kind badpak  omvat dunne bandjes, rekbare stoffen en een crossover terug om je water baby om te spelen, te verkennen en te genieten van het water in totaal comfort.
Perfect voor het zwembad of op het strand en is voorzien van vormvaste Speedo Endurance&reg;10 stof.', 'speedo', 'badpak','meisje', 25.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dw6eceb119/images/original/8-07969B047.jpg?sw=370');

INSERT INTO Product VALUES (9, 'Endurance &reg;+ Medalist Swimsuit', 'Ontworpen om langer mee, Endurance&reg; + is een exclusieve Speedo weefsel dat is 100% chloor-bestendig en bestand tegen haken en vervagende 20 keer langer mee dan elke andere zwemmen weefsel. Deze beschikt ook over 4 way stretch technologie voor extra zachtheid en comfort.'
, 'speedo', 'badpak','meisje', 26.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dw73093ec3/images/original/8-007280001-cutout.jpg?sw=370');

/*jongens speedo*/

INSERT INTO Product VALUES (10, 'Endurance &reg; + Zwembroek', 'Ideaal voor training en regelmatige slijtage, zal graag jonge zwemmers genieten van deze sneldrogende aquashorts met exclusieve stoffen die comfort en duurzaamheid een prioriteit te maken in het zwembad. De Zwemslip stijl biedt veel bewegingsvrijheid en is ideaal voor zwemmers die liever meer dekking dan slip.
Met een eenvoudige vormgeving, de Endurance&reg;+ Short is voorzien van een koord aan voor een comfortabele en veilige pasvorm. 
Gemaakt met onze super-duurzame Endurance &reg; + stof die speciaal is ontworpen om langer mee te gaan dan andere zwembroeken',
 'speedo', 'zwembroek','jongen', 20.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dwfbe86b9c/images/original/8-093167780-cutout.jpg?sw=370');

INSERT INTO Product VALUES (11, 'Fit Splice Zwembroek', 'Slank en stijlvol design, deze duurzame jongens Zwemslip van onze Monogram assortiment is perfect voor toekomstige zwemmers en is ontwikkeld met behulp van jarenlange onderzoek. Een koord zorgt voor een veilige, zekere pasvorm, zodat jonge atleten om te zwemmen en te spelen in comfort.',
'speedo', 'zwembroek','jongen', 38.95, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dwa5679704/images/original/8-10377A586.jpg?sw=370');

INSERT INTO Product VALUES (12, 'Monogram zwemslip', 'goede comfort en vormvastheid. Endurance &reg;10 stof is tot 10 keer meer dan chloorbestendig dan stof van onze concurrenten, duurzaam en bestand tegen chloor en UV.'
, 'speedo', 'slip','jongen', 20.95, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dwb0db8854/images/original/8-087503503-cutout.jpg?sw=370');


/*vrouwen nabaiji*/

INSERT INTO Product VALUES (13, ' Aquafitness Dary Flow ', 'Tonic aquagym heeft veel weg van fitness in het water. Doel van de oefeningen is om je spieren, hart en longen te versterken. De meest populaire discipline is ongetwijfeld aquabiking. In het assortiment aquafitness van Nabaiji vind je een hele reeks badpakken die je boezem goed ondersteunen. De gebruikte stof is chloorbestendig, zodat je onbezorgd en zo vaak als je wilt kunt aquagymmen.'
, 'nabaiji', 'badpak', 'vrouw', 10.00, 'https://www.decathlon.nl/media/834/8347609/big_22e90b7c275540dc98898e7f54035d46.jpg');

INSERT INTO Product VALUES (14, 'Badpak Kamiye ', 'Indeaal vor de regelmatige zwemmers/zwemsters.  Speciaal voor regelmatige zwemsters ontwikkelde Nabaiji een collectie badpakken die uitstekend bestand zijn tegen chloor en daarnaast alle nodige bewegingsvrijheid bieden. Dit is alledaagse badpak voor jong en oud.
', 'nabaiji', 'badpak', 'vrouw', 20.95, 'https://www.decathlon.nl/media/837/8371398/big_9ed817cf958448958d6b542094a37c00.jpg');

INSERT INTO Product VALUES (15, 'Damesbadpak Debo Baro', 'Occasioneel zwemmen: occasionele zwemsters van alle niveaus, die minder dan een keer per week zwemmen. Ze zijn vooral op zoek naar een fysieke activiteit die ze in het water kunnen beoefenen, om fit en gezond te blijven. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt voor elk figuurtype.
O-vormige rug: een badpak om te zwemmen moet vooral comfortabel zitten zodat je gemakkelijk en ongehinderd kunt bewegen. Daarom is het belangrijk dat je bij de keuze van je badpak goed let op de rugvorm. De O-vormige rug is perfect om mee te zwemmen. Hij biedt voldoende bewegingsvrijheid, dankzij de bandjes die op de rug naar opzij lopen zodat de schouders vrij zijn. De stof bestaat voor 80% uit polymide en 20% elastaan'
,'nabaiji', 'badpak','vrouw', 15.95, 'https://www.nabaiji.co.uk/sites/nabaiji/files/styles/460x460/public/media/images/debo_bari_womens_one-piece_swimsuit_-_black_nabaiji_8330815_966076.jpg?itok=WioGtdMz');

/*heren nabaiji*/

INSERT INTO Product VALUES (16, 'Zwemslip B-simple', 'Een zwembroek moet in de eerste plaats comfortabel zijn. Je moet makkelijk elke beweging kunnen uitvoeren. Het is daarom heel belangrijk om de juiste zwemkledij te kiezen.
Een zwemslip heeft een klassiek en tijdloos model dat veel bewegingsvrijheid biedt en altijd goed blijft zitten. De stof zorgt ervoor dat het erg comfortabel zit en dankzij de elastisch stof past het zich aan je lichaam.'
, 'nabaiji', 'slip','man', 5.00, 'https://www.decathlon.nl/media/821/8215793/big_1016f805d51140639da0398a7069ccd1.jpg');

INSERT INTO Product VALUES (17, 'Jammer b-first zwart/allfrek', 'Zwemkledij moet in de eerste plaats comfortabel zijn. Je moet je er bovendien vrij in kunnen bewegen. Het is daarom heel belangrijk om de juiste zwembroek te kiezen.
De jammer biedt een zeer goede ondersteuning aan de quadriceps en bilspieren, voor een perfecte pasvorm. De zwembroek is gemaakt van 100% polyester wat ervoor zorgt dat de zwembroek een uitstekende chloorbestendigheid heeft.'
, 'nabaiji', 'jammer','man', 24.50, 'https://www.decathlon.nl/media/836/8361312/big_0d23688f-c867-4af0-9cc2-8470cfdcb28d.jpg');

INSERT INTO Product VALUES (18, 'zwembroek b-fit adi zwart/geel', 'Een zwembroek moet in de eerste plaats comfortabel zijn. Je moet gemakkelijk alle bewegingen kunnen uitvoeren. Het is daarom heel belangrijk om de juiste zwemkledij te kiezen.
Een boxermodel is ideaal voor zwemmers die een model willen dat meer bedekt dan een slip. De zwembroek is gemaakt van 100% polyester wat ervoor zorgt dat de zwembroek goed bestand is tegen chloor', 'nabaiji'
, 'zwembroek','man', 20.95, 'https://www.decathlon.nl/media/836/8361330/big_bc1443652ff74671b753a36991b8634d.jpg');

INSERT INTO Product VALUES (19, 'zwemslip b-strong all lini groen ', 'Een zwembroek moet in de eerste plaats comfortabel zijn. Je moet er vrij in kunnen bewegen. Daarom is het heel belangrijk dat je de juiste zwembroek kiest.
Zwemslips met een brede elastische band: een modieuze snit met een uitstekende bewegingsvrijheid. De zwembroek is bestemd voor regelmatig gebruik.Artikelen met het Aquaresist-label zijn hun volledige levensduur chloorbestendig. Ze behouden hun elasticiteit en zijn bestand tegen uv-straling. Daarom worden ze aanbevolen voor wie geregeld of vaak in een zwembad zwemt.'
, 'nabaiji', 'slip','man', 15.00, 'https://nl.decathlon.be/media/837/8370898/big_e67994b7-672d-44e7-8d1b-a5a77ac58228.jpg');

/*meisjes nabaiji*/

INSERT INTO Product VALUES (20, 'meisjesbadpak debo light nib paars', 'JE MANIER VAN BEOEFENEN
Occasioneel zwemmen: occasionele zwemsters van alle niveaus, die minder dan een keer per week zwemmen. Ze zijn vooral op zoek naar een fysieke activiteit die ze in het water kunnen beoefenen, om fit en gezond te blijven. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt zijn voor elk figuurtype.'
, 'nabaiji', 'badpak','meisje', 10.00, 'https://www.decathlon.nl/media/833/8330710/big_a047571d56b1465cb06607791e0934db.jpg');

INSERT INTO Product VALUES (21, 'bikini debo light blauw/paars', 'Occasioneel zwemmen: occasionele zwemsters van alle niveaus, die minder dan een keer per week zwemmen. Ze zijn vooral op zoek naar een fysieke activiteit die ze in het water kunnen beoefenen, om fit en gezond te blijven. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken, om te kunnen zwemmen met een product dat speciaal daarvoor gemaakt is en tegelijk geschikt is voor elke lichaamsbouw.
 MODEL
O-vormige rug: een zwembadpak moet vooral comfort bieden, zodat je gemakkelijk en ongehinderd kunt bewegen, zonder je te blesseren. Daarom is het enorm belangrijk dat je bij de keuze van je badpak goed let op de rugvorm. De O-vormige rug is perfect om mee te zwemmen. Hij biedt voldoende bewegingsvrijheid, dankzij de bandjes die over de zij lopen en de schouders vrij laten.',
 'nabaiji', 'bikini','meisje', 11.95, 'https://www.decathlon.nl/media/833/8330731/big_882a17b96e6e4b9fad3bfe2541f5912d.jpg');

INSERT INTO Product VALUES (22, 'meisjesbadpak neole blauw/roze ', 'JE MANIER VAN BEOEFENEN
Occasioneel zwemmen: occasionele zwemsters van alle niveaus, die minder dan een keer per week zwemmen. Ze zijn vooral op zoek naar een fysieke activiteit die ze in het water kunnen beoefenen, om fit en gezond te blijven. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt zijn voor elk figuurtype.
MODEL \n O-vormige rug: een zwembadpak moet in de eerste plaats comfortabel zitten, zodat je gemakkelijk en ongehinderd kunt bewegen. Daarom is het belangrijk dat je bij de keuze van je badpak goed let op de rugvorm. De O-vormige rug is perfect om mee te zwemmen. Hij biedt voldoende bewegingsvrijheid, dankzij de bandjes die op de rug naar opzij lopen zodat de schouders vrij zijn.'
, 'nabaiji', 'badpak','meisje', 15.00, 'https://www.decathlon.nl/media/836/8360698/big_f45c0c25af8d4bdd9db98872303aea1e.jpg');

INSERT INTO Product VALUES (23, 'bikini Riana Allnava roze', 'Occasioneel zwemmen: occasionele zwemsters van alle niveaus, die minder dan een keer per week zwemmen. Ze zijn vooral op zoek naar een fysieke activiteit die ze in het water kunnen beoefenen, om fit en gezond te blijven. Speciaal voor hen ontwikkelde Nabaiji een ruim assortiment badpakken die speciaal ontworpen zijn voor zwemmen en tegelijk geschikt voor elk figuurtype.
\n MODEL \n Gekruiste rug: een badpak om te zwemmen moet vooral comfortabel zitten zodat je gemakkelijk en ongehinderd kunt bewegen. Daarom is het belangrijk dat je bij de keuze van je badpak goed let op de rugvorm. Modellen met gekruiste bandjes op de rug bieden een goede bewegingsvrijheid. En omdat de bandjes niet aan elkaar vastzitten, zijn deze modellen geschikt voor elk figuurtype.'
, 'nabaiji', 'bikini','meisje', 12.00, 'https://www.decathlon.nl/media/834/8347593/big_aae867332a8043228960d3dfe18f0d93.jpg');

/*jongens nabaiji*/

INSERT INTO Product VALUES (24, 'Zwemboxer b-active yoke zwart/blauw', 'Zwemkleding moet in de eerste plaats comfortabel zijn. Je moet er vrij in kunnen bewegen. Het is daarom heel belangrijk om de juiste zwembroek te kiezen.
Een boxer is ideaal voor zwemmers die een model willen dat meer bedekt dan een slip. Heel comfortabel en zacht, en met uitstekende elastische eigenschappen.'
, 'nabaiji', 'zwembroek','jongen', 10.50, 'https://www.decathlon.nl/media/836/8361053/big_42f310718668452c91c43e1f6c1a00d1.jpg');

INSERT INTO Product VALUES (25, 'zwemboxer b-active allsquig geel', 'Boys boxer-stijl zwembroek met een trendy patroon! Zeer comfortabel en zacht met uitstekende stretch eigenschappen. Badmode voor occasioneel gebruik.'
, 'nabaiji', 'zwembroek','jongen', 11.00, 'https://www.decathlon.nl/media/836/8361075/big_07e3cc8f19ee4a4ebaac4aa0906f4909.jpg');

INSERT INTO Product VALUES (26, 'Zwemslip B-sporty yoke zwart ', 'Zwemslip voor regelmatig gebruik. DE zwembroek i sgebvruikt van 100%  polyester, dit zorgt ervoor dat het zer gsnel droog en goed chloorbestendigheid is'
, 'nabaiji', 'slip','jongen',8.50, 'https://www.decathlon.nl/media/836/8361083/big_f4ccdb709262438eb9e45198cc5c3dd5.jpg');

INSERT INTO Product VALUES (27, ' Zwembroek B-active pep buxx zwart/geel', 'Heel comfortabel en zacht, en met uitstekende elastische eigenschappen.
Zwemkledij die je vaak gebruikt in een zwembad wordt aangetast door het chloor. Zo is het elastaan dat de stof elastisch en comfortabel maakt, heel gevoelig voor chloor.
Als je maar af en toe zwemt, vormt dit geen probleem. Anders kies je beter voor een stof in 100% polyester. Zwemslip bedoeld voor occasioneel gebruik.'
, 'nabaiji', 'zwembroek','jongen', 8.95, 'https://www.decathlon.nl/media/836/8361068/big_21acc9bab09748909df09ccc6affc58b.jpg');


INSERT INTO Product VALUES (28, 'Bamboo Beach bikini', 'Met zijn super-leuke kat ontwerp en mooie franje dit detaillering bikini/badpak is perfect voor kleine waterratten. Comfortabel, elastische stof kan uw kleintje om rond te spetteren, spelen en te verkennen in comfort.
Perfect voor het zwembad of op het strand en is voorzien van vormvaste Speedo Endurance®10 stof.', 'speedo', 'bikini','meisje', 25.00, 'http://demandware.edgesuite.net/sits_pod14/dw/image/v2/AARQ_PRD/on/demandware.static/-/Sites-PRODUCT-SPEEDO/default/dwc7b080b1/images/original/8-07971A995.jpg?sw=370');

INSERT INTO Product VALUES (29, 'Adidas Color Block Badpak', 'Glijd door het water in dit meisjesbadbak. Het middelhoog uitgesneden badpak met racerbackmodel biedt comfortabele bedekking tijdens serieuze baantjes-trek-sessies. Chloorbestendig INFINITEX® performance-materiaal behoudt zijn vorm en elasticiteit. Stof: Tricot, 80% gerecycled nylon / 20% spandex',
 'Adidas', 'badpak','meisje', 28.95, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dw4827e87d/zoom/AY6836_01_laydown.jpg?sw=500&sfrm=jpg');

INSERT INTO Product VALUES (30, '3-Stripes Badpak', 'Tik als snelste aan in dit junior trainingsbadpak voor meiden. Het heeft een middelhoge beenopening en gekruiste bandjes voor comfort en is gemaakt van chloorbestendige INFINITEX®-stof die je badpak langdurig beschermt.Perfect voor alle trainingsniveaus
Stof: Tricot, 73% nylon / 27% elasthaan', 'adidas', 'badpak','meisje', 30.00, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dw1e8a5a33/zoom/S22902_01_laydown.jpg?sw=500&sfrm=jpg');
	
INSERT INTO Product VALUES (31, '3-Stripes Boxershort', 'Concentreer je op de voortstuwende kracht in deze junior zwemboxer voor jongens. Ontworpen om in te trainen, met platte naden voor een comfortabele pasvorm. INFINITEX™-stof is bestand tegen de schadelijke effecten van chloor zodat de boxer goed blijft passen en er als nieuw uit blijft zien.Stof:Tricot, 80% nylon / 20% elasthaan ',
 'adidas', 'zwembroek','jongen', 22.50, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dw5e70a4f5/zoom/S22943_01_laydown.jpg?sw=500&sfrm=jpg');

 INSERT INTO Product VALUES (32, '3-Stripes Zwemshort', 'Deze junior zwembroek voor jongens is gemaakt voor snelheid en comfort in het water. Gemaakt met chloorbestendig INFINITEX®-materiaal zodat hij langer meegaat. 3-Stripes aan de zijkant maak de look helemaal af. De zwemslip is gemaakt met een stof  (tricot) dat bestaat uit nylon (80%)en elasthaan (20%).',
 'adidas', 'slip','jongen', 20.00, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dw466af8bb/zoom/S22925_01_laydown.jpg?sw=500&sfrm=jpg');

 INSERT INTO Product VALUES (33, '3-Stripes Boxershort', 'Concentreer je op de voortstuwende kracht in deze junior zwemboxer voor jongens. Ontworpen om in te trainen, met platte naden voor een comfortabele pasvorm. INFINITEX™-stof is bestand tegen de schadelijke effecten van chloor zodat de boxer goed blijft passen en er als nieuw uit blijft zien.Stof:Tricot, 80% nylon / 20% elasthaan ',
 'adidas', 'zwembroek','jongen', 22.50, '');
 
 INSERT INTO Product VALUES (34, 'Beach Wire Bikini', 'Deze sportieve en vrouwelijke bikini heeft ondersteunende beugels in het topje. Een grafische print en een effen kleurmix voor een opvallende look. Het broekje heeft een geplooide afwerking en de bandjes van de top zijn verstelbaar voor een perfecte pasvorm.',
 'adidas', 'bikini','vrouw', 55.00, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dw94a96522/zoom/AY1541_21_model.jpg?sw=2000&sfrm=jpg');
 
 INSERT INTO Product VALUES (35, '3-Stripes Bikini', 'Duik in je zwemtraining in een bikini die hetzelfde comfort en dezelfde functionaliteit en stijl heeft als de kleding die je naar de sportschool draagt. Deze tweedelige set voor dames heeft een top met een uitgesneden racerback die je over je hoofd moet aantrekken en jongensachtige shorts voor een goede bedekking in het zwembad.
 Beide onderdelen zijn gemaakt van zachte, chloorbestendige INFINITEX®-stof met opgestikte 3-Stripes op de zijkanten. ', 'adidas', 'bikini','vrouw', 45.50, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dw0cc6f376/zoom/AY6529_21_model.jpg?sw=2000&sfrm=jpg');
 
 INSERT INTO Product VALUES (36, 'Infinitex+ Graphic Badpak', 'Baan je razendsnel door je training in dit damesbadpak. Het badpak is gemaakt van duurzaam INFINITEX®+ materiaal, is chloorbestendig om zijn stretch te behouden en blijft zacht, zelfs als het nat wordt. Met een medium uitgesneden hals en een L-rug voor optimale bewegingsvrijheid.',
 'adidas', 'badpak','vrouw', 50.00, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dwb7516a58/zoom/AY2827_21_model.jpg?sw=500&sfrm=jpg');

 INSERT INTO Product VALUES (37, 'Dolly - Thunderbolt', 'Modern bikini voor de jeugd. Dit is een erg gegeerde bikini voor de zomer.',
 'triangl', 'bikini','vrouw', 75.00, 'http://cdn.shopify.com/s/files/1/0312/1389/products/1.-TRIANGL-DOLLY---THUNDERBOLT-1.jpg?v=1448281270');
 
 INSERT INTO Product VALUES (38, 'Delilah - Fiore Nero', 'Dit is een tijdloze bikini dat zowel door de jeugd als volwassen gedragen wordt. Dit is een bikini dat ontworpen is voor een betaalbare bikini voor iedereen ',
 'triangl', 'bikini','vrouw', 75.00, 'http://cdn.shopify.com/s/files/1/0312/1389/products/TRIANGL-DELPHINE-FIORE-NERO-2.jpg?v=1461513149');
 
 INSERT INTO Product VALUES (39, 'Poppy - Summer Sorbet', 'Dit is  een Modern bikini voor de jeugd. Dit is een erg gegeerde bikini voor de zomer. 
Dit is een gestructeerd neoprene bikini in Cobalt blauw. de bikini heeft een balconnet stijl top, deze heeft voorgevormde cups wat ervoor zorgt dat alles goed ondersteund word.
De schouderbanden kunnen worden aangepast worden aan de lichaamsbouw van de drager.',
'triangl', 'bikini	','vrouw', 82.95, 'http://cdn.shopify.com/s/files/1/0312/1389/products/1.-TRIANGL-POPPY-BLUE-CRUSH.jpeg?v=1415515197');
 
 INSERT INTO Product VALUES (40, 'Farrah - Dancing In The Wind', ' De Farrah is een recente bikini van triangl. Triangl heeft ervoor gekozen om de Farrah te maken in de traditionele BH-style. Dit wil zeggen dat je het bikini bovenstuk gedragen wordt en geopend en gesloten kan worden zoals een bh. 
 De schouderbanden van de bikini kunnen worden aangepast worden aan de lichaamsbouw van de drager.',
'triangl', 'bikini','vrouw', 85.00, 'http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dwb7516a58/zoom/AY2827_21_model.jpg?sw=500&sfrm=jpg');
 
 INSERT INTO Product VALUES (41, 'Lily - Aqua Punch', 'Dit is  een Modern bikini voor de jeugd en volwassen. Dit is een erg gegeerde bikini voor de zomer. 
 Het is strapless bikini dit wil zeggen dat je niet meer moet knoeien met hoe de de bikini moet vastmaken of geen last meer hebt van de koortjes van je bikini',
 'triangl', 'bikini','vrouw', 85.00, 'http://cdn.shopify.com/s/files/1/0312/1389/products/1.-TRIANGL-LILY-AQUA-PUNCH.jpg?v=1420962024');
 
 INSERT INTO Product VALUES (42, 'Marinestripe Triangle Bikini', 'Leuk, kleurrijk en speciaal voor de allerjongsten ontworpen! De Speedo Congobongo Essential Allover Aquashorts is de perfecte zwemuitrusting voor de jonge rakkers voor een plons in het zwembad of pootje baden op het strand.
Deze shorts zijn leuk gekleurde met een frisse stijl voor de jonge waterratten.Deze aquashorts zijn de perfecte zwemoutfit voor wie regelmatig in het zwembad duikt voor een training, fitness of recreatieve sessies. Gemaakt uit Speedo"s Endurance 10 badstof, een superieur materiaal vergeleken met de klassiek gebruikte stretchstoffen voor zwempakken. 
Endurance 10 combineert hogere chloor-resistentie met een beperkter kleur- en vormverlies, voor een comfortabele en stijlvolle outfit hoeveel baantjes je ook trekt.',
 'speedo', 'bikini','vrouw', 60.00, 'https://www.unitedbrands.be/media/catalog/product/cache/1/image/650x/040ec09b1e35df139433887a97daa66f/a/r/art066363.paard.jpg');
 
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