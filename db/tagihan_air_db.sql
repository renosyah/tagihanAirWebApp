CREATE TABLE user(
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name TEXT,
    username TEXT,
    password TEXT,
    auth_key TEXT,
    token TEXT,
    type_user INT
);

INSERT INTO user (id,name,username,password,auth_key,token,type_user) VALUES (1,'reno','renosyah','12345','auth_key-01','token-01',0);
INSERT INTO user (id,name,username,password,auth_key,token,type_user) VALUES (2,'wawan','wawan','12345','auth_key-02','token-02',1);
INSERT INTO user (id,name,username,password,auth_key,token,type_user) VALUES (3,'robi','robi','12345','auth_key-03','token-03',1);
