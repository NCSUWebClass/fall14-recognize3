SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS answers (
id int(11) NOT NULL,
  img_src varchar(200) NOT NULL,
  gallery_id int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

INSERT INTO answers (id, img_src, gallery_id) VALUES
(1, 'http://imgur.com/LnAowS0.png', 1),
(2, 'http://imgur.com/bjyUj2d.png', 1),
(3, 'http://imgur.com/xWBW1r6.png', 1),
(4, 'http://imgur.com/uPWqwz6.png', 1),
(5, 'http://imgur.com/KlQKthZ.png', 1),
(6, 'http://imgur.com/UK2S823.png', 1),
(7, 'http://imgur.com/r15wc.png', 1),
(8, 'http://imgur.com/kMTot5B.png', 1),
(9, 'http://imgur.com/mh18q.png', 3),
(10, 'http://imgur.com/Ed4rG.png', 3),
(11, 'http://imgur.com/VKq4ME2.png', 3),
(12, 'http://imgur.com/6fVfanE.png', 3),
(13, 'http://imgur.com/hFibT.png', 3),
(14, 'http://imgur.com/A9sTnQ2.png', 3);

CREATE TABLE IF NOT EXISTS galleries (
id int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  description varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO galleries (id, name, description) VALUES
(1, 'Dogs', 'Different types of dogs'),
(3, 'Cars', 'Pictures of awesome cars');

CREATE TABLE IF NOT EXISTS questions (
id int(11) NOT NULL,
  img_src varchar(200) NOT NULL,
  answer_id int(11) NOT NULL,
  gallery_id int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO questions (id, img_src, answer_id, gallery_id) VALUES
(1, 'http://imgur.com/rQwz0K5', 1, 1);


ALTER TABLE answers
 ADD PRIMARY KEY (id);

ALTER TABLE galleries
 ADD PRIMARY KEY (id), ADD UNIQUE KEY `name` (`name`);

ALTER TABLE questions
 ADD PRIMARY KEY (id);


ALTER TABLE answers
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
ALTER TABLE galleries
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE questions
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;