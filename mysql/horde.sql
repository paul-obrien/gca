
-- horde_prefs...
-- /usr/bin/mysqldump --complete-insert --insert-ignore --skip-lock-tables --no-create-info --no-create-db horde horde_prefs --where "pref_uid='goalcoll' or pref_uid like '%@m.goalcollegeathlete.com' or pref_uid like '%@goalcollegeathlete.com'"
-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: horde
-- ------------------------------------------------------
-- Server version	5.5.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `horde_prefs`
--
-- WHERE:  pref_uid='goalcoll' or pref_uid like '%@m.goalcollegeathlete.com' or pref_uid like '%@goalcollegeathlete.com'

LOCK TABLES `horde_prefs` WRITE;
/*!40000 ALTER TABLE `horde_prefs` DISABLE KEYS */;
INSERT  IGNORE INTO `horde_prefs` (`pref_uid`, `pref_scope`, `pref_name`, `pref_value`) VALUES ('steve@goalcollegeathlete.com','horde','last_login','a:2:{s:4:\"time\";i:1365037102;s:4:\"host\";s:35:\"c-24-147-71-215.hsd1.ma.comcast.net\";}'),('steve@goalcollegeathlete.com','imp','mail_domain','goalcollegeathlete.com'),('steve@goalcollegeathlete.com','kronolith','display_cals','a:1:{i:0;s:28:\"steve@goalcollegeathlete.com\";}'),('steve@goalcollegeathlete.com','kronolith','display_remote_cals','a:0:{}'),('steve@goalcollegeathlete.com','horde','last_maintenance','1365037116'),('steve@goalcollegeathlete.com','nag','display_tasklists','a:1:{i:0;s:28:\"steve@goalcollegeathlete.com\";}'),('steve@goalcollegeathlete.com','horde','add_source','086f2c93d478edf27947f827594a42c1'),('steve@goalcollegeathlete.com','imp','vinbox_id','e68k8h1xajso0880okwgg'),('steve@goalcollegeathlete.com','turba','columns','netcenter	email\nverisign	email\n086f2c93d478edf27947f827594a42c1	email'),('steve@goalcollegeathlete.com','turba','turba_maintenance_tasks','a:2:{i:0;s:12:\"upgradeprefs\";i:1;s:12:\"upgradelists\";}'),('steve@goalcollegeathlete.com','kronolith','display_external_cals','a:0:{}'),('steve@goalcollegeathlete.com','mnemo','display_notepads','a:1:{i:0;s:28:\"steve@goalcollegeathlete.com\";}'),('questions@goalcollegeathlete.com','horde','last_login','a:2:{s:4:\"time\";i:1387512604;s:4:\"host\";s:34:\"c-50-169-30-88.hsd1.ma.comcast.net\";}'),('questions@goalcollegeathlete.com','horde','add_source','2f9d1b9b05666352dc89abeaaf5a0bdb'),('questions@goalcollegeathlete.com','imp','vinbox_id','2pz7m46qfkcgo4g84g44wg'),('questions@goalcollegeathlete.com','turba','columns','netcenter	email\nverisign	email\n2f9d1b9b05666352dc89abeaaf5a0bdb	email'),('questions@goalcollegeathlete.com','turba','turba_maintenance_tasks','a:2:{i:0;s:12:\"upgradeprefs\";i:1;s:12:\"upgradelists\";}'),('questions@goalcollegeathlete.com','kronolith','display_cals','a:1:{i:0;s:32:\"questions@goalcollegeathlete.com\";}'),('questions@goalcollegeathlete.com','kronolith','display_remote_cals','a:0:{}'),('questions@goalcollegeathlete.com','kronolith','display_external_cals','a:0:{}'),('questions@goalcollegeathlete.com','nag','display_tasklists','a:1:{i:0;s:32:\"questions@goalcollegeathlete.com\";}'),('questions@goalcollegeathlete.com','mnemo','display_notepads','a:1:{i:0;s:32:\"questions@goalcollegeathlete.com\";}'),('questions@goalcollegeathlete.com','horde','last_maintenance','1386813056');
/*!40000 ALTER TABLE `horde_prefs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-17 20:38:36

-- kronolith_events...
-- /usr/bin/mysqldump --complete-insert --insert-ignore --skip-lock-tables --no-create-info --no-create-db horde kronolith_events --where "calendar_id='goalcoll' or calendar_id like '%@m.goalcollegeathlete.com' or calendar_id like '%@goalcollegeathlete.com'"
-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: horde
-- ------------------------------------------------------
-- Server version	5.5.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `kronolith_events`
--
-- WHERE:  calendar_id='goalcoll' or calendar_id like '%@m.goalcollegeathlete.com' or calendar_id like '%@goalcollegeathlete.com'

LOCK TABLES `kronolith_events` WRITE;
/*!40000 ALTER TABLE `kronolith_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `kronolith_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-17 20:38:36

-- kronolith_storage...
-- /usr/bin/mysqldump --complete-insert --insert-ignore --skip-lock-tables --no-create-info --no-create-db horde kronolith_storage --where "vfb_owner='goalcoll' or vfb_owner like '%@m.goalcollegeathlete.com' or vfb_owner like '%@goalcollegeathlete.com'"
-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: horde
-- ------------------------------------------------------
-- Server version	5.5.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `kronolith_storage`
--
-- WHERE:  vfb_owner='goalcoll' or vfb_owner like '%@m.goalcollegeathlete.com' or vfb_owner like '%@goalcollegeathlete.com'

LOCK TABLES `kronolith_storage` WRITE;
/*!40000 ALTER TABLE `kronolith_storage` DISABLE KEYS */;
/*!40000 ALTER TABLE `kronolith_storage` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-17 20:38:36

-- mnemo_memos...
-- /usr/bin/mysqldump --complete-insert --insert-ignore --skip-lock-tables --no-create-info --no-create-db horde mnemo_memos --where "memo_owner='goalcoll' or memo_owner like '%@m.goalcollegeathlete.com' or memo_owner like '%@goalcollegeathlete.com'"
-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: horde
-- ------------------------------------------------------
-- Server version	5.5.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `mnemo_memos`
--
-- WHERE:  memo_owner='goalcoll' or memo_owner like '%@m.goalcollegeathlete.com' or memo_owner like '%@goalcollegeathlete.com'

LOCK TABLES `mnemo_memos` WRITE;
/*!40000 ALTER TABLE `mnemo_memos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mnemo_memos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-17 20:38:36

-- nag_tasks...
-- /usr/bin/mysqldump --complete-insert --insert-ignore --skip-lock-tables --no-create-info --no-create-db horde nag_tasks --where "task_owner='goalcoll' or task_owner like '%@m.goalcollegeathlete.com' or task_owner like '%@goalcollegeathlete.com'"
-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: horde
-- ------------------------------------------------------
-- Server version	5.5.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `nag_tasks`
--
-- WHERE:  task_owner='goalcoll' or task_owner like '%@m.goalcollegeathlete.com' or task_owner like '%@goalcollegeathlete.com'

LOCK TABLES `nag_tasks` WRITE;
/*!40000 ALTER TABLE `nag_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `nag_tasks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-17 20:38:36

-- turba_objects...
-- /usr/bin/mysqldump --complete-insert --insert-ignore --skip-lock-tables --no-create-info --no-create-db horde turba_objects --where "owner_id='goalcoll' or owner_id like '%@m.goalcollegeathlete.com' or owner_id like '%@goalcollegeathlete.com'"
-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: horde
-- ------------------------------------------------------
-- Server version	5.5.36-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `turba_objects`
--
-- WHERE:  owner_id='goalcoll' or owner_id like '%@m.goalcollegeathlete.com' or owner_id like '%@goalcollegeathlete.com'

LOCK TABLES `turba_objects` WRITE;
/*!40000 ALTER TABLE `turba_objects` DISABLE KEYS */;
/*!40000 ALTER TABLE `turba_objects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-17 20:38:36
