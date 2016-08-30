SELECT * FROM users
		LEFT JOIN appointments on appointments.user_id = users.id
        WHERE appointments.date = CURDATE()
		GROUP BY users.id
        ;