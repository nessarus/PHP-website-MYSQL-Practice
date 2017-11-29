-- Part 1: Commercial shop
	-- customers:
		-- cid (primary)
		-- username
		-- lastName
		-- firstName
		-- phone
		-- address
	-- orders:
		-- oid (primary)
		-- cid
	-- products:
		-- pid (primary)
		-- name
		-- price
		-- stock
	-- invoices:
		-- oid and pid (primary key)
		-- quantity bought

-- Q1 
select c.* from customers c, orders o
where c.cid = o.cid
group by o.cid
having count(o.oid) >= 3;

-- Q2
select c.* from customers c, orders o, invoices i, products p 
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid 
group by c.cid 
having sum(i.quantity*p.price)>=500;

-- Q3
select * from products p
where p.pid not in 
(select i.pid from invoices i);

-- Q4
select p.* from customers c, orders o, invoices i, products p 
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid 
group by p.pid 
having count(c.cid)=1;

-- Q5
select p.pid, count(o.oid) 
from orders o join invoices i on (o.oid = i.oid)
right join products p on (i.pid = p.pid) 
group by p.pid;

-- Q6
select sum(quantity) from invoices;


-- Q7 
create procedure CostOfBestBuyers(n INT, OUT total DOUBLE) 
select sum(s.summing) from (
select sum(i.quantity*p.price) as summing 
from customers c, orders o, invoices i, products p  
where c.cid = o.cid and o.oid = i.oid and i.pid = p.pid  
group by c.cid order by summing desc limit n
) as s
into total;

-- Q8
-- Create a view BuyerCostPerProduct with columns 
-- Customer ID, Customer Name, Product ID, Product Name, Cost, Date 
create view BuyerCostPerProduct as 
select c.cid as 'Customer ID', c.username as 'Customer Name',
p.pid as 'Product ID', p.name as 'Product Name', 
sum(i.quantity*p.price) as 'Cost',  current_date() as 'Date'
from invoices i, customers c, orders o, products p 
where i.pid = p.pid and i.oid = o.oid and o.cid = c.cid 
group by c.cid, p.pid order by c.cid, p.pid;

-- Part 3: Database Driven Web Site Development 
-- Task 3.1 New Arriving Product Submission Web Page

-- NewArriving is a form for inserting new products
NewArriving.php
including HTML form part and PHP part.
pid as product code
name as product name
quantity --will have to ask around

-- BuyingTransaction is a form for customer to buy products
-- need to calculate total order and print if there is not enough
-- quantity of product available. "order not successful" 
-- print successful order on completion of transaction.
-- not enough quantity, print failed transaction and availiable 
-- quantity.
-- form to register customer as a user.
BuyingTransaction.php
c.username as username
c.phone as phone number
c.address as address


