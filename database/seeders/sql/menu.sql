SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE menu_categories;
TRUNCATE TABLE menu;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO menu_categories
(id, name, created_at, updated_at)
VALUES(1, '{"it" : "Piatti", "en" :"Main dishes"}', '2019-05-30 15:34:16', '2021-02-24 09:08:44');
INSERT INTO menu_categories
(id, name, created_at, updated_at)
VALUES(2, '{"it" : "Contorni", "en" :"Side dishes"}', '2019-05-30 15:34:29', '2021-02-24 09:08:56');
INSERT INTO menu_categories
(id, name, created_at, updated_at)
VALUES(3, '{"it" : "Bevande", "en" :"Drinks"}', '2019-05-30 15:34:39', '2021-02-24 09:09:04');
INSERT INTO menu_categories
(id, name, created_at, updated_at)
VALUES(4, '{"it" : "Bevande", "en" :"Drinks"}', '2019-05-30 15:34:53', '2021-04-05 09:12:07');


# --------------------------------------------------------------------------
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(1, 1, '000013', '{"en": "Cod", "it": "Baccalà alla vicentina"}', '{"en": "with polenta", "it": "con polenta"}', '{"en": "", "it": ""}', 1, 'Baccalà', 25, 'baccala_0.jpg', '.png', 13.00, 'N', 'N', 'N', '1,4,6,7,9,10,13', 'N', 'Y', NULL, 'Y', 'Y', 1, 'Y', '2019-05-30 15:35:47', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(2, 1, '000014', '{"en": "Snails", "it": "Lumache"}', '{"en": "with mushrooms and polenta", "it": "con funghi e polenta"}', '{"en": "", "it": ""}', 1, '', 25, 'lumache_1.jpg', 'lumache.png', 13.00, 'N', 'N', 'N', '1,7,9,14', 'N', 'Y', NULL, 'Y', 'Y', 2, 'Y', '2019-05-30 15:45:32', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(3, 1, '000015', '{"en": "Beef burger", "it": "Hamburger di manzo"}', '{"en": "without polenta", "it": "con polenta"}', '{"en": "", "it": "hamburger di solo manzo da 100grammi l&#039;uno"}', 1, 'hamburger', 25, 'hamburger-carne.jpg', 'hamburger.png', 8.00, 'N', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'Y', 3, 'Y', '2019-05-30 15:53:18', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(5, 1, '000017', '{"en": "Sausage", "it": "Salamina (pastin)"}', '{"en": "with polenta", "it": "con polenta"}', '{"en": "minced beef meat", "it": "impasto di carne macinata di bovino adulto"}', 1, '', 25, 'salamina.jpg', 'salamina.png', 8.00, 'N', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'Y', 6, 'Y', '2019-05-30 15:54:56', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(6, 1, '000018', '{"en": "Wiener", "it": "Wurstel"}', '{"en": "with polenta", "it": "con polenta"}', '{"en": "two grilled pork wieners", "it": "due fette di wurstel di maiale, cotto alla piastra"}', 1, '', 25, 'wurstel.jpg', 'wurstel.png', 8.00, 'N', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'Y', 7, 'Y', '2019-05-30 15:55:37', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(7, 1, '000020', '{"en": "Grilled cheese", "it": "Formaggio cotto"}', '{"en": "with polenta", "it": "con polenta"}', '{"en": "two grilled slices of cheese", "it": "due fette di formaggio, cotto alla piastra"}', 1, '', 25, 'formaggio-cotto.jpg', 'formaggio-cotto.png', 8.00, 'N', 'Y', 'N', '7', 'N', 'Y', NULL, 'Y', 'Y', 9, 'Y', '2019-05-30 15:56:12', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(8, 1, '000019', '{"en": "Ribs", "it": "Costicine"}', '{"en": "with polenta", "it": "con polenta"}', '{"en": "pork roasted ribs", "it": "costicine di maiale, cotte al forno"}', 1, '', 25, 'costicine.jpg', 'costicine.png', 8.00, 'N', 'Y', 'N', '7,9', 'N', 'Y', NULL, 'Y', 'Y', 8, 'Y', '2019-05-30 15:57:05', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(11, 2, '000023', '{"en": "Mushrooms", "it": "Funghi"}', '{"en": "with garlic and parsley", "it": "con aglio e prezzemolo"}', '{"en": "", "it": ""}', 3, '', 25, 'funghi.jpg', 'funghi.png', 3.00, 'Y', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'Y', 2, 'Y', '2019-05-30 15:59:12', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(12, 2, '000024', '{"en": "Seasoned beans", "it": "Fagioli conditi"}', '{"en": "with salt, pepper, oil, vinegar, garlic and parsley", "it": "con sale, pepe, olio, aceto, aglio, prezzemolo"}', '{"en": "", "it": ""}', 3, '', 25, 'fagioli.jpg', 'faglioli.png', 3.00, 'Y', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'Y', 3, 'Y', '2019-05-30 15:59:47', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(13, 2, '000022', '{"en": "Fries", "it": "Patatine fritte"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 2, '', 25, 'patate.jpg', 'gruppo-di-maschere-12.png', 3.00, 'Y', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'Y', 1, 'Y', '2019-05-30 16:00:05', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(14, 2, '000026', '{"en": "Salami sandwich", "it": "Panino con sopressa"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 4, '', 25, 'panino.jpg', 'panino-sopressa.png', 2.50, 'N', 'N', 'N', '1,7', 'N', 'Y', NULL, 'Y', 'Y', 5, 'Y', '2019-05-30 16:00:34', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(16, 2, '000029', '{"en": "Bread basket", "it": "Pane"}', '{"en": "", "it": "cestino"}', '{"en": "", "it": ""}', 5, '', 25, 'cestino-pane.jpg', 'cestino-pane.png', 1.00, 'N', 'N', 'N', '1,7', 'Y', 'N', NULL, 'Y', 'Y', 8, 'Y', '2019-05-30 16:01:11', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(17, 2, '000030', '{"en": "Polenta", "it": "Piatto con polenta"}', '{"en": "(4 slices)", "it": "4 fette"}', '{"en": "", "it": ""}', 2, '', 25, 'polenta.jpg', 'polenta.png', 1.00, 'Y', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'Y', 9, 'Y', '2019-05-30 16:01:34', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(18, 2, '000031', '{"en": "Fresh soft cheese", "it": "Formaggio crudo latteria"}', '{"en": "", "it": "1 fetta"}', '{"en": "", "it": ""}', 4, '', 25, 'form-crudo.jpg', 'formaggio-crudo.png', 2.50, 'N', 'N', 'N', '7', 'N', 'Y', NULL, 'Y', 'Y', 10, 'Y', '2019-05-30 16:02:01', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(19, 2, '000032', '{"en": "Ketchup / Mayonnaise", "it": "Ketchup"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 6, 'ketchup', 30, 's_salse.png', 's_salse_0.png', 0.30, 'N', 'Y', 'N', '3', 'N', 'Y', NULL, 'Y', 'Y', 11, 'Y', '2019-05-30 16:02:27', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(20, 3, '000001', '{"en": "Glass of wine", "it": "Bicchiere di vino"}', '{"en": "", "it": "bianco, nero, rosato"}', '{"en": "", "it": ""}', 0, '', 12, '', 'bicchiere-di-vino.png', 1.50, 'N', 'N', 'Y', '', 'N', 'Y', NULL, 'Y', 'N', 1, 'Y', '2019-05-30 16:03:10', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(21, 3, '000002', '{"en": "Half carafe of wine", "it": "Vino 1/2 caraffa (0,40L)"}', '{"en": "(0,40L)", "it": "bianco, nero, rosato"}', '{"en": "", "it": ""}', 0, '', 12, '', 'caraffa-vino-piccola.png', 2.50, 'N', 'N', 'Y', '', 'N', 'Y', NULL, 'Y', 'N', 2, 'Y', '2019-05-30 16:03:35', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(22, 3, '000003', '{"en": "A carafe of wine", "it": "Vino caraffa (0,80L)"}', '{"en": "(0,80L)", "it": "bianco, nero, rosato"}', '{"en": "", "it": ""}', 0, '', 12, '', 'caraffa-vino-grande.png', 5.00, 'N', 'N', 'Y', '', 'N', 'Y', NULL, 'Y', 'N', 3, 'Y', '2019-05-30 16:04:00', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(23, 3, '000004', '{"en": "Bottle of wine", "it": "Vino in bottiglia"}', '{"en": "", "it": "bianco"}', '{"en": "", "it": ""}', 0, '', 12, '', 'bottiglia-vino.png', 7.00, 'N', 'N', 'Y', '', 'N', 'Y', NULL, 'Y', 'N', 4, 'Y', '2019-05-30 16:04:23', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(24, 3, '000006', '{"en": "Draft beer", "it": "Birra alla spina media"}', '{"en": "0.4cl", "it": "0.40 L"}', '{"en": "", "it": ""}', 0, '', 12, '', 'birra-at-2x_1.png', 5.00, 'N', 'N', 'Y', '', 'N', 'Y', NULL, 'Y', 'N', 6, 'Y', '2019-05-30 16:04:46', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(25, 3, '000007', '{"en": "Canned drinks", "it": "Pepsi"}', '{"en": "", "it": "in lattina"}', '{"en": "", "it": ""}', 0, '', 12, '', 'bibita.png', 2.00, 'N', 'N', 'N', '', 'N', 'Y', NULL, 'Y', 'N', 8, 'Y', '2019-05-30 16:05:01', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(26, 3, '000011', '{"en": "1/2 liter water", "it": "Acqua naturale"}', '{"en": "", "it": "1/2 litro"}', '{"en": "", "it": ""}', 0, '', 12, '', 'acqua.png', 1.00, 'N', 'N', 'N', '', 'N', 'Y', NULL, 'Y', 'N', 12, 'Y', '2019-05-30 16:05:18', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(27, 4, '000043', '{"en": "Pioppi&#039;s coffee", "it": "Caffè dei pioppi"}', '{"en": "flavoured", "it": "aromatizzato"}', '{"en": "flavoured with almond, vanilla and anise", "it": "aromatizzato con un infuso a base di mandorla, vaniglia e anice"}', 0, '', 12, 'caffe-dei-pioppi.jpg', '.png', 0.50, 'N', 'Y', 'Y', '8', 'N', 'Y', NULL, 'Y', 'N', 11, 'Y', '2019-05-30 16:06:05', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(29, 4, '000034', '{"en": "Tortina normal / cacao", "it": "Tortina"}', '{"en": "homemade cake with eggs, milk and flour - no filling", "it": "normale o cacao"}', '{"en": "", "it": ""}', 0, '', 12, 'image.png', 'tortina-normale.png', 2.50, 'N', 'N', 'N', '1,3,6,7,8,10', 'N', 'Y', NULL, 'Y', 'Y', 1, 'Y', '2019-05-30 16:07:17', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(30, 4, '000042', '{"en": "Watermelon", "it": "Anguria"}', '{"en": "during the season only", "it": "solo in stagione"}', '{"en": "", "it": ""}', 0, '', 12, '', 'anguria_0.png', 2.50, 'Y', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'N', 9, 'N', '2019-05-30 16:07:40', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(31, 4, '000040', '{"en": "Ice-cream", "it": "Gelato"}', '{"en": "", "it": "panna/cacao/misto"}', '{"en": "3 flavours available: cream, kakao or mixed (cream and kakao)", "it": "disponibile in 3 varianti, panna, cacao o misto (panna e cacao insieme)"}', 0, '', 12, 'gelato-misto.jpg', 'gelato.png', 3.00, 'N', 'Y', 'N', '3,6,7', 'N', 'Y', NULL, 'Y', 'N', 7, 'Y', '2019-05-30 16:08:09', '2024-10-19 15:36:39');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(32, 4, '000041', '{"en": "Sgroppino", "it": "Sgroppino"}', '{"en": "lemon sorbet, vodka and prosecco", "it": "al limone con vodka e prosecco"}', '{"en": "", "it": ""}', 0, '', 12, 'image_7.png', 'sgroppino.png', 2.50, 'N', 'N', 'Y', '7', 'N', 'Y', NULL, 'Y', 'N', 8, 'Y', '2019-05-30 16:08:40', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(33, 4, '000044', '{"en": "Espresso", "it": "Caffè"}', '{"en": "", "it": "espresso"}', '{"en": "", "it": ""}', 0, '', 12, '', '.png', 1.00, 'N', 'Y', 'N', '', 'N', 'Y', NULL, 'Y', 'N', 12, 'Y', '2020-06-11 09:33:24', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(35, 2, '000033', '{"en": "Mayonnaise", "it": "Maionese"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 6, 'Maionese', 30, 's_s_salse.png', 's_s_salse_0.png', 0.30, 'N', 'Y', 'N', '3', 'N', 'Y', NULL, 'Y', 'Y', 12, 'Y', '2021-03-10 18:18:24', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(36, 3, '000005', '{"en": "Draft beer", "it": "Birra alla spina piccola"}', '{"en": "0,20 l", "it": "0,25 L"}', '{"en": "", "it": ""}', 0, '', 12, '', 'birra-piccola.png', 3.00, 'N', 'N', 'Y', '', 'N', 'N', NULL, 'Y', 'N', 5, 'Y', '2021-03-24 09:47:16', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(37, 1, '000016', '{"en": "Vegan burger", "it": "Hamburger di verdure"}', '{"en": "with polenta", "it": "con polenta"}', '{"en": "", "it": ""}', 1, '', 25, 'hamburger-verdure.jpg', 'hamburger-vegano.png', 8.00, 'Y', 'N', 'N', '1,6,9,10', 'N', 'N', NULL, 'Y', 'Y', 4, 'Y', '2021-03-24 09:49:47', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(38, 1, '000021', '{"en": "Chicken wings", "it": "Alette di pollo"}', '{"en": "with polenta", "it": "con polenta"}', '{"en": "", "it": ""}', 1, '', 25, 'alette.jpg', 'alette-pollo.png', 8.00, 'N', 'N', 'N', '1,4,6,7,9,10', 'N', 'N', NULL, 'Y', 'Y', 10, 'Y', '2021-03-24 09:54:04', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(39, 4, '000035', '{"en": "", "it": "Tortina farcita"}', '{"en": "", "it": "normale o cacao, + marmellata o cioccolato"}', '{"en": "", "it": ""}', 0, '', 12, 'image.png', 'tortina-cacao.png', 2.50, 'N', 'N', 'N', '1,3,6,7,8,10', 'N', 'Y', NULL, 'Y', 'Y', 2, 'Y', '2021-03-24 10:00:39', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(49, 4, '000036', '{"en": "", "it": "Mousse al cioccolato"}', '{"en": "", "it": "con granella di nocciola"}', '{"en": "", "it": ""}', 0, '', 12, '', 'gruppo-di-maschere-451.png', 3.50, 'N', 'N', 'N', '5,6,7,8', 'Y', 'N', NULL, 'Y', 'Y', 3, 'Y', '2024-03-26 17:42:25', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(51, 4, '000037', '{"en": "", "it": "Tiramisù"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 0, 'no', 12, '', 'gruppo-di-maschere-452.png', 3.50, 'N', 'N', 'N', '1,3,6,7,8', 'Y', 'N', NULL, 'Y', 'Y', 4, 'Y', '2024-03-28 09:03:38', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(55, 4, '000039', '{"en": "", "it": "Torta della nonna"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 0, 'no', 0, '', 'gruppo-di-maschere-454.png', 3.50, 'N', 'N', 'N', '1,3,6,7,8,10,13', 'Y', 'N', NULL, 'Y', 'N', 6, 'Y', '2024-03-28 10:47:03', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(56, 2, '000027', '{"en": "", "it": "Panino con mortadella"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 4, 'Panino con mortadella', 20, 'mortadella.jpg', 'gruppo-di-maschere-450.png', 2.50, 'N', 'N', 'N', '1,7', 'Y', 'N', NULL, 'Y', 'Y', 6, 'Y', '2024-03-28 10:50:42', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(57, 2, '000028', '{"en": "", "it": "Panino con prosciutto cotto"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 4, 'Panino con prosciutto cotto', 20, 'p-cotto-panino.jpg', 'gruppo-di-maschere-443.png', 2.50, 'N', 'N', 'N', '1,7', 'Y', 'N', NULL, 'Y', 'Y', 7, 'Y', '2024-03-28 10:55:22', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(58, 2, '000025', '{"en": "", "it": "Affettati misti"}', '{"en": "", "it": "sopressa, mortadella, prosciutto cotto"}', '{"en": "", "it": ""}', 1, 'Affettati misti', 20, 'piatto-misto-affettati.jpg', 'gruppo-di-maschere-444.png', 5.50, 'N', 'N', 'N', '', 'N', 'N', NULL, 'Y', 'Y', 4, 'Y', '2024-03-28 15:49:08', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(59, 4, '000038', '{"en": "", "it": "Crema e lamponi"}', '{"en": "", "it": "crema alla panna con purea di lamponi"}', '{"en": "", "it": ""}', 0, 'no', 20, '', 'gruppo-di-maschere-453_0.png', 3.50, 'N', 'N', 'N', '3,7', 'N', 'N', NULL, 'Y', 'Y', 5, 'Y', '2024-03-28 16:11:09', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(60, 3, '000008', '{"en": "", "it": "The al limone"}', '{"en": "", "it": "in lattina"}', '{"en": "", "it": ""}', 0, 'no', 20, '', 'gruppo-di-maschere-447.png', 2.00, 'N', 'N', 'N', '', 'N', 'N', NULL, 'Y', 'Y', 9, 'Y', '2024-03-28 16:15:08', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(61, 3, '000009', '{"en": "", "it": "The alla pesca"}', '{"en": "", "it": "in lattina"}', '{"en": "", "it": ""}', 0, 'no', 20, '', 'gruppo-di-maschere-446.png', 2.00, 'N', 'N', 'N', '', 'N', 'N', NULL, 'Y', 'Y', 10, 'Y', '2024-03-28 16:15:59', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(62, 3, '000010', '{"en": "", "it": "Oran soda"}', '{"en": "", "it": "in lattina"}', '{"en": "", "it": ""}', 0, 'no', 20, '', 'gruppo-di-maschere-449.png', 2.00, 'N', 'N', 'N', '', 'N', 'N', NULL, 'Y', 'Y', 11, 'Y', '2024-03-28 16:16:37', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(63, 3, '000012', '{"en": "", "it": "Acqua frizzante"}', '{"en": "", "it": "1/2 litro"}', '{"en": "", "it": ""}', 0, '', 20, '', 'acqua.png', 1.00, 'N', 'N', 'N', '', 'N', 'N', NULL, 'Y', 'Y', 13, 'Y', '2024-03-28 16:17:30', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(64, 3, '000045', '{"en": "", "it": "Spritz"}', '{"en": "", "it": ""}', '{"en": "", "it": ""}', 0, '', 20, '', 'gruppo-di-maschere-448.png', 3.00, 'N', 'N', 'Y', '', 'N', 'N', NULL, 'Y', 'Y', 7, 'Y', '2024-03-28 16:55:36', '2024-10-19 15:36:40');
INSERT INTO menu
(id, category_id, code, title, subtitle, description, tray_slots, tray_label, tray_fontsize, img_1, img_2, price, vegetarian, glutenfree, alcohol, allergens, with_milk, expiring_order, availability, sellable, dashboard_visible, `sort`, public, created_at, updated_at)
VALUES(65, 4, '000046', '{"en": "", "it": "Granita"}', '{"en": "", "it": "gusti vari"}', '{"en": "", "it": ""}', 0, '', 20, '', 'gruppo-di-maschere-455.png', 2.50, 'N', 'N', 'N', '', 'N', 'N', NULL, 'Y', 'Y', 10, 'Y', '2024-03-28 16:56:44', '2024-10-19 15:36:40');