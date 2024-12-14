CREATE TABLE foods (
    foodname VARCHAR(255) PRIMARY KEY,
    foodamount DECIMAL(10, 2),
    foodimagelocation VARCHAR(255),
    ingredients TEXT
);


CREATE TABLE placeorder (
    id INT AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(255) NOT NULL,
    delivery_date DATE NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL
);


INSERT INTO foods (foodname, foodamount, foodimagelocation, ingredients)
VALUES
    ('Dates', 3.99, 'food/Dates.jpg', 'Dates, Nuts, Honey'),
    ('Halwa', 4.49, 'food/Halwa.jpg', 'Semolina, Ghee, Sugar, Nuts'),
    ('Harees', 5.99, 'food/Harees.jpg', 'Wheat, Meat, Spices'),
    ('Kahwa', 2.99, 'food/Kahwa.jpg', 'Green Tea, Saffron, Cardamom'),
    ('Laban', 1.99, 'food/Laban.jpg', 'Yogurt, Water, Salt'),
    ('Mahuai', 6.49, 'food/Mahuai.jpg', 'Fish, Spices, Coconut Milk'),
    ('Majboos', 7.99, 'food/Majboos.jpg', 'Rice, Meat, Spices'),
    ('Mishkak', 8.99, 'food/Mishkak.jpg', 'Skewered Meat, Spices'),
    ('Mushaltat', 3.49, 'food/Mushaltat.jpg', 'Dough, Meat, Spices'),
    ('OmaniBread', 1.49, 'food/OmaniBread.jpg', 'Flour, Water, Yeast'),
    ('Shawarma', 6.99, 'food/Shawarma.jpg', 'Meat, Pita Bread, Vegetables, Sauce'),
    ('Shuwa', 10.99, 'food/Shuwa.jpg', 'Marinated Meat, Banana Leaves');