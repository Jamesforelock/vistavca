-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 04 2020 г., 12:54
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vistavca`
--

-- --------------------------------------------------------

--
-- Структура таблицы `assistant`
--

CREATE TABLE `assistant` (
  `ID` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Picture` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `assistant`
--

INSERT INTO `assistant` (`ID`, `Login`, `Password`, `Name`, `Description`, `Picture`) VALUES
(1, 'jennyborder', 'jenny12345', 'Jenny Border', 'This boorish girl has large brown eyes. Her fine, curly, charcoal-colored hair is worn in a style that reminds you of a plume of smoke. She is tall and has an angular build. Her skin is light-colored. She has wide feet. Her wardrobe is unusual and odd, with a lot of violet.', '01.jpg'),
(2, 'angelinastone', 'angelina12345', 'Angelina Stone', 'This curious girl has wide gray eyes that are like two silver coins. Her luxurious, curly, yellow hair is long and is worn in an uncomplicated, businesslike style. She is very tall and has a lithe build. Her skin is ruddy. She has a wide forehead and large feet. Her wardrobe is impractacal, and is completely green and gray.', '02.jpg'),
(3, 'sandylong', 'sandy12345', 'Sandy Long', 'This woman reminds you of a playful dolphin. She has wide orange eyes that are like two setting suns. Her luxurious, curly, amber hair is neck-length and is worn in an uncomplicated, dignified style. She has a narrow build. Her skin is china-white. She has prominent cheekbones. Her wardrobe is severe, with a lot of green and black.', '03.jpg'),
(4, 'bryanland', 'bryan12345', 'Bryan Land', 'This sensitive man has narrow orange eyes. His thick, curly, brown hair is worn in a style that reminds you of a mysterious mask. He has a narrow build. His skin is deeply-tanned. He has a high forehead and small feet. His wardrobe is strange and impractacal, with a mostly white and brown color scheme.', '04.jpg'),
(5, 'samsandman', 'sam12345', 'Sam Sandman', 'This gentleman puts you in mind of a savvy alley cat. He has hooded indigo eyes. His thick, straight, cobalt-blue hair is worn in a style that reminds you of a tangled bush. He has an athletic build. His skin is black. He has prominent cheekbones and prominent ears. His wardrobe is revealing and unusual, with a mostly red and black color scheme.', '05.jpg'),
(6, 'kevinblack', 'kevin12345', 'Kevin Black', 'This friendly man has beady yellow eyes that are like two chunks of agend ivory. His fine, wavy, obsidian hair is worn in a style that reminds you of a sea urchin. He has an overmuscled build. His skin is china-white. He has an elegant nose and large hands. His wardrobe is elegant and mysterious, with a mostly gray and orange color scheme.', '06.jpg'),
(7, 'johnnewman', 'john12345', 'John Newman', 'Hey, I\'m a newbie', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ev`
--

CREATE TABLE `ev` (
  `PK` set('Excursion_ID','Visitor_ID') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `excursion`
--

CREATE TABLE `excursion` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Picture` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `excursion`
--

INSERT INTO `excursion` (`ID`, `Name`, `Description`, `Date`, `Picture`) VALUES
(1, 'Сталинградская битва', 'Музейный комплекс «Сталинградская битва» — крупнейшая в России экспозиция, посвященная битве при Сталинграде. Строительство государственного музея-панорамы «Сталинградская битва» было завершено в июле 1982 года. Стоит отметить, что идея создания такого комплекса появилась еще во время войны: так генерал-майор Анисимов в своем письме к И.В. Сталину говорил о создании такого комплекса. Можно увидеть уникальные собрания и коллекции холодного и огнестрельного оружия, боевой техники, документов, фотографий, знамен, плакатов и произведений изобразительного искусства времен второй мировой. Панорама «Разгром немецко-фашистских войск под Сталинградом».', '2020-09-27 18:42:18', '01.png'),
(2, 'Панорама в панораме жизни', 'Информационная, где все желающие смогут узнать как о мировой истории панорамного искусства, так и о создании панорамы «Разгром немецко-фашистских войск под Сталинградом». Проект «Панорама в панораме жизни» был разработан заведующей отделом экспозиционно-выставочной работы музея Светланой Аргасцевой, выигравшей грант конкурса «Меняющийся музей в меняющемся мире» благотворительного фонда Владимира Потанина. Проект реализуется агентством культурных инициатив Волгоградской области.', '2020-09-27 18:42:18', '02.png'),
(3, 'Турист. Охотник. Рыболов-2020', 'Выставка «Турист. Охотник. Рыболов» комплексное мероприятие, призванное популяризировать активный отдых среди населения, внести существенный вклад в сохранение экологического равновесия и природоохранную деятельность. Живописные берега Волги и Дона привлекают сюда туристов, охотников и рыболовов со всех уголков России. Эти места знамениты щедрой природой и богатой разнообразной фауной. Наша выставка — это место, где созданы все условия для рекламы и продвижения ваших товаров и услуг, поиска потенциальных партнеров и заключения договоров, привлечения новых покупателей. В рамках деловой программы выставки, обсуждаются насущные вопросы развития охоты, рыболовства и туризма, а так же, проводятся практические занятия, семинары, мастер-классы и презентации новинок отраслей. Для посетителей организована культурно-развлекательная программа выставки которая включает в себя тематические викторины, конкурсы, акции, стрельба из арбалета, метание ножей.', '2020-09-27 18:42:18', '03.png'),
(4, 'Banksy и уличное искусство', '«Искусство найдет вас, даже если вы того не хотите, вы найдете искусство, даже если оно того не хочет». Именно так говорим мы об уличном искусстве, всегда неожиданном и очень остром. Хэдлайнером выставки станет тот, без кого она просто была бы бессмысленной — BANKSY, представленный подлинными работами 2004 года, купленными в магазине Pictures On the Walls (London). Banksy — художник образов и метафор, понятных и трогательных. Он говорит с публикой на понятном языке массовой культуры. Никто не видел его лица, и никто не видел его рисующим. Его творчество — яркий пример того, как «работает» стрит-арт: искусство выходит из музеев и галерей в пространство повседневности — на улицы, чтобы общаться со зрителем напрямую. Еще один важный хэдлайнер выставки — авторская реплика Дмитрия Врубеля «Господи! Помоги мне выжить среди этой смертной любви» — граффити-легенда, которая поражает мир уже 30 лет. P.S. О том, знает ли Banksy об очередной выставке в России, теперь в Волгограде? И какие именно работы его выставлены? Отвечаем: Это не его выставка, это большая и сборная выставка, где он представлен только как хэдлайнер. Banksy будет представлен работами, полученными на «раздачах работ», которые проводились там регулярно 10 лет назад и работами, купленными в Лондоне в легендарном граффити-магазине POW.', '2020-09-27 18:42:18', '04.png'),
(5, 'Ангелы мира', 'Каждый из 75 Ангелов - благодарность за каждый год, прожитый в мире. Экспонируемые работы были созданы художниками из России, Болгарии, Канады, Австрии, Франции, Казахстана, Кипра, Украины, Армении, Беларуси, Индии. Зрители смогут принять участие в написании общей картины «Ангел Волгограда» и загадать желание, а также узнают, какие мысли и чувства закладывали авторы в свои работы. Выставка уже побывала в Магнитогорске, и, как только появится возможность, отправится в Берлин, символически воспроизводя развитие идеи знаменитых монументов Великой Отечественной войны: Магнитогорск-Волгоград-Берлин.', '2020-09-27 18:42:18', '05.png'),
(6, 'Век реализма', 'Год 60-летия со времени своего основания музей открывает выставкой «Век реализма». Экспозиция объединяет более 60 произведений живописи, скульптуры, декоративно-прикладного искусства, созданных русскими художниками XIX века. Среди них есть работы, практически не покидавшие музейные залы на протяжении всей истории ВМИИ, хорошо знакомые и любимые зрителем (В.Тропинин «Женский портрет», К.Маковский «Портрет неизвестной в черном платье», И.Айвазовский «Штиль на море»). В то же время, здесь есть и произведения, долгое время остававшиеся недоступными для зрительской аудитории (А.Обер «Белый медведь», С.Судьбинин «Портрет рыбака»; С.Милорадович «Пейзаж», М.Нестеров «До государя челобитчики»). Проект представляет интерес для ценителей классического искусства тех, кто хочет познакомиться с главными именами и жизненными вехами русского искусства. В.Поленов и В.Воробьев, И.Хруцкий и Л.Соломаткин, Г.Сорока и А.Куинджи: при всей непохожести судеб, их искусство объединяет особый знак времени — устремленность к реальности, отражению жизни в различных ее проявлениях. Даже самые скромные из работ, авторы которых остаются неизвестными, свидетельствуют о значительности рывка к новым измерениям жизни, сделанного 200 лет назад. Экспозиция обращает зрителя к важнейшему процессу революционной ломки представлений о назначении искусства и красоте, происходившем в нашей стране в течение XIX столетия.', '2020-09-27 18:42:18', '06.png');

-- --------------------------------------------------------

--
-- Структура таблицы `hu`
--

CREATE TABLE `hu` (
  `hash` varchar(35) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `userType` set('assistant','visitor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `sa`
--

CREATE TABLE `sa` (
  `PK` set('Assistant_ID','Stand_ID') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `se`
--

CREATE TABLE `se` (
  `PK` set('Stand_ID','Excursion_ID') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `stand`
--

CREATE TABLE `stand` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Picture` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `stand`
--

INSERT INTO `stand` (`ID`, `Name`, `Description`, `Date`, `Picture`) VALUES
(1, 'Table Display Case', 'Stuttgart Table Display Case with gas struts.', '2020-09-27 18:47:10', '01.png'),
(2, 'Pedestal Display Case', 'Stuttgart Pedestal Display Case.', '2020-09-27 18:47:10', '02.png'),
(3, 'Patton Museum Fort Knox', 'It\'s just a horse, no more. Heh!', '2020-09-27 18:47:10', '03.png'),
(4, 'Artifact Exhibit', 'Some trash is available to your eyes', '2020-09-27 18:47:10', '04.png'),
(5, 'Museum Hanging Systems', 'Wall space, an important area for museums, is where many valuable pieces of art are displayed. This is why museum hanging systems are very important. One system they use is a “track system”. This system allows them to display artwork and move the pieces around without constantly repairing the walls. Other systems are stationary and may include security hangers. ArtDisplay.com has been supplying these systems to museums for many years. Wall mounting options for odd shaped artwork or special pieces can be custom made. 10-31.com has been making custom wall mounts and displays for over 25 years.', '2020-09-27 18:47:10', '05.png'),
(6, 'Museum Rails', 'Both MuseumRails and MuseumSigns offer a wide variety of solutions for displaying information to visitors and guests. From the simple and sleek options available through MuseumSigns to the customizable flexibility of MuseumRails’ modular system, there is something for any type of information display need.', '2020-09-27 18:47:10', '06.png'),
(7, 'Museum Retractable Barriers', 'This is just a carriage, in case you don\'t get it.', '2020-09-27 18:47:10', '07.png');

-- --------------------------------------------------------

--
-- Структура таблицы `visitor`
--

CREATE TABLE `visitor` (
  `ID` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Picture` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `visitor`
--

INSERT INTO `visitor` (`ID`, `Login`, `Password`, `Name`, `Description`, `Picture`) VALUES
(1, 'paveldurov', 'paveldurov', 'Pavel Durov', 'Pavel Valerievich Durov is a Russian entrepreneur who is best known for being the founder of the social networking site VK, and later the Telegram Messenger. He is the younger brother of Nikolai Durov.', '01.jpg'),
(2, 'emmawatson', 'emma12345', 'Emma Watson', 'This guy puts you in mind of an elusive unicorn. He has wide red eyes that are like two garnets. His thick, wavy, orange hair is waist-length and is worn in an exotic, carefully-crafted style. He is very tall and has an angular build. His skin is cream-colored. He has nearly-nonexistent eyebrows and wide feet. His wardrobe is weird and sexy, with a completely white and gray color scheme.', '02.jpg'),
(3, 'johnred', 'john12345', 'John Red', 'This tense man has droopy red eyes that are like two drops of blood. His thick, straight, medium-length hair is the color of charcoal, and is worn in a simple, businesslike style. He is very tall and has a graceful build. His skin is dark. He has a small mouth and a weak chin. His wardrobe is mysterious, with a lot of white.', '03.jpg'),
(4, 'mikeblue', 'mike12345', 'Mike Blue', 'This woman reminds you of a playful dolphin. She has droopy blue eyes that are like two lagoons. Her silky, straight, red hair is worn in a style that reminds you of a river. She is tall and has a feminine build. Her skin is tan. She has high cheekbones and thin lips. Her wardrobe is utilitarian and professional, with a mostly white color scheme.', '04.jpg'),
(5, 'jamesbrown', 'james12345', 'James Brown', 'This curious girl has wide gray eyes that are like two silver coins. Her luxurious, curly, yellow hair is long and is worn in an uncomplicated, businesslike style. She is very tall and has a lithe build. Her skin is ruddy. She has a wide forehead and large feet. Her wardrobe is impractacal, and is completely green and gray.', '05.jpg'),
(6, 'katekim', 'kate12345', 'Kate Kim', 'This woman reminds you of a playful dolphin. She has wide orange eyes that are like two setting suns. Her luxurious, curly, amber hair is neck-length and is worn in an uncomplicated, dignified style. She has a narrow build. Her skin is china-white. She has prominent cheekbones. Her wardrobe is severe, with a lot of green and black.', '06.jpg'),
(7, 'janenear', 'jane12345', 'Jane Near', 'This lady reminds you of an unstoppable hunting dog. She has round scarlet eyes. Her silky, straight, green hair is very long and is worn in a precise, utilitarian style. She is very short and has an elegant build. Her skin is deeply-tanned. She has a high forehead. Her wardrobe is artistic.', '07.jpg'),
(8, 'peggycat', 'peggy12345', 'Peggy Cat', 'This gentleman puts you in mind of a savvy alley cat. He has hooded indigo eyes. His thick, straight, cobalt-blue hair is worn in a style that reminds you of a tangled bush. He has an athletic build. His skin is black. He has prominent cheekbones and prominent ears. His wardrobe is revealing and unusual, with a mostly red and black color scheme.', '08.jpg'),
(9, 'bentear', 'ben12345', 'Ben Tear', 'This friendly man has beady yellow eyes that are like two chunks of agend ivory. His fine, wavy, obsidian hair is worn in a style that reminds you of a sea urchin. He has an overmuscled build. His skin is china-white. He has an elegant nose and large hands. His wardrobe is elegant and mysterious, with a mostly gray and orange color scheme.', '09.jpg'),
(10, 'newone', 'new12345', 'Peggy Linkoln', 'Glad to see you', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Login` (`Login`);

--
-- Индексы таблицы `ev`
--
ALTER TABLE `ev`
  ADD PRIMARY KEY (`PK`);

--
-- Индексы таблицы `excursion`
--
ALTER TABLE `excursion`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `hu`
--
ALTER TABLE `hu`
  ADD PRIMARY KEY (`hash`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Индексы таблицы `sa`
--
ALTER TABLE `sa`
  ADD PRIMARY KEY (`PK`);

--
-- Индексы таблицы `se`
--
ALTER TABLE `se`
  ADD PRIMARY KEY (`PK`);

--
-- Индексы таблицы `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `assistant`
--
ALTER TABLE `assistant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `excursion`
--
ALTER TABLE `excursion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `stand`
--
ALTER TABLE `stand`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `visitor`
--
ALTER TABLE `visitor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
