-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 07:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(2, 'Jedzenie', 'Znajdziesz tu przepisy inspirowane sezonowością, opowieści o kulinarnych eksperymentach, domowe wypieki, kiszonki, tajniki fermentacji i rytuały wok&oacute;ł jedzenia. Od prostych dań po kulinarną magię.'),
(3, 'Muzyka', 'Posty o tym, czego słuchać i dlaczego warto. Analizy album&oacute;w, polecenia nowych artyst&oacute;w, playlisty na r&oacute;żne nastroje, koncertowe relacje i refleksje o roli muzyki w codzienności.'),
(4, 'Sztuka', 'Inspiracje wizualne, wystawy warte odwiedzenia, sylwetki tw&oacute;rc&oacute;w, a także przemyślenia na temat tworzenia, patrzenia i rozumienia sztuki &ndash; tej klasycznej i tej zupełnie wsp&oacute;łczesnej.'),
(5, 'Nauka i technologia', 'Popularnonaukowe ciekawostki, nowinki technologiczne, recenzje aplikacji i gadżet&oacute;w, a także tematy o AI, kosmosie, neuronaukach i tym, jak technologia zmienia nasze życie.'),
(6, 'Natura', 'Historie z lasu, ogrodu i g&oacute;r. Slow life, permakultura, zioła, mikroświaty i obserwacje przyrodnicze &ndash; wszystko, co pozwala nawiązać głębszą relację z naturą.'),
(7, 'Podr&oacute;ż', 'Relacje z wypraw &ndash; tych dalekich i tych tuż za rogiem. Miejsca z duszą, nieoczywiste trasy, podr&oacute;że solo i z rodziną, a także porady, jak odkrywać świat świadomie i z szacunkiem.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(1, 'Sztuka prostoty - jak chleb na zakwasie zmienia codzienność', 'Chleb. Dla wielu to tylko dodatek do śniadania, tło dla kanapki czy nieodłączny element obiadu. Ale gdy zrobisz go samodzielnie, na własnym zakwasie, z mąki, wody i soli &ndash; staje się czymś więcej. Rytuałem. Medytacją. Powrotem do korzeni.\r\n\r\nPieczenie chleba na zakwasie to proces wymagający cierpliwości, ale dający ogromną satysfakcję. Zakwas to żywa kultura bakterii i drożdży &ndash; jeśli dobrze się nim opiekujesz, odwdzięcza się wyjątkowym smakiem i strukturą. Chrupiąca sk&oacute;rka, wilgotny środek z charakterystycznymi dziurami i ten głęboki, lekko kwaskowy aromat &ndash; tego nie da się por&oacute;wnać z żadnym chlebem ze sklepu.\r\n\r\nMoje początki były dalekie od ideału. Zakwas nie chciał rosnąć, chleb był ciężki jak cegła, a kuchnia wyglądała jak po wybuchu mącznej bomby. Ale z czasem nauczyłem się słuchać ciasta &ndash; kiedy potrzebuje więcej wody, kiedy za długo leżakuje, a kiedy jest gotowe do pieczenia. To trochę jak rozmowa &ndash; bez sł&oacute;w, ale pełna znaczeń.\r\n\r\nPieczenie chleba zmieniło moje podejście do jedzenia. Nagle okazało się, że coś tak prostego może być głębokim doświadczeniem. Dziś w każdy piątek wieczorem wyrabiam ciasto, a w sobotę rano piekę bochenek, kt&oacute;ry wystarcza na cały tydzień. To m&oacute;j rytuał &ndash; i moment spokoju w zabieganym życiu.\r\n\r\nJeśli jeszcze nigdy nie piekliście chleba &ndash; spr&oacute;bujcie. Nie musicie mieć specjalnego sprzętu ani doświadczenia. Wystarczy mąka żytnia, woda, czas i trochę czułości. Gwarantuję, że już po pierwszym udanym bochenku będziecie patrzeć na chleb zupełnie inaczej. Nie jak na zwykły produkt spożywczy, ale jak na coś, co ma duszę.', '1752852041chleb.jpg', '2025-07-18 15:20:41', 2, 1, 0),
(3, 'Muzyka jako emocjonalny kompas - jak dźwięki prowadzą nas przez codzienność', 'Muzyka towarzyszy nam niemal nieustannie &ndash; w słuchawkach, w tle, w samochodzie, na spacerze. Czasem nawet nie zdajemy sobie sprawy, jak głęboko wpływa na nasze samopoczucie, decyzje, wspomnienia. Dla mnie muzyka to coś więcej niż dźwięki &ndash; to narzędzie emocjonalne. Kompas, kt&oacute;ry pomaga odnaleźć się w chaosie dnia, przefiltrować nastr&oacute;j albo zatrzymać się na chwilę refleksji.\r\n\r\nSą piosenki, kt&oacute;re grają we mnie jak mantry. Gdy potrzebuję skupienia &ndash; sięgam po minimalistyczne ambienty, np. Maxa Richtera albo Nils Frahma. Gdy jestem zmęczony &ndash; wracam do soulu i jazzu, kt&oacute;ry koi i przywraca balans. A gdy chcę się rozpędzić, dodać sobie mocy &ndash; elektroniczne bity, stary rock, czasem nawet hip-hop dają zastrzyk energii, jakby resetowały system od środka.\r\n\r\nCiekawe jest też to, jak zmienia się nasze muzyczne &bdquo;ja&rdquo; w zależności od etapu życia. Pamiętam, że jako nastolatek obsesyjnie słuchałem Nirvany i The Cure, bo tylko te dźwięki rozumiały moją buntowniczą i zagubioną duszę. P&oacute;źniej, w okresie studi&oacute;w, odkryłem Sigur R&oacute;s, Radiohead i islandzkie przestrzenie &ndash; jakby dźwięki mogły oddać to, czego nie da się wypowiedzieć słowami. Teraz często szukam muzyki bez wokalu &ndash; takiej, kt&oacute;ra nie dominuje myśli, tylko delikatnie je prowadzi.\r\n\r\nTworzę też playlisty &ndash; na każdy sezon, nastr&oacute;j i miejsce. Mam jedną specjalną, kt&oacute;rej słucham tylko podczas nocnych przejazd&oacute;w pociągiem. Inna towarzyszy mi przy gotowaniu. A jeszcze inna &ndash; tylko w podr&oacute;ży samolotem, bo kojarzy mi się z początkiem czegoś nowego. To takie osobiste ścieżki dźwiękowe mojego życia. Kiedy wracam do nich po czasie, otwierają się jak pamiętnik &ndash; przypominają zapachy, rozmowy, ludzi.\r\n\r\nZachęcam Cię do zrobienia takiej własnej mapy muzyki. Zapisuj, co Cię poruszyło. Tw&oacute;rz playlisty, dziel się nimi. Niech muzyka będzie nie tylko tłem, ale też narzędziem &ndash; do zatrzymania się, do ruszenia naprz&oacute;d, do odczuwania. Bo muzyka to nie tylko dźwięki &ndash; to emocje, kt&oacute;re mogą nas unieść tam, gdzie słowa już nie sięgają.', '1752852563muzyka.jpg', '2025-07-18 15:29:23', 3, 2, 0),
(4, 'Cisza w muzeum - dlaczego sztuka potrzebuje naszej obecności, nie tylko spojrzenia', 'Wchodzisz do galerii. Cisza. Tylko kroki, szelest ubrań, czasem stłumiony głos przewodnika. Przed Tobą obraz. Może to coś klasycznego &ndash; jak portret Rembrandta. A może zupełnie wsp&oacute;łczesnego &ndash; instalacja z metalu, dźwięku i światła. Patrzysz. Zastanawiasz się: &bdquo;Co to znaczy?&rdquo; Ale może nie musisz wiedzieć. Może wystarczy, że jesteś. Bo czasem obecność przy dziele sztuki jest ważniejsza niż jego rozumienie.\r\n\r\nSztuka nie zawsze ma odpowiadać. Czasem ma pytać. Czasem ma drażnić, innym razem &ndash; koić. Ale zawsze wymaga od nas czegoś więcej niż scrollowania. I tu tkwi jej siła. W świecie, gdzie wszystko dzieje się szybko i powierzchownie, sztuka zaprasza do zatrzymania. Do bycia tu i teraz.\r\n\r\nLubię wracać do muze&oacute;w nie po to, by &bdquo;zaliczyć&rdquo; kolejne wystawy, ale by usiąść przy jednym dziele i spędzić z nim czas. Patrzeć na detale, kolory, pęknięcia farby. Zastanawiać się, co artysta chciał powiedzieć, a potem &ndash; co ja sam z tego wyciągam. I to drugie bywa ważniejsze. Bo kontakt ze sztuką to spotkanie nie tylko z czyjąś wizją, ale też z samym sobą. Z pytaniami, kt&oacute;re może dawno w nas drzemały.\r\n\r\nNie trzeba mieć wykształcenia plastycznego, by &bdquo;rozumieć&rdquo; sztukę. Nie trzeba znać nazwisk kurator&oacute;w ani terminologii estetycznej. Wystarczy być otwartym. Pozwolić sobie na niewiedzę, na emocje, na intuicję. Właśnie dlatego lubię sztukę wsp&oacute;łczesną, mimo że często wywołuje złość, śmiech lub konsternację. Bo wytrąca z komfortu. I przypomina, że patrzenie to nie wszystko &ndash; trzeba też widzieć.\r\n\r\nA co z tworzeniem? Uważam, że każdy ma prawo do ekspresji. Nie trzeba być &bdquo;artystą&rdquo;, żeby rysować, malować, lepić z gliny, robić zdjęcia. Tworzenie to nie zaw&oacute;d &ndash; to potrzeba. I spos&oacute;b na poradzenie sobie z emocjami, światem, sobą. Kiedy rysuję bez celu, po prostu dla siebie, czuję spok&oacute;j. Nie chodzi o efekt. Chodzi o proces. O ciszę, w kt&oacute;rej można spotkać coś prawdziwego.\r\n\r\nSztuka to nie tylko obrazy w ramkach. To też graffiti na murze, komiks, film animowany, projekt krzesła czy ceramika z lokalnej pracowni. To wszystko, co powstaje z potrzeby opowiedzenia czegoś światu &ndash; albo sobie samemu.\r\n\r\nDlatego następnym razem, gdy będziesz w muzeum albo przejdziesz obok muralu &ndash; zatrzymaj się. Daj sobie chwilę. Nie pytaj od razu &bdquo;o co chodzi?&rdquo;. Po prostu bądź. To może być więcej niż się spodziewasz.', '1752852615sztuka.jpg', '2025-07-18 15:30:15', 4, 2, 0),
(5, 'Życie w epoce algorytmów - jak technologia wpływa na nasze decyzje, nawet gdy tego nie widzimy', 'Codziennie podejmujemy dziesiątki, jeśli nie setki decyzji: co zjeść, czego posłuchać, co obejrzeć, w kt&oacute;rą stronę p&oacute;jść. I choć mamy poczucie wolności, coraz częściej to nie my wybieramy &ndash; tylko algorytmy. Te niewidzialne mechanizmy podpowiadają, co może nam się spodobać, czego &bdquo;potrzebujemy&rdquo; lub czego jeszcze nie wiemy, że chcemy.\r\n\r\nOd TikToka przez Spotify po mapy Google &ndash; wszystko, co widzimy, jest filtrowane, oceniane i dopasowywane. Te algorytmy nie są złe. Są po prostu narzędziem &ndash; tylko że potężnym. Ich siła polega na tym, że uczą się nas szybciej, niż my uczymy się ich. Wiedzą, jak długo patrzymy na dany obrazek, kiedy przestajemy oglądać film, co klikamy &bdquo;dla żartu&rdquo; i czego szukamy w chwilach słabości.\r\n\r\nAle technologia to nie tylko rekomendacje. To też rozszerzenie możliwości naszego umysłu i ciała. Aplikacje monitorujące sen i oddech. Smartwatche śledzące rytm serca. AI wspierająca diagnostykę w medycynie i nauka język&oacute;w dzięki rozpoznawaniu mowy. Te zmiany dzieją się szybko &ndash; czasem tak szybko, że nie nadążamy z refleksją.\r\n\r\nZastanawiam się często, czy potrafimy jeszcze być offline. Nie po to, by odciąć się zupełnie, ale po to, by odzyskać r&oacute;wnowagę. Bo technologia jest jak ogień &ndash; potrafi ogrzać dom, ale i go spalić. Wszystko zależy od tego, kto trzyma zapałkę. Dziś musimy uczyć się nie tylko korzystać z narzędzi, ale też świadomie je wybierać. Znać ich mechanizmy, ograniczenia i wpływ na nasze życie.\r\n\r\nJest też druga strona &ndash; fascynująca. Rozw&oacute;j sztucznej inteligencji, eksploracja kosmosu, badania nad świadomością maszyn. Brzmi jak science fiction, a to już się dzieje. AI potrafi tworzyć muzykę, obrazy, a nawet pisać książki. Roboty chirurgiczne działają z precyzją, o kt&oacute;rej człowiek może tylko marzyć. Neurotechnologie pozwalają osobom sparaliżowanym komunikować się ze światem. To nie przyszłość &ndash; to teraźniejszość.\r\n\r\nAle może najważniejsze pytanie brzmi: dokąd zmierzamy? Czy technologia nas rozwija, czy zatrzymuje? Czy potrafimy jeszcze odr&oacute;żnić własną decyzję od podsuniętej? I czy umiemy żyć ze świadomością, że każda nasza aktywność online zostawia ślad, kt&oacute;ry ktoś może wykorzystać?\r\n\r\nNie mam prostych odpowiedzi. Ale wiem jedno &ndash; warto pytać. Warto być świadomym użytkownikiem, nie tylko biernym odbiorcą. Bo technologia nie zniknie. Ale to od nas zależy, czy stanie się naszym sprzymierzeńcem, czy wygodnym uzależnieniem.', '1752852679techno.jpg', '2025-07-18 15:31:19', 5, 2, 0),
(6, 'Powrót do zieleni - dlaczego kontakt z naturą to coś więcej niż relaks', 'Coraz częściej czuję, że czegoś mi brakuje, kiedy zbyt długo siedzę w betonowej rzeczywistości. Ruch uliczny, światła, powiadomienia, rozmowy, ekrany. Nawet najpiękniejsze wnętrza i najciekawsze treści nie zastąpią mi czegoś prostego: zapachu mokrego lasu, szumu liści, chłodu mchu pod ręką. Natura to nie &bdquo;miejsce na weekend&rdquo; &ndash; to nasze naturalne środowisko. A im bardziej się od niej oddalamy, tym trudniej złapać r&oacute;wnowagę.\r\n\r\nBadania pokazują, że wystarczy 15 minut dziennie wśr&oacute;d zieleni, by obniżyć poziom kortyzolu &ndash; hormonu stresu. Już sam widok drzew z okna może wpływać na naszą koncentrację i nastr&oacute;j. Ale to nie tylko liczby. To coś, co czujemy intuicyjnie. Kiedy jesteś w lesie, twoje ciało jakby się przełącza: oddech się wydłuża, myśli zwalniają, oczy przestają biegać.\r\n\r\nDlatego staram się wychodzić &ndash; do lasu, do ogrodu, nawet na kr&oacute;tki spacer między blokami, jeśli tylko mogę przejść obok jakiegoś drzewa. Przyroda nie musi być dzika ani spektakularna. Nie trzeba jechać w Bieszczady, by poczuć związek z ziemią. Czasem wystarczy zapuścić ręce w ziemię na balkonie, posadzić coś własnego, dotknąć kory drzewa, poczuć deszcz na sk&oacute;rze i nie uciekać od tego w popłochu.\r\n\r\nObserwowanie natury uczy cierpliwości. Drzewa nie spieszą się, a jednak rosną. Kwiaty nie kalkulują, kiedy zakwitną &ndash; po prostu robią to, kiedy przyjdzie czas. W tym wszystkim jest jakaś mądrość, z kt&oacute;rej możemy czerpać. Zamiast nieustannego pędu &ndash; rytm. Zamiast kontroli &ndash; zaufanie. Zamiast oczekiwań &ndash; obecność.\r\n\r\nZimą karmię ptaki i uczę się ich głos&oacute;w. Latem podlewam zioła i czuję radość z tego, że coś rośnie dzięki moim rękom. Jesienią zbieram liście i układam je w książkach jak listy od świata. Wiosną wącham pierwsze pąki i przypominam sobie, że wszystko wraca. Natura to nie tylko krajobraz &ndash; to nauczycielka.\r\n\r\nWielu z nas tęskni dziś za czymś &bdquo;prawdziwym&rdquo;, nie do końca wiedząc, czego szuka. A może odpowiedź jest prosta: kontakt z ziemią, ze zwierzętami, z ciszą, kt&oacute;rej nie da się przewinąć. Bo natura nie domaga się naszej uwagi jak technologia. Ona po prostu jest. I to właśnie w tej ciszy możemy usłyszeć siebie.', '1752852811natura.jpg', '2025-07-18 15:33:31', 6, 3, 0),
(7, 'Podróżowanie powoli - o sztuce bycia w miejscu, a nie tylko przemieszczania się', 'Kiedyś myślałem, że podr&oacute;ż to liczba kilometr&oacute;w, nowych miejsc, znaczki w paszporcie. Że im dalej, im bardziej egzotycznie, tym lepiej. Ale z czasem coś się zmieniło. Zamiast gonić za kolejnymi punktami na mapie, zacząłem szukać czegoś innego &ndash; bycia naprawdę w miejscu, nie tylko przejeżdżania przez nie.\r\n\r\nSlow travel &ndash; powolne podr&oacute;żowanie &ndash; nie oznacza, że trzeba poruszać się pieszo albo spać pod namiotem. Chodzi raczej o intencję. O wyb&oacute;r jakości zamiast ilości. O zgodę na to, że nie trzeba zobaczyć &bdquo;wszystkiego&rdquo;. Bo czasem wystarczy jedno miejsce &ndash; ale poznane głęboko. Jego zapachy, rytm dnia, smak lokalnego chleba, rozmowa z kimś, kto tu mieszka od zawsze.\r\n\r\nPamiętam, jak kiedyś w Toskanii zatrzymałem się na kilka dni w małej wiosce, kt&oacute;rej nie było w żadnym przewodniku. Każdego ranka piłem kawę w tej samej kawiarni, patrząc na tych samych ludzi. Z czasem zaczęli m&oacute;wić &bdquo;buongiorno&rdquo; jak do swojego. I to było piękne. Nie wieża w Pizie, nie galeria we Florencji &ndash; ale ta codzienność, oswojona i prawdziwa.\r\n\r\nPodr&oacute;żując powoli, uczymy się uważności. Zamiast przejeżdżać przez miasto autobusem hop-on-hop-off, warto przejść się boczną uliczką, zajrzeć do lokalnego warzywniaka, zgubić się. Nie zawsze jest komfortowo &ndash; niekt&oacute;re podr&oacute;że są nieprzewidywalne, brudne, chaotyczne. Ale to właśnie wtedy wychodzi z nas prawdziwy człowiek, nie turysta.\r\n\r\nInna ważna rzecz: podr&oacute;że wcale nie muszą być dalekie. Nie trzeba lecieć do Azji, by poczuć przygodę. Czasem wystarczy pojechać 40 km za miasto, tam, gdzie kończy się asfalt i zaczynają pola. Wyprawa do lasu o wschodzie słońca może dać więcej niż weekend w stolicy. Bo nie chodzi o to, gdzie jesteś, tylko jak tam jesteś.\r\n\r\nZacząłem też pakować się inaczej. Mniej rzeczy, więcej przestrzeni. W torbie zawsze mam zeszyt, bo w podr&oacute;ży rodzą się najlepsze myśli. I aparat, ale nie po to, by robić tysiące zdjęć, tylko kilka takich, kt&oacute;re naprawdę coś znaczą. Takich, do kt&oacute;rych wracam &ndash; nie tylko na ekranie, ale w pamięci.\r\n\r\nPowolne podr&oacute;żowanie to zaproszenie do głębszego przeżywania. Do słuchania siebie. Do odkrywania nie tylko miejsc, ale i własnych granic, potrzeb, zmian. Bo podr&oacute;ż nigdy nie jest tylko fizycznym przemieszczaniem się. To też ruch wewnętrzny &ndash; czasem subtelny, a czasem rewolucyjny.', '1752852865pod.jpg', '2025-07-18 15:34:25', 7, 3, 0),
(8, 'Zanurzeni w hałasie - jak odnaleźć ciszę w świecie, który nigdy nie milknie', 'Czy zdarzyło Ci się poczuć zmęczenie, kt&oacute;re nie ma konkretnej przyczyny? Nie jesteś fizycznie wyczerpany, nie wydarzyło się nic dramatycznego, a jednak czujesz ciężar. Czasem to nie stres, nie brak snu &ndash; tylko przebodźcowanie. Miasta nie dają ciszy. Telefony nie przestają brzęczeć. Myśli nie chcą zwolnić. I właśnie wtedy natura staje się ratunkiem.\r\n\r\nCisza w przyrodzie to coś innego niż brak dźwięku. To przestrzeń, w kt&oacute;rej żaden dźwięk nie jest nachalny. Szum drzew, śpiew ptaka, stukot dzięcioła, szelest trawy &ndash; to nie jest hałas. To rytm, kt&oacute;ry działa jak naturalny detoks dla umysłu. Gdy idę do lasu, bez słuchawek, bez rozm&oacute;w, czuję, jak moje ciało zaczyna inaczej pracować. Oddech się uspokaja. Myśli układają. Czas się rozciąga.\r\n\r\nDzisiaj coraz więcej m&oacute;wi się o ekoterapii, czyli kontaktach z naturą jako formie leczenia &ndash; depresji, lęku, chronicznego stresu. I nie chodzi tu o żadną ezoterykę. To naukowo udowodnione: kontakt z przyrodą obniża ciśnienie, redukuje poziom kortyzolu, poprawia funkcjonowanie m&oacute;zgu. Nawet kr&oacute;tkie &bdquo;kąpiele leśne&rdquo; &ndash; japońskie shinrin-yoku &ndash; potrafią mieć realny wpływ na nasze zdrowie psychiczne.\r\n\r\nAle najważniejsze w tym wszystkim jest coś, czego nie da się zmierzyć. Natura nie ocenia. Nie chce nic w zamian. Nie patrzy na Tw&oacute;j wygląd, wyniki, status. Możesz być tam taki, jaki jesteś &ndash; zmęczony, rozproszony, wściekły. Las i tak Cię przyjmie. Rzeka nie zapyta o pow&oacute;d. Drzewo nie będzie miało pretensji, że nie przyniosłeś niczego w zamian. To bezwarunkowa obecność. I w dzisiejszym świecie to luksus, kt&oacute;rego tak bardzo potrzebujemy.\r\n\r\nMam sw&oacute;j kawałek ciszy &ndash; miejsce nad rzeką, gdzie można zejść ze ścieżki i usiąść na kamieniu. Nic spektakularnego, ale dla mnie święte. Czasem zabieram tam termos z herbatą i po prostu siedzę. Nie robię zdjęć. Nie notuję myśli. Tylko jestem. I to wystarczy.\r\n\r\nCisza nie musi być totalna. To nie znaczy, że trzeba wyłączyć wszystko i odciąć się od ludzi. Chodzi o to, żeby znaleźć choćby chwilę dziennie, kiedy nic nie zagłusza tego, co w Tobie najcichsze. Tego wewnętrznego głosu, kt&oacute;ry często nie ma szans dojść do głosu. A to właśnie on najczęściej wie, czego Ci naprawdę potrzeba.', '1752852930nat.jpg', '2025-07-18 15:35:30', 6, 3, 0),
(9, 'Smaki dzieciństwa &ndash; jak jedzenie buduje naszą tożsamość', 'Zastanawiałeś się kiedyś, dlaczego niekt&oacute;re smaki wywołują w nas natychmiastowe wspomnienia? Dlaczego zapach świeżo pieczonego chleba może przenieść Cię do kuchni babci, a smak kompotu z rabarbaru &ndash; do leniwego letniego popołudnia z dzieciństwa? Jedzenie to nie tylko kalorie, składniki i przepisy. To wspomnienia. Emocje. Czasem nawet nieuświadomione tęsknoty.\r\n\r\nDla mnie takim smakiem jest zupa pomidorowa &ndash; ale nie ta modna, z pieczonych pomidor&oacute;w z bazylią i mozzarellą. Chodzi o tę prostą, z przecieru, z ryżem, lekko słodką, podawaną w głębokim talerzu z grubym rantem. Kojarzy mi się z dzieciństwem, kiedy wracałem ze szkoły i wiedziałem, że ten domowy smak czeka na mnie bez względu na wszystko. To nie była wybitna kuchnia &ndash; ale była moją kuchnią. I to czyniło ją wyjątkową.\r\n\r\nZ biegiem lat uczymy się nowych smak&oacute;w. Otwieramy się na kuchnie świata, testujemy przepisy, zachwycamy się fusion i nowoczesnością. Ale w środku &ndash; w sercu &ndash; zawsze nosimy sw&oacute;j własny smakowy alfabet. I to właśnie na nim budujemy swoją kulinarną tożsamość. Każdy z nas ma sw&oacute;j &bdquo;comfort food&rdquo; &ndash; coś, co koi, co przywołuje bezpieczeństwo, co przypomina, skąd pochodzimy.\r\n\r\nJedzenie to też język, kt&oacute;rego uczymy się od najbliższych. Od babci, kt&oacute;ra pokazywała, jak lepić pierogi. Od mamy, kt&oacute;ra gotowała szybko, ale zawsze &bdquo;na ciepło&rdquo;. Od taty, kt&oacute;ry miał sw&oacute;j rytuał niedzielnych naleśnik&oacute;w. I choć wiele zmienia się w naszych gustach, te doświadczenia zostają z nami. Czasem nieświadomie je powielamy. Innym razem od nich uciekamy &ndash; ale zawsze są punktem odniesienia.\r\n\r\nDziś lubię gotować rzeczy, kt&oacute;re łączą stare z nowym. Kluski śląskie z sosem grzybowym &ndash; ale z pieczarkami i mlekiem kokosowym. Szarlotkę &ndash; ale z dodatkiem tymianku. Albo placki ziemniaczane z jogurtem greckim i piklowaną cebulą. Nie dlatego, że stare smaki są gorsze &ndash; ale dlatego, że mam ochotę je opowiedzieć na nowo, po swojemu. Bo kuchnia to opowieść, kt&oacute;ra nie kończy się nigdy.\r\n\r\nCzasem wracam też do smak&oacute;w z dzieciństwa w najprostszej formie &ndash; gotuję kaszę mannę na mleku i posypuję kakao, dokładnie tak, jak robiła to moja mama. Tęsknię wtedy nie tylko za smakiem, ale za wszystkim, co z nim związane: spokojem, czułością, poczuciem bezpieczeństwa.\r\n\r\nI właśnie to chcę Ci przekazać w tym wpisie &ndash; nie zapominaj o jedzeniu, kt&oacute;re coś znaczy. Nie tylko smakuje, ale opowiada o Tobie. O Twojej przeszłości, o rodzinie, o miejscach, z kt&oacute;rych pochodzisz. I kiedy gotujesz &ndash; choćby najprostsze danie &ndash; wiesz, że nie tylko karmisz ciało. Karmisz pamięć. A to być może najpiękniejsza funkcja, jaką jedzenie może spełniać.', '1752853291jedzenie2.jpg', '2025-07-18 15:41:31', 2, 3, 0),
(10, 'St&oacute;ł jako centrum świata &ndash; o sile wsp&oacute;lnego jedzenia w czasach pośpiechu', 'W świecie, w kt&oacute;rym wszystko można zjeść w biegu, z plastikowego pudełka albo stojąc przy kuchennym blacie, coraz rzadziej spotykamy się naprawdę &ndash; przy stole. A przecież przez wieki st&oacute;ł był centrum życia. Miejscem, gdzie nie tylko się jadło, ale gdzie toczyło się życie. Gdzie zapadały decyzje, toczyły się rozmowy, śmiano się i milczano razem. Gdzie można było być sobą &ndash; bez filtra i pozy.\r\n\r\nDziś, kiedy patrzę na to, jak jemy &ndash; często osobno, z ekranem w tle, bez sł&oacute;w &ndash; robi mi się trochę smutno. Bo jedzenie to więcej niż potrzeba biologiczna. To więź. To rytuał, kt&oacute;ry łączy ludzi nawet wtedy, gdy wszystko inne zawodzi. Jedzenie razem oznacza: &bdquo;mam dla Ciebie czas&rdquo;. &bdquo;Chcę z Tobą być tu i teraz&rdquo;.\r\n\r\nDlatego tak bardzo cenię sobie wsp&oacute;lne gotowanie i wsp&oacute;lne jedzenie. Nie musi być perfekcyjnie. Nie musi być wykwintnie. Liczy się obecność. Zwykły makaron z sosem smakuje inaczej, gdy gotujesz go z kimś i dzielisz przy jednym stole. To wtedy dzieją się prawdziwe rozmowy. To wtedy padają pytania, na kt&oacute;re nie ma czasu między jednym powiadomieniem a drugim. To wtedy ktoś opowiada coś, czego nie powiedziałby w pośpiechu.\r\n\r\nZacząłem organizować w swoim domu niedzielne obiady &ndash; tradycyjnie, co tydzień, bez pośpiechu. Zawsze coś innego: raz zupa krem z pieczonych warzyw, innym razem lazania, a czasem po prostu kanapki i zupa dyniowa. Goście się zmieniają, ale jedno zostaje: st&oacute;ł. Ciepły, drewniany, pełen talerzy, rozm&oacute;w i zapach&oacute;w. Nie chodzi o pokaz &ndash; chodzi o wsp&oacute;lnotę.\r\n\r\nCiekawe, że jedzenie może pełnić też rolę tłumacza międzykulturowego. Kiedy spotykam ludzi z innych kraj&oacute;w, najłatwiej się porozumieć przez kuchnię. Dzielimy się smakami, przyprawami, opowieściami. Nagle r&oacute;żnice znikają. Zostaje ciekawość. I szacunek. Bo każdy niesie w sobie kulinarną historię &ndash; i każdy może się nią podzielić.\r\n\r\nMarzy mi się, żebyśmy wracali do stoł&oacute;w. Do wsp&oacute;lnego krojenia cebuli, do opowiadania o dniu przy gotującym się garnku, do &bdquo;jeszcze jednej łyżki, bo dobre&rdquo;. Bo to nie tylko jedzenie nas karmi. To obecność. Czasem nawet w ciszy. Ale razem.\r\n\r\nMoże to brzmi staroświecko, ale wierzę, że od stołu można zacząć zmieniać świat &ndash; najpierw ten mały, domowy. Potem większy. Bo tam, gdzie ludzie jedzą razem, jest miejsce na empatię. A tam, gdzie jest empatia, dzieją się rzeczy naprawdę ważne.', '1752855831j.jpg', '2025-07-18 16:23:51', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Adam', 'Rybak', 'adamr', 'adam.rybak@gmail.com', '$2y$10$fjtIIvy8PI3rORkRc2FYCORJ.8fOdV0HwQRpdcP1LdLv.5iP2VsOG', '1752833652557-200x200.jpg', 1),
(2, 'Jan', 'Nowak', 'janeknowak', 'jan.nowak@gmail.com', '$2y$10$Vs8rxt0B.K5dSQFcAdVqf.rtqAdqeCHOYkjj38l42UISVEG89YZhy', '1752852479avatar.jpg', 1),
(3, 'Marcin', 'Jankowski', 'marcinjan', 'marcin.jankowski@gmail.com', '$2y$10$mr/M54.SGlBZV6696N.ciuYVECLKOXKPiPIhW34vJdQ8B7kVy8.zO', '1752852742avatar.jpg', 0),
(4, 'Sławomir', 'Leśniewski', 'slawekl', 'slawomir.lesniewski@gmail.com', '$2y$10$2Z8m4zNQObOnco.WkRSh9uDpVE720vmyaP9dGPviB4yzkSJ3YbOEO', '175285625382-400x400.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
