# Widgets Laravel Demo
Project for demo purposes only.  
# Queries
``` 
SELECT * FROM widgetstore.trans_histories
where user_id  = 1  
and created_at >= MONTH(CURDATE())
```

```
with cte as (
SELECT 
widget_name, 
count(widget_name) as 'count'
FROM widgetstore.carts
group by widget_name )
select * from cte 
order by count DESC 
```
