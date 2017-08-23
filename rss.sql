-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Sie 2017, 10:25
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rss`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `config_time_remove`
--

CREATE TABLE `config_time_remove` (
  `id` int(11) NOT NULL,
  `time_active_posts` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `config_time_remove`
--

INSERT INTO `config_time_remove` (`id`, `time_active_posts`) VALUES
(1, 10),
(2, 20),
(3, 30),
(4, 40);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `url_category` varchar(64) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `is_read` varchar(64) DEFAULT NULL,
  `time_active_posts` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `content`
--

INSERT INTO `content` (`id`, `url_category`, `link`, `title`, `create_date`, `is_read`, `time_active_posts`) VALUES
(3973, 'Yahoo', 'https://sports.yahoo.com/news/blake-bortles-put-alert-jaguars-coach-says-starting-qb-job-grabs-132305089.html', 'Bortles struggles, Jags'' QB job up for grabs (Yahoo Sports)', '2017-08-18 15:23:05', 'no', 30),
(3974, 'Yahoo', 'https://sports.yahoo.com/news/sources-teams-waiting-see-direction-tigers-take-possible-justin-verlander-trade-021948358.html', 'Sources: Market for Verlander at a standstill (Yahoo Sports)', '2017-08-18 04:19:48', 'no', 30),
(3975, 'Yahoo', 'https://sports.yahoo.com/news/man-behind-conor-mcgregors-mma-success-214322997.html', 'Meet the man behind McGregor''s MMA success (Yahoo Sports)', '2017-08-17 23:43:22', 'no', 30),
(3976, 'Yahoo', 'https://sports.yahoo.com/news/wyomings-josh-allen-went-zero-scholarships-top-nfl-draft-boards-193456311.html', 'Meet the outlier in college football''s year of QB (Yahoo Sports)', '2017-08-17 21:34:56', 'no', 30),
(3977, 'Yahoo', 'https://sports.yahoo.com/news/chris-long-anthem-protest-support-time-people-look-like-step-123338919.html', 'Long supports anthem protest ''as a white athlete'' (Yahoo Sports)', '2017-08-18 14:33:38', 'no', 30),
(3978, 'Yahoo', 'https://rivals.yahoo.com/news/dr-saturdays-2017-top-25-countdown-no-9-washington-150057686.html', 'What can Browning, Huskies do for encore? (Yahoo Sports)', '2017-08-17 17:00:57', 'no', 30),
(3979, 'Yahoo', 'https://sports.yahoo.com/news/no-matter-plays-kevin-durant-knows-can-always-go-home-010705387.html', 'Kevin Durant knows he can always go home (Yahoo Sports)', '2017-08-18 03:07:05', 'no', 30),
(3980, 'Yahoo', 'https://rivals.yahoo.com/news/ranking-power-five-conferences-coaches-200313931.html', 'Power Five conferences ranked by coaches (Yahoo Sports)', '2017-08-17 22:03:13', 'no', 30),
(3981, 'Yahoo', 'https://sports.yahoo.com/news/jaguars-going-blake-bortles-012749485.html', 'Blake Bortles becoming an issue for Jags (Yahoo Sports)', '2017-08-18 03:27:49', 'yes', 30),
(3982, 'Yahoo', 'https://sports.yahoo.com/news/let-people-boston-decide-fate-yawkey-way-001722029.html', 'Boston has to face ugly history of Yawkey Way (Yahoo Sports)', '2017-08-18 02:17:22', 'no', 30),
(3983, 'Economist', 'http://www.economist.com/news/business-and-finance/21726277-vanity-can-be-sound-business-strategy-firm-shares-name-its-founder?fsrc=rss', 'A firm that shares a name with its founder earns higher profits', '2017-08-14 17:11:14', 'yes', 30),
(3984, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726098-share-clubs-revenues-highest-transfer-fees-have-been-fairly-constant?fsrc=rss', 'Why the worldâ€™s best footballers are cheaper than they seem', '2017-08-10 16:41:21', 'no', 30),
(3985, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726092-donald-trumps-trillion-dollar-package-remains-hypothetical-investment-american?fsrc=rss', 'Investment in American infrastructure is falling', '2017-08-10 16:41:21', 'yes', 30),
(3986, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726084-wishful-thinking-may-lead-them-astray-investors-are-not-great-predicting?fsrc=rss', 'Investors are not great at predicting politics', '2017-08-10 16:41:21', 'yes', 30),
(3987, 'Economist', 'http://www.economist.com/blogs/buttonwood/2017/08/guam-storm?fsrc=rss', 'How do you solve a problem like Korea? Investors are unsure', '2017-08-11 11:29:52', 'yes', 30),
(3988, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726103-iraq-greece-argentina-and-others-tap-enthusiasm-high-yielding-sovereign?fsrc=rss', 'Chasing higher yields, investors pile into risky countries', '2017-08-10 16:41:21', 'yes', 30),
(3989, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726087-its-intelligent-deposit-machines-were-used-laundromats-criminals?fsrc=rss', 'Australiaâ€™s CommBank is accused of abetting money-laundering', '2017-08-10 16:41:21', 'no', 30),
(3990, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726081-gary-cohn-leading-candidate-replace-janet-yellen-who-will-be-next?fsrc=rss', 'Who will be the next chair of the Federal Reserve?', '2017-08-10 16:41:21', 'yes', 30),
(3991, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726076-resource-riches-stunt-banking-sector-well-pushing-up-exchange?fsrc=rss', 'Research points to a new explanation of â€œDutch diseaseâ€', '2017-08-10 16:41:21', 'no', 30),
(3992, 'Economist', 'http://www.economist.com/blogs/buttonwood/2017/08/ten-years?fsrc=rss', 'Where might the next crisis come from?', '2017-08-09 13:10:37', 'no', 30),
(3993, 'Economist', 'http://www.economist.com/blogs/buttonwood/2017/08/wall-street-s-high-wire-act?fsrc=rss', 'Capitalism and the absence of creative disruption', '2017-08-08 16:55:47', 'no', 30),
(3994, 'Economist', 'http://www.economist.com/news/finance-and-economics/21725778-financiers-used-changing-others-business-models-tinker-their-own?fsrc=rss', 'The private-equity business learns to be more flexible', '2017-08-03 16:49:50', 'no', 30),
(3995, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726719-philanthropy-subject-rethink-catholic-church-becomes-impact-investor?fsrc=rss', 'The Catholic church becomes an impact investor', '2017-08-17 16:47:32', 'yes', 30),
(3996, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726723-little-imperial-inspiration-china-shifts-more-market-based?fsrc=rss', 'China modernises its monetary policy', '2017-08-17 16:47:32', 'yes', 30),
(3997, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726715-problems-will-be-easier-find-solutions-trump-administration?fsrc=rss', 'The Trump administration is investigating Chinese trade practices', '2017-08-17 16:47:32', 'yes', 30),
(3998, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726711-rewriting-north-americas-trade-rules-will-not-be-easy-north-american-free-trade?fsrc=rss', 'The North American Free-Trade Agreement renegotiation begins', '2017-08-17 16:47:32', 'yes', 30),
(3999, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726699-it-really-recession-proof-hedge-funds-try-promote-sports-betting-asset?fsrc=rss', 'Hedge funds try to promote sports betting as an asset class', '2017-08-17 16:47:32', 'yes', 30),
(4000, 'Economist', 'http://www.economist.com/news/finance-and-economics/21726697-structural-transformation-its-economies-not-following-precedents-why?fsrc=rss', 'Why Africaâ€™s development model puzzles economists', '2017-08-17 16:47:32', 'yes', 30),
(4001, 'Yahoo', 'https://sports.yahoo.com/news/dodgers-keep-adding-trade-curtis-granderson-044318863.html', 'Rich get richer: Dodgers acquire Granderson (Yahoo Sports)', '2017-08-19 06:43:18', 'no', 30),
(4002, 'Yahoo', 'https://sports.yahoo.com/news/north-carolina-combines-first-perfect-game-llws-since-2008-033030297.html', 'North Carolina LLWS team completes perfect game (Yahoo Sports)', '2017-08-19 05:30:30', 'yes', 30),
(4003, 'Yahoo', 'https://sports.yahoo.com/mlb-free-game-day-08-165916187.html', 'Watch live: Angels at Orioles (Yahoo Sports)', '2017-08-07 09:00:00', 'no', 30),
(4004, 'Yahoo', 'https://sports.yahoo.com/news/steelers-leveon-bells-agent-thought-deal-bell-nixed-203210001.html', 'Bell vetoed deal agreed to by his agent, Steelers (Yahoo Sports)', '2017-08-18 22:32:10', 'no', 30),
(4005, 'Yahoo', 'https://sports.yahoo.com/news/albert-pujols-ties-sammy-sosa-homers-foreign-born-player-020835760.html', 'Pujols ties Sosa''s prestigious homer record (Yahoo Sports)', '2017-08-19 05:55:35', 'no', 30),
(4006, 'Yahoo', 'https://sports.yahoo.com/news/erik-jones-gets-first-career-pole-will-start-first-bristol-224826189.html', 'Erik Jones gets first career pole in Cup series (Yahoo Sports)', '2017-08-19 00:48:26', 'no', 30),
(4007, 'Yahoo', 'https://rivals.yahoo.com/news/dr-saturdays-2017-top-25-countdown-no-8-penn-state-150424150.html', 'Rosy outlook: Penn State has great expectations (Yahoo Sports)', '2017-08-18 17:04:24', 'no', 30),
(4008, 'Yahoo', 'https://sports.yahoo.com/news/floyd-mayweather-sr-threatens-legal-action-mcgregor-cheats-012143606.html', 'Mayweather Sr. threatens to sue for cheating (Yahoo Sports)', '2017-08-19 03:21:43', 'no', 30),
(4009, 'Yahoo', 'https://sports.yahoo.com/news/anger-ezekiel-elliott-case-also-stems-union-spoiling-labor-fight-200141535.html', 'War of words over Elliott part of much larger battle (Yahoo Sports)', '2017-08-18 22:01:41', 'yes', 30),
(4010, 'Yahoo', 'https://sports.yahoo.com/news/meet-college-footballs-2017-small-school-darling-qb-coach-023201817.html', 'Toledo QB ready to launch Rockets into big time (Yahoo Sports)', '2017-08-18 04:32:01', 'no', 30),
(4011, 'Yahoo', 'https://sports.yahoo.com/news/manchester-united-erupts-late-swansea-second-straight-4-0-win-132520962.html', 'Manchester United continues strong start (Yahoo Sports)', '2017-08-19 15:25:20', 'yes', 30),
(4012, 'Yahoo', 'https://sports.yahoo.com/news/watch-taunts-former-teammates-seattle-kicker-blair-walsh-stares-vikings-sideline-151129889.html', 'Seahawks kicker stares down former teammates (Yahoo Sports)', '2017-08-19 17:11:29', 'yes', 30),
(4013, 'Yahoo', 'https://sports.yahoo.com/news/christian-pulisic-scores-dortmunds-first-goal-bundesliga-season-140427898.html', 'Dortmund''s Pulisic stars in Bundesliga opener (Yahoo Sports)', '2017-08-19 16:04:27', 'yes', 30),
(4014, 'Yahoo', 'https://sports.yahoo.com/news/learned-bruins-pony-pastrnak-133942279.html', 'Bruins have to pony up for Pastrnak (Yahoo Sports)', '2017-08-21 15:39:42', 'yes', 30),
(4015, 'Yahoo', 'https://sports.yahoo.com/news/premier-league-darts-chelsea-spurs-man-uniteds-counter-arsenals-complaints-120414413.html', 'Premier League takeaways from Week 2 (Yahoo Sports)', '2017-08-21 14:04:14', 'yes', 30),
(4016, 'Yahoo', 'https://sports.yahoo.com/news/mayweather-mcgregor-fight-impact-future-boxing-031248210.html', 'What Mayweather''s about to risk for boxing (Yahoo Sports)', '2017-08-21 05:12:48', 'yes', 30),
(4017, 'Yahoo', 'https://sports.yahoo.com/news/bartolo-colon-becomes-18th-pitcher-beat-30-mlb-teams-001839908.html', 'Colon now 18th pitcher to beat every MLB team (Yahoo Sports)', '2017-08-21 02:18:39', 'yes', 30),
(4018, 'Yahoo', 'https://sports.yahoo.com/news/preseason-week-2-flames-dalvin-cooks-fantasy-value-reach-boiling-point-022007322.html', 'Preseason Week 2 Flames: RBs on the rise (Yahoo Sports)', '2017-08-20 04:20:07', 'yes', 30),
(4019, 'Yahoo', 'https://sports.yahoo.com/news/aly-raisman-says-usa-gymnastics-swept-sex-abuse-scandal-rug-152013607.html', 'Raisman speaks out on USA Gymnastics sex scandal (Yahoo Sports)', '2017-08-20 17:20:13', 'yes', 30),
(4020, 'Yahoo', 'https://sports.yahoo.com/news/happens-conor-mcgregor-upsets-floyd-mayweather-jr-030840510.html', 'What happens if McGregor stuns Mayweather? (Yahoo Sports)', '2017-08-21 05:08:40', 'yes', 30),
(4021, 'Yahoo', 'https://sports.yahoo.com/news/hypocrisy-umpires-complaining-players-obvious-empty-wristband-protest-173957558.html', 'The obvious hypocrisy in umps'' wristband protest (Yahoo Sports)', '2017-08-20 19:39:57', 'yes', 30),
(4022, 'Yahoo', 'https://sports.yahoo.com/news/hardcore-fight-fans-excited-mayweather-vs-mcgregor-213145009.html', 'Are hardcore fight fans excited for this? (Yahoo Sports)', '2017-08-18 23:31:45', 'no', 30),
(4023, 'Yahoo', 'https://sports.yahoo.com/news/new-look-barcelona-wins-la-liga-opener-can-make-213835453.html', 'What to make of Barca''s La Liga opener (Yahoo Sports)', '2017-08-20 23:38:35', 'yes', 30),
(4024, 'Yahoo', 'https://sports.yahoo.com/news/aaron-judge-denies-shoulder-issue-impacted-recent-slump-231153183.html', 'Judge: Shoulder issue isn''t reason for slump (Yahoo Sports)', '2017-08-21 01:11:53', 'yes', 30),
(4025, 'Yahoo', 'https://sports.yahoo.com/news/anquan-boldin-announces-hes-retiring-writes-lifes-purpose-bigger-football-011958522.html', 'Boldin retires: ''Purpose is bigger than football'' (Yahoo Sports)', '2017-08-21 03:19:58', 'no', 30),
(4026, 'Yahoo', 'https://rivals.yahoo.com/news/kevin-sumlin-glad-white-supremacy-rally-scheduled-texas-canned-222107792.html', 'Sumlin ''proud'' of A&M''s response to racist rally (Yahoo Sports)', '2017-08-21 00:21:07', 'yes', 30),
(4027, 'Yahoo', 'https://sports.yahoo.com/news/giannis-antetokounmpos-withdrawal-eurobasket-stirs-nba-fiba-drama-151749923.html', 'Bucks star''s withdrawal stirs NBA-FIBA drama (Yahoo Sports)', '2017-08-21 17:17:49', 'yes', 30),
(4028, 'Yahoo', 'https://sports.yahoo.com/news/totality-rafael-devers-eclipsing-everything-thought-possible-130037059.html', 'Unlike the eclipse, Devers may be here to stay (Yahoo Sports)', '2017-08-21 15:00:37', 'yes', 30),
(4029, 'Yahoo', 'https://sports.yahoo.com/news/top-25-college-football-players-watch-2017-non-qb-division-184441057.html', '25 non-quarterbacks to watch this season (Yahoo Sports)', '2017-08-21 20:44:41', 'yes', 30),
(4030, 'Yahoo', 'https://sports.yahoo.com/news/floyd-mayweathers-biggest-ever-bet-232304487.html', 'Mayweather''s biggest bet keeps paying off (Yahoo Sports)', '2017-08-22 01:23:04', 'yes', 30),
(4031, 'Yahoo', 'https://sports.yahoo.com/news/hit-took-odell-beckham-dirty-one-032933316.html', 'Was the hit that took out Beckham dirty? (Yahoo Sports)', '2017-08-22 05:29:33', 'yes', 30),
(4032, 'Yahoo', 'https://sports.yahoo.com/news/report-nba-looking-magic-johnson-lakerspaul-george-tampering-investigation-184445600.html', 'Report: NBA investigating Magic Johnson (Yahoo Sports)', '2017-08-21 20:40:45', 'yes', 30),
(4033, 'Yahoo', 'https://sports.yahoo.com/news/wayne-rooneys-200th-premier-league-goal-earns-frantic-draw-everton-man-city-205750273.html', 'Rooney makes history as Everton draws City (Yahoo Sports)', '2017-08-21 22:57:50', 'yes', 30),
(4034, 'Yahoo', 'https://sports.yahoo.com/news/muhammad-alis-ugliest-fight-paved-way-mayweather-mcgregor-155137021.html', 'How Ali paved way for Mayweather-McGregor (Yahoo Sports)', '2017-08-21 17:51:37', 'yes', 30),
(4035, 'Yahoo', 'https://rivals.yahoo.com/news/dr-saturdays-2017-top-25-countdown-no-5-oklahoma-145416381.html', 'Experienced Sooners look like a playoff team (Yahoo Sports)', '2017-08-21 16:54:16', 'yes', 30),
(4036, 'Yahoo', 'https://sports.yahoo.com/news/ambushed-judge-fires-back-shooter-steubenville-attack-213608769.html', 'More tragedy surrounding Steubenville (Yahoo Sports)', '2017-08-21 23:36:08', 'yes', 30),
(4037, 'Yahoo', 'https://sports.yahoo.com/news/video-james-harden-chris-paul-combine-alley-oop-butt-bump-172441387.html', 'Harden, Paul combine for alley-oop and butt-bump (Yahoo Sports)', '2017-08-21 19:24:41', 'yes', 30),
(4038, 'Yahoo', 'https://sports.yahoo.com/news/report-le-veon-bell-showing-094125753.html', 'Bell texting teammates, nearing Steelers return (Yahoo Sports)', '2017-08-21 11:41:25', 'yes', 30),
(4039, 'Yahoo', 'https://sports.yahoo.com/news/cheated-game-drug-ban-o-j-mayo-seeks-second-chance-204456382.html', 'Mayo seeks redemption once drug ban ends (Yahoo Sports)', '2017-08-21 22:40:56', 'yes', 30),
(4040, 'Yahoo', 'https://sports.yahoo.com/news/imperfect-angels-thick-al-wild-card-race-055513605.html', 'Imperfect Angels in thick of AL wild card race (Yahoo Sports)', '2017-08-22 07:55:13', 'yes', 30),
(4041, 'Yahoo', 'https://sports.yahoo.com/news/penguins-drafted-bobby-clarke-nhl-alternate-history-124221858.html', 'What if ... the Penguins drafted Bobby Clarke? (Yahoo Sports)', '2017-08-22 14:42:21', 'yes', 30),
(4042, 'Yahoo', 'https://sports.yahoo.com/news/henrik-zetterberg-may-quit-two-years-says-contract-cap-trickery-234731170.html', 'Contract loophole may lead to Zetterberg''s exit (Yahoo Sports)', '2017-08-22 01:47:31', 'no', 30),
(4043, 'Yahoo', 'https://sports.yahoo.com/news/cleveland-browns-still-searching-answer-quarterback-031826950.html', 'Browns still searching for answer at QB (Yahoo Sports)', '2017-08-22 05:18:26', 'no', 30),
(4044, 'Yahoo', 'https://sports.yahoo.com/news/fantasy-booms-busts-breakouts-preseason-week-2-123116711.html', 'Fantasy: Week 2 booms, busts and breakouts (Yahoo Sports)', '2017-08-22 14:31:16', 'no', 30),
(4045, 'Yahoo', 'https://sports.yahoo.com/news/bill-obrien-calls-tom-savage-texans-starter-deshaun-watson-no-2-170307865.html', 'Savage beats out Watson for Texans'' QB job (Yahoo Sports)', '2017-08-22 19:03:07', 'yes', 30),
(4046, 'Yahoo', 'https://sports.yahoo.com/news/mayweather-fans-outnumber-mcgregor-ones-new-yahoo-sports-poll-155226481.html', 'America taking sides in May-Gregor megafight (Yahoo Sports)', '2017-08-22 17:52:26', 'yes', 30),
(4047, 'Yahoo', 'https://sports.yahoo.com/news/steve-kerr-fully-expects-coach-warriors-season-many-years-143910745.html', 'Kerr feeling better, eyes full season of coaching (Yahoo Sports)', '2017-08-22 16:39:10', 'yes', 30),
(4048, 'Yahoo', 'https://sports.yahoo.com/news/patriots-owner-robert-kraft-honors-friend-president-trump-super-bowl-li-ring-183536931.html', 'Kraft honors friend Trump with Super Bowl ring (Yahoo Sports)', '2017-08-22 20:35:36', 'yes', 30),
(4049, 'Yahoo', 'https://sports.yahoo.com/news/large-group-browns-players-take-knee-national-anthem-010236746.html', 'Numerous Browns players kneel for anthem (Yahoo Sports)', '2017-08-22 03:02:36', 'yes', 30),
(4050, 'Yahoo', 'https://sports.yahoo.com/mlb-free-game-day-08-202946679.html', 'MLB''s Free Game of the Day: Marlins at Phillies (Yahoo Sports)', '2017-08-15 09:00:00', 'no', 30),
(4051, 'Yahoo', 'https://sports.yahoo.com/news/david-wright-will-play-baseball-first-time-since-last-year-194426096.html', 'David Wright playing for first time in over a year (Yahoo Sports)', '2017-08-22 21:44:26', 'yes', 30),
(4052, 'Yahoo', 'https://sports.yahoo.com/news/13-year-old-little-leaguer-belted-home-run-braves-park-210019741.html', 'Little Leaguer, 13, goes yard at MLB park (Yahoo Sports)', '2017-08-22 23:00:19', 'yes', 30),
(4053, 'Yahoo', 'https://sports.yahoo.com/news/college-football-hot-seat-2017-safe-coach-045047996.html', 'Seat is heating up for a number of coaches (Yahoo Sports)', '2017-08-22 17:50:47', 'no', 30),
(4054, 'Yahoo', 'https://sports.yahoo.com/news/fantasy-booms-busts-breakouts-preseason-week-2-123116711.html', 'Fantasy: Whose stock is rising this preseason? (Yahoo Sports)', '2017-08-22 14:31:16', 'no', 30),
(4055, 'Yahoo', 'https://sports.yahoo.com/news/sources-odell-beckham-jr-eyes-100m-insurance-policy-contract-talks-giants-stall-180708730.html', 'Sources: OBJ eyeing $100M insurance policy (Yahoo Sports)', '2017-08-22 20:07:08', 'yes', 30),
(4056, 'Yahoo', 'https://sports.yahoo.com/news/east-won-kyrie-irving-lebron-james-rivalry-rekindled-034640919.html', 'The East just got a lot more interesting (Yahoo Sports)', '2017-08-23 05:46:40', 'yes', 30),
(4057, 'Yahoo', 'https://sports.yahoo.com/news/ridiculous-amount-ways-can-bet-floyd-mayweather-vs-conor-mcgregor-015509846.html', 'No shortage of ''MayGregor'' prop bets (Yahoo Sports)', '2017-08-22 03:55:09', 'no', 30),
(4058, 'Yahoo', 'https://sports.yahoo.com/news/september-smile-leveon-bell-reveals-hes-returning-steelers-034548976.html', 'Bell tells the world when he''s coming back (Yahoo Sports)', '2017-08-23 05:45:48', 'yes', 30),
(4059, 'Yahoo', 'https://sports.yahoo.com/news/blockbuster-kyrie-irving-isaiah-thomas-deal-lebron-james-014934473.html', 'Forget Irving, Thomas: Deal still all about LeBron (Yahoo Sports)', '2017-08-23 03:49:34', 'yes', 30),
(4060, 'Yahoo', 'https://sports.yahoo.com/news/jon-jones-tested-positive-steroids-following-ufc-214-fight-003645047.html', 'Jon Jones tests positive for steroids (Yahoo Sports)', '2017-08-23 02:36:45', 'yes', 30),
(4061, 'Yahoo', 'https://sports.yahoo.com/news/sources-cavs-celtics-seriously-discussing-deal-swap-kyrie-irving-isaiah-thomas-223024513.html', 'Cavs, Celtics agree on blockbuster trade (Yahoo Sports)', '2017-08-23 00:30:24', 'yes', 30),
(4062, 'Yahoo', 'https://sports.yahoo.com/news/mike-martz-highly-critical-rams-sean-mcvay-new-book-says-words-embellished-210800776.html', 'Martz denies ripping Rams, McVay in book (Yahoo Sports)', '2017-08-22 23:08:00', 'yes', 30),
(4063, 'Yahoo', 'https://sports.yahoo.com/news/nascar-power-rankings-kyle-busch-sweeps-way-no-1-212509949.html', 'Power Rankings: Kyle Busch surges to No. 1 (Yahoo Sports)', '2017-08-22 23:25:09', 'yes', 30);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rss_store`
--

CREATE TABLE `rss_store` (
  `id` int(11) NOT NULL,
  `url_category` varchar(255) NOT NULL,
  `url_address` varchar(255) NOT NULL,
  `date_to_add` datetime NOT NULL,
  `favorite` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rss_store`
--

INSERT INTO `rss_store` (`id`, `url_category`, `url_address`, `date_to_add`, `favorite`) VALUES
(118, 'Yahoo', 'http://sports.yahoo.com/top/rss.xml', '2017-08-20 18:58:34', 'no'),
(119, 'Economist', 'http://www.economist.com/sections/economics/rss.xml', '2017-08-22 16:54:36', 'no');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `config_time_remove`
--
ALTER TABLE `config_time_remove`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rss_store`
--
ALTER TABLE `rss_store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `config_time_remove`
--
ALTER TABLE `config_time_remove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4064;
--
-- AUTO_INCREMENT dla tabeli `rss_store`
--
ALTER TABLE `rss_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
