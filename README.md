Shopping Cart API Example
=========================

An example for a shopping cart API. According with specifications we have the next nouns, verbs and database schema.

Idenfified Nouns:
----------------
* Cart
* Customer
* Seller
* Payment
* Product
* Order 

Idenfified verbs:
----------------
* Create a new cart
* Remove an existing cart
* Put products into cart
* Remove products from cart
* Calculate total amount
* Calculate amount by seller
* Place an order
* Notify the customer when order is placed
* Notify the seller when order is placed

Database schema:
---------------
![Database Schema](https://image.ibb.co/iBLGwy/promofarma_db.png)

Requirements
------------

* PHP 7.1
* MySQL Database

How to run code
---------------

Go to docker folder an execute:

    $ ./shop.sh update

Once finished, enter in container and run the next command to generate database, schema and fixtures:

    $ docker exec -it promofarma_shop_apache2 bash
    $ composer install
    $ bin/console doctrine:database:drop --force
    $ bin/console doctrine:database:create
    $ bin/console doctrine:schema:create
    $ bin/console doctrine:fixtures:load --purge-with-truncate

Now you can check the API Documentation in the browser:

Go to [http://localhost/doc](http://localhost/doc)
