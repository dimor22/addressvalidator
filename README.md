# Address Validator
This app will validate an address entered by the user and upon acceptance it will append it to a list.

This application uses Bootstrap 3 and Datatable plugin on the front-end.
I've used Idiorm as a ORM that works on top of PDO for compatibility.
And the rest of the php code is just from scratch.
Composer and namespaces are also used.

Bootstrap 3: http://getbootstrap.com/
SmartyStreets: https://smartystreets.com/
 

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
