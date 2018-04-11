/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : neikong

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-11 11:09:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for achievementrecord
-- ----------------------------
DROP TABLE IF EXISTS `achievementrecord`;
CREATE TABLE `achievementrecord` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProCode` varchar(255) DEFAULT NULL COMMENT '项目编码',
  `ProName` varchar(255) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL COMMENT '学员Id',
  `TheoryAch` varchar(255) DEFAULT NULL COMMENT '理论成绩',
  `TheoryExamTime` datetime DEFAULT NULL COMMENT '考试时间',
  `TheoryExamAddress` varchar(255) DEFAULT NULL COMMENT '考试地点',
  `ActualOperatAch` varchar(255) DEFAULT NULL COMMENT '实际操作成绩',
  `ActualExamTime` datetime DEFAULT NULL COMMENT '考试时间',
  `ActualExamAddress` varchar(255) DEFAULT NULL COMMENT '考试地点',
  `IsAdopt` int(1) unsigned zerofill DEFAULT '0' COMMENT '是否通过',
  `HeaderMaster` varchar(255) DEFAULT NULL COMMENT '班主任',
  `WritePerson` int(11) DEFAULT NULL COMMENT '录入人',
  `WriteDate` datetime DEFAULT NULL COMMENT '录入时间',
  `Flag` int(1) unsigned zerofill DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='考试成绩记录表\r\n';

-- ----------------------------
-- Records of achievementrecord
-- ----------------------------
INSERT INTO `achievementrecord` VALUES ('0000000001', '2018001', '201811培训科目2培训类别6', '1', '85', '2018-03-29 00:00:00', '理论地点', '90', '2018-03-29 00:00:00', '实操地点', '0', null, '2', '2018-03-17 00:00:00', '0');
INSERT INTO `achievementrecord` VALUES ('0000000002', '2018001', '201811培训科目2培训类别6', '1', '85', '2018-03-29 00:00:00', '理论地点', '90', '2018-03-29 00:00:00', '实操地点', '0', null, '2', '2018-03-29 00:00:00', '1');
INSERT INTO `achievementrecord` VALUES ('0000000003', '2018001', '201811培训科目2培训类别6', '1', '85', '2018-03-29 00:00:00', '理论地点', '90', '2018-03-29 00:00:00', '实操地点', '1', null, '2', '2018-03-29 00:00:00', '1');

-- ----------------------------
-- Table structure for applyinvoice
-- ----------------------------
DROP TABLE IF EXISTS `applyinvoice`;
CREATE TABLE `applyinvoice` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProCode` varchar(255) DEFAULT NULL COMMENT '项目编码',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `UnitId` int(11) DEFAULT NULL COMMENT '单位ID',
  `UnitName` varchar(255) DEFAULT NULL COMMENT '单位名称',
  `ReceiveAmount` decimal(10,0) DEFAULT NULL COMMENT '应收款金额',
  `InvoicedAmount` decimal(10,0) DEFAULT NULL COMMENT '已开票金额',
  `PaidAmount` decimal(10,0) DEFAULT NULL COMMENT '已收款金额',
  `ThisAmount` decimal(10,0) DEFAULT NULL COMMENT '本次申请开票金额',
  `InvoiceSubId` int(11) DEFAULT NULL,
  `InvoiceSub` varchar(255) DEFAULT NULL COMMENT '开票主体',
  `Market` varchar(255) DEFAULT NULL COMMENT '单位所属市场人员',
  `ThisDesc` varchar(255) DEFAULT NULL COMMENT '说明',
  `InvoiceType` varchar(255) DEFAULT NULL COMMENT '申请开票类型',
  `InvoiceContent` varchar(255) DEFAULT NULL COMMENT '申请开票内容',
  `Applicant` varchar(255) DEFAULT NULL COMMENT '申请人',
  `ApplicationTime` datetime DEFAULT NULL COMMENT '申请时间',
  `Enclosure` varchar(255) DEFAULT NULL COMMENT '附件',
  `InvoiceStatus` int(11) DEFAULT NULL COMMENT '状态',
  `ThisStudentIds` varchar(255) DEFAULT NULL COMMENT '本次申请开票学员列表',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='申请开票表';

-- ----------------------------
-- Records of applyinvoice
-- ----------------------------
INSERT INTO `applyinvoice` VALUES ('0000000001', '2018001', '201811培训科目2培训类别6', '1', '聚真宝科技有限公司', '800', null, null, '600', null, '第一机构', null, null, '增值税专用发票', '开票内容', '1', '2018-04-03 00:00:00', null, null, '1,2');

-- ----------------------------
-- Table structure for arrangeteachers
-- ----------------------------
DROP TABLE IF EXISTS `arrangeteachers`;
CREATE TABLE `arrangeteachers` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `TeacherId` varchar(255) DEFAULT NULL COMMENT '教师id',
  `StartDate` datetime DEFAULT NULL COMMENT '上课开始日期',
  `EndDate` datetime DEFAULT NULL COMMENT '上课结束日期',
  `TeachDays` int(11) DEFAULT NULL COMMENT '上课天数',
  `ArrangeId` int(10) unsigned zerofill DEFAULT NULL COMMENT '教学安排表Id',
  `Flag` int(1) DEFAULT NULL COMMENT '作废标记',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='教学安排上课教师表';

-- ----------------------------
-- Records of arrangeteachers
-- ----------------------------

-- ----------------------------
-- Table structure for bustype
-- ----------------------------
DROP TABLE IF EXISTS `bustype`;
CREATE TABLE `bustype` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `BusTypeName` varchar(255) NOT NULL COMMENT '业务类别名称',
  `BusTypeCode` varchar(255) DEFAULT NULL COMMENT '业务类别编码',
  `Flag` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '作废标记0:正常，1:作废',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='业务类型表';

-- ----------------------------
-- Records of bustype
-- ----------------------------
INSERT INTO `bustype` VALUES ('0000000001', '业务类型2', null, '0');
INSERT INTO `bustype` VALUES ('0000000002', '业务类型22', null, '0');
INSERT INTO `bustype` VALUES ('0000000003', '业务类别新添加', null, '0');

-- ----------------------------
-- Table structure for certinfo
-- ----------------------------
DROP TABLE IF EXISTS `certinfo`;
CREATE TABLE `certinfo` (
  `CertId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProCode` varchar(255) DEFAULT NULL COMMENT '项目编码',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `SubTraining` int(11) DEFAULT NULL COMMENT '培训科目',
  `SubType` int(11) DEFAULT NULL COMMENT '培训类别',
  `StudentId` int(10) unsigned zerofill DEFAULT NULL,
  `StudentName` varchar(255) DEFAULT NULL COMMENT '姓名',
  `StudentNum` varchar(255) DEFAULT NULL COMMENT '身份证号',
  `UnitName` varchar(255) DEFAULT NULL COMMENT '单位名称',
  `Phone` int(11) DEFAULT NULL COMMENT '联系电话',
  `CertCode` varchar(255) DEFAULT NULL COMMENT '证书编码',
  `NextExamDate` datetime DEFAULT NULL COMMENT '下次复审日期',
  `IssuingOrgan` varchar(255) DEFAULT NULL COMMENT '发证机关',
  `WritePerson` int(11) DEFAULT NULL,
  `WriteDate` datetime DEFAULT NULL,
  `Flag` int(1) unsigned zerofill DEFAULT '0',
  `IsRemind` int(1) unsigned zerofill DEFAULT '0' COMMENT '是否到期提醒',
  PRIMARY KEY (`CertId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='证书管理表';

-- ----------------------------
-- Records of certinfo
-- ----------------------------
INSERT INTO `certinfo` VALUES ('0000000005', '2018001', '201811培训科目2培训类别6', '4', '9', '0000000001', '学员1', '123456', '单位名称', '123456', '0001', '2018-03-29 00:00:00', '发证机关', '2', '2018-03-29 00:00:00', '0', '0');
INSERT INTO `certinfo` VALUES ('0000000006', '1234561', '201812培训科目1培训类别5', '3', '7', '0000000001', '学员1', '123456', '单位名称', '123456', '0002', '2018-03-29 00:00:00', '发证机关2', '1', '2018-03-29 00:00:00', '0', '0');

-- ----------------------------
-- Table structure for certreciverecord
-- ----------------------------
DROP TABLE IF EXISTS `certreciverecord`;
CREATE TABLE `certreciverecord` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `CertId` int(11) DEFAULT NULL,
  `ReceivePerson` varchar(255) DEFAULT NULL COMMENT '证书领取人',
  `ReceiveDate` datetime DEFAULT NULL COMMENT '证书领取日期',
  `RecievePhone` varchar(255) DEFAULT NULL COMMENT '证书领取人联系电话',
  `SignForm` varchar(255) DEFAULT NULL COMMENT '签收表',
  `ReceiveWritePerson` int(11) DEFAULT NULL COMMENT '领取证书操作人',
  `ReceiveWriteDate` datetime DEFAULT NULL,
  `Flag` int(1) unsigned zerofill DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of certreciverecord
-- ----------------------------
INSERT INTO `certreciverecord` VALUES ('0000000001', '5', '领取人', '2018-03-30 00:00:00', '456231', '签收表', '1', '2018-03-30 00:00:00', '0');

-- ----------------------------
-- Table structure for communicatemode
-- ----------------------------
DROP TABLE IF EXISTS `communicatemode`;
CREATE TABLE `communicatemode` (
  `Id` int(10) unsigned zerofill NOT NULL,
  `ModeName` varchar(255) NOT NULL COMMENT '沟通方式名称',
  `Flag` int(1) unsigned zerofill NOT NULL COMMENT '0:正常，1:作废',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='拜访沟通方式表';

-- ----------------------------
-- Records of communicatemode
-- ----------------------------
INSERT INTO `communicatemode` VALUES ('0000000000', '拜访', '0');
INSERT INTO `communicatemode` VALUES ('0000000001', '电话沟通', '0');
INSERT INTO `communicatemode` VALUES ('0000000002', 'QQ', '0');
INSERT INTO `communicatemode` VALUES ('0000000003', '微信', '0');

-- ----------------------------
-- Table structure for communicaterecord
-- ----------------------------
DROP TABLE IF EXISTS `communicaterecord`;
CREATE TABLE `communicaterecord` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `CommunicateContent` varchar(255) NOT NULL COMMENT '沟通内容',
  `CompanyName` varchar(255) NOT NULL COMMENT '拜访公司名称',
  `CompanyPerson` varchar(255) NOT NULL COMMENT '单位联系人',
  `CommunicateMode` varchar(255) NOT NULL COMMENT '拜访沟通方式',
  `CommunicateDate` datetime DEFAULT NULL COMMENT '沟通日期',
  `CommunicatePerson` int(10) unsigned zerofill DEFAULT NULL COMMENT '拜访沟通人id',
  `CommunicateResult` varchar(255) DEFAULT NULL COMMENT '沟通成果',
  `Flag` int(1) unsigned zerofill DEFAULT '0' COMMENT '作废0：正常，1：作废',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='客户拜访沟通记录表';

-- ----------------------------
-- Records of communicaterecord
-- ----------------------------
INSERT INTO `communicaterecord` VALUES ('0000000001', '沟通内容发生大幅撒旦法撒法撒旦法撒法', '聚真宝科技有限公司', '客户联系人', '2', '2018-03-21 00:00:00', '0000000001', '沟通成果啊扫扫扫211额2额嗯嗯额 才呃1额2额2额额额1', '0');
INSERT INTO `communicaterecord` VALUES ('0000000002', '沟通内容', '聚真宝科技有限公司', '客户联系人', '1', '2018-03-21 00:00:00', '0000000001', '沟通成果111', '0');
INSERT INTO `communicaterecord` VALUES ('0000000003', 'asfsa', '聚真宝科技有限公司', '客户联系人', '', '2018-03-20 00:00:00', '0000000002', '发生大幅', '0');
INSERT INTO `communicaterecord` VALUES ('0000000004', '司法大案', '聚真宝科技有限公司', '客户联系人', '', '2018-03-21 00:00:00', '0000000002', '的首发三大', '0');
INSERT INTO `communicaterecord` VALUES ('0000000005', 'fdsaf ', '聚真宝科技有限公司', '客户联系人', '', '2018-03-21 00:00:00', '0000000002', 'fsd af sa', '0');
INSERT INTO `communicaterecord` VALUES ('0000000006', '萨芬哇', '聚真宝科技有限公司', '客户联系人', '', '2018-03-23 00:00:00', '0000000002', '发达省份撒', '1');

-- ----------------------------
-- Table structure for contractinfo
-- ----------------------------
DROP TABLE IF EXISTS `contractinfo`;
CREATE TABLE `contractinfo` (
  `ContractId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ContractCode` varchar(255) NOT NULL COMMENT '合同编码',
  `ContractName` varchar(255) NOT NULL COMMENT '合同名称',
  `ContractCustomerId` int(10) unsigned zerofill DEFAULT NULL,
  `ContractCustomerName` varchar(255) NOT NULL COMMENT '客户单位名称',
  `ContractSub` varchar(255) NOT NULL COMMENT '合同签订主体',
  `ContractAmount` decimal(19,2) NOT NULL COMMENT '合同金额',
  `ContractLimitDate` varchar(255) NOT NULL COMMENT '实施期限',
  `ContractIntroduct` varchar(255) NOT NULL COMMENT '合同简介',
  `ContractSignDate` datetime DEFAULT NULL COMMENT '合同签订日期',
  `WritePersonId` int(10) unsigned zerofill NOT NULL COMMENT '录入人',
  `WriteDate` datetime DEFAULT NULL COMMENT '录入日期',
  `ContractStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '合同状态 0:已录入，1：已删除',
  PRIMARY KEY (`ContractId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='合同信息表';

-- ----------------------------
-- Records of contractinfo
-- ----------------------------
INSERT INTO `contractinfo` VALUES ('0000000001', '123456', '合同名称', '0000000001', '聚真宝科技有限公司', '1', '1000000.00', '6', '合同简介', '2018-03-21 00:00:00', '0000000001', '2018-03-21 00:00:00', '0');

-- ----------------------------
-- Table structure for customerinfo
-- ----------------------------
DROP TABLE IF EXISTS `customerinfo`;
CREATE TABLE `customerinfo` (
  `CustomerId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '客户唯一id',
  `Customerlevel` int(10) unsigned zerofill NOT NULL COMMENT '所在单位级别',
  `CustomerName` varchar(255) NOT NULL COMMENT '客户名称、单位名称',
  `CreditCode` varchar(255) DEFAULT NULL COMMENT '统一社会信用代码',
  `CustomerAddress` varchar(255) DEFAULT NULL COMMENT '住所',
  `CustomerPhone` varchar(255) DEFAULT NULL COMMENT '客户电话',
  `OpenBank` varchar(255) DEFAULT NULL COMMENT '开户行',
  `BankAccount` int(10) unsigned zerofill DEFAULT NULL COMMENT '开户帐号',
  `PerformanceLevel` int(10) unsigned zerofill DEFAULT '0000000000' COMMENT '绩效级别,单位层次',
  `ChargePerson` int(11) DEFAULT NULL COMMENT '客户单位负责人',
  `ChargerPhone` varchar(255) DEFAULT NULL COMMENT '负责人电话',
  `ChargerQQ` varchar(255) DEFAULT NULL COMMENT '负责人QQ',
  `ChargerWechat` varchar(255) DEFAULT NULL COMMENT '负责人微信',
  `CustomerContact` varchar(255) DEFAULT NULL COMMENT '客户联系人',
  `ContactPhone` varchar(255) DEFAULT NULL COMMENT '联系人电话',
  `ContactQQ` varchar(255) DEFAULT NULL COMMENT '联系人QQ',
  `ContactWechat` varchar(255) DEFAULT NULL COMMENT '联系人微信',
  `CustomerDesc` varchar(255) DEFAULT NULL COMMENT '客户单位介绍',
  `MarketPerson` int(10) unsigned zerofill DEFAULT NULL COMMENT '单位所属市场人员',
  `WritePerson` int(11) unsigned zerofill DEFAULT NULL COMMENT '信息录入人',
  `WriteDate` datetime DEFAULT NULL COMMENT '信息录入日期',
  `VisitCount` int(10) unsigned zerofill DEFAULT '0000000000' COMMENT '拜访次数',
  `CustomerStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '客户状态0:未审核，1:已通过审核，2:拒绝审核',
  `ExamPerson` int(11) unsigned zerofill DEFAULT NULL COMMENT '审核人',
  `ExamDate` datetime DEFAULT NULL COMMENT '审核时间',
  `Flag` int(1) unsigned zerofill DEFAULT '0' COMMENT '0:正常，1：作废',
  `RefuseText` varchar(255) DEFAULT NULL COMMENT '拒绝理由',
  PRIMARY KEY (`CustomerId`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='客户信息表';

-- ----------------------------
-- Records of customerinfo
-- ----------------------------
INSERT INTO `customerinfo` VALUES ('0000000001', '0000000001', '聚真宝科技有限公司', '123456789456123X', '济南高新区', '1234561111', '济南高新区建行', '0000234567', '0000000001', '2', '345678', '456789', '567890', '客户联系人', '678901', '789012', '8901234', '单位介绍', '0000000001', '00000000001', '2018-03-16 00:00:00', '0000000000', '2', '00000000001', '2018-03-23 00:00:00', '0', 'fdsaa');

-- ----------------------------
-- Table structure for customerlevelinfo
-- ----------------------------
DROP TABLE IF EXISTS `customerlevelinfo`;
CREATE TABLE `customerlevelinfo` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `LevelCode` varchar(10) DEFAULT NULL COMMENT '级别代码A、B、C、D',
  `LevelName` varchar(20) DEFAULT NULL COMMENT '重要客户、较重要客户、一般客户、个人客户',
  `LevelFlag` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '作废标记0：正常，1：作废',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='单位级别表';

-- ----------------------------
-- Records of customerlevelinfo
-- ----------------------------
INSERT INTO `customerlevelinfo` VALUES ('0000000001', 'A', '重要客户', '0');
INSERT INTO `customerlevelinfo` VALUES ('0000000002', 'B', '较重要客户', '0');
INSERT INTO `customerlevelinfo` VALUES ('0000000003', 'C', '一般客户', '0');
INSERT INTO `customerlevelinfo` VALUES ('0000000004', 'D', '个人客户', '0');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `DepartId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `DepartName` varchar(255) NOT NULL COMMENT '部门名称',
  `DepartDesc` varchar(255) DEFAULT NULL COMMENT '部门描述',
  `Flag` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '作废标记',
  `DepartMenu` text,
  PRIMARY KEY (`DepartId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='部门表';

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('0000000001', '管理员部门', '管理员', '0', '1,29,30,31,32,33,34,35,36,37,29,30,31,32,33,34,35,36,37,2,38,39,38,39,3,40,41,42,43,44,40,41,42,43,44,4,45,46,47,48,45,46,47,48,5,50,50,6,53,54,55,56,57,53,54,55,56,57,7,58,59,60,61,62,58,59,60,61,62,8,63,64,65,66,67,68,63,64,65,66,67,68,9,69,70,71,72,69,70,71,72,10,73,74,77,73,74,77,11,75,76,75,76');

-- ----------------------------
-- Table structure for expenditure
-- ----------------------------
DROP TABLE IF EXISTS `expenditure`;
CREATE TABLE `expenditure` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProId` int(11) DEFAULT NULL COMMENT '项目编号',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `ProType` int(1) unsigned zerofill NOT NULL COMMENT '项目类别',
  `SubTraining` varchar(255) DEFAULT NULL COMMENT '培训科目',
  `Amount` decimal(10,0) DEFAULT NULL COMMENT '金额',
  `Disbursement` varchar(255) DEFAULT NULL COMMENT '支出人',
  `Desctribe` varchar(255) DEFAULT NULL COMMENT '用途及支出情况',
  `Status` int(1) DEFAULT NULL COMMENT '结项情况0：可结项，1:已结项，2：不可结项',
  `KnotPerson` varchar(255) DEFAULT NULL COMMENT '结项人',
  `KnotDate` datetime DEFAULT NULL COMMENT '结项日期',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of expenditure
-- ----------------------------

-- ----------------------------
-- Table structure for headermasterach
-- ----------------------------
DROP TABLE IF EXISTS `headermasterach`;
CREATE TABLE `headermasterach` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProId` int(11) DEFAULT NULL COMMENT '项目编号',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `BusType` varchar(255) DEFAULT NULL COMMENT '业务类型',
  `ClassStartDate` datetime DEFAULT NULL COMMENT '开课日期',
  `ClassEndDate` datetime DEFAULT NULL COMMENT '结课日期',
  `ClassDays` int(11) DEFAULT NULL COMMENT '课程天数',
  `ClassStudentAmount` int(255) DEFAULT NULL COMMENT '上课人数',
  `HeaderMaster` varchar(255) DEFAULT NULL COMMENT '班主任',
  `AchAmount` decimal(10,0) DEFAULT NULL COMMENT '绩效总额',
  `Status` int(10) unsigned zerofill DEFAULT NULL COMMENT '计算情况0：未结算，1：已结算',
  `SettlementPerson` varchar(255) DEFAULT NULL COMMENT '结算人',
  `SettlementDate` datetime DEFAULT NULL COMMENT '结算日期',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='班主任绩效结算表';

-- ----------------------------
-- Records of headermasterach
-- ----------------------------

-- ----------------------------
-- Table structure for invoice
-- ----------------------------
DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProCode` varchar(255) DEFAULT NULL COMMENT '项目编码',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `InvoiceCode` varchar(255) DEFAULT NULL COMMENT '发票编号',
  `UnitId` int(11) DEFAULT NULL COMMENT '单位ID',
  `UnitName` varchar(255) DEFAULT NULL COMMENT '单位名称',
  `Amount` decimal(10,0) DEFAULT NULL COMMENT '开票金额',
  `InvoiceNum` int(11) DEFAULT NULL COMMENT '发票号码',
  `SubName` varchar(255) DEFAULT NULL COMMENT '开票主体单位名称',
  `InvoiceType` varchar(255) DEFAULT NULL COMMENT '开票类型',
  `InvoiceDate` datetime DEFAULT NULL COMMENT '开票日期',
  `Drawer` int(11) DEFAULT NULL COMMENT '开票人',
  `Giver` int(11) DEFAULT NULL COMMENT '送票人',
  `GiveTime` datetime DEFAULT NULL COMMENT '送票日期',
  `Receiver` varchar(255) DEFAULT NULL COMMENT '发票接收人',
  `ReceiverPhone` varchar(255) DEFAULT NULL COMMENT '接收人联系方式',
  `ReceiveDate` datetime DEFAULT NULL COMMENT '接收日期',
  `InvoiceStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '状态0:正常1：，2：已签收',
  `WirteDate` datetime DEFAULT NULL,
  `WirtePerson` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of invoice
-- ----------------------------
INSERT INTO `invoice` VALUES ('0000000001', '2018001', '201811培训科目2培训类别6', null, '1', '聚真宝科技有限公司', '500', '21', '主体单位', '开票类型', '2018-04-04 00:00:00', '11', '12', '2018-04-04 00:00:00', '签收人', '789456', '2018-04-11 00:00:00', '2', null, null);

-- ----------------------------
-- Table structure for menuconfig
-- ----------------------------
DROP TABLE IF EXISTS `menuconfig`;
CREATE TABLE `menuconfig` (
  `Id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `Url` varchar(255) DEFAULT NULL COMMENT '菜单URL',
  `OrderNo` int(2) unsigned zerofill NOT NULL DEFAULT '00',
  `CreateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '时间戳',
  `MenuLevel` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '菜单级别',
  `MenuParentId` int(2) unsigned zerofill NOT NULL DEFAULT '00' COMMENT '所属类别Id',
  `Flag` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '作废标记：0:正常',
  `DivId` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COMMENT='菜单权限表';

-- ----------------------------
-- Records of menuconfig
-- ----------------------------
INSERT INTO `menuconfig` VALUES ('01', '市场管理系统', null, '00', '2018-03-14 11:01:12', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('02', '工作记录', null, '00', '2018-03-14 11:01:26', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('03', '项目管理', null, '00', '2018-03-14 11:01:36', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('04', '教学管理', null, '00', '2018-03-14 11:01:42', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('05', '证书管理', null, '00', '2018-03-14 11:01:50', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('06', '财务管理', null, '00', '2018-03-14 11:01:59', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('07', '开票及收款管理', null, '00', '2018-03-14 11:02:17', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('08', '结算', null, '00', '2018-03-14 11:02:22', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('09', '报表管理', null, '00', '2018-03-14 11:02:29', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('10', '设置', null, '00', '2018-03-14 11:02:33', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('11', '信息发布', null, '00', '2018-03-15 11:37:38', '0', '00', '0', null);
INSERT INTO `menuconfig` VALUES ('29', '全部客户信息', '../../modules/market/allcustomer.php', '00', '2018-03-23 14:09:49', '0', '01', '0', 'cutomer_main_div');
INSERT INTO `menuconfig` VALUES ('30', '我的客户信息', '../../modules/market/myCustomer.php', '00', '2018-03-19 17:10:24', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('31', '待审核信息', '../../modules/market/examCustomer.php', '00', '2018-03-19 17:30:23', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('32', '我的沟通记录', '../../modules/market/myCommunicateRecord.php', '00', '2018-03-20 13:50:19', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('33', '全部沟通记录', '../../modules/market/allCommunicateRecord.php', '00', '2018-03-21 10:46:47', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('34', '我的合同管理', '../../modules/market/myContract.php', '00', '2018-03-21 14:04:23', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('35', '全部合同管理', '../../modules/market/allContract.php', '00', '2018-03-21 11:03:51', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('36', '单位级别管理', '../../modules/market/customerLevel.php', '00', '2018-03-21 14:18:03', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('37', '单位层次管理', '../../modules/market/performanceLevel.php', '00', '2018-03-21 14:44:47', '0', '01', '0', null);
INSERT INTO `menuconfig` VALUES ('38', '全部工作记录', '../../modules/work/allWorkRecord.php?pagetype=all', '00', '2018-03-21 16:22:20', '0', '02', '0', null);
INSERT INTO `menuconfig` VALUES ('39', '我的工作记录', '../../modules/work/allWorkRecord.php?pagetype=my', '00', '2018-03-21 16:22:24', '0', '02', '0', null);
INSERT INTO `menuconfig` VALUES ('40', '立项管理', '../../modules/project/allProject.php?pagetype=all', '00', '2018-03-21 16:51:55', '0', '03', '0', null);
INSERT INTO `menuconfig` VALUES ('41', '待审核项目', '../../modules/project/allProject.php?pagetype=audit', '00', '2018-03-22 08:43:38', '0', '03', '0', null);
INSERT INTO `menuconfig` VALUES ('42', '学员及收费标准', '../../modules/project/allStudent.php', '00', '2018-03-24 09:24:39', '0', '03', '0', null);
INSERT INTO `menuconfig` VALUES ('43', '项目分类管理', '../../modules/project/allProjectType.php', '00', '2018-03-22 14:02:10', '0', '03', '0', null);
INSERT INTO `menuconfig` VALUES ('44', '业务类别', '../../modules/project/allBusType.php', '00', '2018-03-22 09:41:53', '0', '03', '0', null);
INSERT INTO `menuconfig` VALUES ('45', '师资管理', '../../modules/teach/allTeacher.php', '00', '2018-03-24 14:20:58', '0', '04', '0', null);
INSERT INTO `menuconfig` VALUES ('46', '教学安排', '../../modules/teach/allTeachArrange.php', '00', '2018-03-24 15:44:06', '0', '04', '0', null);
INSERT INTO `menuconfig` VALUES ('47', '学员考勤', '../../modules/teach/allStudentWork.php', '00', '2018-03-24 15:59:27', '0', '04', '0', null);
INSERT INTO `menuconfig` VALUES ('48', '考试成绩录入', '../../modules/teach/allAchievement.php', '00', '2018-03-29 14:29:03', '0', '04', '0', null);
INSERT INTO `menuconfig` VALUES ('49', '证书信息管理', '../../modules/cert/allCert.php', '00', '2018-03-29 15:22:59', '0', '05', '0', null);
INSERT INTO `menuconfig` VALUES ('50', '证书领取管理', '../../modules/cert/allCertReceiveRecord.php', '00', '2018-03-29 16:51:34', '0', '05', '0', null);
INSERT INTO `menuconfig` VALUES ('51', '证书到期提醒', '../../modules/cert/allCertRemind.php', '00', '2018-03-30 10:30:14', '0', '05', '0', null);
INSERT INTO `menuconfig` VALUES ('52', '签收表', null, '00', '2018-03-14 11:42:42', '0', '05', '0', null);
INSERT INTO `menuconfig` VALUES ('53', '报销管理', '../../modules/finance/allReim.php?pagetype=all', '00', '2018-03-31 09:56:31', '0', '06', '0', null);
INSERT INTO `menuconfig` VALUES ('54', '报销审批', '../../modules/finance/allReim.php?pagetype=audit', '00', '2018-03-31 09:56:41', '0', '06', '0', null);
INSERT INTO `menuconfig` VALUES ('55', '报销发放', '../../modules/finance/allReim.php?pagetype=grant', '00', '2018-03-31 11:22:18', '0', '06', '0', null);
INSERT INTO `menuconfig` VALUES ('56', '其他收入', '../../modules/finance/otherInCome.php', '00', '2018-04-02 09:14:46', '0', '06', '0', null);
INSERT INTO `menuconfig` VALUES ('57', '报销类别', '../../modules/finance/allReimType.php', '00', '2018-03-31 11:22:21', '0', '06', '0', null);
INSERT INTO `menuconfig` VALUES ('58', '申请开票', '../../modules/invoice/allApplyInvoice.php', '00', '2018-04-02 09:58:55', '0', '07', '0', null);
INSERT INTO `menuconfig` VALUES ('59', '发票附件', '../../modules/invoice/allInvoiceEnclosure.php', '00', '2018-04-03 16:17:13', '0', '07', '0', null);
INSERT INTO `menuconfig` VALUES ('60', '发票信息', '../../modules/invoice/AllInvoiceInfo.php?pagetype=all', '00', '2018-04-04 16:22:53', '0', '07', '0', null);
INSERT INTO `menuconfig` VALUES ('61', '发票签收', '../../modules/invoice/AllInvoiceInfo.php?pagetype=rec', '00', '2018-04-04 16:18:20', '0', '07', '0', null);
INSERT INTO `menuconfig` VALUES ('62', '回款信息', '../../modules/invoice/Payment.php', '00', '2018-04-03 08:34:53', '0', '07', '0', null);
INSERT INTO `menuconfig` VALUES ('63', '班主任绩效结算', '../../modules/settlement/allHeadermasterACH.php', '00', '2018-04-11 10:06:55', '0', '08', '0', null);
INSERT INTO `menuconfig` VALUES ('64', '项目支出结项', null, '00', '2018-03-14 11:43:33', '0', '08', '0', null);
INSERT INTO `menuconfig` VALUES ('65', '项目绩效', null, '00', '2018-03-14 11:43:33', '0', '08', '0', null);
INSERT INTO `menuconfig` VALUES ('66', '项目结项', null, '00', '2018-03-14 11:43:33', '0', '08', '0', null);
INSERT INTO `menuconfig` VALUES ('67', '绩效提成比例', null, '00', '2018-03-14 11:43:33', '0', '08', '0', null);
INSERT INTO `menuconfig` VALUES ('68', '班主任结算设置', null, '00', '2018-03-14 11:43:33', '0', '08', '0', null);
INSERT INTO `menuconfig` VALUES ('69', '工作报表', null, '00', '2018-03-14 11:43:43', '0', '09', '0', null);
INSERT INTO `menuconfig` VALUES ('70', '公司收支报表', null, '00', '2018-03-14 11:43:43', '0', '09', '0', null);
INSERT INTO `menuconfig` VALUES ('71', '客户信息报表', null, '00', '2018-03-14 11:43:43', '0', '09', '0', null);
INSERT INTO `menuconfig` VALUES ('72', '项目报表', null, '00', '2018-03-14 11:43:43', '0', '09', '0', null);
INSERT INTO `menuconfig` VALUES ('73', '角色管理', '../../modules/setting/allRoles.php', '00', '2018-03-29 08:42:06', '0', '10', '0', null);
INSERT INTO `menuconfig` VALUES ('74', '人员管理', '../../modules/setting/allUser.php', '00', '2018-03-28 12:01:37', '0', '10', '0', null);
INSERT INTO `menuconfig` VALUES ('75', '发布信息', null, '00', '2018-03-14 11:44:02', '0', '11', '0', null);
INSERT INTO `menuconfig` VALUES ('76', '信息发布列表', null, '00', '2018-03-14 11:44:02', '0', '11', '0', null);
INSERT INTO `menuconfig` VALUES ('77', '部门管理', '../../modules/setting/allDepart.php', '00', '2018-03-28 14:49:33', '0', '10', '0', null);
INSERT INTO `menuconfig` VALUES ('78', '机构管理', '../../modules/setting/allOrg.php', '00', '2018-04-03 14:09:47', '0', '10', '0', null);

-- ----------------------------
-- Table structure for organization
-- ----------------------------
DROP TABLE IF EXISTS `organization`;
CREATE TABLE `organization` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `OrgCode` varchar(255) DEFAULT NULL COMMENT '机构编码',
  `OrgName` varchar(255) DEFAULT NULL COMMENT '机构名称',
  `CreditCode` varchar(255) DEFAULT NULL COMMENT '统一社会信用代码',
  `OrgAddress` varchar(255) DEFAULT NULL,
  `OrgPhone` varchar(255) DEFAULT NULL,
  `OpenBank` varchar(255) DEFAULT NULL COMMENT '开户行',
  `BankAccount` int(10) unsigned zerofill DEFAULT NULL COMMENT '开户帐号',
  `ChargePerson` int(11) DEFAULT NULL COMMENT '机构负责人',
  `ChargerPhone` varchar(255) DEFAULT NULL COMMENT '负责人电话',
  `OrgDesc` varchar(255) DEFAULT NULL COMMENT '机构描述',
  `OrgStatu` int(1) unsigned zerofill DEFAULT '0' COMMENT '机构状态',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='机构信息表（培训机构信息表）';

-- ----------------------------
-- Records of organization
-- ----------------------------
INSERT INTO `organization` VALUES ('0000000001', '0001', '第一机构', '465465', '机构地址', '165165', '农业银行', '0000006217', '0', '1563165', '机构描述', '0');

-- ----------------------------
-- Table structure for otherincome
-- ----------------------------
DROP TABLE IF EXISTS `otherincome`;
CREATE TABLE `otherincome` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Year` varchar(255) DEFAULT NULL,
  `Amount` decimal(10,0) DEFAULT NULL COMMENT '金额',
  `Agent` varchar(255) DEFAULT NULL COMMENT '经办人',
  `VoucherNum` varchar(255) DEFAULT NULL COMMENT '凭证号',
  `IncomeDesc` varchar(255) DEFAULT NULL COMMENT '说明',
  `WritePerson` int(11) DEFAULT NULL,
  `WriteDate` datetime DEFAULT NULL,
  `Flag` int(1) unsigned zerofill DEFAULT '0' COMMENT '作废',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='其他收入表';

-- ----------------------------
-- Records of otherincome
-- ----------------------------
INSERT INTO `otherincome` VALUES ('0000000001', '2018', '200', '9', '456123', '收入说明', '1', '2018-04-02 00:00:00', '0');

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProCode` varchar(11) DEFAULT NULL COMMENT '项目编号',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `UnitName` varchar(255) DEFAULT NULL COMMENT '单位名称',
  `InvoiceNum` int(11) DEFAULT NULL COMMENT '发票号码',
  `InvoiceDate` datetime DEFAULT NULL COMMENT '开票日期',
  `PaymentAmount` decimal(10,0) DEFAULT NULL COMMENT '回款金额',
  `PaymentDate` datetime DEFAULT NULL COMMENT '回款日期',
  `PaymentSub` varchar(255) DEFAULT NULL COMMENT '回款主体',
  `PaymentType` varchar(255) DEFAULT NULL COMMENT '回款方式',
  `VoucherNum` int(11) DEFAULT NULL COMMENT '凭证号',
  `Agent` varchar(255) DEFAULT NULL COMMENT '经办人',
  `PaymentDesc` varchar(255) DEFAULT NULL COMMENT '说明',
  `PaymentStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '回款状态',
  `WritePerson` int(11) DEFAULT NULL,
  `WriteDate` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='回款信息表';

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES ('0000000001', '2018001', '201811培训科目2培训类别6', '单位名称', '123456', '2018-04-03 00:00:00', '300', '2018-04-03 00:00:00', '回款主体', '现金', '123456', '1', '说明', '0', '1', '2018-04-03 00:00:00');
INSERT INTO `payment` VALUES ('0000000002', '2018001', '201811培训科目2培训类别6', '聚真宝科技有限公司', '1', '2018-04-04 00:00:00', null, null, null, null, null, null, null, '0', '1', '2018-04-04 00:00:00');

-- ----------------------------
-- Table structure for performancelevelinfo
-- ----------------------------
DROP TABLE IF EXISTS `performancelevelinfo`;
CREATE TABLE `performancelevelinfo` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `PerformanceLevelName` varchar(255) NOT NULL COMMENT '单位层次',
  `PerformanceLevelCode` varchar(10) NOT NULL COMMENT '单位层次代码',
  `PerformanceLevelPro` varchar(10) NOT NULL,
  `Flag` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '作废：0：正常，1：作废',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='单位层次字段';

-- ----------------------------
-- Records of performancelevelinfo
-- ----------------------------
INSERT INTO `performancelevelinfo` VALUES ('0000000001', '固定客户', 'A', '15', '0');
INSERT INTO `performancelevelinfo` VALUES ('0000000002', '正常客户', 'B', '20', '0');
INSERT INTO `performancelevelinfo` VALUES ('0000000003', '新客户', 'C', '25', '0');
INSERT INTO `performancelevelinfo` VALUES ('0000000004', '个人客户', 'D', '25', '0');
INSERT INTO `performancelevelinfo` VALUES ('0000000007', '', '', '2018-03-12', '1');
INSERT INTO `performancelevelinfo` VALUES ('0000000008', '固定客户', 'D', '30', '0');

-- ----------------------------
-- Table structure for projectachievements
-- ----------------------------
DROP TABLE IF EXISTS `projectachievements`;
CREATE TABLE `projectachievements` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProId` int(11) DEFAULT NULL COMMENT '项目编码',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `CompanyName` varchar(255) DEFAULT NULL COMMENT '单位名称',
  `BusType` varchar(255) DEFAULT NULL COMMENT '业务类别',
  `ReceiveAmount` decimal(10,0) DEFAULT NULL COMMENT '收款金额',
  `PersonalAmount` decimal(10,0) DEFAULT NULL COMMENT '个人费用',
  `PublicAmount` decimal(10,0) DEFAULT NULL COMMENT '公共费用分摊',
  `AchAmount` decimal(10,0) DEFAULT NULL COMMENT '绩效金额',
  `Personal` varchar(255) DEFAULT NULL COMMENT '所属人',
  `AccountStatus` int(11) DEFAULT NULL COMMENT '核算情况0：可核算，1：不可核算，2：已核算',
  `AccountDate` datetime DEFAULT NULL COMMENT '核算日期',
  `AccountPerson` varchar(255) DEFAULT NULL COMMENT '核算人',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='项目绩效';

-- ----------------------------
-- Records of projectachievements
-- ----------------------------

-- ----------------------------
-- Table structure for projectknot
-- ----------------------------
DROP TABLE IF EXISTS `projectknot`;
CREATE TABLE `projectknot` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProId` int(11) DEFAULT NULL COMMENT '项目编码',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `ReceiveAmount` decimal(10,0) DEFAULT NULL COMMENT '应收款金额',
  `PaidAmount` decimal(10,0) DEFAULT NULL COMMENT '已收款金额',
  `TotalAmount` decimal(10,0) DEFAULT NULL COMMENT '项目总支出',
  `GrossProfit` decimal(10,0) DEFAULT NULL COMMENT '毛利润',
  `Status` int(11) DEFAULT NULL COMMENT '结项情况0：可结项1：不可结项',
  `KnotPerson` varchar(255) DEFAULT NULL COMMENT '结项人',
  `KnotDate` datetime DEFAULT NULL COMMENT '结项日期',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='结项表';

-- ----------------------------
-- Records of projectknot
-- ----------------------------

-- ----------------------------
-- Table structure for projectsinfo
-- ----------------------------
DROP TABLE IF EXISTS `projectsinfo`;
CREATE TABLE `projectsinfo` (
  `ProjectId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProjectCode` varchar(255) NOT NULL COMMENT '项目编号',
  `ProjectYear` varchar(10) DEFAULT NULL COMMENT '项目年份',
  `ProjectBatch` varchar(255) DEFAULT NULL COMMENT '期次',
  `ProjectType` int(1) unsigned zerofill DEFAULT NULL COMMENT '项目分类',
  `SubTraining` int(11) DEFAULT NULL COMMENT '培训科目',
  `SubType` int(11) DEFAULT NULL COMMENT '培训类别',
  `BusType` varchar(255) DEFAULT NULL COMMENT '业务类别',
  `ProjectDate` datetime DEFAULT NULL COMMENT '立项日期',
  `PlanNum` int(10) unsigned zerofill DEFAULT NULL COMMENT '计划人数',
  `PlanAmount` decimal(19,2) DEFAULT '0.00' COMMENT '计划项目金额',
  `PlanStartDate` datetime DEFAULT NULL COMMENT '计划开始日期',
  `PlanEndDate` datetime DEFAULT NULL COMMENT '计划结束日期',
  `PlanDays` int(11) DEFAULT NULL COMMENT '计划天数',
  `ProjectPerson` varchar(255) DEFAULT NULL COMMENT '立项人',
  `ProjectDesc` varchar(255) DEFAULT NULL COMMENT '项目说明',
  `ProjectStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '项目状态0:未审核，1:通过审核,2:未通过审核,3:已结项,4:已经删除',
  `ChargeMode` varchar(255) DEFAULT NULL COMMENT '收费方式',
  `ProjectLeader` int(11) DEFAULT NULL COMMENT '项目负责人',
  `RefuseResult` varchar(255) DEFAULT NULL COMMENT '拒绝原因',
  PRIMARY KEY (`ProjectId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='项目表（项目立项）';

-- ----------------------------
-- Records of projectsinfo
-- ----------------------------
INSERT INTO `projectsinfo` VALUES ('0000000001', '123456', '2018', '8', '2', '6', '10', '1', '2018-03-13 00:00:00', '0000000020', '200.00', null, null, null, '2', '项目说明', '1', '现金', '2', '少时诵诗书');
INSERT INTO `projectsinfo` VALUES ('0000000002', '2018001', '2018', '11', '1', '4', '9', '1', '2018-03-24 00:00:00', '0000000030', '300.00', null, null, null, '1', '说明', '0', null, null, null);
INSERT INTO `projectsinfo` VALUES ('0000000007', '1234561', '2018', '12', '1', '3', '7', '1', '2018-03-29 00:00:00', '0000000030', '300.00', null, null, null, '1', '13', '0', null, null, null);

-- ----------------------------
-- Table structure for projecttype
-- ----------------------------
DROP TABLE IF EXISTS `projecttype`;
CREATE TABLE `projecttype` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL COMMENT '分类名称',
  `ParentId` int(11) NOT NULL COMMENT '所属上级分类ID，一级分类：项目分类，二级分类：培训科目，三级分类：培训类别',
  `Flag` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '作废标记0：正常，1：作废',
  `ParentLevel` int(1) unsigned zerofill NOT NULL DEFAULT '1' COMMENT '级别：1:一级分类，2：二级分类，3:三级分类',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='项目三级分类表';

-- ----------------------------
-- Records of projecttype
-- ----------------------------
INSERT INTO `projecttype` VALUES ('0000000001', '项目分类1', '0', '0', '1');
INSERT INTO `projecttype` VALUES ('0000000002', '项目分类2', '0', '0', '1');
INSERT INTO `projecttype` VALUES ('0000000003', '培训科目1', '2', '0', '2');
INSERT INTO `projecttype` VALUES ('0000000004', '培训科目2', '1', '0', '2');
INSERT INTO `projecttype` VALUES ('0000000005', '培训科目3', '1', '0', '2');
INSERT INTO `projecttype` VALUES ('0000000006', '培训科目4', '2', '0', '2');
INSERT INTO `projecttype` VALUES ('0000000007', '培训类别5', '6', '0', '3');
INSERT INTO `projecttype` VALUES ('0000000008', '培训类别6', '4', '0', '3');
INSERT INTO `projecttype` VALUES ('0000000009', '培训类别6', '4', '0', '3');
INSERT INTO `projecttype` VALUES ('0000000010', '培训类别7', '4', '0', '3');
INSERT INTO `projecttype` VALUES ('0000000011', '123456', '4', '0', '3');
INSERT INTO `projecttype` VALUES ('0000000012', '3', '4', '0', '3');

-- ----------------------------
-- Table structure for reimbursement
-- ----------------------------
DROP TABLE IF EXISTS `reimbursement`;
CREATE TABLE `reimbursement` (
  `ReimId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Year` int(11) DEFAULT NULL,
  `ReimPersonId` int(11) DEFAULT NULL COMMENT '报销人',
  `ReimPerson` varchar(11) DEFAULT NULL COMMENT '报销人',
  `ProCode` varchar(255) DEFAULT NULL COMMENT '项目编码',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `ReimType` varchar(255) DEFAULT NULL COMMENT '类别',
  `ReimSub` varchar(255) DEFAULT NULL COMMENT '科目',
  `ReimDesc` varchar(255) DEFAULT NULL COMMENT '用途及票据说明',
  `WritePerson` int(11) DEFAULT NULL COMMENT '录入人',
  `WriteDate` datetime DEFAULT NULL COMMENT '录入日期',
  `ReimStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '状态0:未审核,1:已删除,2:通过审核，3：拒绝审核，4:已发放',
  `ReimExam` varchar(255) DEFAULT NULL COMMENT '审批人',
  `ExamDate` datetime DEFAULT NULL COMMENT '审批日期',
  `ReimAmount` decimal(10,0) DEFAULT NULL COMMENT '报销金额',
  `GrantAmount` decimal(10,0) DEFAULT NULL COMMENT '发放金额',
  `FinanceName` varchar(255) DEFAULT NULL COMMENT '支出财务主体名称',
  `VoucherNum` varchar(255) DEFAULT NULL COMMENT '凭证号',
  `GrantDate` datetime DEFAULT NULL COMMENT '发放日期',
  `GrantPerson` varchar(255) DEFAULT NULL COMMENT '发放人',
  `GrantDesc` varchar(255) DEFAULT NULL COMMENT '发放说明',
  `RefuseText` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ReimId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reimbursement
-- ----------------------------
INSERT INTO `reimbursement` VALUES ('0000000001', null, null, '0', '阿斯蒂芬', '非萨芬', '沙发', '发烧发', '非萨芬 ', null, '2018-03-30 00:00:00', '1', null, null, '0', null, null, null, null, null, null, null);
INSERT INTO `reimbursement` VALUES ('0000000002', null, null, '1', '阿斯蒂芬', '非萨芬', '沙发', '发烧发', '非萨芬 ', null, '2018-03-30 00:00:00', '1', null, null, '0', null, null, null, null, null, null, null);
INSERT INTO `reimbursement` VALUES ('0000000003', '2018', '0', '报销人', '2018001', '201811培训科目2培训类别6', '3', '考核费', '报销用途说明', '9', '2018-03-30 00:00:00', '4', '1', '2018-03-31 00:00:00', '100', '100', '支出财务主体', '4654136', '2018-04-02 00:00:00', '10', '发放说明', 'fsadfsad');

-- ----------------------------
-- Table structure for reimtype
-- ----------------------------
DROP TABLE IF EXISTS `reimtype`;
CREATE TABLE `reimtype` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '报销类别ID',
  `ReimTypeName` varchar(255) NOT NULL COMMENT '报销类别名称',
  `ReimSubName` varchar(255) DEFAULT NULL COMMENT '报销科目列表;隔开',
  `Flag` int(1) unsigned zerofill DEFAULT '0' COMMENT '作废标记',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reimtype
-- ----------------------------
INSERT INTO `reimtype` VALUES ('0000000001', '公司费用', '', '0');
INSERT INTO `reimtype` VALUES ('0000000002', '项目个人费用', null, '0');
INSERT INTO `reimtype` VALUES ('0000000003', '项目公共费用', '资料费 考核费', '0');

-- ----------------------------
-- Table structure for roleinfo
-- ----------------------------
DROP TABLE IF EXISTS `roleinfo`;
CREATE TABLE `roleinfo` (
  `RoleId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(255) DEFAULT NULL COMMENT '角色名称',
  `RoleLevel` int(1) unsigned zerofill NOT NULL DEFAULT '0',
  `RoleDesc` varchar(255) DEFAULT NULL COMMENT '角色描述',
  `Flag` int(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT '作废标记',
  `RoleMenu` text COMMENT '角色权限',
  PRIMARY KEY (`RoleId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roleinfo
-- ----------------------------
INSERT INTO `roleinfo` VALUES ('0000000001', '管理员', '0', null, '0', '1,29,30,31,32,33,34,35,36,37,29,30,31,32,33,34,35,36,37,2,38,39,38,39,3,40,41,42,43,44,40,41,42,43,44,4,45,48,45,48,5,49,50,51,52,49,50,51,52,6,53,54,55,56,57,53,54,55,56,57,7,58,59,60,61,62,58,59,60,61,62,8,63,64,65,66,67,68,63,64,65,66,67,68,9,69,70,71,72,69,70,71,72,10,73,74,77,73,74,77,11,75,76,75,76');
INSERT INTO `roleinfo` VALUES ('0000000002', '科室', '1', null, '0', null);
INSERT INTO `roleinfo` VALUES ('0000000003', '用户', '2', null, '0', null);
INSERT INTO `roleinfo` VALUES ('0000000004', '市场人员', '0', '市场人员', '0', '1,31,33,34,35,36,37,31,33,34,35,36,37,2,38,38');

-- ----------------------------
-- Table structure for studentinfo
-- ----------------------------
DROP TABLE IF EXISTS `studentinfo`;
CREATE TABLE `studentinfo` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(255) NOT NULL COMMENT '学员姓名',
  `StudentNum` int(10) unsigned zerofill DEFAULT NULL COMMENT '身份证号',
  `UnitName` varchar(255) DEFAULT NULL COMMENT '单位名称',
  `StudentPhone` int(10) unsigned zerofill DEFAULT NULL COMMENT '联系电话',
  `WritePerson` int(11) DEFAULT NULL,
  `WriteDate` datetime DEFAULT NULL,
  `StudentStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '学员状态',
  `ChargeAmount` decimal(19,2) DEFAULT '0.00' COMMENT '收费金额',
  `ChargeDesc` varchar(255) DEFAULT NULL COMMENT '收费说明',
  `ProjectCode` varchar(255) DEFAULT NULL,
  `ProjectName` varchar(255) DEFAULT NULL,
  `IsBilling` int(1) unsigned zerofill DEFAULT '0' COMMENT '0:未开票，1：已申请开票，2：已开票',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='学员信息表';

-- ----------------------------
-- Records of studentinfo
-- ----------------------------
INSERT INTO `studentinfo` VALUES ('0000000001', '学员1', '0000123456', '单位名称', '0123456111', '0', '2018-03-28 00:00:00', '0', '300.00', null, '2018001', '201811培训科目2培训类别6', '1');
INSERT INTO `studentinfo` VALUES ('0000000002', '学员2', '0004651651', '单位2', '0004156165', '0', '2018-04-02 00:00:00', '0', '300.00', null, '2018001', '201811培训科目2培训类别6', '1');
INSERT INTO `studentinfo` VALUES ('0000000003', '学员3', '0000234242', '单位3', '0000001221', '0', '2018-04-02 00:00:00', '0', '200.00', null, '2018001', '201811培训科目2培训类别6', '0');

-- ----------------------------
-- Table structure for studentworkinfo
-- ----------------------------
DROP TABLE IF EXISTS `studentworkinfo`;
CREATE TABLE `studentworkinfo` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProCode` varchar(255) DEFAULT NULL COMMENT '项目编号',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `StudentId` int(11) unsigned zerofill DEFAULT '00000000000' COMMENT '学员Id',
  `ShouldDays` int(11) DEFAULT '0' COMMENT '应出勤天数',
  `RealDays` int(11) unsigned zerofill DEFAULT '00000000000' COMMENT '实际出勤天数',
  `WorkDescribe` varchar(255) DEFAULT '' COMMENT '考勤说明',
  `WritePerson` int(11) DEFAULT '0' COMMENT '录入人',
  `WriteDate` datetime DEFAULT NULL COMMENT '录入日期',
  `HeadMaster` varchar(255) DEFAULT NULL COMMENT '班主任',
  `Flag` int(1) unsigned zerofill DEFAULT '0' COMMENT '作废标记：0：正常，1：作废',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='学员考勤记录';

-- ----------------------------
-- Records of studentworkinfo
-- ----------------------------
INSERT INTO `studentworkinfo` VALUES ('0000000001', '2018001', '201811培训科目2培训类别6', '00000000001', '50', '00000000030', null, '1', '2018-03-28 00:00:00', null, '0');
INSERT INTO `studentworkinfo` VALUES ('0000000002', '2018001', '201811培训科目2培训类别6', '00000000001', '50', '00000000030', '123', '1', '2018-03-28 00:00:00', null, '0');
INSERT INTO `studentworkinfo` VALUES ('0000000003', '2018001', '201811培训科目2培训类别6', '00000000000', '30', '00000000050', '说明', '1', '2018-03-29 00:00:00', null, '1');
INSERT INTO `studentworkinfo` VALUES ('0000000004', '2018001', '201811培训科目2培训类别6', '00000000001', '0', '00000000000', '', '1', '2018-03-29 00:00:00', null, '0');

-- ----------------------------
-- Table structure for teacharrange
-- ----------------------------
DROP TABLE IF EXISTS `teacharrange`;
CREATE TABLE `teacharrange` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ProCode` varchar(11) DEFAULT NULL COMMENT '项目编号',
  `ProName` varchar(255) DEFAULT NULL COMMENT '项目名称',
  `TeachStartDate` datetime DEFAULT NULL COMMENT '上课开始日期',
  `TeachEndDate` datetime DEFAULT NULL COMMENT '上课结束日期',
  `TeachDays` int(10) unsigned zerofill DEFAULT NULL COMMENT '课程天数',
  `HeaderMaster` varchar(255) DEFAULT NULL COMMENT '班主任',
  `OtherDesc` varchar(255) DEFAULT NULL COMMENT '其他说明',
  `ChargePerson` varchar(255) DEFAULT NULL COMMENT '教学负责人',
  `ArrangeDate` datetime DEFAULT NULL COMMENT '安排日期',
  `Flag` int(1) unsigned zerofill DEFAULT '0' COMMENT '作废0:正常，1：作废',
  `TeacherFirst` int(11) DEFAULT NULL COMMENT '上课教师1',
  `StartDateFirst` datetime DEFAULT NULL,
  `EndDateFirst` datetime DEFAULT NULL,
  `TeachDaysFirst` int(11) DEFAULT NULL,
  `TeacherSecond` int(11) DEFAULT NULL COMMENT '上课教师2',
  `StartDateSecond` datetime DEFAULT NULL,
  `EndDateSecond` datetime DEFAULT NULL,
  `TeachDaysSecond` int(11) DEFAULT NULL,
  `TeacherThird` int(11) DEFAULT NULL COMMENT '上课教师3',
  `StartDateThird` datetime DEFAULT NULL,
  `EndDateThird` datetime DEFAULT NULL,
  `TeachDaysThird` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='教学安排表';

-- ----------------------------
-- Records of teacharrange
-- ----------------------------
INSERT INTO `teacharrange` VALUES ('0000000005', '2018001', '201811培训科目2培训类别6', '2018-04-11 00:00:00', '2018-04-28 00:00:00', '0000000017', '5', '其他说明', '1', '2018-04-11 00:00:00', '0', '1', '2018-04-11 00:00:00', '2018-04-28 00:00:00', '17', '4', '2018-04-11 00:00:00', '2018-04-28 00:00:00', '17', '1', '2018-04-11 00:00:00', '2018-04-11 00:00:00', '17');

-- ----------------------------
-- Table structure for teacherinfo
-- ----------------------------
DROP TABLE IF EXISTS `teacherinfo`;
CREATE TABLE `teacherinfo` (
  `TeacherId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `TeacherName` varchar(255) NOT NULL COMMENT '教师姓名',
  `TeacherSex` int(1) unsigned zerofill DEFAULT NULL COMMENT '性别：0：未填写，1：男，2：女',
  `TeacherPNum` varchar(255) DEFAULT NULL COMMENT '身份证号码',
  `TeacherPhone` int(10) unsigned zerofill DEFAULT NULL COMMENT '联系电话',
  `QQ` varchar(255) DEFAULT NULL COMMENT 'QQ',
  `Wechat` varchar(255) DEFAULT NULL COMMENT '微信',
  `CardNum` varchar(255) DEFAULT NULL COMMENT '卡号',
  `OpeningBank` varchar(255) DEFAULT NULL COMMENT '开户行',
  `BankAddress` varchar(255) DEFAULT NULL COMMENT '开户行地址',
  `FeeStandard` varchar(255) DEFAULT NULL COMMENT '课师费标准',
  `TeacherDesc` varchar(255) DEFAULT NULL COMMENT '教师介绍',
  `WritePerson` int(11) DEFAULT NULL COMMENT '录入人',
  `WriteDate` datetime DEFAULT NULL COMMENT '录入时间',
  `TeacherStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '教师状态0:正常，1：作废',
  PRIMARY KEY (`TeacherId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='教师信息表';

-- ----------------------------
-- Records of teacherinfo
-- ----------------------------
INSERT INTO `teacherinfo` VALUES ('0000000001', '教师1', '0', '370000000001', '0156000001', '123456', '23456', '6222201156166', '建设银行', '山东济南', '30', '介绍', '2', '2018-03-08 00:00:00', '0');
INSERT INTO `teacherinfo` VALUES ('0000000006', '', null, null, null, null, null, null, null, null, null, null, '1', '2018-04-09 00:00:00', '0');
INSERT INTO `teacherinfo` VALUES ('0000000003', '教师2', '1', '123456', '0000132163', '165465', '131651', '1651651651', '165165', '1631651', '163', '1313', '1', '2018-03-28 00:00:00', '1');
INSERT INTO `teacherinfo` VALUES ('0000000004', '教师3', '0', '1563165', '0000165165', '165165', '165165', '165165', '16565165', '16516', '1616', '1316', '1', '2018-03-28 00:00:00', '0');
INSERT INTO `teacherinfo` VALUES ('0000000005', '班主任', '0', '132132', '0000001321', '31', '32132', '132', '13', '1', '321', '32', '1', '2018-03-28 00:00:00', '0');

-- ----------------------------
-- Table structure for userroles
-- ----------------------------
DROP TABLE IF EXISTS `userroles`;
CREATE TABLE `userroles` (
  `Id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `RoleId` int(11) DEFAULT NULL COMMENT '角色名称',
  `UserId` int(11) DEFAULT NULL COMMENT '权限集合',
  `Flag` int(1) DEFAULT NULL COMMENT '作废标记：0：正常，1：作废',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userroles
-- ----------------------------
INSERT INTO `userroles` VALUES ('0000000001', '1', '1', '0');
INSERT INTO `userroles` VALUES ('0000000002', '2', '2', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UserId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `UserAccount` varchar(255) DEFAULT NULL COMMENT '用户帐号',
  `UserName` varchar(255) DEFAULT NULL COMMENT '用户名称',
  `UserCode` varchar(255) NOT NULL COMMENT '用户登录编码、用户名',
  `UserDepart` int(11) DEFAULT NULL COMMENT '部门',
  `UserPost` varchar(255) DEFAULT NULL COMMENT '职务',
  `Phone` varchar(255) DEFAULT NULL COMMENT '联系方式',
  `UserNum` varchar(255) DEFAULT NULL COMMENT '身份证号码',
  `Address` varchar(255) DEFAULT NULL COMMENT '家庭住址',
  `UserStatus` int(1) unsigned zerofill DEFAULT '0' COMMENT '用户作废、状态标记',
  `UserRoleId` int(11) unsigned zerofill DEFAULT '00000000000' COMMENT '用户所对应角色Id',
  `UserPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('0000000001', 'admin', '管理员', 'admin', '1', null, '456', '370', 'shandong', '0', '00000000001', '123456');
INSERT INTO `users` VALUES ('0000000002', 'shichang', '市场人员', 'shichang', '1', null, null, null, null, '0', '00000000004', '123456');
INSERT INTO `users` VALUES ('0000000008', 'admin', '管理员', '0001', null, null, '123456', '321654', '山东', '0', '00000000000', '123456');
INSERT INTO `users` VALUES ('0000000009', 'baoxiao', '报销人', '0002', '1', null, '456', '123465', '132165', '0', '00000000003', '123456');
INSERT INTO `users` VALUES ('0000000010', 'fafang', '发放人', '0003', '1', null, '45613', '546547984156', '65165', '0', '00000000003', '123456');
INSERT INTO `users` VALUES ('0000000011', 'kaipiao', '开票人', '0004', '1', null, '12313', '16165165', '161653', '0', '00000000003', '123456');
INSERT INTO `users` VALUES ('0000000012', 'songpiao', '送票人', '0005', '1', null, '135165', '165165', '16516', '0', '00000000003', '123465');

-- ----------------------------
-- Table structure for workrecord
-- ----------------------------
DROP TABLE IF EXISTS `workrecord`;
CREATE TABLE `workrecord` (
  `RecordId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '记录ID',
  `WorkName` varchar(255) NOT NULL COMMENT '工作名称',
  `WorkContent` varchar(255) NOT NULL COMMENT '工作内容',
  `WorkResult` varchar(255) NOT NULL COMMENT '工作结果',
  `WorkDate` datetime DEFAULT NULL,
  `WritePerson` int(11) NOT NULL,
  `WriteDate` datetime DEFAULT NULL,
  `Flag` int(1) NOT NULL COMMENT '作废：0：正常，1：作废',
  PRIMARY KEY (`RecordId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='工作记录表';

-- ----------------------------
-- Records of workrecord
-- ----------------------------
INSERT INTO `workrecord` VALUES ('0000000001', '工作名称1', '工作内容', '工作成果', '2018-03-10 00:00:00', '1', '2018-03-10 00:00:00', '0');
INSERT INTO `workrecord` VALUES ('0000000002', 'gongzuo', 'asdfsad', 'dsafsafdsa', '2018-03-21 00:00:00', '1', '2018-03-21 00:00:00', '1');

-- ----------------------------
-- Function structure for getTeacherACH
-- ----------------------------
DROP FUNCTION IF EXISTS `getTeacherACH`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getTeacherACH`(`stucount` int) RETURNS int(11)
BEGIN
	#Routine body goes here...
DECLARE stu_count int;
SET  stu_count = stucount;
	RETURN stu_count;
END
;;
DELIMITER ;
