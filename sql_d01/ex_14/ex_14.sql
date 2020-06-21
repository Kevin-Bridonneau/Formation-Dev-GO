SELECT COUNT(title) AS 'Number of movies that starts with "eX"' 
    FROM movies
    WHERE title LIKE BINARY'eX%';

