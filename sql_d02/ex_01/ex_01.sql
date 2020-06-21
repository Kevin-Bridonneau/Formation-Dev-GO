SELECT count(id) AS "Number of members" ,
        ROUND(AVG(YEAR(CURDATE()) - YEAR(birthdate))) AS "Average age"
        FROM profiles;