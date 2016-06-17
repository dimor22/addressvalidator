# Address Validator
This app will validate an address entered by the user and upon acceptance it will append it to a list.
Live Demo: http://webbuilder.solutions/apps/addressvalidator/

Table Schema

CREATE TABLE `addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `searched_address1` varchar(250) NOT NULL,
  `searched_city` varchar(100) NOT NULL,
  `searched_state` varchar(50) NOT NULL,
  `searched_zip` varchar(50) NOT NULL,
  `validated_address1` varchar(250) NOT NULL,
  `validated_city` varchar(100) NOT NULL,
  `validated_state` varchar(50) NOT NULL,
  `validated_zip` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1
