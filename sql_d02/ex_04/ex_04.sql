SELECT LEFT(summary, 92) AS "Summaries" 
    FROM movies 
    WHERE id%2 = 0 
    AND id  BETWEEN 42 AND 84 ;