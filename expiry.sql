-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 11:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `pd_id` int(11) NOT NULL,
  `pd_name` varchar(250) NOT NULL,
  `drug_name` varchar(250) NOT NULL,
  `company` varchar(250) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pkg` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`pd_id`, `pd_name`, `drug_name`, `company`, `cat_id`, `pkg`, `date`) VALUES
(1, 'Dolo 650mg..', 'Paracetamol (650.0 Mgs)', 'MICRO LABS', 24, '1*15TAB', '2022-03-30 09:55:04'),
(2, 'Soframycin Skin Cream 30gm', 'FRAMYCETIN-1%W/W', 'SANOFI INDIA LTD', 5, '1TUBE', '2022-03-30 09:55:04'),
(3, 'Torvason 10', 'Atorvastatin (10mg)', 'Unison Pharmaceuticals Pvt Ltd', 24, '1*10TAB', '2022-03-30 09:55:04'),
(5, 'Rozucor 10', 'Rosuvastatin (10mg)', 'Torrent Pharmaceuticals Ltd', 24, '1*10TAB', '2022-03-30 09:55:04'),
(6, 'Mondeslor Tablet', 'Desloratadine (5mg) + Montelukast (10mg)', 'Sun Pharmaceutical Industries Ltd', 24, '1*10TAB', '2022-03-30 09:55:04'),
(7, 'Abmac Tablet', 'Acebrophylline (200mg) + Desloratadine (5mg) + Montelukast (10mg)', 'Unimac Pharmaceuticals Pvt Ltd', 24, '1*10TAB', '2022-03-30 09:55:04'),
(8, 'Nurokind-LC Tablet', 'Levo-carnitine (500mg) + Methylcobalamin (1500mcg) + Folic Acid (1.5mg)', 'Mankind Pharma Ltd', 24, '1*15TAB', '2022-03-30 09:55:04'),
(9, 'Xykaa MR 4', 'Paracetamol (500mg) + Thiocolchicoside (4mg)', 'Troikaa Pharmaceuticals Ltd', 24, '1*10TAB', '2022-03-30 09:55:04'),
(10, 'Candid-B Cream', 'Beclometasone (0.025% w/w) + Clotrimazole (1% w/w)', 'Glenmark Pharmaceuticals Ltd', 5, '20gm', '2022-03-30 09:55:04'),
(11, 'Anovate Cream', 'Phenylephrine (0.10% w/w) + Beclometasone (0.025% w/w) + Lidocaine (2.50% w/w)', 'USV Ltd', 5, '20gm', '2022-03-30 09:55:04'),
(12, 'Betnovate-N Cream', 'Betamethasone (0.1% w/w) + Neomycin (0.5% w/w)', 'Glaxo SmithKline Pharmaceuticals Ltd', 5, '25gm', '2022-03-30 09:55:04'),
(13, 'Flutivate Cream', 'Fluticasone Propionate (0.05% w/w)', 'Glaxo SmithKline Pharmaceuticals Ltd', 5, '10gm', '2022-03-30 09:55:04'),
(14, 'Acnemoist Cream', 'Jojoba, Pentavitin, Octyl Methoxycinnamate, and Methylene Bis-Benzotriazolyl Tetramethylbutylphenol (MBBT)', 'Curatio Healthcare India Pvt Ltd', 5, '60gm', '2022-03-30 09:55:04'),
(15, 'Nadoxin Cream', 'Nadifloxacin (1% w/w)', 'Wockhardt Ltd', 5, '10gm', '2022-03-30 09:55:04'),
(16, 'Proctosedyl BD Cream', 'Phenylephrine (0.10% w/w) + Beclometasone (0.025% w/w) + Lidocaine (2.50% w/w)', 'Sanofi India Ltd', 5, '20gm', '2022-03-30 09:55:04'),
(17, 'Lulican Cream', 'Luliconazole (1% w/w)', 'Glenmark Pharmaceuticals Ltd', 5, '30gm', '2022-03-30 09:55:04'),
(18, 'Terbinaforce-Plus NF Cream', 'Clotrimazole (1% w/w) + Clobetasol (0.05% w/w) + Neomycin (0.5% w/w)', 'Mankind Pharma Ltd', 5, '15gm', '2022-03-30 09:55:04'),
(19, 'Ketostar Cream', 'Ketoconazole (2% w/w)', 'Mankind Pharma Ltd', 5, '30gm', '2022-03-30 09:55:04'),
(20, 'Quadriderm RF Cream', 'Beclometasone (0.025% w/w) + Neomycin (0.5% w/w) + Clotrimazole (1% w/w)', 'Abbott Laboratories', 5, '5gm', '2022-03-30 09:55:04'),
(21, 'Halovate Cream', 'Halobetasol (0.05% w/w)', 'Glenmark Pharmaceuticals Ltd', 5, '30gm', '2022-03-30 09:55:04'),
(24, 'Freshwell Eye Drops 10 ml', 'POLY ETHYLENE GLYCOL-0.4%W/V + PROPYLENE GLYCOL-0.3%W/V', 'NUTRATEC PHARMACEUTICALS', 6, '10 ml', '2022-03-30 09:55:04'),
(48, 'Electral Powder Sachet', 'Oral Rehydration Salt (ORS)', 'FDC Ltd', 16, '21.8gm', '2022-04-10 14:00:09'),
(51, 'Castor Oil ', 'Castor Oil', 'GARY PHARMACEUTICALS PVT LTD', 15, '100 ml', '2022-04-11 17:56:00'),
(53, 'Lefno 20 Tablet', 'Leflunomide (20mg)', 'Ipca Laboratories Ltd', 24, '1*10TAB', '2022-04-15 09:28:27'),
(54, 'Evion 400mg', 'Tocopheryl Acetate IP 400mg', 'MERCK LIMITED', 4, '1*10CAP', '2022-04-15 09:39:15'),
(55, 'Pan D', 'Pantoprazole(40.0 Mg),Domperidone(30.0 Mg)', 'ALKEM LABORATORIES LTD', 4, '1*15CAP', '2022-04-15 09:52:37'),
(56, 'Cartilox Sachet', 'Collagen peptide,Sodium hyaluronate', 'Dr Reddys Laboratories Ltd', 19, '10.45gm', '2022-04-15 11:50:05'),
(57, 'Lornit Sachet', 'L-Ornithine L-Aspartate (3gm)', 'Zuventus Healthcare Ltd', 19, '5gm', '2022-04-15 12:44:33'),
(58, 'Accu-Chek Active Blood Glucometer Kit (Box of 10 Test strips Free)', 'Blood Glucometer\r\n', 'Roche Diabetes Care India Pvt Ltd', 2, '1packet', '2022-04-16 05:10:04'),
(59, 'TrueHb Hemoglobin Meter with 25 Strips', 'Hemoglobin Meter\r\n', 'Wrig Nanosystems Pvt Ltd', 2, '1 pack', '2022-04-16 05:11:50'),
(60, 'Isha Surgical Stature Meter Black', 'measurement of height', 'Isha Surgical', 2, '1Unit', '2022-04-16 05:12:20'),
(62, 'Rossmax Peak Flow Meter Adult', 'Flow Meter Adult\r\n', 'Rossmax International Ltd', 2, '1Unit', '2022-04-16 05:15:15'),
(63, 'EASYCARE EC1800 Digital Stature Height Meter Blue', 'measure height', 'Easy Care', 2, '1Unit', '2022-04-16 05:15:50'),
(66, 'Iodex Balm', 'Wintergreen oil (Gandapuro tel) 20%,Turpine ka tel 4%,Pudina ka Phool (Peppermint Satva) 3%,Nilgiri tel (Eucalyptus oil) 4%,', 'Clove oil (Lavang ka tel) 0.10%,GlaxoSmithKline Consumer Healthcare', 10, '40gm', '2022-04-16 05:19:02'),
(67, 'Zandu Balm Ultra Power', 'Menthol,Oil of Gaultheria,Cajuput Oil,Clove Oil,Capsaicin Extract', 'Zandu Pharmaceutical Works Ltd', 10, '8ml', '2022-04-16 05:20:09'),
(68, 'Broncho Rub Pain Relief Balm Extra Strength', 'Methyl Salicylate 26gm,Menthol 18gm,Camphor 5gm,Eucalyptus oil', 'IPI India Pvt Ltd', 10, '50ml', '2022-04-16 05:20:45'),
(69, 'Amrutanjan Maha Strong Pain Balm', 'Gandhapura Patra Taila - 30%, Pudinah - 20%, Kejoputi Taila - 4%, Lavanga Taila - 4%, Pudinah 1.0%.\r\n', 'Amrutanjan Health Care Ltd', 10, '8ml', '2022-04-16 05:21:15'),
(70, 'Sloans Balm', 'Cinnamon,Oil of Wintergreen,Mentha arvensis Oil,Capsaicin,Cedrus deodara Oil', 'Piramal Enterprises Ltd', 10, '20gm', '2022-04-16 05:21:44'),
(72, 'Himalaya Personal Care Lip Balm', 'Ricinus communis (Castor) oil,Cocos Nucifera (Coconut) Oil,Cera alba (beeswax),Hydrogenated castor oil,Theobroma cacao seed butter,Stearyl behenate,Coco-Caprylate,Aroma', 'Himalaya Drug Company', 10, '10gm', '2022-04-16 05:23:07'),
(74, 'Deemark Ortho Balm', 'Tailparna Tail, Tejovati, Tejpatta, Sati, Karpura, Pudnia, Gandhpura & White Petroleum Jelly.', 'Deemark Health Care Pvt Ltd', 10, '50gm', '2022-04-16 05:24:11'),
(75, 'Emami Mentho Plus Balm', 'Pudina ka phool,Gaultheria ka tel,Nilgiri ka tel,Lavang ka tel,Karpoor,Tarpin ka telAjowan ka phool,Surasar', 'Emami Ltd', 10, '9ml', '2022-04-16 05:24:45'),
(76, 'Vicks Vaporub', 'Pudinah ke phool,Karpoor,Ajowan ke phool,Tarpin ka tel,Nilgiri tel,Jatiphal tel  ', 'Procter & Gamble Hygiene and Health Care Ltd', 10, '50gm', '2022-04-16 05:30:02'),
(77, 'Baksons Lip Balm', 'Petroleum Jelly,Lanolin Anhydrous,Micro Wax,Bees Wax,Almond Oil,Vitamin E extracts,Aloevera,Calendula,Perfume,Sorbic Acid\r\n\r\n', 'Baksons Homeopathy', 10, '10gm', '2022-04-16 05:30:30'),
(78, 'Jiva Pain Calm Balm', 'Kapoor,Cream Base,Pudina oil,Teel parna oil,Wintergreen oil', 'Jiva Ayurvedic Pharmacy Ltd', 10, '25gm', '2022-04-16 05:31:03'),
(79, 'Allens Allen Balm', 'Arnica montana,Rhus tox,Natrum salicylicum,Camphora,Gaultheria procumbens,Mentha pip,Calendula off,Oil of turpentine,Lanolin,Paraffin,Alcohol', 'Allen Healthcare', 10, '25gm', '2022-04-16 05:31:42'),
(80, 'Hansaplast Silverhealing Washproof', 'polyurethane', 'Beiersdorf AG', 3, '10band.', '2022-04-16 05:32:51'),
(81, 'Mendwell Medicated Dressing Bandage Antiseptic', 'X\r\n', 'Prominence Healthcare Private Limited', 3, '100band.', '2022-04-16 05:33:23'),
(83, 'Smart Care Crepe Bandage Premium 10cm x 4m', 'X\r\n', 'Saify Health Care and Medi Devices India Pvt Ltd', 3, '100band.', '2022-04-16 05:34:11'),
(84, 'Dynacrepe Bandage 15cm', 'X\r\n', 'Johnson & Johnson Ltd', 3, '1band', '2022-04-16 05:34:36'),
(85, '1Mile Rigid Strapping Crepe bandage 10cm', 'X\r\n\r\n', '1Mile Healthcare', 3, '1Crepeband.', '2022-04-16 05:35:01'),
(86, 'Altraday Capsule SR', 'Aceclofenac (200mg) + Rabeprazole (20mg)\r\n', 'Sun Pharmaceutical Industries Ltd', 4, '10CAP', '2022-04-16 05:37:08'),
(87, 'Betacap TR 40 Capsule', 'Propranolol (40mg)\r\n', 'Sun Pharmaceutical Industries Ltd', 4, '10CAP', '2022-04-16 05:37:39'),
(88, 'Cyra-D Capsule', 'Domperidone (30mg) + Rabeprazole (20mg)\r\n', 'Systopic Laboratories Pvt Ltd', 4, '10CAP', '2022-04-16 05:38:37'),
(89, 'Doxt-SL Capsule', 'Doxycycline (100mg) + Lactobacillus (5Billion Spores)\r\n', 'Dr Reddys Laboratories Ltd', 4, '10CAP', '2022-04-16 05:39:02'),
(90, 'Ecosprin-AV 75 Capsule', 'Atorvastatin (10mg) + Aspirin (75mg)\r\n', 'USV Ltd', 4, '15CAP', '2022-04-16 05:39:35'),
(91, 'Fludac Capsule', 'Fluoxetine (20mg)\r\n', 'Cadila Pharmaceuticals Ltd', 4, '15CAP', '2022-04-16 05:40:01'),
(92, 'Gabapin 300 Capsule', 'Gabapentin (300mg)\r\n', 'Intas Pharmaceuticals Ltd', 4, '15CAP', '2022-04-16 05:40:26'),
(93, 'Happi-D Capsule SR', 'Domperidone (30mg) + Rabeprazole (20mg)\r\n', 'Zydus Cadila', 4, '15CAP', '2022-04-16 05:40:59'),
(94, 'Imodium Capsule', 'Loperamide (2mg)\r\n', 'Janssen Pharmaceuticals', 4, '4CAP', '2022-04-16 05:41:26'),
(95, 'Jupiros-A Capsule', 'Rosuvastatin (10mg) + Aspirin (75mg)', 'Alkem Laboratories Ltd', 4, '10CAP', '2022-04-16 05:41:56'),
(96, 'Lyrica 75mg Capsule', 'Pregabalin (75mg)\r\n', 'Pfizer Ltd', 4, '14CAP', '2022-04-16 05:42:29'),
(98, 'Meganeuron OD Plus Capsule', 'Methylcobalamin (1500mcg) + Vitamin B6 (Pyridoxine) (5mg) + Benfotiamine (50mg) + Alpha Lipoic Acid (200mg) + Folic Acid (5mg) + Biotin (5mg)', 'Aristo Pharmaceuticals Pvt Ltd', 4, '10CAP', '2022-04-16 05:43:20'),
(99, 'Xtralite Cream', 'Azelaic Acid (10% w/w) + Tretinoin (0.05% w/w)\r\n', 'La Pristine Bioceuticals Pvt Ltd', 5, '15gm', '2022-04-16 05:45:18'),
(100, 'SBL Nux Vomica Dilution 30 CH', 'Nux Vomica\r\n', 'SBL Pvt Ltd', 9, '30ml', '2022-04-16 05:46:46'),
(101, 'Dr Willmar Schwabe India Cydonia Vulgaris Dilution 30 CH', 'Cydonia Vulgaris\r\n', 'Dr Willmar Schwabe India Pvt Ltd', 9, '30ml', '2022-04-16 05:47:14'),
(102, 'Dr. Reckeweg Lycopodium Dilution 200 CH', 'Lycopodium Clavatum\r\n', 'Dr Reckeweg & Co', 9, '11ml', '2022-04-16 05:47:40'),
(103, 'Baksons Aconite Nap Dilution 30 CH', 'Aconitum napellus', 'Baksons Homeopathy', 9, '30ml', '2022-04-16 05:48:16'),
(104, 'New Life Bach Flower White Chestnut 30', 'Aesculus hippocastanum', 'New Life Laboratories Pvt Ltd', 9, '30ml', '2022-04-16 05:48:42'),
(105, 'ADEL Merc Sol Dilution 30 CH', 'MERCURIUS SOLUBILIS DILUTION\r\n\r\n', 'Adel Pekana Germany', 9, '10ml', '2022-04-16 05:49:24'),
(107, 'Dr Willmar Schwabe India Munostim Globules', 'Echinacea angustifolia 80mg, Thuja occidentalis 2x 40mg, Propolis 3x 40mg, Eleutherococcus 1x 40mg,', 'Dr Willmar Schwabe India Pvt Ltd', 67, '10gm', '2022-04-16 05:53:04'),
(108, 'Aaradhya Sugar Globules Size 40', 'Saccharum Officinarum', 'Aaradhya Sugar Enterprises', 67, '450gm', '2022-04-16 05:53:45'),
(111, 'Ansell Micro-Touch N30 Nitrile Latex-Free Disposable Gloves Medium', 'NBR disposable gloves\r\n', 'Ansell', 8, '30gloves', '2022-04-16 05:55:53'),
(112, 'Primecare Medicare HM Disposable Glove', 'HDPE (high-density polyethene)\r\n', 'Paradigm Healthcare Services', 8, '100gloves', '2022-04-16 05:56:19'),
(113, '1Mile Disposable Medical Examination Glove Medium', 'Examination Gloves\r\n', '1Mile Healthcare', 8, '20gloves ', '2022-04-16 05:56:46'),
(114, 'Livinguard Street Glove for Women Medium', 'anti-microbial technology\r\n', 'Livinguard Technologies Pvt. Ltd.', 8, '2gloves/1box', '2022-04-16 05:57:16'),
(115, 'AIO Medium White Latex Gloves (Lightly Powdered)', 'latex/rubber', '1Mile Healthcare', 8, '100gloves', '2022-04-16 05:57:44'),
(116, 'Lactifiber Granules', 'Lactitol (10gm) + Ispaghula (3.5gm)\r\n', 'Sun Pharmaceutical Industries Ltd', 14, '180gm', '2022-04-16 06:01:42'),
(118, 'Argipreg Granules', 'L- Arginine, and Proanthocyanidin\r\n', 'Mankind Pharma Ltd', 14, '6.5gm', '2022-04-16 06:02:43'),
(119, 'Lactonic Granules Elaichi', 'Asparagus racemosus,Ipomoea digitata,Glycyrrhiza glabra,Cuminum cyminum,Spinacia oleracea', 'Alembic Pharmaceuticals Ltd', 14, '200gm', '2022-04-16 06:03:10'),
(120, 'ARG 9 Granules', 'L-arginine, Proanthocyanidin', 'Nouveau Medicament Pvt Ltd', 14, '5gm', '2022-04-16 06:03:36'),
(121, 'Pentasa 1gm Prolonged Release Granules', 'Mesalazine (1gm)\r\n', 'Ferring Pharmaceuticals', 14, '1gm', '2022-04-16 06:04:00'),
(122, 'Hepamerz Granules', 'L-Ornithine L-Aspartate (3gm)', 'Win-Medicare Pvt Ltd', 14, '5gm', '2022-04-16 06:04:33'),
(123, 'Bluvit-D3 Granules', 'cholecalciferol (Vitamin D3).Vitamin D3', 'Blue Cross Laboratories Ltd', 14, '1gm', '2022-04-16 06:17:25'),
(124, 'Pankajakasthuri Breathe Eazy Granules', 'Maricham,Pippali,Viswam,Ela,Twag,Ashwagandha,Amlika,Jeeraka,Vilwa,Vasaka,Hareetaki,Sugar candy', 'Pankajakasthuri Herbals India (P) Ltd.', 14, '400gm', '2022-04-16 06:17:51'),
(125, 'Freego Granules', 'Lactitol (10gm) + Ispaghula (3.5gm)', 'Alembic Pharmaceuticals Ltd', 14, '90gm', '2022-04-16 06:18:20'),
(126, 'Evacuol Granules', 'Karaya gum,Sennoside A and B\r\n', 'Franco-Indian Pharmaceuticals Pvt Ltd', 14, '75gm', '2022-04-16 06:18:43'),
(127, 'Constac Granules', 'Triphala,Behada,Hirada,Amla,Isabgol,Mulethi,Ajwain,Elachi,Badishep(Fennel Seeds|,Erand Oil,Sonamukhi Leaves,Narikel Lavan\r\n', 'Healing Hands & Herbs Pvt Ltd', 14, '100gm', '2022-04-16 06:19:05'),
(128, 'Duolin Inhaler', 'Levosalbutamol (50mcg) + Ipratropium (20mcg)', 'Cipla Ltd', 12, '200MDI/1Packet', '2022-04-16 06:19:56'),
(129, 'Formonide 200 Inhaler', 'Formoterol (6mcg) + Budesonide (200mcg)', 'Zydus Cadila', 12, '120MDI/1Packet', '2022-04-16 06:20:27'),
(130, 'Asthalin 100mcg Inhaler', 'Salbutamol (100mcg)\r\n', 'Cipla Ltd', 12, '200MDI/1Packet', '2022-04-16 06:20:49'),
(131, 'Symbicort 160mcg/4.5mcg Turbuhaler', 'Formoterol (4.5mcg) + Budesonide (160mcg)', 'AstraZeneca', 12, '60MDI/1Packet', '2022-04-16 06:21:22'),
(132, 'Budetrol 200 Inhaler', 'Formoterol (6mcg) + Budesonide (200mcg)\r\n', 'Macleods Pharmaceuticals Pvt Ltd', 12, '120MDI/1Packet', '2022-04-16 06:21:51'),
(133, 'Levolin 50mcg Inhaler', 'Levosalbutamol (50mcg)\r\n', 'Cipla Ltd', 12, '200MDI/1Packet', '2022-04-16 06:22:21'),
(134, 'Digihaler FB 200 Inhaler', 'Formoterol (6mcg) + Budesonide (200mcg)\r\n', 'Glenmark Pharmaceuticals Ltd', 12, '120MDI/1Packet', '2022-04-16 06:22:46'),
(135, 'Foracort Inhaler 200', 'Formoterol (6mcg) + Budesonide (200mcg)\r\n', 'Cipla Ltd', 12, '120MDI/1Packet', '2022-04-16 06:23:13'),
(136, 'Aerocort Inhaler', 'Levosalbutamol (50mcg) + Beclometasone (50mcg)', 'Cipla Ltd', 12, '200MDI/1Packet', '2022-04-16 06:23:56'),
(137, 'Seroflo 250 Inhaler', 'Salmeterol (25mcg) + Fluticasone Propionate (250mcg)', 'Cipla Ltd', 12, '120MDI/1Packet', '2022-04-16 06:24:22'),
(138, 'Tiova Inhaler', 'Tiotropium (9mcg)\r\n', 'Cipla Ltd', 12, '200MDI/1Packet', '2022-04-16 06:24:48'),
(139, 'Maxiflo 250 Inhaler', 'Formoterol (6mcg) + Fluticasone Propionate (250mcg)\r\n', 'Cipla Ltd', 12, '120MDI/1Packet', '2022-04-16 06:25:11'),
(140, 'Avil Injection 10X2 ml', 'PHENIRAMINE-22.75MG/ML\r\n', 'SANOFI INDIA LTD', 11, '2ml', '2022-04-16 06:26:39'),
(141, 'Arachitol 6L Injection', 'Vitamin D3 (600000IU)', 'Abbott', 11, '6inj/1packet', '2022-04-16 06:27:16'),
(142, 'Ryzodeg 100IU/ml Penfill', 'Insulin Degludec (2.56mg/1ml) + Insulin Aspart (1.05mg/1ml)\r\n', 'Novo Nordisk India Pvt Ltd', 11, '3ml/1penfill', '2022-04-16 06:27:43'),
(143, 'Sustanon 250 Injection 1 ml', 'TESTOSTERONE DECANOATE-100MG + TESTOSTERONE ISOCAPROATE-60MG + TESTOSTERONE PHENYLPROPIONATE-60MG + TESTOSTERONE PROPIONATE-30MG', 'Zydus Lifesciences', 11, '1ml', '2022-04-16 06:28:13'),
(144, 'Clexane 40mg Injection 0.4 ml', 'ENOXAPARIN-40MG\r\n', 'SANOFI INDIA LTD', 11, '40mg/0.4ml', '2022-04-16 06:28:43'),
(145, 'Orofer FCM Injection 10 ml', 'Ferric Carboxymaltose (50mg/ml)', 'Emcure Pharmaceuticals Ltd', 11, '10ml', '2022-04-16 06:29:06'),
(146, 'Cresp 40 Injection', 'Darbepoetin alfa (40mcg)\r\n', 'Dr Reddys Laboratories Ltd', 11, '0.4ml/1filled', '2022-04-16 06:29:28'),
(147, 'Methycobal Injection', 'Methylcobalamin (500mcg)\r\n', 'Wockhardt Ltd', 11, '1ml/1vial', '2022-04-16 06:29:54'),
(148, 'Toujeo 300 U/mL Solostar', 'Insulin Glargine (300u/ml)\r\n', 'Sanofi India Ltd', 11, '1filledpen', '2022-04-16 06:30:20'),
(149, 'Lantus 100IU/ml Solution for Injection 5 x 3 ml', 'INSULIN GLARGINE-100IU\r\n', 'SANOFI INDIA LTD', 11, '1-Cartridge(5-Injection)', '2022-04-16 06:30:53'),
(150, 'Dr Batras Natural Moisturizing Lotion', 'Purified Water,Caprylic/Capric Triglyceride,Glycerine,Stearic Acid,Glycol Mono Stearate,Ceteareth 6 Olivate,Olive Oil Peg-7 Esters,Aloe Barbadensis Leaf Juice,Echinacea Purpurea Root Extract', 'Dr Batra Positive Health Products Limited', 7, '400ml', '2022-04-16 06:41:32'),
(151, 'Candid-B Lotion', 'Beclometasone (0.025% w/v) + Clotrimazole (1% w/v)\r\n', 'Glenmark Pharmaceuticals Ltd', 7, '30ml', '2022-04-16 06:42:11'),
(152, 'Diprobate Plus Lotion', 'Betamethasone (0.05% w/v) + Zinc Sulfate (0.5% w/v)\r\n', 'Mepromax Life Sciences Pvt Ltd', 7, '50ml', '2022-04-16 06:42:30'),
(153, 'Aldry Lotion', 'Aluminium Chlorohydrate', 'Curatio Healthcare India Pvt Ltd', 7, '150ml', '2022-04-16 06:42:50'),
(154, 'Sirona Hydrating Body Lotion', 'Natural Blueberry: Purified Water, Glycerin, Disodium EDTA, Cetyl Alcohol, Stearic acid, Glycerol monosterate, Carbomer, Triethanolamine, Isopropyl Myristate, Olive oil, Shea butter, Cocoa butter, Vitamin E, Phenoxyethanol, Ethylhexylglycerin, Bluebe', 'Sirona Hygiene Pvt Ltd', 7, '300ml', '2022-04-16 06:43:13'),
(155, 'Caladryl Lotion', 'Calamine,Diphenhydramine\r\n', 'Piramal Enterprises Ltd', 7, '65ml', '2022-04-16 06:43:33'),
(156, 'Ozone Glo Radiance Luminous Skin Protective Lotion', 'Aloe Barbadensis extract,Papaya extract', 'Ozone Pharmaceuticals Ltd', 7, '150ml', '2022-04-16 06:43:59'),
(157, 'Epilyno Lotion', 'Cetyl Ester wax,Dimethicone,Cetyl Alcohol,Steareth,Benzyl Alcoho,lPolyacrylate cross polymer,Dimethicone cross polymer,Avenasativa,Bran extract,Sodium Benzonate\r\nPotassium sorbate,Citric Acid anhydrous', 'Sun Pharmaceutical Industries Ltd', 7, '50gm', '2022-04-16 06:44:39'),
(158, 'Zydip-C Lotion', 'Beclometasone (0.025% w/v) + Clotrimazole (1% w/v)', 'KLM Laboratories Pvt Ltd', 7, '30ml', '2022-04-16 06:45:02'),
(159, 'KZ Lotion', 'Ketoconazole (2% w/v)\r\n', 'Hegde and Hegde Pharmaceutical LLP', 7, '50ml', '2022-04-16 06:45:37'),
(160, 'Excela Moisturiser', 'Purified water,Niacinamide,Enantia chlorantha bark extract,Oleanolic acid,Butylene glycol,Glycerine', 'Cipla Ltd', 28, '50gm', '2022-04-16 07:04:06'),
(161, 'Bioderma Sebium Hydra Moisturiser', 'Glycerin, Mineral oil, Ethylhexyl palmitate, Dipropylene glycol, Xylitol, Sodium acrylate, Capric triglyceride, Glycyrrhetinic acid, Tocopheryl acetate, Polysorbate 80, Disodium EDTA, Allantoin, Fructooligosaccharides, Mannitol, Propylene glycol', 'Bioderma Laboratories', 28, '40ml', '2022-04-16 07:04:47'),
(162, 'Vadira Moisturiser', 'Jaitun oil,Erand seed oil,Almonds', 'Vadira Ayuromedic Pvt Ltd', 28, '200ml', '2022-04-16 07:05:18'),
(163, 'Nivea Men Oil Control Moisturiser', 'Panthenol,Glyceryl Glucoside,Carnitine,Ginkgo Biloba Leaf Extract,Panax Ginseng Root Extract', 'Nivea India Pvt Ltd', 28, '50ml', '2022-04-16 07:05:51'),
(164, 'Omved Daily Body Moisturiser', 'Almond Oil,Sesame Oil,Avocado Oil,Glycerin,Glyceryl Sterate,Cetyl Alcohol,Sodium Benzoate,Grape Seed Oil,Patchouli Oil,Ylang Ylang,Geranium,Titanium Dioxide', 'Omved Lifestyle Pvt Ltd', 28, '100ml', '2022-04-16 07:07:29'),
(165, 'VLCC Lavang Moisturiser', 'Ananas Sativus (Pineapple Ext),Sulphur (Sulphur),Melia Azadirachta (Margosa Bark Ext),Euphorbia Thymifolia (Euphorbia Seed Ext),Syzygium Aromaticum (Clove Oil)', 'VLCC Personal Care Limited', 28, '100ml', '2022-04-16 07:07:53'),
(166, 'DoYou Oil-Free Moisturiser', 'Rosa Damascena Flower Water,Xylitylglucoside,Anhydroxylitol Xylitol,Amylopectin,Sodium Polyacrylate Starch,Phenoxyethanol,Ethylhexylglycerine,Hydrolyzed Tomato Skin,Citric Acid,Sodium Benzoate,Potassium Sorbate,Silybum Marianum Ethyl Ester,Dictyopter', 'Born Bright Products Pvt Ltd', 28, '50ml', '2022-04-16 07:08:26'),
(167, 'Sri Sri Tattva Extra Nourishing Moisturiser', 'Rose extract,Almond oil', 'Sriveda Sattva Pvt Ltd', 28, '60ml', '2022-04-16 07:09:32'),
(168, 'Asthea Moisturiser', 'Naja Tripundias\r\n', 'Wellman Herbals', 28, '150gm', '2022-04-16 07:09:54'),
(169, 'Cetaphil Restoraderm Body Moisturizer', '\r\nGlycerin,Caprylic/Capric Triglyceride,Helianthus Annuus (sunflower) seed oil,Pentylene glycol,Butyrospermum parkii (shea butter),Sorbitol,Cyclopentasiloxane,Cetearyl alcohol,Behenyl alcohol,Glyceryl stearate,Tocopheryl Acetate,Allantoin,Panthenol,A', 'Nestle Skin Health India Pvt Ltd', 28, '295ml', '2022-04-16 07:10:43'),
(170, 'Mamaearth Oil-Free Face Moisturizer', 'Applr CIder vinegar,Cetearyl Octanoate,Betaine,Fatty Acids', 'Honasa Consumer Pvt Ltd', 28, '80ml', '2022-04-16 07:11:35'),
(171, 'Atrimed Moish Herbal Moisturizer', 'Aloe vera,Carsamon,Yashti', 'Atrimed Pharmaceuticals P Ltd', 28, '200ml', '2022-04-16 07:11:58'),
(172, 'Imiana Imbotox Anti Ageing Moisturizer', 'Rosehip Oil,Mango Butter,Vitamin A,Vitamin E,Carrot seed essential oil,Geranium essential oil', 'Imiana House Pvt Ltd', 28, '50gm', '2022-04-16 07:12:19'),
(173, 'Omron Compressor Nebulizer NE-C106 White', 'Nebulizer NE-C106\r\n', 'Omron Healthcare India Pvt Ltd', 13, '1 Unit', '2022-04-16 07:13:57'),
(174, 'Smart Care Mini Nebulizer for Individual Use', 'Mini Nebulizer', 'Saify Health Care and Medi Devices India Pvt Ltd', 13, '1 Unit', '2022-04-16 07:14:24'),
(175, 'AccuSure ML Nebulizer', 'Nebulizer\r\n', 'AccuSure Ortho Support', 13, '1 Unit', '2022-04-16 07:14:54'),
(176, 'Entair EHS-CN01 Compressor Nebulizer', 'EHS-CN01 Compressor\r\n', 'Entero Healthcare Solutions Pvt Ltd', 13, '1 Unit', '2022-04-16 07:15:44'),
(177, 'MCP Adult Nebulizer Mask', 'Adult Nebulizer', 'MCP', 13, '1 Mask', '2022-04-16 07:16:08'),
(178, 'Rosscare Compressor Nebulizer', 'Compressor Nebulizer', 'Emami Frank Ross Ltd', 13, '1 Unit', '2022-04-16 07:16:35'),
(179, 'iGRiD IG1614N Compact Compressor Nebulizer', 'Compact Compressor Nebulizer', 'Igridstore', 13, '1 Unit', '2022-04-16 07:16:58'),
(180, 'Equinox EQ-NL-27 Compressor Nebulizer', 'EQ-NL-27 Compressor Nebulizer\r\n', 'Equinox Overseas Pvt Ltd', 13, '1 Unit', '2022-04-16 07:17:22'),
(181, 'Beurer IH 58 Nebulizer Grey', 'IH 58 Nebulizer\r\n', 'Beurer', 13, '1 Unit', '2022-04-16 07:17:46'),
(182, 'Entair YS 30 Portable Mesh Nebulizer Blue', 'YS 30 Portable Mesh Nebulizer\r\n', 'Entero Healthcare Solutions Pvt Ltd', 13, '1 Unit', '2022-04-16 07:18:12'),
(183, 'Organic India Virgin Coconut Oil', 'Coconut oil', 'Organic India', 15, '500ml', '2022-04-16 07:19:31'),
(184, 'Dr Ortho an Ayurvedic Medicine Oil', 'Flaxseed Oil,Camphor oil,Peppermint Oil,Til Oil', 'Dr Ortho Ayurvedic', 15, '120ml', '2022-04-16 07:20:03'),
(185, 'Baidyanath (Nagpur) Rhuma Oil', 'Erandmool (Ricinus communis),Dhatura Panchang (Dhatura metel),Ashwagandha (Withania somniferra),Shatawari (Asparagus racemosa),Ama haldi (Curcuma aromatica),Kuchala (Strychnos nuxvomica),Bachnag (Vatsnav)(Aconitum ferox),Prasarini (Paederia foetida),', 'Shree Baidyanath Ayurved Bhawan (P)Limited (Nagpur)', 15, '100ml', '2022-04-16 07:21:19'),
(186, 'Indulekha Hair Oil', 'Bringhraj, Svetakutaja, Amla and Virgin coconut oil', 'Hindustan Unilever Ltd', 15, '100ml', '2022-04-16 07:21:44'),
(187, 'Upakarma Ayurveda Badam Rogan Sweet Almond Oil', 'Prunus amygdalus (almond)', 'Upakarma Ayurveda', 15, '100ml', '2022-04-16 07:22:12'),
(188, 'Kwik Pain Relieving Oil', 'Kapoor,Pudian,Capcisum\r\n', 'Ozone Pharmaceuticals Ltd', 15, '120ml', '2022-04-16 07:22:44'),
(189, 'Navratna Cool Ayurvedic Oil', 'Sesame oil,Menthol,Amla,Camphor,Thyme,Rosemary oil', 'Emami Ltd', 15, '500ml', '2022-04-16 07:23:20'),
(190, 'Hamdard Roghan Badam Shirin Oil', 'sweet almond oil', 'Hamdard Laboratories India', 15, '50ml', '2022-04-16 07:23:42'),
(191, 'Macgesia Oil', 'Gandhapura Oil, Karpoora, Pudina, Nilgiri Oil, Cajuput Oil, Lavanga Oil, Dalchini Oil, Lavender Oil', 'Macleods Pharmaceuticals Pvt Ltd', 15, '50ml', '2022-04-16 07:24:14'),
(192, 'Wheezal Jaborandi Hair Treatment Oil', 'Jaborandi Q,Brahmi Q,Wiesbaden 6x,Cantharis Q,Arnica Mont. Q', 'Wheezal Homeo Pharma', 15, '110ml', '2022-04-16 07:24:45'),
(193, 'Whisper Choice Ultra Sanitary Pads XL', 'spunlace fabric and polyethylene\r\n', 'Procter & Gamble Hygiene and Health Care Ltd', 63, '6pads', '2022-04-16 07:25:24'),
(194, 'Sofy AntiBacteria 99.9% Sanitary Pads Extra Long Super Saver Pack', 'Antibacteria Sanitary Pads\r\n', 'Unicharm India', 63, '48pads', '2022-04-16 07:25:59'),
(195, 'Sirona Dry Comfort Panty Liners Large', 'absorbent cellulose and absorbent gel material', 'Sirona Hygiene Pvt Ltd', 63, '60pads', '2022-04-16 07:26:23'),
(196, 'Stayfree Secure Cottony Soft with Wings Pads Regular', 'superabsorbent polymers (SAP)', 'Johnson & Johnson Ltd', 63, '20pads', '2022-04-16 07:26:51'),
(197, 'Softovac Bowel Regulator Powder Jar', 'Isabgol 2g,Sonamukhi 0.75g,Harad 0.50g,Amaltas 0.50g,Mulethi 0.25g,Gulab Jal 0.25g,Saunf 0.25g,Saunf Taila 0.05g,Sharkara,Sodium Benzoate', 'Lupin Ltd', 16, '100gm', '2022-04-16 07:28:18'),
(198, 'Ensure Diabetes Care Vanilla Delight Powder', 'Maltodextrin,Calcium Caseinate,Edible Vegetable Oils (High Oleic Sunflower Oil, Soy Oil),Fructose, Cocoa Powder,Fructooligosaccharide (FOS),Soy Polysaccharide,M-Inositol,Vitamins,Antioxidants (Soy Lecithin, Mixed Tocopherols) Taurine,L-Carnitine,Sucr', 'Abbott Healthcare Private Limited', 16, '200gm', '2022-04-16 07:30:06'),
(199, 'Neosporin Dusting Powder', 'Bacitracin (400IU) + Neomycin (3400IU) + Polymyxin B (5000IU)', 'Glaxo SmithKline Pharmaceuticals Ltd', 16, '10gm', '2022-04-16 07:30:30'),
(200, 'Naturolax -A Powder Tasty Orange', 'Isapgol Fibre\r\n', 'Piramal Enterprises Ltd ', 16, '100gm', '2022-04-16 07:31:55'),
(201, 'Cipladine 5% Powder', 'Povidone Iodine (5%)\r\n', 'Cipla Ltd', 16, '10gm', '2022-04-16 07:32:45'),
(202, 'Kabipro Protein 100% Whey Powder Vanilla Sugar Free', 'Gum acacia,Zinc sulphate,Maltodextrin,42% whey protein,Protein source is 100% whey,Enriched with 5% dietary fibre,Enriched with 25 vitamins and minerals,Sugar free and rich in fibres,Vitamins (Biotin, Choline),Trace elements (copper, manganese, Iodin', 'Fresenius Kabi India Pvt Ltd', 16, '200gm', '2022-04-16 07:33:25'),
(203, 'Candid Dusting Powder', 'Clotrimazole I.P: 1% w/w,Talc I.P. base q.s.', 'Glenmark Pharmaceuticals Ltd', 16, '50gm', '2022-04-16 07:33:54'),
(204, 'Clocip Dusting Powder', 'Clotrimazole-1% W/W', 'Cipla Ltd', 16, '100gm', '2022-04-16 07:34:27'),
(205, 'Sugar Free Natura Low Calorie Sweetener Powder', 'Sucralose', 'Zydus Wellness Product Ltd', 16, '100gm', '2022-04-16 07:34:55'),
(206, 'Pegfiber Powder', 'Polyethylene glycol,Ispaghula husk', 'Sun Pharmaceutical Industries Ltd', 16, '154.812gm', '2022-04-16 07:35:21'),
(207, 'Mama Protinex Powder Vanilla', 'Protein,Vitamin A,Vitamin C,Vitamin E,Vitamin D,Vitamin B6,Vitamin B12,Folate,Iron,Zinc,Selenium', 'Nutricia International Pvt Ltd', 16, '250gm', '2022-04-16 07:35:44'),
(208, 'Betadine Powder', 'Povidone Iodine (5%)', 'Win-Medicare Pvt Ltd', 16, '10gm', '2022-04-16 07:36:08'),
(209, 'Macprot Powder Kesar', 'Colostrum,DHA,Gamma Linoleic Acid', 'Macleods Pharmaceuticals Pvt Ltd', 16, '200gm', '2022-04-16 07:36:31'),
(210, 'Aptamil Stage 1 Infant Formula Powder', 'DHA,ARA,Iron,Folic acid\r\n', 'Nutricia International Pvt Ltd', 16, '400gm', '2022-04-16 07:37:07'),
(211, 'Calcirol Sachet', 'Cholecalciferol Granules (Vitamin D3): 60,000 IU', 'Cadila Pharmaceuticals Ltd', 19, '1gm', '2022-04-16 07:38:42'),
(212, 'Econorm 250mg Sachet ', 'Lyophillized Saccharomyces boulardii: 250 mg', 'Dr Reddys Laboratories Ltd', 19, '765mg', '2022-04-16 07:39:12'),
(213, 'Tracnil Sachet', 'Vitamin D3,Folic acid,Myo-inosito', 'Curatio Healthcare India Pvt Ltd', 19, '5gm', '2022-04-16 07:39:40'),
(214, 'Darolac Sachet', 'Lactobacillus (2.5Billion cells)\r\n', 'Aristo Pharmaceuticals Pvt Ltd', 19, '2gm', '2022-04-16 07:40:03'),
(215, 'Laxopeg Sachet', 'Polyethylene glycol\r\n', 'Fourrts India Laboratories Pvt Ltd', 19, '17gm', '2022-04-16 07:40:30'),
(216, 'Sporlac Banana Sachet', 'Lactic Acid Bacillus\r\n', 'Sanzyme Ltd', 19, '1gm', '2022-04-16 07:40:56'),
(217, 'Argin Sachet Orange Sugar Free', 'L-Arginine\r\n', 'Fourrts India Laboratories Pvt Ltd', 19, '5gm', '2022-04-16 07:42:14'),
(218, 'Edrive Sachet', 'L-Arginine, Ginkgo Extracts, Withania and Tribulus.', 'Innovcare Lifesciences Pvt Ltd', 19, '15gm', '2022-04-16 07:43:25'),
(219, 'Zedott Baby Sachet', 'Racecadotril (10mg)', 'Torrent Pharmaceuticals Ltd', 19, '1gm', '2022-04-16 07:43:52'),
(220, 'Superflora GG Sachet', 'Lactobacillus rhamnosus GG,Bacillus subtilis', 'Sundyota Numandis Probioceuticals Pvt Ltd', 19, '1gm', '2022-04-16 07:44:18'),
(221, 'Orthoboon Sachet', 'Collagen peptide, Glucosamine and Vitamin C', 'Mankind Pharma Ltd', 19, '12gm', '2022-04-16 07:44:44'),
(222, 'Enuff 10mg Sachet', 'Racecadotril (10mg)', 'Hetero Drugs Ltd', 19, '1gm', '2022-04-16 07:45:13'),
(223, 'Lornit Sachet', 'L-Ornithine L-Aspartate (3gm)\r\n', 'Zuventus Healthcare Ltd', 19, '5gm', '2022-04-16 07:45:41'),
(224, 'Cartilox Sachet', 'Collagen peptide,Sodium hyaluronate', 'Dr Reddys Laboratories Ltd', 19, '10.45gm', '2022-04-16 07:46:16'),
(225, 'Dettol Original Instant Hand Sanitizer', 'Alcohol Denat,Water,Propylene Glycol,Tetrahydroxypropyl Ethylenediamine,Fragrance,Limonene', 'Reckitt Benckiser', 18, '110ml', '2022-04-16 07:47:35'),
(226, 'Ciphands Antiseptic Hand Sanitizer', 'Ethyl Alcohol IP: 72.34 w/v\r\n', 'Cipla Health Ltd', 18, '100ml', '2022-04-16 07:48:04'),
(227, 'Lifebuoy Alcohol Based Hand Sanitizer', 'Ethyl Alcohol,Isopropyl Alcohol,Niacinamide', 'Hindustan Unilever Ltd', 18, '500ml', '2022-04-16 07:49:58'),
(228, 'Nanzirub Handrub Sanitizer', 'Chlorhexidine Gluconate Solution IP 2.5% v/v,Ethanol', 'Nanz Med Science Pharma Ltd', 18, '250ml', '2022-04-16 07:50:26'),
(229, 'Alcorub Hand Sanitizer', 'Chlorhexidine Gluconate Solution IP 2.5% v/v,Ethanol IP 70% v/v', 'Nanz Med Science Pharma Ltd', 18, '500ml', '2022-04-16 07:50:53'),
(230, 'Axiom Medicated Hand Sanitizer', 'Hydrogen peroxide 0.125%,Ethyl Alcohol IP 80%,Glycerol 1.45%,Propylene Glycol Q.S,Aloe Barbadensis 3%,Ocimum Sanctum ,1%', 'Axiom Ayurveda', 18, '50ml', '2022-04-16 07:51:25'),
(231, 'Nanzilon Hand Rub Hand Sanitizer', 'Chlorhexidine Gluconate Solution IP 2.5% v/v,Ethanol IP 70% v/v', 'Nanz Med Science Pharma Ltd', 18, '100ml', '2022-04-16 07:51:57'),
(232, 'Bioayurveda Instant Hand Sanitizer', 'Aloe-Vera,Neem,Lemon,Isopropyl Alcohol: 70%', 'Bioayurveda ', 18, '500ml', '2022-04-16 07:52:20'),
(233, 'Alconanz Hand Sanitizer', '2-Propanol,1-Propanol,Ethyl-Hexadecyl-Dimethyl-Ammonium-Ethyl Sulphate', 'Nanz Med Science Pharma Ltd', 18, '100ml', '2022-04-16 07:52:52'),
(234, 'Khadi Meghdoot Hand Sanitizer', 'Neem,Aloe Vera,Dhaniya,Lemon,Mint,Prasanna\r\n', 'Meghdoot Gramodyog Sewa sansthan', 18, '210ml', '2022-04-16 07:53:26'),
(235, 'Tetmosol Medicated Soap', 'Monosulfiram 5% w/w,Citronella oil,Total fatty matter', 'Piramal Enterprises Ltd', 23, '100gm', '2022-04-16 07:54:38'),
(236, 'Keto Soap', 'Ketoconazole (2% w/w)', 'Med Manor Organics Pvt Ltd', 23, '50gm', '2022-04-16 07:55:19'),
(237, 'Himalaya Neem & Turmeric Soap', 'Sodium Palmate and Sodium Palm Kernelate, Fragrance, Glycerin, Aqua, Tetrasodium EDTA, Melia Azadirachta Seed oil, Tetradibutyl Pentaerithrityl Hydroxyhydrocinnamate, Citrus Lemon peel oil, Curcuma Longa root oil', 'Himalaya Drug Company', 23, '125gm', '2022-04-16 07:55:54'),
(239, 'Kozicare Skin Lightening Soap', 'KojicAcid,Arbutin,Vitamin E\r\n', 'West-Coast Pharmaceutical Works Ltd', 23, '75gm', '2022-04-16 07:57:44'),
(240, 'Neko Daily Hygiene Soap', 'Triclocarbon,Glycerin', 'Piramal Enterprises Ltd', 23, '100gm', '2022-04-16 07:58:11'),
(241, 'Acnelak Soap', 'Aloe Vera,Triclosan,Palmrosa Oil,Lemon Oil,Tea Tree Oil', 'Menarini India Pvt Ltd', 23, '75gm', '2022-04-16 07:58:35'),
(242, 'ZyKT Soap', 'Cetrimide (0.5% w/w) + Ketoconazole (2% w/w)', 'Zydus Cadila', 23, '75gm', '2022-04-16 07:59:01'),
(243, 'Boericke and Tafel Glow & Fairness Soap', 'Aloe vera extracts,Pulsatilla,Berberis aquifolium,Chandan Oil,Turmeric', 'Dr Willmar Schwabe India Pvt Ltd', 23, '75gm', '2022-04-16 07:59:25'),
(244, 'Scabper Soap', 'Permethrin (1% w/w)', 'Menarini India Pvt Ltd', 23, '75gm', '2022-04-16 08:00:01'),
(245, 'Permite BB Soap', 'Elestab 0.1%', 'Curatio Healthcare India Pvt Ltd', 23, '75gm', '2022-04-16 08:00:27'),
(246, 'Emosys Soap', 'Aloe Vera, Almond Oil, Jojoba Oil, Olive oil and Vitamin E \r\n', 'Systopic Laboratories Pvt Ltd', 23, '75gm', '2022-04-16 08:00:47'),
(247, 'Cetrim Soap', 'Cetrimide,Vitamin E', 'Psychotropics India Ltd', 23, '75gm', '2022-04-16 08:01:11'),
(249, 'Skinshine Soap', 'Orange peel extract & lemon fruit extract,Triclosan,Tea Tree Oil,Vitamin E,Provide glowing & healthy skin,Allantoin', 'Cadila Pharmaceuticals Ltd', 23, '75gm', '2022-04-16 08:01:58'),
(251, 'Seborbar Soap', 'Syndet base,Salicylic acid,Sulfur,Zinc pyrithione,Perfume,CI 11680\r\n', 'Curatio Healthcare India Pvt Ltd', 23, '75gm', '2022-04-16 08:03:06'),
(252, 'Ethiglo Soap', 'Glycerine,Kojic Acid,Glycolic Acid,TiO2 (Titanium dioxide),Perfume', 'Ethinext Pharma', 23, '75gm', '2022-04-16 08:03:30'),
(253, 'Olesoft Soap', 'Vitamin E,Aloevera,Palm oil,Glycerine,Bear berry,Blueberry,Saffron', 'Alkem Laboratories Ltd', 23, '75gm', '2022-04-16 08:03:56'),
(254, 'PMT Soap', 'Permethrin (5% w/w)\r\n', 'Salve Pharmaceuticals Pvt Ltd', 23, '75gm', '2022-04-16 08:04:26'),
(255, 'Betadine 10% Solution', 'Povidone Iodine (10% w/v)', 'Win-Medicare Pvt Ltd', 10, '100ml', '2022-04-16 08:05:40'),
(256, 'Mintop Forte 5% Solution', 'Minoxidil (5% w/v)', 'Dr Reddys Laboratories Ltd', 1, '120ml', '2022-04-16 08:06:27'),
(257, 'Tugain 5% Solution', 'Minoxidil (5% w/v)', 'Cipla Ltd', 1, '60ml', '2022-04-16 08:06:52'),
(258, 'Dynapar Qps Topical Solution', 'Diclofenac, Methyl Salicylate, Alcohol and Menthol', 'Troikaa Pharmaceuticals Ltd', 1, '30ml', '2022-04-16 08:07:23'),
(259, 'Systane Ultra Ophthalmic Solution', 'Polyethylene Glycol (0.4% w/v) + Propylene Glycol (0.3% w/v)', 'Alcon Laboratories', 1, '10ml', '2022-04-16 08:07:54'),
(260, 'Combigan Ophthalmic Solution', 'Timolol (5mg) + Brimonidine (2mg)', 'Allergan India Pvt Ltd', 1, '5ml', '2022-04-16 08:08:22'),
(261, 'Looz Oral Solution', 'Lactulose (10gm)\r\n', 'Intas Pharmaceuticals Ltd', 1, '200ml', '2022-04-16 08:08:57'),
(262, 'Vigamox Ophthalmic Solution', 'Moxifloxacin (0.5% w/v)', 'Alcon Laboratories', 1, '5ml', '2022-04-16 08:09:26'),
(263, 'Nizral 2% Solution', 'Ketoconazole (2% w/v)\r\n', 'Alniche Life Sciences Pvt Ltd', 1, '50ml', '2022-04-16 08:09:51'),
(264, 'Anasure 5% Solution', 'Minoxidil (5% w/v)\r\n', 'Sun Pharmaceutical Industries Ltd', 1, '60ml', '2022-04-16 08:10:18'),
(265, 'Onabet SD Solution', 'Sertaconazole (2% w/v) + Mometasone (0.1% w/v)', 'Glenmark Pharmaceuticals Ltd', 1, '15ml', '2022-04-16 08:10:51'),
(266, 'Protar-K Solution', 'Ketoconazole (2% w/v) + Coal Tar (4% w/v)\r\n', 'Percos India Pvt Ltd', 1, '100ml', '2022-04-16 08:11:15'),
(267, 'K-Cit Oral Solution', 'Citric Acid (334mg/5ml) + Potassium Citrate (1100mg/5ml)', 'Dr Reddys Laboratories Ltd', 1, '450ml', '2022-04-16 08:11:41'),
(268, 'Renu Fresh Solution', 'Dymed ,Poloxamine and Hydranat', 'Bausch & Lomb Inc', 1, '500ml', '2022-04-16 08:12:07'),
(269, 'Nasoclear Saline Nasal Spray', 'Sodium Chloride IP 0.65% w/v in distilled water,Benzalkonium Chloride Solution IP 0.03% w/v (as preservative)', 'Zydus Cadila', 22, '20ml', '2022-04-16 08:13:33'),
(270, 'Duonase Nasal Spray', 'Fluticasone Propionate (50mcg) + Azelastine (140mcg)', 'Cipla Ltd', 22, '7gm', '2022-04-16 08:14:00'),
(271, 'Volini Maxx Spray', 'Diclofenac Diethylamine,Methyl Salicylate,Menthol', 'Sun Pharmaceutical Industries Ltd', 22, '25gm', '2022-04-16 08:14:38'),
(272, 'Omnigel Spray', 'Diclofenac, Linseed Oil, Diclofenac Diethylamine, Menthol and Methyl Salicylate', 'Cipla Ltd', 22, '75gm', '2022-04-16 08:14:59'),
(273, 'Flomist Nasal Spray', 'Fluticasone Propionate (0.005% w/v)\r\n', 'Cipla Ltd', 22, '10ml', '2022-04-16 08:15:23'),
(274, 'Iodex Rapid Action Spray', 'Gandapuro Tel,Peppermint Satva,Turpine ka tel', 'GlaxoSmithKline Consumer Healthcare', 22, '60gm', '2022-04-16 08:16:15'),
(275, 'Metaspray Nasal Spray', 'Mometasone (50mcg)', 'Cipla Ltd', 22, '10gm', '2022-04-16 08:16:38'),
(276, 'Azeflo Nasal Spray', 'Fluticasone Propionate (50mcg) + Azelastine (140mcg)', 'Lupin Ltd', 22, '7ml', '2022-04-16 08:17:00'),
(277, 'Savlon Surface Disinfectant Spray', 'Ethanol IP', 'ITC ltd', 22, '170gm', '2022-04-16 08:17:23'),
(278, 'Xylocaine Spray', 'Lidocaine (10% w/v)', 'Zydus Cadila', 22, '50ml', '2022-04-16 08:17:48'),
(279, 'Ascoril LS Syrup', 'Ambroxol (30mg/5ml) + Levosalbutamol (1mg/5ml) + Guaifenesin (50mg/5ml)', 'Glenmark Pharmaceuticals Ltd', 20, '100ml', '2022-04-16 08:18:24'),
(280, 'Bro-Zedex SF Syrup', 'Guaifenesin (50mg/5ml) + Terbutaline (1.25mg/5ml) + Bromhexine (4mg/5ml)', 'Dr Reddys Laboratories Ltd', 20, '100ml', '2022-04-16 08:18:52'),
(281, 'Cypon Syrup', 'Cyproheptadine (2mg/5ml) + Tricholine Citrate (275mg/5ml) + Sorbitol (2gm/5ml)', 'Geno Pharmaceuticals Ltd', 20, '200ml', '2022-04-16 08:19:15'),
(282, 'Febrex Plus Syrup', 'Chlorpheniramine Maleate (1mg/5ml) + Paracetamol (125mg/5ml) + Phenylephrine (5mg/5ml)', 'Indoco Remedies Ltd', 20, '60ml', '2022-04-16 08:19:37'),
(283, 'Grilinctus Syrup', 'Ammonium Chloride (60mg/5ml) + Chlorpheniramine Maleate (2.5mg/5ml) + Dextromethorphan Hydrobromide (5mg/5ml) + Guaifenesin (50mg/5ml)', 'Franco-Indian Pharmaceuticals Pvt Ltd', 20, '100ml', '2022-04-16 08:20:05'),
(284, 'Hicope Syrup', 'Hydroxyzine (10mg)', 'Mankind Pharma Ltd', 20, '100ml', '2022-04-16 08:20:28'),
(285, 'Levolin 1mg Syrup', 'Levosalbutamol (1mg/5ml)', 'Cipla Ltd', 20, '100ml', '2022-04-16 08:20:58'),
(286, 'Maxtra Syrup', 'Chlorpheniramine Maleate (2mg/5ml) + Phenylephrine (5mg/5ml)', 'Zuventus Healthcare Ltd', 20, '60ml', '2022-04-16 08:21:19'),
(287, 'Ondem Syrup', 'Ondansetron (2mg/5ml)\r\n', 'Alkem Laboratories Ltd', 20, '30ml', '2022-04-16 08:21:46'),
(288, 'Reswas Syrup', 'Chlorpheniramine Maleate (2mg/5ml) + Levodropropizine (30mg/5ml)', 'Dr Reddys Laboratories Ltd', 20, '120ml', '2022-04-16 08:22:10'),
(289, 'Zandu Pancharishta Ayurvedic Digestive Tonic Complete Digestive Care', 'Draksa,Kumari,Dashmoola,Ashwagandha Satavari,Triphala,Yasti & Trikatu,Trijat & Arjuna,Lodhra & Manjistha,Ajamoda & Dhanyaka,Haridra & Sati,Sveta & Jiraka', 'Zandu Pharmaceutical Works Ltd', 66, '450ml', '2022-04-16 08:23:02'),
(290, 'SBL Liv T Tonic', 'Andrographis paniculata Q,Carduus marianus Q,Chelidonium majus Q,Hydrastis canadensis Q,Ipecacuanha Q,Podophyllum peltatum Q,Taraxacum officinale Q', 'SBL Pvt Ltd', 66, '180ml', '2022-04-16 08:23:29'),
(291, 'Orofer XT Plus Iron Tonic Orange', 'Elemental iron, Mecobalamin, and Folic acid', 'Emcure Pharmaceuticals Ltd', 66, '200ml', '2022-04-16 08:24:00'),
(292, 'Livogen Adult Tonic', 'Iron Ferric Ammonium Citrate 50 mg,Proteins Enzymatic Hydrolysate 1 gm,Lysine Hydrochloride 50 mg,Nicotinamide 45 mg,Dexpanthenol 5 mg,Pyridoxine Hydrochloride 15 mg,Folic Acid 1 mg,Cyanocobalamin 75 mcg,Zinc 44 mg', 'Procter & Gamble Hygiene and Health Care Ltd', 66, '200ml', '2022-04-16 08:24:32'),
(293, 'Haslab Baby Tone-Up Tonic', 'Alfalfa 1x, Avena Sat 1x, Cinchona 1x, Hydrastis 1x, Andrographis Paniculata 1x, Cina 1x, Nux Vomica 1x Chelidonium 1x, Chamomilla 1x, Carica Papaya 1x, Ferrummet 6x and Leptandra 1x, Kali Phos 3x, Calc Phos 3x, Nat Phos 3x, Mag Phos 3x, Ferr Phos 3x', 'HASLAB', 66, '100ml', '2022-04-16 08:24:58'),
(294, 'Bayer Bayers Tonic', 'Liver Fraction 2:  40 mg derived from 01g of fresh liver,Yeast Extract: 4639  mg,Alcohol IP: 100% V/V,Colour: Caramel IP 	', 'Bayer Pharmaceuticals Pvt Ltd', 66, '250ml', '2022-04-16 08:25:59'),
(295, 'Dr Willmar Schwabe India Alfalfa Tonic For Children', 'Acidum phosphoricum 2x 50%, Alfalfa 10%, Avena sativa 50%, China 025%,Cinnamomum 05%, Hydrastis canadensis 05%, Kalium arsenicosum 6x 10%, Nux vomica 2x 025%, Excipients qs Alcohol content v/v 119%', 'Dr Willmar Schwabe India Pvt Ltd', 66, ' 100ml', '2022-04-16 08:26:26'),
(296, 'Minmin Tonic', 'Iron, Vitamins, Minerals, Proteins & Amino Acid', 'RPG Life Sciences Ltd', 66, '200ml', '2022-04-16 08:26:46'),
(297, 'Allen Gastropep Digestive Tonic', 'Alumina 3x 0005 gm,Antimonium crudum  3x 0005 gm,Carbo vegetabilis  3x 0010 gm,Carica papaya  Q 0010 ml,Cinchona  officinalis Q 0020 ml,Hydrastis canadensis Q 0020 ml,Lycopodium clavatum Q 0050 ml,Magnesia carbonica 3x 0100 gm,Natrum  phosphoricum 3x', 'Allen Homoeo & Herbal Products Ltd', 66, '200ml', '2022-04-16 08:27:11'),
(298, 'Ralson Remedies Macho Tonic', 'Damiana 1x,Avena sativa 2x,Agnus castus 2x,China off 2x,Acidum phosphoricum 3x,Viburnum opulus 3x,Lycopodium clavatum 4x,Yohimbinum 1x,', 'Ralson Remedies Pvt Ltd', 66, '200ml', '2022-04-16 08:27:38'),
(299, 'Vansaar Iron Tonic', 'Loha-sodhita,Haritaki,Pippali,Bibhitaki', 'Riaan Wellnes Pvt Ltd', 66, '450ml', '2022-04-16 08:27:57'),
(300, 'Phosfomin Iron Tonic', 'iron (III) hydroxide polymaltose', 'Abbott', 66, '150ml', '2022-04-16 08:28:29'),
(301, 'Vantej Toothpaste', 'Calcium Sodium Phosphosilicate(Active Ingredient)- 5%,Glycerin,PEG 400,Silica,Sodium Lauryl Sulphate,Titanium Dioxide,Carbomer,Potassium Acesulfame', 'Dr Reddys Laboratories Ltd', 25, '50gm', '2022-04-16 08:30:16'),
(302, 'RA Thermoseal Rapid Action Fresh Mint Toothpaste', 'Potassium Nitrate,Sodium monofluorophosphate', 'Icpa Health Products Ltd', 25, '50gm', '2022-04-16 08:30:36'),
(303, 'Sensodyne Fresh Mint Sensitive Toothpaste', 'Potassium Nitrate,Sodium Fluoride,Sodium Lauryl Sulphate', 'GlaxoSmithKline Consumer Healthcare', 25, '40gm', '2022-04-16 08:30:58'),
(304, 'Thermoseal Repair Toothpaste', 'Strontium Chloride Hexahydrate', 'Icpa Health Products Ltd', 25, '50gm', '2022-04-16 08:31:19'),
(305, 'Dabur Red Toothpaste', 'Clove Oil,Pudina Satva,Tomar Beej (Zanthoxylum alatum),Sunthi (Ginger)', 'Dabur India Ltd', 25, '100gm', '2022-04-16 08:31:42'),
(306, 'Colgate Strong Teeth Toothpaste with Amino Shakti', 'Calcium Carbonate,Sorbitol,Sodium Lauryl Sulphate,Silica', 'Colgate-Palmolive Company', 25, '200gm', '2022-04-16 08:32:19'),
(307, 'Emoform -R Toothpaste', 'Calcium Carbonate and Potassium Nitrate', 'J L Morison India Ltd', 25, '50gm', '2022-04-16 08:32:41'),
(308, 'Hydent-K Medicated Oral Gel', 'Potassium Nitrate,Sodium Monoflurosulphate,Triclosan', 'Abbott', 25, '100gm', '2022-04-16 08:33:01'),
(309, 'Himalaya Hiora-K Toothpaste', 'Spinach,Potassium Nitrate,Clove', 'Himalaya Drug Company', 25, '50gm', '2022-04-16 08:33:22'),
(310, 'Jiva Ayurfresh Toothpaste', 'Clove,Neem,Vyavidang,Elaichi,Satpodina,Dalchini,Bakul,Gandhpura', 'Jiva Ayurvedic Pharmacy Ltd', 25, '100gm', '2022-04-16 08:34:06'),
(311, 'Pepsodent Expert Protection Gumcare+ Toothpaste', 'Sorbitol,Hydrated Silica,Sodium Lauryl Sulphate,PEG-32,Zinc Citrate', 'Hindustan Unilever Ltd', 25, '140gm', '2022-04-16 08:34:30'),
(312, 'Tansukh Mukh Mantra Toothpaste', 'Neem,Babool,Tomar,Meswak,Laung Oil,Pudina Satva,Yavni Satva,Shudhh Khatika', 'Tansukh Herbals Pvt Ltd', 25, '100gm', '2022-04-16 08:35:11'),
(313, 'Acnepad Wipes', 'Salicylic acid', 'Regaliz India Ltd', 17, '50wipes/1packet', '2022-04-16 08:36:26'),
(314, 'Mee Mee Baby Wet Wipes', 'spun lace non woven fabric, are hypo allergic and free of alcohol', 'Me n Moms Pvt. Ltd.', 17, '36wipes/1packet', '2022-04-16 08:36:46'),
(315, 'Dettol Original Multi-Use Skin & Surface Wipes', 'Propylene Glycol,Benzyl Alcohol,Polysorbate 20,Disodium Lauroamphodiacetate,Citric Acid (Anhydrous),Salicylic Acid,Disodium Phosphate,Benzalkonium Chloride,Parfum, Glycerin,Tetrasodium EDTA,Sorbic Acid,Isopropanol,Hexyl Cinnamal,Citronellol', 'Reckitt Benckiser', 17, '40wipes/1packet', '2022-04-16 08:37:32'),
(316, 'Johnsons Baby Skincare Wipes', '‎Water, Phenoxyethanol, Sodium Benzoate, Glycerin, Carbomer, Coco-Glucoside, Glyceryl Oleate, Lauryl Glucoside, Polyglyceryl-2 Dipolyhydroxystearate, p-Anisic Acid, Citric Acid, Sodium Hydroxide, Glyceryl Polyacrylate,Fragrance', 'Johnson & Johnson Ltd', 17, '20wipes/1packet', '2022-04-16 08:38:04'),
(317, 'LuvLap Baby Wipes', 'Aloe Vera,Chamomile Extract,Vitamin E', 'Universal Corporation ltd', 17, '80wipes/1packet', '2022-04-16 08:38:33'),
(318, '1mg Sanitizing Wipes', 'Didecyldimethylammonium chloride,Alkyldimethylbenzylammonium chloride,Ethylhyxylglycerin,Propylene Glycol,Phenoxyethanol,Inert Ingredients,DM Water q.s', 'Tata 1mg Healthcare Solutions Private Limited', 17, '70wipes', '2022-04-16 08:39:01'),
(319, 'Littles Soft Cleansing Baby Wipes with Lid', 'aloe vera, jojoba oil and vitamin e', 'Piramal Enterprises Ltd', 17, '30wipes', '2022-04-16 08:39:21'),
(320, 'Oculeaf Eyelid Wipes', 'Melaleuca Alternifolia Leaf Oil (Tea Tree Oil),Sodium Hyaluronate,Panthenol,Glycerin,Chamomilla Recutita Flower Extract,Hippophae Rhamnoides Oil (Buckthorn Oil),Hypericum Perforatum Oi', 'Waypham India Pvt Ltd', 17, '24wipes', '2022-04-16 08:39:44'),
(321, 'Evolve Pure Eyelid Wipes', 'Sodium Chloride,Potassium Chloride,Calcium Chloride Dihydrate,Magnesium Chloride,Hexahydrate,Sodium Acetate,Sodium Citrate Dihydrate,Water Purified', 'Medicom International Eyetech Pvt Ltd', 17, '20wipes', '2022-04-16 08:40:09'),
(322, 'Lacto Calamine Oil Control Wipes Super Saver Pack', 'Purified Water,Niacinamide (Vitamin B3),Phenoxyethanol,Propylene Glycol,Glycerin,Disodium Cocoamphodiacetate,Perfume,PEG-40,Hydrogenated Castor Oil,Aloe Barbadanis Leaf extract,Polysorbate 20,Disodium EDTA,Ethylexylglycerin,Triethylenelycol,Azadirach', 'Piramal Enterprises Ltd', 17, '30wipes', '2022-04-16 08:40:39'),
(323, 'Neko Germ Protection Wipes', 'Phenoxyethanol,Sodium Benzoate,PEG-40 Hydrogenated Castor Oil,Benzalkonium Chloride,Decyl Glucoside,Cetylpyridinium Chloride,Aloe Barbadensis (Aloevera) Leaf Extract,Citric Acid,Sodium Hydroxide', 'Piramal Enterprises Ltd', 17, '80wipes', '2022-04-16 08:41:21'),
(324, 'Ascoril LS Syrup', 'Ambroxol (30mg/5ml) + Levosalbutamol (1mg/5ml) + Guaifenesin (50mg/5ml)', 'Glenmark Pharmaceuticals Ltd', 20, '100ml', '2022-04-16 19:19:50'),
(326, 'Soha 0.1% Eye Drop', 'Sodium Hyaluronate (0.1% w/v)...', 'Sun Pharmaceutical Industries Ltd', 6, '5ML', '2022-04-20 13:29:38'),
(328, 'HIFEN 200 DT', 'CEFIXIME DISPERSIBLE TABLETS', 'HETERO HEALTHCARE LTD', 24, '10TAB', '2022-04-24 08:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin'),
(2, 'krunal', 'krunal');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `an_id` int(11) NOT NULL,
  `an_title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `an_attach` blob NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`an_id`, `an_title`, `description`, `an_attach`, `date`) VALUES
(1, 'About Payment', 'Hello,payment via google pay will be available soon.', 0x476f6f676c655061795f4c6f636b75702e6d61785f3130303078313030302e302e706e67, '2022-03-10 13:14:55'),
(2, 'Order Delivery service', ' Available shortly.', 0x686f6d6564656c697665722e6a7067, '2022-03-23 12:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `bank_id` int(11) NOT NULL,
  `md_id` int(11) NOT NULL,
  `account_no` varchar(250) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `bank_branch` varchar(250) NOT NULL,
  `bank_ifsc` varchar(250) NOT NULL,
  `bank_cheque` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_id`, `md_id`, `account_no`, `bank_name`, `bank_branch`, `bank_ifsc`, `bank_cheque`) VALUES
(2, 5, '916010080379415', 'AXIS BANK', 'Majura Gate', 'UTIB0002641', 'chequestr.jpg'),
(7, 6, '916010280379138', 'HDFC BANK LTD', 'Sagrampura', 'HDFC0000388 ', 'chequeguj.jpg'),
(8, 7, '916020280679329', 'ICICI BANK LTD', 'Sagrampura', 'ICIC0006557', 'chequemah.jpg'),
(9, 8, '969020220476587', 'DENA BANK', 'Athwa Gate', 'BKDN0230800', 'chequedena.png'),
(10, 9, '99804042047123', 'IDBI BANK LTD', 'Nanpura', 'IBKL0000554', 'chequekri.png'),
(15, 19, '916020280679329', 'INDUSIND BANK LTD', 'Umarwada', 'INDB0000023', 'chequeatoz.png'),
(16, 20, '6000157621000', 'CANARA BANK', 'Haripura', 'CNRB0001751', 'chequehari.jpg'),
(32, 26, '9177100070296324', 'FEDERAL BANK LTD', 'Begampura', 'FDRL0001343', 'chequejolly.png'),
(35, 29, '916620056263907', 'YES BANK LTD', 'Begampura', 'YESB0000011', 'chequevik.png'),
(36, 30, '916123068163302', 'INDUSIND BANK LTD', 'Rustampura', 'INDB0001709', 'chequechinm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_img` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_img`, `created_at`) VALUES
(1, 'SOLUTION', 'solution.png', '2022-03-08 13:57:49'),
(2, 'ACCESSORIES', 'access.png', '2022-03-08 13:58:21'),
(3, 'BANDAGE', 'bandage.png', '2022-03-08 13:58:37'),
(4, 'CAPSULE', 'capsule.png', '2022-03-08 13:58:56'),
(5, 'CREAM', 'cream.png', '2022-03-08 13:59:15'),
(6, 'DROPS', 'drops.png', '2022-03-08 14:00:03'),
(7, 'LOTION', 'lotion.png', '2022-03-08 14:00:15'),
(8, 'GLOVES', 'gloves.png', '2022-03-08 14:00:46'),
(9, 'DILUTION', 'dilution.png', '2022-03-08 14:01:00'),
(10, 'BALM', 'balm.png', '2022-03-08 14:01:10'),
(11, 'INJECTION', 'injection.png', '2022-03-08 14:01:22'),
(12, 'INHALER', 'inhaler.png', '2022-03-08 14:01:35'),
(13, 'NEBULIZER', 'nebulizers.png', '2022-03-08 14:01:51'),
(14, 'GRANULES', 'granules.png', '2022-03-08 14:02:02'),
(15, 'OIL', 'oil.png', '2022-03-08 14:02:21'),
(16, 'POWDER', 'powder.png', '2022-03-08 14:02:38'),
(17, 'WIPES', 'wipes.png', '2022-03-08 14:02:57'),
(18, 'SANITIZER', 'sanitizer.png', '2022-03-08 14:03:13'),
(19, 'SACHET', 'sachet.png', '2022-03-08 14:03:25'),
(20, 'SYRUP', 'syrup.png', '2022-03-08 14:03:39'),
(21, 'SYRINGE', 'syringe.png', '2022-03-08 14:03:56'),
(22, 'SPRAY', 'spray.png', '2022-03-08 14:04:09'),
(23, 'SOAP', 'soap.png', '2022-03-08 14:04:26'),
(24, 'TABLET', 'tablet.png', '2022-03-08 14:04:40'),
(25, 'TOOTHPASTE', 'toothpaste.png', '2022-03-08 14:04:53'),
(26, 'VAPORIZER', 'vaporizer.png', '2022-03-08 14:05:08'),
(28, 'MOISTURISER', 'Moisturiser .png', '2022-03-22 11:46:02'),
(63, 'PADS', 'pads.png', '2022-04-02 12:01:38'),
(64, 'DIAPERS', 'diapers.png', '2022-04-02 12:02:35'),
(65, 'NEEDLES', 'needle.png', '2022-04-02 12:04:22'),
(66, 'TONIC', 'tonic.png', '2022-04-02 12:05:16'),
(67, 'GLOBULES', 'Globules.png', '2022-04-02 12:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fd_id` int(11) NOT NULL,
  `md_id` int(11) NOT NULL,
  `fd_issue` varchar(250) NOT NULL,
  `fd_description` varchar(250) NOT NULL,
  `fd_attach` blob NOT NULL,
  `fd_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `fd_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fd_id`, `md_id`, `fd_issue`, `fd_description`, `fd_attach`, `fd_date`, `fd_status`) VALUES
(8, 8, 'Page Unresponsive', 'Sell Products Page is not working properly ', 0x72423531782e706e67, '2022-04-17 04:51:48', '✔ Solve'),
(9, 8, 'page is not appearing', 'frequently, buy product page show nothing ', 0x646f776e6c6f61642e706e67, '2022-04-20 14:35:17', '✔ Solve');

-- --------------------------------------------------------

--
-- Table structure for table `final_reg`
--

CREATE TABLE `final_reg` (
  `user_id` int(11) NOT NULL,
  `md_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password1` text NOT NULL,
  `password2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_reg`
--

INSERT INTO `final_reg` (`user_id`, `md_id`, `username`, `password1`, `password2`) VALUES
(1, 5, 'kalpesh', '123', '123'),
(2, 6, 'mukesh', '123', '123'),
(3, 7, 'surendra', '123', '123'),
(4, 8, 'vipul', '123', '123'),
(5, 9, 'jagdish', '123', '123'),
(6, 19, 'chintan', '123', '123'),
(7, 20, 'hari', '123', '123'),
(12, 26, 'paresh', '123', '123'),
(19, 29, 'rignesh', '123', '123'),
(20, 30, 'pankaj', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `medical_details`
--

CREATE TABLE `medical_details` (
  `md_id` int(11) NOT NULL,
  `md_name` varchar(250) NOT NULL,
  `md_address` varchar(250) NOT NULL,
  `md_area` varchar(250) NOT NULL,
  `pr_name1` varchar(250) NOT NULL,
  `pr_number1` varchar(250) NOT NULL,
  `pr_name2` varchar(250) NOT NULL,
  `pr_number2` varchar(250) NOT NULL,
  `pr_telephone` varchar(250) NOT NULL,
  `pr_email` text NOT NULL,
  `drug_no` varchar(250) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_details`
--

INSERT INTO `medical_details` (`md_id`, `md_name`, `md_address`, `md_area`, `pr_name1`, `pr_number1`, `pr_name2`, `pr_number2`, `pr_telephone`, `pr_email`, `drug_no`, `gst_no`, `created_at`) VALUES
(5, 'Sterling Medicines', 'h-30 kiran chambers majura gate surat', 'Majura Gate', 'Kalpesh Bhai', '9876543210', 'Usman Bhai', '9876512340', '02616645756', 'sterling@gmail.com', '20G/SS/2136', '24BNZPM2501F8Z0', '2022-03-12 12:25:23'),
(6, 'Gujarat Chemist Store', 'b-45 jivandeep complex opposite riya residency sagrampura surat ', 'Sagrampura', 'Mukesh', '7878794358', '', '', '02618853971', 'mukeshvasoya@gmail.com', '20G/SS/7568', '24AQDPP8229H8ZV', '2022-03-21 12:08:00'),
(7, 'Maheshwari Medical', 'a-45 opera hub rustampura suart', 'Sagrampura', 'surendrabhai', '8238015789', 'girishbhai', '8621087536', '02616645851', 'surendra34@gmail.com', '20G/SS/2517', '24UEGFD5617I9ZE', '2022-04-02 10:44:16'),
(8, 'Vipul Chemist', 'K-10 tulsi complex athwa gate surat', 'Athwa Gate', 'Vipulbhai', '7598642103', 'Ramesh Bhai', '9638527410', '02616681203', 'vipulkapopara1@gmail.com', '20G/SS/2149', '24AAECC6548C7ZE', '2022-04-02 10:55:28'),
(9, 'Krishna Medical Store', '85-satyam plaza nanpura surat', 'Nanpura', 'jagdish Bhai', '7835864103', 'dilip Bhai', '8866127891', '02616629632', 'jagdish354@gmail.com', '20G/SS/2659', '24BLAPT0864M1ZE', '2022-04-02 11:02:31'),
(19, 'Atoz Chemist', '23-golden square near jolly plaza umarwada surat', 'Umarwada', 'Chintan bhai', '9662887536', 'Suresh Bhai N Patel', '', '', 'chintanpatel23@gmail.com', '20G/SS/2156', '24ANYPA1234U6ZL', '2022-04-06 10:40:13'),
(20, 'Hari Medical', 'harinagar Haripura', 'Haripura', 'hari bhai', '7573997750', 'jignesh bhai', '7418529630', '', 'hari@gmail.com', '20G/SS/8594', '24DUTDL7349L2ZT', '2022-04-11 04:54:51'),
(26, 'Jolly Medical', '35-chitra hub near mirrikh honda Showroom  begampura surat', 'Begampura', 'Paresh Bhai', '7573994490', 'Rasik Bhai', '9157891035', '', 'paresh123@gmail.com', '20G/SS/6583', '24DGLPK3432G8ZY', '2022-04-12 14:53:54'),
(29, 'Vikesh Chemist', '12-green chamber opposite royal square khatodrawadi surat', 'Begampura', 'Rignesh Bhai Nasit', '9537870147', 'Tanay Bhai Shekh', '7598462101', '02613210178', 'vikeshbj43@gmail.com', '20G/SS/2459', '24AUGPB1929G9ZJ', '2022-04-16 12:25:18'),
(30, 'Chinmay Medical', '80-platinum plaza near panvel point opposite armall rustampura surat', 'Rustampura', 'Pankaj Bhai', '7626423005', 'Nikunj Bhai', '9614517650', '02616845709', 'pankaj789@gmail.com', '20G/SS/2148', '24BCAPV8312C9ZJ', '2022-04-16 20:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `md_id` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `stock_id`, `pd_id`, `md_id`, `status`, `ss_id`, `payment_id`, `payment_date`) VALUES
(60, 66, 11, 6, 'Paid', 8, '20220414111212800110168222203640610', '2022-04-12 11:10:26'),
(62, 63, 1, 5, 'Paid', 8, '20220414111212800110168781603633115', '2022-04-12 11:10:26'),
(63, 84, 51, 19, 'Paid', 20, '20220414111212800110168499103608978', '2022-04-12 11:10:26'),
(65, 67, 7, 9, 'Paid', 8, '20220412111212800110168430903601022', '2022-04-12 11:15:55'),
(66, 86, 17, 8, 'Paid', 6, '20220414111212800110168617003622203', '2022-04-14 14:15:21'),
(67, 70, 8, 8, 'Paid', 20, '20220415111212800110168158003626973', '2022-04-15 05:50:19'),
(68, 89, 55, 6, 'Paid', 8, '20220415111212800110168085104677109', '2022-04-15 09:57:36'),
(69, 90, 56, 8, 'Paid', 6, '20220415111212800110168909803596918', '2022-04-15 11:51:30'),
(70, 91, 57, 7, 'Paid', 20, '20220415111212800110168312803633212', '2022-04-15 12:46:45'),
(73, 92, 20, 7, 'Paid', 19, '20220415111212800110168192203647836', '2022-04-15 13:27:23'),
(74, 88, 54, 6, 'Paid', 7, '20220419111212800110168160803638630', '2022-04-15 13:37:22'),
(75, 65, 3, 6, 'Paid', 9, '20220419111212800110168588903619148', '2022-04-16 18:54:34'),
(76, 95, 261, 8, 'Paid', 9, '20220417111212800110168600703584974', '2022-04-17 08:00:01'),
(77, 96, 296, 30, 'Paid', 29, '20220419111212800110168324803650239', '2022-04-19 11:34:17'),
(79, 97, 263, 5, 'Paid', 8, '20220422111212800110168941703639310', '2022-04-20 14:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `req_product`
--

CREATE TABLE `req_product` (
  `req_id` int(11) NOT NULL,
  `md_id` int(11) NOT NULL,
  `req_img` varchar(250) NOT NULL,
  `req_name` varchar(250) NOT NULL,
  `req_drug` varchar(250) NOT NULL,
  `req_company` varchar(250) NOT NULL,
  `req_pack` text NOT NULL,
  `req_category` varchar(250) NOT NULL,
  `req_mrp` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req_product`
--

INSERT INTO `req_product` (`req_id`, `md_id`, `req_img`, `req_name`, `req_drug`, `req_company`, `req_pack`, `req_category`, `req_mrp`, `status`, `created_at`) VALUES
(7, 6, 'index.jpg', 'Rozucor 10', 'Rosuvastatin (10mg)', 'Torrent Pharmaceuticals Ltd', '1*10TAB', 'Tablet', '100', '✔ Add', '2022-03-21 13:03:09'),
(10, 5, 'ds.jpg', 'Mondeslor Tablet', 'Desloratadine (5mg) + Montelukast (10mg)', 'Sun Pharmaceutical Industries Ltd', '1*10TAB', 'Tablet', '195', '✔ Added', '2022-03-23 11:08:33'),
(18, 6, 'flutivate_skin_cream_10gm_0.jpg', 'Flutivate Cream', 'Fluticasone Propionate (0.05% w/w)', 'Glaxo SmithKline Pharmaceuticals Ltd', '10gm', 'Cream', '100', '✔ Add', '2022-04-10 09:50:10'),
(19, 6, 'download.jpg', 'Nadoxin Cream', 'Nadifloxacin (1% w/w)...', 'Wockhardt Ltd', '10gm', 'Cream', '160', '✔ Add', '2022-04-10 09:52:13'),
(28, 8, 'HIFEN-DT-500.png', 'HIFEN 200 DT', 'CEFIXIME DISPERSIBLE TABLETS', 'HETERO HEALTHCARE LTD', '10TAB', 'TABLET', '79', '✔ Add', '2022-04-17 04:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `md_id` int(11) NOT NULL,
  `mrp` varchar(250) NOT NULL,
  `ptr` varchar(250) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `mfg_date` varchar(250) NOT NULL,
  `exp_date` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `stock_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `pd_id`, `md_id`, `mrp`, `ptr`, `batch_no`, `quantity`, `mfg_date`, `exp_date`, `price`, `status`, `stock_date`) VALUES
(63, 1, 5, '100', '80', '7803', '10', '05,2021', '10,2022', '75', 'Paid', '2022-03-25 14:22:36'),
(65, 3, 6, '120', '90', '7807', '20', '06,2021', '08,2022', '85', 'Paid', '2022-03-26 13:06:42'),
(66, 11, 6, '100', '70', 'AC4413', '5', '06,2021', '09,2022', '65', 'Paid', '2022-03-28 10:11:50'),
(67, 7, 9, '110', '80', '4414', '5', '03,2020', '10,2022', '75', 'Paid', '2022-04-02 11:12:14'),
(68, 9, 7, '180', '150', '3456', '20', '06,2020', '09,2022', '140', 'Pending', '2022-04-02 11:15:44'),
(69, 10, 8, '80', '50', '98790', '2', '01,2021', '10,2022', '45', 'Pending', '2022-04-02 11:17:32'),
(70, 8, 8, '100', '70', 'ABC', '10', '05,2020', '06,2022', '65', 'Paid', '2022-04-02 14:02:03'),
(82, 48, 8, '70', '50', 'ABC', '1', '06,2020', '10,2022', '40', 'Pending', '2022-04-10 14:56:01'),
(83, 16, 8, '100', '102', '8758', '5', '03,2020', '10,2022', '90', 'Pending', '2022-04-10 14:57:11'),
(84, 51, 19, '150', '130', 'KDJS4589K', '1', '06,2020', '09,2022', '125', 'Paid', '2022-04-11 17:57:29'),
(86, 17, 8, '100', '90', '1256', '2', '03,2020', '09,2022', '95', 'Paid', '2022-04-14 14:04:34'),
(87, 53, 8, '240', '200', '7804', '6', '04,2020', '09,2022', '195', 'Pending', '2022-04-15 09:30:14'),
(88, 54, 6, '100', '80', '6697', '5', '10,2020', '09,2022', '75', 'Paid', '2022-04-15 09:40:42'),
(89, 55, 6, '110', '90', '4478', '10', '10,2020', '09,2022', '85', 'Paid', '2022-04-15 09:53:41'),
(90, 56, 8, '100', '80', '5541', '10', '03,2019', '09,2022', '75', 'Paid', '2022-04-15 11:50:47'),
(91, 57, 7, '10', '8', '5557', '10', '03,2020', '09,2022', '7', 'Paid', '2022-04-15 12:46:03'),
(92, 20, 7, '60', '50', '4589', '5', '03,2020', '09,2022', '45', 'Paid', '2022-04-15 13:26:13'),
(95, 261, 8, '231', '207.31', 'TYBAQ2048', '1', '02,2020', '10,2022', '200', 'Paid', '2022-04-17 07:59:25'),
(96, 296, 30, '70', '60', '6578', '4', '03,2020', '09,2022', '55', 'Paid', '2022-04-19 11:33:05'),
(97, 263, 5, '50', '45', '8547', '9', '03,2020', '09,2022', '43', 'Paid', '2022-04-20 14:17:12'),
(98, 261, 8, '100', '90', '3256', '6', '04,2020', '09,2022', '85', 'Pending', '2022-04-20 14:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `upload_doc`
--

CREATE TABLE `upload_doc` (
  `doc_id` int(11) NOT NULL,
  `md_id` int(11) NOT NULL,
  `pan_no` varchar(250) NOT NULL,
  `pan_img` varchar(250) NOT NULL,
  `bill_img` varchar(250) NOT NULL,
  `card_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload_doc`
--

INSERT INTO `upload_doc` (`doc_id`, `md_id`, `pan_no`, `pan_img`, `bill_img`, `card_img`) VALUES
(2, 5, 'BNZPM2501F', 'panster.jpg', 'billster.png', 'cardster.JPG'),
(4, 6, 'AQDPP8229H', 'panguj.jpg', 'billguj.png', 'cardguj.JPG'),
(5, 7, 'UEGFD5617I', 'panmahes.jpg', 'billmahes.png', 'cardmahesh.JPG'),
(6, 8, 'AAECC6548C', 'panvipulm.jpg', 'billvipul.png', 'cardvipul.JPG'),
(7, 9, 'BLAPT0864M', 'pankri.jpg', 'billkrishna.png', 'cardkrishna.JPG'),
(8, 19, 'ANYPA1234U', 'panatoz.jpg', 'billatoz.png', 'cardatoz.JPG'),
(9, 20, 'DUTDL7349L', 'panvik.jpg', 'billvike.png', 'cardvik.JPG'),
(11, 26, 'DGLPK3432G', 'panjolly.jpg', 'billjolly.png', 'cardjolly.JPG'),
(14, 29, 'AUGPB1929G', 'panvik2.jpg', 'billvike2.png', 'cardvik2.JPG'),
(15, 30, 'BCAPV8312C', 'panchinm.jpg', 'billchinm.png', 'cardchinm.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`an_id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `md_id` (`md_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fd_id`),
  ADD KEY `md_id` (`md_id`);

--
-- Indexes for table `final_reg`
--
ALTER TABLE `final_reg`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `md_id` (`md_id`);

--
-- Indexes for table `medical_details`
--
ALTER TABLE `medical_details`
  ADD PRIMARY KEY (`md_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `req_product`
--
ALTER TABLE `req_product`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `md_id` (`md_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `pd_id` (`pd_id`),
  ADD KEY `md_id` (`md_id`);

--
-- Indexes for table `upload_doc`
--
ALTER TABLE `upload_doc`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `md_id` (`md_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `an_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `final_reg`
--
ALTER TABLE `final_reg`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medical_details`
--
ALTER TABLE `medical_details`
  MODIFY `md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `req_product`
--
ALTER TABLE `req_product`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `upload_doc`
--
ALTER TABLE `upload_doc`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_product`
--
ALTER TABLE `add_product`
  ADD CONSTRAINT `add_product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_ibfk_1` FOREIGN KEY (`md_id`) REFERENCES `medical_details` (`md_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`md_id`) REFERENCES `medical_details` (`md_id`);

--
-- Constraints for table `final_reg`
--
ALTER TABLE `final_reg`
  ADD CONSTRAINT `final_reg_ibfk_1` FOREIGN KEY (`md_id`) REFERENCES `medical_details` (`md_id`);

--
-- Constraints for table `req_product`
--
ALTER TABLE `req_product`
  ADD CONSTRAINT `req_product_ibfk_1` FOREIGN KEY (`md_id`) REFERENCES `medical_details` (`md_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`md_id`) REFERENCES `medical_details` (`md_id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`pd_id`) REFERENCES `add_product` (`pd_id`);

--
-- Constraints for table `upload_doc`
--
ALTER TABLE `upload_doc`
  ADD CONSTRAINT `upload_doc_ibfk_1` FOREIGN KEY (`md_id`) REFERENCES `medical_details` (`md_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
