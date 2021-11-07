DROP DATABASE IF EXISTS dan_anbrews;

CREATE DATABASE dan_anbrews;

USE dan_anbrews;

CREATE TABLE product_info(
    productId int (5) NOT NULL AUTO_INCREMENT,
    product_type char(20) NOT NULL,
    product_name char(40)NOT NULL,
    product_price int(3) NOT NULL,
    product_descr text NOT NULL,
    product_page_detail text NOT NULL,
    product_image_dir char(100),
    PRIMARY KEY (productID)
);

CREATE TABLE user_info(
    userId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fName char(20) ,
    lName char(20) NOT NULL,
    phone_number varchar(8) NOT NULL,
    email char(20) not NULL,
    address char(20) NOT NULL,
    city char(20) NOT NULL,
    zip_code int(4) NOT NULL
);

CREATE TABLE payment_info(
    paymentId int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userId int(5)NOT NULL,
    card_name char(20) NOT NULL,
    card_number int(15) NOT NULL,
    cvv int(3) NOT NULL,
    expiration_date char(8) NOT NULL,
    FOREIGN KEY (userId) REFERENCES user_info(userId) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE order_details(
    orderId int (5) NOT NULL AUTO_INCREMENT,
    productId int(5) NOT NULL,
    quantity int(2) NOT NULL,
    PRIMARY KEY (orderId),
    FOREIGN KEY (productId) REFERENCES product_info(productId) ON UPDATE CASCADE ON DELETE NO ACTION
);

CREATE TABLE orders(
    orderId int(5),
    paymentId int(5) NOT NULL,
    userId int(5) NOT NULL,
    FOREIGN KEY (orderId) REFERENCES order_details(orderId) ON UPDATE CASCADE ON DELETE NO ACTION,
    FOREIGN KEY (paymentId) REFERENCES payment_info(paymentId) ON UPDATE CASCADE ON DELETE NO ACTION,
    FOREIGN KEY (userId) REFERENCES user_info(userId) ON UPDATE CASCADE ON DELETE NO ACTION
);


CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON dan_anbrews.Task TO dbadmin@localhost;



insert into user_info(fname, lname, phone_number, email, address, city, zip_code)values("James", "Ide", 133, "test@gmail.com", "Home", "Adelaide", 5155);
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("1", "Beer", "Corona Beer", 23, "355ml, 6 pack", "Corona is famous around the world for its smooth, refreshing taste. It displays a well-rounded character with pleasant malt and hop aromas. Garnish your Corona beer traditionally with a lime wedge to heighten the citrus aromas and flavours.", "img/corona.webp");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("2", "Beer", "Cricketers Pale Ale", 28, "375ml, 10 pack", "Brewed in Melbourne with our signature Amarillo hop, revealing complex, yet subtle tropical flavours.", "img/cricketers.webp");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("3", "Vodka", "Cruiser", 17, "275ml, 4 pack", "One of Australia's favourite premixes, Vodka Cruiser have a new and exciting look. Lush Guava is a delicious mix of triple distilled genuine Vodka and natural Guava flavours to deliver a thirst quenching flavour sensation.", "img/cruiser.png");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("4", "Beer", "West End", 19, "375ml, 6 pack", "A favourite with generations of South Australians this well-balanced beer with a clean hop bitterness is an outstanding example of an Australian draught Lager.", "img/westend.jpg");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("5", "Wine", "Yellowglen Yellow", 36, "750ml, 6 pack", "Yellowglen, a veteran market leader, always made in the style of a soft, fleshy, flavour-driven wine. Yellow Brut Cuvée is very accessible and friendly drinking with or without accompaniment. Classically inspired, Yellowglen Yellow is crisp and elegant with dry, refined flavours. A burst of melon and citrus with a dry finish.", "img/yellow.png");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("6", "Wine", "Penfolds Bin 389", 95, "750ml, individual", "Bin 389 is often referred to as ‘Baby Grange’, in part because components of the wine are matured in the same barrels that held the previous vintage of Grange. First made in 1960, this was the wine that helped forge Penfolds reputation with red wine drinkers by combining the structure of Cabernet Sauvignon with the richness of Shiraz.
Bright, crimson red colour. A lifted, fragrant nose of rich dark fruit carries through to the palate, which features a balance of sweetness from the Cabernet and savouriness from the Shiraz. Oak and tannins present but not demanding.
Peak drinking: 2023-2050", "img/penfolds.png");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("7", "Beer", "Great Northern", 18, "330ml, 6 pack", "The Great Northern Brewing Company Super Crisp Lager has been created by Queenslanders, for Queenslanders. They have brought together local brewers, industry identities and beer lovers to help create the perfect Queensland brew, one that captures the Queensland adventure of sun, sand and fishing.", "img/greatnorthern.png");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("8", "Beer", "Victoria Bitter", 21, "375ml, 6 pack", "The 'Big Cold Beer', Victoria Bitter has long been Australia's favourite beer. The great taste brewed to deliver full-bodied flavour when ice cold, will quench any hard earned thirst.", "img/vb.webp");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("9", "Beer", "Guinness", 23, "440ml, 6 pack", "Guinness's key ingredients are two centuries of glorious brewing craft, roasted malt barley for extra flavour, and twice as many hops for a richer taste. No preservatives. No additives. Just 100% natural, pure ingredients to create the unique flavour of Guinness and the creamy, velvety head that lasts the whole beer through.", "img/guiness.png");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("10", "Beer", "Coopers Sparkling Ale", 22, "375ml, 6 pack", "Australian made and owned. Coopers Sparkling Ale is brewed and fermented using a unique method of top fermentation and natural bottle conditioning. Coopers are famous for this process which leaves a natural residue of yeast during maturation and gives a cloudy appearance with an enhanced flavour. No additives, no preservatives.", "img/sparklingale.png");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("11", "Cider", "The Hills Apple Cider", 21, "330ml, 6 pack", "In 2010, The Hills Cider Company launched with the goal of producing Australia's best ciders. Their passionate search for the highest quality fruit lead them to vastly experienced fruit growers of Adelaide Hills. Made from 100% Adelaide Hills Apples, the vanilla, lime sherbet characters shine through the palate on a crisp acid backbone. The team has crafted a well balanced, complex cider with a clean dry finish.", "img/hillscider.png");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("12", "Cider", "Somersby Apple Cider", 20, "330ml, 10 pack", "Somersby Apple Cider is an invigorating and refreshing cider made from quality fermented apple juice and natural apple flavouring. There are no artificial sweeteners, flavours or colourings used in the making of this premium cider whose unique taste makes it a tasty and natural choice for the relaxed moments with your friends.", "img/somersby.webp");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("13", "Beer", "Coopers Pale Ale", 20, "375ml, 6 pack", "This is the beer that inspired a new generation of ale drinkers. With its fruity and floral characters, balanced with a crisp bitterness, Coopers Pale Ale has a compelling flavour which is perfect for every occasion. Naturally fermented in the Burton-upon-Trent style, a secondary fermentation creates the trademark sediment that gives 'Pale' its fine cloudy appearance.", "img/paleale.webp");
insert into product_info(productId, product_type, product_name, product_price, product_descr, product_page_detail, product_image_dir) values ("14", "Vodka", "Smirnoff", 43, "375ml, 10 pack", "Smirnoff Ice Double Black cans have a refreshing and extra strong blend of Smirnoff Vodka and tangy citrus flavoured soda. A modern tribute to the traditional standards established by Smirnoff and now conveniently packaged in 10 packs, Smirnoff Black is perfect for parties or sharing with great friends.", "img/smirnoff.png")

