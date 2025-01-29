<?php

-- # Как я понял в данном задании не надо писать функций на php, для решения данной задачи,
-- # а достаточно будет только sql запросов:

DELETE FROM products -- сначала надо исправить ошибку с товарами, которых нет в наличии, так как в будущем надо будет убирать категории у которых нет товаров
WHERE id NOT IN (SELECT product_id FROM availabilities); -- удаляем товары по id, которых нет в списке "айдишников" в наличии

DELETE FROM categories -- удаляем категории по id, которых нет в списке "айдишников" товаров (так как после 1 запроса у нас все товары которые есть в наличии)
WHERE id NOT IN (SELECT category_id FROM products);

DELETE FROM stocks -- удаляем склады по id, которых нет в списке "айдишников" в наличии
WHERE id NOT IN (SELECT stock_id FROM availabilities);