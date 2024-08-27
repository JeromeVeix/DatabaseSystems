CREATE DATABASE IF NOT EXISTS maintenance;

create table tbluser
(userid int primary key auto_increment,
firstname varchar(10),
lastname varchar(10),
email varchar(50),
phone varchar(15),
password varchar(20),
type varchar(5)
);

create table tblservice
(serviceid varchar(10) primary key,
servicedesc varchar (40),
serviceprice double,
servicevendor varchar(40)
);

create table tblindustry
(industryid varchar(10) primary key,
industrydesc varchar (40),
industryprice double,
industrylocations varchar(40)
);

create table tblpreventive
(preventiveid varchar(10) primary key,
preventivedesc varchar (40),
preventiveprice double,
preventivevendor varchar(40)
);

create table tblprojecttype
(eventid int primary key auto_increment,
datee varchar(10),
phone varchar(15),
estimated_hours int,
projecttype varchar(20),
industrytype varchar(20),
industryid varchar(10),
servicetype varchar(20),
serviceid varchar(10), 
preventivetype varchar(20),
preventiveid varchar(10),
userid int,
customerprice double,
adminprice double,
foreign key (industryid) references tblindustry(industryid) on delete cascade,
foreign key (serviceid) references tblservice(serviceid) on delete cascade,
foreign key (preventiveid) references tblpreventive(preventiveid)on delete cascade,
foreign key (userid) references tbluser(userid)on delete cascade
);

INSERT INTO `tbluser`(`userid`, `firstname`, `lastname`, `email`, `phone`, `password`, `type`) VALUES (1,'Jerome','Veix','admin','201-454-5454','admin','admin');

INSERT INTO `tblservice`(`serviceid`, `servicedesc`, `serviceprice`, `servicevendor`) VALUES (111,'Maintenance cleaning',80,'Crystal clean group');
INSERT INTO `tblservice`(`serviceid`, `servicedesc`, `serviceprice`, `servicevendor`) VALUES (222,'Electrical maintenance',140,'Shocking corp');
INSERT INTO `tblservice`(`serviceid`, `servicedesc`, `serviceprice`, `servicevendor`) VALUES (333,'Plumbing',125,'Stan plumbing');
INSERT INTO `tblservice`(`serviceid`, `servicedesc`, `serviceprice`, `servicevendor`) VALUES (444,'HVAC repair',150,'Beloved heating & cooling');

INSERT INTO `tblindustry`(`industryid`, `industrydesc`, `industryprice`, `industrylocations`) VALUES (555,'Residential',200,'Newark');
INSERT INTO `tblindustry`(`industryid`, `industrydesc`, `industryprice`, `industrylocations`) VALUES (666,'Banks',300,'Newark, Irvington');
INSERT INTO `tblindustry`(`industryid`, `industrydesc`, `industryprice`, `industrylocations`) VALUES (777,'Office spaces',400,'East Orange, Newark');

INSERT INTO `tblpreventive`(`preventiveid`, `preventivedesc`, `preventiveprice`, `preventivevendor`) VALUES (888,'Periodic',500,'Time-based services');
INSERT INTO `tblpreventive`(`preventiveid`, `preventivedesc`, `preventiveprice`, `preventivevendor`) VALUES (999,'Predictive',250,'Monitoring maintenance');
INSERT INTO `tblpreventive`(`preventiveid`, `preventivedesc`, `preventiveprice`, `preventivevendor`) VALUES (121,'Condition-based',100,'Proactive maintenance');
