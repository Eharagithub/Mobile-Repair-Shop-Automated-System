CREATE TABLE customer (
  nic varchar(20) NOT NULL,
  name varchar(100) NOT NULL,
  address varchar(250) NOT NULL,
  phone1 varchar(100) NOT NULL,
  phone2 varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  PRIMARY KEY (nic)
);

INSERT INTO `customer` (`nic`, `name`, `address`, `phone1`, `phone2`, `email`) VALUES
('199632458123', 'kebuni', 'matara', '0771234567', '0711234567', 'kebuni@gmail.com'),
('200012345678', 'Dasuni', 'Kadawatha', '1703633667', '0173633667', 'kebuni@gmail.com'),
('200041300147', 'kanchana', 'panadura', '0114563698', '0740231478', 'kanchana@gmail.com'),
('200145821361', 'upani', 'nugegoda', '0774582361', '0712596324', 'upani@gmail.com'),
('200176800124', 'Lakna', 'Kurunagala', '0748965321', '0789632258', 'lak@gmail.com');

CREATE TABLE delivery (
  empNo int NOT NULL,
  nic varchar(20) NOT NULL,
  dname varchar(100) NOT NULL,
  daddress varchar(250) NOT NULL,
  phone varchar(100) NOT NULL,
  email varchar(100) DEFAULT NULL,
  PRIMARY KEY (empNo)
);

INSERT INTO `delivery` (`empNo`, `nic`, `dname`, `daddress`, `phone`, `email`) VALUES
(1, '199845235711', 'Suresh', 'Kottawa', '0714523651', 'sureshcharuka@gmail.com'),
(2, '199912348564', 'Poornima', 'Mount Lavinia', '0778967125', 'poornima@gmail.com');

CREATE TABLE inquries (
  mid int NOT NULL AUTO_INCREMENT,
  fullname varchar(255) NOT NULL,
  contact int NOT NULL,
  email varchar(255) NOT NULL,
  message varchar(255) NOT NULL,
  status int NOT NULL,
  date datetime NOT NULL,
  isOpened char(1) NOT NULL,
  PRIMARY KEY (mid)
); 

CREATE TABLE location (
  locid int NOT NULL AUTO_INCREMENT,
  lname varchar(100) NOT NULL,
  laddress varchar(250) NOT NULL,
  phone1 varchar(100) NOT NULL,
  phone2 varchar(100) DEFAULT NULL,
  email varchar(100) NOT NULL,
  PRIMARY KEY (locid)
);


INSERT INTO `location` (`locid`, `lname`, `laddress`, `phone1`, `phone2`, `email`) VALUES
(1, 'HO', 'Colombo', '123456', '12345', 'ho@gmail.com'),
(2, 'Kurunagala', 'Malwaththa Rd Kurunagala', '0372283309', '0774152369', 'kmrskurunagala@gmail.com'),
(3, 'Kandy', 'Main street Kandy', '0812388693', '0774152908', 'kmrskandy@gmail.com'),
(4, 'Rathnapura', 'Kuruwita ,Rathnapura', '0749632545', '0778963654', 'kmrsrathnapura@gmail.com');

CREATE TABLE services (
  sid int NOT NULL AUTO_INCREMENT,
  service varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  cost float(10) NOT NULL,
  date datetime NOT NULL,
  PRIMARY KEY (sid)
);

INSERT INTO `services` (`sid`, `service`, `description`, `cost`, `date`) VALUES
(1, 'Diagnosing of Issues', 'Diagnosing of errors for better use', 2500, '2023-10-01'),
(2, 'Software Installation', 'Insertion of softwares for all devices', 2500, '2023-10-02'),
(3, 'Phone Setting', 'Setting up the phone for proper usage', 2500, '2023-10-01'),
(4, 'Phone Unlock', 'Unlocking of accidentally locked phones', 2500, '2023-10-02');

CREATE TABLE item (
  itemCode varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  stock int NOT NULL,
  cost float(10) NOT NULL,
  unit varchar(255) NOT NULL,
  sellingPrice float(10) DEFAULT NULL,
  PRIMARY KEY (itemCode)
);

INSERT INTO `item` (`itemCode`, `name`, `stock`, `cost`, `unit`, `sellingPrice`) VALUES
('1', 'battery', 50, 500, 'Samsung', 1500),
('2', 'display', 45, 1000, 'Samsung', 1500);

CREATE TABLE technician (
  empNo int NOT NULL,
  nic varchar(20) NOT NULL,
  tname varchar(100) NOT NULL,
  taddress varchar(250) NOT NULL,
  phone varchar(100) NOT NULL,
  email varchar(100) DEFAULT NULL,
  PRIMARY KEY (empNo)
) ;


INSERT INTO `technician` (`empNo`, `nic`, `tname`, `taddress`, `phone`, `email`) VALUES
(1, '199625369789', 'Saman', 'Kurunagala', '0748596321', 'saman@gmail.com');


CREATE TABLE systemuser (
  empNo int NOT NULL,
  nic varchar(20) NOT NULL,
  uname varchar(100) NOT NULL,
  uaddress varchar(250) NOT NULL,
  phone varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  locid int NOT NULL,
  type varchar(255) NOT NULL,
  PRIMARY KEY (empNo),
  FOREIGN KEY (locid) REFERENCES location (locid)
);

INSERT INTO `systemuser` (`empNo`, `nic`, `uname`, `uaddress`, `phone`, `email`, `password`, `locid`, `type`) VALUES
(1, '200176800124', 'Lakna', 'Kurunagala', '123', 'lakna@gmail.com', 'lakna123', 1, 'ADMIN'),
(2, '199901410750', 'Yasiru', 'Panadura', '1232\r\n', 'abc@gmail.com', '123', 1, 'BR'),
(3, '100025633147', 'Test', 'Test', '1234', 'test@gmail.com', '123', 1, 'TECH');

CREATE TABLE device (
  imiNumber varchar(100) NOT NULL,
  brand varchar(100) NOT NULL,
  model varchar(100) NOT NULL,
  extra varchar(250) DEFAULT NULL,
  nic varchar(20) NOT NULL,
  PRIMARY KEY (imiNumber),
  FOREIGN KEY (nic) REFERENCES customer (nic)
);

INSERT INTO `device` (`imiNumber`, `brand`, `model`, `extra`, `nic`) VALUES
('324567890912', 'Aapple', '7', 'plus', '200176800124'),
('3524678512', 'samsung', 'A32', 'A series', '200041300147'),
('457821345', 'Samsung', 'A21s', 'A series', '199632458123');

CREATE TABLE job (
  id int NOT NULL AUTO_INCREMENT,
  jobDate datetime NOT NULL,
  systemuserId int NOT NULL,
  deviceId varchar(100) NOT NULL,
  isPaid char(1) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (systemuserId) REFERENCES systemuser (empNo),
  FOREIGN KEY (deviceId) REFERENCES device (imiNumber)
);


INSERT INTO `job` (`id`, `jobDate`, `systemuserId`, `deviceId`, `isPaid`) VALUES
(1, '2023-10-05', 2, '324567890912', '0');

CREATE TABLE jobservice (
  jobserviceid int NOT NULL AUTO_INCREMENT,
  jobid int NOT NULL,
  serviceid int NOT NULL,
  amount int NOT NULL,
  status int NOT NULL,
  remarks varchar(255) NOT NULL,
  date datetime NOT NULL,
  PRIMARY KEY (jobserviceid),
  FOREIGN KEY (jobid) REFERENCES job (id),
  FOREIGN KEY (serviceid) REFERENCES services (sid)
);

CREATE TABLE jobitem (
  jobserviceitemid int NOT NULL AUTO_INCREMENT,
  itemId varchar(255) NOT NULL,
  qty int NOT NULL,
  price float(10) NOT NULL,
  PRIMARY KEY (jobserviceitemid),
  FOREIGN KEY (itemId) REFERENCES item (itemCode)
);

CREATE TABLE jobdelivery (
  id int NOT NULL AUTO_INCREMENT,
  jobid int NOT NULL,
  deliid int NULL,
  date datetime NOT NULL,
  locFromId int NOT NULL,
  locToId int NOT NULL,
  note varchar(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (jobid) REFERENCES job(id),
  FOREIGN KEY (deliid) REFERENCES delivery (empNo),
    FOREIGN KEY (locFromId) REFERENCES location (locid),
  FOREIGN KEY (locToId) REFERENCES location (locid)
);

CREATE TABLE history (
  id int NOT NULL AUTO_INCREMENT,
  htype varchar(100) DEFAULT NULL,
  note varchar(500) DEFAULT NULL,
  noteDate datetime DEFAULT NULL,
  systemuserId int NOT NULL,
  jobid int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (jobid) REFERENCES job (id),
  FOREIGN KEY (systemuserId) REFERENCES systemuser (empNo)
)