<?php

use app\models\Object;
use app\models\Property;
use yii\db\Migration;

class m170211_115710_migrate_property extends Migration
{
    public function up()
    {
        //`region_id`, `district_id`, `type_id`, `price`, `gps`, `covered`, `bedroom`, `vat`

        $items = [
            [4,90, 2, 367800, '34.714003, 33.173481', 78, 2, NULL],
            [4,37, 3, 335400, '34.717678, 33.054519', 97, 2, 1],
            [7,110, 1, 598800, '35.032081, 32.366375', 155, 3, 1],
            [7,110, 1, 706000, '35.032081, 32.366375', 245, 4, 1],
            [2,18, 1, 457700, '34.997817, 33.998292', 157, 3, 1],
            [2,18, 1, 532900, '34.997817, 33.998292', 191, 4, 1],
            [6,103, 2, 167500, '34.790153, 32.449211', 89, 2, 1],
            [6,104, 1, 450000, '34.881186, 32.364644', 143, 3, 1],
            [6,104, 1, 475000, '34.881186, 32.364644', 174, 4, 1],
            [6,104, 1, 487100, '34.881186, 32.364644', 144, 3, 1],
            [6,104, 1, 644000, '34.881186, 32.364644', 187, 4, 1],
            [6,105, 1, 750000, '34.882947, 32.334575', 168, 3, 1],
            [6,105, 1, 850000, '34.882947, 32.334575', 202, 4, 1],
            [4,92, 1, 357100, '34.734956, 32.891697', 128, 2, 1],
            [4,92, 1, 396700, '34.734956, 32.891697', 159, 3, 1],
            [6,104, 1, 684800, '34.880772, 32.368481', 253, 4, 1],
            [6,106, 2, 150800, '34.710908, 32.532272', 88, 2, 1],
            [6,106, 2, 195500, '34.710908, 32.532272', 99, 3, 1],
            [7,111, 1, 390000, '35.174506, 32.552486', 111, 2, 1],
            [7,111, 1, 390000, '35.174506, 32.552486', 127, 3, 1],
            [4,101, 2, 251600, '34.700725, 33.093286', 65, 1, 1],
            [7,112, 4, 90000, '35.034781, 32.506483', NULL, NULL, NULL],
            [6,104, 1, 681800, '34.880842, 32.389736', 225, 4, 1],
            [4,75, 1, 403100, '34.748297, 33.205139', 124, 2, 1],
            [6,107, 1, 510000, '34.697922, 32.596267', NULL, 3, 1],
            [6,108, 1, 697500, '34.739497, 32.439603', 140, 3, 1],
            [6,109, 1, 440000, '34.768489, 32.427631', 188, 3, 1],
        ];

        $items_lang = [
            [
                [
                    'Limassol Star - Project by the Beach among 5 Star Hotels and Yacht Club',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; One of the most luxurious developments off the coast of Limassol, located on the beachfront.<br />&bull; This exquisite development is nestled between two of Cyprus most luxurious spa resorts.<br />&bull; Built to the highest specifications, these properties are designed with style and contemporary architecture, offering an exclusive lifestyle by the sandiest of beaches, fully organised with beach services.<br />&bull; The development includes a large communal swimming pool, children\'s paddling pool, wash and change room facilities, and a tennis court, reserved exclusively for residents.<br />&bull; Title Deeds in place.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">These 2 bedroom Limassol beach apartments for sale are considered to be a great investment opportunity.&nbsp;All local amenities are within walking distance and these include restaurants, bars, supermarkets, car hire, banks, and souvenir and tour shops. A regular bus service or a short taxi ride takes you into the heart of the tourist area where restaurants, bars and nightclubs are in abundance. The Limassol Star Beach Village affords privacy and tranquillity and is an ideal base from which to explore the island.</p>
                    <p style="text-align: justify;">These exclusive Limassol beach apartments for sale are designed with style and finest architecture, offering an exclusive lifestyle by the beach. The green areas carefully left within the project create stunning landscaping grounds.</p>
                    <p style="text-align: justify;">The development includes also a Tennis Court, a large adult swimming pool and a kids swimming pool as well, gated and available only to the development\'s residents.</p>
                    <p style="text-align: justify;">Ideal Location, this complex is an ideal base from which to explore the island. It is approximately a 1 hour drive to Paphos to the east, Ayia Napa to the west and the Troodos mountains to the north. The Amathus area has undergone major road works during 2001. This is now all complete and has enhanced the beauty and safety of the area. Amathus is one of the ancient city Kingdoms of Cyprus where according to legend, Theseus left the pregnant Ariadne to be taken care of, after his battle with the Minotaur. There was a very important cult of Aphrodite-Astarte here. Excavations are still continuing at the Acropolis and Agora area of the ancient site. Numerous tombs have been found, one of them can be visited in front of the Amathus Beach Hotel.</p>
                    <p style="text-align: justify;">Beach, one of the best Limassol has to offer, is sandy and has been awarded the &lsquo;Blue Flag&rsquo;. The sea is calm, has no undercurrents and is therefore safe for children.</p>
                    <p style="text-align: justify;">These Limassol beach apartments for sale are located among 5 star deluxe hotels and resorts with sandy organised beaches and watersports with the St Raphael pleasure boat Marina at only 300m away.</p>
                    <p style="text-align: justify;">Transport Car hire is available and can be booked through us at very reasonable rates. However, local buses are regular, inexpensive and available on the main coastal road, as are taxis. Pick up points for all excursions are available within walking distance. We can also arrange for transfers to and from airports at an additional cost.</p>',
                ],
                [
                    'Лимассол Стар - Проект расположенный в непосредственной близости к морю, отелям 5-ти звёзд и Яхт-клубу',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Комплекс под ключ, расположенный на берегу моря, рядом с местами отдыха и для занятий водными видами спорта.<br />Безопасная зона возле большого и детского бассейнов.<br />Зелёные зоны и теннисный корт общественного пользования.<br />Отличный потенциал сдачи жилья в аренду.<br />Расположенный рядом с пятизвёздочным отелем "Le Meridien Spa Resort".<br />Близко к "St Raphael" Яхт-Клуб.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Все местные хозяйственно-бытовые объекты находятся на расстоянии пешей прогулки: рестораны, бары, супермаркеты, прокат автомобилей, банки, сувенирные лавки и туристические агентства. После непродолжительной поездки на такси вы окажетесь в самом центре туристической зоны с множеством ресторанов, баров и ночных клубов. В &laquo;Лимассол Стар Бич Вилладж&raquo; вы будете чувствовать себя комфортно и спокойно, это идеальная отправная точка для знакомства с островом.</span><br /><br /><span>Эта эксклюзивная кипрская недвижимость построена в великолепном стиле, предполагающем роскошный образ жизни рядом с пляжем. Зеленая территория объекта удивляет восхитительными ландшафтами.</span><br /><br /><span>На территории проекта также есть теннисный корт, большой бассейн для взрослых и детский бассейн, предназначенные исключительно для жителей комплекса.</span><br /><br /><span>Идеальное месторасположение, этот комплекс &mdash; идеальная отправная точка для знакомства с островом. Находится примерно в 1 часе езды от Пафоса на восток, Айа-Напы на запад и гор Троодоса на север. С 2001 года в районе Аматус велись активные дорожные работы. В настоящее время все работы завершены, и благодаря этому можно в полной мере насладиться красотой и безопасным путешествием по данной местности. Аматус &mdash; один из древних городов-королевств Кипра, где, согласно легенде, Тесей после битвы с Минотавром оставил на попечение беременную Ариадну. Здесь существовал очень значимый культ Афродиты-Астарты. В настоящее время все еще продолжаются раскопки в районе Акрополиса и Агоры. Были найдены бесчисленные захоронения, одно из которых можно посетить недалеко от &laquo;Аматус Бич Хотел&raquo;.</span><br /><br /><span>Пляж, один из лучших в Лимассоле, песчаный, имеет пометку &laquo;Голубой флаг&raquo;. Море здесь спокойное, без глубинного течения и, таким образом, безопасное для купания детей.&nbsp;</span><br /><br /><span>Аренда автомобилей не доставит никаких проблем, данная услуга может быть предоставлена нами по весьма доступным ценам. Однако можно воспользоваться и местными рейсовыми автобусами (на основной прибрежной дороге), поездки на которых обойдутся вам совсем недорого, то же можно сказать и про такси. Остановки на расстоянии пешей прогулки есть на всех туристических маршрутах. Мы также предлагаем организацию трансферов в/из аэропортов за дополнительную плату.</span></p>',
                ],
            ],
            [
                [
                    'Agios Athanasios Hill View - New project in prime residential area overlooking the town and sea',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Located in a prime new residential neighborhood of Limassol, comprising of modern 2 bed townhouses and 3 bed semi detached houses. <br />&bull; Only seven units. <br />&bull; Contemporary architectural design built to the highest specifications and with attention to detail.<br />&bull; Centrally located in one of the most sought-after areas of Limassol an upcoming neighborhood.<br />&bull; Gated properties for added privacy and security.<br />&bull; Small development with panoramic views of Limassol Town, Mediterranean Coast and mountain views.</p>
                    <p><strong><span style="text-decoration: underline;">Description:</span></strong></p>
                    <p style="text-align: justify;">These luxurious modern Agios Athanasios properties, on a hillside by Agios Athanasios in Limassol, consisting of only 7 units are an exclusive property investment option!&nbsp;They might not be alive to the sound of music, but this development high up in a newly established quiet and upcoming residential area with views over the city will certainly leave you feeling alive.</p>
                    <p style="text-align: justify;">Perhaps it&rsquo;s the incredible views of the southern Cyprus coastline, or the fact that the Agios Athanasios region is close enough to Limassol and plentiful amenities and to give you the best the city has to offer but far away enough to really give you a sense of peace and quiet as you take in the splendour of this hillside development.</p>
                    <p style="text-align: justify;">Whichever one of these luxurious Agios Athanasios properties you choose you can be sure of one thing &ndash; quality guaranteed. Quite simply because these properties in Agios Athanasios, Limassol are built by one of the most reputable developers in Cyprus and as the only ones to have been awarded the prestigious ISO 9001 qualification, you can rest assured that you will have made a safe, wise investment.</p>
                    <p style="text-align: justify;">Of course as you sit on your balcony with balustrades under your wooden pergola, contemplating whether to take a drive down to the beach to enjoy a leisurely dip in the sea, or just to sit back and relax with a drink as you take in the breathtaking hill views, you certainly should feel alive.</p>',
                ],
                [
                    'Айос Асанасиос Хилл-Въю - Новый проект в престижном районе с видом на город и море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Месторасположение в жилом тихом районе.<br />С видом на город и море.<br />Небольшой, современный проект.<br />Коттеджный посёлок обеспечивающий безопасность.<br />При въезде на территорию проекта - шлагбаум.<br />По желанию покупателя, возможность приобретения полностью меблированной виллы.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">Эти семь фешенебельных современных домов на склоне холма в районе Айос Атанасиос в Лимассоле являются поистине эксклюзивной недвижимостью с хорошей инвестиционной возможностью! Этот объект недвижимости расположен высоко в новом тихом и уютном жилом районе с прекрасным видом на город, несомненно оставят вас с ощущением жизни.</p>
                    <p style="text-align: justify;">Возможно, потрясающие виды побережья южного Кипра или факт того, что район Айос Атанасиос расположен близко к Лимассолу и окружен большим количеством удобств, дает вам возможность почувствовать полноценную городскую жизнь, но в то же время вдалеке от шума, ощутить чувство спокойствия и тишины уникальности данного жилого комплекса.</p>
                    <p style="text-align: justify;">Какой бы из этих роскошных домов вы не выберете, в одном можете быть уверенны точно - качество гарантированно. Хотя бы просто по той причине, что данные дома построены одним из самых уважаемых на Кипре застройщиков, и одним из нескольких, удостоенных престижного сертификата качества ISO 9001, это есть гарантия того, что вы сделали безопасный и мудрый выбор.</p>
                    <p style="text-align: justify;">Несомненно, когда вы будете отдыхать на вашем балконе с балюстрадами под деревянной перголой, размышляя о том, съездить ли на пляж, чтобы окунуться в море или просто остаться дома и расслабиться с прохладительным напитком, наслаждаясь захватывающими видами, вы однозначно будете чувствовать прилив жизненной энергии.</p>',
                ],
            ],
            [
                [
                    'Agnades Village 1 - The most spectacular sea views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Wonderful deluxe 3 and 4 bedroom villas with private swimming pools.<br />&bull; Mediterranean architecture with arches and exceptionally large verandas with unobstructed sea views.<br />&bull; High specifications with luxurious finishes.<br />&bull; Adjacent to the magnificent Akamas National Park.<br />&bull; Minutes away from Latchi Yachting Marina.<br />&bull; Very close to fabulous sandy beaches / Beautiful unspoiled green surroundings.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">A bouquet of luxurious and well designed 3 and 4 bedroom villas for sale in Neo Chorio village in one of the most desirable areas of Cyprus, next to the famous Baths of Aphrodite and the spectacular Akamas National Park. If you are dreaming of something comfortable and elegant, in a peaceful and quiet area with the magnificent sea views, you should not look any further.</p>
                    <p style="text-align: justify;"><span>All<strong> properies for sale in Neo Chorio village</strong> in Agnades Village 1 are built on large plots and each one offers its own private swimming pool. The Mediterranean architecture, the large verandas, the spacious rooms, as well as the quality construction and high specifications are important elements which make this development stand out from all the others.</span></p>
                    <p style="text-align: justify;"><span>&ldquo;Agnades Village 1&rdquo; is situated on a hillside of the authentic Cypriot Village of Neo Chorio, in an idyllic environment with unparalleled natural beauty. The beautiful and unspoiled green surroundings, along with the sloped ground of the development allow terraced construction with permanent views that will make you feel part of somewhere that is truly special.</span><span><span style="text-decoration: underline;"><strong><br /></strong></span></span></p>',
                ],
                [
                    'Агнадес Вилладж 1 - Самый захватывающий вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>3-х и 4-х спальнями стильные виллы.<br />Частные бассейны.<br />Высокого качества отделочные материалы.<br />Великолепный панорамный вид на море.<br />В нескольких шагах от "Лачи" пляжей и яхт-клуба.<br />Чистейшие зелёные окрестности.<br />Рядом с великолепным национальным парком Акамас.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Все виллы построены на больших участках, на территории каждой виллы есть собственный бассейн. Средиземноморская архитектура, большие веранды, просторные комнаты, а также качество построек и высокие технические характеристики &mdash; важные элементы, выделяющие данный проект на фоне других.</span><br /><br /><span>&laquo;Агнадес Вилладж 1&raquo; расположен на окраине настоящей кипрской деревни Нео Хорио, в идиллическом месте непревзойденной красоты. Прекрасные и нетронутые зеленые пейзажи наряду с небольшим склоном позволяют строить террасированные строения с отличным обзором, которые заставят вас почувствовать себя частью действительно особенного места на земле.</span><span><span style="text-decoration: underline;"><strong><br /></strong></span></span></p>',
                ],
            ],
            [
                [
                    'Agnades Village 1 - The most spectacular sea views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Wonderful deluxe 3 and 4 bedroom villas with private swimming pools.<br />&bull; Mediterranean architecture with arches and exceptionally large verandas with unobstructed sea views.<br />&bull; High specifications with luxurious finishes.<br />&bull; Adjacent to the magnificent Akamas National Park.<br />&bull; Minutes away from Latchi Yachting Marina.<br />&bull; Very close to fabulous sandy beaches / Beautiful unspoiled green surroundings.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">A bouquet of luxurious and well designed 3 and 4 bedroom villas for sale in Neo Chorio village in one of the most desirable areas of Cyprus, next to the famous Baths of Aphrodite and the spectacular Akamas National Park. If you are dreaming of something comfortable and elegant, in a peaceful and quiet area with the magnificent sea views, you should not look any further.</p>
                    <p style="text-align: justify;"><span>All<strong> properies for sale in Neo Chorio village</strong> in Agnades Village 1 are built on large plots and each one offers its own private swimming pool. The Mediterranean architecture, the large verandas, the spacious rooms, as well as the quality construction and high specifications are important elements which make this development stand out from all the others.</span></p>
                    <p style="text-align: justify;"><span>&ldquo;Agnades Village 1&rdquo; is situated on a hillside of the authentic Cypriot Village of Neo Chorio, in an idyllic environment with unparalleled natural beauty. The beautiful and unspoiled green surroundings, along with the sloped ground of the development allow terraced construction with permanent views that will make you feel part of somewhere that is truly special.</span><span><span style="text-decoration: underline;"><strong><br /></strong></span></span></p>',
                ],
                [
                    'Агнадес Вилладж 1 - Самый захватывающий вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>3-х и 4-х спальнями стильные виллы.<br />Частные бассейны.<br />Высокого качества отделочные материалы.<br />Великолепный панорамный вид на море.<br />В нескольких шагах от "Лачи" пляжей и яхт-клуба.<br />Чистейшие зелёные окрестности.<br />Рядом с великолепным национальным парком Акамас.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Все виллы построены на больших участках, на территории каждой виллы есть собственный бассейн. Средиземноморская архитектура, большие веранды, просторные комнаты, а также качество построек и высокие технические характеристики &mdash; важные элементы, выделяющие данный проект на фоне других.</span><br /><br /><span>&laquo;Агнадес Вилладж 1&raquo; расположен на окраине настоящей кипрской деревни Нео Хорио, в идиллическом месте непревзойденной красоты. Прекрасные и нетронутые зеленые пейзажи наряду с небольшим склоном позволяют строить террасированные строения с отличным обзором, которые заставят вас почувствовать себя частью действительно особенного места на земле.</span><span><span style="text-decoration: underline;"><strong><br /></strong></span></span></p>',
                ],
            ],
            [
                [
                    'Mersinia Hills Sea View Villas - Luxury Villas with modern architectural design',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Modern and luxurious 3 and 4 bed villas boasting exceptional unobstructed sea views and functional, spacious living areas.<br />&bull; Some villas feature roof terraces and basements.<br />&bull; Ten minutes walk to amenities and services.<br />&bull; Approx. 1km drive to finest blue flag sandy beaches and five star hotels.<br />&bull; Exeptional properties adjacent to a nature-protected area.<br />&bull; 5 minutes drive from Protaras Town/ 25 minutes to Larnaca International Airport.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Mersinia Hills Sea view Villas, is located in Ayia Napa, the leading cosmopolitan resort of Cyprus!</p>
                    <p style="text-align: justify;">Ayia Napa, a city on the eastern coast line of Cyprus, is very well known for the blue flag sandy beaches with crystal clear waters, the Cypriot hospitality, the rich cultural background and&nbsp;its vibrant lifestyle.</p>
                    <p style="text-align: justify;">Ayia Napa villas for sale in Mersinia Hills, are being developed on an elevated site adjacent&nbsp;to a nature protected green area, offering phenomenal unobstructed views of Ayia Napa coast line all the way to the city of Larnaca.</p>
                    <p style="text-align: justify;">It&nbsp;is &nbsp;within walking distance from the traditional lively&nbsp;Ayia&nbsp;Napa square and within a very short drive to the world famous blue flag Nissi Beach.</p>
                    <p style="text-align: justify;">The development features modern luxury &nbsp;3 and 4 bedroom Ayia Napa villas for sale with private swimming pools, spacious gardens and roof terraces, built to the highest standard and elegance.</p>',
                ],
                [
                    'Мерсиния Хилс Си Вью Виллы',
                    '<p style="text-align: justify;"><span style="text-decoration: underline;">Ключевые особенности</span>:&nbsp;</p>
                    <p>Просторные, 3-х и 4-х спальные роскошные виллы с современным архитектурным дизайном.<br />Захватывающий, Панорамный вид на окрестности Айя-Напы и Средиземное море.<br />Большие участки, частные бассейны,зона барбекю, терасса на крыше и обеспечение для Jacuzz, позволит насладиться средиземноморским стилем жизни на свежем воздухе в абсолютном уединении, наслаждаясь захватывающими дух видами.<br />При въезде на территорию проекта - шлагбаум.<br />В шаговой доступности к центральной площади, с подлинным традиционным стилем и широкого спектра интересных мест и многих торговых точек.<br />В 5-ти минутах от популярного Нисси пляжа.<br />В 30 минутах езды от Международного Аэропорта Ларнаки.<br />Позволит насладиться уникальным и расслабляющим образом жизни.<br />Идеально, как в качестве отдыха, либо в качестве инвестиций.</p>
                    <p style="text-align: justify;">&nbsp;<span style="text-decoration: underline;"><span style="text-decoration: underline;">Описание</span></span>:&nbsp;</p>
                    <p style="text-align: justify;">Данный проект удобно расположен на возвышенности, в нескольких минутах ходьбы от центра Айа-Напы, в 10 минутах езды как от Паралимни, так и от Протараса, всего в 25 минутах езды от Ларнаки и международного аэропорта.</p>
                    <p style="text-align: justify;"><span>Всего в 10 минутах ходьбы находятся магазины, рестораны, бары и банки, в 10 минутах езды &mdash; пляж. Прилегает к зеленой территории, откуда открываются панорамные виды на море. Несмотря на то, что рядом находятся все хозяйственно-бытовые объекты, это очень спокойный жилой район.</span></p>
                    <p style="text-align: justify;"><span>Проект будет включать в себя 43 роскошные виллы с бассейнами, построенные по высочайшим стандартам. Идеальное место для роскошной жизни или капиталовложения с отличной возможностью сдачи в аренду, благодаря великолепному месторасположению и открывающимся видам.</span></p>
                    <p style="text-align: justify;"><span>Если спокойствие, морские виды и близость всех хозяйственно-бытовых объектов являются основными критериями гармоничного стиля жизни, то &laquo;Мерсиниа Хиллс&raquo; &mdash; идеальное место для постоянного проживания или отдыха.&nbsp;</span></p>',
                ],
            ],
            [
                [
                    'Mersinia Hills Sea View Villas - Luxury Villas with modern architectural design',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Modern and luxurious 3 and 4 bed villas boasting exceptional unobstructed sea views and functional, spacious living areas.<br />&bull; Some villas feature roof terraces and basements.<br />&bull; Ten minutes walk to amenities and services.<br />&bull; Approx. 1km drive to finest blue flag sandy beaches and five star hotels.<br />&bull; Exeptional properties adjacent to a nature-protected area.<br />&bull; 5 minutes drive from Protaras Town/ 25 minutes to Larnaca International Airport.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Mersinia Hills Sea view Villas, is located in Ayia Napa, the leading cosmopolitan resort of Cyprus!</p>
                    <p style="text-align: justify;">Ayia Napa, a city on the eastern coast line of Cyprus, is very well known for the blue flag sandy beaches with crystal clear waters, the Cypriot hospitality, the rich cultural background and&nbsp;its vibrant lifestyle.</p>
                    <p style="text-align: justify;">Ayia Napa villas for sale in Mersinia Hills, are being developed on an elevated site adjacent&nbsp;to a nature protected green area, offering phenomenal unobstructed views of Ayia Napa coast line all the way to the city of Larnaca.</p>
                    <p style="text-align: justify;">It&nbsp;is &nbsp;within walking distance from the traditional lively&nbsp;Ayia&nbsp;Napa square and within a very short drive to the world famous blue flag Nissi Beach.</p>
                    <p style="text-align: justify;">The development features modern luxury &nbsp;3 and 4 bedroom Ayia Napa villas for sale with private swimming pools, spacious gardens and roof terraces, built to the highest standard and elegance.</p>',
                ],
                [
                    'Мерсиния Хилс Си Вью Виллы',
                    '<p style="text-align: justify;"><span style="text-decoration: underline;">Ключевые особенности</span>:&nbsp;</p>
                    <p>Просторные, 3-х и 4-х спальные роскошные виллы с современным архитектурным дизайном.<br />Захватывающий, Панорамный вид на окрестности Айя-Напы и Средиземное море.<br />Большие участки, частные бассейны,зона барбекю, терасса на крыше и обеспечение для Jacuzz, позволит насладиться средиземноморским стилем жизни на свежем воздухе в абсолютном уединении, наслаждаясь захватывающими дух видами.<br />При въезде на территорию проекта - шлагбаум.<br />В шаговой доступности к центральной площади, с подлинным традиционным стилем и широкого спектра интересных мест и многих торговых точек.<br />В 5-ти минутах от популярного Нисси пляжа.<br />В 30 минутах езды от Международного Аэропорта Ларнаки.<br />Позволит насладиться уникальным и расслабляющим образом жизни.<br />Идеально, как в качестве отдыха, либо в качестве инвестиций.</p>
                    <p style="text-align: justify;">&nbsp;<span style="text-decoration: underline;"><span style="text-decoration: underline;">Описание</span></span>:&nbsp;</p>
                    <p style="text-align: justify;">Данный проект удобно расположен на возвышенности, в нескольких минутах ходьбы от центра Айа-Напы, в 10 минутах езды как от Паралимни, так и от Протараса, всего в 25 минутах езды от Ларнаки и международного аэропорта.</p>
                    <p style="text-align: justify;"><span>Всего в 10 минутах ходьбы находятся магазины, рестораны, бары и банки, в 10 минутах езды &mdash; пляж. Прилегает к зеленой территории, откуда открываются панорамные виды на море. Несмотря на то, что рядом находятся все хозяйственно-бытовые объекты, это очень спокойный жилой район.</span></p>
                    <p style="text-align: justify;"><span>Проект будет включать в себя 43 роскошные виллы с бассейнами, построенные по высочайшим стандартам. Идеальное место для роскошной жизни или капиталовложения с отличной возможностью сдачи в аренду, благодаря великолепному месторасположению и открывающимся видам.</span></p>
                    <p style="text-align: justify;"><span>Если спокойствие, морские виды и близость всех хозяйственно-бытовых объектов являются основными критериями гармоничного стиля жизни, то &laquo;Мерсиниа Хиллс&raquo; &mdash; идеальное место для постоянного проживания или отдыха.&nbsp;</span></p>',
                ],
            ],
            [
                [
                    'Konia Village 1 - Close to amenities & services',
                    '<p><strong><span style="text-decoration: underline;">Key Features</span></strong>:</p>
                    <p>&bull; Located in a Prime residential area, close proximity to the centre of Pafos. <br />&bull; 2 bedroom apartments &amp; maisonettes with spacious living areas. <br />&bull; 3 Communal swimming pools.<br />&bull; Mature, landscaped communal gardens.<br />&bull; Town and coastal views.<br />&bull; Close to the beach, shopping centres, services and amenities.<br />&bull; Short drive to golf courses, International School of Paphos and the Pafos International Airport.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Konia Village 1 comprises of Konia apartments for sale, maisonettes for sale and villas for sale. Spacious areas, landscaped gardens with three communal swimming pools and allocated parking areas are a few of the features which contribute to the five star rating of this development.</p>
                    <p style="text-align: justify;"><span>The natural friendliness of the locals and the slower pace of life are just part of the unique charm of this village located close to Pafos Town and its amenities including its colourful&nbsp;nightlife, glorious sandy beaches, lush, green surroundings and a plethora of relaxed restaurants, bars and water sport activities.</span><br /><br /><span>This development is within easy access to the highway, linking it to all major towns in Cyprus and is only a short drive from the internationally renowned 18-hole golf courses of Tsada and Secret Valley. Konia apartments for sale in Konia Village 1 are also located within close proximity to the Pafos International Airport.&nbsp;</span><br /><br /><span>With all its rich characteristics and ideal location, Konia Village 1 is another comfortable investment you can make when purchasing your new home in Cyprus.</span></p>',
                ],
                [
                    'Конья Вилладж 1 - Недалеко от центральной площади деревни',
                    '<p style="text-align: justify;">&nbsp;<span style="text-decoration: underline;">Ключевые особенности</span>:&nbsp;</p>
                    <p>Современные апартаменты под ключ расположенные в престижном районе, в непосредственной близости к центру города и туристической зоне.<br />3 бассейна общего пользования.<br />Высокого уровня технические характеристики.<br />Близко к морю, центральное месторасположение, рядом с магазинами и основными торговыми точками.<br />В нескольких минутах езды от Международного Пафос аэропорта и гольф клуба.</p>
                    <p style="text-align: justify;">&nbsp;<span style="text-decoration: underline;">Описание</span>:&nbsp;</p>
                    <p style="text-align: justify;"><span>&laquo;Конья Вилладж 1&raquo; состоит из пятнадцати блоков апартаментов с двумя спальнями, пятнадцати мезоньетов с двумя спальнями и двадцати одной виллы с тремя спальнями. Просторные площади, ландшафтные сады с тремя общими бассейнами и отведенными парковками &mdash; лишь некоторые особенности, позволяющие присудить данному проекту пять звезд.</span></p>
                    <p style="text-align: justify;"><span>Искреннее дружелюбие местных жителей и замедленный темп жизни &mdash; лишь некоторые составляющие неповторимого очарования этой деревни вблизи Пафоса и его хозяйственно-бытовых объектов, включая его яркую ночную жизнь, восхитительные песчаные пляжи, пышную зеленую растительность и множество тихих ресторанчиков, баров и возможностей заниматься водными видами спорта.</span></p>
                    <p style="text-align: justify;"><span>От данного проекта легко добраться до автомагистрали, связывающей его со всеми крупными городами на Кипре. Расположен в нескольких минутах езды от всемирно известных площадок для гольфа с 18 лунками Tsada и Secret Valley. &laquo;Конья Вилладж 1&raquo; также находится недалеко от международного аэропорта Пафоса.</span></p>
                    <p style="text-align: justify;"><span>Идеальные характеристики и месторасположение делают &laquo;Конья Вилладж 1&raquo; еще одним объектом удачного капиталовложения при покупке нового дома на Кипре.</span></p>',
                ],
            ],
            [
                [
                    'Riza Heights 1 - Panoramic views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Modern and spacious 3 and 4 bedroom villas for sale located in the Coral Bay Area, Peyia.<br />&bull; Breathtaking views of the Mediterranean. <br />&bull; Roof terraces, Rrivate large swimming pools and quality finishes throughout.<br />&bull; Close to renowned blue-flag beaches of Coral Bay the most popular beach in Pafos, shops, <br />places of interest, services and amenities.<br />&bull; 30 minutes drive to Pafos International Airport, 15 minutes drive to Pafos Town.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Riza Heights have been designed to offer the simplicity of Cypriot architecture with the conveniences of modern design features. Within this exceptional development, one will find a delightful community of six detached villas, ranging from three to four bedrooms.</p>
                    <p style="text-align: justify;"><span>The extra space that these beautiful properties provide is evident through their large, spacious living areas, sizeable bedrooms, and expansive plots. Peyia villas for sale in Riza Heights also offer comfortable balconies with views of the Mediterranean &ndash; the ultimate setting for relaxation.</span><br /><br /><span>Located in the area of Peyia, a short drive from Pafos Town, these<strong> Peyia villas for sale</strong> are within close proximity to the sandy beaches of Coral Bay, a short drive to amenities and services, places of interest and golf courses.</span><br /><br /><span>If peace of mind is one of the prerequisites, then Riza Heights will prove favourable as their positioning, on a secluded yet accessible site, offers a quiet and peaceful ambience for the perfect holiday or permanent home in Cyprus.</span></p>',
                ],
                [
                    'Риза Хейтс 1 - Панорамный вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Современные, просторные виллы, расположенные в районе Корал Бэй. <br />Небольшой проект состоящий из 6 вилл.<br />С терассой на крыше.<br />Панорамный вид на море.<br />Частные бассейны.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">Риза Хейтс 1 был спроектирован в традиционном кипрском стиле со всеми удоствами современного дизайна. В данном эксклюзивном жилом комплексе вы сможете подобрать для себя прекрасный дом из 6 отдельно стоящих вилл с треями или четырьмя спальнями.</p>
                    <p style="text-align: justify;">Дополнительное пространство, которое есть у этих вилл - это огромные просторные гостиные, большие спальни, а также протяженные участки. Риза Хейтс виллы также имеют удобные балконы с видами на Средиземное море для полной релаксации.</p>
                    <p style="text-align: justify;">Расположенные в районе Пейи, в быстром доступе до центра Пафоса, виллы Риза Хейтс, имеют удобный въезд в жилой комплекс, находящемуся в уединении и в тишине, идеальный дляотдыха или постоянной жизни на Кипре.</p>',
                ],
            ],
            [
                [
                    'Riza Heights 1 - Panoramic views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Modern and spacious 3 and 4 bedroom villas for sale located in the Coral Bay Area, Peyia.<br />&bull; Breathtaking views of the Mediterranean. <br />&bull; Roof terraces, Rrivate large swimming pools and quality finishes throughout.<br />&bull; Close to renowned blue-flag beaches of Coral Bay the most popular beach in Pafos, shops, <br />places of interest, services and amenities.<br />&bull; 30 minutes drive to Pafos International Airport, 15 minutes drive to Pafos Town.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Riza Heights have been designed to offer the simplicity of Cypriot architecture with the conveniences of modern design features. Within this exceptional development, one will find a delightful community of six detached villas, ranging from three to four bedrooms.</p>
                    <p style="text-align: justify;"><span>The extra space that these beautiful properties provide is evident through their large, spacious living areas, sizeable bedrooms, and expansive plots. Peyia villas for sale in Riza Heights also offer comfortable balconies with views of the Mediterranean &ndash; the ultimate setting for relaxation.</span><br /><br /><span>Located in the area of Peyia, a short drive from Pafos Town, these<strong> Peyia villas for sale</strong> are within close proximity to the sandy beaches of Coral Bay, a short drive to amenities and services, places of interest and golf courses.</span><br /><br /><span>If peace of mind is one of the prerequisites, then Riza Heights will prove favourable as their positioning, on a secluded yet accessible site, offers a quiet and peaceful ambience for the perfect holiday or permanent home in Cyprus.</span></p>',
                ],
                [
                    'Риза Хейтс 1 - Панорамный вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Современные, просторные виллы, расположенные в районе Корал Бэй. <br />Небольшой проект состоящий из 6 вилл.<br />С терассой на крыше.<br />Панорамный вид на море.<br />Частные бассейны.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">Риза Хейтс 1 был спроектирован в традиционном кипрском стиле со всеми удоствами современного дизайна. В данном эксклюзивном жилом комплексе вы сможете подобрать для себя прекрасный дом из 6 отдельно стоящих вилл с треями или четырьмя спальнями.</p>
                    <p style="text-align: justify;">Дополнительное пространство, которое есть у этих вилл - это огромные просторные гостиные, большие спальни, а также протяженные участки. Риза Хейтс виллы также имеют удобные балконы с видами на Средиземное море для полной релаксации.</p>
                    <p style="text-align: justify;">Расположенные в районе Пейи, в быстром доступе до центра Пафоса, виллы Риза Хейтс, имеют удобный въезд в жилой комплекс, находящемуся в уединении и в тишине, идеальный дляотдыха или постоянной жизни на Кипре.</p>',
                ],
            ],
            [
                [
                    'Riza Heights 2 - Panoramic sea views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Modern and spacious 2, 3 and 4 bedroom villas with private swimming pool and quality finishes throughout, located in the Coral Bay Area, Peyia.<br />&bull; Breathtaking views of the Mediterranean. <br />&bull; Roof terraces.<br />&bull; Private swimming pools and quality finishes throughout with excellent specifications.<br />&bull; Close to renowned blue-flag beaches of Coral Bay, shops, places of interest, services and amenities.<br />&bull; 30 minutes drive to Pafos International Airport ,15 minutes drive to Pafos Town.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Riza Heights 2 offer an enviable sense of family living with their air distinguished elegance. These generously sized villas for sale in Peyia provide first class accommodation for the whole family, available with two, three and four bedroom options.</p>
                    <p style="text-align: justify;"><span>Built with modern functional living in mind, these unique homes offer large living areas, sizeable bedrooms and spacious plots. Riza Heights villas for sale in Peyia also offer comfortable balconies with views of the Mediterranean &ndash; the ultimate setting for relaxation.</span><br /><br /><span>Located in the area of Peyia, a short drive from Pafos Town, these villas for sale in Peyia are within close proximity to the sandy beaches of Coral Bay, a short drive to amenities and services, places of interest and golf courses.</span><br /><br /><span>If peace of mind is one of the prerequisites, then Riza Heights will prove favourable as their positioning, on a secluded yet accessible site, offers a quiet and peaceful ambience for the perfect holiday or permanent home in Cyprus.</span></p>',
                ],
                [
                    'Риза Хейтс 2 - Панорамный вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Современные, просторные виллы, расположенные в районе Корал Бэй. <br />С терассой на крыше.<br />Панорамный вид на море.<br />Частные бассейны.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">Риза Хейтс 2 это жилой комплекс, спланированный для семейной жизни в элегантном стиле. Эти крупногабаритные дома первого класса позволяют комфортно размещаться всей семьей, в наличии есть дома&nbsp; с 2,3 и 4 спальнями.</p>
                    <p style="text-align: justify;">При планировке данных вилл мы учитывали современный функционал домов: просторные гостиные комнаты, вместительные спальни и большие участки. Виллы Риза Хейтс также имеют преимущество в виде огромных террас с видами на Средиземное море, лучшее, что можно видеть из своего дома.</p>
                    <p style="text-align: justify;">Распложенные в районе Пейи, недалеко от центра Пафоса, эти дома удобны для быстрого доступа к песчаным пляжам Коралловой Бухты, а также вблизи мест развлечения, сферы бытовых услуг, достопримечательностей и гольф полей.</p>
                    <p style="text-align: justify;">Если спокойствие является одним из необходимых условий, тогда Риза Хейтс будет идеальным выбором по причине удачного расположения в уединенном, но легкодоступном для жильцов районе, Риза Хейтс предлагает тихое и мирное окружение для идеального отдыха или постоянной жизни на Кипре.</p>',
                ],
            ],
            [
                [
                    'Riza Heights 2 - Panoramic sea views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Modern and spacious 2, 3 and 4 bedroom villas with private swimming pool and quality finishes throughout, located in the Coral Bay Area, Peyia.<br />&bull; Breathtaking views of the Mediterranean. <br />&bull; Roof terraces.<br />&bull; Private swimming pools and quality finishes throughout with excellent specifications.<br />&bull; Close to renowned blue-flag beaches of Coral Bay, shops, places of interest, services and amenities.<br />&bull; 30 minutes drive to Pafos International Airport ,15 minutes drive to Pafos Town.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Riza Heights 2 offer an enviable sense of family living with their air distinguished elegance. These generously sized villas for sale in Peyia provide first class accommodation for the whole family, available with two, three and four bedroom options.</p>
                    <p style="text-align: justify;"><span>Built with modern functional living in mind, these unique homes offer large living areas, sizeable bedrooms and spacious plots. Riza Heights villas for sale in Peyia also offer comfortable balconies with views of the Mediterranean &ndash; the ultimate setting for relaxation.</span><br /><br /><span>Located in the area of Peyia, a short drive from Pafos Town, these villas for sale in Peyia are within close proximity to the sandy beaches of Coral Bay, a short drive to amenities and services, places of interest and golf courses.</span><br /><br /><span>If peace of mind is one of the prerequisites, then Riza Heights will prove favourable as their positioning, on a secluded yet accessible site, offers a quiet and peaceful ambience for the perfect holiday or permanent home in Cyprus.</span></p>',
                ],
                [
                    'Риза Хейтс 2 - Панорамный вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Современные, просторные виллы, расположенные в районе Корал Бэй. <br />С терассой на крыше.<br />Панорамный вид на море.<br />Частные бассейны.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">Риза Хейтс 2 это жилой комплекс, спланированный для семейной жизни в элегантном стиле. Эти крупногабаритные дома первого класса позволяют комфортно размещаться всей семьей, в наличии есть дома&nbsp; с 2,3 и 4 спальнями.</p>
                    <p style="text-align: justify;">При планировке данных вилл мы учитывали современный функционал домов: просторные гостиные комнаты, вместительные спальни и большие участки. Виллы Риза Хейтс также имеют преимущество в виде огромных террас с видами на Средиземное море, лучшее, что можно видеть из своего дома.</p>
                    <p style="text-align: justify;">Распложенные в районе Пейи, недалеко от центра Пафоса, эти дома удобны для быстрого доступа к песчаным пляжам Коралловой Бухты, а также вблизи мест развлечения, сферы бытовых услуг, достопримечательностей и гольф полей.</p>
                    <p style="text-align: justify;">Если спокойствие является одним из необходимых условий, тогда Риза Хейтс будет идеальным выбором по причине удачного расположения в уединенном, но легкодоступном для жильцов районе, Риза Хейтс предлагает тихое и мирное окружение для идеального отдыха или постоянной жизни на Кипре.</p>',
                ],
            ],
            [
                [
                    'Sea Caves Residences - 50m from the sea',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Six, luxurious 3 and 4 bedroom villas in one of the finest residential areas, adjacent to the famous <br />sea caves near Coral Bay.<br />&bull; Modern, detached villas with private swimming pools, large spacious living areas and en-suite bathrooms.<br />&bull; Gated entrances ensuring privacy and security.<br />&bull; Excellent specifications.<br />&bull; Close to renowned blue-flag beaches, shops, places of interest, services and amenities.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">A lavish lifestyle beckons you to this outstanding development off the west coast of Pafos. Everything about this project makes a statement of taste, quality and style.</p>
                    <p style="text-align: justify;">Sea Caves Residences are developed in one of the finest residential areas adjacent to the famous sea caves near Coral Bay. These beautiful Coral Bay villas for sale are all located within walking distance to the sea and the sea caves bay. The rugged coastline offers breathtaking views of the Mediterranean with its small sandy coves and crystal-clear waters.</p>
                    <p style="text-align: justify;"><span>Sea Caves Residences comprise six luxury Coral Bay villas for sale, all of them with extraordinary views. Developed on large and spacious plots, these Coral Bay villas for sale boast excellent specifications, functional living areas, and ensure comfort and privacy. The area itself is a prime location with award-winning villas and exclusive homes. Quiet and peaceful, Sea Caves Residences are a \'stone\'s-throw\' from a plethora of retail outlets, fish taverns, cafes and coffee bars and a future marina; the famous sandy beaches of Coral Bay are all nearby. The Coral Bay itself is a \'blue-flag\' beach, internationally recognized for its cleanliness and water clarity.</span><br /><br /><span>Sea Caves Residences are also located near the Akamas Peninsula an area preserving untamed natural beauty. If views and sea breezes are important to your lifestyle, Sea Caves Residences will provide a perfect coastal ambiance to your investment.</span></p>',
                ],
                [
                    'Си Кейвс Резиденс - 50 метров от моря',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Очень просторные, прибрежные виллы расположенные в районе Сикейвс, недалеко от популярного пляжа Корал Бэй. <br />Современные, отдельно стоящие виллы с частными бассейнами.<br />При въезде на территорию проекта - шлагбаум.<br />Большие земельные участки от 722m&sup2; to 1067m&sup2;.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Проект &laquo;Си Кейвс&raquo; Виллы состоит из шести роскошных вилл, все они с необыкновенными видами на просторных земельных участках. Эти дома отличаются высокой спецификацией, функциональными жилыми помещениями, а также, комфортом и уединением.</span></p>
                    <p style="text-align: justify;"><span> Построенные там виллы отмечены международными наградами и Сертификатами &laquo;Эксклюзивных домов&raquo;. Проект &laquo;Си Кейвс&raquo; Виллы , сам по себе, очень удобно расположен к большому количеству торговых точек, рыбных таверн, кафетерий и к будущему порту; все знаменитые песчаные пляжи Коралового Залива, также неподалёку.</span><br /><br /><span>Сам по себе Кораловый Залив это курорт, которому присвоен Голубой флаг. Эта награда говорит о чистоте воды и пляжей и, конечно, о соответсвии всем требованиям международных стандартов.</span><br /><br /><span>Проект &laquo;Си Кейвс&raquo; Виллы расположен поблизости от полуострова Акамас на территории девственной природной красоты.Компания &laquo;Aristo Developers&raquo; - ведущий застройщик на Кипре, добилась того, что эти уникальные виллы имеют также и уникальное расположение. Если морские виды и освежающие бризы важны для Вашего образа жизни, то Проект &laquo;Си Кейвс&raquo; Виллы обеспечит идеальную атмосферу Вашим инвестициям.</span></p>',
                ],
            ],
            [
                [
                    'Sea Caves Residences - 50m from the sea',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Six, luxurious 3 and 4 bedroom villas in one of the finest residential areas, adjacent to the famous <br />sea caves near Coral Bay.<br />&bull; Modern, detached villas with private swimming pools, large spacious living areas and en-suite bathrooms.<br />&bull; Gated entrances ensuring privacy and security.<br />&bull; Excellent specifications.<br />&bull; Close to renowned blue-flag beaches, shops, places of interest, services and amenities.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">A lavish lifestyle beckons you to this outstanding development off the west coast of Pafos. Everything about this project makes a statement of taste, quality and style.</p>
                    <p style="text-align: justify;">Sea Caves Residences are developed in one of the finest residential areas adjacent to the famous sea caves near Coral Bay. These beautiful Coral Bay villas for sale are all located within walking distance to the sea and the sea caves bay. The rugged coastline offers breathtaking views of the Mediterranean with its small sandy coves and crystal-clear waters.</p>
                    <p style="text-align: justify;"><span>Sea Caves Residences comprise six luxury Coral Bay villas for sale, all of them with extraordinary views. Developed on large and spacious plots, these Coral Bay villas for sale boast excellent specifications, functional living areas, and ensure comfort and privacy. The area itself is a prime location with award-winning villas and exclusive homes. Quiet and peaceful, Sea Caves Residences are a \'stone\'s-throw\' from a plethora of retail outlets, fish taverns, cafes and coffee bars and a future marina; the famous sandy beaches of Coral Bay are all nearby. The Coral Bay itself is a \'blue-flag\' beach, internationally recognized for its cleanliness and water clarity.</span><br /><br /><span>Sea Caves Residences are also located near the Akamas Peninsula an area preserving untamed natural beauty. If views and sea breezes are important to your lifestyle, Sea Caves Residences will provide a perfect coastal ambiance to your investment.</span></p>',
                ],
                [
                    'Си Кейвс Резиденс - 50 метров от моря',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Очень просторные, прибрежные виллы расположенные в районе Сикейвс, недалеко от популярного пляжа Корал Бэй. <br />Современные, отдельно стоящие виллы с частными бассейнами.<br />При въезде на территорию проекта - шлагбаум.<br />Большие земельные участки от 722m&sup2; to 1067m&sup2;.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Проект &laquo;Си Кейвс&raquo; Виллы состоит из шести роскошных вилл, все они с необыкновенными видами на просторных земельных участках. Эти дома отличаются высокой спецификацией, функциональными жилыми помещениями, а также, комфортом и уединением.</span></p>
                    <p style="text-align: justify;"><span> Построенные там виллы отмечены международными наградами и Сертификатами &laquo;Эксклюзивных домов&raquo;. Проект &laquo;Си Кейвс&raquo; Виллы , сам по себе, очень удобно расположен к большому количеству торговых точек, рыбных таверн, кафетерий и к будущему порту; все знаменитые песчаные пляжи Коралового Залива, также неподалёку.</span><br /><br /><span>Сам по себе Кораловый Залив это курорт, которому присвоен Голубой флаг. Эта награда говорит о чистоте воды и пляжей и, конечно, о соответсвии всем требованиям международных стандартов.</span><br /><br /><span>Проект &laquo;Си Кейвс&raquo; Виллы расположен поблизости от полуострова Акамас на территории девственной природной красоты.Компания &laquo;Aristo Developers&raquo; - ведущий застройщик на Кипре, добилась того, что эти уникальные виллы имеют также и уникальное расположение. Если морские виды и освежающие бризы важны для Вашего образа жизни, то Проект &laquo;Си Кейвс&raquo; Виллы обеспечит идеальную атмосферу Вашим инвестициям.</span></p>',
                ],
            ],
            [
                [
                    'Souni Pine Forest - Rural Villas by the outskirts of Limassol surrounded by Forest',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Located in the village of Souni on the outskirts of Limassol, these 2 and 3 bedroom detached villas and bungalows feature private swimming pools and private parking.<br />&bull; Surrounded by a luscious pine forest .<br />&bull; Large plots with low building density area.<br />&bull; Overlooking the salt lake, mountains and the sea.<br />&bull; Close to village amenities &amp; services / 15 min drive to Pissouri Bay / 10 min. drive to Limassol Town and beaches / 20 min. drive to Pafos International Airport and the Venus Rock Beachfront Golf Resort.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">These Souni villas for sale are located in the picturesque village of Souni, on the outskirts of Limassol.&nbsp;Each Souni property for sale in this development has been carefully designed on its own individual large plot included with a private swimming pool. All villas have spacious interior with large verandas and private parking space. Also low density with large plots. All villas have a private swimming pool.</p>
                    <p style="text-align: justify;">Souni villas for sale in Souni Pine Forest are only a ten minutes drive from Limassol center. A beautiful 15 to 20 minutes drive through the picturesque villages with their excellent small wineries directing you to the renowned Troodos Ski Resort. The famous sandy beaches of Ladies Mile and Curium are only a few minutes drive away.</p>
                    <p style="text-align: justify;">The project is a haven offering harmonization and tranquillity&nbsp;making the properties an ideal buy for either permanent or holiday residency and parallel a solid investment.</p>',
                ],
                [
                    'Суни Пайн Форест - Деревенского типа виллы на окраине Лимассола в окружении леса',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Расположен на холме, на окраине Лимассола. <br />В окружении соснового леса.<br />Большие участки с низким процентом застройки на виллы.<br />С видом на солёное озеро и средиземное море.<br />Зелёные зоны общественного пользования.<br />Частный бассейн для каждой виллы.<br />По желанию покупателя, возможность приобретения полностью меблированной виллы.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Проект состоит из 3 и 4 спальных вилл. Каждая вилла спроектирована на отдельном большом участке земли, где есть достаточно места для постройки бассейна. Все виллы имеют просторные интерьеры, большие веранды, частные автомобильные парковки и ландшафтные сады.</span><br /><br /><span>Проект Souni Pine Forest находится в 10 минутах езды от центра Лимассола. Проезжая через живописные деревни, уже через 15-20 минут Вы можете оказаться на лыжном курорте Троодоса. Всеми любимые песчаные пляжи Ladies Mile и района Куриума только в нескольких минутах езды отсюда.</span></p>
                    <p style="text-align: justify;"><span>Отличное жилье, солидная инвестиция, гармония и спокойствие.</span></p>',
                ],
            ],
            [
                [
                    'Souni Pine Forest - Rural Villas by the outskirts of Limassol surrounded by Forest',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Located in the village of Souni on the outskirts of Limassol, these 2 and 3 bedroom detached villas and bungalows feature private swimming pools and private parking.<br />&bull; Surrounded by a luscious pine forest .<br />&bull; Large plots with low building density area.<br />&bull; Overlooking the salt lake, mountains and the sea.<br />&bull; Close to village amenities &amp; services / 15 min drive to Pissouri Bay / 10 min. drive to Limassol Town and beaches / 20 min. drive to Pafos International Airport and the Venus Rock Beachfront Golf Resort.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">These Souni villas for sale are located in the picturesque village of Souni, on the outskirts of Limassol.&nbsp;Each Souni property for sale in this development has been carefully designed on its own individual large plot included with a private swimming pool. All villas have spacious interior with large verandas and private parking space. Also low density with large plots. All villas have a private swimming pool.</p>
                    <p style="text-align: justify;">Souni villas for sale in Souni Pine Forest are only a ten minutes drive from Limassol center. A beautiful 15 to 20 minutes drive through the picturesque villages with their excellent small wineries directing you to the renowned Troodos Ski Resort. The famous sandy beaches of Ladies Mile and Curium are only a few minutes drive away.</p>
                    <p style="text-align: justify;">The project is a haven offering harmonization and tranquillity&nbsp;making the properties an ideal buy for either permanent or holiday residency and parallel a solid investment.</p>',
                ],
                [
                    'Суни Пайн Форест - Деревенского типа виллы на окраине Лимассола в окружении леса',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Расположен на холме, на окраине Лимассола. <br />В окружении соснового леса.<br />Большие участки с низким процентом застройки на виллы.<br />С видом на солёное озеро и средиземное море.<br />Зелёные зоны общественного пользования.<br />Частный бассейн для каждой виллы.<br />По желанию покупателя, возможность приобретения полностью меблированной виллы.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Проект состоит из 3 и 4 спальных вилл. Каждая вилла спроектирована на отдельном большом участке земли, где есть достаточно места для постройки бассейна. Все виллы имеют просторные интерьеры, большие веранды, частные автомобильные парковки и ландшафтные сады.</span><br /><br /><span>Проект Souni Pine Forest находится в 10 минутах езды от центра Лимассола. Проезжая через живописные деревни, уже через 15-20 минут Вы можете оказаться на лыжном курорте Троодоса. Всеми любимые песчаные пляжи Ladies Mile и района Куриума только в нескольких минутах езды отсюда.</span></p>
                    <p style="text-align: justify;"><span>Отличное жилье, солидная инвестиция, гармония и спокойствие.</span></p>',
                ],
            ],
            [
                [
                    'Vrisoudia Project - Panoramic views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Detached, custom-built deluxe 4 bedroom villa, with private swimming pool and quality finishes. <br />throughout, located in the Coral Bay area, Peyia.<br />&bull; Designed on large residential plots with spacious living areas.<br />&bull; Provisions for central heating.<br />&bull; Quality specifications.<br />&bull; Close to the renowned blue-flag beaches of Coral Bay with sandy beaches, shops and five star hotels, places of interest, services and amenities.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Peyia Vrisoudia Plots are located on a hillside at the picturesque village of Peyia. In this beautiful area one of the leading Cyprus property developers, offers 21 large properties for sale in Peyia Cyprus all with unobstructed views of the sea.</p>
                    <p style="text-align: justify;"><span>Peyia\'s shores includes the most renowned beach of Cyprus, Coral Bay. Many Foreigners and Cypriots from other towns have already established their holiday homes or permanent residence in the area, thus achieving unique integration with the locals.</span><br /><br /><span>Vrisoudia offers a unique and secure investment opportunity in property for sale in Peyia Cyprus.</span></p>',
                ],
                [
                    'Проект Врисудия - Панорамный вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Частные виллы под индивидуальное строительство с большим земельным участком.<br />Очень просторные жилые помещения.<br />Обеспечение для центрального отопления.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>На побережье Пейя находится самый известный пляж на Кипре &mdash; Корал Бэй. Многие иностранцы и киприоты из других городов уже успели обзавестись собственными домами для отдыха или постоянного проживания в этом районе, отлично при этом ладя с местными жителями.</span></p>
                    <p style="text-align: justify;"><span>Профессиональный опыт Aristo Developers, надежность и великолепный дизайн являются залогом вашего отличного приобретения. &laquo;Врисудия&raquo; &mdash; отличный вариант для капиталовложения в недвижимость на Кипре.</span></p>',
                ],
            ],
            [
                [
                    'Zephyros Village 4 – Charming Coastal Properties',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; A Modern apartment and town house complex. <br />&bull; Located in the village of Mandria with its quaint and colourful town square.<br />&bull; Excellent specifications.<br />&bull; Walking distance to the beach.<br />&bull; 10 minutes drive to Venus Rock Golf Resort.<br />&bull; 5 minutes drive to Pafos International Airport, 15 minutes drive to Pafos Town.<br />&bull; Close to a wide range of services and amenities.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">The perfect home for you is one that reflects your personality, preference and lifestyle, something that makes the visitor feel welcome and the owner comfortable to live in and proud to own. These elements encompass the spectacular development of Zephyros Village 4, designed and developed in a prime location in Pafos.</p>
                    <p style="text-align: justify;"><span>Located in the traditional village of Mandria and within walking distance to the sandy beaches of the area, Zephyros Village 4 comprises of apartments and maisonettes, nestled in a secure and peaceful environment. The development also <span>consists of a</span>&nbsp;communal swimming pool. Private parking facilities and landscaped&nbsp;areas contribute to the natural greenery surrounding the project. Each Mandria property for sale in Zephyros Village 4 offers unbeatable value for money, the lowest in Pafos. This development is truly a world of its own.&nbsp;</span></p>
                    <p style="text-align: justify;"><span>Zephyros Village 4 also offers nearby attractions including the legendary &lsquo;Birthplace of Aphrodite&rsquo; and the spectacular internationally acclaimed 18-hole champion golf course at Secret Valley. The project is also close to amenities and is a short drive from Pafos Town and the Pafos International Airport.</span><br /><br /><span>Built to the highest standards, Mandria properties for sale in Zephyros Village 4 are a wonderful development offering all the advantages of living in Cyprus.&nbsp;</span></p>
                    <p style="text-align: justify;"><span>Combine all the benefits that Mandria properties for sale in Zephyros Village 4 offer with easy communication by road and air and you will certainly appreciate the joys of living here.</span></p>',
                ],
                [
                    'Зефирос Вилладж 4 - Очаровательная недвижимость в прибрежной зоне',
                    '<p style="text-align: justify;">&nbsp;</p>
                    <p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p style="text-align: justify;">&nbsp;</p>
                    <p>2-х и 3-х спальные апартаменты под ключ.<br />2-х спальные таунхаусы под ключ.<br />Два бассейна общего пользования (для взрослых и для детей).<br />Детская площадка.<br />Общая зелёная зона.<br />500 метров от моря.<br />5 минут езды от Международного Пафос Aэропорта.<br />5 минут езды к Гольф Клубу Сикрет Валлей.<br />10 минут езды к Заливу в Писсури.<br />15 минут езды до центра города Пафос.<br />15 минут езды до Международной Школы Пафоса.</p>
                    <p style="text-align: justify;">&nbsp;</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">&nbsp;</p>
                    <p style="text-align: justify;"><span>Зефирос Вилладж 4&nbsp;- проект, отлично расположенный в живописной деревне Мандрия, которая находится на расстоянии пешей прогулки от залива Мандрия, только в 5 км от Международного аэропорта Пафоса, в 10 км от Пафоса и в 3 км от гольф поля "Сикрет Валей".&nbsp;</span></p>
                    <p style="text-align: justify;"><span>Проект находится недалеко от песчаных пляжей и рядом с достопримечательностями района, такими как Купальня Афродиты, гольф поле "Сикрет Валей", Международный аэропорт Пафоса и центр города Пафоса. Восхитительный вид на Средиземное море, гармония и спокойствие.</span></p>
                    <p style="text-align: justify;"><span>Эта недвижимость - идеальна в качестве постоянного жилья или места для отдыха, отличный инвестиционный проект.</span></p>',
                ],
            ],
            [
                [
                    'Zephyros Village 4 – Charming Coastal Properties',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; A Modern apartment and town house complex. <br />&bull; Located in the village of Mandria with its quaint and colourful town square.<br />&bull; Excellent specifications.<br />&bull; Walking distance to the beach.<br />&bull; 10 minutes drive to Venus Rock Golf Resort.<br />&bull; 5 minutes drive to Pafos International Airport, 15 minutes drive to Pafos Town.<br />&bull; Close to a wide range of services and amenities.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">The perfect home for you is one that reflects your personality, preference and lifestyle, something that makes the visitor feel welcome and the owner comfortable to live in and proud to own. These elements encompass the spectacular development of Zephyros Village 4, designed and developed in a prime location in Pafos.</p>
                    <p style="text-align: justify;"><span>Located in the traditional village of Mandria and within walking distance to the sandy beaches of the area, Zephyros Village 4 comprises of apartments and maisonettes, nestled in a secure and peaceful environment. The development also <span>consists of a</span>&nbsp;communal swimming pool. Private parking facilities and landscaped&nbsp;areas contribute to the natural greenery surrounding the project. Each Mandria property for sale in Zephyros Village 4 offers unbeatable value for money, the lowest in Pafos. This development is truly a world of its own.&nbsp;</span></p>
                    <p style="text-align: justify;"><span>Zephyros Village 4 also offers nearby attractions including the legendary &lsquo;Birthplace of Aphrodite&rsquo; and the spectacular internationally acclaimed 18-hole champion golf course at Secret Valley. The project is also close to amenities and is a short drive from Pafos Town and the Pafos International Airport.</span><br /><br /><span>Built to the highest standards, Mandria properties for sale in Zephyros Village 4 are a wonderful development offering all the advantages of living in Cyprus.&nbsp;</span></p>
                    <p style="text-align: justify;"><span>Combine all the benefits that Mandria properties for sale in Zephyros Village 4 offer with easy communication by road and air and you will certainly appreciate the joys of living here.</span></p>',
                ],
                [
                    'Зефирос Вилладж 4 - Очаровательная недвижимость в прибрежной зоне',
                    '<p style="text-align: justify;">&nbsp;</p>
                    <p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p style="text-align: justify;">&nbsp;</p>
                    <p>2-х и 3-х спальные апартаменты под ключ.<br />2-х спальные таунхаусы под ключ.<br />Два бассейна общего пользования (для взрослых и для детей).<br />Детская площадка.<br />Общая зелёная зона.<br />500 метров от моря.<br />5 минут езды от Международного Пафос Aэропорта.<br />5 минут езды к Гольф Клубу Сикрет Валлей.<br />10 минут езды к Заливу в Писсури.<br />15 минут езды до центра города Пафос.<br />15 минут езды до Международной Школы Пафоса.</p>
                    <p style="text-align: justify;">&nbsp;</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">&nbsp;</p>
                    <p style="text-align: justify;"><span>Зефирос Вилладж 4&nbsp;- проект, отлично расположенный в живописной деревне Мандрия, которая находится на расстоянии пешей прогулки от залива Мандрия, только в 5 км от Международного аэропорта Пафоса, в 10 км от Пафоса и в 3 км от гольф поля "Сикрет Валей".&nbsp;</span></p>
                    <p style="text-align: justify;"><span>Проект находится недалеко от песчаных пляжей и рядом с достопримечательностями района, такими как Купальня Афродиты, гольф поле "Сикрет Валей", Международный аэропорт Пафоса и центр города Пафоса. Восхитительный вид на Средиземное море, гармония и спокойствие.</span></p>
                    <p style="text-align: justify;"><span>Эта недвижимость - идеальна в качестве постоянного жилья или места для отдыха, отличный инвестиционный проект.</span></p>',
                ],
            ],
            [
                [
                    'Pomos Sunset 2 - Idyllic location',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Deluxe 2 and 3 bdr. beach-front villas and bungalows, in one of the most beautiful villages in Cyprus.<br />&bull; All properties boast private swimming pools.<br />&bull; Bungalows with roof terraces.<br />&bull; Low building density area.<br />&bull; Adjacent to the picturesque fishing harbour of Pomos.<br />&bull; Close to all village amenities and services.<br />&bull; Only 100 m from the sea.<br />&bull; 25 min drive to Polis Chrysochous &amp; Latchi Yachting Marina / 75 min to Pafos International Airport.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">You have officially found paradise. It is no coincidence that Pomos has been described as Cyprus&rsquo; version of the Garden of Eden.</p>
                    <p style="text-align: justify;"><span>Surrounded by some of the most exquisite fauna and flora on the island, as well as the Paphos forest, this place is perfectly complemented by breathtaking sea views. Which you will be able to enjoy almost every night from your roof terrace, chilled wine or frosty beer in hand as you contemplate how fortunate you are to enjoy your own piece of paradise in this luxury development of only four villas.</span><br /><br /><span>Whether it&rsquo;s the two bedroom or three bedroom option you indulge yourself in, you can be confident they will boast superb quality finishes, spacious interiors and of course your own private garden and swimming pool. The private parking space naturally finishes off your own little place in paradise although you might not need it seeing as though you can walk to the beach for your daily dip.&nbsp;</span><br /><br /><span>Pomos villas for sale in Pomos Sunset 2 are just one of those properties that really give you an idea of how beautiful, tranquil and peaceful Cyprus can be. In fact, as you walk to a cosy seaside tavern for a fresh fish meal and take in the majesty of your surroundings, you really will feel as if you have found that bit of paradise, just for you.</span><span><span><strong><br /></strong></span></span></p>',
                ],
                [
                    'Помос Сансет 2 - Идеальное месторасположение',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Небольшой проект готовых под ключ вилл.<br />Высокого уровня технические характеристики,частные бассейны.<br />Большие участки позволяющие обустроить сад.<br />Великолепный вид на море и потрясающие закаты.<br />На первой линии.<br />Рядом с живописной рыбацкой гаванью Помос.<br />Окружённый оливковыми деревьями и апельсиновыми рощами.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Окружен самой прекрасной флорой и фауной на острове, а также лесом Пафоса. Восхитительные морские виды отлично дополняют общую картину, которой вы будете наслаждаться практически каждый вечер, сидя на своей террасе на крыше, держа бокал охлажденного вина или холодного пива и осознавая, как же вам повезло насладиться пребыванием в этом роскошном комплексе из всего четырех вилл.</span><br /><br /><span>Будь то вариант с двумя или тремя спальнями, вы можете быть уверены в превосходном качестве отделки, просторности и, конечно, наличии собственного бассейна и сада. Собственная парковка естественным образом завершает превращение этого небольшого местечка в рай, хотя парковка может вам и не понадобиться, так как вы можете пешком прогуляться до пляжа, чтобы искупаться.</span><br /><br /><span>&laquo;Помос Сансет 2&raquo; &mdash; один из проектов, позволяющих в полной мере осознать всю красоту и спокойствие, царящие на Кипре. На самом деле, направляясь в уютную таверну на побережье, чтобы отведать блюда из свежей рыбы и полюбоваться величием окружающей природы, вы как будто окажетесь в раю, созданном специально для вас.</span></p>',
                ],
            ],
            [
                [
                    'Pomos Sunset 2 - Idyllic location',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Deluxe 2 and 3 bdr. beach-front villas and bungalows, in one of the most beautiful villages in Cyprus.<br />&bull; All properties boast private swimming pools.<br />&bull; Bungalows with roof terraces.<br />&bull; Low building density area.<br />&bull; Adjacent to the picturesque fishing harbour of Pomos.<br />&bull; Close to all village amenities and services.<br />&bull; Only 100 m from the sea.<br />&bull; 25 min drive to Polis Chrysochous &amp; Latchi Yachting Marina / 75 min to Pafos International Airport.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">You have officially found paradise. It is no coincidence that Pomos has been described as Cyprus&rsquo; version of the Garden of Eden.</p>
                    <p style="text-align: justify;"><span>Surrounded by some of the most exquisite fauna and flora on the island, as well as the Paphos forest, this place is perfectly complemented by breathtaking sea views. Which you will be able to enjoy almost every night from your roof terrace, chilled wine or frosty beer in hand as you contemplate how fortunate you are to enjoy your own piece of paradise in this luxury development of only four villas.</span><br /><br /><span>Whether it&rsquo;s the two bedroom or three bedroom option you indulge yourself in, you can be confident they will boast superb quality finishes, spacious interiors and of course your own private garden and swimming pool. The private parking space naturally finishes off your own little place in paradise although you might not need it seeing as though you can walk to the beach for your daily dip.&nbsp;</span><br /><br /><span>Pomos villas for sale in Pomos Sunset 2 are just one of those properties that really give you an idea of how beautiful, tranquil and peaceful Cyprus can be. In fact, as you walk to a cosy seaside tavern for a fresh fish meal and take in the majesty of your surroundings, you really will feel as if you have found that bit of paradise, just for you.</span><span><span><strong><br /></strong></span></span></p>',
                ],
                [
                    'Помос Сансет 2 - Идеальное месторасположение',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Небольшой проект готовых под ключ вилл.<br />Высокого уровня технические характеристики,частные бассейны.<br />Большие участки позволяющие обустроить сад.<br />Великолепный вид на море и потрясающие закаты.<br />На первой линии.<br />Рядом с живописной рыбацкой гаванью Помос.<br />Окружённый оливковыми деревьями и апельсиновыми рощами.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Окружен самой прекрасной флорой и фауной на острове, а также лесом Пафоса. Восхитительные морские виды отлично дополняют общую картину, которой вы будете наслаждаться практически каждый вечер, сидя на своей террасе на крыше, держа бокал охлажденного вина или холодного пива и осознавая, как же вам повезло насладиться пребыванием в этом роскошном комплексе из всего четырех вилл.</span><br /><br /><span>Будь то вариант с двумя или тремя спальнями, вы можете быть уверены в превосходном качестве отделки, просторности и, конечно, наличии собственного бассейна и сада. Собственная парковка естественным образом завершает превращение этого небольшого местечка в рай, хотя парковка может вам и не понадобиться, так как вы можете пешком прогуляться до пляжа, чтобы искупаться.</span><br /><br /><span>&laquo;Помос Сансет 2&raquo; &mdash; один из проектов, позволяющих в полной мере осознать всю красоту и спокойствие, царящие на Кипре. На самом деле, направляясь в уютную таверну на побережье, чтобы отведать блюда из свежей рыбы и полюбоваться величием окружающей природы, вы как будто окажетесь в раю, созданном специально для вас.</span></p>',
                ],
            ],
            [
                [
                    'Regina Court 12 - New modern design project in tourist area',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Located in a prime residential area of Limassol, comprising of modern apartments, ranging from 1, 2 and 3 bedroom units, only 5 minutes walk to sandy organised beach and 5 star hotels. <br />&bull; Contemporary architectural design, built to the highest specifications and hi-tec specifications.<br />&bull; Centrally located in one of the most sought-after areas of Limassol and near the famous tourist area.<br />&bull; Gated properties for added privacy and security / Underground parking for all residents.<br />&bull; Large communal swimming pool and children\'s paddling pool, BBQ and sunbeds area for residents\' use only.<br />&bull; Title deeds available.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">If there&rsquo;s something that Regina Court 12 offers, it&rsquo;s a lifestyle built along luxury living and being designed by one of Cyprus leading developers, you can be assured that every last detail of this project in Limassol&rsquo;s popular Germasoyia&nbsp;tourist area is a reflection of modern design.&nbsp;</p>
                    <p style="text-align: justify;">Whether it&rsquo;s the electric gate with individual remote controls for added privacy or the provision for light sensors at both the main entrance and the underground parking area with storage facilities, you know you&rsquo;ll be surrounded by modern features from the moment you enter in these Limassol apartments for sale in Regina Court 12.</p>
                    <p style="text-align: justify;">Out of seventeen Limassol apartments for sale, you have the option of a studio, one-bedroom apartments, two-bedroom or three-bedroom Penthouses. Whatever size you want, there is one thing that will not be compromised and that is the dedication to detail and quality throughout this project. From the imported EU quality kitchens, wardrobes and internal doors to the safety locks on both the main entrance and sliding doors there is hardly anything that Limassol apartments for sale in Regina Court 12 don\'t offer as a testament to modern luxury.</p>
                    <p style="text-align: justify;">Of course, as Cyprus is the sunshine island, it makes sense that this testament is continued to the outside of Regina Court 12 with a communal area dedicated to modern relaxation. Boasting both an adult and children&rsquo;s pool, ample sun bed terraces you&rsquo;ll be able to enjoy the sunshine with taste as the BBQ area has a working area with a basin.</p>
                    <p style="text-align: justify;">Naturally the project would have to be in the appropriate location to live up to its quality build and the Germasoyia&nbsp;Tourist area with its proximity to the Limassol tourist region means that you are within walking distance to both sandy beaches as well as restaurants, cafes, bars and even nightclubs. You&rsquo;re also ten minutes from the main town and its shopping regions while living in Limassol means you are central located in Cyprus, with the two international airports of Larnaca and Paphos both just forty minutes away.</p>
                    <p style="text-align: justify;">Whatever the reasons you may be interested in <strong>Limassol apartments for sale</strong> in Regina Court 12, whether you want to enjoy its testament to modern luxury yourself or whether you&rsquo;re using it as an investment, you know you&rsquo;ve made the right choice as the developer is the only one in Cyprus to have been awarded the prestigious ISO 9001 certification.</p>',
                ],
                [
                    'Реджина Корт 12 - Современный проект расположенный в туристической зоне',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Современный, малоэтажный проект.<br />При въезде на территорию проекта - шлагбаум, а также крытая парковка.<br />Большой бассейн и детский бассейн.<br />Общая зона для барбекю.<br />Две минуты до популярной туристической зоны и отелей.<br />Отличный потенциал сдачи жилья в аренду.<br />По желанию покупателя, возможность приобретения полностью меблированных апартаментов.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Как только вы окажетесь на территории &laquo;Реджина Корт 12&raquo;, вы можете быть уверены в модернизированной оснащенности комплекса: будь то электронные ворота с персональным пультом управления для обеспечения дополнительной безопасности или сенсорное освещение как главного въезда, так и подземной парковки с кладовыми помещениями. </span></p>
                    <p style="text-align: justify;"><span>Из семнадцати вариантов вы можете выбрать между студией, двумя апартаментами с одной спальней, десятью двухспальными или четырьмя трехспальными апартаментами. Совершенно не важно, какой вариант вы выберете в итоге, так как вы можете быть абсолютно уверены в том, что каждая деталь проекта продумана до мелочей и качественно реализована. Все в &laquo;Реджина Корт 12&raquo;, начиная от европейского кухонного оборудования, гардеробных и внутренних дверей, и заканчивая замками как на входных, так и на раздвижных дверях, соответствует представлениям о современной роскоши.</span><br /><br /><span>И, конечно же, так как Кипр &mdash; это солнечный остров, было целесообразно позаботиться о благоустройстве за пределами &laquo;Реджина Корт 12&raquo;: на общей территории вы сможете отлично отдохнуть. Есть бассейн для взрослых и детей. Вы сможете нежиться под солнцем и наслаждаться вкусом шашлыков, только что приготовленных на площадке для барбекю.</span><br /><br /><span>Месторасположение объекта в районе Гермасойя и непосредственная близость туристически развитого Лимассола открывают перед вами множество возможностей: песчаные пляжи, а также рестораны, кафе, бары и даже ночные клубы находятся на расстоянии пешей прогулки. Всего в десяти минутах расположен главный город и его торговые центры. Живя в Лимассоле, вы находитесь в самом центре Кипра. Международные аэропорты Ларнаки и Пафоса находятся всего в сорока минутах езды.</span><br /><br /><span>По каким бы соображениям вы бы ни выбрали &laquo;Реджина Корт 12&raquo;, хотите ли вы насладиться современной роскошью или выгодно вложить свои средства, будьте уверены в правильности своего решения, так как этот проект реализован единственным на Кипре застройщиком, имеющим международно признанный сертификат качества ISO 9001.</span></p>',
                ],
            ],
            [
                [
                    'Kinousa Plots - Breathtaking views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Title Deeds Available.<br />&bull; Large plots&nbsp;for custom-built villas.<br />&bull; High&nbsp;elevation commanding spectacular sea&nbsp;views.<br />&bull; Healthy climate (clean air, no humidity).<br />&bull; Only 15 minutes&rsquo; drive from Polis town.<br />&bull; Adjacent to a lush pine forest.<br />&bull; Peaceful location in beautiful green surroundings.<br />&bull; Paradise for nature lovers.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Located only 10km away from Polis Chrysochous, along the outskirts of Kinousa Village, these magnificent plots are a dream for all nature lovers wanting to buy property in Cyprus.</p>
                    <p style="text-align: justify;"><span>Situated on a hillside, amongst forest and mountain terrain, these 19 plots for sale in Kinousa village, Polis offer unique and unobstructed views overlooking the Mediterranean Sea.&nbsp;</span><br /><br /><span>Only a short drive away from restaurants, beaches, supermarkets and all the necessary facilities, Kinousa Plots are excellent if considering buying property in Cyprus for retirement or that special holiday home.</span></p>',
                ],
                [
                    'Участки Кинуса - Захватывающий дух панорамный вид',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Большие участки под индивидуальное строительство.<br />За счёт холмистой местности открывается великолепный панорамный вид на море.<br />Здоровый климат (чистый воздух, очень низкий процент влажности воздуха).<br />Всего в 15 минутах езды от города Полис.<br />Рядом с пышным сосновым лесом.<br />Спокойное место окружённое зеленью.<br />Рай для любителей природы.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;"><span>Находятся на склоне, посреди леса и в горной местности. С этих 19 участков открываются панорамные виды на Средиземное море. Участки могут быть приобретены для последующей застройки компанией Aristo или выбранным вами застройщиком.</span><br /><br /><span>Всего в нескольких минутах езды расположены рестораны, пляжи, супермаркеты и все необходимые объекты. Участки &laquo;Киноуса&raquo; отлично подходят для приобретения недвижимости на Кипре для проведения времени в уединении или строительства летнего дома.</span><span><span style="text-decoration: underline;"><strong><br /></strong></span></span></p>',
                ],
            ],
            [
                [
                    'Mitas & Stasis Plots - Panoramic views',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Title Deeds Available.<br /> &bull; Off-plan detached villa for sale in Peyia Cyprus in the Coral Bay area.<br />&bull; Designed on a large residential plot with spacious living areas.<br />&bull; Private swimming pool. <br />&bull; Quality specifications.<br />&bull; Close to the renowned blue-flag beaches of Coral Bay, shops, places of interest, services and amenities.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p>This villa for sale in Peyia Cyprus is situated on a privileged site near the famous Coral Bay sandy beaches.</p>',
                ],
                [
                    'Участки Митас и Стасис - Панорамный вид на море',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Отдельно стоящие виллы в стадии строительства, расположенные в районе Корал Бэй.<br />Очень просторные жилые помещения.<br />Земельный Участок 622m&sup2;.<br />Имеется Титульный сертификат.<br />Частный бассейн.<br />Высокого уровня технические характеристики и отделочные материалы.<br />В непосредственной близости к пляжу Корал Бэй, магазинам, интересным местам и многим торговым точкам.</p>
                    <p><span style="text-decoration: underline;">Описание</span>:</p>
                    <p>Данная вилла расположена в элитной части деревни Пейя, вблизи популярных пляжей Кораллового Залива.</p>',
                ],
             ],
            [
                [
                    'Monagroulli Hills - Real country side villas in large plots',
                    '<p><span style="text-decoration: underline;"><strong>Key Features</strong></span>:</p>
                    <p>&bull; Located in a prime residential area on the outskirts of Limassol, comprising modern 2 and 3 bedroom villas on large plots. <br />&bull; Contemporary architectural design combining external use of stone, built to the highest specifications. <br />&bull; Gated properties for added privacy and security, Private swimming pools and roof gardens.<br />&bull; Close to amenities, services and picturesque villages with variety of services.<br />&bull; Not far from Limassol\'s renowned \'Governors\' and \'St. George\' beaches with organised water sports facilitiest.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">These Monagroulli villas for sale in Monagroulli Hill Village are considered to be a great investment opportunity.&nbsp;Monagroulli Hills includes only a range of villa designs (two storey and bungalows) all with private swimming pools and roof gardens. The development is gated for added privacy.</p>
                    <p style="text-align: justify;">The benefits of these Monagroulli villas project is its location, in an unspoiled area surrounded by rich vegetation and fields, its low density building ratio ensuring privacy, space and ample green areas. Within 2 minutes walking distance is the picturesque village square!</p>
                    <p style="text-align: justify;">It also has easy access to Limassol town, all the amenities and various golden sandy beaches.</p>',
                ],
                [
                    'Монагрулли Хиллс - Виллы с большими земельными участками в сельской местности',
                    '<p><span style="text-decoration: underline;">Ключевые особенности</span>:</p>
                    <p>Расположен на холме, на окраине Лимассола.&nbsp;<br />Низкий процент застройки на виллы.<br />В окружении полей с великолепным видом на море.<br />Рядом находятся несколько местных деревень с удобствами и услугами.<br />Въезд на территорию проекта защищён шлагбаумом.<br />Виллы с бассейнами и терассой на крыше.</p>
                    <p><span style="text-decoration: underline;">Описание:</span></p>
                    <p style="text-align: justify;"><span>&laquo;Монагрули Хиллс&raquo; состоит только из ряда вилл (двухэтажных и бунгало) с частными бассейнами и садами на крышах. В качестве дополнительной меры безопасности установлены ворота.</span><br /><br /><span>К преимуществам объекта можно отнести его месторасположение на нетронутой территории, окруженной богатой растительностью и полями, низкий показатель плотности застройки, гарантирующий уединение, достаточное количество свободного пространства и обширные зеленые территории. В 2 минутах ходьбы находится колоритная деревенская площадь!</span><br /><span>Отсюда легко добираться до Лимассола, всех хозяйственно-бытовых объектов и золотых песчаных пляжей.</span></p>',
                ],
            ],
            [
                [
                    'Venus Rock - Premier Residences',
                    '<p><span style="text-decoration: underline;"><strong>Key Features:</strong></span></p>
                    <p>&bull; Unique luxury 3 bedroom detached villas built around the stunning international 18-hole championship golf course of Secret Valley at the Venus Rock Resort.<br />&bull; The Venus Rock Resort is set to become the largest golf-integrated spa resort in Europe.<br />&bull; The amphitheatrically-natured terrain allows all villas and plots to enjoy breathtaking views of the Mediterranean.<br />&bull; High rental demand from golfer\'s and holiday makers, all year round.<br />&bull; Close to places of interest, amenities, services, beaches, resorts, Pafos International Airport.</p>
                    <p><span style="text-decoration: underline;"><strong>Description</strong></span>:</p>
                    <p style="text-align: justify;">Perched on the hills adjacent to the Secret Valley Golf Course, one will discover an appealing community of elite villas. Aristo Developers, Cyprus premier golf and residential developer, have aesthetically designed these unique properties to reflect the natural beauty of the area.</p>
                    <p style="text-align: justify;"><span>Ranging from three to four bedrooms Cyprus golf villas for sale, private swimming pools and quality specifications, Ha-Potami Panorama C Villas command exceptional views of the Mediterranean, and are a short drive from one of Cyprus&rsquo; most popular tourist sites: Petra tou Romiou &ndash; the birthplace of the legendary goddess Aphrodite.</span><br /><br /><span>The inspiration behind these Cyprus golf villas for sale is the attraction for golf and the location &ndash; one of the most sought after sites on the island of Cyprus. Peace of mind, tranquillity, fresh air and a pleasant climate are all the prerequisites befitting the lifestyle at Ha-Potami, as is the convenient access to all of Cyprus&rsquo; major towns including five star hotels and resorts, places of interest, Pafos International Airport &ndash; offered by the highway neighbouring the villas.</span><br /><br /><span>Aristo Developers has assigned a limited selection of plots available for sale, all of which are located within the resort. These spacious plots allow for an overall floor-space of 20% of the total land area.</span><br /><br /><span>Combining the benefits of an exceptional, luxurious and functional home &ndash; built by a reputable developer, and the privilege of living in a European country with a diverse and enviable lifestyle these Cyprus Golf villas for sale fit the profile for a dream property in the perfect location.</span></p>',
                ],
                [
                    'Venus Rock (Ха Потами Си Панорама - Уникальные виллы с большими участками рядом с Гольф полями)',
                    '<p style="text-align: justify;"><span style="text-decoration: underline;">Ключевые особенности</span>:&nbsp;</p>
                    <p>Уникальные виллы по привлекательным ценам, рядом с гольф полями. <br />Виллы с большими земельными участками и частным бассейном.<br />Тихая местность и захватывающие дух виллы.<br />Море в шаговой доступности.<br />Эксклюзивный район с лёгким доступом к шоссе.</p>
                    <p style="text-align: justify;">&nbsp;<span style="text-decoration: underline;">Описание</span>:</p>
                    <p style="text-align: justify;">Новая автомагистраль связывает Secret Valley Golf Resort с Пафосом, а также с Лимассолом, Никосией и Ларнакой, находящимися далее вдоль побережья. Находясь подальше от побережья, вдали от суеты, это прекрасное место позволит вам насладиться спокойствием, чистым воздухом и более сухим и приятным климатом.</p>
                    <p style="text-align: justify;">Площадка для гольфа и курорт Secret Valley созданы для того, чтобы сделать вашу жизнь комфортной, приятной и доставляющей удовольствие. Это первоклассная недвижимость на Кипре, достойная того, чтобы вкладывать в нее средства. На территории курорта есть участки для продажи с разрешением строить дома общей площадью 20% от площади участка.&nbsp;</p>
                    <p style="text-align: justify;"><span>Благодаря природе в этой местности, очень большим зеленым территориям и размерам участков вы можете наслаждаться видами, практически не заслоняемыми соседними домами. Имеются все необходимые коммуникации, включая асфальтированную подъездную дорогу, водоснабжение, электричество, канализацию и освещение.</span></p>',
                ],
            ],
            [
                [
                    'Plage Residences – Beautiful homes overlooking the Mediterranean',
                    '<p><strong><span style="text-decoration: underline;">Key Features:</span></strong></p>
                    <p>&bull; Plage Residences are modern sea view villas developed off the west coast of Pafos<br />&bull; Located in the heart of the tourist area, and within walking distance to the sea, &ldquo;Plage Residences&rdquo; offers potential buyers the option of three or four bedroom detached homes in lush, green surroundings.<br />&bull; Short drive to 18-hole golf courses and five-star resorts.<br />&bull; 15 minutes drive to the Pafos International Airport.</p>
                    <p><strong><span style="text-decoration: underline;">Description</span>:</strong></p>
                    <p style="text-align: justify;">Located in the heart of the tourist area, and within walking distance to the sea, &ldquo;Plage Residences&rdquo; offers potential buyers the option of three or four bedroom luxury properties for sale in Paphos in lush, green surroundings.</p>
                    <p style="text-align: justify;">Characterised by their aesthetic charm and unique architectural design, these spaciously comfortable luxury properties for sale in Paphos are a perfect marriage of modern and traditional elements, creatively incorporating the use of wood and stone in their design.</p>
                    <p style="text-align: justify;">And if location is a prerequisite, <strong>luxury properties for sale in Paphos</strong> in &ldquo;Plage Residences&rdquo; are ideally located, offering easy access to a variety of services and amenities, places of interest, blue-flag beaches, easy access to highways, schools, hospitals, shops, 18-hole golf courses and five-star resorts; the Pafos International Airport is a short drive away.</p>',
                ],
                [
                    'Пляж Резиденсес',
                    '<p style="text-align: justify;">Расположенный в самом сердце туристической зоны, в пешей доступности до моря, проект "Пляж Резиденсес" , предлагает потенциальным покупателям возможность приобретения элитной трех и четырех спальной недвижимости в утопающих в зелени окрестностях Пафоса.</p>
                    <p style="text-align: justify;">Проект характеризуется своим эстетическим шармом и уникальным архитектурным дизайном. Эта просторная и комфортабельная элитная недвижимость, в Пафосе, идеально объединяет в себе как традиционные, так и современные элементы, творчески предусматривающие использование дерева и камня в дизайне.</p>
                    <p style="text-align: justify;">И, если расположение проекта, является предпосылкой для элитной недвижимости, то проект "Пляж Резиденсес", идеально расположен в Пафосе и обеспечивает легкий доступ к целому ряду услуг и удобств, достопримечательностям, пляжам с синим флагом; имеется легкий доступ к шоссе, &nbsp;школам, больницам , магазинам, 18-луночному полю для гольфа и пятизвездочным курортам; в нескольких минутах езды, находится Международный аэропорт Пафоса.&nbsp;</p>',
                ],
            ],
            [
                [
                    'Jasmine Gardens 1, 3',
                    '<p style="text-align: justify;">To the 50 and more projects of the Group that are currently in progress all over Cyprus, Aristo Developers adds now &ldquo;Jasmine Gardens&rdquo; &ndash; a project consisting of luxury residences in the heart of Pa<span class="text_exposed_show">fos. This new project is developed in a fine location with immediate access to all the amenities of a modern city such as schools, shopping malls, luxury hotels, and restaurant facilities, and only 5 minutes from the historic city centre.</span></p>
                    <p style="text-align: justify;">Jasmine Gardens consists of spacious 3 bedroom detached residences up to 210 m&sup2; of covered spaces, excellent architectural aesthetics and high technical specifications combining comfort and functionality. Each residence has its own private pool, covered parking space and large garden.</p>
                    <p style="text-align: justify;">Overlooking the sea, the Jasmine Gardens residences are offered as an ideal choice both for residential use and for investment.</p>',
                ],
                [
                    'Jasmine Gardens 1, 3',
                    '<p style="text-align: justify;">К &nbsp;более чем пятидесяти текущим проектам Группы, которые в настоящее время реализуются на Кипре, Aristo Developers добавляет "Jasmine Gardens"&nbsp;- проект, состоящий из роскошных вилл в самом сердце Пафоса. Этот проект расположен в прекрасном месте в непосредственной близости со всеми удобствами современного города, такие как школы, торговые центры, роскошные отели и рестораны, и всего в 5 минутах от исторического центра.</p>
                    <p style="text-align: justify;">Jasmine Gardens&nbsp;состоит из просторных 3-х спальных вилл общей крытой площадью до 210 м &sup2;, отличной архитектурной композиции и высочайших технических характеристик, сочетающих комфорт и функциональность. Каждая вилла имеет свой собственный бассейн, крытую парковку и большой сад.</p>
                    <p style="text-align: justify;">Виллы&nbsp;Jasmine Gardens&nbsp;с видом на море являются идеальным вариантом для постоянного проживания, а также в качестве инвестиций.</p>',
                ],
            ],
        ];

        foreach ($items as $key => $item) {

            $object = new Object();

            $object->user_id = 1;
            $object->region_id = $item[0];
            $object->location_id = $item[1];
            $object->type_id = $item[2];
            $object->coordinates = $item[4];
            $object->covered = $item[5];
            $object->bedroom = $item[6];

            $object->name = $items_lang[$key][1][0];
            $object->text = $items_lang[$key][1][1];

            $object->name_en = $items_lang[$key][0][0];
            $object->text_en = $items_lang[$key][0][1];

            $property = new Property();

            if ($object->save()) {
                $property->object_id = $object->id;
            }

            $property->user_id = 1;
            $property->region_id = $item[0];
            $property->location_id = $item[1];
            $property->type_id = $item[2];
            $property->price = $item[3];
            $property->coordinates = $item[4];
            $property->covered = $item[5];
            $property->bedroom = $item[6];
            $property->vat = $item[7];

            $property->name = $items_lang[$key][1][0];
            $property->text = $items_lang[$key][1][1];

            $property->name_en = $items_lang[$key][0][0];
            $property->text_en = $items_lang[$key][0][1];

            $property->save();
        }
    }

    public function down()
    {
        $this->truncateTable('property_lang');

        $this->truncateTable('object_lang');

        $this->truncateTable('property');

        $this->truncateTable('object');
    }
}
