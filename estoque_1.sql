
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Estrutura para tabela `estoque.1`
--

CREATE TABLE `estoque.1` (
  `id` int(11) NOT NULL,
  `Protudos` varchar(50) NOT NULL,
  `Quantidade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque.1`
--

INSERT INTO `estoque.1` (`id`, `Protudos`, `Quantidade`) VALUES
(1, 'Fio de Malha 36mm', '50'),
(2, 'Fio de Malha 26mm', '100'),
(3, 'Fio de Malha 15mm', '120'),
(4, 'Fio de Poliéster 4mm', '30'),
(5, 'Fio de Poliéster 5mm', '60'),
(6, 'Fio de Poliéster 8mm', '90'),
(7, 'Fita de Malha 2mm', '150'),
(8, 'Bola Emborrachada 10mm Pinhão', '200'),
(9, 'Chaveiro em Couro Caramelo', '150'),
(10, 'Chaveiro em Couro Ônix', '100'),
(11, 'Forro de Bolsa M Bege com Poá', '80'),
(12, 'Forro de Bolsa M Rosa Claro', '100'),
(13, 'Fundo de Bolsa Retangular Caramelo', '200'),
(14, 'Fundo de Bolsa Retangular Ocre', '250'),
(15, 'Kit Aba para Bolsa', '300'),
(16, 'Fundo de Bolsa P Preto', '150'),
(17, 'Pezinho Bailarina Dourado', '150'),
(18, 'Pezinho Bailarina Prata', '200');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `estoque.1`
--
ALTER TABLE `estoque.1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estoque.1`
--
ALTER TABLE `estoque.1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
