-- --------------------------------------------------------

--
-- Estrutura da tabela `ITEM`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `data` DATE NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contido` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
