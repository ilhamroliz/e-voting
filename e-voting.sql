/*
SQLyog Ultimate v8.61 
MySQL - 5.0.51 : Database - e-voting
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`e-voting` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `e-voting`;

/*Table structure for table `m_calon` */

DROP TABLE IF EXISTS `m_calon`;

CREATE TABLE `m_calon` (
  `calon_id` int(11) NOT NULL auto_increment,
  `ketetapan_id` int(11) NOT NULL,
  `calon_nama` varchar(60) default NULL,
  `calon_inisial` varchar(30) default NULL,
  `calon_NBM` char(20) default NULL,
  `calon_tmplahir` varchar(100) default NULL,
  `calon_tgllahir` date default NULL,
  `calon_alamat` text,
  `calon_kontak` varchar(100) default NULL,
  `calon_asal` text,
  `calon_riwayat_internal` text,
  `calon_riwayat_eksternal` text,
  `calon_foto` varchar(50) default NULL,
  `calon_status` int(1) default NULL,
  `calon_urut` int(11) default NULL,
  PRIMARY KEY  (`calon_id`),
  KEY `ketetapan_id` (`ketetapan_id`),
  CONSTRAINT `m_calon_ibfk_1` FOREIGN KEY (`ketetapan_id`) REFERENCES `m_ketetapan` (`ketetapan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

/*Data for the table `m_calon` */

insert  into `m_calon`(`calon_id`,`ketetapan_id`,`calon_nama`,`calon_inisial`,`calon_NBM`,`calon_tmplahir`,`calon_tgllahir`,`calon_alamat`,`calon_kontak`,`calon_asal`,`calon_riwayat_internal`,`calon_riwayat_eksternal`,`calon_foto`,`calon_status`,`calon_urut`) values (1,1,'Suwarno, S.Pd.I., S.Pd.','Suwarno','838.725','Sragen','1969-07-10','Perum Cerme Indah Blok M 24','7995476/081331780209/77363607','PCM Cerme','','','1.jpg',1,47),(2,1,'Ir. Dodik Priambodo','Dodik Priambodo','','Nganjuk','1966-05-14','Jl. Nuri 2 KA 15 GKA Gresik','3952239/0811342853','','','','2.jpg',1,37),(3,1,'Drs. H. Khoirullah, SH., M.Pd.','Khoirullah','710.243','Gresik','1953-03-07','Jl. Sitarda 17 Ujung Pangkah','3948022/081330695784','PCM Ujung Pangkah','','','3.jpg',1,13),(4,1,'H. Suprapto Achyar','Suprapto','890.025','Malang','0000-00-00','Jl. Baja Raya 37 PPI Gresik','3951814/081332841251','PCM Manyar','','','4.jpg',1,33),(5,1,'KH. Muchlas Hamim','Muchlas Hamim','169.078','Gresik','0000-00-00','Sembungan  Kidul 33 Dukun','8123161537','PDM','','','5.jpg',1,41),(6,1,'Drs. H. Nur Ali','H. Nur Ali','','Lamongan','1956-05-09','Jl. Raya 26 Bungah','3949456/081330905070','PCM Bungah','','','6.jpg',1,20),(7,1,'Abdul Ghozi, S.Pd.','Abdul Ghozi','750.273','Gresik','1969-10-07','RT 2 RW 15 Pangkah Wetan Ujung Pangkah','81330033765','Pemuda/HW/PCM','','','7.jpg',1,2),(8,1,'Drs. H. Solihin Hamid','Solihin Hamid','772.059','Lamongan','1955-08-15','Dukunanyar 164 Dukun Gresik','3949186/08121672075','PCM Dukun/MKKM','','','8.jpg',1,22),(9,1,'Faqih Usman, SE.','Faqih Usman','','Gresik','1971-10-11','RT 01 RW 01 Dusun Pantenan Panceng','81332099720','PRM/Parpol','','','9.jpg',1,29),(10,1,'Abdul Faliq, S.Pd., M.Ag.','Abdul Faliq','835.835','Lamongan','1964-02-06','Rejodadi Campurejo Panceng','3941511/081231621503','PRM/PCM Panceng/HW','','','10.jpg',1,1),(11,1,'Slamet Sugyono, S.Ag.','Slamet Sugyono','998.204','Gresik','1967-04-02','Dusun Wotan Panceng Gresik','8564023852','PRM Wotan Panceng','','','11.jpg',1,46),(12,1,'Drs. H. Muhammad Maftuh, M.Pd.','M. Maftuh','701.763','Gresik','1964-06-04','Jl. Nongko Kerep RT 9 RW 3 No. 4 Bungah','085732524492/08121662780','PCM Bungah','','','12.jpg',1,18),(13,1,'Sholihin, M.Pd.','Sholihin','839.578','Gresik','1967-10-22','RT3A/RW1 Bungah Gresik','3949389/081703456370','PCM Bungah/HW','','','13.jpg',1,45),(14,1,'Tri Ari Prabowo, SE. M.Si.','Tri Ari Prabowo','','Blora','1971-03-03','Jl. Banjarsari Asri XII/3 Cerme Gresik','70951333/7995209/085649116661','Majelis Kader','','','14.jpg',1,48),(15,1,'H. Soenaryo Anwar','H. Soenaryo A.','507.425','Gresik','1955-08-11','Jl. Asahan 23 Randu Agung Gresik','3970026/0818326993/081946716993','PCM','','','15.jpg',1,32),(16,1,'Hasan Basri, S.Ag., M.Pd.I.','Hasan Basri','878.334','Sumenep','1971-02-11','Jl. Marabahan III/3 GKB Gresik','3959544/08123179718','PDM','','','16.jpg',1,34),(17,1,'Drs. H. Nadlif Abu Ali, M.Si.','H. Nadlif Abu Ali','685.947','Gresik','1961-09-26','Jl. Raya Padang Bandung 15 Dukun Gresik','3948371/08121768460','Majelis Dikdamen','','','17.jpg',1,19),(18,1,'Drs. Mukhtamil Pranoto','Mukhtamil Pranoto','557.253','Gresik','1960-11-03','Jl. Intan II/14 PPS Gresik','72514753/081330709510','Mejelis Dikdasmen','','','18.jpg',1,26),(19,1,'Drs. A. Mudhofar, M.MPd.','A. Mudhofar','783.231','Gresik','1964-05-15','Padang Bandung Dukun','8123064305','PCM Dukun/Majelis Dikdasmen','','','19.jpg',1,8),(20,1,'Drs. H. Shohibun Nur, M.Si.','H. Shohibun Nur','559.305','Gresik','1952-03-08','Pengulu RT2 RW1 Sidayu Gresik','081515369778/081515369779','PCM Sidayu/MKDK','','','20.jpg',1,21),(21,1,'Budi Masruri, SH., S.Ag.','Budi Masruri','878.405','Kediri','1975-06-10','Jl. Berlian III/16 Gresik Bunder Asri','3952484/081333339985','PD.Pemuda Muh/Maj. Waziz','','','21.jpg',1,5),(22,1,'Drs. H. Lukman Hakim, M.Si.','H. Lukman Hakim','627.968','Gresik','1959-05-19','Gumeno Manyar Gresik','81553331959','PCM Manyar/Maj.Tarjih','','','22.jpg',1,14),(23,1,'Hilmi Azim Hamim, M.Pd.I.','Hilmi Azim Hamim','559.314','Gresik','1957-10-16','Jl. Sunan Prapen Kebondalem 2 Sekarkurung Kebomas','8123502053','PDM/Kwarda HW','','','23.jpg',1,35),(24,1,'Drs. H. Abd. Rozaq','H. Abd. Rozaq','991.484','','0000-00-00','Jl. Ikan Kerapu Timur 1 BP Kulon Gresik','','PCM Kebomas','','','24.jpg',1,11),(25,1,'Drs. AH. Nurhasan Anwar, M.Pd.','AH. Nurhasan A.','686.336','Lamongan','1967-10-09','Jl.Tanjung Hulu II/50 GKB','77882755/08121628042','PCM Manyar/Kwarda HW','','','25.jpg',1,9),(26,1,'Drs. H. Awwaluddin, M.Ag.','H. Awwaluddin','768.412','Gresik','1958-05-11','Jl. Dr. Wahidin SH X/48 Perum Wahidin Permai','71957007/081330663660','PDM','','','26.jpg',1,12),(27,1,'dr. Burhanuddin','Burhanuddin','768.488','Bangkalan','1965-01-20','Perdin PT SG G-17 Gresik','81330792194','PCM Kembomas','','','27.jpg',1,7),(28,1,'H. Machfudl Asyrofi, S.Ag., M.Si.','H. Machfudl A.','768.487','Lamongan','1963-11-08','Jl. Jaksa Agung Suprapto 8F/3 Gresik','3972926/0817593314','PDM','','','28.jpg',1,31),(29,1,'Drs. Eko Budi Leksono, M.Si.','Eko Budi Leksono','969.243','Banyuwangi','1973-11-12','Jl. Banjar Baru I/2 GKB Gresik','3958573/0812324857','Majelis Dikdasmen','','','29.jpg',1,10),(30,1,'Drs. M. Sholihin, M.Pd.','M. Sholihin','693.957','Lamongan','1961-05-05','Jl. Sindujoyo II/66 Gresik','3984129/08155142386','PDM','','','30.jpg',1,25),(31,1,'Drs. Wahyani Ahmad','Wahyani Ahmad','791.978','Boyolali','1951-05-21','Jl. Sunan Giri V/4 Giri Kebomas','3979923/081331792934','Mejelis Tabligh','','','31.jpg',1,28),(32,1,'Achmad Irfan Muzni, M.Psi.','Ach. Irfan Muzni','992.966','Gresik','1974-05-12','Jl. Lasem 11 GKB','3959473/08133221523495','MKKM','','','32.jpg',1,4),(33,1,'Drs. H. M. Lembang Widjaya, M.Pd.','H.M. Lembang W','130.456','Gresik','1957-04-10','Jl. Faqih Usman VII/9 Gresik','3983980/081456037727','PDM','','','33.jpg',1,15),(34,1,'Mulyana A.Z., S.Pd., M.Psi.','Mulyana A.Z.','727.438','Kediri','1967-04-08','Jl. Belitung VIII/72 GKB','3955593/081332080275','Mejelis Dikdasmen','','','34.jpg',1,43),(35,1,'Abdullah Sidiq Notonegoro, S.P., S.Ag','Sidiq Notonegoro','13207095778694','Gresik','1970-11-01','Jl. Pilangsari 25 Balongpanggang-Gresik','081553346101','Balongpanggang','','','35.jpg',1,3),(36,1,'Drs. Ir. H. Rudy Wahyu Finansyah, MT.','H. Rudy Wahyu F.','878,325','Gresik','1960-10-18','Jl. Kutai 1 GKB Gresik','3985864/081363957639','PDM','','','36.jpg',1,24),(37,1,'Drs. Sarwo Edy, M.Pd.','Sarwo Edy','877,326','Lamongan','1967-08-24','Jl. Parkit CA-18 GKA Gresik','3953256/08155201897','PDM','','','37.jpg',1,27),(38,1,'Dian Berkah, M.Hi.','Dian Berkah','953,465','Bekasi','1983-09-23','Jl. Baja II/6 PPI Manyar Gresik','3950439/081555836817','Majelis Tarjih','','','38.jpg',1,6),(39,1,'Ir. H. Hon Jaelani','H. Hon Jaelani','890,019','Metro','1961-09-25','Jl. Palem 4, PPI Manyar Gresik','3954142/08121759341','PCM Manyar, Majelis Kader','','','39.jpg',1,38),(40,1,'Ir. H. Suhaili, M.Si.','H. Suhaili','770,770','Ampenan','1963-06-04','Jl. Samarinda 11 GKB Gresik','3954056/081330666692','PCM Gresik','','','40.jpg',1,40),(41,1,'Drs. H. Misbah, M.Ag.','H. Misbah','703,988','Gresik','1961-02-08','Jl. DR. Wahidin SH 190 Gresik','3979710/081553757150','Majelis ','','','41.jpg',1,16),(42,1,'Ir. H. Sugeng, MM.','H. Sugeng','950,225','Lamongan','1961-09-12','Jl. Perintis I/6 Gresik','3951086/08123167704','PCM GKB, Majelis Wazis','','','42.jpg',1,39),(43,1,'Drs. H. Mohammad In\'am, M.Pd.I.','H. M. In\'am','576,801','Jombang','1956-07-03','Jl. Sunan Giri IV/3 Giri Kebomas','3975878/081331924139','PDM','','','43.jpg',1,17),(44,1,'Drs. H. Taufiqullah Al Ahmadi, M.Ag.','H. Taufiqullah A.','701,741','Gresik','1966-07-11','Jl. Dr. Wahidin SH XIV L/08 Randu Agung','81332229944','PDM','','','44.jpg',1,23),(45,1,'Ibnu Chazm, S,Ag.','Ibnu Chazm','905,961','Gresik','1968-03-11','Kramat Duduk Sampeyan','3904023/082142588089','PCM Duduk/Majelis Kader','','','45.jpg',1,36),(46,1,'Radiono, MPd.','Radiono','800,357','Gresik','1964-02-25','Mojoroto RT1 RW1 Ds.Balongpanggang Gresik','7923762/7160630/081330206625','PCM/ PRM Bl.panggang','','','46.jpg',1,44),(47,1,'Yahya AM.','Yahya AM.','582,702','Gresik','1963-10-13','Tebaloan Duduksampeyan Gresik','3904143/081357067576','PCM','','','47.jpg',1,49),(48,1,'H. Cut Pa\'i','H. Cut Pa\'i','901.984','','0000-00-00','Jl.Putat Lor Menganti Gresik','','PCM Menganti','','','48.jpg',1,30),(49,1,'M. Thoha Mahsum, S.Ag.','M. Thoha Mahsum','','','0000-00-00','','','','','','49.jpg',1,42),(50,2,'Hj. Muyasaroh','Muyasaroh','1','Gresik','2010-11-11','0','0','0','0','1','50.jpg',1,10),(51,2,'Dra. Nurun Nazilah','Nurun','2','Gresik','2010-11-12','0','0','0','0','1','51.jpg',1,6),(52,2,'Noor Hayati Zaqiyah, S.T','Yeti','3','Gresik','2010-11-13','0','0','0','0','1','52.jpg',1,19),(53,2,'Nur Hidayati','Nur hidayati','4','Gresik','2010-11-14','0','0','0','0','1','53.jpg',1,20),(54,2,'Dra. Hj. Noor Azizah','Noor','5','Gresik','2010-11-15','0','0','0','0','1','54.jpg',1,2),(55,2,'Dra. Ninik Nuryani','Ninik','6','Gresik','2010-11-16','0','0','0','0','1','55.jpg',1,5),(56,2,'Siti Farichah, S.Sos','Farichah','7','Gresik','2010-11-17','0','0','0','0','1','56.jpg',1,21),(57,2,'Ir. Siti Faizah','Faiz','8','Gresik','2010-11-18','0','0','0','0','1','57.jpg',1,15),(58,2,'Sri Wahyuni, S.Ag','Yuni','9','Gresik','2010-11-19','0','0','0','0','1','58.jpg',1,22),(59,2,'Hj. Zumaroh','Zumaroh','10','Gresik','2010-11-20','0','0','0','0','1','59.jpg',1,11),(60,2,'Uswatun Hasanah','Uswatun','11','Gresik','2010-11-21','0','0','0','0','1','60.jpg',1,23),(61,2,'Dra. Mutri Susilowati','Mutri','12','Gresik','2010-11-22','0','0','0','0','1','61.jpg',1,4),(62,2,'Ning Munasichah, S.Ag','Ning','13','Gresik','2010-11-23','0','0','0','0','1','62.jpg',1,18),(63,2,'Lailatul Badriyah','Badriyah','14','Gresik','2010-11-24','0','0','0','0','1','63.jpg',1,16),(64,2,'Ir. Fiaduz Zaqiyah','Fifi','15','Gresik','2010-11-25','0','0','0','0','1','64.jpg',1,14),(65,2,'Farida Zahriyani','Yeni','16','Gresik','2010-11-26','0','0','0','0','1','65.jpg',1,9),(66,2,'Anisah Herawati','Anis','17','Gresik','2010-11-27','0','0','0','0','1','66.jpg',1,1),(67,2,'Endang Suhermin, S.Ag','Mimin','18','Gresik','2010-11-28','0','0','0','0','1','67.jpg',1,8),(68,2,'Ir. Any Faizah','Any','19','Gresik','2010-11-29','0','0','0','0','1','68.jpg',1,13),(69,2,'Elly Husniyah','Elly','20','Gresik','2010-11-30','0','0','0','0','1','69.jpg',1,7),(70,2,'Idha Rahayuningsih','Idha','21','Gresik','2010-12-01','0','0','0','0','1','70.jpg',1,12),(71,2,'Dra. Khoiriyah','Khoiriyah','22','Gresik','2010-12-02','0','0','0','0','1','71.jpg',1,3),(72,2,'Lilik Isnawati','Lilik','23','Gresik','2010-12-03','0','0','0','0','1','72.jpg',1,17),(73,1,'Abstain','Abstain',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,0);

/*Table structure for table `m_dewan` */

DROP TABLE IF EXISTS `m_dewan`;

CREATE TABLE `m_dewan` (
  `dewan_id` int(11) NOT NULL auto_increment,
  `dewan_nama` text,
  `dewan_status` int(1) default NULL,
  PRIMARY KEY  (`dewan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_dewan` */

insert  into `m_dewan`(`dewan_id`,`dewan_nama`,`dewan_status`) values (1,'MUSYDA Muhammadiyah',1),(2,'MUSYDA AiSyiah',1);

/*Table structure for table `m_group` */

DROP TABLE IF EXISTS `m_group`;

CREATE TABLE `m_group` (
  `group_id` int(11) NOT NULL auto_increment,
  `group_nama` varchar(20) default NULL,
  PRIMARY KEY  (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_group` */

insert  into `m_group`(`group_id`,`group_nama`) values (1,'Super Admin'),(2,'Admin');

/*Table structure for table `m_ketetapan` */

DROP TABLE IF EXISTS `m_ketetapan`;

CREATE TABLE `m_ketetapan` (
  `ketetapan_id` int(11) NOT NULL auto_increment,
  `ketetapan_tanggal` date default NULL,
  `ketetapan_keterangan` text,
  `ketetapan_jumlah` int(11) default NULL,
  `ketetapan_calon` int(11) default NULL,
  `ketetapan_status` int(11) default NULL,
  `dewan_id` int(11) NOT NULL,
  PRIMARY KEY  (`ketetapan_id`),
  KEY `NewIndex1` (`dewan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_ketetapan` */

insert  into `m_ketetapan`(`ketetapan_id`,`ketetapan_tanggal`,`ketetapan_keterangan`,`ketetapan_jumlah`,`ketetapan_calon`,`ketetapan_status`,`dewan_id`) values (1,'2011-11-22','Periode 2011-2016',49,13,1,1),(2,'2011-11-22','E-Voting Aisyiyah | Kab. Gresik',23,9,1,2);

/*Table structure for table `m_pemilih` */

DROP TABLE IF EXISTS `m_pemilih`;

CREATE TABLE `m_pemilih` (
  `pemilih_id` char(20) NOT NULL,
  `pemilih_nama` varchar(50) default NULL,
  `pemilih_alamat` text,
  `pemilih_kontak` char(30) default NULL,
  `pemilih_status` int(1) default NULL,
  `ketetapan_id` int(11) NOT NULL,
  PRIMARY KEY  (`pemilih_id`,`ketetapan_id`),
  KEY `NewIndex2` (`ketetapan_id`),
  CONSTRAINT `FK_m_pemilih_ketetapan` FOREIGN KEY (`ketetapan_id`) REFERENCES `m_ketetapan` (`ketetapan_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_pemilih` */

insert  into `m_pemilih`(`pemilih_id`,`pemilih_nama`,`pemilih_alamat`,`pemilih_kontak`,`pemilih_status`,`ketetapan_id`) values ('100001','Ali','Lamongan','0',1,1),('100002','Andy','Gresik','0',1,1),('100003','Amir','Gresik','0',1,1),('100004','Angga','Gresik','0',1,1),('100005','Budi','Gresik','0',1,1),('100006','Andre','Gresik','0',1,1),('200001','Siti','Gresik','0',1,2),('200002','Shanti',NULL,NULL,1,2),('200003','Susi',NULL,NULL,1,2),('200004','Lala',NULL,NULL,1,2);

/*Table structure for table `m_user` */

DROP TABLE IF EXISTS `m_user`;

CREATE TABLE `m_user` (
  `user_id` varchar(50) NOT NULL,
  `user_nama` varchar(50) default NULL,
  `user_password` varchar(32) default NULL,
  `group_id` int(11) default NULL,
  `dewan_id` int(11) default NULL,
  PRIMARY KEY  (`user_id`),
  KEY `NewIndex1` (`group_id`),
  KEY `NewIndex2` (`dewan_id`),
  CONSTRAINT `FK_m_user_dewan` FOREIGN KEY (`dewan_id`) REFERENCES `m_dewan` (`dewan_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_m_user_group` FOREIGN KEY (`group_id`) REFERENCES `m_group` (`group_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_user` */

insert  into `m_user`(`user_id`,`user_nama`,`user_password`,`group_id`,`dewan_id`) values ('admin1','Super Admin','c4ca4238a0b923820dcc509a6f75849b',1,1),('admin2','Admin','c4ca4238a0b923820dcc509a6f75849b',2,1),('admin3','Super Admin','c4ca4238a0b923820dcc509a6f75849b',1,2),('admin4','Admin','c4ca4238a0b923820dcc509a6f75849b',2,2);

/*Table structure for table `t_pemilihan` */

DROP TABLE IF EXISTS `t_pemilihan`;

CREATE TABLE `t_pemilihan` (
  `pemilihan_id` int(11) NOT NULL auto_increment,
  `pemilih_id` char(20) NOT NULL,
  `calon_id` int(11) NOT NULL,
  `pemilihan_tanggal` datetime default NULL,
  `user_id` varchar(50) default NULL,
  PRIMARY KEY  (`pemilihan_id`),
  KEY `pemilih_id` (`pemilih_id`),
  KEY `calon_id` (`calon_id`),
  KEY `NewIndex1` (`user_id`),
  CONSTRAINT `FK_t_pemilihan_user` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `t_pemilihan_ibfk_1` FOREIGN KEY (`pemilih_id`) REFERENCES `m_pemilih` (`pemilih_id`),
  CONSTRAINT `t_pemilihan_ibfk_2` FOREIGN KEY (`calon_id`) REFERENCES `m_calon` (`calon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_pemilihan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
