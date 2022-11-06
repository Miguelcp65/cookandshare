-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 10:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookandshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL DEFAULT 'sem_imagem.jpg',
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`, `imagem`, `criado`, `editado`) VALUES
(1, 'Refeições', '1.jpg', '2020-05-05 13:10:14', '2020-06-14 17:21:45'),
(2, 'Sobremesas', '2.jpg', '2020-05-05 13:10:14', '2020-06-14 17:22:05'),
(3, 'Saladas', '3.jpg', '2020-05-05 13:10:14', '2020-06-14 17:22:02'),
(4, 'Sopas', '4.jpg', '2020-05-05 13:10:14', '2020-06-14 17:22:08'),
(5, 'Lanches', '5.jpg', '2020-05-05 13:10:14', '2020-06-14 17:21:59'),
(6, 'Bolos', '6.jpg', '2020-05-05 13:10:14', '2020-06-18 11:00:36'),
(7, 'Brunch', '7.jpg', '2020-05-05 13:10:14', '2020-06-14 17:21:56'),
(8, 'Vegetariano', '8.jpg', '2020-05-20 18:26:15', '2020-06-14 17:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `classificacoes`
--

CREATE TABLE `classificacoes` (
  `id_classificacao` int(6) NOT NULL,
  `id_receita` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `classificacao` float NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classificacoes`
--

INSERT INTO `classificacoes` (`id_classificacao`, `id_receita`, `id_user`, `classificacao`, `criado`, `editado`) VALUES
(28, 45, 207, 1.5, '2020-07-03 05:49:25', '2020-07-06 18:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favoritos` int(6) NOT NULL,
  `id_receita` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favoritos`
--

INSERT INTO `favoritos` (`id_favoritos`, `id_receita`, `id_user`, `criado`, `editado`) VALUES
(1, 31, 207, '2020-05-05 13:24:41', '2020-07-06 18:01:01'),
(2, 40, 207, '2020-05-05 13:24:41', '2020-07-06 18:01:10'),
(3, 42, 207, '2020-05-05 13:24:41', '2020-07-06 18:01:15'),
(13, 18, 208, '2020-07-06 17:20:53', '2020-07-06 18:01:21'),
(14, 33, 208, '2020-07-06 17:24:37', '2020-07-06 18:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id_ingrediente` int(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL DEFAULT 'sem_imagem.jpg',
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredientes`
--

INSERT INTO `ingredientes` (`id_ingrediente`, `nome`, `imagem`, `criado`, `editado`) VALUES
(2, 'Abacaxi', '2.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:52'),
(3, 'Abóbora', '3.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:59'),
(4, 'Água', '4.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:02'),
(5, 'Aipo', '5.jpg', '2020-06-13 07:10:20', '2020-06-30 01:04:08'),
(6, 'Alperce', '6.jpg', '2020-06-13 07:10:20', '2020-06-30 01:04:40'),
(7, 'Ameixa', '7.jpg', '2020-06-13 07:10:20', '2020-06-30 01:05:15'),
(8, 'Amêndoa', '8.jpg', '2020-06-13 07:10:20', '2020-06-30 01:05:53'),
(9, 'Amora', '9.jpg', '2020-06-13 07:10:20', '2020-06-30 01:06:21'),
(10, 'Anona', '10.jpg', '2020-06-13 07:10:20', '2020-06-30 01:06:52'),
(11, 'Aveia', '11.jpg', '2020-06-13 07:10:20', '2020-06-30 01:09:19'),
(12, 'Avelã', '12.jpg', '2020-06-13 07:10:20', '2020-06-30 01:10:03'),
(13, 'Banana', '13.jpg', '2020-06-13 07:10:20', '2020-07-05 09:51:52'),
(14, 'Baunilha', '14.jpg', '2020-06-13 07:10:20', '2020-07-05 09:51:58'),
(15, 'Beterraba', '15.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:03'),
(16, 'Brócolos', '16.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:08'),
(17, 'Cacau', '17.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:15'),
(18, 'Caju', '18.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:18'),
(19, 'Canela', '19.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:21'),
(20, 'Castanha do Brasil', '20.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:26'),
(21, 'Cereja', '21.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:29'),
(22, 'Cherovia', '22.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:32'),
(23, 'Coco', '23.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:35'),
(24, 'Couve-roxa', '24.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:38'),
(25, 'Couve-flor', '25.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:44'),
(26, 'Curcuma', '26.jpg', '2020-06-13 07:10:20', '2020-07-05 09:52:47'),
(27, 'Dióspiro', '27.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:24'),
(28, 'Espargos', '28.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:19'),
(29, 'Espinafres', '29.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:17'),
(30, 'Figos', '30.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:14'),
(31, 'Framboesa', '31.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:11'),
(32, 'Funcho', '32.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:09'),
(33, 'Gengibre', '33.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:06'),
(34, 'Kale', '34.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:04'),
(35, 'Kiwi', '35.jpg', '2020-06-13 07:10:20', '2020-07-05 09:54:01'),
(36, 'Laranja', '36.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:58'),
(37, 'Limão', '37.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:55'),
(38, 'Lucuma', '38.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:52'),
(39, 'Maçã', '39.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:49'),
(40, 'Malagueta', '40.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:47'),
(41, 'Mamão', '41.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:43'),
(42, 'Manga', '42.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:37'),
(43, 'Maracujá', '43.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:35'),
(44, 'Melancia', '44.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:31'),
(45, 'Melão', '45.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:29'),
(46, 'Mirtilos', '46.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:26'),
(47, 'Morango', '47.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:23'),
(48, 'Nabo', '48.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:20'),
(49, 'Noz', '49.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:18'),
(50, 'Pepino', '50.jpg', '2020-06-13 07:10:20', '2020-07-05 09:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `receitas`
--

CREATE TABLE `receitas` (
  `id_receita` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(22) NOT NULL DEFAULT 'sem_imagem.jpg',
  `descricao` longtext NOT NULL,
  `duracao` int(10) NOT NULL,
  `ingredientes_desc` varchar(255) NOT NULL,
  `id_ingredientes` varchar(255) NOT NULL,
  `passos` varchar(255) NOT NULL,
  `id_categoria` int(6) NOT NULL,
  `npessoas` int(10) NOT NULL,
  `classificacao` int(11) NOT NULL DEFAULT 3,
  `total_classificacao` float NOT NULL,
  `nclassificacoes` int(11) NOT NULL,
  `dificuldade` enum('Fácil','Média','Difícil','') NOT NULL,
  `privacidade` enum('Público','Privado') NOT NULL DEFAULT 'Público',
  `estado` enum('Pendente','Aprovado','','') NOT NULL DEFAULT 'Pendente',
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receitas`
--

INSERT INTO `receitas` (`id_receita`, `id_user`, `nome`, `imagem`, `descricao`, `duracao`, `ingredientes_desc`, `id_ingredientes`, `passos`, `id_categoria`, `npessoas`, `classificacao`, `total_classificacao`, `nclassificacoes`, `dificuldade`, `privacidade`, `estado`, `criado`, `editado`) VALUES
(6, 207, 'Paris-Brest', '6.jpg', 'Impressione os seus convidados com um divinal Paris-Brest, uma receita francesa feita com a famosa massa de choux. Vai ser difícil resistir!', 90, '25 g manteiga,\r\n200 ml água,\r\n1 c. de sopa açúcar,\r\n150 g farinha,\r\n4 ovos,\r\n50 g amêndoa laminada\r\nPARA O PRALINÉ\r\n65 g açúcar,\r\n100 g amêndoa com pele\r\nPARA O CREME,\r\n230 g manteiga', '5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 6, 8, 4, 0, 50, 'Média', 'Público', 'Aprovado', '2020-05-24 20:56:37', '2020-07-06 20:26:08'),
(7, 207, 'Bolas energéticas', '7.jpg', 'Bolas energéticas prontas em apenas 30 minutos, ideias para um snack depois do treino, ou para as crianças.', 30, '100 g (1 unidade) chocolate preto,\r\n200 g tâmaras sem caroço,\r\n2 c. sopa cacau em pó,\r\n1 c. sobremesa bebida de coco, \r\n100 g flocos de aveia', '12,7,40,32,31', 'aquecer as batatas, ligar o forno, cortar os tomates', 2, 14, 3, 3.5, 33, 'Fácil', 'Público', 'Aprovado', '2020-05-24 21:01:43', '2020-07-06 20:26:03'),
(8, 207, 'Soufflé de pera Rocha\r\n', '8.jpg', 'Se nunca experimentou fazer um soufflé, atreva-se agora. O soufflé de pera Rocha com moscatel e queijo de Azeitão é rápido, fácil e irresitível.', 35, '300 g pera Rocha,\r\n100 ml Moscatel,\r\n600 ml água,\r\n100 g açúcar,\r\n100 g laranja,\r\n50 g + 20 g manteiga,\r\n400 ml leite meio-gordo,\r\n120 g amido de milho,\r\n4 ovos,\r\n100 g queijo de Azeitão ', '12,7,40,32,31', 'aquecer as batatas, ligar o forno, cortar os tomates', 2, 4, 4, 0, 26, 'Fácil', 'Público', 'Aprovado', '2020-05-24 21:05:53', '2020-07-06 20:26:10'),
(10, 207, 'Sopa dourada com amêndoa', '10.jpg', 'A sopa dourada com amêndoa é uma receita conventual, difícil de resistir. O pão enriquecido com fibra dá-lhe um sabor ainda mais especial. Delicie-se!', 30, '125 g manteiga,\r\n210 g (3 unid.) pão enriquecido em fibra,\r\n250 g açúcar,\r\n150 ml água,\r\n1 limão (casca),\r\n200 g amêndoa laminada,\r\n2 ovos,\r\n8 gemas ', '12,7,40,32,31', 'aquecer as batatas, ligar o forno, cortar os tomates', 2, 3, 3, 3.4, 62, 'Média', 'Público', 'Aprovado', '2020-05-25 02:45:52', '2020-07-06 20:26:12'),
(11, 207, 'Carpaccio de abacaxi com molho aromático', '11.jpg', 'Este carpaccio de abacaxi é uma sobremesa fresca e natural, um contraste perfeito do sabor da fruta com o molho de especiarias aromático.', 20, '700 g abacaxi,\r\n75 g framboesas,\r\n75 g mirtilos,\r\n1 lima (raspa e sumo),\r\n1 c. de sopa pimenta-rosa em grão,\r\n1 c. de sopa mel,\r\n1 anis-estrelado', '5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 2, 5, 3, 4.5, 51, 'Fácil', 'Público', 'Aprovado', '2020-05-25 02:53:26', '2020-07-06 20:26:14'),
(12, 207, 'Mini-folares com ovo de codorniz', '12.jpg', 'Divirta-se a cozinhar estes mini-folares com ovo de codorniz, uma receita típica da época, ideal para partilhar com a família. Experimente!', 20, '12 g fermento de padeiro,\r\n4 c. de sopa leite meio-gordo,\r\n100 g manteiga,\r\n600g + suf. para polvilhar farinha,\r\n1 c. de café sal,\r\n1 c. de chá canela em pó,\r\n1 c. de café erva-doce em pó,\r\n120 g açúcar', '5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 2, 3, 3, 0, 41, 'Média', 'Público', 'Aprovado', '2020-05-25 04:54:58', '2020-07-06 20:26:16'),
(13, 207, 'Bolachas de amêndoa e manteiga', '13.jpg', 'Pepare estas bolachas de amêndoa e manteiga com a ajuda dos mais novos. Deixe-os estender a massa ou brincar com as formas. Finas e saborosas!', 15, '100 g amêndoa laminada ou palitada,\r\n250 g farinha + suficiente para polvilhar,\r\n100 g açúcar mascavado,\r\n1 c. de sobremesa canela em pó,\r\n125 g manteiga,\r\n1 gema,\r\n1 laranja (raspa e sumo)', '5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 2, 4, 3, 0, 45, 'Fácil', 'Público', 'Aprovado', '2020-05-25 05:08:08', '2020-07-06 20:26:20'),
(14, 207, 'Sushi de banana', '14.jpg', 'A diversão dos mais novos é garantida com este sushi de banana! Uma sobremesa rápida e vegetariana, para comer sushi doce e colorido.', 10, '3 bananas,\r\n1 limão (sumo),\r\n1 chocolate preto 70% de cacau,\r\n3 morangos desidratados,\r\n1 c. de sopa coco ralado,\r\n1 c. de sopa manteiga de amendoim,\r\n2 c. de sopa granola', '5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 2, 5, 3, 4.7, 38, 'Fácil', 'Público', 'Aprovado', '2020-05-25 05:13:48', '2020-07-06 20:26:18'),
(15, 207, 'Waffles de chocolate', '15.jpg', 'Pequeno-almoço, sobremesa ou lanche? O difícil vai ser decidir. Estes waffles de chocolate com chocolate derretido são irresistíveis em qualquer ocasião. Delicie-se!', 20, '100 g chocolate de leite com amêndoas sem adição de açúcares,\r\n80 g manteiga,\r\n250 g farinha,\r\n2 c. de sopa cacau em pó,\r\n3 ovos,\r\n400 ml bebida à base de soja', '4,6,44,32,11,12,13', 'comer, cozer', 2, 4, 3, 4.4, 20, 'Média', 'Público', 'Aprovado', '2020-05-25 05:18:26', '2020-07-06 20:21:12'),
(16, 207, 'Salada com cogumelos e queijo com trufa', '16.jpg', 'Delicie-se com esta simples salada com cogumelos e queijo com trufa, vegetariana e muito fácil de preparar. Só precisa de 15 minutos e está pronta!', 10, '100 g (1 emb.) rúcula,\r\n6 cogumelos Marron,\r\n75 g queijo de ovelha com trufa negra,\r\n1 c. de chá flor de sal,\r\n2 c. de sopa azeite,\r\n1 c. de sopa vinagre balsâmico', '4,5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 8, 3, 3, 4.5, 17, 'Fácil', 'Público', 'Aprovado', '2020-05-25 05:24:34', '2020-07-06 20:26:22'),
(17, 207, 'Salada de batata com feijão-verde', '17.jpg', 'Vegetariana e com baixo teor de sal, a salada de batata com feijão-verde e maionese de tomilho, serve-se bem fresca e salpicada de pimenta e tomilho fresco. Deliciosa!', 20, '300 g feijão-verde,\r\n500 g batata primor,\r\n6 ovos de codorniz,\r\n3 c. de sopa maionese com baixo teor de sal', '4,5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 8, 2, 3, 4, 49, 'Fácil', 'Público', 'Aprovado', '2020-05-25 05:27:02', '2020-07-06 20:26:25'),
(18, 207, 'Crepes de ovo mexido', '18.jpg', 'Entretenha os mais novos e peça-lhes ajuda para preparar estes crepes de ovo mexido. Divertidos e nutritivos, combinam com um simples arroz branco.', 5, '200 g arroz agulha,\r\n3 ovos,\r\n1 c. de sopa cebolinho fresco,\r\n2 c. de café sal,\r\n2 c. de sopa azeite,\r\n1 dente de alho,\r\n200 g courgette spaghetti', '4,5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 8, 5, 3, 2, 55, 'Média', 'Público', 'Aprovado', '2020-05-25 05:31:08', '2020-07-06 20:26:27'),
(19, 207, 'Salada de vegetais assados', '19.jpg', 'Esta salada de vegetais assados é tão deliciosa como reconfortante. Morna, aromática e saborosa. Sirva como prato principal ou acompanhamento.', 10, '300 g abóbora,\r\n300 g cenoura,\r\n300 g batata-doce,\r\n250 g beringela,\r\n300 g courgette,\r\n120 g cebola', '4,5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 8, 5, 3, 3.4, 18, 'Média', 'Público', 'Pendente', '2020-05-25 06:11:21', '2020-07-06 20:26:29'),
(20, 207, 'Panquecas japonesas\r\n', '20.jpg', 'As panquecas japonesas são muito fofas e altas. Perfeitas para adicionar frutos vermelhos, mel e natas batidas. Sirva num brunch, pequeno-almoço ou lanche, ninguém vai resistir!', 15, '200 g farinha,\r\n3 c. de sopa açúcar em pó,\r\n2 c. de sopa fermento,\r\n¼ c. de chá bicarbonato de sódio,\r\n1 c. de café sal', '4,5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 8, 3, 3, 0, 52, 'Média', 'Público', 'Aprovado', '2020-05-25 06:13:57', '2020-07-06 20:26:31'),
(21, 207, 'Batido tropical\r\n', '21.jpg', 'Ao pequeno-almoço ou ao lanche, este batido tropical é nutritivo e saciante. E surpreendentemente fácil de fazer! Decore com folhas frescas de hortelã.', 10, '450 g preparado para smoothie ananás, papaia e manga congelado\r\n400 ml leite meio-gordo,\r\n1 c. de sobremesa farinha de linhaça', '4,5,6,7,8,9,10,11,12', 'comer', 8, 3, 3, 4.5, 43, 'Fácil', 'Público', 'Aprovado', '2020-05-25 06:17:00', '2020-07-06 20:23:24'),
(22, 207, 'Panquecas de beterraba', '22.jpg', 'As panquecas de beterraba são perfeitas para um brunch de fim-de-semana! Cheias de cor, textura e sabor, são uma alternativa deliciosa e nutritiva.', 30, '1 beterraba ralada,\r\n1 cenoura ralada,\r\n1 chalota,\r\n1 dente de alho,\r\n2 ovos,\r\n250 ml leite meio-gordo,\r\n200 g farinha de trigo sarraceno,\r\n1 c. de chá sal', '4,5,6,7,8,9,10,11,12', 'aquecer as batatas, ligar o forno, cortar os tomates', 7, 2, 3, 0, 27, 'Fácil', 'Público', 'Aprovado', '2020-05-25 06:18:26', '2020-07-06 20:26:34'),
(23, 207, 'Febras com molho de café', '23.jpg', 'As febras com molho de café são um prato indispensável na mesa dos portugueses. Simples e apetitoso, impossível resistir. Sirva com arroz selvagem e salada.', 30, '500 g febras de porco,\r\n2 dentes de alho,\r\n1 c. de chá sal,\r\nqb mix de pimentas de moinho,\r\n2 c. de sopa manteiga,\r\n200 ml (1 emb.) natas', '20,12,21,22,23,25', 'comer', 1, 3, 3, 1.4, 41, 'Fácil', 'Público', 'Aprovado', '2020-05-25 06:23:20', '2020-07-06 20:23:52'),
(24, 207, 'Bife Angus com molho de escabeche', '24.jpg', 'Em apenas 30 minutos, prepare este bife Angus com molho de escabeche, acompanhado com courgette grelhada e cuscuz aromatizado com laranja. Delicioso!', 20, '400 g bife da vazia de novilho Angus,\r\n1 c. de chá sal,\r\nqb pimenta-preta de moinho,\r\n600 g (3 unid.) courgette,\r\n200 g cuscuz,\r\n1 c. de sobremesa tomilho seco,\r\n1 c. de café alho em pó,\r\n150 g (1 unid.) laranja (raspa e sumo)', '20,12,21,22,23,25', 'comer', 1, 4, 4, 0.6, 33, 'Média', 'Público', 'Aprovado', '2020-05-25 06:28:15', '2020-07-06 20:23:50'),
(25, 207, 'Caril de frango com abóbora e grão', '25.jpg', 'O caril de frango com abóbora e grão é uma versão diferente do caril tradicional, mas sem perder o encanto dos aromas e paladares. Bom apetite!', 15, '800 g frango do campo,\r\n150 g alho-francês,\r\n300 g cenoura,\r\n1 talo de aipo (com rama),\r\n½ limão (sumo e casca),\r\n1 c. de sopa sal,\r\n150 g cebola', '20,12,21,22,23,25', 'cozer', 1, 3, 3, 3.2, 43, 'Média', 'Público', 'Aprovado', '2020-05-25 06:29:48', '2020-07-06 20:23:49'),
(26, 207, 'Carré de borrego com legumes', '26.jpg', 'A carne de borrego é tenra e suculenta. Prepare o carré de borrego com legumes no forno, cozinhe com as ervas aromáticas e sirva com os sucos da assadura.', 20, '700 g vão de costeletas de borrego,\r\n1 (50 g) cebola,\r\n2 dentes de alho,\r\n1 (200 g) batata,\r\n1 c. sopa azeite,\r\n1 (150 g) cenoura', '20,12,21,22,23,25', 'cozer', 1, 5, 3, 1.1, 35, 'Média', 'Público', 'Aprovado', '2020-05-25 06:31:07', '2020-07-06 20:23:48'),
(27, 207, 'Hambúrguer de Angus com Brie', '27.jpg', 'Suculento e saboroso, o hambúrguer de Angus com Brie, rúcula e cebola-roxa é de comer e chorar por mais. Uma refeição prática, ideal para qualquer dia da semana.', 10, '½ c. de sopa azeite,\r\n300 g (2 unid.) hambúrguer,\r\n1 c. de sopa manteiga,\r\n180 g (2 unid.) cebola-roxa,\r\nqb pimenta-preta', '20,12,21,22,23,25', 'comer', 1, 5, 3, 2, 16, 'Média', 'Público', 'Aprovado', '2020-05-25 06:32:23', '2020-07-06 20:23:47'),
(28, 207, 'Bolinhos de sardinha', '28.jpg', 'Com sabores tipicamente portugueses, estes bolinhos de sardinha são uma perdição. Acompanhe com uma salada e gomos de lima, e bom proveito!', 25, '300 g batatas,\r\n1 malagueta vermelha,\r\n250 g (1 unid.) alho-francês,\r\n1 ovo,\r\n240 g (2 latas) sardinhas em azeite,\r\n1 c. de chá sal', '20,12,21,22,23,25', 'comer', 1, 1, 4, 0, 40, 'Fácil', 'Público', 'Aprovado', '2020-05-25 06:33:55', '2020-07-06 20:23:46'),
(29, 207, 'Tibornas com salada de polvo', '29.jpg', 'As tibornas com salada de polvo, feitas com o nosso pão com azeitonas e azeite, são um petisco que vai querer repetir vezes sem conta. Experimente!', 25, '165 g (3 unid.) pão com azeitonas e azeite,\r\n1 dente de alho,\r\n2 ½ c. de sopa azeite,\r\n200 g polvo cozido congelado,\r\n40 g chalota,\r\n3 minipimentos doces,\r\n30 g tomate seco', '20,12,21,22,23,25', 'comer', 1, 4, 3, 0, 41, 'Fácil', 'Público', 'Aprovado', '2020-05-25 06:35:16', '2020-07-06 20:23:44'),
(30, 207, 'Dourada com cuscuz', '30.jpg', 'Em apenas 30 minutos, prepare esta maravilhosa dourada com cuscuz, uma refeição preparada com douradas da Costa da Madeira. Simples e bom!', 15, '600 g (2 unid.) dourada Costa da Madeira,\r\n2 c. de chá sal,\r\nqb pimenta de moinho,\r\nqb salsa fresca,\r\nqb hortelã fresca (folhas),\r\n3 . de sopa azeite', '20,12,21,22,23,25', 'comer', 1, 3, 3, 0, 16, 'Fácil', 'Público', 'Aprovado', '2020-05-25 06:37:06', '2020-07-06 20:23:43'),
(31, 207, 'Filete de robalo com puré de grão', '31.jpg', 'Só precisa de 30 minutos para preparar este delicioso filete de robalo no forno com puré de grão. O molho pesto Pingo Doce dá-lhe um sabor especial!', 20, '4 tomate com rama,\r\n3 c. de sopa azeite,\r\n3 dentes de alho,\r\n1 c. de chá sal,\r\n4 filete de robalo fresco,\r\nqb pimenta de moinho', '20,12,21,22,23,25', 'comer', 1, 3, 4, 0, 46, 'Média', 'Público', 'Aprovado', '2020-05-25 06:38:56', '2020-07-06 20:23:42'),
(32, 207, 'Sopa de cação', '32.jpg', 'De origem algarvia, a sopa de cação é também muito apreciada no Alentejo. Sabores inconfundíveis, simples, e agradavelmente reconfortantes.', 10, '4 postas altas de cação,\r\n2 c. de chá sal,\r\n200 ml vinagre de vinho branco,\r\n1 folha de louro,\r\n3 c. de sopa azeite,\r\n4 dentes de alho', '', 'cozer', 1, 5, 4, 0, 24, 'Fácil', 'Público', 'Aprovado', '2020-05-25 06:40:38', '2020-07-06 17:58:06'),
(33, 207, 'Salada morna de arroz selvagem com frango', '33.jpg', 'Esta é uma salada de texturas variadas e cores intensas, que despertam o gosto por sabores saudáveis. Uma refeição que satisfaz a vista e o estômago, uma verdadeira delícia!', 20, '3 peitos frango,\r\n1 folha louro,\r\n1 alho-fracês,\r\nqb pimenta preta em grão,\r\n2 c. chá sal', '', 'comer', 3, 2, 4, 0, 11, 'Média', 'Público', 'Aprovado', '2020-05-25 06:58:48', '2020-07-06 17:58:06'),
(34, 207, 'Salada de cenoura à algarvia', '34.jpg', 'Uma especialidade algarvia para degustar com a certeza de todo o sabor e ingredientes saudáveis.', 12, '600 g cenouras (finas e tenras),\r\n2 dentes de alho,\r\n2 c. sopa salsa picada,\r\n3 c. sopa azeite', '', 'comer', 3, 4, 4, 0, 23, 'Fácil', 'Público', 'Aprovado', '2020-05-25 07:00:44', '2020-07-06 17:58:06'),
(35, 207, 'Salada de frango com batata-doce', '35.jpg', 'As ervas provençais ganham destaque no tempero desta salada de frango com batata-doce e queijo de cabra. Uma refeição fácil e ligeira que pode preparar e comer com gosto.', 30, '4 batatas-doces,\r\n2 c. sopa mel,\r\n1 c. chá sal,\r\n2 alfaces pequenas', '', 'cozer', 3, 3, 3, 0, 43, 'Média', 'Público', 'Aprovado', '2020-05-25 07:01:49', '2020-07-06 17:58:06'),
(36, 207, 'Salada de fusilli com pêssegos grelhados', '36.jpg', 'Leve, fresca e muito fácil de preparar, esta salada junta o sabor inconfundível do queijo feta e a doçura dos pêssegos grelhados, à massa fusilli. Ninguém vai resistir!', 20, '250 g fusilli integral,\r\n1 c. de sopa sal,\r\n2 pêssegos,\r\n1 c. de sobremesa azeite', '', 'cozer', 3, 2, 3, 3.4, 24, 'Média', 'Público', 'Aprovado', '2020-05-25 07:03:18', '2020-07-06 17:58:06'),
(37, 207, 'Salada morna de feijão-frade com pimento e rúcula', '37.jpg', 'Há dias em que não há muito tempo para dedicar à cozinha. Siga esta receita e saiba como preparar uma refeição deliciosa em pouco tempo.', 10, '1 lata feijão-frade em conserva,\r\n1 pimento vermelho,\r\n1 cebola roxa,\r\n1 lata rebentos feijão mungo', '', 'cozer', 3, 1, 0, 4.4, 36, 'Fácil', 'Público', 'Aprovado', '2020-05-25 07:05:01', '2020-07-06 17:58:06'),
(38, 207, 'Pão de Tapioca – Pão sem Trigo', '38.jpg', 'Não existe nada melhor que um café da tarde com pão fresco quentinho né, então que tal inovar na receita de pão e fazer um Pão de Tapioca que tem textura de pão de queijo, é um pão sem farinha de trigo o que transforma ele em pão sem glúten e é super fácil de fazer! E ai bora? Então se joga para nessa maravilha e ter o melhor cafézinho da tarde!', 10, '300g de Goma de tapioca,\r\n250ml de Leite,\r\n2 Colheres (sopa) de azeite,\r\n1 Ovo,\r\n1 Colher (sopa) de Queijo Parmesão,\r\n¼ Colher (chá) de Sal', '', 'cozer', 5, 2, 3, 4.4, 16, 'Fácil', 'Público', 'Pendente', '2020-05-25 07:08:32', '2020-07-06 17:58:06'),
(39, 207, 'Lanche de Frigideira', '39.jpg', 'Acabou o pão? Mas queria um lanchinho né? Então calma que hoje vou te mostrar como fazer um lanche super rápido na frigideira usando poucos ingredientes e o melhor: Você pode por o recheio que quiser e gostar, aqui foi de frango desfiado, com requeijão, milho e queijo!!! Então é só se jogar que essa belezinha aqui fica fofinha e não precisa de forno!', 10, '1 Ovo,\r\n120ml de Leite,\r\n1 Colher (sopa) de Manteiga,\r\n1 Xícara (chá) de Farinha de Trigo,\r\n1 Colher (chá) de Fermento', '', 'cozer', 5, 3, 3, 0, 45, 'Média', 'Público', 'Aprovado', '2020-05-25 07:11:31', '2020-07-06 17:58:06'),
(40, 207, 'Pão de Forma sem sova', '40.jpg', 'Amamos um pãozinho né? pãozinho caseiro é melhor ainda, mas eu sei que tem muitas pessoas que não gostam muito de fazer pão por não acertar a sova e o crescimento, então vamos com essa receita de Pão de Forma mais fácil do mundo!!! Pão de massa mole que não precisa sovar e fica bem fofinho!', 30, '250ml de Leite,\r\n2 Ovos,\r\n3 Colheres (sopa) de Azeite,\r\n1 Colher (sopa) de Açúcar (qualquer tipo),\r\n½ Colher (chá) de Sal', '5,6,7,8,9,10,11,12', 'cozer,comer', 5, 3, 2, 143, 65, 'Média', 'Público', 'Aprovado', '2020-05-25 07:13:38', '2020-07-06 17:58:06'),
(41, 207, 'Creme de abóbora com açafrão e gengibre', '41.jpg', 'Este creme de abóbora poder ser uma entrada mais sofisticada de um jantar especial. O sabor adicional do açafrão e do gengibre são irresistíveis!', 20, '1 cebola,\r\n4 dentes de alho,\r\n1 courgette,\r\n1 batata,\r\nqb açafrão,\r\nqb gengibre fresco,\r\n1 c. sopa sal', '', 'cozer', 4, 4, 3, 9.6, 25, 'Média', 'Público', 'Aprovado', '2020-07-06 07:23:59', '2020-07-06 17:58:06'),
(42, 207, 'Creme de abóbora com manjericão', '42.jpg', 'Este creme de abóbora com manjericão é ideal para servir como entrada de um jantar especial, entre amigos ou em família. Se for prato único, acrescente tostinhas gratinadas com queijo ou cubinhos de queijo de cabra.', 30, '1 c. de sopa sal,\r\n0,2 dl azeite,\r\n4 folhas de manjericão fresco,\r\n950 g abóbora', '', 'cozer', 4, 3, 4, 0, 24, 'Média', 'Público', 'Aprovado', '2020-05-25 07:18:13', '2020-07-06 17:58:06'),
(43, 207, 'Creme de aves com caril', '43.jpg', 'O caril, com o seu sabor único, dá aos pratos um toque oriental. Para este creme de aves com caril escolhemos o o frango como ingrediente principal. Experimente, é a entrada ideal para uma refeição especial.', 15, '40 g arroz carolino,\r\n150 g perna de frango do campo,\r\n2 dentes de alho,\r\n1 c. de sopa sal', '', 'cozer', 4, 1, 3, 0, 43, 'Fácil', 'Público', 'Aprovado', '2020-07-06 07:23:59', '2020-07-06 17:58:06'),
(44, 207, 'Creme de beterraba e cenoura', '44.jpg', 'Este creme de beterraba e cenoura é uma excelente entrada para qualquer dia do ano e não precisa de esperar para ter convidados em casa para experimentar esta receita.', 5, '5 (500 g) beterraba,\r\n2 (300 g) cenouras,\r\n2 dentes de alho,\r\n2 c. de sopa azeite', '', 'cozer', 4, 2, 3, 4.6, 25, 'Fácil', 'Público', 'Aprovado', '2020-07-06 07:23:59', '2020-07-06 17:58:06'),
(45, 207, 'Creme de cogumelos', '45.jpg', 'Se gosta de cogumelos e de pinhões, então este creme de cogumelos é a sua entrada de eleição. Uma receita fácil e que pode ser um aconchego para os dias mais frios.', 10, '100 g cebola,\r\n1 c. de sopa azeite,\r\n2 dentes de alho,\r\n1 c. de sopa sal grosso', '', 'comer', 4, 2, 3, 2, 43, 'Fácil', 'Público', 'Aprovado', '2020-07-06 07:23:59', '2020-07-06 17:58:06'),
(46, 207, 'Creme de courgette com maçã', '46.jpg', 'O creme de courgette com maçã ganha ainda mais suavidade pela conjugação dos legumes com a maçã e o caril dá-lhe um toque diferente. Uma entrada simples para um almoço ou jantar.', 25, '150 g cebola,\r\n250 g alho-francês,\r\n4 c. sopa azeite,\r\n1 ramo de coentros frescos', '', 'comer', 4, 2, 3, 0.5, 13, 'Fácil', 'Público', 'Aprovado', '2020-07-06 07:23:59', '2020-07-06 17:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id_report` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_receita` int(6) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id_report`, `id_user`, `id_receita`, `motivo`, `descricao`, `criado`, `editado`) VALUES
(9, 207, 31, 'Motivo Report', 'Descricao Report', '2020-07-06 17:09:47', '2020-07-06 18:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_user` int(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT 'sem_imagem.jpg',
  `email` varchar(255) NOT NULL,
  `nif` bigint(9) DEFAULT 0,
  `idade` int(10) DEFAULT 0,
  `sexo` enum('Não Definido','Masculino','Feminino','Não Revelar') NOT NULL DEFAULT 'Não Definido',
  `nivel` enum('1','2') NOT NULL,
  `password` varchar(255) NOT NULL,
  `verificacao` enum('Não','Sim') NOT NULL DEFAULT 'Não',
  `token_verificacao` varchar(32) DEFAULT NULL,
  `token_passwordreset` varchar(32) DEFAULT NULL,
  `criado` timestamp NOT NULL DEFAULT current_timestamp(),
  `editado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizadores`
--

INSERT INTO `utilizadores` (`id_user`, `nome`, `apelido`, `imagem`, `email`, `nif`, `idade`, `sexo`, `nivel`, `password`, `verificacao`, `token_verificacao`, `token_passwordreset`, `criado`, `editado`) VALUES
(206, 'Admin', 'Site', 'sem_imagem.jpg', 'admin@gmail.com', 123123123, 20, 'Não Definido', '2', '$2y$10$J70tegMpraKLFHcPqwG6qejASlFh01ZhRMHxgdUpjwAKDHZ7fbOFu', 'Sim', 'ec5aa0b7846082a2415f0902f0da88f2', NULL, '2020-07-06 17:52:26', '2020-07-06 17:59:53'),
(207, 'User', 'Verificado', 'sem_imagem.jpg', 'userverificado@gmail.com', 123321123, 20, 'Não Definido', '1', '$2y$10$tUsFBZHR.qb8T3hrCWiIA.v1ioPTAMgQ2CFl0tirHPvqx/8ukEdlW', 'Sim', 'd4c2e4a3297fe25a71d030b67eb83bfc', NULL, '2020-07-06 17:53:40', '2020-07-06 17:54:55'),
(208, 'User', 'NãoVerificado', 'sem_imagem.jpg', 'usernaoverificado@gmail.com', 321321321, 20, 'Não Definido', '1', '$2y$10$CkT9fY/wFsMN2wRhbH5IuOMUlEHl6321RutWJr5.LOamCzdyVWLzW', 'Não', '9f61408e3afb633e50cdf1b20de6f466', NULL, '2020-07-06 18:00:23', '2020-07-06 18:02:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `classificacoes`
--
ALTER TABLE `classificacoes`
  ADD PRIMARY KEY (`id_classificacao`),
  ADD KEY `class_id_receita` (`id_receita`),
  ADD KEY `class_id_user` (`id_user`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favoritos`),
  ADD KEY `favoritos_iduser` (`id_user`) USING BTREE,
  ADD KEY `favoritos_idreceita` (`id_receita`) USING BTREE;

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id_receita`),
  ADD KEY `receitas_iduser` (`id_user`) USING BTREE,
  ADD KEY `id_categoria_receitas` (`id_categoria`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `rep_id_user` (`id_user`),
  ADD KEY `rep_id_receita` (`id_receita`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `classificacoes`
--
ALTER TABLE `classificacoes`
  MODIFY `id_classificacao` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favoritos` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id_ingrediente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id_receita` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classificacoes`
--
ALTER TABLE `classificacoes`
  ADD CONSTRAINT `class_id_receita` FOREIGN KEY (`id_receita`) REFERENCES `receitas` (`id_receita`),
  ADD CONSTRAINT `class_id_user` FOREIGN KEY (`id_user`) REFERENCES `utilizadores` (`id_user`);

--
-- Constraints for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `id_receita` FOREIGN KEY (`id_receita`) REFERENCES `receitas` (`id_receita`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `utilizadores` (`id_user`);

--
-- Constraints for table `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `id_categoria_receitas` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `rep_id_receita` FOREIGN KEY (`id_receita`) REFERENCES `receitas` (`id_receita`),
  ADD CONSTRAINT `rep_id_user` FOREIGN KEY (`id_user`) REFERENCES `utilizadores` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
