SELECT count(title) AS "Number of 'western' movies"  
    FROM movies 
        JOIN genres 
            ON  movies.genre_id = genres.id 
        JOIN producers 
            ON  movies.producer_id = producers.id
    WHERE genres.name = "western" 
        AND (producers.name = "tartan movies" OR producers.name = "lionsgate uk");