# Transaction Database

This project uses MySQL, HTML and PHP to create a website and database for sale of products. 

The university server used to run the website and database is now defunct. 

Database: 20163079.sql  
Webpages: BuyingTransaction.php, NewArriving.php

## Database tables:
* customers:
	* cid (primary)
	* username
	* lastName
	* firstName
	* phone
	* address
* orders:
	* oid (primary)
	* cid
* products:
	* pid (primary)
	* name
	* price
	* stock
* invoices:
	* oid and pid (primary key)
	* quantity bought

## SQL Queries
``` SQL
/* Query 1: What SQL query will produce the row of customer 
information who have made three or more successful orders 
from this shop? */
select c.* from customers c, orders o
where c.cid = o.cid
group by o.cid
having count(o.oid) >= 3;

/* Query 2: What SQL query will produce the row of customer 
information who have spent $500 or more in total in this 
shop? */
select c.* from customers c, orders o, invoices i, products p 
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid 
group by c.cid 
having sum(i.quantity*p.price)>=500;

/* Query 3: What SQL query will list the product information 
where no customers bought this product before? */
select * from products p
where p.pid not in 
(select i.pid from invoices i);

/* Query 4: What SQL query will list the product information 
where only one customer bought this product before? */
select p.* from customers c, orders o, invoices i, products p 
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid 
group by p.pid 
having count(c.cid)=1;

/* Query 5: What SQL query will list the total number of 
customer orders per product in the database? */
select p.pid, count(o.oid) 
from orders o join invoices i on (o.oid = i.oid)
right join products p on (i.pid = p.pid) 
group by p.pid;

/* Query 6: What SQL Query will produce the total amount of 
the sold products in the database? */
select sum(quantity) from invoices;


/* Query 7: Write a function CostOfBestBuyers(number INT) 
Return Double that returns the total price of the top number 
of customers who spent in this shop. For instance, if number 
=5, the returned price is the total cost of the 5 customers 
who spent the most in this shop. */
drop function if exists CostOfBestBuyers;
delimiter ++
create function CostOfBestBuyers(n INT) Returns DOUBLE
begin
declare total DOUBLE;
select sum(s.summing) from (
select sum(i.quantity*p.price) as summing 
from customers c, orders o, invoices i, products p  
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid  
group by c.cid order by summing desc limit n
) as s into total;
return total;
end++
delimiter ;

/* Query 8: Create a view BuyerCostPerProduct with columns 
Customer ID, Customer Name, Product ID, Product Name, Date 
which provides a more accessible way for the DB user to run 
queries regarding customers and products. The date is the 
time to produce the view. In other words, the virtual table 
view maintains each buyer’s cost for each product by a view 
generation date. */
drop view if exists BuyerCostPerProduct;
create view BuyerCostPerProduct as 
select c.cid as 'Customer ID', c.username as 'Customer Name',
p.pid as 'Product ID', p.name as 'Product Name', 
sum(i.quantity*p.price) as 'Cost',  current_date() as 'Date'
from invoices i, customers c, orders o, products p 
where i.pid = p.pid and i.oid = o.oid and o.cid = c.cid 
group by c.cid, p.pid order by c.cid, p.pid;
```

## CITS1402 Relational Database Management Systems
This is a student project from the course CITS1402  Relational Database Management Systems the University of Western Australia Semester 2, 2017. 
