-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Cze 2018, 15:01
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog_members`
--

CREATE TABLE `blog_members` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'Demo', '$2y$10$wJxa1Wm0rtS2BzqKnoCPd.7QQzgu7D/aLlMR5Aw3O.m9jx3oRJ5R2', 'demo@demo.com'),
(2, 'Hubert', '$2y$10$2YcK9kzJxwGGIJX6ITT2DOva/8u0u79W7E0LxJCUZDJN4V3eSo872', 'hubert@gmail.com'),
(3, 'Adam', '$2y$10$Ktpb1P7e6xFP5ifN9WhXsu3PxMWtTt9NoNNrZSRQSc47W2yWJFvH6', 'adam@adam.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blog_posts`
--

CREATE TABLE `blog_posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `blog_posts`
--

INSERT INTO `blog_posts` (`postID`, `postTitle`, `postDesc`, `postCont`, `postDate`) VALUES
(7, 'Lorem ipsum', '<p>PrzykÅ‚adowy wpis LoremIpsum.</p>', '<p><strong>Lorem Ipsum</strong> jest tekstem stosowanym jako przykÅ‚adowy wypeÅ‚niacz w przemyÅ›le poligraficznym. ZostaÅ‚ po raz pierwszy uÅ¼yty w XV w. przez nieznanego drukarza do wypeÅ‚nienia tekstem pr&oacute;bnej ksiÄ…Å¼ki. PiÄ™Ä‡ wiek&oacute;w p&oacute;Åºniej zaczÄ…Å‚ byÄ‡ uÅ¼ywany przemyÅ›le elektronicznym, pozostajÄ…c praktycznie niezmienionym. SpopularyzowaÅ‚ siÄ™ w latach 60. XX w. wraz z publikacjÄ… arkuszy Letrasetu, zawierajÄ…cych fragmenty Lorem Ipsum, a ostatnio z zawierajÄ…cym r&oacute;Å¼ne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druk&oacute;w na komputerach osobistych, jak Aldus PageMaker</p>\r\n<div>\r\n<h2>Do czego tego uÅ¼yÄ‡?</h2>\r\n<p>Og&oacute;lnie znana teza gÅ‚osi, iÅ¼ uÅ¼ytkownika moÅ¼e rozpraszaÄ‡ zrozumiaÅ‚a zawartoÅ›Ä‡ strony, kiedy ten chce zobaczyÄ‡ sam jej wyglÄ…d. JednÄ… z mocnych stron uÅ¼ywania Lorem Ipsum jest to, Å¼e ma wiele r&oacute;Å¼nych &bdquo;kombinacji&rdquo; zdaÅ„, sÅ‚&oacute;w i akapit&oacute;w, w przeciwieÅ„stwie do zwykÅ‚ego: &bdquo;tekst, tekst, tekst&rdquo;, sprawiajÄ…cego, Å¼e wyglÄ…da to &bdquo;zbyt czytelnie&rdquo; po polsku. Wielu webmaster&oacute;w i designer&oacute;w uÅ¼ywa Lorem Ipsum jako domyÅ›lnego modelu tekstu i wpisanie w internetowej wyszukiwarce &lsquo;lorem ipsum&rsquo; spowoduje znalezienie bardzo wielu stron, kt&oacute;re wciÄ…Å¼ sÄ… w budowie. Wiele wersji tekstu ewoluowaÅ‚o i zmieniaÅ‚o siÄ™ przez lata, czasem przez przypadek, czasem specjalnie (humorystyczne wstawki itd).</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<h2>SkÄ…d siÄ™ to wziÄ™Å‚o?</h2>\r\n<p>W przeciwieÅ„stwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej Å‚aciÅ„skiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykÅ‚adowca Å‚aciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzaÅ‚ siÄ™ uwaÅ¼niej jednemu z najbardziej niejasnych sÅ‚&oacute;w w Lorem Ipsum &ndash; consectetur &ndash; i po wielu poszukiwaniach odnalazÅ‚ niezaprzeczalne Åºr&oacute;dÅ‚o: Lorem Ipsum pochodzi z fragment&oacute;w (1.10.32 i 1.10.33) &bdquo;de Finibus Bonorum et Malorum&rdquo;, czyli &bdquo;O granicy dobra i zÅ‚a&rdquo;, napisanej wÅ‚aÅ›nie w 45 p.n.e. przez Cycerona. Jest to bardzo popularna w czasach renesansu rozprawa na temat etyki. Pierwszy wiersz Lorem Ipsum, &bdquo;Lorem ipsum dolor sit amet...&rdquo; pochodzi wÅ‚aÅ›nie z sekcji 1.10.32.</p>\r\n<p>Standardowy blok Lorem Ipsum, uÅ¼ywany od XV wieku, jest odtworzony niÅ¼ej dla zainteresowanych. Fragmenty 1.10.32 i 1.10.33 z &bdquo;de Finibus Bonorum et Malorum&rdquo; Cycerona, sÄ… odtworzone w dokÅ‚adnej, oryginalnej formie, wraz z angielskimi tÅ‚umaczeniami H. Rackhama z 1914 roku.</p>\r\n</div>', '2018-06-28 09:18:42'),
(8, 'Obrazek', '<p><img src=\"https://cdn-images-1.medium.com/max/1600/1*tSyuv3ZRCfsSD5aXB7v8DQ.png\" alt=\"Lips\" width=\"800\" height=\"313\" /></p>', '<p><img src=\"https://cdn-images-1.medium.com/max/1600/1*tSyuv3ZRCfsSD5aXB7v8DQ.png\" alt=\"lips\" width=\"800\" height=\"313\" /></p>', '0000-00-00 00:00:00'),
(9, 'Film', '<p><iframe src=\"//www.youtube.com/embed/u9Dg-g7t2l4\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '<p><iframe src=\"//www.youtube.com/embed/u9Dg-g7t2l4\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\"></iframe></p>', '0000-00-00 00:00:00'),
(10, 'Nohup', '<p><strong>nohup</strong> - <a class=\"mw-redirect\" title=\"UNIX\" href=\"https://pl.wikipedia.org/wiki/UNIX\">uniksowe</a> polecenie uÅ¼ywane do uruchamiania innego programu w taki spos&oacute;b, aby ten nie zostaÅ‚ wyÅ‚Ä…czony podczas wylogowania. W <a title=\"System operacyjny\" href=\"https://pl.wikipedia.org/wiki/System_operacyjny\">systemie</a> <a title=\"GNU\" href=\"https://pl.wikipedia.org/wiki/GNU\">GNU</a> ten program jest w pakiecie <a title=\"GNU Coreutils\" href=\"https://pl.wikipedia.org/wiki/GNU_Coreutils\">GNU Coreutils</a>.</p>', '<h1 id=\"firstHeading\" class=\"firstHeading\" lang=\"pl\">nohup</h1>\r\n<div id=\"mw-content-text\" class=\"mw-content-ltr\" dir=\"ltr\" lang=\"pl\">\r\n<div class=\"mw-parser-output\">\r\n<p><strong>nohup</strong> - <a class=\"mw-redirect\" title=\"UNIX\" href=\"https://pl.wikipedia.org/wiki/UNIX\">uniksowe</a> polecenie uÅ¼ywane do uruchamiania innego programu w taki spos&oacute;b, aby ten nie zostaÅ‚ wyÅ‚Ä…czony podczas wylogowania. W <a title=\"System operacyjny\" href=\"https://pl.wikipedia.org/wiki/System_operacyjny\">systemie</a> <a title=\"GNU\" href=\"https://pl.wikipedia.org/wiki/GNU\">GNU</a> ten program jest w pakiecie <a title=\"GNU Coreutils\" href=\"https://pl.wikipedia.org/wiki/GNU_Coreutils\">GNU Coreutils</a>.</p>\r\n<h2><span id=\"Przyk.C5.82ad\"></span><span id=\"PrzykÅ‚ad\" class=\"mw-headline\">PrzykÅ‚ad</span></h2>\r\n</div>\r\n</div>\r\n<pre>$ nohup true &amp;\r\n$ exit\r\n</pre>\r\n<h2><span id=\"Zobacz_te.C5.BC\"></span><span id=\"Zobacz_teÅ¼\" class=\"mw-headline\">Zobacz teÅ¼</span></h2>\r\n<ul>\r\n<li><a title=\"Mkdir\" href=\"https://pl.wikipedia.org/wiki/Mkdir\">mkdir</a></li>\r\n<li><a title=\"GNU Screen\" href=\"https://pl.wikipedia.org/wiki/GNU_Screen\">screen (program)</a></li>\r\n</ul>\r\n<h2><span id=\"Linki_zewn.C4.99trzne\"></span><span id=\"Linki_zewnÄ™trzne\" class=\"mw-headline\">Linki zewnÄ™trzne</span></h2>\r\n<ul>\r\n<li><a class=\"external text\" href=\"http://phpunixman.sourceforge.net/index.php/man/nohup\" rel=\"nofollow\">man nohup</a></li>\r\n</ul>', '0000-00-00 00:00:00'),
(12, 'Tabelka', '<p>adasad adas adas d asdadasdas dd</p>\r\n<table style=\"border-collapse: collapse; width: 100%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">xxxxx</td>\r\n<td style=\"width: 33.3333%;\">yyyyy</td>\r\n<td style=\"width: 33.3333%;\">zzzzz</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">aaaaa</td>\r\n<td style=\"width: 33.3333%;\">bbbbb</td>\r\n<td style=\"width: 33.3333%;\">ccccc</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">jjjj</td>\r\n<td style=\"width: 33.3333%;\">kkkk</td>\r\n<td style=\"width: 33.3333%;\">llll</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>asfsf afa asda dasdsad as das d</p>\r\n<table style=\"border-collapse: collapse; width: 99.9999%;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">xxxxx</td>\r\n<td style=\"width: 33.3333%;\">yyyyy</td>\r\n<td style=\"width: 33.3333%;\">zzzzz</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">aaaaa</td>\r\n<td style=\"width: 33.3333%;\">bbbbb</td>\r\n<td style=\"width: 33.3333%;\">ccccc</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 33.3333%;\">jjjj</td>\r\n<td style=\"width: 33.3333%;\">kkkk</td>\r\n<td style=\"width: 33.3333%;\">llll</td>\r\n</tr>\r\n</tbody>\r\n</table>', '0000-00-00 00:00:00'),
(20, 'wwwwww', '<p>wwwwwwwww</p>', '<p>www</p>', '2018-06-28 14:02:48');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `blog_members`
--
ALTER TABLE `blog_members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indeksy dla tabeli `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `blog_members`
--
ALTER TABLE `blog_members`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
