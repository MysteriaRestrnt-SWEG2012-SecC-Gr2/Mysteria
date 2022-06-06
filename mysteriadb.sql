-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 12:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysteriadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `food_id`, `quantity`) VALUES
(10, 1, 2),
(10, 2, 2),
(10, 42, 1),
(10, 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `orders` varchar(30) NOT NULL,
  `other` text NOT NULL,
  `phone` varchar(5) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `user_id`, `date`, `orders`, `other`, `phone`, `phone1`, `address`) VALUES
(5, 1, '2022-05-13', 'hi', 'hi', '+251', '978787878', 'hi'),
(6, NULL, '2022-06-06', 'Chicken Grilled \r\n Cheese Burg', 'no', '+251', '978787878', 'addr'),
(7, NULL, '2022-06-06', 'Chicken Grilled \r\n Traditional', '', '+251', '978787878', 'cdfr'),
(8, NULL, '2022-06-07', 'Traditional all in one (fastin', '', '+251', '978787878', 'addr'),
(9, NULL, '2022-06-07', 'Vegiterian Pizza \r\n Shekla Tib', '', '+251', '978787878', 'asdad'),
(10, NULL, '2022-06-06', 'Beef Fillets with Portobello S', '', '+251', '978787878', 'ads'),
(11, 46, '2022-06-07', 'Black Bean and Rice \r\n Chili L', '', '+251', '978787878', 'address');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_no`, `user_id`, `subject`, `date`, `feedback`) VALUES
(3, 10, 'My Best Lunch', '2022-06-06', 'Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing.Food is an art that the artist is our mother.In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother.'),
(4, 10, 'My Best Lunch', '2022-06-06', 'Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing.Food is an art that the artist is our mother.In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother.'),
(5, 10, 'My Best Lunch', '2022-06-06', 'Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing.Food is an art that the artist is our mother.In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother.'),
(7, 11, 'the food', '2022-06-06', 'my comment is that it is incredible'),
(8, 11, 'the food', '2022-06-06', 'i Loved it here!'),
(9, 10, 'My Best Lunch', '2022-06-06', 'Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing.Food is an art that the artist is our mother.In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother.'),
(10, 10, 'My Best Lunch', '2022-06-06', 'Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing.Food is an art that the artist is our mother.In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother. In my experiance of the mysteria resturant I think I have found what it test like. Completely Amazing. Food is an art that the artist is our mother.'),
(11, 46, 'the ingredients', '2022-06-07', 'exquisite simply!');

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(60) NOT NULL,
  `food_category` varchar(80) NOT NULL,
  `imagePath` varchar(300) NOT NULL,
  `ingredient` varchar(2000) NOT NULL,
  `price` double NOT NULL,
  `date_added` date NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`food_id`, `food_name`, `food_category`, `imagePath`, `ingredient`, `price`, `date_added`, `quantity`) VALUES
(1, 'Cocktail Meatballs', 'Appetizer', '../../resources/images/Grape-Jelly-Cocktail-Meatballs-.jpg', 'Frozen Meatballs, Grape Jelly, Chili Sauce', 150, '2022-04-11', 7),
(2, 'Strawberry Salsa', 'Appetizer', '../../resources/images/Strawberry.jpg', 'Fresh Strawberries, Plum tomatoes, Red onion, Jalapeno Peppers.', 200, '2022-04-11', 8),
(3, 'Grilled Guacamole', 'Appetizer', '../../resources/images/Guacamole.jpg', 'Ripe Avocadoes, Red onion, Tomatoes, Jalapeno pepper.', 137, '2022-04-11', 10),
(4, 'Grilled Zucchini with Peanut Chicken', 'Appetizer', '../../resources/images/Grilled-Zucchini.jpg', 'Zucchini, Creamy Peanut Butter, Shredded Cooked Chicken.', 149, '2022-04-11', 10),
(5, 'Samosa', 'Appetizer', '../../resources/images/Samosas.jpg', 'Flour, Red onion, Potatoes, Peas, Cumin seeds.', 65, '2022-04-11', 10),
(6, 'Chicken Cutlet', 'Appetizer', '../../resources/images/Cutlets.jpg', 'Ground Chicken, Smashed Potatoes, Chili, Ginger, Garlic, Corn powders.', 169, '2022-04-11', 10),
(7, 'cherry tomato salad', 'Appetizer', '../../resources/images/cherry tomato sald.jpg', 'Cherry tomatoes, White vinegar,Parsely, Basil, Oregano.', 99, '2022-04-11', 10),
(8, 'Strawberry Kale Salad', 'Appetizer', '../../resources/images/Strawberry-Kale-Salad.jpg', 'Strawberries, Crumbled feta cheese, Vinegar, KaleSlivered Almonds.', 124, '2022-04-11', 10),
(9, 'Sweetheart Cookies', 'Dessert', '../../resources/images/Sweetheart-Cookies.jpg', 'Raspberry or Strawberry, Butter, Flour, Egg yolk, sugar.', 100, '2022-04-11', 10),
(10, 'Peanut Butter Cookies', 'Dessert', '../../resources/images/Old-Fashioned-Peanut-Butter-Cookies.jpg', 'Peanut butter, Brown sugar, Flour, Eggs, Baking soda.', 100, '2022-04-11', 10),
(11, 'Peanut Butter Cookies', 'Dessert', '../../resources/images/Old-Fashioned-Peanut-Butter-Cookies.jpg', 'Peanut butter, Brown sugar, Flour, Eggs, Baking soda.', 100, '2022-04-11', 10),
(12, 'Easy Blueberry Sauce', 'Dessert', '../../resources/images/Easy-Blueberry-Sauce.jpg', 'Cornstarch, Blueberries, Lemon zest, vanilla ice-cream.', 150, '2022-04-11', 10),
(13, 'Orange-LemonCake', 'Dessert', '../../resources/images/Orange-Lemon-Cake.jpg', 'Orange juice, Lemon cake, Orange gelatin, Eggs, Flour.', 125, '2022-04-11', 10),
(14, 'Bread', 'Dessert', '../../resources/images/exps.jpg', 'Package Chocolate, Cream Cheese, Egg, semi-sweet chocolate chips, Semi-sweet chocolate chips.', 125, '2022-04-11', 10),
(15, 'Rich Hot Fudge Sauce', 'Dessert', '../../resources/images/Rich-Hot-Fudge-Sauce.jpg', 'Vanilla ice-cream, Strawberry jam, Miniature semi-sweet chocolate chips.', 100, '2022-04-11', 10),
(16, 'Chocolate Pudding', 'Dessert', '../../resources/images/Homemade-Chocolate-Pudding.jpg', 'Baking cocoa, Cornstarch, sugar, Milk, vanilla, Sweetened whipped cream and M&M\'s (optional). ', 163, '2022-04-11', 10),
(17, 'Vanilla Ice-cream', 'Dessert', '../../resources/images/Vanilla-Ice-Cream.jpg', 'Vanilla ice-cream, Strawberry jam, Miniature semi-sweet chocolate chips.', 100, '2022-04-11', 10),
(18, 'Grilled Pineapple with Lime Dip', 'Dessert', '../../resources/images/Grilled-Pineapple-with-Lime-Dip.jpg', 'Pineapple, Cream Cheese, Honey, lime juice, Plain yogurt, brown sugar.', 100, '2022-04-11', 10),
(19, 'Strawberry Trifle', 'Dessert', '../../resources/images/Strawberry-Trifle.jpg', 'Strawberries, Whipping Cream, Vanilla pudding, orange zest.', 100, '2022-04-11', 10),
(20, 'Tea', 'Drink', '../../resources/images/tea.jpeg', '', 50, '2022-03-12', 10),
(21, 'Chocolate milkshake', 'Drink', '../../resources/images/cup-chocolate-milkshake-caramel.jpg', '', 150, '2022-03-12', 10),
(22, 'Coffee', 'Drink', '../../resources/images/coffee.jpeg', '', 70, '2022-03-12', 10),
(23, 'Vanilla milkshake', 'Drink', '../../resources/images/vanillacapshake.jpeg', '', 150, '2022-03-12', 10),
(24, 'Green Tea', 'Drink', '../../resources/images/green tea.jpg', '', 50, '2022-03-12', 10),
(25, 'strawberry milkshake', 'Drink', '../../resources/images/strawberry-milkshake.jpg', '', 150, '2022-03-12', 10),
(26, 'Hot Chocolate', 'Drink', '../../resources/images/hotchak.jpg', '', 70, '2022-03-12', 10),
(27, 'Oreo milkshake', 'Drink', '../../resources/images/oreo milkshake.jpg', '', 70, '2022-03-12', 10),
(28, 'Macchiato', 'Drink', '../../resources/images/macciato.jpeg', '', 70, '2022-03-12', 10),
(29, 'Home Special', 'Drink', '../../resources/images/milkshake-ice-cream-chocolate.jpg', '', 150, '2022-03-12', 10),
(30, 'Orange juice', 'Drink', '../../resources/images/orange.jpg', '', 100, '2022-03-12', 10),
(31, 'Habesha Beer', 'Drink', '../../resources/images/habesha.jpeg', '', 50, '2022-03-12', 10),
(32, 'Carrot juice', 'Drink', '../../resources/images/carrot.jpg', '', 100, '2022-03-12', 10),
(33, 'Giorgis Beer', 'Drink', '../../resources/images/Giorgis.jpeg', '', 100, '2022-03-12', 10),
(34, 'Avocado juice', 'Drink', '../../resources/images/avocado.jpeg', '', 50, '2022-03-12', 10),
(35, 'Heinken Beer', 'Drink', '../../resources/images/heniken.jpeg', '', 50, '2022-03-12', 10),
(36, 'Apple juice', 'Drink', '../../resources/images/apple.jpeg', '', 100, '2022-03-12', 10),
(37, 'wine.jpeg', 'Drink', '../../resources/images/wine.jpeg', '', 150, '2022-03-12', 10),
(38, 'Juice Plus', 'Drink', '../../resources/images/juicePlus.jpeg', '', 100, '2022-03-12', 10),
(39, 'Tej', 'Drink', '../../resources/images/tej.jpeg', '', 70, '2022-03-12', 10),
(40, 'Chicken Wrap', 'Meatatarian', '../../resources/images/chicken_wrap.jpg', 'chicken breasts, garlic herb cheese,tortilas,lettuce leaves, tomatoes,cucumber,carrot.', 150, '2022-03-13', 10),
(41, 'Chicken Grilled', 'Meatatarian', '../../resources/images/Roast-Chicken.jpg', 'chicken, all purpose flour,garlic salt,paprika, pepper,poultry seasoning,eggs,oil.', 265, '2022-03-13', 9),
(42, 'Cheese Burger', 'Meatatarian', '../../resources/images/grilled cheese burger.jpg', 'Beef, Worcestershire sauce, garlic powder,pepper, olive oil,butter,onion, American Cheese,bread.', 177, '2022-03-13', 9),
(43, 'Doro Wot', 'Meatatarian', '../../resources/images/Doro Wet.jpg', 'Chicken, Red onion, Garlic, Pepper, Egg, Butter.', 315, '2022-03-13', 10),
(44, 'Traditional Tibs', 'Meatatarian', '../../resources/images/Tibs.jpg', 'Beef, Tomato, Red onion, Garlic, Butter, Rosemary.', 315, '2022-03-13', 10),
(45, 'Traditional all in one (fasting)', 'Meatatarian', '../../resources/images/ye tsom.jpeg', 'Vegies, Cereals, Rice, Soups.', 153, '2022-03-13', 10),
(46, 'Traditional all in one (Non-fasting)', 'Meatatarian', '../../resources/images/ye fesk.jpg', 'Beef (all kind), Egg.', 215, '2022-03-13', 10),
(47, 'Crispy Fried Chicken', 'Meatatarian', '../../resources/images/Crispy-Fried-Chicken.jpg', 'Barbeque sause,chicken,pepper, onion,cheese, Tomato Sauce.', 250, '2022-03-13', 9),
(48, 'BBQ Chicken Pizza', 'Meatatarian', '../../resources/images/pizza.jpg', 'Flour, Mozzarella Cheese, Tomato Sauce.', 250, '2022-03-13', 10),
(49, 'Margheritta Pizza', 'Meatatarian', '../../resources/images/BBQ-Ranch-Chicken-Pizza.jpg', 'yeast,olive oil,sugar, bread flour,basil leaves,oregano, mozzarella cheese,pepper,tomatoes.', 250, '2022-03-13', 9),
(50, 'Vegiterian Pizza', 'Meatatarian', '../../resources/images/pizza.png', 'red peppers,mushroom,tomatoes, black olives,mozzarella, garlic,spinach.', 110, '2022-03-13', 10),
(51, 'Shekla Tibs', 'Meatatarian', '../../resources/images/tibs (2).jpg', 'Beef, Red onion, Garlic, Pepper, Injera, Bread.', 110, '2022-03-13', 10),
(52, 'Beef Fillets with Portobello Sauce', 'Meatatarian', '../../resources/images/Beef-Fillets-with-Portobello-Sauce.jpg', 'Flour, Mozzarella Cheese, Tomato Sauce.', 110, '2022-03-13', 10),
(53, 'Crispy Beer Battered Fish', 'Meatatarian', '../../resources/images/Crispy-Beer-Battered-Fish.jpg', 'Cod fillets, Cornstarch, Baking powder, Paprika, Creole seasoning.', 350, '2022-03-13', 10),
(54, 'garlic grilled steaks', 'Meatatarian', '../../resources/images/garlic grilled steaks.jpg', 'Garlic cloves, Worcestershire sauce, Boneless beef strip/ ribeye steaks.', 379, '2022-03-13', 9),
(55, 'Creamy chicken with potatoes,chorizo and leeks', 'Special', '../../resources/images/creamy chicken.png', 'Chicken breasts spanish chorizo, Garlic, potato, yellow onion, small leak, kosher salt, olive oil, paprika, red pepper chicken broth, white wine, heavy cream chives,parsley leaves,', 486, '2022-02-14', 10),
(56, 'Warm salad with lamb chops and meditrranean dressing', 'Special', '../../resources/images/warm salad.png', 'Lamb ribs olive oil,red wine vinegar,green onion marjoram,thyme,black peeper raddicho,cherry tomatoes,spinach', 520, '2022-02-14', 10),
(57, 'Japanese roast chicken', 'Special', '../../resources/images/japanese roast.png', 'Chicken navel orange,carrot,olive oilbutter, Japanese spice mix,chicken broth sesame oil, fresh herbs,baby boy choy', 398, '2022-02-14', 10),
(58, 'Orange-LemonCake,chorizo and leeks', 'Special', '../../resources/images/Orange-Lemon-Cake.jpg', 'Orange juice, Lemon cake, Orange gelatin, Eggs, Flour.', 125, '2022-02-14', 10),
(59, 'Bread', 'Special', '../../resources/images/exps.jpg', 'Package Chocolate, Cream Cheese, Egg, semi-sweet chocolate chips, Semi-sweet chocolate chips.', 125, '2022-02-14', 10),
(60, 'Lamb chops with blackberry-pear,chorizo and leeks', 'Special', '../../resources/images/lamb-chops.png', 'Lamb ribs pear,green onoins,cloves vegitable oil, blackberries,red wine vinegar allspice,black peeper', 478, '2022-02-14', 10),
(61, 'Black Bean and Rice', 'vegetarian', '../../resources/images/Black-Bean-and-Rice.jpg', 'Kidney beans, Brown rice, Italian Seasoning, Bay leaf, Tomato sauce, chili powder.', 150, '2022-01-14', 10),
(62, 'Chili Lime Mushroom Tacos', 'vegetarian', '../../resources/images/Chili-Lime-Mushroom Tacos_.jpg', 'Fresh lime, Mushroom, Red chili.', 200, '2022-01-14', 10),
(63, 'Slow Cooker Veggie Lasagna', 'vegetarian', '../../resources/images/Slow-Cooker-Veggie-Lasagna.jpg', 'Vegetable bouillon, Whole wheat lasagna sheets, Tomatoes, courgettes.', 137, '2022-01-14', 10),
(64, 'Zucchini Lasagna Rolls', 'vegetarian', '../../resources/images/Zucchini-Lasagna-Rolls.jpg', 'Zucchini, Italian sausage, Skim ricotta cheese.', 149, '2022-01-14', 10),
(65, 'Southern Okra Bean Stew', 'vegetarian', '../../resources/images/Southern-Okra-Bean-Stew.jpg', 'Kidney beans, Diced Tomatoes, Garlic, Hot sauce.', 66, '2022-01-14', 9),
(66, 'Pierog', 'vegetarian', '../../resources/images/Pierog.jpg', 'Flour, Potatoes, onions, Chili, Ginger, Garlic, Corn powders.', 169, '2022-01-14', 10),
(67, 'Rustic Squash Tarts', 'vegetarian', '../../resources/images/Rustic-Squash-Tarts.jpg', 'Butternut squash, Red onion, Garlic, olive oil, Acorn squash.', 99, '2022-01-14', 10),
(130, 'Pasta with cabbage', 'Vegetarian', '../../resources/images/pastas.png', 'pasta, cabbage, onion', 65, '2022-05-19', 10);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `food_id` int(11) NOT NULL,
  `ingredient_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`food_id`, `ingredient_name`) VALUES
(1, ' Chili Sauce'),
(1, ' Grape Jelly'),
(1, 'Frozen Meatballs'),
(2, ' Jalapeno Peppers.'),
(2, ' Plum tomatoes'),
(2, ' Red onion'),
(2, 'Fresh Strawberries'),
(3, ' Jalapeno pepper.'),
(3, ' Red onion'),
(3, ' Tomatoes'),
(3, 'Ripe Avocadoes'),
(4, ' Creamy Peanut Butter'),
(4, ' Shredded Cooked Chicken.'),
(4, 'Zucchini'),
(5, ' Cumin seeds.'),
(5, ' Peas'),
(5, ' Potatoes'),
(5, ' Red onion'),
(5, 'Flour'),
(6, ' Chili'),
(6, ' Corn powders.'),
(6, ' Garlic'),
(6, ' Ginger'),
(6, ' Smashed Potatoes'),
(6, 'Ground Chicken'),
(7, ' Basil'),
(7, ' Oregano.'),
(7, ' White vinegar'),
(7, 'Cherry tomatoes'),
(7, 'Parsely'),
(8, ' Crumbled feta cheese'),
(8, ' KaleSlivered Almonds.'),
(8, ' Vinegar'),
(8, 'Strawberries'),
(9, ' Butter'),
(9, ' Egg yolk'),
(9, ' Flour'),
(9, ' sugar.'),
(9, 'Raspberry or Strawberry'),
(10, ' Baking soda.'),
(10, ' Brown sugar'),
(10, ' Eggs'),
(10, ' Flour'),
(10, 'Peanut butter'),
(11, ' Baking soda.'),
(11, ' Brown sugar'),
(11, ' Eggs'),
(11, ' Flour'),
(11, 'Peanut butter'),
(12, ' Blueberries'),
(12, ' Lemon zest'),
(12, ' vanilla ice-cream.'),
(12, 'Cornstarch'),
(13, ' Eggs'),
(13, ' Flour.'),
(13, ' Lemon cake'),
(13, ' Orange gelatin'),
(13, 'Orange juice'),
(14, ' Cream Cheese'),
(14, ' Egg'),
(14, ' semi-sweet chocolate chips'),
(14, ' Semi-sweet chocolate chips.'),
(14, 'Package Chocolate'),
(15, ' Miniature semi-sweet chocolate chips.'),
(15, ' Strawberry jam'),
(15, 'Vanilla ice-cream'),
(16, ' Cornstarch'),
(16, ' Milk'),
(16, ' sugar'),
(16, ' Sweetened whipped cream and M&M\'s (optional). '),
(16, ' vanilla'),
(16, 'Baking cocoa'),
(17, ' Miniature semi-sweet chocolate chips.'),
(17, ' Strawberry jam'),
(17, 'Vanilla ice-cream'),
(18, ' brown sugar.'),
(18, ' Cream Cheese'),
(18, ' Honey'),
(18, ' lime juice'),
(18, ' Plain yogurt'),
(18, 'Pineapple'),
(19, ' orange zest.'),
(19, ' Vanilla pudding'),
(19, ' Whipping Cream'),
(19, 'Strawberries'),
(20, ''),
(21, ''),
(22, ''),
(23, ''),
(24, ''),
(25, ''),
(26, ''),
(27, ''),
(28, ''),
(29, ''),
(30, ''),
(31, ''),
(32, ''),
(33, ''),
(34, ''),
(35, ''),
(36, ''),
(37, ''),
(38, ''),
(39, ''),
(40, ' garlic herb cheese'),
(40, ' tomatoes'),
(40, 'carrot.'),
(40, 'chicken breasts'),
(40, 'cucumber'),
(40, 'lettuce leaves'),
(40, 'tortilas'),
(41, ' all purpose flour'),
(41, ' pepper'),
(41, 'chicken'),
(41, 'eggs'),
(41, 'garlic salt'),
(41, 'oil.'),
(41, 'paprika'),
(41, 'poultry seasoning'),
(42, ' American Cheese'),
(42, ' garlic powder'),
(42, ' olive oil'),
(42, ' Worcestershire sauce'),
(42, 'Beef'),
(42, 'bread.'),
(42, 'butter'),
(42, 'onion'),
(42, 'pepper'),
(43, ' Butter.'),
(43, ' Egg'),
(43, ' Garlic'),
(43, ' Pepper'),
(43, ' Red onion'),
(43, 'Chicken'),
(44, ' Butter'),
(44, ' Garlic'),
(44, ' Red onion'),
(44, ' Rosemary.'),
(44, ' Tomato'),
(44, 'Beef'),
(45, ' Cereals'),
(45, ' Rice'),
(45, ' Soups.'),
(45, 'Vegies'),
(46, ' Egg.'),
(46, 'Beef (all kind)'),
(47, ' onion'),
(47, ' Tomato Sauce.'),
(47, 'Barbeque sause'),
(47, 'cheese'),
(47, 'chicken'),
(47, 'pepper'),
(48, ' Mozzarella Cheese'),
(48, ' Tomato Sauce.'),
(48, 'Flour'),
(49, ' bread flour'),
(49, ' mozzarella cheese'),
(49, 'basil leaves'),
(49, 'olive oil'),
(49, 'oregano'),
(49, 'pepper'),
(49, 'sugar'),
(49, 'tomatoes.'),
(49, 'yeast'),
(50, ' black olives'),
(50, ' garlic'),
(50, 'mozzarella'),
(50, 'mushroom'),
(50, 'red peppers'),
(50, 'spinach.'),
(50, 'tomatoes'),
(51, ' Bread.'),
(51, ' Garlic'),
(51, ' Injera'),
(51, ' Pepper'),
(51, ' Red onion'),
(51, 'Beef'),
(52, ' Mozzarella Cheese'),
(52, ' Tomato Sauce.'),
(52, 'Flour'),
(53, ' Baking powder'),
(53, ' Cornstarch'),
(53, ' Creole seasoning.'),
(53, ' Paprika'),
(53, 'Cod fillets'),
(54, ' Boneless beef strip/ ribeye steaks.'),
(54, ' Worcestershire sauce'),
(54, 'Garlic cloves'),
(55, ''),
(55, ' Garlic'),
(55, ' heavy cream chives'),
(55, ' kosher salt'),
(55, ' olive oil'),
(55, ' paprika'),
(55, ' potato'),
(55, ' red pepper chicken broth'),
(55, ' small leak'),
(55, ' white wine'),
(55, ' yellow onion'),
(55, 'Chicken breasts spanish chorizo'),
(55, 'parsley leaves'),
(56, 'black peeper raddicho'),
(56, 'cherry tomatoes'),
(56, 'green onion marjoram'),
(56, 'Lamb ribs olive oil'),
(56, 'red wine vinegar'),
(56, 'spinach'),
(56, 'thyme'),
(57, ' fresh herbs'),
(57, ' Japanese spice mix'),
(57, 'baby boy choy'),
(57, 'carrot'),
(57, 'chicken broth sesame oil'),
(57, 'Chicken navel orange'),
(57, 'olive oilbutter'),
(58, ' Eggs'),
(58, ' Flour.'),
(58, ' Lemon cake'),
(58, ' Orange gelatin'),
(58, 'Orange juice'),
(59, ' Cream Cheese'),
(59, ' Egg'),
(59, ' semi-sweet chocolate chips'),
(59, ' Semi-sweet chocolate chips.'),
(59, 'Package Chocolate'),
(60, ' blackberries'),
(60, 'black peeper'),
(60, 'cloves vegitable oil'),
(60, 'green onoins'),
(60, 'Lamb ribs pear'),
(60, 'red wine vinegar allspice'),
(61, ' Bay leaf'),
(61, ' Brown rice'),
(61, ' chili powder.'),
(61, ' Italian Seasoning'),
(61, ' Tomato sauce'),
(61, 'Kidney beans'),
(62, ' Mushroom'),
(62, ' Red chili.'),
(62, 'Fresh lime'),
(63, ' courgettes.'),
(63, ' Tomatoes'),
(63, ' Whole wheat lasagna sheets'),
(63, 'Vegetable bouillon'),
(64, ' Italian sausage'),
(64, ' Skim ricotta cheese.'),
(64, 'Zucchini'),
(65, ' Diced Tomatoes'),
(65, ' Garlic'),
(65, ' Hot sauce.'),
(65, 'Kidney beans'),
(66, ' Chili'),
(66, ' Corn powders.'),
(66, ' Garlic'),
(66, ' Ginger'),
(66, ' onions'),
(66, ' Potatoes'),
(66, 'Flour'),
(67, ' Acorn squash.'),
(67, ' Garlic'),
(67, ' olive oil'),
(67, ' Red onion'),
(67, 'Butternut squash'),
(130, ' cabbage'),
(130, ' onion'),
(130, 'pasta');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_delivery`
--

CREATE TABLE `ordered_delivery` (
  `delivery_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_delivery`
--

INSERT INTO `ordered_delivery` (`delivery_id`, `food_id`, `quantity`) VALUES
(6, 41, 2),
(6, 42, 1),
(6, 43, 1),
(7, 41, 3),
(7, 44, 1),
(7, 48, 1),
(8, 45, 1),
(8, 46, 1),
(9, 50, 1),
(9, 51, 1),
(10, 52, 1),
(10, 53, 1),
(11, 61, 1),
(11, 62, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `food_id`, `quantity`) VALUES
(3, 42, 1),
(3, 62, 5),
(6, 2, 2),
(7, 2, 2),
(8, 1, 2),
(8, 2, 2),
(8, 42, 1),
(10, 41, 1),
(10, 42, 1),
(10, 44, 1),
(10, 45, 1),
(10, 46, 1),
(11, 41, 1),
(11, 42, 1),
(11, 44, 1),
(11, 45, 1),
(11, 46, 1),
(12, 1, 1),
(12, 42, 1),
(12, 43, 1),
(12, 44, 1),
(13, 1, 1),
(13, 42, 1),
(13, 43, 1),
(14, 41, 1),
(14, 42, 1),
(14, 43, 1),
(15, 41, 1),
(15, 42, 1),
(15, 43, 1),
(16, 41, 1),
(16, 42, 1),
(16, 43, 1),
(17, 41, 1),
(17, 42, 1),
(17, 43, 1),
(18, 41, 1),
(18, 42, 1),
(18, 43, 1),
(19, 41, 1),
(19, 42, 1),
(19, 43, 1),
(20, 41, 1),
(20, 42, 1),
(20, 43, 1),
(21, 41, 1),
(21, 42, 1),
(21, 43, 1),
(24, 1, 1),
(25, 1, 1),
(26, 1, 1),
(27, 22, 1),
(27, 40, 1),
(27, 41, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ordersfood`
--

CREATE TABLE `ordersfood` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `food_ordered` varchar(1000) NOT NULL,
  `allergy` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `phone` varchar(4) NOT NULL,
  `phone1` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `active_sessions` varchar(90) DEFAULT NULL,
  `user_email` varchar(32) NOT NULL,
  `user_password` varchar(90) NOT NULL,
  `user_grp` varchar(10) NOT NULL DEFAULT 'not admin',
  `email_verification_link` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `user_name`, `active_sessions`, `user_email`, `user_password`, `user_grp`, `email_verification_link`, `email_verified_at`, `code`) VALUES
(1, 'Paulos Teshome', '', 'pt1234@gmail.com', '$2y$10$ylnRBlglwHBhoBqNH5LfquShA3g5uifl6Q.ml06x3B2UF/tVpybKy', 'not admin', '', NULL, 0),
(3, 'Meron Abera', NULL, 'Mer@gmail.com', '$2y$10$FWe9SSF2vOFBOIGg38GlJOvMfxnlhybaoJEPR5IGaAp2CZMddd8dy', 'not admin', '', NULL, 0),
(6, 'pth', NULL, 'pt1234@gmail.com', '$2y$10$ylnRBlglwHBhoBqNH5LfquShA3g5uifl6Q.ml06x3B2UF/tVpybKy', 'not admin', '', NULL, 0),
(9, 'robel', NULL, 'rob@gmail.com', '$2y$10$x90hj/3ksJnV.H8YJAIyw.DcKp9QBP4yx3qj5gFgHildB9GrmPbIG', 'not admin', '', NULL, 0),
(10, 'selome', NULL, 'rberhane383@gmail.com', '$2y$10$LI4Ghhs3DOOgJBDnitU1xeQeR7JZIuULs7/dC4L2KcVB2Inonl396', 'not admin', '', '2022-06-03 13:04:38', 0),
(11, 'yared', NULL, 'yd@gmail.com', '$2y$10$H0WA0s8YBABkh91m6VKKzuYJyNFH1R9/St8VsC0vJK49DLtB69nnu', 'not admin', '', NULL, 0),
(12, 'aman', NULL, 'am@gmail.com', '$2y$10$g/2HY5p3bB3.1bO2rCguj.0O2DoYWr.E/gAh4n5xjJofIr7XzISJm', 'not admin', '', NULL, 0),
(13, 'selam', NULL, 'selam@gmail.com', '$2y$10$UBLBwfrdnUaAzg9pMQPv2.EFIUnlxu4Zr0IQDJ4aN0Zq3fhKLVS86', 'not admin', '', NULL, 0),
(14, 'trial3', NULL, 't@gmail.com', '$2y$10$ppuIdkUTxhKODsPRGqa.A.WcquZOp6OyE6BQSiKBLgWXQZU5iGL1i', 'not admin', '', NULL, 0),
(16, 'Okitta Ongaye', 'atcrj0i4jn41pj4pt5k6an70m8', 'ok@gmail.com', '$2y$10$qtIL/0DlOV3tSztt/fvAFelti/T4aDvRDqeuTzxz3HwnirD5VpEW.', 'admin', '', '2022-06-07 22:34:05', 0),
(32, 'neww', NULL, 'rob@gmail.com', '$2y$10$7lZ2S2mPddXllvTiHcBej.GV7CihzZBHE4mLboC7n3uVfLU2RhHPu', 'not admin', '1a2e0a73e4cad4c46900d5bb8e12b07d', NULL, 3778),
(38, 'newer', NULL, 'pteshome2136@gmail.com', '$2y$10$zOacbt4E.7/8t3lpqgCp..mwEXJAkdaWaZPk3KvG8lGWRWFY4tOEu', 'not admin', 'd5092d1d0eff2e1b1f82ab7d6378a584', NULL, 0),
(40, 'newest', NULL, 'pteshome2136@gmail.com', '$2y$10$5X2r4IG4EJ2rQcd6gdhGre8WxrkFsTbB5xw3OlEkv.AypYC6NgkUy', 'not admin', 'd334f280e853e8ded31660381e88ae40', NULL, 0),
(41, 'me', NULL, 'rberhane383@gmail.com', '$2y$10$WoqWxC3qgMc0NBMYn17cEOzK1tyw9Ok6oXjlfj7Kxqtw0zaGIERBi', 'not admin', 'cc6d85046496746a411567c883b3a715', NULL, 0),
(42, 'newwww', NULL, 'rberhane383@gmail.com', '$2y$10$vuzHBo.6IVgNMI4rAL3jEOaNkESVTO7yi8JctEciJWFQFROq6rY5W', 'not admin', '176b62c3716da0c9064906ba519e0f96', NULL, 0),
(43, 'ssss', NULL, 'rberhane383@gmail.com', '$2y$10$UKmrGaf1g8m4LZyUv01fau0shvtpaPVOmS3aMJHDVi2yyNDeY7YiS', 'not admin', '8103292f50e56c08ea7ea3177d4727a1', NULL, 0),
(45, 'pttt', NULL, 'rberhane383@gmail.com', '$2y$10$wY50cU4aTKuHOdxzEDHfgugkPnWiXXlV.2JozeIn9DpxCPfgFD.jG', 'not admin', 'caa947475fecdc7545b3b532d3b34441', NULL, 0),
(46, 'paul tesh', NULL, 'pteshome2136@gmail.com', '$2y$10$47h5cf4ngiGzcrEE072dgOEfEwNdv2OSDWRdkeG6dDU4bgOlJ3gZW', 'not admin', 'f90fa0e50e66459629738ce8dc1ad6ea', '2022-06-06 21:20:04', 2913),
(47, 'Rediet Berhane', NULL, 'rberhane383@gmail.com', '$2y$10$AI4DSM//Z.42o1vcln7Mg.6lLFGHdQ4umx2FipshBh4Q4LoWkuWdq', 'admin', 'zxwfa0e50e66459629738ceewc1ad6ea', '2022-06-04 22:40:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `occasion` varchar(50) NOT NULL,
  `number_of_people` int(2) NOT NULL,
  `phone1` varchar(5) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `account_number` varchar(15) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `room` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tablereservation`
--

CREATE TABLE `tablereservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `position` varchar(20) NOT NULL,
  `table_type` varchar(20) NOT NULL,
  `car_parking` varchar(5) NOT NULL,
  `number_of_people` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `account_number` varchar(15) NOT NULL,
  `reserved` tinyint(1) NOT NULL,
  `table_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_info`
--

CREATE TABLE `table_info` (
  `table_number` int(11) NOT NULL,
  `table_type` varchar(30) NOT NULL,
  `position` varchar(10) NOT NULL,
  `table_state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_info`
--

INSERT INTO `table_info` (`table_number`, `table_type`, `position`, `table_state`) VALUES
(1, 'Mysteria Table', 'Outdoor', 0),
(2, 'Dinner Table', 'Roof top', 0),
(3, 'Family Table', 'Indoor', 0),
(4, 'Candle Table', 'Indoor', 0),
(5, 'Mysteria Table', 'Roof top', 0),
(6, 'Dinner Table', 'Indoor', 0),
(7, 'Family Table', 'Outdoor', 0),
(8, 'Candle Table', 'Outdoor', 0),
(9, 'Mysteria Table', 'Indoor', 0),
(10, 'Dinner Table', 'Indoor', 0),
(11, 'Family Table', 'Outdoor', 0),
(12, 'Candle Table', 'Roof top', 0),
(13, 'Mysteria Table', 'Outdoor', 1),
(14, 'Dinner Table', 'Outdoor', 0),
(15, 'Family Table', 'Roof top', 0),
(16, 'Candle Table', 'Indoor', 0),
(17, 'Mysteria Table', 'Indoor', 0),
(18, 'Dinner Table', 'Indoor', 0),
(19, 'Family Table', 'Outdoor', 0),
(20, 'Candle Table', 'Roof top', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`food_id`),
  ADD KEY `foodCart` (`food_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`food_id`,`ingredient_name`);

--
-- Indexes for table `ordered_delivery`
--
ALTER TABLE `ordered_delivery`
  ADD PRIMARY KEY (`delivery_id`,`food_id`),
  ADD KEY `foodDelivFK` (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`,`food_id`),
  ADD KEY `foodFK` (`food_id`);

--
-- Indexes for table `ordersfood`
--
ALTER TABLE `ordersfood`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reserving_user` (`user_id`);

--
-- Indexes for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Table_numFK` (`table_number`);

--
-- Indexes for table `table_info`
--
ALTER TABLE `table_info`
  ADD PRIMARY KEY (`table_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `ordersfood`
--
ALTER TABLE `ordersfood`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tablereservation`
--
ALTER TABLE `tablereservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_info`
--
ALTER TABLE `table_info`
  MODIFY `table_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `foodCart` FOREIGN KEY (`food_id`) REFERENCES `foodmenu` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userFoodCart` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivOrdering_user` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `ingredFk` FOREIGN KEY (`food_id`) REFERENCES `foodmenu` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordered_delivery`
--
ALTER TABLE `ordered_delivery`
  ADD CONSTRAINT `delivFK` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`delivery_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `foodDelivFK` FOREIGN KEY (`food_id`) REFERENCES `foodmenu` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `foodFK` FOREIGN KEY (`food_id`) REFERENCES `foodmenu` (`food_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orderFK` FOREIGN KEY (`order_id`) REFERENCES `ordersfood` (`order_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ordersfood`
--
ALTER TABLE `ordersfood`
  ADD CONSTRAINT `ordering_user` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reserving_user` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tablereservation`
--
ALTER TABLE `tablereservation`
  ADD CONSTRAINT `TReserving_user` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `table_num_fk` FOREIGN KEY (`table_number`) REFERENCES `table_info` (`table_number`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
