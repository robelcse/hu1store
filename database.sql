create table `providers`(
  `id` int unsigned auto_increment primary key not null,
  `name` varchar(255) not null
)charset 'utf8mb4';

create table `types`(
  `id` int unsigned auto_increment primary key not null,
  `name` varchar(255) not null
) charset 'utf8mb4';

create table `items`(
  `id` int unsigned auto_increment primary key not null,
  `type` int unsigned not null,
  foreign key(`type`) references `types`(`id`),
  `provider` int unsigned not null,
  foreign key(`provider`) references `providers`(`id`),
  `title` varchar(255) not null,
  `image` varchar(255) not null,
  `details` text not null,
  `price` float(10,2) not null,
  `reg_price` float(10,2) not null
)charset 'utf8mb4';

create table `orders` (
  `id` bigint unsigned auto_increment primary key not null,
  `name` varchar(25) not null,
  `email` varchar(25) not null,
  `item` int unsigned not null,
  foreign key(`item`) references `items`(`id`),
  `item_price` float(10,2) not null,
  `currency` varchar(10) not null,
  `address_line_1` text not null,
  `address_line_2` text,
  `country` varchar(255) not null,
  `city` varchar(255) not null,
  `state` varchar(255) not null,
  `zip` varchar(20) not null,
  `payment_status` enum('unpaid', 'paid') not null default 'unpaid',
  `create_at` datetime not null default current_timestamp(),
  `updated_at` datetime not null default current_timestamp() on update current_timestamp()
) charset 'utf8mb4';

create table `gifts`(
    `id` bigint unsigned auto_increment primary key not null,
    `gift_no` varchar(100) unique,
    `amount` float(10,2) not null,
    `currency` varchar(10) not null,
    `amount_used` float(10,2) not null default 0.00,
    `theme` varchar(20) not null,
    `message` text not null
);

create table `payments` (
  `id` bigint unsigned auto_increment primary key not null,
  `order` bigint unsigned,
  foreign key(`order`) references `orders`(`id`),
  `gift` bigint unsigned,
  foreign key(`gift`) references `gifts`(`id`),
  `name` varchar(255) not null,
  `tx_id` varchar(255) not null,
  `tx_status` enum('pending', 'success', 'error', 'cancel') not null,
  `payment_method` varchar(255) not null,
  `amount` float(10,2) not null,
  `currency` varchar(10) not null,
  `data` text not null,
  `datetime` datetime not null default current_timestamp() 
) charset 'utf8mb4';