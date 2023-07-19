CREATE TABLE `produtos` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `preco` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`) VALUES
(1, 'Arroz', 'Arroz integral 5kg', '5.00'),
(2, 'Feijão', 'Feijão Preto 1kg', '6.50'),
(3, 'Açucar', 'Açucar Refinado União 1KG', '3.15'),
(5, 'Produto Tal', 'descricao Produto Tal', '4.90'),
(6, 'Produto X', 'descricao x', '4.90'),
(7, 'Produto Y', 'Descricao Produto Y', '4.90');


ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `produtos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;


----------------------------------------------------------------------------------

----- INSERIR na tabela users -----

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$ZyuqcS/cN91/vlt/4ARM1uv.SyOtNQR9qBQjJoQK2XzW6ZnveJ0l2', NULL, NULL, NULL);
