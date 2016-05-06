-- -----------------------------------
-- INSERTING VALUES IN table users --
-- -----------------------------------
INSERT INTO users (username, password,email,active, role) 
VALUES	("user1", "parola","mihai@gmail.com",true, 1),
		("user2", "parola","cioban@gmail.com",true, 1),
		("user3", "parola","gulas@gmail.com",false, 1),
		("user4", "parola","robert@gmail.com",true, 1),
		("user5", "parola","iarut@gmail.com",true, 1);

-- -----------------------------------
-- INSERTING VALUES IN table rooms --
-- -----------------------------------
INSERT INTO rooms (name, capacity) 
VALUES	("S01", 100),
		("S02", 123),
        ("S03", 45),
        ("A01", 421),
        ("A02", 15);
        
        
-- ------------------------------------
-- INSERTING VALUES IN table movies --
-- ------------------------------------
INSERT INTO movies (title, year, cast, duration, poster, link_imdb)
VALUES ("Romeo and Julieta", 1996, "Romeo,Julieta", 2, "posterRomeoSiJulieta", "http://www.imdb.com/title/tt0117509/"),
	   ("Batman vs Superman	", 2016, "Batman,Superman", 2, "posterBatmanVsSuperman", "http://www.imdb.com/title/tt5602908/?ref_=fn_al_tt_2");
       
       
-- ------------------------------------
-- INSERTING VALUES IN table genres --
-- ------------------------------------
INSERT INTO genres (name) 
VALUES	("Comedy"),
		("Action"),
        ("Drama"),
        ("SF"),
        ("Thriler");
        


       