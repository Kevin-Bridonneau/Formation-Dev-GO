UPDATE movies 
    SET producer_id = (SELECT t.id 
                       FROM (SELECT producers.id,producers.name,COUNT(producer_id) AS 'count' 
                             FROM movies 
                             INNER JOIN producers ON movies.producer_id=producers.id 
                             GROUP BY producer_id) AS t 
                       WHERE t.name LIKE '%film' ORDER BY t.count LIMIT 1) 
    WHERE producer_id IS NULL;