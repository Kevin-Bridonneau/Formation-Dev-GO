SELECT SUM(prod_year) AS "Sum prod_year"
    FROM (
        SELECT prod_year 
        FROM movies 
        GROUP BY prod_year
        )AS X;