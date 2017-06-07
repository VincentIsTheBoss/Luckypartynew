INSERT INTO `evenement` (`id_evenement`, `nom_event`, `genre`, `date_event`, `id_etablissement`) VALUES
(13, 'rave down', 'electro', '2017-06-04', NULL),
(12, 'latinas', 'latino', '2017-06-03', NULL),
(11, 'salami', 'rap', '2017-05-27', NULL);


INSERT INTO `musique` (`id_musique`, `nom_piste`, `artiste`, `genre`, `album`) VALUES
(3, 'Highway to hell', 'acdc', 'rock', 'Highway to hell'),
(4, 'speedom', 'Tech N9ne', 'rap', 'special effect'),
(5, 'dark places', 'hollywood Undead', 'rock', 'day of the dead'),
(6, 'cool girl', 'tove lo', 'pop', 'lady wood'),
(7, 'wawa', 'party favor', 'electro', 'wawa'),
(8, 'magu', 'becky g', 'latino', 'magu' );

INSERT INTO `utilisateur` (`id`, `email`, `pseudo`, `prenom`, `nom`, `sexe`, `pwd`, `date_naissance`, `ville`, `CP`, `is_connected`, `researching`, `id_groupe`, `is_deleted`, `date_created`, `date_updated`, `access_token`) VALUES
(1, 'arthurblanc98@gmail.com', 'alpheonix98', 'Arthur', 'BLANC', 'm', '$2y$10$rsrA2HImmQI7sB2G7t74/.4GTa0m9Y05mfp7qkePIItsdRR0xQc6m', '1998-12-06', 'paris', '75015', 1, 1, 0, 0, '2017-04-24 11:55:38', NULL, 'f3f812822af3b2d4aa61090a8ef36a8f'),
(2, 'mounir.bakhalek@gmail.com', 'Lasdrius', 'Mounir', 'BAKHALEK', 'm', '$2y$10$8WHXjLnr4kNsl0SpH0mwmu1RnF1jmg5UQjfX0bJEcuFk7uusm.8Vq', '1996-10-05', 'paris', '75015', NULL, 1, NULL, 0, '2017-04-24 11:58:33', NULL, NULL),
(3, 'domitille.blanc7@wannadoo.fr', 'Domiwhite', 'Domitille', 'BLANC', 'w', '$2y$10$mxEC8TvdNzgnmPCFsisYy.vAR6huUxXm2jhmPR0ZT2D0UMvytNT02', '1971-05-21', 'paris', '75015', NULL, 1, 0, 0, '2017-04-26 17:36:31', NULL, NULL),
(4, 'valentin.blanc2000@gmail.com', 'Windjer', 'valentin', 'Blanc', 'm', '$2y$10$clsUoNrnUmNlkdh.s7diiud.M8xWtFIPM5xcUFKbZ9GVHUcyyr.cq', '1998-12-06', 'paris', '75015', NULL, 1, 0, 0, '2017-04-29 13:39:02', NULL, NULL),
(5, 'ludoroche@gmail.com', 'luluvroumette', 'Ludo', 'Roche', 'w', '$2y$10$6Q4XJ1nUANWi1muayT.A2.iJCZpKyNknyVGGnzHGWL0tkGcd3Hb7i', '1975-12-07', 'paris', '75016', NULL, 1, NULL, 0, '2017-04-29 13:40:19', NULL, NULL),
(6, 'francois.blanc7@gmail.com', 'ppahtde', 'Francois', 'Blanc', 'm', '$2y$10$xHnZQfhNXp8gbJVcj8RMT.LUKHtGspai01yJy4fCCEsFPXR5Wgtlq', '1971-10-14', 'paris', '75014', NULL, 1, 0, 0, '2017-04-29 13:42:10', NULL, NULL),
(7, 'chloe-budard@gmail.com', 'joueuseSN', 'Chloe', 'Budard', 'w', '$2y$10$ziY.n8OfrLdVGXXDB6VnjOEC4XWdj48ffaInpiw5itHUwJy92OzCy', '1998-06-05', 'paris', '75015', NULL, 1, 0, 0, '2017-04-29 13:44:13', NULL, NULL),
(8, 'viccibold@gmail.com', 'Viccistar', 'victoria', 'Boldi', 'w', '$2y$10$5ePAfzAnMnG9JrXKe0lHM.Jwcvbmb45Yek82ULppuX.HfIA96UDcy', '1993-09-22', 'paris', '75020', NULL, 1, 0, 0, '2017-04-29 13:47:20', NULL, NULL),
(9, 'xxcarlosxx@gmail.com', 'xxcarlosxx', 'Carlos', 'RANKINIOS', 'm', '$2y$10$jUsNBLj7UpRssytm4xueq.1hEZ7QqGhF0ekIkLYz7K3ms6pK7eYea', '1993-10-26', 'iere', '95200', NULL, 1, NULL, 0, '2017-05-24 19:20:29', NULL, NULL);
