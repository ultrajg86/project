CREATE DATABASE tradedb;

USE tradedb;

CREATE TABLE users(
idx INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '일련번호',
user_id VARCHAR(20) NOT NULL DEFAULT '' COMMENT '사용자아이디',
user_pwd VARCHAR(50) NOT NULL DEFAULT '' COMMENT '비밀번호',
user_name VARCHAR(20) NOT NULL DEFAULT '' COMMENT '이름',
token VARCHAR(100) NOT NULL DEFAULT '' COMMENT '접속유효토큰',
level INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '권한',
reg_date DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
PRIMARY KEY(idx),
UNIQUE KEY (user_id),
KEY token(token)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COMMENT='사용자';

INSERT INTO users SET user_id='admin', user_pwd=password('1111'), user_name='관리자', token='', level='100', reg_date=NOW();

CREATE TABLE geo_position(
idx INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '일련번호',
users_idx INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '사용자번호',
map_type INT UNSIGNED NOT NULL DEFAULT '1' COMMENT '1:구글,2:네이버',
latitude DOUBLE NOT NULL DEFAULT '0' COMMENT '위도',
longitude DOUBLE NOT NULL DEFAULT '0' COMMENT '경도',
wait_time DOUBLE NOT NULL DEFAULT '0' COMMENT '머문시간 microtime',
reg_date DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
PRIMARY KEY(idx),
KEY map_type(map_type),
KEY latitude(latitude),
KEY longitude(longitude),
KEY reg_date(reg_date)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 COMMENT='사용자위치정보';