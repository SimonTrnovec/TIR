-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost
-- Čas generovania: Št 27.Jan 2022, 22:20
-- Verzia serveru: 5.7.25
-- Verzia PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `demo21`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `spravy`
--

CREATE TABLE `spravy` (
  `id` int(11) NOT NULL,
  `nadpis` varchar(50) NOT NULL,
  `obsah` text NOT NULL,
  `cas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `obrazok` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `spravy`
--

INSERT INTO `spravy` (`id`, `nadpis`, `obsah`, `cas`, `obrazok`) VALUES
(1, 'Labute na skládke nebezpečného odpadu', 'V piatok 30.3.2012 sa prostredníctvom príslušníkov Policajného zboru na Obvodný úrad životného prostredia v Brezne dostal podnet od občana, že na skládke nebezpečného odpadu, tzv. gudrónoch pri obci Predajná, sa nachádzajú labute. Zrkadliacu hladinu kvapalných odpadov si vodné vtáky často mýlia s vodnou nádržou. Lokalita patrí do ochranného pásma Národného parku Nízke Tatry, a tak boli privolaní na miesto aj pracovníci Správy NAPANT. Labute sa nachádzali na brehu, v juhozápadnom cípe východnej nádrže. Päť zo šiestich kusov bolo v dobrom stave, jedna značne poleptaná ropnými látkami.\r\nKeďže sa nepodarilo zabezpečiť súčinnosť HaZZ pri odchyte a premiestnení z nebezpečnej blízkosti gudrónov, vlastnými silami pracovníkov ObÚ ŽP a S-NAPANT boli labute “odtransportované” na blízke pole, odkiaľ odleteli smerom k Hronu. Jednu odviezli pracovníci S-NAPANT na ošetrenie k veterinárovi. Ďalšiu starostlivosť prevzala Chovná stanica pri CHKO Poľana v Banskej Bystrici. Za pomoc ďakujeme – p.Kováčovi za zapožičanie plachty, obchodu v Predajnej za krabice a MVDr. Magicovi za základné ošetrenie.', '2012-03-05 18:55:00', 'labute.jpg'),
(2, 'My sa zimy nebojíme, vtáčikov si nakŕmime', 'Zimné mesiace patria už tradične ekovýchovnému programu “My sa zimy nebojíme, vtáčikov si nakŕmime”, zameranému na  zimné prikrmovanie vtáctva. V krátkej prezentácii  sa zoznamujeme s najznámejšími návštevníkmi kŕmidiel, následne si ukážeme, čo môžeme vtáčikom ponúknuť a z čoho by ich naopak boleli brušká.  Samozrejme nechýbajú obľúbené hry na vtáčiky, či dielničky kde si vyrobíme jednoduchú vtáčiu pochúťku, či kŕmidlo z odpadového materiálu. Ako sa nám darilo s detičkami z Hiadla si môžete pozrieť v galérii. Viac informácií o našich ekovýchovných aktivitách nájdete v sekcii ekovýchova.', '2012-06-21 13:03:00', 'hiadel.jpg'),
(3, 'Žiaci vypratali z kostola pol tony trusu', 'V podkroví kostola v Nemeckej žije viac ako 1 200 netopierov. Spoločnosť pre ochranu netopierov (SON ) spoločne so správou NAPANTu pripravili pre deti tamojšej základnej školy zaujímavú akciu. Z podkrovia vypratali okolo pol tony hnojiva.Takmer štyridsať vriec s trusom netopierov , ktoré vážili spolu okolo pol tony, sa podarilo vypratať pred niekoľkými dňami z podkrovných priestorov rímskokatolíckeho kostola v Nemeckej. Zaujímavú akciu pripravila Spoločnosť pre ochranu netopierov na Slovensku v spolupráci so správou Národného parku Nízke Tatry a žiakmi zo základnej školy v Nemeckej. Peter Bačkor z regionálnej pobočky SON informoval, že akcia obsahovo aj významom zapadala do celoslovenského projektu na záchranu netopierov a dažďovníkov v mestách. Celý článok bol uverejnený: bystrica.sme.sk', '2013-04-23 23:09:35', 'netopiere.jpg'),
(4, 'Čo zaujíma zahraničných vedcov na Chabenci?', 'Ak sa pozriete na satelitný snímok južného svahu Chabenca cez Google Earth, objavíte uprostred svahu nad hranicou kosodreviny niekoľko pozdĺžnych rýh. Tie sú dôkazom gravitačných svahových deformácií (porúch). Príčina týchto deformácií je predmetom skúmania. Mohlo ňou byť zemetrasenie, alebo roztápajúci sa ľad počas posledného zaľadnenia, ktorý spôsobil celkovú nestabilitu svahu. Podobné deformácie svahov je možné pozorovať na hrebeni Smreka v Západných Tatrách a na hrebeni Poľskej Tomanovej vo Vysokých Tatrách. Spôsob akým tieto trhliny vznikli je dôležitý pre stanovenie ich budúceho vývoja. Na Slovensku boli tieto deformácie prvýkrát popísané Doc. Nemčokom v roku 1982. Práve vďaka knihe o Zosuvoch v slovenských Karpatoch, ktorú napísal a ktorá bola sčasti preložená aj do angličtiny, kroky niektorých zahraničných vedcov smerujú na svahy Chabenca. Aj nedávno navštívila Nízke Tatry skupina vedcov z poľskej akadémie vied z Wroclavi. Výsledkom ich práce bude porovnanie svahových porúch na Chabenci s podobnými, ktoré možno objaviť na Marse.', '2014-07-17 15:11:00', 'chabenec.jpg'),
(5, 'Príbeh Jánskej doliny', 'V Slovenskom múzeu ochrany prírody a jaskyniarstva v Liptovskom Mikuláši za prítomnosti hojného obecenstva z radov jaskyniarov i ostatných hostí otvorili stránky s pútavým príbehom, odohrávajúcim sa za čias našich pohanských predkov v jednej z najznámejších nízkotatranských dolín. Išlo o stránky z knihy Príbeh Jánskej doliny od Eleny Hipmanovej, ktorú pokropením vodou z potoka Štiavnica uviedli do života editor a expredseda SSS Bohuslav Kortman a generálny riaditeľ Štátnej ochrany prírody SR Milan Boroš.', '2018-01-03 12:24:00', 'janska.jpg'),
(6, 'Medzinárodné sčítanie vodného vtáctva 2018', 'Táto akcia prebieha v Európe už viac ako 50 rokov. Na Slovensku sčítavame vodné vtáctvo od roku 1991. Na území Nízkych Tatier sčítavame vtáctvo nielen na hlavných tokoch, ktorými sú Váh a Hron, ale aj na vedľajších prítokoch v početných Nízkotatranských dolinách. Aké druhy a počty zimujúcich vodných vtákov sa sčítačom  podarí zaznamenať ovplyvňuje hlavne charakter samotného toku ale vo veľkej miere aj počasie. Počas tuhých zím menšie prítoky zamŕzajú a tak sa chtiac nechtiac musia aj vodné operence presunúť nižšie. Tohoročné januárové dni pripomínali skôr jar.\r\nSneh a ľad bol len prechodnou záležitosťou. Vodnáre potočné (Cinclus cinclus) – elegantné drobné otužilce bolo možné pozorovať aj hlboko v dolinách. Medzi najčastejšie pozorované druhy už tradične patrili kačice divé (Anas platyrhynchos) a volavky popolavé (Ardea cinerea).', '2018-02-25 10:34:00', 'vodnar.jpg');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `spravy`
--
ALTER TABLE `spravy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `spravy`
--
ALTER TABLE `spravy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
