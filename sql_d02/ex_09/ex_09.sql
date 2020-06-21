SELECT title, min_duration 
        FROM movies
        ORDER BY CHAR_LENGTH(title) DESC,
        min_duration ASC;