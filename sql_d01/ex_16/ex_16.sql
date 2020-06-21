SELECT DATE_FORMAT(birthdate, "%M") AS "month of birth"
    FROM profiles	 
    ORDER BY id
	BETWEEN 42 AND 84;
