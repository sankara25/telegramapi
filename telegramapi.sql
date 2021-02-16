CREATE DATABASE IF NOT EXISTS telegramapi; 

CREATE TABLE IF NOT EXISTS telegramapi.telegram_api 
	(
     	ta_id INT(11) PRIMARY KEY AUTO_INCREMENT,
        bot_token VARCHAR(150),
        bot_id VARCHAR(30),
        first_name VARCHAR(30),
        username VARCHAR(30),
        unique(bot_token)
     );