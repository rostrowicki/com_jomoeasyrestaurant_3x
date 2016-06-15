
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `#__jomoeasyrestaurantmenu_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text,
  `name` varchar(128) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `show_desc` tinyint(1) NOT NULL DEFAULT '1',
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  `layout` smallint(6) NOT NULL DEFAULT '1' COMMENT 'number of columns',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `menu_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;


INSERT IGNORE INTO `#__jomoeasyrestaurantmenu_categories` (`id`, `description`, `name`, `alias`, `show_desc`, `show_title`, `layout`, `ordering`, `published`, `menu_id`) VALUES
(17, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse at est augue, quis ultricies leo. Sed vel leo felis, sed ornare nunc. Aliquam erat volutpat. Mauris sed placerat quam. Nunc non lectus et ligula fringilla rutrum vel sit amet leo. ', 'Soup', '', 1, 1, 1, 2, 1, 6),
(18, 'Pellentesque quis urna vitae augue dapibus viverra quis eget mauris. Vivamus quam diam, vulputate id consectetur id, consequat eget urna. Donec nunc lectus, convallis vel molestie eget, condimentum eu magna. Cras orci augue, commodo accumsan pharetra eget, pulvinar ac nisi.', 'Salads', '', 1, 1, 2, 3, 1, 6),
(19, 'Morbi sed tellus lacus. Praesent pulvinar, diam eu convallis molestie, turpis lacus volutpat lorem, eu sagittis dolor dolor eget eros. Quisque blandit purus eu ante interdum id aliquet eros ullamcorper.', 'Desserts', '', 1, 1, 2, 1, 1, 6),
(20, 'Nam eget sapien vitae nisi tempus tincidunt. Aenean vitae est nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean nulla nisi, vestibulum a egestas interdum, rhoncus ac felis. Quisque vitae nisi tellus, sit amet pretium augue.', 'Vagetarian', '', 1, 1, 2, 1, 1, 7),
(21, 'Pellentesque quis urna vitae augue dapibus viverra quis eget mauris. Vivamus quam diam, vulputate id consectetur id, consequat eget urna. Donec nunc lectus, convallis vel molestie eget, condimentum eu magna. Cras orci augue, commodo accumsan pharetra eget, pulvinar ac nisi.', 'Kids', '', 1, 1, 1, 2, 1, 7);


CREATE TABLE IF NOT EXISTS `#__jomoeasyrestaurantmenu_dishes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `icon_id` int(10) DEFAULT NULL,
  `description` text,
  `name` varchar(128) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `dish_img` text COMMENT 'image_url',
  `dish_icon` text COMMENT 'icon url',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `show_price` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;


INSERT IGNORE INTO `#__jomoeasyrestaurantmenu_dishes` (`id`, `category_id`, `icon_id`, `description`, `name`, `alias`, `price`, `dish_img`, `dish_icon`, `ordering`, `show_price`, `published`) VALUES
(16, 17, NULL, 'Ut at orci eget leo auctor facilisis. In hac habitasse platea dictumst. Integer et urna in ante vulputate mollis. Aliquam quam mi, posuere vulputate hendrerit non, lacinia eget mauris. Praesent ac tortor ac orci fringilla placerat in a quam. Aenean purus ante, vulputate at semper ut, placerat id purus.', 'Soup A', '', 15.15, 'media/com_jomoeasyrestaurantmenu/dishes/soup1.jpg', '', 1, 1, 1),
(17, 17, NULL, 'Curabitur dignissim, magna nec venenatis pellentesque, turpis ipsum lobortis nulla, id ullamcorper justo felis quis magna. Aliquam lacinia mattis mauris, id suscipit nisi malesuada ac. Aliquam sed turpis id nunc lobortis dignissim. ', 'Soup B', '', 12.23, 'media/com_jomoeasyrestaurantmenu/dishes/soup2.jpg', '', 5, 1, 1),
(18, 17, NULL, 'Mauris mi turpis, mattis id dapibus ut, ultricies ut tellus. Sed lacus odio, suscipit sit amet porttitor eget, egestas quis orci. Phasellus sollicitudin mauris in dui porttitor lobortis. Sed ut urna felis, nec vulputate diam. ', 'Soup C', '', 0, 'media/com_jomoeasyrestaurantmenu/dishes/soup3.jpg', '', 2, 1, 1),
(19, 17, NULL, 'Nunc eu neque eros. Cras consectetur eros et metus interdum id egestas erat scelerisque. Sed placerat nisl id dolor molestie tempus. Morbi lacinia est eu massa eleifend nec aliquet urna sollicitudin.', 'Soup D', '', 0, 'media/com_jomoeasyrestaurantmenu/dishes/soup4.jpg', '', 3, 1, 1),
(20, 17, NULL, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse at est augue, quis ultricies leo. Sed vel leo felis, sed ornare nunc. Aliquam erat volutpat. Mauris sed placerat quam. Nunc non lectus et ligula fringilla rutrum vel sit amet leo. ', 'Soup E', '', 0, 'media/com_jomoeasyrestaurantmenu/dishes/soup5.jpg', 'star.png', 4, 1, 1),
(21, 18, NULL, 'Nam eget sapien vitae nisi tempus tincidunt. Aenean vitae est nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean nulla nisi, vestibulum a egestas interdum, rhoncus ac felis. Quisque vitae nisi tellus, sit amet pretium augue.', 'Salad A', '', 43.23, 'media/com_jomoeasyrestaurantmenu/dishes/salad1.jpg', '', 3, 1, 1),
(22, 18, NULL, 'Etiam consequat est vitae metus viverra ultrices. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis felis nibh, mollis sit amet euismod non, venenatis in tortor. Curabitur sollicitudin tortor in metus adipiscing vestibulum. Aenean eleifend justo quis justo vehicula nec dapibus diam viverra.', 'Salad B', '', 32.12, 'media/com_jomoeasyrestaurantmenu/dishes/salad2.jpg', 'pepper.png', 2, 1, 1),
(23, 18, NULL, 'Phasellus non libero quis diam hendrerit scelerisque. Pellentesque turpis nibh, suscipit non malesuada quis, convallis quis arcu. Nulla sed magna ac tellus pellentesque egestas. Curabitur porta congue sapien, ut ultrices urna consectetur id. Duis sed augue augue.', 'Salad C', '', 0, 'media/com_jomoeasyrestaurantmenu/dishes/salad3.jpg', 'vegetarian.png', 1, 1, 1),
(24, 19, NULL, 'Proin semper malesuada lacus. Ut at massa sit amet erat viverra dignissim quis at sapien. Donec consectetur blandit viverra. Nunc hendrerit dolor vel nisi tristique dignissim. Pellentesque lobortis, massa sed aliquet egestas, orci sapien aliquam justo, sed tempus nunc enim cursus est.', 'Ice Cream A', '', 0, 'media/com_jomoeasyrestaurantmenu/dishes/icecream1.jpg', '', 1, 1, 1),
(25, 19, NULL, 'Aliquam vestibulum dui ac lacus semper venenatis. Fusce commodo arcu non massa sollicitudin aliquet imperdiet tortor faucibus. Vestibulum metus diam, scelerisque et luctus et, posuere nec lectus.', 'Ice Cream B', '', 3.32, 'media/com_jomoeasyrestaurantmenu/dishes/icecream2.jpg', '', 2, 1, 1),
(26, 20, NULL, 'Nulla sed magna ac tellus pellentesque egestas. Curabitur porta congue sapien, ut ultrices urna consectetur id. Duis sed augue augue. Morbi sed tellus lacus.', 'VegePizza A', '', 12.98, 'media/com_jomoeasyrestaurantmenu/dishes/pizza3.jpg', 'vegetarian.png', 1, 1, 1),
(27, 20, NULL, 'Curabitur sollicitudin tortor in metus adipiscing vestibulum. Aenean eleifend justo quis justo vehicula nec dapibus diam viverra. Pellentesque nisi turpis, placerat sed feugiat vitae, rutrum ac mi.', 'VegePizza B', '', 0, 'media/com_jomoeasyrestaurantmenu/dishes/pizza4.jpg', 'vegetarian.png', 2, 1, 1),
(28, 20, NULL, 'Donec consectetur blandit viverra. Nunc hendrerit dolor vel nisi tristique dignissim. Pellentesque lobortis, massa sed aliquet egestas, orci sapien aliquam justo, sed tempus nunc enim cursus est.', 'VegePizza C', '', 12.12, 'media/com_jomoeasyrestaurantmenu/dishes/pizza1.jpg', 'vegetarian.png', 3, 1, 1),
(29, 21, NULL, 'Aenean scelerisque purus vitae urna laoreet facilisis. Nulla dictum magna massa. Ut sagittis, diam ut posuere lacinia, arcu sem sagittis magna, vitae vehicula nisl risus ac ante.', 'ForKids A', '', 0, 'media/com_jomoeasyrestaurantmenu/dishes/pizza1.jpg', '', 2, 1, 1),
(30, 21, NULL, 'Curabitur sollicitudin tortor in metus adipiscing vestibulum. Aenean eleifend justo quis justo vehicula nec dapibus diam viverra. Pellentesque nisi turpis, placerat sed feugiat vitae, rutrum ac mi. Phasellus non libero quis diam hendrerit scelerisque.', 'ForKids B', '', 13.88, 'media/com_jomoeasyrestaurantmenu/dishes/pizza2.jpg', '', 1, 1, 1);


CREATE TABLE IF NOT EXISTS `#__jomoeasyrestaurantmenu_icons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text,
  `name` varchar(128) DEFAULT NULL,
  `image_url` varchar(128) DEFAULT NULL,
  `isRemovable` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;


INSERT IGNORE INTO `#__jomoeasyrestaurantmenu_icons` (`id`, `description`, `name`, `image_url`, `isRemovable`, `published`) VALUES
(5, 'ikona powered by JOOMLA', 'Powered By Joomla', 'images/jomoeasyrestaurantmenu/trophy.png', 0, 1),
(6, 'Apples icon', 'AppleX', 'images/jomoeasyrestaurantmenu/trophy.png', 1, 1),
(7, 'Opis iconki', 'Iconka', 'images/jomoeasyrestaurantmenu/trophy.png', 1, 1);


CREATE TABLE IF NOT EXISTS `#__jomoeasyrestaurantmenu_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text,
  `name` varchar(255) DEFAULT NULL COMMENT 'title',
  `name2` varchar(255) NOT NULL COMMENT 'subtitle',
  `alias` varchar(255) NOT NULL,
  `show_link` tinyint(1) NOT NULL DEFAULT '1',
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;


INSERT IGNORE INTO `#__jomoeasyrestaurantmenu_menus` (`id`, `description`, `name`, `name2`, `alias`, `show_link`, `show_title`, `published`) VALUES
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a nibh non lectus convallis porta. Integer eu enim eros. Nunc ornare, sem eu tempus egestas, ante dui tristique elit, eget elementum leo erat eu mi. ', 'Dinners', 'Easy Dinner Menu', '', 1, 1, 1),
(7, 'Morbi metus ante, ullamcorper a egestas sed, tempus eu ipsum. Sed eu justo nunc. Nunc viverra consectetur lacus, a placerat neque mollis non. Vestibulum eleifend suscipit tortor vel sodales. Praesent quis quam sed massa auctor placerat nec a eros. Cras sollicitudin bibendum turpis, non ultricies turpis faucibus ut.', 'Pizza', 'Easy pizza menu', '', 1, 1, 1);
